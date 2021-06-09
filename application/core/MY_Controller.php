<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_controller {

	public function __construct()
	{
		parent::__construct();

		/**
		 * Level yang tertera pada url
		 * 
		 * Contoh: localhost/admin/dasbor -> $urlLevel = admin
		 */
		$urlLevel = $this->uri->segment(1);

		if ($urlLevel !== 'admin' && $urlLevel !== 'freelancer' && $urlLevel !== 'umkm') {
			return;
		}

		if ( ! $this->_isLoggedIn()) {
			redirect('login');
		}

		if ( ! $this->_isAuthorized($urlLevel)) {
			redirect('login');
		}
	}

	/**
	 * Cek apakah user sudah login atau setidaknya
	 * memiliki token(smebranding_token) yang valid
	 * untuk masuk ke halaman dasbor
	 */
	private function _isLoggedIn()
	{
		// Jika id_user ada di session maka dianggap user sudah login
		if ($this->session->has_userdata('id_user')) {
			return TRUE;
		}

		// Ambil cookie smebranding_token untuk dicek
		$this->load->helper('cookie');
		$token = get_cookie('token');

		if (! $token) {
			return FALSE;
		}

		// Cek smebranding_token apakah ada dalam db
		$this->load->model('Model_token');
		$tokenInfo = $this->Model_token->getInfo($token);

		if (! $tokenInfo) {
			return FALSE;
		}

		$kedaluarsa = strtotime($tokenInfo->wkt_dibuat) + (int) $tokenInfo->durasi;
		$sekarang   = new DateTime(); // TODO: cek waktu sekarang sesuai waktu lokal atau tidak
		$sekarang   = $sekarang->getTimeStamp();

		// Cek apakah smebranding_token masih valid/belum kedaluarsa
		if ($sekarang > $kedaluarsa) {
			return FALSE;
		}

		// Jika smebranding_token valid maka set beberapa session penting
		$this->session->id_user   = $tokenInfo->id_user;
		$this->session->regen     = 1;
		$this->session->id_token  = $tokenInfo->id_token;

		return TRUE;
	}

	/**
	 * Cek apakah user mengakses halaman
	 * sesuai dengan levelnya
	 * 
	 * @param    string    $urlLevel    Level yang tertera pada url (lihat constuctor di atas)
	 */
	private function _isAuthorized($urlLevel)
	{
		$this->load->model('Model_user');

		$user  = $this->Model_user->getUser($this->session->id_user);
		$level = user_level($user->level);

		// Cek jika user level tidak sama dengan $urlLevel
		if (strcmp($level, $urlLevel) !== 0) {
			return FALSE;
		}

		// Set level dan foto user ke session jika belum ada di session
		if ( ! $this->session->has_userdata('level')) {
			$this->session->level     = $level;
			$this->session->foto_user = $user->foto;
		}

		// Jika level user adalah umkm maka set id_umkm ke session jika belum ada
		if ($level === 'umkm' && ! $this->session->has_userdata('id_umkm')) {
			$this->load->model('Model_umkm');

			$this->session->id_umkm = $this->Model_umkm->getIdUmkm($user->id_user);
		}

		return TRUE;
	}
}
