<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_page extends CI_Controller {

	/**
	 * Menampilkan halaman beranda landing page
	 */
	public function index()
	{
		$this->load->view('landingpage/index');
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
}
