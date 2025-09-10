<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MataPelajaran_model extends CI_Model {

    protected $table = 'mata_pelajaran';

 
    public function get_all()
    {
        return $this->db->get($this->table)->result_array();
    }

 
    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id_mapel' => $id])->row_array();
    }

   
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

  
    public function update($id, $data)
    {
        return $this->db->where('id_mapel', $id)->update($this->table, $data);
    }

   
    public function delete($id)
    {
        return $this->db->delete($this->table, ['id_mapel' => $id]);
    }
}
