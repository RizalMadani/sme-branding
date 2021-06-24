<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_pemesanan');
	}

	public function lihatPemesanan($status = '')
	{
		$status = $this->_cekValiditasStatus($status);

		if($status === FALSE) {
			show_error('Status pemesanan tidak valid', 404);
		}


		$data = array(
			'pemesanan' => $this->Model_pemesanan->getPemesananByStatus($status),
			'status' => $status
		);

		$this->load->view('admin/kelolapemesanan', $data);
	}

	public function lihatDetail($idPesan)
	{
		$pemesanan = $this->Model_pemesanan->getPemesanan($idPesan);

		// Proses ambil file-file gambar produk (foto, logo, kemasan)
		$this->load->model('Model_produk');
		$gambar = $this->Model_produk->getFile($pemesanan->id_produk);

		$this->load->model('Model_user');
		$pengelola = $this->Model_user->getAllPengelola();
		$freelancer = $this->Model_user->getAllFreelancer();

		$data = array(
			'pemesanan' => $pemesanan,
			'gambar'    => $gambar,
			'pengelola' => $pengelola,
			'freelancer' => $freelancer,
			'list_status'     => ['pending', 'mencari freelancer', 'on going', 'review', 'revisi', 'approval']
		);

		// dd($data);

		$this->load->view('admin/lihatpemesanan', $data);
	}

	public function editPengelola($idPesan)
	{
		$data = array(
			'id_pengelola' => $this->input->post('pengelola')
		);

		$this->db->where('id_pesan', $idPesan);
		$this->db->update('pemesanan', $data);

		redirect('Pengelola/Pemesanan/lihatDetail/'.$idPesan);
	}



	//--------------------

	private function _cekValiditasStatus($status)
	{
		if ($status === '') {
			return;
		}

		switch($status)
		{
			case 'pending':
				return 'pending';
			
			case 'mencari-freelancer':
				return 'mencari freelancer';
			
			case 'on-going':
				return 'on going';
			
			case 'review':
				return 'review';

			case 'revisi':
				return 'revisi';
			
			case 'approval':
				return 'approval';
			
			default:
				return FALSE;
		}
	}
}
