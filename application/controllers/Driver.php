<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('parser');
		$this->load->library('form_validation');
		$this->load->model('Mod_driver','mDriver');
		
		if($this->session->userdata('logged_in') == FALSE){
			redirect("login");
		}
	}

	public function index()
	{
		$data = array(			
			'breadcrumb' => 'Driver'
		);
		$res = $this->mDriver->get();
		
		$data['page'] = $this->load->view('page/pengemudi/list',array('data_driver'=>$res),true);
		$this->parser->parse('template/layout_admin',$data);				        
	}

	public function tambah()
	{
		$data = array(			
			'breadcrumb' => 'Driver / Tambah',
	        'dropdown_master' => ''
		);
		$data['page'] = $this->load->view('page/pengemudi/form',array(),true);
		$this->parser->parse('template/layout_admin',$data);	
	}

	public function doSimpan()
	{
		$this->form_validation->set_rules('txtNama', 'Nama', 'required');
		$this->form_validation->set_rules('txtJK', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('txtUsia', 'Usia', 'required');
		$this->form_validation->set_rules('txtAlamat', 'Alamat', 'required');
		$this->form_validation->set_rules('txtNoTelp', 'Nomor Telepon', 'required');

		if ($this->form_validation->run() == TRUE){
			$nama = $this->input->post('txtNama');
			$jk = $this->input->post('txtJK');
			$usia = $this->input->post('txtUsia');
			$alamat = $this->input->post('txtAlamat');
			$no_telp = $this->input->post('txtNoTelp');

			$data = array(
				'nama'=>$nama,
				'jk'=>$jk,
				'usia'=>$usia,
				'alamat'=>$alamat,
				'no_telp'=>$no_telp
			);

			$res = $this->mDriver->simpan($data);

			if ($res > 0) {
				$this->session->set_flashdata('alert_true', 'collapse');
				$this->session->set_flashdata('message', 'Alhamdulillah...');
				redirect('driver');
			}else{
				echo "Teu Eucreug";
			}			
		}else{
			$this->session->set_flashdata('alert_true', 'collapse');
			$this->session->set_flashdata('message', validation_errors());
			redirect('driver/tambah');
		}

	}

	public function edit($id)
	{
		$res = $this->mDriver->detail($id);
		$data = array(			
			'breadcrumb' => 'Driver / Edit',
	        'dropdown_master' => ''
		);
		$data['page'] = $this->load->view('page/pengemudi/form',array('data_detail'=>$res),true);
		$this->parser->parse('template/layout_admin',$data);
	}

	public function doUpdate($id)
	{
		$this->form_validation->set_rules('txtNama', 'Nama', 'required');
		$this->form_validation->set_rules('txtJK', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('txtUsia', 'Usia', 'required');
		$this->form_validation->set_rules('txtAlamat', 'Alamat', 'required');
		$this->form_validation->set_rules('txtNoTelp', 'Nomor Telepon', 'required');

		if ($this->form_validation->run() == TRUE){
			$nama = $this->input->post('txtNama');
			$jk = $this->input->post('txtJK');
			$usia = $this->input->post('txtUsia');
			$alamat = $this->input->post('txtAlamat');
			$no_telp = $this->input->post('txtNoTelp');

			$data = array(
				'nama'=>$nama,
				'jk'=>$jk,
				'usia'=>$usia,
				'alamat'=>$alamat,
				'no_telp'=>$no_telp
			);

			$res = $this->mDriver->update($id,$data);

			if ($res > 0) {
				$this->session->set_flashdata('alert_true', 'collapse');
				$this->session->set_flashdata('message', 'Alhamdulillah...');
				redirect('driver');
			}else{
				echo "Teu Eucreug";
			}
		}else{
			$this->session->set_flashdata('alert_true', 'collapse');
			$this->session->set_flashdata('message', validation_errors());
			redirect('driver/edit/'.$id);
		}
	}

	public function doHapus($id)
	{
		$res = $this->mDriver->hapus($id);
		if ($res > 0) {
			$this->session->set_flashdata('alert_true', 'collapse');
			$this->session->set_flashdata('message', 'Alhamdulillah... Hapus data berhasil');
			redirect('driver');
		}else{
			echo "gagal";
		}
	}

}
