<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model untuk mengambil data
 * untuk halaman dasbor
 *
 */
class Model_layanan extends CI_Model {

  public function getLayanan()
  {
    return $this->db->get('layanan')->result();
  }

  public function insert_layanan($data)
  {
    return $this->db->insert('layanan',$data);
  }

  public function update_layanan($data,$id)
  {
   $this->db->where('id_layanan',$id);
   $o = $this->db->update('layanan',$data);
   return $o;
  }

  public function delete_layanan($id){
    $this->db->where('id_layanan',$id);
    return $this->db->delete('layanan');
  }


}
