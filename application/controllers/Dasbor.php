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
			case 'admin':
				$this->_tampilDasborAdmin();
				break;

			case 'freelancer':
				$this->_tampilDasborFreelancer();
				break;

			case 'umkm':
				$this->_tampilDasborUmkm();
				break;
		}
	}

	/**
	 * Menampilkan dasbor untuk user level admin
	 */
	private function _tampilDasborAdmin()
	{
		// $data     = $this->Model_dasbor->getRingkasan();

		// $data = array(
		// 	'jumlah_umkm'       => $this->db->count_all('umkm'),
		// 	'jumlah_user'       => $this->db->count_all('user'),
		// 	'jumlah_freelancer' => $this->db->get_where('user', 'level = freelancer')->num_rows(),
		// );

		return $this->load->view('admin/dasbor');
	}

	private function _tampilDasborFreelancer()
	{
		// return $this->load->view('freelancer/dasbor');
	}

	private function _tampilDasborUmkm()
	{
		return $this->load->view('umkm/dasbor');
	}
}

