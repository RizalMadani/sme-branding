<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_gaji');
	}

	public function GajiTransaksiAdmin()
	{
		$id_user = $this->session->id_user;
		$data = array(
			'user' => $this->Model_user->getUser($id_user),
			'datagaji' => $this->Model_transaksi->getGajiAdmin()
		);
		$this->load->view('admin/kelolagajiadmin',$data);
	}
}
