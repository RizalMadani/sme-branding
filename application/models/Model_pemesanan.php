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
		// Sanitasi id_pesan untuk keamanan/security
		$id_pesan = $this->db->escape($id_pesan);

		$query = "SELECT pemesanan.*, l.*, pr.*, u.*, p.nama AS nama_pengelola, f.nama AS nama_freelancer
			FROM pemesanan
			LEFT JOIN user AS p ON(p.id_user = pemesanan.id_pengelola)
			LEFT JOIN user AS f ON(f.id_user = pemesanan.id_freelancer)
			JOIN layanan AS l USING(id_layanan)
			JOIN produk AS pr USING(id_produk)
			JOIN umkm AS u USING(id_umkm)
			WHERE id_pesan = ".$id_pesan;

		$result =  $this->db->query($query);

		return $result->row();
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
		$query = "SELECT pemesanan.*, l.*, pr.*, u.*, p.nama AS pengelola, f.nama AS freelancer
			FROM pemesanan
			LEFT JOIN user AS p ON(p.id_user = pemesanan.id_pengelola)
			LEFT JOIN user AS f ON(f.id_user = pemesanan.id_freelancer)
			JOIN layanan AS l USING(id_layanan)
			JOIN produk AS pr USING(id_produk)
			JOIN umkm AS u USING(id_umkm)
			ORDER BY id_pesan ".$order;

		$result = $this->db->query($query);

		return $result->result();
	}

	public function getPemesananByStatus($status = '')
	{
		if ( ! empty($status)) {
			// $status = $this->db->escape($status);

			$this->db->where('pemesanan.status', $status);
		}

		$this->db->select('pemesanan.*, nama_layanan, pm.no_wa,nama_produk, nama_umkm, p.nama AS pengelola, f.nama AS freelancer');
		$this->db->from('pemesanan');
		$this->db->join('user AS p', 'p.id_user = pemesanan.id_pengelola', 'left');
		$this->db->join('user AS f', 'f.id_user = pemesanan.id_freelancer', 'left');
		$this->db->join('layanan AS l', 'id_layanan');
		$this->db->join('produk AS pr', 'id_produk');
		$this->db->join('umkm AS um', 'id_umkm');
		$this->db->join('user AS pm', 'pm.id_user = um.id_user');
		$this->db->order_by('id_pesan', 'desc');

		$result = $this->db->get();

		return $result->result();
	}

	public function getPemesananUmkm($id_umkm = '', $limit = '')
	{
		if ( ! empty($limit)) {
			$this->db->limit($limit);
		}

		$this->db->join('layanan', 'id_layanan');
		$this->db->join('produk', 'id_produk');
		$this->db->where('id_umkm', $id_umkm);
		$this->db->order_by('id_pesan', 'desc');
		$result = $this->db->get('pemesanan');

		return $result->result();
	}

	public function getIdProduk($id_pesan)
	{
		$id_pesan = $this->db->escape($id_pesan);

		$result = $this->db->query("SELECT id_produk FROM pemesanan WHERE id_pesan = $id_pesan")->row();

		return $result->id_produk;
	}

	/**
	 * Apakah Pesanan bisa diedit?
	 *
	 * Method untuk cek apakah pesanan memiliki status sebelum 'revisi'
	 *
	 * @param    string|int  $id_pesan    id_pesan dr pesanan yang mau dicek
	 *
	 * @return   boolean     true|false
	 */
	public function isEditable($id_pesan)
	{
		// Sanitasi id_pesan untuk keamanan/security
		$id_pesan = $this->db->escape($id_pesan);

		$query = "SELECT id_pesan
			FROM pemesanan
			WHERE id_pesan = $id_pesan
			AND status NOT IN('revisi', 'approval')";

		$result = $this->db->query($query)->row();

		// Jika hasil tidak ditemukan maka return FALSE
		if (empty($result)) {
			return FALSE;
		}

		return TRUE;
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

	public function delete_pemesanan($id){
		$this->db->where('id_pesan',$id);
		return $this->db->delete('pemesanan');
	}

	public function update_pemesanan($data,$id)
	{
	 $this->db->where('id_pesan',$id);
	 $o = $this->db->update('pemesanan',$data);
	 return $o;
	}

	public function getPemesananFreelancer($id)
	{
		return $this->db->query("SELECT * FROM pemesanan JOIN layanan USING(id_layanan) JOIN hasil_pemesanan USING(id_pesan) WHERE status ='approval' ")->result();
	}

	public function getPemesananFreelancerOnGoing($id)
	{
		return $this->db->query("SELECT * FROM pemesanan JOIN produk USING(id_produk) JOIN umkm USING(id_umkm) JOIN layanan USING(id_layanan) JOIN hasil_pemesanan USING(id_pesan) WHERE status !='approval' ")->result();
	}

}
