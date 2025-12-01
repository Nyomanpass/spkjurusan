<?php
class RangeIQ_model extends CI_Model {

    public function get_all() {
        return $this->db->get('range_iq')->result();
    }

    public function get_keterangan($nilai) {
        return $this->db->where('nilai_min <=', $nilai)
                        ->where('nilai_max >=', $nilai)
                        ->get('range_iq')
                        ->row();
    }

    public function insert($data) {
        return $this->db->insert('range_iq', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id_range_iq', $id)->update('range_iq', $data);
    }

    public function delete($id) {
        return $this->db->where('id_range_iq', $id)->delete('range_iq');
    }

   public function getKeteranganByNilai($nilai)
    {
        return $this->db->where('nilai_min <=', $nilai)
                        ->where('nilai_max >=', $nilai)
                        ->get('range_iq')
                        ->row();
    }


}
