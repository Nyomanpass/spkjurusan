<?php
class Mahasiswa_model extends CI_Model {

    public function get_all() {
        return $this->db->get('mahasiswa')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('mahasiswa', ['id_mahasiswa' => $id])->row_array();
    }


    public function insert($data) {
        return $this->db->insert('mahasiswa', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id_mahasiswa', $id)->update('mahasiswa', $data);
    }

    public function delete($id) {
        return $this->db->delete('mahasiswa', ['id_mahasiswa' => $id]);
    }
}
