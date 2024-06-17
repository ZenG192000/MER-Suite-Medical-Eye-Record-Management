<?php

class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'UserTBL';
    }

    public function login($where)
    {
        $user_exist = $this->db->get_where($this->table, $where);

        if ($user_exist->num_rows() > 0) {
            return $user_exist->row();
        }
    }
    public function get_user_by_username($username)
    {
        // Assuming you have a table named 'users' in your database
        $query = $this->db->get_where($this->table, array('Username' => $username));

        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function increment_attempts($username)
    {
        $this->db->where('username', $username);
        $this->db->set('attempts', 'attempts + 1', FALSE);
        $this->db->set('last_attempt_time', date('Y-m-d H:i:s'));
        $this->db->update('UserTBL');
    }

    public function is_max_attempts($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('UserTBL');
        $row = $query->row();
        return $row->attempts >= 5; // Change this if you have a different attempt limit
    }
    public function get_last_lock_time($username)
    {
        $this->db->select('last_attempt_time');
        $this->db->where('username', $username);
        $query = $this->db->get('UserTBL');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return strtotime($row->last_attempt_time);
        } else {
            return 0; // Default to 0 if no record is found
        }
    }
    public function get_login_attempts($username)
    {
        $this->db->select('attempts');
        $this->db->where('username', $username);
        $query = $this->db->get('UserTBL');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->attempts;
        } else {
            return 0; // Default to 0 attempts if no record is found
        }
    }

    public function unlock($username)
    {
        $this->db->where('username', $username);
        $this->db->set('attempts', 0);
        $this->db->set('last_attempt_time', null);
        $this->db->update('UserTBL');
    }

    public function lock_account($username)
    {
        $this->db->where('username', $username);
        $this->db->set('last_attempt_time', time());
        $this->db->update('UserTBL');
    }

    public function is_locked_out($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('UserTBL');

        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                if ($row->attempts >= 3) {
                    $last_attempt_time = strtotime($row->last_attempt_time);
                    $current_time = time();
                    $lockout_time = 300; // 5 minutes in seconds

                    return $current_time - $last_attempt_time <= $lockout_time;
                } else {
                    return false; // Return false if attempts < 5
                }
            } else {
                return false; // No rows returned for the username
            }
        } else {
            // Handle the case where the query fails
            return false;
        }
    }
}
