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

    public function tambah_kegiatan_harian($id_kegiatan){
        $data['content']                = 'kegiatan_bulanan/add-kegiatan-harian';
        $data['title']                  = 'Kegiatan Harian';
        $data['id_kegiatan_bulanan']    = $id_kegiatan;
        $data_kuantitas                 = $this->m_model->selectDataone('kegiatan_bulanan', array('ID_KEGIATAN_BULANAN' => $id_kegiatan));
        $data['target_kuantitas']       = $data_kuantitas['TARGET_KUANTITAS'];
        $this->load->view('template/template', $data);
    }

    public function do_tambah_kegiatan_harian(){

        $this->db->delete('kegiatan_harian', array('ID_KEGIATAN_BULANAN' => $this->input->post('ID_KEGIATAN_BULANAN')));

        $this->m_model->delete_data('kegiatan_harian', array('ID_KEGIATAN_BULANAN' => $this->input->post('ID_KEGIATAN_BULANAN')));

        $config = ['upload_path' => './assets/img/kegiatan/', 'allowed_types' => 'jpg|png|jpeg', 'max_size' => 2048];            
        $this->upload->initialize($config);

        $getKegiatanBulananById = $this->db->get_where('kegiatan_bulanan', array('ID_KEGIATAN_BULANAN' => $this->input->post('ID_KEGIATAN_BULANAN')))->row_array();
        
        $target_kuantitas = $getKegiatanBulananById['TARGET_KUANTITAS'];

        for($i=0;$i<$target_kuantitas;$i++){
            $_FILES['file']['name'] = $_FILES['BUKTI']['name'][$i];
            $_FILES['file']['type'] = $_FILES['BUKTI']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['BUKTI']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['BUKTI']['error'][$i];

    
            $_FILES['file']['size'] = $_FILES['BUKTI']['size'][$i];
    
            $config['upload_path'] = 'assets/img/kegiatan/'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '5000';
            $config['file_name'] = $_FILES['BUKTI']['name'][$i];
    
            $this->load->library('upload',$config); 
        
            if($this->upload->do_upload('file')){
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
    
                $data['totalFiles'][] = $filename;
            }else{
                $data['totalFiles'][] = "";
            }
        }

        $result = array();
        foreach ($_POST['NAMA_KEGIATAN'] as $key => $val) {
            $result[] = array(             
                'NAMA_KEGIATAN' => $_POST['NAMA_KEGIATAN'][$key],
                'DESKRIPSI_KEGIATAN' => $_POST['DESKRIPSI_KEGIATAN'][$key],
                'ID_KEGIATAN_BULANAN' => $_POST['ID_KEGIATAN_BULANAN'], 
                'TANGGAL_KEGIATAN' => $_POST['TANGGAL_KEGIATAN'][$key],
                'WAKTU_KEGIATAN' => $_POST['WAKTU_KEGIATAN'][$key],
                'BUKTI' => $data['totalFiles'][$key],        
            );      
        }      
        $this->db->insert_batch('kegiatan_harian',$result);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data </div>');
            
        redirect('KegiatanBulanan');
    }

}
