<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');				
		$this->load->helper('custom_func');
		if ($this->session->userdata('id_admin')=="") {
			redirect(base_url().'index.php/login');
		}
		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
		//$this->load->library('datatables');
		$this->load->model('m_bank');

		
	}


	public function data()
	{
		$data['all'] = $this->m_bank->m_data();	
		$this->load->view('data_bank',$data);
	}

	public function by_id($id_bank)
	{
		header('Content-Type: application/json');
		$data['all'] = $this->m_bank->m_by_id($id_bank);
		echo json_encode($data['all']);
	}

	public function by_nama($nama_bank)
	{
		header('Content-Type: application/json');
		$data['all'] = $this->m_bank->m_by_nama(urldecode($nama_bank));
		echo json_encode($data['all']);
	}

	public function simpan_form()
	{
		$id_bank = $this->input->post('id_bank');		
		$serialize = $this->input->post();
		

		if($id_bank=='')
		{
			$this->m_bank->insert($serialize);
			die('1');
		}else{

			$this->m_bank->update($serialize,$id_bank);
		}

	}

	public function hapus($id_bank)
	{
		$this->db->query("DELETE FROM tbl_bank WHERE id_bank='$id_bank'");
	}


}
