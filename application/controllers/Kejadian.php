<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kejadian extends CI_Controller {

    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_anggota');
        $this->load->model('m_model');
        
        $this->load->library(array('upload'));

        // if($this->session->userdata('role') != 1){
        //     $this->session->set_flashdata('messages', '<br><div class="alert alert-danger" role="alert"> <strong> Error! </strong>Silahkan login terlebih dahulu </div>');
        //     redirect(base_url("login"));
        // }
    }
    
    public function index(){
        $data['content']            = 'data_kejadian/all-kejadian-admin';
        $data['title']              = 'Data Kejadian';
        $data['kejadian']           = $this->m_model->get_data_all('kejadian');

        $this->load->view('template/template', $data);
    }

    public function detail($id_kejadian){
        $data['content']            = 'data_kejadian/all-kejadian-detail';
        $data['title']              = 'Detail Kejadian'; 
        $data['kejadian']           = $this->m_model->selectDataone('kejadian', array('ID_KEJADIAN' => $id_kejadian));
        $kejadian                   = $this->m_model->selectDataone('kejadian', array('ID_KEJADIAN' => $id_kejadian));

        $data['nip_pencatat']       = $this->m_model->selectDataone('user', array('NIP' => $kejadian['NIP_PENCATAT']));
        $data['nip_validator']      = $this->m_model->selectDataone('user', array('NIP' => $kejadian['NIP_VALIDATOR']));
        $anggotaPolsek              = $this->m_model->selectDataone('anggota_polsek', array('NIP' => $kejadian['NIP_PENCATAT']));

        $data['polsek']             = $this->m_model->selectDataone('polsek', array('ID_POLSEK' => $anggotaPolsek['ID_POLSEK']));

        $this->load->view('template/template', $data);
    }

    public function print($id_kejadian)
    {
        $data['kejadian']           = $this->m_model->selectDataone('kejadian', array('ID_KEJADIAN' => $id_kejadian));
        $kejadian                   = $this->m_model->selectDataone('kejadian', array('ID_KEJADIAN' => $id_kejadian));

        $data['nip_pencatat']       = $this->m_model->selectDataone('user', array('NIP' => $kejadian['NIP_PENCATAT']));
        $data['nip_validator']      = $this->m_model->selectDataone('user', array('NIP' => $kejadian['NIP_VALIDATOR']));
        $anggotaPolsek              = $this->m_model->selectDataone('anggota_polsek', array('NIP' => $kejadian['NIP_PENCATAT']));
        
        $data['polsek']             = $this->m_model->selectDataone('polsek', array('ID_POLSEK' => $anggotaPolsek['ID_POLSEK']));
        
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('pdf/laporan_pdf', $data);
    }
}
