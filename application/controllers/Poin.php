<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poin extends CI_Controller {

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
        $bulan = $this->input->post('BULAN');
        $tahun = $this->input->post('TAHUN');

        $data['content']            = 'poin/all-poin';
        $data['title']              = 'Poin';
        if ($bulan == '0' && $tahun == '0') {
            $data['kegiatan']           = $this->m_model->get_data_where('kegiatan_bulanan', array('NIP_PENCATAT' => $this->session->userdata('nip')));
        } elseif ($bulan != '0' && $tahun == '0') {
            $data['kegiatan']           = $this->m_model->get_data_where('kegiatan_bulanan', array('NIP_PENCATAT' => $this->session->userdata('nip'), 'PERIODE_BULAN' => $bulan));
        } elseif ($bulan == '0' && $tahun != '0') {
            $data['kegiatan']           = $this->m_model->get_data_where('kegiatan_bulanan', array('NIP_PENCATAT' => $this->session->userdata('nip'), 'PERIODE_TAHUN' => $tahun));
        } elseif ($bulan != '0' && $tahun != '0') {
            $data['kegiatan']           = $this->m_model->get_data_where('kegiatan_bulanan', array('NIP_PENCATAT' => $this->session->userdata('nip'), 'PERIODE_BULAN' => $bulan, 'PERIODE_TAHUN' => $tahun));
        }
        $data['bulan']              = $this->m_model->get_data_where_group_by('kegiatan_bulanan', array('NIP_PENCATAT' => $this->session->userdata('nip')), 'PERIODE_BULAN');
        $data['tahun']              = $this->m_model->get_data_where_group_by('kegiatan_bulanan', array('NIP_PENCATAT' => $this->session->userdata('nip')), 'PERIODE_TAHUN');
        $data['pengajuan']          = '0';
        

        $this->load->view('template/template', $data);
    }

}
