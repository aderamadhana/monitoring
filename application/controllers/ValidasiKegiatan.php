<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValidasiKegiatan extends CI_Controller {

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
        $data['content']            = 'validasi/all-validasi-kegiatan';
        $data['title']              = 'Kegiatan';
        $data['kegiatan']           = $this->m_model->get_data_all('kegiatan_bulanan');

        $this->load->view('template/template', $data);
    }

    public function detail($id_kegiatan){
        $data['content']            = 'validasi/all-validasi-kegiatan-detail';
        $data['title']              = 'Kegiatan';
        $data['kegiatan']           = $this->m_model->selectDataone('kegiatan_bulanan', array('ID_KEGIATAN_BULANAN' => $id_kegiatan));

        $this->load->view('template/template', $data);
    }
}
