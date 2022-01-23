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

    public function get_user_by_kapolsek($idKapolsek)
    {
       return $this->db->query("SELECT * FROM user WHERE user.NIP IN (SELECT anggota_polsek.NIP FROM anggota_polsek WHERE anggota_polsek.ID_POLSEK IN (SELECT anggota_polsek.ID_POLSEK FROM anggota_polsek WHERE anggota_polsek.NIP = '".$idKapolsek."')) AND user.NIP NOT IN('".$idKapolsek."');")->result();
    }

}
