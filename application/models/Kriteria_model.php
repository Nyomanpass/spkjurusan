<?php
class Kriteria_model extends CI_Model
{

    public function get_all()
    {
        return $this->db->get('kriteria')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('kriteria', ['id_kriteria' => $id])->row();
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
}
