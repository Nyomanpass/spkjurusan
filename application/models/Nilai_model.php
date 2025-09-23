<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model {

    protected $table = 'nilai_mahasiswa';

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function insert_batch($data)
    {
        return $this->db->insert_batch($this->table, $data);
    }

    public function saveOrUpdateBatch($data)
    {
        foreach ($data as $row) {
            $exists = $this->db->get_where($this->table, [
                'id_mahasiswa' => $row['id_mahasiswa'],
                'id_kriteria'  => $row['id_kriteria']
            ])->row_array();

            if ($exists) {
                // update nilai
                $this->db->where('id_mahasiswa', $row['id_mahasiswa']);
                $this->db->where('id_kriteria', $row['id_kriteria']);
                $this->db->update($this->table, ['nilai' => $row['nilai']]);
            } else {
                // insert nilai baru
                $this->db->insert($this->table, $row);
            }
        }
    }
    
  public function getNilaiAlternatif()
    {
        $this->db->select('m.id_mahasiswa, m.nama_siswa, k.kode as kriteria, n.nilai');
        $this->db->from('nilai_mahasiswa n');
        $this->db->join('mahasiswa m', 'm.id_mahasiswa = n.id_mahasiswa');
        $this->db->join('kriteria k', 'k.id_kriteria = n.id_kriteria');
        $this->db->order_by('m.id_mahasiswa, k.kode');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_normalisasi() {
        // Ambil semua nilai
        $this->db->select('m.id_mahasiswa, m.nama_siswa, k.kode, n.nilai');
        $this->db->from('nilai_mahasiswa n');
        $this->db->join('mahasiswa m', 'm.id_mahasiswa = n.id_mahasiswa');
        $this->db->join('kriteria k', 'k.id_kriteria = n.id_kriteria');
        $this->db->order_by('m.id_mahasiswa, k.kode');
        $query = $this->db->get()->result_array();

        // Susun data per siswa
        $data = [];
        $max = [];

        foreach ($query as $row) {
            $id = $row['id_mahasiswa'];
            $kode = $row['kode'];
            $nilai = $row['nilai'];

            $data[$id]['nama'] = $row['nama_siswa'];
            $data[$id]['nilai'][$kode] = $nilai;

            // cari max per kriteria
            if (!isset($max[$kode]) || $nilai > $max[$kode]) {
                $max[$kode] = $nilai;
            }
        }

        // Normalisasi
        $normalisasi = [];
        foreach ($data as $id => $row) {
            $normalisasi[$id]['nama'] = $row['nama'];
            foreach ($row['nilai'] as $kode => $nilai) {
                $normalisasi[$id]['normalisasi'][$kode] = $nilai / $max[$kode];
            }
        }

        return $normalisasi;
    }

    public function hitung_preferensi($id_mahasiswa) {
    // 1. Ambil normalisasi mahasiswa
        $normalisasi = $this->get_normalisasi();
        if (!isset($normalisasi[$id_mahasiswa])) {
            return [];
        }
        $nilaiNormalisasi = $normalisasi[$id_mahasiswa]['normalisasi'];

        // 2. Ambil semua bobot jurusan
        $this->load->model('Bobot_model');
        $bobotJurusan = $this->Bobot_model->getBobot();

        foreach ($bobotJurusan as $b) {
            $jurusanBobot[$b['id_jurusan']][$b['kode_kriteria']] = $b['bobot'];
            $jurusanNama[$b['id_jurusan']] = $b['jurusan'];
        }


        // 4. Hitung preferensi (Σ normalisasi * bobot)
        $preferensi = [];
        foreach ($jurusanBobot as $id_jurusan => $kriteriaBobot) {
            $total = 0;
            foreach ($kriteriaBobot as $kodeKriteria => $bobot) {
                if (isset($nilaiNormalisasi[$kodeKriteria])) {
                    $total += $nilaiNormalisasi[$kodeKriteria] * $bobot;
                }
            }
            $preferensi[$id_jurusan] = [
                'jurusan' => $jurusanNama[$id_jurusan],
                'nilai'   => round($total, 2)
            ];
        }

        return $preferensi;
    }



}
