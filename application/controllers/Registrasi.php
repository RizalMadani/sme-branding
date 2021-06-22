<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Controller untuk mengurusi registrasi
 *
 * Registrasi UMKM, registrasi Freelancer
 */
class Registrasi extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Model_user');

        $this->load->library('form_validation');
    }

	public function regUmkm()
	{
		// Jika method regUmkm() diakses bukan melalui submit form
		// maka tampilkan halaman form registrasi UMKM
		if ($this->input->method() !== 'post') {
			return $this->load->view('register_umkm', ['title' => 'Daftar UMKM']);
		}


		// -----------------------
		// Proses registrasi UMKM
		// -----------------------
		$namalengkap = $this->input->post('nama');
		$username    = $this->input->post('username');
		$password    = $this->input->post('password');
		$namaumkm    = $this->input->post('namaumkm');
		$email       = $this->input->post('email');
		$noWA        = $this->input->post('no_wa');

		$idk = $this->Model_user->findIDUser();
		$data = array (
			'id_user'  => $idk->iduser,
			'username' => $username,
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'nama'     => $namalengkap,
			'email'    => $email,
			'no_wa'    => $noWA,
			'level'    => 'umkm',
			'foto'     => 'umkm.png',
			'status'   => '1'
		);

		$dataumkm = array(
			'id_user' => $idk->iduser,
		);

		$cek = $this->Model_user->insert_user($data);

		if ($cek) {
			$this->load->model('Model_umkm');
			$cekumkm = $this->Model_umkm->insert_umkm($dataumkm);
			if ($cekumkm) {
				redirect('login');
			}
		}
	}

	public function regFreelancer()
	{
		// Jika method regFreelancer() diakses bukan melalui submit form
		// maka tampilkan halaman form registrasi UMKM
		if ($this->input->method() !== 'post') {
			return $this->load->view('register_freelancer', ['title' => 'Daftar Freelancer']);
		}


		// -----------------------------
		// Proses registrasi Freelancer
		// -----------------------------
		$namalengkap = $this->input->post('nama');
		$username    = $this->input->post('username');
		$password    = $this->input->post('password');
		$email       = $this->input->post('email');
		$keahlian    = $this->input->post('kategori');
		$keterangan    = $this->input->post('keterangank');
		$noWA        = $this->input->post('no_wa');

		$idk = $this->Model_user->findIDUser();
		$data = array (
			'id_user' => $idk->iduser,
			'username' => $username,
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'nama'     => $namalengkap,
			'email'    => $email,
			'no_wa'    => $noWA,
			'level'    => 'freelancer',
			'foto'     => 'freelancer.png',
			'status'   => '1'
		);

		$dataf = array(
				'id_user' => $idk->iduser,
				'kategori_keahlian' => $keahlian,
				'keterangan' => $keterangan
		);

		$cek = $this->Model_user->insert_user($data);

		if ($cek) {
			$input = $this->Model_user->insert_freelancer($dataf);
			if ($input) {
				redirect('login');
			}
		}
	}

	public function signup()
	{
		redirect('login');
	}
}
