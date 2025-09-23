<?php
class Kriteria_model extends CI_Model
{

    public function get_all()
    {
        return $this->db->get('kriteria')->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('kriteria', ['id_kriteria' => $id])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('kriteria', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_kriteria', $id)->update('kriteria', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('kriteria', ['id_kriteria' => $id]);
    }

    public function count_all()
    {
        return $this->db->count_all('kriteria');
    }


    public function getMapelPerKriteria()
    {
        $this->db->select('k.id_kriteria, k.kode, m.nama_mapel');
        $this->db->from('kriteria_mapel km');
        $this->db->join('kriteria k', 'k.id_kriteria = km.id_kriteria');
        $this->db->join('mata_pelajaran m', 'm.id_mapel = km.id_mapel');
        $query = $this->db->get()->result_array();

        $mapel_per_id = [];
        foreach ($query as $row) {
            $mapel_per_id[$row['id_kriteria']][] = $row['nama_mapel'];
        }

        return $mapel_per_id; // format: [id_kriteria => ['mapel1', 'mapel2']]
    }

        public function getNilaiTingkat()
    {
        $this->db->select('tingkat, juara, nilai');
        $this->db->from('prestasi_nilai');
        $query = $this->db->get()->result_array();

        $nilaiTingkat = [];
        foreach ($query as $row) {
            $tingkat = $row['tingkat'];
            $juara = $row['juara'];
            $nilai = $row['nilai'];

            // Buat array multi-dimensi [tingkat][juara] = nilai
            $nilaiTingkat[$tingkat][$juara] = $nilai;
        }

        return $nilaiTingkat; // format: ['Internasional' => [1=>16, 2=>15, '>=4'=>13], ...]
    }

}
