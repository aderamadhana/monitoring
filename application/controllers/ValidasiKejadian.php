<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValidasiKejadian extends CI_Controller {

    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_model');
        
        $this->load->library(array('upload'));

        // if($this->session->userdata('role') != 1){
        //     $this->session->set_flashdata('messages', '<br><div class="alert alert-danger" role="alert"> <strong> Error! </strong>Silahkan login terlebih dahulu </div>');
        //     redirect(base_url("login"));
        // }
    }
    
    public function index(){
        $data['content']            = 'validasi/all-validasi-kejadian';
        $data['title']              = 'Kejadian';
        $data['kejadian']           = $this->m_model->get_data_where('kejadian', array('STATUS_KEJADIAN' => 'BELUM TERVALIDASI'));

        $this->load->view('template/template', $data);
    }

    public function detail($id_kejadian){
        $data['content']            = 'validasi/all-detail';
        $data['title']              = 'Kejadian';
        $data['kejadian']           = $this->m_model->selectDataone('kejadian', array('ID_KEJADIAN' => $id_kejadian));

        $this->load->view('template/template', $data);
    }
}
