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

    public function viewRule($id)
    {
        $data["ConfidenceItemset3"] = $this->admin_model->confidenceItemset3($id);
        $data["ConfidenceItemset2"] = $this->admin_model->confidenceItemset2($id);
        
        $this->load->view("admin/view_rule", $data);
    }

}