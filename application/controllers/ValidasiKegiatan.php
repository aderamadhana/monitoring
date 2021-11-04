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
    
    public function bulanan(){
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

    public function aksi_validasi(){
        $id_kegiatan = $this->input->post('id_kegiatan');
        $id_validator = $this->input->post('id_validator');
        $catatan = $this->input->post('catatan');

        $data_validasi = array(
            'NIP_VALIDATOR' => $id_validator,
            'TANGGAL_VALIDASI' => date('Y-m-d H:i:s'),
            'CATATAN' => $catatan,
            'STATUS_KEGIATAN_BULANAN' => 'Tervalidasi'
        );

        $data_tolak = array(
            'CATATAN' => $catatan,
            'STATUS_KEGIATAN_BULANAN' => 'Tertolak'
        );

        if(isset($_POST['validasi'])){
            $this->m_model->update_data('kegiatan_bulanan', $data_validasi, array('ID_KEGIATAN_BULANAN' => $id_kegiatan));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Validasi Kegiatan </div>');

        }else if(isset($_POST['tolak'])){
            $this->m_model->update_data('kegiatan_bulanan', $data_tolak, array('ID_KEGIATAN_BULANAN' => $id_kegiatan));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Tolak Kegiatan </div>');
        }

        redirect('ValidasiKegiatan/bulanan');
    }

    public function harian(){
        $data['content']            = 'validasi/all-validasi-kegiatan-harian';
        $data['title']              = 'Kegiatan Harian';
        $data['kegiatan']           = $this->db->select('*')->from('kegiatan_bulanan')->join('kegiatan_harian', 'kegiatan_harian.id_kegiatan_bulanan = kegiatan_bulanan.id_kegiatan_bulanan')->where('STATUS_KEGIATAN_BULANAN','Tervalidasi')->group_by('kegiatan_bulanan.ID_KEGIATAN_BULANAN')->get()->result();
        

        $this->load->view('template/template', $data);
    }

    public function detail_harian($id_kegiatan){
        $data['content']            = 'validasi/all-validasi-kegiatan-detail-harian';
        $data['title']              = 'Kegiatan';
        $data['kegiatan']           = $this->m_model->get_data_where('kegiatan_harian', array('ID_KEGIATAN_BULANAN' => $id_kegiatan));
        $data['kegiatan_harian']    = $this->m_model->selectDataone('kegiatan_harian', array('ID_KEGIATAN_BULANAN' => $id_kegiatan));

        $this->load->view('template/template', $data);
    }

    public function aksi_validasi_kegiatan_harian(){
        $id_kegiatan = $this->input->post('id_kegiatan');
        $id_validator = $this->input->post('id_validator');
        $catatan = $this->input->post('catatan');

        $data_validasi = array(
            'NIP_VALIDATOR' => $id_validator,
            'TANGGAL_VALIDASI' => date('Y-m-d H:i:s'),
            'CATATAN' => $catatan,
            'STATUS_KEGIATAN_HARIAN' => 'Tervalidasi'
        );

        $data_tolak = array(
            'CATATAN' => $catatan,
            'STATUS_KEGIATAN_HARIAN' => 'Tertolak'
        );

        if(isset($_POST['validasi'])){
            $this->m_model->update_data('kegiatan_harian', $data_validasi, array('ID_KEGIATAN_BULANAN' => $id_kegiatan));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Validasi Kegiatan </div>');

        }else if(isset($_POST['tolak'])){
            $this->m_model->update_data('kegiatan_harian', $data_tolak, array('ID_KEGIATAN_BULANAN' => $id_kegiatan));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Tolak Kegiatan </div>');
        }

        redirect('ValidasiKegiatan/harian');
    }
}
