<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portofolio extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_user');
		$this->load->model('Model_portofolio');
	}

	public function index()
	{
		$id_user = $this->session->id_user;
		$data = array(
			'user' => $this->Model_user->getUser($id_user),
			'dataportofolio' => $this->Model_portofolio->getPortofolioID($id_user)
		);
		$this->load->view('freelancer/portofolio',$data);
	}

	public function InputPortofolio()
	{
				$config['upload_path'] = "./uploads/foto_portofolio";
  			$config['allowed_types'] = "gif|jpg|png";
  			$config['max_size'] = 2000;
  			$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
  			if ($this->upload->do_upload('buktiportofolio')) {
  				$gambar = $this->upload->data();
					$data = array(
						'id_user'					  => $this->session->id_user,
						'judul'					    => $this->input->post('judulportofolio'),
						'bukti_portofolio'   => $gambar['file_name'],
						'detail_portofolio' => $this->input->post('detailportofolio'),
					);
  			}else{
					$data = array(
						'id_user' 					=> $this->session->id_user,
						'judul'							=> $this->input->post('judulportofolio'),
						'bukti_portofolio' 	=> $this->input->post('urlportofolio'),
						'detail_portofolio' => $this->input->post('detailportofolio'),
					);
  			}
  			$cek = $this->Model_portofolio->insertPortofolio($data);
				redirect('Portofolio');
	}

	public function EditPortofolio()
	{
		$id = $this->input->post('id');
				$config['upload_path'] = "./uploads/foto_portofolio";
				$config['allowed_types'] = "gif|jpg|png";
				$config['max_size'] = 2000;
				$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
				if ($this->upload->do_upload('buktiportofolio')) {
					$gambar = $this->upload->data();
					$data = array(
						'id_user'					  => $this->session->id_user,
						'judul'					    => $this->input->post('judulportofolio'),
						'bukti_portofolio'   => $gambar['file_name'],
						'detail_portofolio' => $this->input->post('detailportofolio'),
					);
				}else{
					$data = array(
						'id_user' 					=> $this->session->id_user,
						'judul'							=> $this->input->post('judulportofolio'),
						'bukti_portofolio' 	=> $this->input->post('urlportofolio'),
						'detail_portofolio' => $this->input->post('detailportofolio'),
					);
				}
				$cek = $this->Model_portofolio->updatePortofolio($data,$id);
				redirect('freelancer/Portofolio');
	}

	public function HapusPortofolio($id)
	{
		// code...
	}
}
