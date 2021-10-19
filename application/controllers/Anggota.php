<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_anggota');
        
        // if($this->session->userdata('role') != 1){
        //     $this->session->set_flashdata('messages', '<br><div class="alert alert-danger" role="alert"> <strong> Error! </strong>Silahkan login terlebih dahulu </div>');
        //     redirect(base_url("login"));
        // }
    }
    
    public function index(){
        $data['content']            = 'anggota/all-anggota';
        $data['title']              = 'Anggota';
        $data['anggota_polsek']     = $this->m_anggota->get_all_anggota_polsek();
        $data['anggota_polres']     = $this->m_anggota->get_all_anggota_polres();

        $this->load->view('template/template', $data);
    }

    public function tambah_anggota(){
        $data['content']            = 'anggota/add-anggota';
        $data['title']              = 'Anggota';

        $this->load->view('template/template', $data);
    }

}
