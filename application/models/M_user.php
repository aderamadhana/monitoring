<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
    
    public function get_all_user(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('role', 'role.id_role = user.id_role');
        $this->db->where('ROLE !=', 'anggota');
        return $this->db->get()->result();
    }

    public function get_all_role(){
        $this->db->select('*');
        $this->db->from('role');
        $this->db->where('ROLE !=', 'anggota');
        return $this->db->get()->result();
    }

}
