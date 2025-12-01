<?php
class RangeWawancara_model extends CI_Model {

    public function get_all() {
        return $this->db->get('range_wawancara')->result();
    }

    public function get_keterangan($nilai) {
        return $this->db->where('nilai_min <=', $nilai)
                        ->where('nilai_max >=', $nilai)
                        ->get('range_wawancara')
                        ->row();
    }

    public function insert($data) {
        return $this->db->insert('range_wawancara', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id_range_wawancara', $id)->update('range_wawancara', $data);
    }

    public function delete($id) {
        return $this->db->where('id_range_wawancara', $id)->delete('range_wawancara');
    }

   public function getKeteranganByNilai($nilai)
    {
        return $this->db->where('nilai_min <=', $nilai)
                        ->where('nilai_max >=', $nilai)
                        ->get('range_wawancara')
                        ->row();
    }


}
