<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model untuk mengelola token
 * 
 * Token digunakan untuk memastikan user masih bisa login
 * dalam jangka waktu tertentu
 */
class Model_token extends CI_Model {

	/**
	 * Method untuk mengambil informasi sebuah token
	 * 
	 * @param    string    $token    Token yang ingin dicari
	 */
	public function getInfo(string $token)
	{
		$token = $this->db->escape($token);

		return $this->db->query("SELECT * FROM token WHERE token = ".$token)->row();
	}
}
