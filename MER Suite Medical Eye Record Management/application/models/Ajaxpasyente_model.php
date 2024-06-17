<?php

class Ajaxpasyente_model extends CI_Model
{
	public function createData($data)
	{
		$query = $this->db->insert('PirTBL', $data);
		return $query;
	}

	public function getLastInsertedID()
	{
		$this->db->select_max('PirID'); // Assuming 'id' is your auto-incremented field
		$query = $this->db->get('PirTBL');
		$row = $query->row();

		return $row->PirID;
	}

	public function fetchAllData($data, $tablename, $where)
	{
		$query = $this->db->select($data)
			->from($tablename)
			->where($where)
			->where('Is_Deleted =', 0)
			->get();
		return $query->result_array();
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

	public function fetchSingleData($data, $tablename, $where)
	{
		$query = $this->db->select($data)
			->from($tablename)
			->where($where)
			->get();
		return $query->row_array();
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
