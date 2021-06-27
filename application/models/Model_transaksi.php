<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_transaksi extends CI_Model {

  public function getTransaksi()
  {
    return $this->db->query("SELECT nama_umkm,id_pesan,transaksi.status as statuss,harga FROM transaksi JOIN pemesanan USING(id_pesan) JOIN produk USING(id_produk) JOIN umkm USING(id_umkm)")->result();
  }

  public function validasi()
  {
    return $this->db->query("SELECT * FROM transaksi WHERE status != 'lunas'")->result();
  }

  public function insert_transaksi($data)
  {
    return $this->db->insert('transaksi',$data);
  }

  public function update_transaksi($data,$id)
  {
   $this->db->where('id_transaksi',$id);
   $o = $this->db->update('transaksi',$data);
   return $o;
  }

  public function delete_transaksi($id){
    $this->db->where('id_transaksi',$id);
    return $this->db->delete('transaksi');
  }

  public function getPemesanan()
  {
    return $this->db->query("SELECT * FROM pemesanan JOIN produk USING(id_produk) JOIN umkm USING(id_umkm)")->result();
  }

}
