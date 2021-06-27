<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_testimoni extends CI_Model {

	/**
	 * Ambil data testimoni berdasarkan id_testimoni
	 *
	 * @param    int|string  $id_testimoni  id_testimoni
	 *
	 * @return   object
	 */
	public function getTestimoni($id_testimoni)
	{
		// Sanitasi id_testimoni untuk keamanan/security
		$id_testimoni = $this->db->escape($id_testimoni);

		$query = "SELECT testimoni.*, l.*, pr.*, u.*, p.nama AS nama_pengelola, f.nama AS nama_freelancer
			FROM testimoni
			LEFT JOIN user AS p ON(p.id_user = testimoni.id_pengelola)
			LEFT JOIN user AS f ON(f.id_user = testimoni.id_freelancer)
			JOIN layanan AS l USING(id_layanan)
			JOIN produk AS pr USING(id_produk)
			JOIN umkm AS u USING(id_umkm)
			WHERE id_testimoni = ".$id_testimoni;

		$result =  $this->db->query($query);

		return $result->row();
	}

	/**
	 * Ambil semua data testimoni
	 *
	 * @param    string       $order     urutan data, default DESCs
	 *
	 * @return   object
	 */
	public function getAllTestimoni($order = 'DESC')
	{
		$query = "SELECT testimoni.*, l.*, pr.*, u.*, p.nama AS pengelola, f.nama AS freelancer
			FROM testimoni
			LEFT JOIN user AS p ON(p.id_user = testimoni.id_pengelola)
			LEFT JOIN user AS f ON(f.id_user = testimoni.id_freelancer)
			JOIN layanan AS l USING(id_layanan)
			JOIN produk AS pr USING(id_produk)
			JOIN umkm AS u USING(id_umkm)
			ORDER BY id_testimoni ".$order;

		$result = $this->db->query($query);

		return $result->result();
	}

	/**
	 * Ambil semua data testimoni
	 *
	 * @param    string|int  $limit     batas data yang mau diambil, default 2
	 * @param    string      $order     urutan data, default DESCs
	 *
	 * @return   object
	 */
	public function getTestimoniForLandingPage($limit = 2, $order = 'DESC')
	{
		$query = "SELECT *, umkm.nama_umkm, user.nama
			FROM testimoni
			JOIN umkm USING(id_umkm)
			JOIN user USING(id_user)
			ORDER BY id_testimoni $order
			LIMIT $limit";

		$result = $this->db->query($query);

		return $result->result();
	}

	/**
	 * Masukan data ke tabel testimoni
	 *
	 * @param    array  $data  Data yang mau dimasukan
	 *
	 * @return   int           id_testimoni data yang baru di-insert
	 */
	public function insert($data)
	{
		$this->db->insert('testimoni', $data);

		return $this->db->insert_id();
	}

	public function getDataTestimoni()
	{
		return $this->db->query("SELECT * FROM testimoni JOIN umkm USING(id_umkm)")->result();
	}

	public function delete_testimoni($id){
		$this->db->where('id_testimoni',$id);
		return $this->db->delete('testimoni');
	}

}
