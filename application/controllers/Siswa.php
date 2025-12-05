<?php
class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->model('Raport_model');
        $this->load->model('Prestasi_model');
        $this->load->model('Tes_model');
        $this->load->model('MataPelajaran_model');
        $this->load->model('Nilai_model');
        $this->load->model('Preferensi_model');
        $this->load->model('Kriteria_model');
        $this->load->model('Jurusan_model');
        $this->load->model('RangeMapel_model');
        $this->load->model('RangeIQ_model');
        $this->load->model('RangeWawancara_model');


        $this->load->library('session');
        $this->load->helper(['url', 'form']);

        // cek login
        if (!$this->session->userdata('id_user')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = "Data Siswa";
        $data['siswa'] = $this->Siswa_model->get_all();
        $data['jurusan'] = $this->Jurusan_model->get_all();
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/footer_dashboard');
    }

    public function create()
    {
        $data['title'] = "Tambah siswa";
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('siswa/create');
        $this->load->view('templates/footer_dashboard');
    }

    public function store()
    {
        $data = $this->input->post();
        $this->Siswa_model->insert($data);
        redirect('siswa');
    }

    public function edit($id)
    {
        $data['title'] = "Edit siswa";
        $data['siswa'] = $this->Siswa_model->getById($id);
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('siswa/edit', $data);
        $this->load->view('templates/footer_dashboard');
    }

    public function update($id)
    {
        $data = $this->input->post();
        $this->Siswa_model->update($id, $data);
        redirect('siswa');
    }

    public function delete($id)
    {
        $this->Siswa_model->delete($id);
        redirect('siswa');
    }


    // --- Delete Prestasi ---
    public function deletePrestasi($id_prestasi, $id_siswa)
    {
        $this->Prestasi_model->delete($id_prestasi);
        $this->session->set_flashdata('success', 'Prestasi berhasil dihapus!');
        redirect('siswa/detail/' . $id_siswa);
    }

    // --- Delete Tes ---
    public function deleteTes($id_tes, $id_siswa)
    {
        $this->Tes_model->delete($id_tes);
        $this->session->set_flashdata('success', 'Tes berhasil dihapus!');
        redirect('siswa/detail/' . $id_siswa);
    }



    public function detail($id, $type = null, $item_id = null)
    {
        // --- DATA UTAMA ---
        $data['siswa']      = $this->Siswa_model->getById($id);
        $data['raport']         = $this->Raport_model->getBysiswa($id);
        $data['prestasi']       = $this->Prestasi_model->getBysiswa($id);
        $data['tes']            = $this->Tes_model->getBysiswa($id);
        $data['mata_pelajaran'] = $this->MataPelajaran_model->get_all();

        // --- Default null ---
        $data['edit_prestasi'] = null;
        $data['edit_tes']      = null;
        $data['id_siswa']  = $id;

        // --- Mode Edit ---
        if ($type == 'prestasi' && $item_id) {
            $data['edit_prestasi'] = $this->Prestasi_model->getById($item_id);
        }

        if ($type == 'tes' && $item_id) {
            $data['edit_tes'] = $this->Tes_model->getById($item_id);
        }

        // ---------- SIMPAN RAPORT ----------
        if ($this->input->post('submit_raport')) {
            foreach ($this->input->post('pengetahuan') as $mapel_id => $pengetahuan) {
                $keterampilan = $this->input->post('keterampilan')[$mapel_id];
                $nilaiAkhir   = ceil(($pengetahuan + $keterampilan) / 2);
            
                $dataRaport = [
                    'id_siswa' => $id,
                    'mapel_id'     => $mapel_id,
                    'pengetahuan'  => $pengetahuan,
                    'keterampilan' => $keterampilan,
                    'nilai_akhir'  => $nilaiAkhir,
                ];

                $existing = $this->Raport_model->getBysiswaMapel($id, $mapel_id);
                if (!empty($existing)) {
                    $this->Raport_model->update($existing['id_raport'], $dataRaport);
                } else {
                    $this->Raport_model->insert($dataRaport);
                }
            }

            $this->session->set_flashdata('success', 'Data raport berhasil disimpan/diupdate!');
            redirect('siswa/detail/' . $id);
        }

        // ---------- SIMPAN / UPDATE PRESTASI ----------
        if ($this->input->post('submit_prestasi')) {
            $post = $this->input->post();

            $dataPrestasi = [
                'id_siswa'   => $id,
                'jenis_prestasi' => $post['jenis_prestasi'],
                'tingkat'        => $post['tingkat'],
                'juara'          => $post['juara'],
            ];

            if (!empty($post['id_prestasi'])) {
                $this->Prestasi_model->update($post['id_prestasi'], $dataPrestasi);
                $this->session->set_flashdata('success', 'Prestasi berhasil diperbarui!');
            } else {
                $this->Prestasi_model->insert($dataPrestasi);
                $this->session->set_flashdata('success', 'Prestasi berhasil ditambahkan!');
            }

            redirect('siswa/detail/' . $id);
        }

        // ---------- SIMPAN / UPDATE TES ----------
        if ($this->input->post('submit_tes')) {
            $post = $this->input->post();

            $dataTes = [
                'id_siswa' => $id,
                'iq'           => $post['iq'],
                'wawancara'    => $post['wawancara']
            ];

            if (!empty($post['id_tes'])) {
                $this->Tes_model->update($post['id_tes'], $dataTes);
                $this->session->set_flashdata('success', 'Tes berhasil diperbarui!');
            } else {
                $this->Tes_model->insert($dataTes);
                $this->session->set_flashdata('success', 'Tes berhasil ditambahkan!');
            }

            redirect('siswa/detail/' . $id);
        }

        // ====== Tambah Keterangan IQ & Wawancara ======

        $tesFixed = [];

        foreach ($data['tes'] as $row) {

            $row = (array) $row;

            $iqVal = $row['iq'] ?? 0;
            $wwVal = $row['wawancara'] ?? 0;

            $iqRange = $this->RangeIQ_model->getKeteranganByNilai($iqVal);
            $wwRange = $this->RangeWawancara_model->getKeteranganByNilai($wwVal);

            $iqRange = (array) $iqRange;
            $wwRange = (array) $wwRange;

            $row['ket_iq'] = $iqRange['keterangan'] ?? '-';
            $row['ket_wawancara'] = $wwRange['keterangan'] ?? '-';

            $tesFixed[] = $row;
        }

        $data['tes'] = $tesFixed;

        foreach ($data['raport'] as &$r) {
            $range = $this->RangeMapel_model->getKeteranganByNilai($r['nilai_akhir']);
            $r['keterangan'] = $range->keterangan ?? '-';
        }



        // --- Load View ---
        $this->load->view('templates/header_dashboard');
        $this->load->view('siswa/detail', $data);
        $this->load->view('templates/footer_dashboard');
    }


    public function hitungNilaiChip($id_siswa)
    {
        $raport = $this->Raport_model->getBysiswa($id_siswa);
        $prestasi = $this->Prestasi_model->getBysiswa($id_siswa);
        $tes = $this->Tes_model->getBysiswa($id_siswa);

        $data_nilai = [];

        // Ambil semua kriteria dari database
        $kriteria_db = $this->db->get('kriteria')->result_array();

        // Map kriteria id => info lengkap
        $kriteria_map = [];
        foreach ($kriteria_db as $k) {
            $kriteria_map[$k['id_kriteria']] = $k;
        }

        // Ambil mapel per kriteria dari tabel kriteria_mapel
        $mapel_per_kriteria = $this->Kriteria_model->getMapelPerKriteria();
        // Format: [id_kriteria => ['mapel1', 'mapel2', ...]]

        // ===== Hitung nilai untuk kriteria yang terkait mapel (C1–C6) =====
        foreach ($mapel_per_kriteria as $id_kriteria => $mapel_list) {
            $filter = array_filter($raport, function ($r) use ($mapel_list) {
                return in_array($r['nama_mapel'], $mapel_list);
            });

            $nilaiArray = array_map(function ($v) {
                return isset($v['nilai_akhir']) && is_numeric($v['nilai_akhir']) ? $v['nilai_akhir'] : 0;
            }, $filter);

            $nilai = count($nilaiArray) ? array_sum($nilaiArray) / count($nilaiArray) : 0;

            $data_nilai[] = [
                'id_siswa' => $id_siswa,
                'id_kriteria' => $id_kriteria,
                'nilai' => $nilai
            ];
        }

        // ===== Hitung nilai prestasi akademik =====
        // Ambil semua kriteria tipe prestasi dari database
        $prestasi_kriteria = array_filter($kriteria_map, function ($k) {
            return strtolower($k['nama']) === 'point prestasi akademik';
        });

        foreach ($prestasi_kriteria as $id_kriteria => $k) {
            // Ambil nilai tingkat dari tabel prestasi_nilai
            $nilaiTingkat = $this->Kriteria_model->getNilaiTingkat();
            // Format: [tingkat => [juara => nilai]]

            $nilai_c = 0;
            foreach ($prestasi as $p) {
                $tingkat = $p['tingkat'];
                $juara = $p['juara'];
                if (isset($nilaiTingkat[$tingkat])) {
                    $nilai_c += $juara >= 4 ? ($nilaiTingkat[$tingkat]['>=4'] ?? 0) : ($nilaiTingkat[$tingkat][$juara] ?? 0);
                }
            }

            $data_nilai[] = [
                'id_siswa' => $id_siswa,
                'id_kriteria' => $id_kriteria,
                'nilai' => $nilai_c
            ];
        }

        // ===== Hitung nilai tes dan wawancara =====
        $tes_kriteria = array_filter($kriteria_map, function ($k) {
            return strtolower($k['nama']) === 'hasil tes dan wawancara';
        });

        foreach ($tes_kriteria as $id_kriteria => $k) {
            if (!empty($tes)) {
                $tes_data = $tes[0];
                $iq = isset($tes_data['iq']) && is_numeric($tes_data['iq']) ? $tes_data['iq'] : 0;
                $wawancara = isset($tes_data['wawancara']) && is_numeric($tes_data['wawancara']) ? $tes_data['wawancara'] : 0;
                $nilai_c = ($iq + $wawancara) / 2;

                $data_nilai[] = [
                    'id_siswa' => $id_siswa,
                    'id_kriteria' => $id_kriteria,
                    'nilai' => $nilai_c
                ];
            }
        }

        // ===== Simpan semua nilai ke tabel =====
        $this->Nilai_model->saveOrUpdateBatch($data_nilai);

        return true;
    }



public function alternatif()
{
    $dataNilai = $this->Nilai_model->getNilaiAlternatif();

    $alternatif = [];

    foreach ($dataNilai as $row) {

        $id       = $row['id_siswa'];
        $kriteria = $row['kriteria'];   // C1, C2, C3, ...
        $nilai    = $row['nilai'];

        // Simpan nama siswa sekali saja
        $alternatif[$id]['nama_siswa'] = $row['nama_siswa'];

        // Simpan nilai
        $alternatif[$id][$kriteria] = $nilai;

        // Tentukan sumber range
        if (in_array($kriteria, ['C1','C2','C3','C4','C5','C6'])) {
            $range = $this->RangeMapel_model->getKeteranganByNilai($nilai);
        } 
        else {
            $range = null;
        }

        // Simpan keterangan
        $alternatif[$id][$kriteria . '_ket'] = $range->keterangan ?? '-';
    }

    $data['alternatif'] = $alternatif;

    $this->load->view('templates/header_dashboard');
    $this->load->view('siswa/alternatif', $data);
    $this->load->view('templates/footer_dashboard');
}


    public function normalisasi()
    {
        $data['normalisasi'] = $this->Nilai_model->get_normalisasi();
        $this->load->view('templates/header_dashboard');
        $this->load->view('siswa/normalisasi', $data);
        $this->load->view('templates/footer_dashboard');
    }



    public function prosesChip($id_siswa)
    {
        // Jalankan fungsi hitung
        $this->hitungNilaiChip($id_siswa);

        // Set flash message
        $this->session->set_flashdata('success', 'Nilai chip siswa berhasil dihitung.');

        // Redirect kembali ke halaman detail
        redirect('siswa/detail/' . $id_siswa);
    }



    public function hitungPreferensisiswa($id_siswa)
    {

        $this->Preferensi_model->hitungPreferensi($id_siswa);

        // Redirect atau tampilkan pesan
        $this->session->set_flashdata('success', 'Preferensi siswa berhasil dihitung');
        redirect('siswa/detail/' . $id_siswa);
    }



    public function preferensi($id_siswa)
    {
        // Ambil hasil perhitungan preferensi
        $preferensi = $this->Nilai_model->hitung_preferensi($id_siswa);

        // Kirim ke view
        $data['preferensi'] = $preferensi;
        //find siswa name
        $data['siswa'] = $this->Siswa_model->getById($id_siswa);
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('siswa/preferensi', $data);
        $this->load->view('templates/footer_dashboard', $data);
    }
}
