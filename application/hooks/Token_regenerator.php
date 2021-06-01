<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Token Regenerator
 *
 */
class Token_regenerator
{
	/**
	 * Method untuk meregenerasi token login
	 *
	 * Token ini digunakan untuk mengingat user lebih lama
	 * ketika menceklis "Biarkan Saya tetap masuk" di halaman login
	 */
	public function _regenerate()
	{
		$CI =& get_instance();

		$urlLevel = $CI->uri->segment(1);

		if ($urlLevel !== 'admin' || $urlLevel !== 'freelancer' || $urlLevel !== 'umkm') {
			return;
		}

		if (! $CI->session->has_userdata('regen')) {
			return;
		}

		$newToken = bin2hex(random_bytes(16));
		$durasi   = 60 * 60 * 24; // satu hari // TODO: ganti ini ke config

		$CI->load->helper('cookie');
		set_cookie('token', $newToken, $durasi);

		$dataToken = array(
			'id_user' => $CI->session->id_user,
			'token'   => $newToken,
			'durasi'  => $durasi
		);

		$CI->db->where('id_token', $CI->session->id_token);
		$CI->db->update('token', $dataToken);

		unset($_SESSION['regen'], $_SESSION['id_token']);
	}
}
