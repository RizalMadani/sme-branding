<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_gaji extends CI_Model {

  public function getGajiAdmin()
  {
    return $this->db->query("SELECT * FROM gaji JOIN user USING(id_user) WHERE level='pengelola'")->result();
  }

  public function getGajiFreelancer()
  {
    return $this->db->query("SELECT * FROM gaji JOIN user USING(id_user) WHERE level='freelancer'")->result();
  }

  public function insert_gaji($data)
  {
    return $this->db->insert('gaji',$data);
  }

  public function update_gaji($data,$id)
  {
   $this->db->where('id_gaji',$id);
   $o = $this->db->update('gaji',$data);
   return $o;
  }

  public function delete_gaji($id){
    $this->db->where('id_gaji',$id);
    return $this->db->delete('gaji');
  }

}
