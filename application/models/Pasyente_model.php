<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasyente_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'PirTBL';
    }

    public function restoreMultipleRecords($ids)
    {
        $this->db->where_in('PirNo', $ids);
        $this->db->update('PirTBL', array('is_deleted' => 0));
        return $this->db->affected_rows();
    }

    public function get_last_pir_number()
    {
        $this->db->select('PirNo');
        $this->db->order_by('PirNo', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('PirTBL');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->PirNo;
        }

        return 0;
    }
    
    public function generate_pir_id()
    {
        // Assuming $last_resident_number fetches the last resident number from your database
        $last_pir_number = $this->get_last_pir_number();

        // Set a default counter value if no resident records exist
        $counter = $last_pir_number ? intval(substr($last_pir_number, -4)) + 1 : 1000;

        // Format the Resident ID
        $PirID = 'PIR_ID_' . sprintf('%04d', $counter);

        return $PirID;
    }

    public function showactiveuser()
    {
        $where = array(
            'is_deleted' => 0
        );


        $query = $this->db->get_where($this->table, $where);
        return $query->result();
    }

    public function get_user_data_nonadmin($interval)
    {
        if ($interval === 'weekly1') {
            $date_format = '%M %e'; // Format for weekly interval (Month Day)
            $this->db->where('DateCreated >= DATE_SUB(NOW(), INTERVAL 7 DAY)');
            $this->db->group_by('DATE_FORMAT(DateCreated, "%Y-%m-%d")');
        } elseif ($interval === 'monthly1') {
            $date_format = '%M'; // Format for monthly interval (Month)
            $this->db->where('DateCreated >= DATE_SUB(NOW(), INTERVAL 12 MONTH)');
            $this->db->group_by('DATE_FORMAT(DateCreated, "%Y-%m")');
        } elseif ($interval === 'yearly1') {
            $date_format = '%Y'; // Format for yearly interval (Year)
            $this->db->where('DateCreated >= DATE_SUB(NOW(), INTERVAL 10 YEAR)');
            $this->db->group_by('DATE_FORMAT(DateCreated, "%Y")');
        }

        // Add the condition Is_Deleted = 0
        $this->db->where('Is_Deleted', 0);

        $this->db->select("DATE_FORMAT(DateCreated, '$date_format') as Date, COUNT(*) as Count");
        $this->db->from('PirTBL');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function showdeactivateduser()
    {
        $where = array(
            'is_deleted' => 1
        );


        $query = $this->db->get_where($this->table, $where);
        return $query->result();
    }


    public function addpasyente($data)
    {
        $this->db->insert($this->table, $data);
        return true;
    }

    public function editpasyente($id, $data)
    {
        $where = array(
            'is_deleted' => 0,
            'UserID'         => $id
        );

        return $this->db->update($this->table, $data, $where);
        //$this->db->last_query();

    }

    public function pasyentecount()
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
    public function pasyenteoldcount()
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
    public function pasyentenewcount()
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

    public function delete_pasyente($id)
    {
        $this->db->where('PirID', $id);
        $this->db->update('PirTBL', array('Is_Deleted' => 2));
    }

    public function archive_user($id)
    {
        $this->db->where('PirID', $id);
        $this->db->update('PirTBL', array('Is_Deleted' => 1, 'ArchiveDate' => date('Y-m-d H:i:s')));
    }
    public function archive_records()
    {
        $this->db->where('is_deleted', 1);
        $this->db->where('ArchiveDate <', date('Y-m-d H:i:s', strtotime('-30 days')));
        $this->db->update('PirTBL', array('is_deleted' => 2));
    }
}
