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

}
