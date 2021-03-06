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
        $nip 			= $this->input->post('nip');
		$password 		= $this->input->post('password');
		$role			= null;
		$nama			= null;
		$jabatan		= null;

		$dataLogin = $this->db->query('SELECT * FROM user WHERE NIP = "'.$nip.'" && PASSWORD = "'.$password.'"')->result();

		foreach($dataLogin as $data){
			$nip 		= $data->NIP;
			$role 		= $data->ID_ROLE;
			$nama 		= $data->NAMA;
			$jabatan 	= $data->JABATAN;
		}

		$data_session = array(
			'nip' 			=> $nip,
			'role' 			=> $role,
			'nama' 			=> $nama,
			'jabatan' 		=> $jabatan,
			'log' 			=> 'in'
		);
 
		$this->session->set_userdata($data_session);

		if($dataLogin != null){
			$this->session->set_flashdata('message', '');
			if($role == 1){
				redirect('Dashboard/admin');
			}else if($role == 2){
				$cek_role = $this->db->get_where('anggota_polsek', array('nip' => $nip))->result();
				if(count($cek_role) == 0){
					redirect('Dashboard/polres');
				} else {
					redirect('Dashboard/anggota');
				}
			}else if($role == 3){
				redirect('Dashboard/polsek');
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
