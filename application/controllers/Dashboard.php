<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        // $this->load->model('m_sekawan');
        
        // if($this->session->userdata('role') != 1){
        //     $this->session->set_flashdata('messages', '<br><div class="alert alert-danger" role="alert"> <strong> Error! </strong>Silahkan login terlebih dahulu </div>');
        //     redirect(base_url("login"));
        // }
    }
    
    public function admin(){
        $data['content']    = 'dashboard/all-dashboard-admin';
        $data['title']      = 'Dashboard';

        $this->load->view('template/template', $data);
    }

    public function anggota(){
        $data['content']    = 'dashboard/all-dashboard-anggota';
        $data['title']      = 'Dashboard';

        $this->load->view('template/template', $data);
    }

    public function polsek(){
        $data['content']    = 'dashboard/all-dashboard-polsek';
        $data['title']      = 'Dashboard';

        $this->load->view('template/template', $data);
    }

    public function polres(){
        $data['content']    = 'dashboard/all-dashboard-polres';
        $data['title']      = 'Dashboard';

        $this->load->view('template/template', $data);
    }

}
