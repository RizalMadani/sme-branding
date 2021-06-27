<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_testimoni');
	}

	public function index()
	{
		$id_user = $this->session->id_user;
		$data = array(
			'user' => $this->Model_user->getUser($id_user),
			'datatestimoni' => $this->Model_testimoni->getDataTestimoni()
		);
		$this->load->view('admin/kelolatestimoni',$data);
	}

	public function hapusTestimoni($id)
	{
		$cek = $this->Model_testimoni->delete_testimoni($id);
		redirect('pengelola/Testimoni');
	}
}
