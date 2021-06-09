<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model untuk kebutuhan manipulasi data user
 * dan juga digunakan untuk autentikasi user
 */
class Model_umkm extends CI_Model {

	/**
	 * Ambil data umkm berdasarkan id_user
	 *
	 * @param    mixed    $id_user    id_user dari pemilik umkm
	 *
	 * @return   object   $umkm       data user
	 */
	public function getUser($id_user)
	{
		$umkm  = $this->db->query("SELECT * FROM umkm WHERE id_user = ".$this->db->escape($id_user))->row();

		return $umkm;
	}

	/**
	 * Method untuk cek user
	 *
	 * Cek apakah ada username dalam database.
	 *
	 * @param    string    $username    Username dari inputan login
	 */
	public function getIdUmkm($id_user)
	{
		$id_user = $this->db->escape($id_user);

		return $this->db->query("SELECT id_user FROM umkm WHERE id_user = ".$id_user)->row();
	}
}
