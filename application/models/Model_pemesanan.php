<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pemesanan extends CI_Model {

	/**
	 * Ambil data pemesanan berdasarkan id_pesan
	 *
	 * @param    int|string $id_pesan  id_pesan
	 *
	 * @return   object
	 */
	public function getPemesanan($id_pesan)
	{
		$id_pesan = $this->db->escape($id_pesan);

		return $this->db->query("SELECT * FROM pemesanan WHERE id_pesan = ".$id_pesan)->row();
	}

	/**
	 * Ambil semua data pemesanan
	 *
	 * @param    string       $order     urutan data, default DESCs
	 *
	 * @return   object
	 */
	public function getAllPemesanan($order = 'DESC')
	{
		$query = $this->db->query("SELECT *
			FROM pemesanan
			JOIN layanan USING(id_layanan)
			JOIN produk USING(id_produk)
			ORDER BY id_pesan ".$order
		);

		return $query->result();
	}

	public function getPemesananUmkm($id_umkm = '')
	{
		$this->db->join('layanan', 'id_layanan');
		$this->db->join('produk', 'id_produk');
		$this->db->where('id_umkm', $id_umkm);
		$this->db->order_by('id_pesan', 'desc');
		$result = $this->db->get('pemesanan');

		return $result->result();
	}

	/**
	 * Masukan data ke tabel pemesanan
	 *
	 * @param    array  $data Data yang mau dimasukan
	 *
	 * @return   int          id_pesan data yang baru di-insert
	 */
	public function insert($data)
	{
		$this->db->insert('pemesanan', $data);

		return $this->db->insert_id();
	}
}
