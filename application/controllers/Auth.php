<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller untuk mengatur autentikasi user
 * 
 * Login, logout, verifikasi.
 */
class Auth extends CI_Controller {
	
	/**
	 * Menampilkan halaman login
	 */
	public function login()
	{
		$this->load->view('login');
	}

	/**
	 * Method untuk verifikasi login
	 */
	public function verify()
	{
		if ($this->input->method() !== 'post') {
			show_404();
		}

		$this->load->model('Model_user');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() == FALSE) {
			return redirect('login');
		}


		$username   = $this->input->post('username');
		$password   = $this->input->post('password');
		$rememberMe = $this->input->post('remember-me');
		
		$user  = $this->Model_user->cekUser($username);

		if (! password_verify($password, $user->password)){
			$_SESSION['alert'] = '<div class="text-danger" style="text-align:center;">Username atau Password kurang tepat</div>';
			$this->session->mark_as_flash('alert');

			log_message('debug', 'Password not correct');

			redirect('login');

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
