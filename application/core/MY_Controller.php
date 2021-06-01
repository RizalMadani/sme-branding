<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_controller {

	public function __construct()
	{
		parent::__construct();

		$urlLevel = $this->uri->segment(1);

		if ($urlLevel !== 'admin' && $urlLevel !== 'freelancer' && $urlLevel !== 'umkm') {
			return;
		}

		if ( ! $this->_isLoggedIn()) {
			redirect('login');
		}

		if (! $this->_isAuthorized($urlLevel)) {
			redirect('login');
		}
	}

	private function _isLoggedIn()
	{
		if ($this->session->has_userdata('id_user')) {
			return TRUE;
		}


		$this->load->helper('cookie');
		$token = get_cookie('token');

		if (! $token) {
			return FALSE;
		}


		$this->load->model('Model_token');
		$tokenInfo = $this->Model_token->getInfo($token);

		if (! $tokenInfo) {
			return FALSE;
		}

		$kedaluarsa = strtotime($tokenInfo->wkt_dibuat) + (int) $tokenInfo->durasi;
		$sekarang   = new DateTime(); // TODO: cek waktu sekarang sesuai waktu lokal atau tidak
		$sekarang   = $sekarang->getTimeStamp();

		if ($sekarang > $kedaluarsa) {
			return FALSE;
		}

		$this->session->id_user   = $tokenInfo->id_user;
		$this->session->regen     = 1;
		$this->session->id_token  = $tokenInfo->id_token;

		return TRUE;
	}

	private function _isAuthorized($urlLevel)
	{
		$this->load->model('Model_user');

		$user  = $this->Model_user->getUser($this->session->id_user);
		$level = user_level($user->level);

		// cek jika user level tidak sama dengan $urlLevel
		if (strcmp($level, $urlLevel) !== 0) {
			return FALSE;
		}

		$this->session->level     = $level;
		$this->session->foto_user = $user->foto;

		return TRUE;
	}
}
