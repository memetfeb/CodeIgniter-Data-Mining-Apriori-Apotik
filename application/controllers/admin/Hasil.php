<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin_model");
        //if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["hasil"] = $this->admin_model->getHasil();
        $this->load->view("admin/hasil", $data);
    }

    public function hapusRule($id)
    {
        if (!isset($id)) show_404();
        if ($this->admin_model->deleteRule($id)) {
            $this->session->set_flashdata('success', 'Rule Berhasil dihapus');
            redirect(site_url('admin/hasil'));
        }
    }

    public function viewRule($id)
    {
        $data["ConfidenceItemset3"] = $this->admin_model->confidenceItemset3($id);
        $data["ConfidenceItemset2"] = $this->admin_model->confidenceItemset2($id);
        $data["RuleID"] = $this->admin_model->getRuleID($id);
        $data["ItemSet1"] = $this->admin_model->getItemset1($id);
        $data["ItemSet2"] = $this->admin_model->getItemset2($id);
        $data["ItemSet3"] = $this->admin_model->getItemset3($id);

        $this->load->view("admin/view_rule", $data);
    }

}