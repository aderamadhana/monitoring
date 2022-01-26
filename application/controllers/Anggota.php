<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

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
        $data['content']            = 'anggota/all-anggota';
        $data['title']              = 'Anggota';
        $data['anggota_polsek']     = $this->m_anggota->get_all_anggota_polsek();
        $data['anggota_polres']     = $this->m_anggota->get_all_anggota_polres();

        $this->load->view('template/template', $data);
    }

    public function tambah_anggota(){
        $data['content']            = 'anggota/add-anggota';
        $data['title']              = 'Anggota';
        $data['anggota_polsek']     = $this->m_model->get_data_all('polsek');
        $data['role']               = $this->m_model->get_data_all('role');
        $data['anggota_polres']     = $this->m_model->get_data_all('polres');

        $this->load->view('template/template', $data);
    }

    public function edit_anggota($nip){
        $data['content']            = 'anggota/edit-anggota';
        $data['title']              = 'Anggota';
        $data['anggota']            = $this->m_model->get_data_where('user', array('nip' => $nip));
        $data['anggota_polsek']     = $this->m_model->get_data_all('polsek');
        $data['anggota_polres']     = $this->m_model->get_data_all('polres');

        $this->load->view('template/template', $data);
    }

    public function do_tambah_anggota(){
        $config = ['upload_path' => './assets/img/anggota/', 'allowed_types' => 'jpg|png|jpeg', 'max_size' => 2048];            
        $this->upload->initialize($config);

        $nip                = $this->input->post('NIP');
        $nama               = $this->input->post('NAMA');
        $tempat_lahir       = $this->input->post('TEMPAT_LAHIR');
        $tanggal_lahir      = $this->input->post('TANGGAL_LAHIR');
        $alamat             = $this->input->post('ALAMAT');
        $telepon            = $this->input->post('TELEPON');
        $jabatan            = $this->input->post('JABATAN');
        $password           = $this->input->post('PASSWORD');
        $id_role            = $this->input->post('ID_ROLE');
        $jenis_keanggotaan  = $this->input->post('JENIS_KEANGGOTAAN');
        $foto               = null;
        $penempatan_polsek  = $this->input->post('PENEMPATAN_POLSEK');
        $penempatan_polres  = $this->input->post('PENEMPATAN_POLRES');

        if($this->upload->do_upload('FOTO')){ 
			$dataUpload     = $this->upload->data();
			$foto    	    = base_url('assets/img/anggota/' . $dataUpload['file_name']);
		}

        $data_anggota = array(
            'NIP'               => $nip,
            'NAMA'              => $nama,
            'TEMPAT_LAHIR'      => $tempat_lahir,
            'TANGGAL_LAHIR'     => $tanggal_lahir,
            'ALAMAT'            => $alamat,
            'TELEPON'           => $telepon,
            'JABATAN'           => $jabatan,
            'PASSWORD'          => $password,
            'FOTO'              => $foto,
            'ID_ROLE'           => $id_role
        );

        $data_nip_polsek = array(
            'NIP'               => $nip,
            'ID_POLSEK'         => $penempatan_polsek,
        );

        $data_nip_polres = array(
            'NIP'               => $nip,
            'ID_POLRES'         => $penempatan_polres
        );

        $get_data_nip       = $this->m_model->get_data_where('user', array('NIP' => $nip));

        if(count($get_data_nip) == 0){
            $this->m_model->insert_data('user', $data_anggota);

            if($jenis_keanggotaan == 'polsek'){
                $this->m_model->insert_data('anggota_polsek', $data_nip_polsek);
            }else if($jenis_keanggotaan == 'polres'){
                $this->m_model->insert_data('anggota_polres', $data_nip_polres);                
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data </div>');
            
            redirect('Anggota');
            
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> NIP sudah tersedia </div>');
			
            redirect('Anggota/tambah_anggota');
        }
    }

    public function do_edit_anggota(){
        $config = ['upload_path' => './assets/img/anggota/', 'allowed_types' => 'jpg|png|jpeg', 'max_size' => 2048];            
        $this->upload->initialize($config);

        $nip                = $this->input->post('NIP');
        $nama               = $this->input->post('NAMA');
        $tempat_lahir       = $this->input->post('TEMPAT_LAHIR');
        $tanggal_lahir      = $this->input->post('TANGGAL_LAHIR');
        $alamat             = $this->input->post('ALAMAT');
        $telepon            = $this->input->post('TELEPON');
        $password           = $this->input->post('PASSWORD');
        $jenis_keanggotaan  = $this->input->post('JENIS_KEANGGOTAAN');
        $foto               = null;
        $penempatan_polsek  = $this->input->post('PENEMPATAN_POLSEK');
        $penempatan_polres  = $this->input->post('PENEMPATAN_POLRES');

        if($this->upload->do_upload('FOTO')){ 
			$dataUpload     = $this->upload->data();
			$foto    	    = base_url('assets/img/anggota/' . $dataUpload['file_name']);
		}

        $data_anggota = array(
            'NIP'               => $nip,
            'NAMA'              => $nama,
            'TEMPAT_LAHIR'      => $tempat_lahir,
            'TANGGAL_LAHIR'     => $tanggal_lahir,
            'ALAMAT'            => $alamat,
            'TELEPON'           => $telepon,
            'JABATAN'           => 'Anggota',
            'PASSWORD'          => $password,
            'FOTO'              => $foto,
            'ID_ROLE'              => 2
        );

        $data_nip_polsek = array(
            'NIP'               => $nip,
            'ID_POLSEK'         => $penempatan_polsek,
        );

        $data_nip_polres = array(
            'NIP'               => $nip,
            'ID_POLRES'         => $penempatan_polres
        );

        $this->m_model->update_data('user', $data_anggota, array('NIP' => $nip));

        if($jenis_keanggotaan == 'polsek'){
            $this->m_model->update_data('anggota_polsek', $data_nip_polsek, array('NIP' => $nip));
        }else if($jenis_keanggotaan == 'polres'){
            $this->m_model->update_data('anggota_polres', $data_nip_polres, array('NIP' => $nip));
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil update data </div>');
                
        redirect('Anggota');
    }

    public function hapus_anggota($nip){
        $this->m_model->delete_data('anggota_polsek', array('NIP' => $nip));
        $this->m_model->delete_data('anggota_polres', array('NIP' => $nip));
        $this->m_model->delete_data('user', array('NIP' => $nip));

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil hapus data </div>');
                
        redirect('Anggota');
    }
}
