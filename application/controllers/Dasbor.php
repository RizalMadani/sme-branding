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
		$id_user = $this->session->id_user;
		// $data     = $this->Model_dasbor->getRingkasan();
		$data = array(
			// 'jumlah_umkm'       => $this->db->count_all('umkm'),
			// 'jumlah_user'       => $this->db->count_all('user'),
			// 'jumlah_freelancer' => $this->db->get_where('user', 'level = freelancer')->num_rows(),
			  'user' => $this->Model_user->getUser($id_user),
		);

		return $this->load->view('admin/dasbor',$data);
	}

	private function _tampilDasborFreelancer()
	{
		$this->load->model('Model_user');
		$id_user = $this->session->id_user;
    $data = array(
      'user' => $this->Model_user->getUser($id_user),
    );
		return $this->load->view('freelancer/dasbor',$data);
	}

	private function _tampilDasborUmkm()
	{
		// $data     = $this->Model_dasbor->getRingkasan();

		$data = array(
			'jumlah_umkm'       => $this->db->count_all('umkm'),
			'jumlah_user'       => $this->db->count_all('user'),
			'jumlah_freelancer' => $this->db->get_where('user', ['level' => 'freelancer'])->num_rows(),
		);

		return $this->load->view('umkm/dasbor', $data);
	}
}
