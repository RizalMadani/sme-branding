<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model untuk kebutuhan manipulasi data user
 * dan juga digunakan untuk autentikasi user
 */
class Model_user extends CI_Model {

	/**
	 * Ambil data user berdasarkan id_user
	 *
	 * @param    mixed    $id_user    id_user
	 *
	 * @return   object   $user       data user
	 */
	public function getUser($id_user)
	{
		$user  = $this->db->query("SELECT * FROM USER WHERE id_user = ".$this->db->escape($id_user))->row();

		unset($user->password);

		return $user;
	}

	/**
	 * Method untuk cek user
	 *
	 * Cek apakah ada username dalam database.
	 *
	 * @param    string    $username    Username dari inputan login
	 */
	public function cekUser(string $username)
	{
		$username = $this->db->escape($username);

		return $this->db->query("SELECT id_user, username, password, level FROM user WHERE username = ".$username)->row();
	}

	/**
	 * Ambil level dari user berdasarkan id_user
	 *
	 * @param    mixed    $id_user    id_user
	 */
	public function getUserLevel($id_user)
	{
		return $this->db->query("SELECT level FROM user WHERE id_user = ".$id_user)->row();
	}

	public function insert_user($data)
	{
		return $this->db->insert('user',$data);
	}
}
