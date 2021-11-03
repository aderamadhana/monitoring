<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KegiatanBulanan extends CI_Controller {

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
        $data['content']            = 'kegiatan_bulanan/all-kegiatan';
        $data['title']              = 'Kegiatan Bulanan';
        $data['kegiatan']           = $this->m_model->get_data_where('kegiatan_bulanan', array('NIP_PENCATAT' => $this->session->userdata('nip')));
        

        $this->load->view('template/template', $data);
    }

    public function detail($id_kegiatan){
        $data['content']            = 'kegiatan_bulanan/all-kegiatan-detail';
        $data['title']              = 'Data kegiatan'; 
        $data['kegiatan']           = $this->m_model->get_data_where('kegiatan', array('ID_kegiatan' => $id_kegiatan));
        
        $this->load->view('template/template', $data);
    }

    public function tambah_kegiatan(){
        $data['content']            = 'kegiatan_bulanan/add-kegiatan';
        $data['title']              = 'Kegiatan Bulanan';
        
        $this->load->view('template/template', $data);
    }

    public function do_tambah_kegiatan(){
        $data = $_POST;

        $this->m_model->insert_data('kegiatan_bulanan', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data </div>');
            
        redirect('KegiatanBulanan');
    }

    public function edit_kegiatan($id_kegiatan){
        $data['content']            = 'kegiatan_bulanan/edit-kegiatan';
        $data['title']              = 'kegiatan';
        $data['kegiatan']           = $this->m_model->selectDataone('kegiatan_bulanan', array('ID_KEGIATAN_BULANAN' => $id_kegiatan));

        $this->load->view('template/template', $data);
    }

    public function do_edit_kegiatan(){

        $data = $_POST;

        $this->m_model->update_data('kegiatan_bulanan', $data, array('ID_KEGIATAN_BULANAN' => $this->input->post('ID_KEGIATAN_BULANAN')));

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil update data </div>');
            
        redirect('KegiatanBulanan');
    }

    public function hapus_kegiatan($id_kegiatan){
        $this->m_model->delete_data('kegiatan_bulanan', array('ID_KEGIATAN_BULANAN' => $id_kegiatan));

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil hapus data </div>');
            
        redirect('KegiatanBulanan');
    }
}
