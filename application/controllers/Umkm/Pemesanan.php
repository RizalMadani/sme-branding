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

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_pemesanan');
	}

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
	 * Lihat Pesanan
	 *
	 * Tampilkan halaman untuk melihat semua
	 * atau satu pesanan berdasarkan $idPesan
	 *
	 * @param    mixed    $idPesan    id_pesan yang mau ditampilkan, kosongkan untuk menampilkan semua
	 */
	public function lihatPesanan($idPesan = '')
	{
		$idUmkm = $this->session->id_umkm;

		// Jika tidak ada $id_pesan di url, cth: localhost/sme-branding/umkm/lihat-pesanan/
		// maka tampilkan semua pesanan
		if (empty($idPesan)) {
			$data = array (
				'daftar_pesanan' => $this->Model_pemesanan->getPemesananUmkm($idUmkm)
			);

			return $this->load->view('umkm/lihat_semua_pesanan', $data);
		}

		$pesanan = $this->Model_pemesanan->getPemesanan($idPesan);

		if (is_null($pesanan) || $pesanan->id_umkm != $idUmkm) {
			$this->alert->alertDanger('Pesanan tidak diketahui');

			redirect('umkm/lihat-pesanan');
		}

		// Proses ambil file-file gambar produk (foto, logo, kemasan)
		$this->load->model('Model_produk');
		$gambar = $this->Model_produk->getFile($pesanan->id_produk);


		$data = array(
			'pesanan' => $pesanan,
			'gambar'  => $gambar,
			'script'  => 'edit-keterangan-pesanan'
		);

		$this->session->id_pesan_dilihat = $idPesan;
		$this->load->view('umkm/lihat_pesanan', $data);
	}

	public function editPesanan($idPesan)
	{
		// if ($this->input->method() === 'post') {
			
		// }

		show_error('Under maintenance', 500);

		$pesanan = $this->Model_pemesanan->getPemesanan($idPesan);

		if (is_null($pesanan) || ! $this->_isOwned($pesanan)) {
			$this->alert->alertDanger('Pesanan tidak diketahui');

			redirect('umkm/lihat-pesanan');
		}
		else if ($this->_isEditable($pesanan)) {
			$this->alert->alertDanger('Pesanan tidak bisa diedit. Status pesanan: '.$pesanan->status);

			redirect('umkm/lihat-pesanan');
		}

		// Proses ambil file-file gambar produk (foto, logo, kemasan)
		$this->load->model('Model_produk');
		$gambar = $this->Model_produk->getFile($pesanan->id_produk);


		$data = array(
			'pesanan' => $pesanan,
			'gambar'  => $gambar
		);

		$this->load->view('umkm/lihat_pesanan', $data);
	}

	/**
	 * Edit Keterangan Pesanan
	 *
	 * Edit ketereangan pesanan berdasrkan $idPesan
	 *
	 * @param    mixed   $idPesan    id_pesan pesanan yang mau diedit
	 */
	public function editKeteranganPesanan($idPesan)
	{
		// Cek jika pesanan yang akan diedit sesuai dan memang bisa diedit
		if ( ! ($this->_hasBeenSeen($idPesan) && $this->_isEditable($idPesan))) {
			show_error('An Error Was Encountered', 500);
		}


		$data = array(
			'keterangan_order' => $this->input->post('keterangan-pesanan')
		);

		$update   = $this->db->update('pemesanan', $data, 'id_pesan = '.$this->db->escape($idPesan));

		if ( ! $update) {
			$this->alert->alertDanger('Gagal mengedit keterangan pesanan. Bisa diulangi kembali untuk mengedit keterangan pesanan');
		}
		else{
			$this->alert->alertSuccess('Berhasil memperbarui keterangan pesanan');
		}

		redirect('umkm/lihat-pesanan/'.$idPesan);
	}

	//--------------------------------------

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

	/**
	 * Has Pesanan been seen?
	 * 
	 * Cek apakah pesanan yang akan diedit
	 * merupakan pesanan yang dilihat sebelumnya
	 * di halaman lihat_pesanan
	 * 
	 * @param    string|int    $idPesan    idPesan pesanan yang ingin dicek
	 * 
	 * @return   boolean
	 */
	private function _hasBeenSeen($idPesan)
	{
		if ($idPesan !== $this->session->id_pesan_dilihat) {
			return show_error('An Error Was Encountered', 500);
		}

		return TRUE;
	}

	/**
	 * Is Pesanan editable?
	 * 
	 * Cek apakah pesanan bisa diedit
	 * 
	 * @param    string|object    $data    id_pesan atau data pemesanan yang mau dicek
	 * 
	 * @return   boolean
	 */
	private function _isEditable($data)
	{
		if (is_object($data)) {
			if ($data->status == 'revisi' || $data->status == 'approval') {
				return FALSE;
			}

			return TRUE;
		}

		return $this->Model_pemesanan->isEditable($data);
	}

	/**
	 * Is Pesanan Owned by This Umkm?
	 * 
	 * Cek apakah pesanan dimiliki oleh Umkm
	 * 
	 * @param    string|object    $data    id_pesan atau data pesanan yang mau dicek
	 * 
	 * @return   boolean
	 */
	// private function _isOwned($data)
	// {
	// 	$idUmkm = $this->session->id_umkm;

	// 	if (is_object($data)) {
	// 		if ($data->id_umkm != $idUmkm) {
	// 			return FALSE;
	// 		}

	// 		return TRUE;
	// 	}

	// 	return $this->Model_pemesanan->cekKepemilikanUmkm($idUmkm, $data);
	// }
}
