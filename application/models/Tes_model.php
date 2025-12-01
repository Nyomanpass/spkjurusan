<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes_model extends CI_Model {

   public function getBySiswa($id_siswa)
    {
        return $this->db->get_where('tes', ['id_siswa' => $id_siswa])->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('tes', $data);
    }

    public function getById($id_tes) {
        return $this->db->get_where('tes', ['id_tes' => $id_tes])->row_array();
    }

    public function update($id_tes, $data)
    {
        $this->db->where('id_tes', $id_tes);
        return $this->db->update('tes', $data);
    }

    public function delete($id_tes) {
        return $this->db->delete('tes', ['id_tes' => $id_tes]);
    }

}
