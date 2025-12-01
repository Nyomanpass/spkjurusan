<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekomendasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->model('Nilai_model');
    }

 public function index()
{
    // Ambil semua siswa
    $siswaList = $this->Siswa_model->get_all();

    $data['hasil'] = [];
    $cocok = 0;
    $tidakCocok = 0;

    foreach ($siswaList as $mhs) {
        $preferensi = $this->Nilai_model->hitung_preferensi($mhs['id_siswa']);

        if (!empty($preferensi)) {
            // cari nilai tertinggi (rekomendasi)
            $maxNilai = max(array_column($preferensi, 'nilai'));
            $jurusanTerbaik = null;

            foreach ($preferensi as $row) {
                if ($row['nilai'] == $maxNilai) {
                    $jurusanTerbaik = $row;
                    break;
                }
            }

            // Cek cocok / tidak
            $isCocok = ($mhs['jurusan_sekarang'] == $jurusanTerbaik['jurusan']);

            if ($isCocok) {
                $cocok++;
            } else {
                $tidakCocok++;
            }

            $data['hasil'][] = [
                'nama'             => $mhs['nama_siswa'],
                'nim'              => $mhs['nisn'],
                'jurusan'          => $jurusanTerbaik['jurusan'],
                'nilai'            => $jurusanTerbaik['nilai'],
                'jurusan_sekarang' => $mhs['jurusan_sekarang'],
                'is_cocok'         => $isCocok
            ];
        }
    }

    // Simpan data cocok & tidak cocok ke variabel view
    $data['cocok'] = $cocok;
    $data['tidak_cocok'] = $tidakCocok;

    $this->load->view('templates/header_dashboard', $data);
    $this->load->view('rekomendasi/index', $data);
    $this->load->view('templates/footer_dashboard', $data);
}

}
