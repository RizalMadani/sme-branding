<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_page extends CI_Controller {

	/**
	 * Menampilkan halaman beranda landing page
	 */
	public function index()
	{
		$this->load->model('Model_testimoni');

		$data = array(
			'testimoni' => $this->Model_testimoni->getTestimoniForLandingPage(5),
		);

		// dd($data);
		$this->load->view('landingpage/index' ,$data);
	}

	public function layanan()
	{
		$this->load->view('landingpage/layanan');
	}

	public function tentang()
	{
		$this->load->view('landingpage/tentang');
	}

	public function kontak()
	{
		$this->load->view('landingpage/kontak');
	}

	public function icons()
	{
		$this->load->view('landingpage/icons');
	}
}
