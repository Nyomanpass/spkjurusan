<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekomendasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->model('Nilai_model');
        $this->load->model('Jurusan_model');
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

public function export_pdf()
{
    // Ambil data siswa
    $siswaList = $this->Siswa_model->get_all();
    $hasil_akhir = [];

    foreach ($siswaList as $mhs) {
        // Hitung preferensi secara real-time
        $preferensi = $this->Nilai_model->hitung_preferensi($mhs['id_siswa']);

        if (!empty($preferensi)) {
            // Cari nilai tertinggi
            $maxNilai = max(array_column($preferensi, 'nilai'));
            $jurusanTerbaik = null;

            foreach ($preferensi as $row) {
                if ($row['nilai'] == $maxNilai) {
                    $jurusanTerbaik = $row;
                    break;
                }
            }

            // PASTIKAN SEMUA KEY INI ADA
            $hasil_akhir[] = [
                'nama'             => $mhs['nama_siswa'],
                'nim'              => $mhs['nisn'],
                'jurusan'          => $jurusanTerbaik['jurusan'],
                'nilai'            => $jurusanTerbaik['nilai'], // <--- INI HARUS ADA
                'jurusan_sekarang' => $mhs['jurusan_sekarang']
            ];
        }
    }

    $data['hasil'] = $hasil_akhir;

    // Load library dan render view
    $this->load->library('pdf');
    $html = $this->load->view('laporan_pdf_view', $data, true);
    $this->pdf->generate($html, "Laporan_Rekomendasi_Jurusan");
}

}
