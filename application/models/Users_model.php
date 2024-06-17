<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'UserTBL';
    }

    public function showactiveuser()
    {
        $where = array(
            'is_deleted' => 0
        );


        $query = $this->db->get_where($this->table, $where);
        return $query->result();
    }

    public function getUserIdByUsername($username)
    {
        $this->db->select('UserID');
        $this->db->from('UserTBL');
        $this->db->where('Username', $username);
        $query = $this->db->get();

        return $query->row('UserID');
    }

    public function getThemeByUsername($username) {
        // Assuming you have a 'Theme' column in your UserTBL table
        $this->db->select('Theme');
        $this->db->where('Username', $username);
        $query = $this->db->get('UserTBL');

        if ($query->num_rows() > 0) {
            return $query->row()->Theme;
        } else {
            return 'light'; // Default theme if not found
        }
    }

    public function update_theme($user_id, $theme)
    {
        // Assuming you have a UsersTBL table with 'theme' column
        $this->db->where('UserID', $user_id);
        $this->db->update('UserTBL', array('Theme' => $theme));
    }
    public function check_current_password($user_id, $current_password)
    {
        $this->db->where('UserID', $user_id);
        $this->db->where('Password', md5($current_password));
        $query = $this->db->get('UserTBL');

        return $query->num_rows() > 0;
    }

    public function getPassword($usr)
    {
        $query = $this->db->get_where('UserTBL', array('UserID' => $usr));
        $result = $query->row();

        if ($result) {
            return $result->Password;
        } else {
            return null; // Or handle the case where the user is not found
        }
    }
    public function showdeactivateduser()
    {
        $where = array(
            'is_deleted' => 1
        );


        $query = $this->db->get_where($this->table, $where);
        return $query->result();
    }

    public function get_user_data($interval)
    {
        if ($interval === 'weekly') {
            $date_format = '%M %e'; // Format for weekly interval (Month Day)
            $this->db->where('DateCreated >= DATE_SUB(NOW(), INTERVAL 7 DAY)');
            $this->db->group_by('DATE_FORMAT(DateCreated, "%Y-%m-%d")');
        } elseif ($interval === 'monthly') {
            $date_format = '%M'; // Format for monthly interval (Month)
            $this->db->where('DateCreated >= DATE_SUB(NOW(), INTERVAL 12 MONTH)');
            $this->db->group_by('DATE_FORMAT(DateCreated, "%Y-%m")');
        } elseif ($interval === 'yearly') {
            $date_format = '%Y'; // Format for yearly interval (Year)
            $this->db->where('DateCreated >= DATE_SUB(NOW(), INTERVAL 10 YEAR)');
            $this->db->group_by('DATE_FORMAT(DateCreated, "%Y")');
        }

        // Add the condition Is_Deleted = 0
        $this->db->where('Is_Deleted', 0);

        $this->db->select("DATE_FORMAT(DateCreated, '$date_format') as Date, COUNT(*) as Count");
        $this->db->from('UserTBL');

        $query = $this->db->get();
        return $query->result_array();
    }




    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return true;
    }

    public function editProfile($usr, $data)
    {
        $where = array(
            'Is_Deleted' => 0,
            'UserID'         => $usr
        );

        return $this->db->update($this->table, $data, $where);
        //$this->db->last_query();

    }

    public function edit($id, $data)
    {
        $where = array(
            'Is_Deleted' => 0,
            'UserID'         => $id
        );

        return $this->db->update($this->table, $data, $where);
        //$this->db->last_query();

    }

    public function userscount()
    {
        $where = array(
            'Is_Deleted' => 0,

        );

        $query = $this->db->get_where($this->table, $where);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
    }
    public function usersoldcount()
    {
        $where = array(
            'Is_Deleted' => 0,

        );

        $this->db->where('DATE(DateCreated) != CURDATE()', NULL, FALSE);

        $query = $this->db->get_where($this->table, $where);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
    }
    public function usersnewcount()
    {
        $where = array(
            'Is_Deleted' => 0,

        );

        $today = date('Y-m-d');
        $this->db->where('DATE(DateCreated) =', $today);

        $query = $this->db->get_where($this->table, $where);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }
    }

    public function delete($id, $data)
    {
        $where = array(
            'is_deleted' => 0,
            'id'         => $id
        );


        $this->db->update($this->table, $data, $where);
        return true;
    }
}
