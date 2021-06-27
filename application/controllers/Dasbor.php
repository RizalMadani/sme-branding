<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends MY_Controller {

	/**
	 * Method untuk mengecek level user
	 * dan menampilkan halaman dasbor yang sesuai
	 */
	public function index()
	{
		$level = $this->session->level;

		if (empty($level)) {
			redirect('login');
		}

		switch ($level) {
			case 'pengelola':
				$this->_tampilDasborAdmin();
				break;

			case 'freelancer':
				$this->_tampilDasborFreelancer();
				break;

			case 'umkm':
				$this->_tampilDasborUmkm();
				break;
			default:
				show_error('Invalid Login', 403);
		}
	}

	/**
	 * Menampilkan dasbor untuk user level admin
	 */
	private function _tampilDasborAdmin()
	{
		$this->load->model('Model_user');
		$this->load->model('Model_transaksi');
		$id_user = $this->session->id_user;
		// $data     = $this->Model_dasbor->getRingkasan();
		$data = array(
			'jumlah_umkm'       => $this->db->count_all('umkm'),
			'jumlah_user'       => $this->db->count_all('user'),
			'jumlah_freelancer' => $this->Model_user->jumlah_freelancer(),
			'jumlah_admin'			=> $this->Model_user->jumlah_pengelola(),
			'jumlah_pending'		=> $this->Model_user->jumlah_pemesanan_pending(),
			'jumlah_ongoing'		=> $this->Model_user->jumlah_pemesanan_ongoing(),
			'jumlah_selesai'		=> $this->Model_user->jumlah_pemesanan_selesai(),
			'jumlah_transaksi'	=> $this->Model_user->jumlah_transaksi(),
			'user' => $this->Model_user->getUser($id_user),
			'dataumkm'					=> $this->Model_user->getDataUMKM(),
			'datapesanan'				=> $this->Model_transaksi->getPemesanan()
		);
		return $this->load->view('admin/dasbor',$data);
	}

	private function _tampilDasborFreelancer()
	{
		$this->load->model('Model_user');
		$id_user = $this->session->id_user;
    $data = array(
      'user' => $this->Model_user->getUser($id_user),
			'jumlah_pesanan' => $this->Model_user->jumlahPesananFreelancer($id_user),
			'ongoing'				 => $this->Model_user->jumlahPesananOngoing($id_user),
			'review'				 => $this->Model_user->jumlahPesananReview($id_user),
			'approval'		   => $this->Model_user->jumlahPesananApproval($id_user)
    );
		return $this->load->view('freelancer/dasbor',$data);
	}

	private function _tampilDasborUmkm()
	{
		// $data     = $this->Model_dasbor->getRingkasan();
		$this->load->model('Model_produk');
		$this->load->model('Model_pemesanan');

		$idUmkm = $this->session->id_umkm;

		$data = array(
			'produk'  => $this->Model_produk->getProdukUmkm($idUmkm),
			'pesanan' => $this->Model_pemesanan->getPemesananUmkm($idUmkm, 5),
		);

		$this->load->helper('text');
		return $this->load->view('umkm/dasbor', $data);
	}
}
