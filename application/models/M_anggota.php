<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_anggota extends CI_Model {
    
    public function get_all_anggota_polsek(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('anggota_polsek', 'anggota_polsek.nip = user.nip');
        $this->db->join('polsek', 'polsek.id_polsek = anggota_polsek.id_polsek');
        return $this->db->get()->result();
    }

    public function get_all_anggota_polres(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('anggota_polres', 'anggota_polres.nip = user.nip');
        $this->db->join('polres', 'polres.id_polres = anggota_polres.id_polres');
        return $this->db->get()->result();
    }
}
