<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raport_model extends CI_Model {

   public function getBysiswa($id_siswa) // Parameter diubah menjadi $id_siswa
        {
            $this->db->select('raport.*, mata_pelajaran.nama_mapel');
            $this->db->from('raport');
            $this->db->join('mata_pelajaran', 'raport.mapel_id = mata_pelajaran.id_mapel', 'left');
            
            // PERBAIKAN: Menggunakan 'raport.id_siswa'
            $this->db->where('raport.id_siswa', $id_siswa); 
            
            return $this->db->get()->result_array();
        }


    public function getBySiswaMapel($id_siswa, $mapel_id) // Parameter diubah
    {
        // PERBAIKAN: Menggunakan 'id_siswa' di array where
        return $this->db->get_where('raport', [
            'id_siswa' => $id_siswa, // Kolom database yang benar
            'mapel_id' => $mapel_id
        ])->row_array();
    }

    public function insert($data)
    {
        // Data yang dimasukkan ($data) harus sudah berisi key 'id_siswa'
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