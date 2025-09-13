<?php
class Bobot_model extends CI_Model
{

    public function getAll()
    {
        $this->db->select('bobot_jurusan.*, jurusan.nama as jurusan, kriteria.nama as kriteria');
        $this->db->from('bobot_jurusan');
        $this->db->join('jurusan', 'jurusan.id_jurusan = bobot_jurusan.id_jurusan');
        $this->db->join('kriteria', 'kriteria.id_kriteria = bobot_jurusan.id_kriteria');
        return $this->db->get()->result();
    }

    public function getBobot()
    {
        $this->db->select('bobot_jurusan.*, jurusan.nama as jurusan, kriteria.kode as kode_kriteria');
        $this->db->from('bobot_jurusan');
        $this->db->join('jurusan', 'jurusan.id_jurusan = bobot_jurusan.id_jurusan');
        $this->db->join('kriteria', 'kriteria.id_kriteria = bobot_jurusan.id_kriteria');
        return $this->db->get()->result();
    }


    public function get_by_id($id)
    {
        $this->db->select('bobot_jurusan.*, jurusan.nama as jurusan, kriteria.nama as kriteria');
        $this->db->from('bobot_jurusan');
        $this->db->join('jurusan', 'jurusan.id_jurusan = bobot_jurusan.id_jurusan');
        $this->db->join('kriteria', 'kriteria.id_kriteria = bobot_jurusan.id_kriteria');
        $this->db->where('id_bobot', $id);
        return $this->db->get()->row();
    }

    public function insert($data)
    {
        return $this->db->insert('bobot_jurusan', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_bobot', $id);
        return $this->db->update('bobot_jurusan', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('bobot_jurusan', ['id_bobot' => $id]);
    }

    public function count_all()
    {
        return $this->db->count_all('bobot_jurusan');
    }
}
