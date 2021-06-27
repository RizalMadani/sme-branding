<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends MY_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_user');
		$this->load->model('Model_pemesanan');
		$this->load->model('Model_portofolio');
	}
	public function onGoing()
	{
		$id_user = $this->session->id_user;
		$data = array(
			'user' => $this->Model_user->getUser($id_user),
			'datapesanan' => $this->Model_pemesanan->getPemesananFreelancerOnGoing($id_user),
			'pesan' => $this->Model_portofolio->getPemesanan()
		);
		$this->load->view('freelancer/kelolapekerjaan',$data);
	}

	public function history()
	{
		$id_user = $this->session->id_user;
		$data = array(
			'user' => $this->Model_user->getUser($id_user),
			// 'riwayatlunas' => $this->Model_pemesanan->getDataRiwayatFreelancerLunas($id_user),
			// 'riwayatblmlunas' => $this->Model_pemesanan->getDataRiwayatFreelancerBelumLunas($id_user)
			'datapesanan' => $this->Model_pemesanan->getPemesananFreelancer($id_user)
		);
		$this->load->view('freelancer/riwayatpekerjaan',$data);
	}

	public function inputHasil()
	{
				$config['upload_path'] = "./uploads/hasil_pemesanan";
				$config['allowed_types'] = "gif|jpg|png";
				$config['max_size'] = 2000;
				$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
				if ($this->upload->do_upload('foto')) {
					$gambar = $this->upload->data();
					$data = array(
						'id_pesan' =>  $this->input->post('idpesan'),
						'link' => $this->input->post('link'),
						'hasil_foto'   => $gambar['file_name'],
					);
				}else{
					$data = array(
						'id_pesan' =>  $this->input->post('idpesan'),
						'link' => $this->input->post('link')
					);
				}
				$cek = $this->Model_portofolio->insertHasilPemesanan($data);
				if ($cek) {
					$data = array(
						'status' => 'review'
					);
					$idd = $this->input->post('idpesan');
					$cekUMKM = $this->Model_portofolio->updatePemesanan($data,$idd);
				}
				redirect('freelancer/Pekerjaan/onGoing');
	}
	public function updatePekerjaan()
	{
		$id = $this->input->post('id');
				$config['upload_path'] = "./uploads/hasil_pemesanan";
				$config['allowed_types'] = "gif|jpg|png";
				$config['max_size'] = 2000;
				$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
				if ($this->upload->do_upload('foto')) {
					$gambar = $this->upload->data();
					$data = array(
						'link' => $this->input->post('link'),
						'hasil_foto'   => $gambar['file_name'],
					);
				}else{
					$data = array(
						'link' => $this->input->post('link')
					);
				}
				$cek = $this->Model_portofolio->updateHasilPemesanan($data,$id);
				if ($cek) {
					$data = array(
						'status' => 'revisi'
					);
					$idd = $this->input->post('idpesan');
					$cekUMKM = $this->Model_portofolio->updatePemesanan($data,$idd);
				}
				redirect('freelancer/Pekerjaan/onGoing');
	}

}
