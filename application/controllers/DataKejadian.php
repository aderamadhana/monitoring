<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

class DataKejadian extends CI_Controller {

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
        $data['content']            = 'data_kejadian/all-kejadian';
        $data['title']              = 'Data Kejadian';
        $data['kejadian']           = $this->m_model->get_data_where('kejadian', array('NIP_PENCATAT' => $this->session->userdata('nip')));

        $this->load->view('template/template', $data);
    }

    public function polsek(){
        $data['content']            = 'data_kejadian/all-kejadian-polsek';
        $data['title']              = 'Data Kejadian';
        $data['kejadian']           = $this->db->select('*, COUNT(NIP_PENCATAT) AS TOTAL_KEJADIAN')->from('kejadian')->join('user', 'user.nip = kejadian.NIP_PENCATAT')->group_by('NIP_PENCATAT')->get()->result();

        $this->load->view('template/template', $data);
    }

    public function detail($nip){
        $data['content']            = 'data_kejadian/all-kejadian-polsek-detail';
        $data['title']              = 'Data Kejadian';
        $data['kejadian']           = $this->m_model->get_data_where('kejadian', array('NIP_PENCATAT' => $nip));

        $this->load->view('template/template', $data);
    }

    public function detail_kejadian($idKejadian){
        $data['content']            = 'data_kejadian/all-kejadian-detail';
        $data['title']              = 'Data Kejadian';
        $data['kejadian']           = $this->m_model->selectDataone('kejadian', array('ID_KEJADIAN' => $idKejadian));

        $kejadian                   = $this->m_model->selectDataone('kejadian', array('ID_KEJADIAN' => $idKejadian));
        $data['nip_pencatat']       = $this->m_model->selectDataone('user', array('NIP' => $kejadian['NIP_PENCATAT']));
        $data['nip_validator']      = $this->m_model->selectDataone('user', array('NIP' => $kejadian['NIP_VALIDATOR']));
        $anggotaPolsek              = $this->m_model->selectDataone('anggota_polsek', array('NIP' => $kejadian['NIP_PENCATAT']));
        
        $data['polsek']             = $this->m_model->selectDataone('polsek', array('ID_POLSEK' => $anggotaPolsek['ID_POLSEK']));

        $this->load->view('template/template', $data);
    }
 
    public function tambah_kejadian(){
        $data['content']            = 'data_kejadian/add-kejadian';
        $data['title']              = 'Kejadian';

        $this->load->view('template/template', $data);
    }

    public function edit_kejadian($id_kejadian){
        $data['content']            = 'data_kejadian/edit-kejadian';
        $data['title']              = 'Kejadian';
        $data['kejadian']           = $this->m_model->selectDataone('kejadian', array('ID_KEJADIAN' => $id_kejadian));

        $this->load->view('template/template', $data);
    }

    public function do_tambah_kejadian(){

        $data = $_POST;

        $this->m_model->insert_data('kejadian', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data </div>');
            
        redirect('DataKejadian');
    }

    public function do_edit_kejadian(){

        $data = $_POST;

        $this->m_model->update_data('kejadian', $data, array('ID_KEJADIAN' => $this->input->post('ID_KEJADIAN')));

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil update data </div>');
            
        redirect('DataKejadian');
    }

    public function hapus_kejadian($id_kejadian){
        $this->m_model->delete_data('kejadian', array('ID_KEJADIAN' => $id_kejadian));

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil hapus data </div>');
            
        redirect('DataKejadian');
    }
}
