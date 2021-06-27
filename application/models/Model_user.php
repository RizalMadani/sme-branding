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
		$user  = $this->db->query("SELECT * FROM user WHERE id_user = ".$this->db->escape($id_user))->row();

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

	public function getAllPengelola()
	{
		return $this->db->query("SELECT id_user, nama FROM user WHERE level = 'pengelola'")->result();
	}

	public function getAllFreelancer()
	{
		return $this->db->query("SELECT id_user, nama FROM user WHERE level = 'freelancer'")->result();
	}

	public function insert_user($data)
	{
		return $this->db->insert('user',$data);
	}

	public function findIDUser()
	{
		return $this->db->query("SELECT (id_user+1) as iduser FROM user ORDER BY id_user DESC")->row();
	}

	public function getFreelancer($id)
	{
		return $this->db->query("SELECT * FROM freelancer_data WHERE id_user ='$id'")->row();
	}

	public function updateUser($data,$id){
	 $this->db->where('id_user',$id);
	 $o = $this->db->update('user',$data);
	 return $o;
	}

	public function updateFree($data,$id){
	 $this->db->where('id_user',$id);
	 $o = $this->db->update('freelancer_data',$data);
	 return $o;
	}

	public function updateUMKM($data,$id){
	 $this->db->where('id_user',$id);
	 $o = $this->db->update('umkm',$data);
	 return $o;
	}

	public function getDataPengelola($id)
	{
		return $this->db->query("SELECT * FROM user WHERE level='pengelola' AND id_user!='$id'")->result();
	}

	public function insert_freelancer($data)
	{
		return $this->db->insert('freelancer_data',$data);
	}

	public function getDataFreelancer()
	{
		return $this->db->query("SELECT * FROM user JOIN freelancer_data USING(id_user) WHERE level='freelancer'")->result();
	}

	public function getDataUMKM()
	{
		return $this->db->query("SELECT * FROM user JOIN umkm USING(id_user) WHERE level='umkm'")->result();
	}

	public function jumlah_freelancer()
	{
		return $this->db->query("SELECT COUNT(id_user) as hasil FROM user WHERE level='freelancer'")->row();
	}

	public function jumlah_pengelola()
	{
		return $this->db->query("SELECT COUNT(id_user) as hasil FROM user WHERE level='pengelola'")->row();
	}

	public function jumlah_pemesanan_pending()
	{
		return $this->db->query("SELECT COUNT(id_pesan) as hasil FROM pemesanan WHERE status ='pending'")->row();
	}

	public function jumlah_pemesanan_ongoing()
	{
		return $this->db->query("SELECT COUNT(id_pesan) as hasil FROM pemesanan WHERE status ='on going'")->row();
	}

	public function jumlah_pemesanan_selesai()
	{
		return $this->db->query("SELECT COUNT(id_pesan) as hasil FROM pemesanan WHERE status ='approval'")->row();
	}

	public function jumlah_transaksi()
	{
		return $this->db->query("SELECT COUNT(id_transaksi) as hasil FROM transaksi")->row();
	}

	public function jumlahPesananFreelancer($id)
	{
		return $this->db->query("SELECT COUNT(id_pesan) as hasil FROM pemesanan WHERE id_freelancer = '$id'")->row();
	}

	public function jumlahPesananOngoing($id)
	{
		return $this->db->query("SELECT COUNT(id_pesan) as hasil FROM pemesanan WHERE id_freelancer = '$id' AND status = 'on going'")->row();
	}

	public function jumlahPesananReview($id)
	{
		return $this->db->query("SELECT COUNT(id_pesan) as hasil FROM pemesanan WHERE id_freelancer = '$id' AND status = 'review'")->row();
	}

	public function jumlahPesananApproval($id)
	{
		return $this->db->query("SELECT COUNT(id_pesan) as hasil FROM pemesanan WHERE id_freelancer = '$id' AND status = 'approval'")->row();
	}
}
