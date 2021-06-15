<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends MY_Controller
{
	/**
	 * Variable yang berisi tentang
	 * data layanan dari db
	 *
	 * @var array
	 */
	private $_layanan;

	/**
	 * id_produk dari produk
	 * yang baru di-insert
	 *
	 * @var string|int
	 */
	private $_idProduk;

	// ---------------------------

	/**
	 * Tampilkan form untuk pesan layanan
	 *
	 * Atau melakukan proses insert inputan user
	 */
	public function pesanLayanan()
	{
		// Ambil data layanan dari database
		$this->_layanan = $this->db->get('layanan')->result();

		if ($this->input->method() === 'post') {
			if ($this->_cekPesanan()) {
				$this->_insertPemesanan();
			}
		}

		$data = array(
			'layanan' => $this->_layanan
		);

		// TODO: tanya alur pemesanan, kolom jumlah,
		// keterangan order hanya untuk layanan redesign?
		// TODO: tanya, ga sesuai dg yg ada di google form?
		$this->load->view('umkm/form_redesign', $data);
	}

	/**
	 * Cek Pesanan
	 *
	 * Validasi inputan user
	 *
	 * @return    boolean
	 */
	private function _cekPesanan():bool
	{
		$ruleTambahan = '';

		foreach ($this->_layanan as $layanan) {
			$ruleTambahan .= $layanan->id_layanan.',';
		}

		$ruleTambahan = rtrim($ruleTambahan, ",");

		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama-produk','Nama Produk','required');
		$this->form_validation->set_rules('keterangan-produk','Keterangan Produk','required');
		$this->form_validation->set_rules('jenis-redesign[]','Jenis Redesign','required|in_list['.$ruleTambahan.']');

		return $this->form_validation->run();
	}

	/**
	 * Insert Pemesanan
	 *
	 * Method untuk insert inputan user ke db
	 */
	private function _insertPemesanan()
	{
		// --------------------------
		// Proses insert data produk
		// --------------------------
		$namaProduk       = $this->input->post('nama-produk');
		$keteranganProduk = $this->input->post('keterangan-produk');

		$dataProduk = array(
			'id_umkm'     => $this->session->id_umkm,
			'nama_produk' => $namaProduk,
			'keterangan'  => $keteranganProduk
		);

		$this->load->model('Model_produk');
		$this->_idProduk = $this->Model_produk->insert($dataProduk);

		// --------------------------------
		// Proses cek dan insert nama file
		// -------------------------------
		// TODO: pisah verifikasi dengan uploag file, extend core class CI
		$dataFotoProduk    = $this->_uploadImg('foto', 'foto_produk');
		$dataLogoProduk    = $this->_uploadImg('logo', 'logo_produk');
		$dataKemasanProduk = $this->_uploadImg('foto_kemasan', 'kemasan_produk');

		if ( ! empty($dataFotoProduk)) {
			$this->db->insert_batch('foto_produk', $dataFotoProduk);
		}

		if ( ! empty($dataLogoProduk)) {
			$this->db->insert_batch('logo_produk', $dataLogoProduk);
		}

		if ( ! empty($dataKemasanProduk)) {
			$this->db->insert_batch('kemasan_produk', $dataKemasanProduk);
		}

		// ----------------------------
		// Proses insert data pemesanan
		// ----------------------------
		$idLayanan = $this->input->post('jenis-redesign');

		foreach ($idLayanan as $idL) {
			$dataPemesanan = array(
				'id_produk'  => $this->_idProduk,
				'id_layanan' => $idL
			);

			if ($idLayanan == 1 || $idLayanan == 2) {
				$dataPemesanan = array(
					'keterangan_order' => $this->input->post('keterangan-desain')
				);
			}

			$this->db->insert('pemesanan', $dataPemesanan);
		}

		$this->alert->alertSuccess(count($idLayanan).' pemesanan Anda berhasil dibuat');
		// Tambah alert jika ada file yang gagal diupload
		if ($this->alert->hasAlert('danger')) {
			// TODO: kasih link ke halaman edit
			$this->alert->alertDanger('Jika ada file yang gagal diunggah Anda masih bisa mengeditnya di halaman edit pesanan');
		}
	}

	/**
	 * Upload Image
	 *
	 * Upload beberapa file image ke server,
	 * file image yang tidak valid akan dilewati dan tidak ter-upload
	 *
	 * @param    string    $img    Atribut name pada input type=file
	 * @param    string    $path   Nama folder untuk menyimpan file
	 *
	 * @return   null|array
	 */
	private function _uploadImg(string $img, string $path)
	{
		// Jika tidak ada file yang diupload maka return NULL
		if ($_FILES[$img]['error'][0] == 4) {
			return NULL;
		}

		$this->load->library('upload');

		$files       = $_FILES[$img];
		$jumlah_file = count($files['name']);
		$data        = [];

		$config['upload_path']   = './uploads/'.$path.'/';
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['max_size']      = '32000';

		$this->upload->initialize($config);

		for ($i = 0; $i < $jumlah_file; ++$i) {
			$_FILES['file']['name']		= $files['name'][$i];
			$_FILES['file']['type']		= $files['type'][$i];
			$_FILES['file']['tmp_name']	= $files['tmp_name'][$i];
			$_FILES['file']['error']	= $files['error'][$i];
			$_FILES['file']['size']		= $files['size'][$i];

			if ( ! $this->upload->do_upload('file')) {
				$alert = 'File "'.$this->upload->data('file_name').'" gagal terunggah. ';
				$alert .= '('.$this->upload->display_errors('', '').')';

				$this->alert->alertDanger($alert);
			}
			else {
				$data[] = array(
					'id_produk' => $this->_idProduk,
					$img => $this->upload->data('file_name')
				);
			}
		}

		return $data;
	}
}