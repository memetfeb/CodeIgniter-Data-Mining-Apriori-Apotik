<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin_model");
        //if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["data_transaksi"] = $this->admin_model->getAllTransaksi();
        $this->load->view("admin/data_transaksi", $data);
    }

    public function tambahTransaksi()
    {
        $this->admin_model->tambahTransaksi();
        $this->session->set_flashdata('success', 'Berhasil ditambah');
        redirect(site_url('admin/data_transaksi'));
    }

    public function editTransaksi($id)
    {
        if (!isset($id)) redirect('admin/data_transaksi');
        $this->admin_model->updateTransaksi($id);
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        redirect(site_url('admin/data_transaksi'));
    }

    public function hapusTransaksi($id)
    {
        if (!isset($id)) show_404();
        if ($this->admin_model->deleteTransaksi($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('admin/data_transaksi'));
        }
    }

    // file upload functionality
    public function importTransaksi() 
    {
        $data = array();
        // Load form validation library
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
        // If file uploaded
        if(!empty($_FILES['fileURL']['name'])) 
        { 
            // get file extension
            $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);
            if($extension == 'csv')
            {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            }elseif($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }else{
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }
            // file path
            $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            // array Count
            $arrayCount = count($allDataInSheet);
            $flag = 0;
            $createArray = array('id_transaksi', 'transaction_date', 'produk', 'total');
            $makeArray = array('id_transaksi' => 'id_transaksi', 'transaction_date' => 'transaction_date', 'produk' => 'produk', 'total' => 'total');
            $SheetDataKey = array();
            foreach ($allDataInSheet as $dataInSheet) 
            {
                foreach ($dataInSheet as $key => $value) 
                {
                    if (in_array(trim($value), $createArray)) 
                    {
                        $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey[trim($value)] = $key;
                    } 
                }
            }
            $dataDiff = array_diff_key($makeArray, $SheetDataKey);
            if (empty($dataDiff)) 
            {
                $flag = 1;
            }
            // match excel sheet column
            if ($flag == 1) 
            {
                for ($i = 2; $i <= $arrayCount; $i++) 
                {
                    $addresses = array();
                    $no = '';
                    $id_transaksi = $SheetDataKey['id_transaksi'];
                    $transaction_date = $SheetDataKey['transaction_date'];
                    $produk = $SheetDataKey['produk'];
                    $total = $SheetDataKey['total'];
                                        
                    $id_transaksi = filter_var(trim($allDataInSheet[$i][$id_transaksi]), FILTER_SANITIZE_STRING);
                    $transaction_date = filter_var(trim($allDataInSheet[$i][$transaction_date]), FILTER_SANITIZE_STRING);
                    $produk = filter_var(trim($allDataInSheet[$i][$produk]), FILTER_SANITIZE_STRING);
                    $total = filter_var(trim($allDataInSheet[$i][$total]), FILTER_SANITIZE_STRING);
                    
                    $fetchData[] = array('id' => $no, 'id_transaksi' => $id_transaksi, 'transaction_date' => $transaction_date, 'produk' => $produk, 'total' => $total);
                }
                $data['transaksi'] = $fetchData;
                $this->admin_model->setBatchImport($fetchData);
                $this->admin_model->importData();
            }else{
                echo "Please import correct file, did not match excel sheet column";
            }
            $this->session->set_flashdata('success', 'Berhasil ditambah');
            redirect(site_url('admin/data_transaksi'));
        }            
        
    }


}