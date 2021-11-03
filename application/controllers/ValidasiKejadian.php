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

    public function aksi_validasi(){
        $id_kejadian = $this->input->post('id_kejadian');
        $id_validator = $this->input->post('id_validator');
        $catatan = $this->input->post('catatan');

        $data_validasi = array(
            'NIP_VALIDATOR' => $id_validator,
            'TANGGAL_VALIDASI' => date('Y-m-d H:i:s'),
            'CATATAN' => $catatan,
            'STATUS_KEJADIAN' => 'Tervalidasi'
        );

        $data_tolak = array(
            'CATATAN' => $catatan,
            'STATUS_KEJADIAN' => 'Tertolak'
        );

        if(isset($_POST['validasi'])){
            $this->m_model->update_data('kejadian', $data_validasi, array('ID_KEJADIAN' => $id_kejadian));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Validasi Kejadian </div>');

        }else if(isset($_POST['tolak'])){
            $this->m_model->update_data('kejadian', $data_tolak, array('ID_KEJADIAN' => $id_kejadian));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Tolak Kejadian </div>');
        }

        redirect('ValidasiKejadian');
    }
}
