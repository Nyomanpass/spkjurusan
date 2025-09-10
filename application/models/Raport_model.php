<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raport_model extends CI_Model {

   public function getByMahasiswa($id_mahasiswa)
        {
            $this->db->select('raport.*, mata_pelajaran.nama_mapel');
            $this->db->from('raport');
            $this->db->join('mata_pelajaran', 'raport.mapel_id = mata_pelajaran.id_mapel', 'left');
            $this->db->where('raport.id_mahasiswa', $id_mahasiswa);
            return $this->db->get()->result_array(); // gunakan result_array agar hasil berupa array
        }


    public function getByMahasiswaMapel($id_mahasiswa, $mapel_id)
    {
        return $this->db->get_where('raport', [
            'id_mahasiswa' => $id_mahasiswa,
            'mapel_id' => $mapel_id
        ])->row_array(); // row_array agar konsisten dengan array
    }

    public function insert($data)
    {
        return $this->db->insert('raport', $data);
    }

    public function getById($id_raport) {
        return $this->db->get_where('raport', ['id_raport' => $id_raport])->row();
    }


    public function update($id, $data)
    {
        return $this->db->where('id_raport', $id)->update('raport', $data);
    }
}
