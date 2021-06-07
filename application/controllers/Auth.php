<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller untuk mengatur autentikasi user
 * 
 * Login, logout, verifikasi.
 */
class Auth extends CI_Controller {

	/**
	 * Login
	 * 
	 * Method untuk menampilkan halaman login
	 * dan verifikasi login
	 */
	public function login()
	{
		if ($this->input->method() !== 'post') {
			return $this->load->view('login', ['title' => 'Login']);
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() == FALSE) {
			return $this->load->view('login', ['title' => 'Login']);
		}


		$username   = $this->input->post('username');
		$password   = $this->input->post('password');
		$rememberMe = $this->input->post('remember-me');
		
		$this->load->model('Model_user');
		$user  = $this->Model_user->cekUser($username);

		if (empty($user) || ! password_verify($password, $user->password)) {
			$this->alert->alertDanger('Username atau Password kurang tepat');

			log_message('debug', 'Password not correct');

			return $this->load->view('login', ['title' => 'Login']);
		}

		$userLevel = user_level($user->level);
		$this->session->id_user = $user->id_user;
		$this->session->level   = $userLevel;

		$this->_rememberMe($rememberMe);

		redirect($userLevel.'/dasbor');
	}

	/**
	 * Logout user
	 */
	public function logout()
	{
		session_destroy();
		
		$this->load->helper('cookie');
		delete_cookie('token');

		redirect('login');
	}

	// ---------------------------------

	/**
	 * Remember Me, Biarkan Saya Tetap Masuk
	 * 
	 * Method untuk mengecek apakah user menceklis "Biarkan Saya tetap masuk" /
	 * "Remember me" dan untuk mengelola token login
	 * 
	 * @param    mixed    $isChecked    Apakah user menceklist "Remember Me"?
	 */
	private function _rememberMe($isChecked)
	{
		if (! $isChecked) {
			return;
		}

		$newToken = bin2hex(random_bytes(16));
		$durasi = 60 * 60 * 24; // satu hari // TODO: ganti ini ke config

		$this->load->helper('cookie');
		set_cookie('token', $newToken, $durasi);

		$dataToken = array(
			'id_user' => $this->session->id_user,
			'token'   => $newToken,
			'durasi'  => $durasi
		);

		$this->db->insert('token', $dataToken);
	}
}
