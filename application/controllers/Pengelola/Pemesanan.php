<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_pemesanan');
		$this->load->model('Model_layanan');
		$this->load->model('Model_user');
	}

	public function lihatPemesanan($status = '')
	{
		$status = $this->_cekValiditasStatus($status);

		if($status === FALSE) {
			show_error('Status pemesanan tidak valid', 404);
		}


		$data = array(
			'pemesanan' => $this->Model_pemesanan->getPemesananByStatus($status),
			'status' => $status,
			'layanan' => $this->Model_layanan->getLayanan(),
			'freelancer' => $this->Model_user->getDataFreelancer()
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

	public function editSingkat($idPesan, $edit)
	{
		$this->db->where('id_pesan', $idPesan);

		if ($edit === 'pengelola') {
			$data = array(
				'id_pengelola' => $this->input->post('pengelola'),
				'status'       => 'mencari freelancer'
			);
		}
		elseif ($edit === 'freelancer') {
			$data = array(
				'id_freelancer' => $this->input->post('freelancer'),
				'status'       => 'on going'
			);
		}
		elseif ($edit === 'status') {
			$data = array(
				'status' => $this->input->post('status')
			);
		}

		// dd($data);

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

	public function hapusPemesanan($id)
	{
		$cek = $this->Model_pemesanan->delete_pemesanan($id);
		redirect('Pengelola/Pemesanan/lihatPemesanan');
	}

	public function editPemesanan()
	{
		$id = $this->input->post('id');
		$id_user = $this->session->id_user;
		$data = array(
			'id_freelancer' => $this->input->post('freelancer'),
			'tgl_mulai'     => $this->input->post('tglmulai'),
			'tgl_akhir'			=> $this->input->post('tglakhir'),
			'jumlah'				=> $this->input->post('jumlah'),
			'keterangan_order' => $this->input->post('keterangan'),
			'detail_revisi'	=> $this->input->post('detailrevisi'),
			'status'				=> $this->input->post('status'),
			'id_pengelola'	=> $id_user
		);
		$cek = $this->Model_pemesanan-> update_pemesanan($data,$id);
		if ($cek) {
			redirect('Pengelola/Pemesanan/lihatPemesanan');
		}
	}
}
