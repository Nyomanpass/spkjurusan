<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi_model extends CI_Model {

    public function getBySiswa($id_siswa)
    {
        return $this->db->get_where('prestasi', ['id_siswa' => $id_siswa])->result_array();
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

    public function getAllNilai()
    {
        return $this->db->get('prestasi_nilai')->result_array();
    }

    public function updateNilai($data)
    {
        foreach($data as $tingkat => $juara_list){
            foreach($juara_list as $juara => $nilai){
                $row = $this->db->get_where('prestasi_nilai', ['tingkat'=>$tingkat,'juara'=>$juara])->row();
                if($row){
                    $this->db->where(['tingkat'=>$tingkat,'juara'=>$juara])->update('prestasi_nilai', ['nilai'=>$nilai]);
                } else {
                    $this->db->insert('prestasi_nilai', ['tingkat'=>$tingkat,'juara'=>$juara,'nilai'=>$nilai]);
                }
            }
        }
    }


}
