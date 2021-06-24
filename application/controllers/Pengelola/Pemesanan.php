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

		$data = array(
			'pemesanan' => $pemesanan,
			'gambar'    => $gambar
		);

		// dd($data);

		$this->load->view('admin/lihatpemesanan', $data);
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
