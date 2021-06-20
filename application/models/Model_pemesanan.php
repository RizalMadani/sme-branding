<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pemesanan extends CI_Model {

	/**
	 * Ambil data pemesanan berdasarkan id_pesan
	 *
	 * @param    int|string  $id_pesan  id_pesan
	 *
	 * @return   object
	 */
	public function getPemesanan($id_pesan)
	{
		$id_pesan = $this->db->escape($id_pesan);

		$query =  $this->db->query("SELECT pemesanan.*, l.*, pr.*, u.*, p.nama AS nama_pengelola, f.nama AS nama_freelancer
			FROM pemesanan
			LEFT JOIN user AS p ON(p.id_user = pemesanan.id_pengelola)
			LEFT JOIN user AS f ON(f.id_user = pemesanan.id_freelancer)
			JOIN layanan AS l USING(id_layanan)
			JOIN produk AS pr USING(id_produk)
			JOIN umkm AS u USING(id_umkm)
			WHERE id_pesan = ".$id_pesan
		);

		return $query->row();
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
		$query = $this->db->query("SELECT pemesanan.*, l.*, pr.*, u.*, p.nama AS pengelola, f.nama AS freelancer
			FROM pemesanan
			LEFT JOIN user AS p ON(p.id_user = pemesanan.id_pengelola)
			LEFT JOIN user AS f ON(f.id_user = pemesanan.id_freelancer)
			JOIN layanan AS l USING(id_layanan)
			JOIN produk AS pr USING(id_produk)
			JOIN umkm AS u USING(id_umkm)
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
	 * @param    array  $data  Data yang mau dimasukan
	 *
	 * @return   int           id_pesan data yang baru di-insert
	 */
	public function insert($data)
	{
		$this->db->insert('pemesanan', $data);

		return $this->db->insert_id();
	}

	public function getDataRiwayatFreelancerLunas($id)
	{
		return $this->db->query("SELECT * FROM pemesanan JOIN hasil_pemesanan USING(id_pesan) JOIN gaji ON(gaji.id_user = pemesanan.id_freelancer) WHERE id_freelancer='$id' AND gaji.status = 'lunas'")->result();
	}

	public function getDataRiwayatFreelancerBelumLunas($id)
	{
		return $this->db->query("SELECT * FROM pemesanan JOIN hasil_pemesanan USING(id_pesan) JOIN gaji ON(gaji.id_user = pemesanan.id_freelancer) WHERE id_freelancer='$id' AND gaji.status = 'pending'")->result();
	}
}


?>
