<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_user');
	}

	public function kelolaPengelola()
	{
		$id_user = $this->session->id_user;
		$data = array(
			'user' => $this->Model_user->getUser($id_user),
			'datapengelola' => $this->Model_user->getDataPengelola($id_user)
		);
		$this->load->view('admin/kelolapengelola',$data);
	}

	public function kelolaFreelancer()
	{
		$id_user = $this->session->id_user;
		$data = array(
			'user' => $this->Model_user->getUser($id_user),
			// 'datapengelola' => $this->Model_user->get()
		);
		$this->load->view('admin/kelolafreelancer',$data);
	}

	public function kelolaUMKM()
	{
		$id_user = $this->session->id_user;
		$data = array(
			'user' => $this->Model_user->getUser($id_user),

		);
		$this->load->view('admin/kelolaumkm',$data);
	}

	public function inputAdmin()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'nama'		 => $this->input->post('nama'),
			'email'		 => $this->input->post('email'),
			'no_wa'		 => $this->input->post('no_wa'),
			'level' 	 => 'pengelola'
		);
		$cek = $this->Model_user->insert_user($data);
		if ($cek) {
			redirect('pengelola/User/kelolaPengelola');
		}
	}

	public function updateAdmin()
	{
		$id = $this->input->post('id');
		$data = array(
			'nama'		 => $this->input->post('nama'),
			'email'		 => $this->input->post('email'),
			'no_wa'		 => $this->input->post('no_wa'),
		);
		$cek = $this->Model_user->updateUser($data,$id);
		if ($cek) {
			redirect('pengelola/User/kelolaPengelola');
		}
	}

}

	?>










}
