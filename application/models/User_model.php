<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function register($data){
        $this->db->insert('user', $data);
    }

    public function get_user($username){
        $this->db->where('username', $username);
        return $this->db->get('user')->row_array();
    }
}
