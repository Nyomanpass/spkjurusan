<?php
class Siswa_model extends CI_Model
{

    public function get_all()
    {
        return $this->db->get('siswa')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('siswa', ['id_siswa' => $id])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('siswa', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_siswa', $id)->update('siswa', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('siswa', ['id_siswa' => $id]);
    }

    public function count_all()
    {
        return $this->db->count_all('siswa');
    }
}
