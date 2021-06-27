<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_transaksi');
		$this->load->model('Model_user');
	}
	public function index()
	{
		$id_user = $this->session->id_user;
		$data = array(
			'user' => $this->Model_user->getUser($id_user),
			'datatransaksi' => $this->Model_transaksi->getTransaksi()
		);
		$this->load->view('admin/kelolatransaksi',$data);
	}

	public function validasiOrder()
	{
		$id_user = $this->session->id_user;
		$data = array(
			'user' => $this->Model_user->getUser($id_user),
			'datavalid' => $this->Model_transaksi->validasi(),
			'pemesanan' => $this->Model_transaksi->getPemesanan()
		);
		$this->load->view('admin/validasitransaksi',$data);
	}

	public function inputTransaksi()
	{
		$data = array(
			'id_pesan' => $this->input->post('id_pesan'),
			'harga' => $this->input->post('harga'),
			'status' => 'pending'
		);
		$cek = $this->Model_transaksi->insert_transaksi($data);
		if ($cek) {
			redirect('Pengelola/Transaksi/validasiOrder');
		}
	}

	public function hapusTransaksi($id)
	{
		$cek = $this->Model_transaksi->delete_transaksi($id);
		redirect('Pengelola/Transaksi/validasiOrder');
	}

	public function updateLunas($id)
	{
		$data = array(
			'status' => 'lunas'
		);
		$cek = $this->Model_transaksi->update_transaksi($data,$id);
		if ($cek) {
			redirect('Pengelola/Transaksi/validasiOrder');
		}
	}

	public function updateTolak($id)
	{
		$data = array(
			'status' => 'ditolak'
		);
		$cek = $this->Model_transaksi->update_transaksi($data,$id);
		if ($cek) {
			redirect('Pengelola/Transaksi/validasiOrder');
		}
	}
}
