<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }
    
    public function index(){
        $data['content']    = 'login/login';
        $data['title']      = 'Login';

        $this->load->view('template/login', $data);
    }

    public function aksi_login(){
        $username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
		$nip			= null;
		$role			= null;
		$nama			= null;
		$jabatan		= null;

		$dataLogin = $this->db->query('SELECT * FROM user WHERE USERNAME = "'.$username.'" && PASSWORD = "'.$password.'"')->result();

		foreach($dataLogin as $data){
			$nip 		= $data->NIP;
			$role 		= $data->ID_ROLE;
			$nama 		= $data->NAMA;
			$jabatan 	= $data->JABATAN;
		}

		$data_session = array(
			'username' 		=> $username,
			'nip' 			=> $nip,
			'role' 			=> $role,
			'nama' 			=> $nama,
			'jabatan' 		=> $jabatan,
			'log' 			=> 'in'
		);
 
		$this->session->set_userdata($data_session);

		if($dataLogin != null){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Login </div>');
			if($role == 1){
				redirect('Dashboard/admin');
			}else if($role == 2){
				redirect('Dashboard/anggota');
			}else if($role == 3){
				redirect('Dashboard/polsek');
			}else if($role == 4){
				redirect('Dashboard/polres');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username/ Password Salah! </div>');
			redirect('Login');
		}
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }

}
