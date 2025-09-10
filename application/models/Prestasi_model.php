<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi_model extends CI_Model {

    public function getByMahasiswa($id_mahasiswa)
    {
        return $this->db->get_where('prestasi', ['id_mahasiswa' => $id_mahasiswa])->result_array();
    }

    public function getById($id_prestasi)
    {
        return $this->db->get_where('prestasi', ['id_prestasi' => $id_prestasi])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('prestasi', $data);
    }

    public function update($id_prestasi, $data)
    {
        $this->db->where('id_prestasi', $id_prestasi);
        return $this->db->update('prestasi', $data);
    }

    public function delete($id_prestasi)
    {
        return $this->db->delete('prestasi', ['id_prestasi' => $id_prestasi]);
    }
}
