<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mer_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'MerTBL';
    }

    public function restoreMultipleRecords($ids)
    {
        $this->db->where_in('MerID', $ids);
        $this->db->update('MerTBL', array('is_deleted' => 0));
        return $this->db->affected_rows();
    }

    public function get_user_by_id($PirID)
    {
        $query = $this->db->get_where('PirTBL', array('PirID' => $PirID, 'is_delete' => 0));
        $result = $query->row();

        if ($result) {
            return $result->fullname; // Assuming 'fullname' is the column name in your table
        } else {
            return false;
        }
    }

    public function getUserById($PirID)
    {
        $this->db->where('PirNo', $PirID);
        $this->db->where('Is_Deleted', 0);
        $query = $this->db->get('PirTBL');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }


    public function showactiveuser()
    {
        $where = array(
            'is_deleted' => 0
        );


        $query = $this->db->get_where($this->table, $where);
        return $query->result();
    }

    public function showdeactivateduser()
    {
        $where = array(
            'is_deleted' => 1
        );


        $query = $this->db->get_where($this->table, $where);
        return $query->result();
    }


    public function addmer($data)
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

    public function deletepasyente($id, $data)
    {
        $where = array(
            'is_deleted' => 1,
            'id'         => $id
        );


        $this->db->update($this->table, $data, $where);
        return true;
    }
    public function delete_pasyente($id)
    {
        $this->db->where('MerID', $id);
        $this->db->update('MerTBL', array('Is_Deleted' => 2));
    }

    public function archive_user($id)
    {
        $this->db->where('MerID', $id);
        $this->db->update('MerTBL', array('Is_Deleted' => 1, 'ArchiveDate' => date('Y-m-d H:i:s')));
    }
    public function archive_records()
    {
        $this->db->where('is_deleted', 1);
        $this->db->where('ArchiveDate <', date('Y-m-d H:i:s', strtotime('-30 days')));
        $this->db->update('MerTBL', array('is_deleted' => 2));
    }
    public function getApprovalQueue($limit)
    {
        $this->db->where('Status', 'Pending');
        $this->db->where('Is_Deleted', 0);
        $this->db->limit($limit);
        return $this->db->get('MerTBL')->result_array();
    }
    
}
