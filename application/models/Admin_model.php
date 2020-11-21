<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{  
    public function getAllTransaksi()
    {
        $sql = "SELECT * FROM transaksi";
        return $this->db->query($sql)->result();
    }

    public function getTotalTransaksi()
    {
        $sql = "SELECT * FROM transaksi";
        return $this->db->query($sql)->num_row();
    }

    public function tambahTransaksi()
    {
        $post = $this->input->post();
        $data = array(
            'id_transaksi' => $post["id_transaksi"],
            'transaction_date' => $post["tanggal_transaksi"],
            'total' => $post["total"],
            'produk' => $post["produk"]
        );
        $this->db->insert('transaksi', $data);
    }

    public function updateTransaksi($id)
    {
        $post = $this->input->post();
        $this->db->set("id_transaksi", $post["id_transaksi"]);
        $this->db->set("transaction_date", $post["tanggal_transaksi"]);
        $this->db->set("total", $post["total"]);
        $this->db->set("produk", $post["produk"]);
        $this->db->where("id", $id);
        $this->db->update("transaksi");
    }

    public function deleteTransaksi($id)
    {
        return $this->db->delete("transaksi", array("id" => $id));
    }

    private $_batchImport;
    public function setBatchImport($batchImport) 
    {
        $this->_batchImport = $batchImport;
    }
     
    // save data
    public function importData() 
    {
        $data = $this->_batchImport;
        $this->db->insert_batch('transaksi', $data);
    }

    

    
}