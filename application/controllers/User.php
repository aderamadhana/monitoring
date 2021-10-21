<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_user');
        $this->load->model('m_model');
        
        $this->load->library(array('upload'));

        // if($this->session->userdata('role') != 1){
        //     $this->session->set_flashdata('messages', '<br><div class="alert alert-danger" role="alert"> <strong> Error! </strong>Silahkan login terlebih dahulu </div>');
        //     redirect(base_url("login"));
        // }
    }
    
    public function index(){
        $data['content']            = 'user/all-user';
        $data['title']              = 'User';
        $data['user']               = $this->m_user->get_all_user();

        $this->load->view('template/template', $data);
    }

    public function tambah_user(){
        $data['content']            = 'user/add-user';
        $data['title']              = 'User';
        $data['role']               = $this->m_user->get_all_role();

        $this->load->view('template/template', $data);
    }

    public function edit_user($nip){
        $data['content']            = 'user/edit-user';
        $data['title']              = 'User';
        $data['user']               = $this->m_model->get_data_where('user', array('nip' => $nip));
        $data['role']               = $this->m_user->get_all_role();

        $this->load->view('template/template', $data);
    }

    public function do_tambah_user(){
        $config = ['upload_path' => './assets/img/user/', 'allowed_types' => 'jpg|png|jpeg', 'max_size' => 2048];            
        $this->upload->initialize($config);

        $nip                = $this->input->post('NIP');
        $nama               = $this->input->post('NAMA');
        $tempat_lahir       = $this->input->post('TEMPAT_LAHIR');
        $tanggal_lahir      = $this->input->post('TANGGAL_LAHIR');
        $alamat             = $this->input->post('ALAMAT');
        $telepon            = $this->input->post('TELEPON');
        $jabatan            = $this->input->post('JABATAN');
        $username           = $this->input->post('USERNAME');
        $password           = $this->input->post('PASSWORD');
        $role               = $this->input->post('ROLE');
        $jenis_keanggotaan  = $this->input->post('JENIS_KEANGGOTAAN');
        $foto               = null;
        $penempatan_polsek  = $this->input->post('PENEMPATAN_POLSEK');
        $penempatan_polres  = $this->input->post('PENEMPATAN_POLRES');

        if($this->upload->do_upload('FOTO')){ 
			$dataUpload     = $this->upload->data();
			$foto    	    = base_url('assets/img/user/' . $dataUpload['file_name']);
		}

        $data_user = array(
            'NIP'               => $nip,
            'NAMA'              => $nama,
            'TEMPAT_LAHIR'      => $tempat_lahir,
            'TANGGAL_LAHIR'     => $tanggal_lahir,
            'ALAMAT'            => $alamat,
            'TELEPON'           => $telepon,
            'JABATAN'           => $jabatan,
            'USERNAME'          => $username,
            'PASSWORD'          => $password,
            'FOTO'              => $foto,
            'ID_ROLE'           => $role
        );
        $get_data_nip       = $this->m_model->get_data_where('user', array('NIP' => $nip));
        $get_data_username  = $this->m_model->get_data_where('user', array('USERNAME' => $username));

        if(count($get_data_nip) == 0){
            if(count($get_data_username) == 0){
                $this->m_model->insert_data('user', $data_user);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data </div>');
                
                redirect('User');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username sudah tersedia </div>');
			
                redirect('User/tambah_user');
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> NIP sudah tersedia </div>');
			
            redirect('User/tambah_user');
        }
    }

    public function do_edit_user(){
        $config = ['upload_path' => './assets/img/user/', 'allowed_types' => 'jpg|png|jpeg', 'max_size' => 2048];            
        $this->upload->initialize($config);

        $nip                = $this->input->post('NIP');
        $nama               = $this->input->post('NAMA');
        $tempat_lahir       = $this->input->post('TEMPAT_LAHIR');
        $tanggal_lahir      = $this->input->post('TANGGAL_LAHIR');
        $alamat             = $this->input->post('ALAMAT');
        $telepon            = $this->input->post('TELEPON');
        $username           = $this->input->post('USERNAME');
        $password           = $this->input->post('PASSWORD');
        $jabatan            = $this->input->post('JABATAN');
        $role               = $this->input->post('ROLE');
        $foto               = null;

        if($this->upload->do_upload('FOTO')){ 
			$dataUpload     = $this->upload->data();
			$foto    	    = base_url('assets/img/user/' . $dataUpload['file_name']);
		}

        $data_user = array(
            'NIP'               => $nip,
            'NAMA'              => $nama,
            'TEMPAT_LAHIR'      => $tempat_lahir,
            'TANGGAL_LAHIR'     => $tanggal_lahir,
            'ALAMAT'            => $alamat,
            'TELEPON'           => $telepon,
            'JABATAN'           => $jabatan,
            'USERNAME'          => $username,
            'PASSWORD'          => $password,
            'FOTO'              => $foto,
            'ID_ROLE'           => $role
        );

        $data_user_2 = array(
            'NIP'               => $nip,
            'NAMA'              => $nama,
            'TEMPAT_LAHIR'      => $tempat_lahir,
            'TANGGAL_LAHIR'     => $tanggal_lahir,
            'ALAMAT'            => $alamat,
            'TELEPON'           => $telepon,
            'JABATAN'           => $jabatan,
            'PASSWORD'          => $password,
            'FOTO'              => $foto,
            'ID_ROLE'           => $role
        );

        $get_data_nip       = $this->m_model->get_data_where('user', array('NIP' => $nip));
        foreach($get_data_nip as $data_username){
            $username_lm = $data_username->USERNAME;
        }

        if($username_lm == $username){
            $this->m_model->update_data('user', $data_user_2, array('NIP' => $nip));

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil update data </div>');
            
            redirect('User');
        }else{
            $get_data_username  = $this->m_model->get_data_where('user', array('USERNAME' => $username));

            if(count($get_data_username) == 0){
                $this->m_model->update_data('user', $data_user, array('NIP' => $nip));

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil update data </div>');
                
                redirect('User');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username sudah tersedia </div>');
            
                redirect('User/tambah_user');
            }
        }
    }

    public function hapus_user($nip){
        $this->m_model->delete_data('user', array('NIP' => $nip));

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil hapus data </div>');
                
        redirect('User');
    }
}
