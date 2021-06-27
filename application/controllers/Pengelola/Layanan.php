<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_layanan');
	}

	public function index()
	{
		$id_user = $this->session->id_user;
		$data = array(
			'user' => $this->Model_user->getUser($id_user),
			'datalayanan' => $this->Model_layanan->getLayanan()
		);
		$this->load->view('admin/kelolalayanan',$data);
	}

	public function inputLayanan()
	{
		$data = array(
			'nama_layanan' => $this->input->post('namalayanan'),
			'harga'				 => $this->input->post('harga'),
			'detail_layanan' => $this->input->post('detail')
		);
		$cek = $this->Model_layanan->insert_layanan($data);
		if ($cek) {
			redirect('pengelola/Layanan');
		}
	}

	public function updateLayanan()
	{
		$id = $this->input->post('id');
		$data = array(
			'nama_layanan' => $this->input->post('namalayanan'),
			'harga'				 => $this->input->post('harga'),
			'detail_layanan' => $this->input->post('detail')
		);
		$cek = $this->Model_layanan->update_layanan($data,$id);
		if ($cek) {
			redirect('pengelola/Layanan');
		}
	}

	public function hapusLayanan($id)
	{
		$cek = $this->Model_layanan->delete_layanan($id);
		redirect('pengelola/Layanan');
	}
}
