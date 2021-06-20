<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model untuk mengambil data
 * untuk halaman dasbor
 *
 */
class Model_portofolio extends CI_Model {

	public function getPortofolio()
	{
		return $this->db->get('portofolio')->result();
	}

	public function getPortofolioID($id)
	{
		return $this->db->query("SELECT * FROM portofolio JOIN user USING(id_user) WHERE id_user='$id'")->result();
	}

	public function insertPortofolio($data)
	{
		return $this->db->insert('portofolio',$data);
	}

	public function updatePortofolio($data,$id){
	 $this->db->where('id_portofolio',$id);
	 $o = $this->db->update('portofolio',$data);
	 return $o;
	}

	public function HapusPortofolio($id){
		$this->db->where('id_portofolio',$id);
    return $this->db->delete('portofolio');
	}

}
