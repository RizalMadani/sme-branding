<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produk extends CI_Model {
	
	/**
	 * Ambil data produk berdasarkan id_produk
	 * 
	 * @param    int|string $id_produk  id_produk
	 * 
	 * @return   object
	 */
	public function getPemesanan($id_produk)
	{
		$id_produk = $this->db->escape($id_produk);

		return $this->db->query("SELECT * FROM produk WHERE id_produk = ".$id_produk)->row();
	}

	/**
	 * Ambil semua data produk
	 * 
	 * @param    int|sttring $id_produk  id_produk
	 * 
	 * @return   object
	 */
	public function getAllPemesanan()
	{
		return $this->db->query("SELECT * FROM produk")->result();
	}

	/**
	 * Masukan data ke tabel produk
	 * 
	 * @param    array  $data Data yang mau dimasukan
	 * 
	 * @return   int          id_produk data yang baru di-insert
	 */
	public function insert($data)
	{
		$this->db->insert('produk', $data);

		return $this->db->insert_id();
	}
}
