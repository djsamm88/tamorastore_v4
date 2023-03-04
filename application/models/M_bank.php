<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_bank extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}




	public function m_data()
	{
		$q = $this->db->query("SELECT a.* FROM tbl_bank a ");
		return $q->result();
	}


	public function m_by_id($id_bank)
	{
		$q = $this->db->query("SELECT a.*
									FROM tbl_bank a 
									
									WHERE a.id_bank='$id_bank'
							  ");
		return $q->result();
	}


	public function m_by_nama($nama_bank)
	{
		$q = $this->db->query("SELECT a.*
									FROM tbl_bank a 
									
									WHERE a.nama_bank='$nama_bank'
							  ");
		return $q->result();
	}


	public function insert($serialize)
	{
		$this->db->set($serialize);
		$this->db->insert('tbl_bank');
	}

	public function update($serialize,$id_bank)
	{
		$this->db->set($serialize);
		$this->db->where('id_bank',$id_bank);
		$this->db->update('tbl_bank');
	}
}