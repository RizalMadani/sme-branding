<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_user');
	}

	public function index()
	{
    $id_user = $this->session->id_user;
    $data = array(
      'user' => $this->Model_user->getUser($id_user),
			'freelancer' => $this->Model_user->getFreelancer($id_user)
    );
    $this->load->view('freelancer/profil',$data);
	}

	public function updateProfil()
	{
		$id = $this->session->id_user;
		if (!$this->input->post('password')) {
			$data = array(
				'username' => $this->input->post('username'),
				'nama'		 => $this->input->post('nama'),
				'email'		 => $this->input->post('email'),
				'no_wa'		 => $this->input->post('no_wa'),
				'foto'		=> $this->input->post('foto')
			);
		}else{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'nama'		 => $this->input->post('nama'),
				'email'		 => $this->input->post('email'),
				'no_wa'		 => $this->input->post('no_wa')
			);
		}
		$update = $this->Model_user->updateUser($data,$id);

		if($update){
			$config['upload_path'] = "./uploads/foto_user";
			$config['allowed_types'] = "gif|jpg|png";
			$config['max_size'] = 2000;
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload',$config);
			if ($this->upload->do_upload('foto')) {
				$gambar = $this->upload->data();
				$data = array(
					'foto'   => $gambar['file_name'],
				);
				$dataf = array(
					'kategori_keahlian' => $this->input->post('kategori'),
					'keterangan'        => $this->input->post('keterangan')
				);
				$updatef = $this->Model_user->updateFree($dataf,$id);
				$update = $this->Model_user->updateUser($data,$id);
				redirect('freelancer/Profil');
			}else{
				$dataf = array(
					'kategori_keahlian' => $this->input->post('kategori'),
					'keterangan'        => $this->input->post('keterangank')
				);
				$updatef = $this->Model_user->updateFree($dataf,$id);
				redirect('freelancer/Profil');
			}
		}
	}

	}

?>
