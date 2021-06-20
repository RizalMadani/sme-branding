<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends MY_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_user');
		$this->load->model('Model_pemesanan');
	}
	public function onGoing()
	{
		echo "hhh";
	}

	public function history()
	{
		$id_user = $this->session->id_user;
		$data = array(
			'user' => $this->Model_user->getUser($id_user),
			'riwayatlunas' => $this->Model_pemesanan->getDataRiwayatFreelancerLunas($id_user),
			'riwayatblmlunas' => $this->Model_pemesanan->getDataRiwayatFreelancerBelumLunas($id_user)
		);
		$this->load->view('freelancer/riwayatpekerjaan',$data);
	}
}
