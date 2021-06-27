<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produk extends CI_Model {
	
	/**
	 * Ambil data produk berdasarkan id_produk
	 * 
	 * @param    int|string  $id_produk  id_produk
	 * 
	 * @return   object
	 */
	public function getProduk($id_produk)
	{
		$id_produk = $this->db->escape($id_produk);

		return $this->db->query("SELECT * FROM produk WHERE id_produk = ".$id_produk)->row();
	}

	/**
	 * Ambil semua data produk
	 * 
	 * @return   object
	 */
	public function getAllProduk()
	{
		return $this->db->query("SELECT * FROM produk")->result();
	}

	/**
	 * Ambil file-file image sebuah produk
	 * 
	 * (foto, logo, kemasan)
	 * 
	 * @param    int|string  $id_produk  id_produk
	 * 
	 * @return   object
	 */
	public function getFile($id_produk)
	{
		$id_produk = $this->db->escape($id_produk);

		$foto_produk    = $this->db->query("SELECT foto FROM foto_produk WHERE id_produk = ".$id_produk)->result();
		$logo_produk    = $this->db->query("SELECT logo FROM logo_produk WHERE id_produk = ".$id_produk)->result();
		$kemasan_produk = $this->db->query("SELECT foto_kemasan FROM kemasan_produk WHERE id_produk = ".$id_produk)->result();

		$data = (object) [
			'foto_produk' => $foto_produk,
			'logo_produk' => $logo_produk,
			'kemasan_produk' => $kemasan_produk,
		];

		return $data;
	}

	public function getProdukUmkm($id_umkm)
	{
		$id_produk = $this->db->escape($id_umkm);

		$result = $this->db->query("SELECT * FROM produk WHERE id_umkm = $id_umkm")->result();

		return $result;
	}

	/**
	 * Masukan data ke tabel produk
	 * 
	 * @param    array  $data  Data yang mau di-insert
	 * 
	 * @return   int           id_produk data yang baru di-insert
	 */
	public function insert($data)
	{
		$this->db->insert('produk', $data);

		return $this->db->insert_id();
	}

	public function update($id_produk, $data)
	{
		$this->db->where('id_produk', $id_produk);
		$this->db->update('produk', $data);
	}
}
