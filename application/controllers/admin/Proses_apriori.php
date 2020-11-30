<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses_apriori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin_model");
        $this->load->helper('bulan_helper');
        //if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $post=$this->input->post();
        $this->load->view("admin/proses_apriori");
    }

    public function prosesApriori()
    {
        $post=$this->input->post();
        $min_support = $_POST['support'];
        $min_confidence = $_POST['confidence'];

		$tgl=explode(" - ", $_POST['range_tanggal']);
		$start=format_date($tgl[0]);
        $end=format_date($tgl[1]);

        
       
        $mining = $this->admin_model->miningProcess($min_support,$min_confidence,$start,$end);
        $lastId=$this->admin_model->getLastIdProcessLog();
        $last = $lastId->last;
        if ($mining) {
            $this->session->set_flashdata('success', 'Mining Berhasil');
            redirect(site_url('admin/hasil/viewRule/'.$last));
        } else {
            $this->session->set_flashdata('error', 'Mining Gagal');
            redirect(site_url('admin/proses_apriori'));
        }
    }

    

}