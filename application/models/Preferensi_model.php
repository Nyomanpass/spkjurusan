<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preferensi_model extends CI_Model {

    public function hitungPreferensi($id_mahasiswa)
    {
        $jurusan_list = $this->db->get('jurusan')->result_array();

        foreach($jurusan_list as $jurusan){
            $id_jurusan = $jurusan['id_jurusan'];

            // Ambil bobot jurusan
            $bobot = $this->db->get_where('bobot_jurusan', ['id_jurusan'=>$id_jurusan])->result_array();

            // Ambil nilai mahasiswa
            $nilai_mahasiswa = $this->db->get_where('nilai_mahasiswa', ['id_mahasiswa'=>$id_mahasiswa])->result_array();
            $nilai_map = [];
            foreach($nilai_mahasiswa as $n){
                $nilai_map[$n['id_kriteria']] = $n['nilai'];
            }

            // Hitung preferensi
            $nilai_preferensi = 0;
            foreach($bobot as $b){
                $id_k = $b['id_kriteria'];
                $bwt = $b['bobot'];
                $nilai = isset($nilai_map[$id_k]) ? $nilai_map[$id_k] : 0;
                $nilai_preferensi += ($nilai * $bwt) / 100;
            }

            // Simpan ke tabel preferensi
            $this->db->insert('preferensi', [
                'id_mahasiswa'=>$id_mahasiswa,
                'id_jurusan'=>$id_jurusan,
                'nilai_preferensi'=>$nilai_preferensi,
                'tanggal'=>date('Y-m-d H:i:s')
            ]);
        }

        return true;
    }

        // Ambil semua preferensi mahasiswa
    public function getPreferensiMahasiswa($id_mahasiswa) {
    $this->db->select('p.*, j.nama AS nama_jurusan');
    $this->db->from('preferensi p');
    $this->db->join('jurusan j', 'p.id_jurusan = j.id_jurusan', 'left'); // <-- ubah di sini
    $this->db->where('p.id_mahasiswa', $id_mahasiswa);
    $this->db->order_by('p.nilai_preferensi', 'DESC'); // urut dari tinggi ke rendah
    $query = $this->db->get();
    return $query->result_array();
}

// Ambil jurusan terbaik (nilai tertinggi)
public function getRekomendasiJurusan($id_mahasiswa) {
    $this->db->select('p.*, j.nama AS nama_jurusan');
    $this->db->from('preferensi p');
    $this->db->join('jurusan j', 'p.id_jurusan = j.id_jurusan', 'left'); // <-- ubah di sini
    $this->db->where('p.id_mahasiswa', $id_mahasiswa);
    $this->db->order_by('p.nilai_preferensi', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->row_array();
}


}
