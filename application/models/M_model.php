<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_model extends CI_Model {
    
    public function get_data_where($table_name, $condition){
        return $this->db->get_where($table_name, $condition)->result();
    }
    
    public function get_data_all($table_name){
        return $this->db->get($table_name)->result();
    }

    public function get_data_group_by($table_name, $group_by){
        return $this->db->group_by($group_by)->get($table_name)->result();
    }

    public function insert_data($table_name, $data){
        $this->db->insert($table_name, $data);
    }

    public function update_data($table_name, $data, $condition){
        $this->db->set($data)->where($condition)->update($table_name);
    }

    public function delete_data($table_name, $condition){
        $this->db->delete($table_name, $condition);
    }

    public function selectDataone($table,$where)
		{

				$query = $this->db->get_where($table,$where);
				return $query->row_array();
		}
}
