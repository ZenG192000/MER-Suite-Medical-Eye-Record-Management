<?php

class Ajaxmer_model extends CI_Model
{
	public function createData($data)
	{
		$query = $this->db->insert('MerTBL', $data);
		return $query;
	}

	public function fetchAllData($data, $tablename, $where)
	{
		$query = $this->db->select($data)
			->from($tablename)
			->where($where)
			->where('Is_Deleted =', 0)
			->where('Status =', 'Approved')
			->get();
		return $query->result_array();
	}
	public function fetchAllDataPending($data, $tablename, $where)
	{
		$query = $this->db->select($data)
			->from($tablename)
			->where($where)
			->where('Is_Deleted =', 0)
			->where('Status', 'Pending')
			->get();
		return $query->result_array();
	}
	public function fetchAllDataApprove($data, $tablename, $where)
	{
		$query = $this->db->select($data)
			->from($tablename)
			->where($where)
			->where('Is_Deleted =', 0)
			->where('Status', 'Approved')
			->get();
		return $query->result_array();
	}
	public function fetchAllDataRejected($data, $tablename, $where)
	{
		$query = $this->db->select($data)
			->from($tablename)
			->where($where)
			->where('Is_Deleted =', 0)
			->where('Status', 'Rejected')
			->get();
		return $query->result_array();
	}
	public function fetchAllDataForSec($data, $tablename, $where)
	{
		if ($this->session->userdata('user_info')) {
			$user_info = $this->session->userdata('user_info');
			$username = $user_info->Name;
		}

		$query = $this->db->select($data)
			->from($tablename)
			->where($where)
			->where('Is_Deleted', 0)
			->where('RecordedBy', $username)
			->group_start()
			->where('Status', 'Pending')
			->or_where('Status', 'Rejected')
			->group_end()
			->get();

		return $query->result_array();
	}
	public function fetchSingleData($data, $tablename, $where)
	{
		$query = $this->db->select($data)
			->from($tablename)
			->where($where)
			->get();
		return $query->row_array();
	}
	public function fetchAllDataDeleted($data, $tablename, $where)
	{
		$query = $this->db->select($data)
			->from($tablename)
			->where($where)
			->where('Is_Deleted =', 2)
			->get();
		return $query->result_array();
	}
	public function fetchAllDataArchived($data, $tablename, $where)
	{
		$query = $this->db->select($data)
			->from($tablename)
			->where($where)
			->where('Is_Deleted', 1)
			->get();

		return $query->result_array();
	}
	public function updateData($tablename, $data, $where)
	{
		$query = $this->db->update($tablename, $data, $where);
		return $query;
	}
	public function fetchDataByDateRange($select, $table, $date_column, $start_date, $end_date)
	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where("$date_column >= ", $start_date);
		$this->db->where("$date_column <= ", $end_date);
		$this->db->where('Is_Deleted', 0);
		$query = $this->db->get();
		return $query->result_array();
	}
}
