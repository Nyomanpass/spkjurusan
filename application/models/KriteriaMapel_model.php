<?php
class KriteriaMapel_model extends CI_Model
{
    // Ambil semua data, join supaya dapat nama kriteria & mapel
    public function getGrouped()
{
    $this->db->select('km.id, k.id_kriteria, k.kode, k.nama as kriteria, m.nama_mapel');
    $this->db->from('kriteria_mapel km');
    $this->db->join('kriteria k', 'k.id_kriteria = km.id_kriteria');
    $this->db->join('mata_pelajaran m', 'm.id_mapel = km.id_mapel');
    $result = $this->db->get()->result_array();

    $grouped = [];
    foreach ($result as $row) {
        $id = $row['id_kriteria'];
        $grouped[$id]['id_kriteria'] = $row['id_kriteria'];
        $grouped[$id]['kode'] = $row['kode']; // tambahin kode di sini
        $grouped[$id]['kriteria'] = $row['kriteria'];
        $grouped[$id]['mapel'][] = [
            'id' => $row['id'],
            'nama_mapel' => $row['nama_mapel']
        ];
    }
    return $grouped;
}


    public function insert($data)
    {
        return $this->db->insert('kriteria_mapel', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('kriteria_mapel', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('kriteria_mapel', ['id' => $id]);
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('kriteria_mapel', ['id' => $id])->row_array();
    }
}
