<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RangeMapel_model extends CI_Model {

    private $table = 'range_mapel';
    private $pk = 'id_range'; 

    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    public function get($id) {
        return $this->db->get_where($this->table, [$this->pk => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->where($this->pk, $id)->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->delete($this->table, [$this->pk => $id]);
    }

    public function getKeteranganByNilai($nilai)
    {
        return $this->db
            ->where('nilai_min <=', $nilai)
            ->where('nilai_max >=', $nilai)
            ->get('range_mapel')
            ->row();
    }

}
