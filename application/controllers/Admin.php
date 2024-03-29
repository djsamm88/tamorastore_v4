<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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
		$this->load->model('m_admin');
		$this->load->model('m_cabang');

		
	}

	public function data_admin()
	{
		$data['all_admin'] = $this->m_admin->m_data_admin();	
		$this->load->view('data_admin',$data);
	}


	public function keuangan_harian()
	{
		
		$mulai = $this->input->get('mulai');
		$selesai = $this->input->get('selesai');
		$id_cabang = $this->input->get('id_cabang');		
		$id_admin = $this->input->get('id_admin');		

		if(!isset($id_admin))
		{
			$id_admin 	= $this->session->userdata('id_admin');	
		}


		if(!isset($id_cabang))
		{
			$id_cabang 	= $this->session->userdata('id_cabang');	
		}

		
		$data['mulai'] = $mulai;
		$data['selesai'] = $selesai;
		$data['id_cabang'] = $id_cabang;
		$data['id_admin'] = $id_admin;

		

		$data['all'] = $this->m_admin->keuangan_harian($id_admin,$mulai,$selesai,$id_cabang);	
		
		$this->load->view('keuangan_harian',$data);
	}

	public function keuangan_harian_pdf()
	{

		
		$mulai = $this->input->get('mulai');
		$selesai = $this->input->get('selesai');
		$id_cabang = $this->input->get('id_cabang');		
		$id_admin = $this->input->get('id_admin');	

		$file = "lap_keuangan_harian-$mulai-$selesai.xls";
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=$file");
		header("Pragma: no-cache");
		header("Expires: 0");	
		

		if(!isset($id_admin))
		{
			$id_admin 	= $this->session->userdata('id_admin');	
		}


		if(!isset($id_cabang))
		{
			$id_cabang 	= $this->session->userdata('id_cabang');	
		}

		
		$data['mulai'] = $mulai;
		$data['selesai'] = $selesai;
		$data['id_cabang'] = $id_cabang;
		$data['id_admin'] = $id_admin;

		
		
		$data['all'] = $this->m_admin->keuangan_harian($id_admin,$mulai,$selesai,$id_cabang);	

		$html = $this->load->view('keuangan_harian_pdf.php',$data);
		
		
	}


	




	public function simpan_trx_keuangan()
	{
		$serialize = $this->input->post();
		$serialize['url_bukti'] = upload_file('url_bukti');
		$serialize['id_cabang'] = $this->session->userdata('id_cabang');
		$serialize['id_admin'] = $this->session->userdata('id_admin');

		$jumlah = hanya_nomor($serialize['jumlah']);		
		$serialize['jumlah'] 		= hanya_nomor($serialize['jumlah']);
		
		$serialize['tanggal'] = date('Y-m-d H:i:s');
		
		$this->m_admin->simpan_trx_keuangan($serialize);


	}


	public function data_admin_by_id($id_admin)
	{
		header('Content-Type: application/json');
		$data['all_admin'] = $this->m_admin->m_data_admin_by_id($id_admin);
		echo json_encode($data['all_admin']);
	}

	public function data_desa()
	{
		header('Content-Type: application/json');
		$data['all_desa'] = $this->m_admin->m_data_desa();
		echo json_encode($data['all_desa']);
	}


	public function simpan_persen_sales()
	{
		$id_admin = $this->input->post('id_admin');		
		$serialize = $this->input->post();
		
		$this->m_admin->update_admin($serialize,$id_admin);
		die('1');
			
	}


	public function simpan_form()
	{
		$id_admin = $this->input->post('id_admin');		

		$serialize = $this->input->post();
		unset($serialize['conf_pass_admin']);

		//var_dump($serialize["user_admin"]);

		


		if($id_admin=='')
		{
			//var_dump($serialize);

			//cek dulu email atau username apakah sudah ada
			$cek = $this->m_admin->cek_email_user($serialize["user_admin"],$serialize["email_admin"]);
			if($cek > 0)
			{
				die('0');//sudah ada email atau username
			}




			$serialize["pass_admin"]=md5($serialize["pass_admin"]);
			$this->m_admin->tambah_admin($serialize);
			die('1');
		}else{


			

			$cek_pass = $this->m_admin->cek_pass($id_admin);
			//var_dump($cek_pass);

			/************* cek apakah ganti password **************/
			if($cek_pass==$serialize["pass_admin"])
			{				
				
				
				//echo json_encode($serialize);
				$a = $this->m_admin->update_admin($serialize,$id_admin);

				

				die('1');
			}else{
				$serialize["pass_admin"]=md5($serialize["pass_admin"]);
				$this->m_admin->update_admin($serialize,$id_admin);
				die('1');
			}


		}
		
		

	}

	public function hapus_admin_by_id($id_admin)
	{
		$this->db->query("DELETE FROM tbl_admin WHERE id_admin='$id_admin'");
	}


}
