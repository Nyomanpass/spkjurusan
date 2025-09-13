<?php
class Mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Raport_model');
        $this->load->model('Prestasi_model');
        $this->load->model('Tes_model');
        $this->load->model('MataPelajaran_model');
        $this->load->model('Nilai_model');
        $this->load->model('Preferensi_model');

        $this->load->library('session');
        $this->load->helper(['url', 'form']);

        // cek login
        if (!$this->session->userdata('id_user')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = "Data Mahasiswa";
        $data['mahasiswa'] = $this->Mahasiswa_model->get_all();
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer_dashboard');
    }

    public function create()
    {
        $data['title'] = "Tambah Mahasiswa";
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('mahasiswa/create');
        $this->load->view('templates/footer_dashboard');
    }

    public function store()
    {
        $data = $this->input->post();
        $this->Mahasiswa_model->insert($data);
        redirect('mahasiswa');
    }

    public function edit($id)
    {
        $data['title'] = "Edit Mahasiswa";
        $data['mahasiswa'] = $this->Mahasiswa_model->getById($id);
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('mahasiswa/edit', $data);
        $this->load->view('templates/footer_dashboard');
    }

    public function update($id)
    {
        $data = $this->input->post();
        $this->Mahasiswa_model->update($id, $data);
        redirect('mahasiswa');
    }

    public function delete($id)
    {
        $this->Mahasiswa_model->delete($id);
        redirect('mahasiswa');
    }


    public function detail($id, $type = null, $item_id = null)
    {
        // --- DATA UTAMA ---
        $data['mahasiswa']      = $this->Mahasiswa_model->getById($id);
        $data['raport']         = $this->Raport_model->getByMahasiswa($id);
        $data['prestasi']       = $this->Prestasi_model->getByMahasiswa($id);
        $data['tes']            = $this->Tes_model->getByMahasiswa($id);
        $data['mata_pelajaran'] = $this->MataPelajaran_model->get_all();

        // --- Default null ---
        $data['edit_prestasi'] = null;
        $data['edit_tes']      = null;
        $data['id_mahasiswa']  = $id;

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
                    'id_mahasiswa' => $id,
                    'mapel_id'     => $mapel_id,
                    'pengetahuan'  => $pengetahuan,
                    'keterampilan' => $keterampilan,
                    'nilai_akhir'  => $nilaiAkhir
                ];

                $existing = $this->Raport_model->getByMahasiswaMapel($id, $mapel_id);
                if (!empty($existing)) {
                    $this->Raport_model->update($existing['id_raport'], $dataRaport);
                } else {
                    $this->Raport_model->insert($dataRaport);
                }
            }

            $this->session->set_flashdata('success', 'Data raport berhasil disimpan/diupdate!');
            redirect('mahasiswa/detail/' . $id);
        }

        // ---------- SIMPAN / UPDATE PRESTASI ----------
        if ($this->input->post('submit_prestasi')) {
            $post = $this->input->post();

            $dataPrestasi = [
                'id_mahasiswa'   => $id,
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

            redirect('mahasiswa/detail/' . $id);
        }

        // ---------- SIMPAN / UPDATE TES ----------
        if ($this->input->post('submit_tes')) {
            $post = $this->input->post();

            $dataTes = [
                'id_mahasiswa' => $id,
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

            redirect('mahasiswa/detail/' . $id);
        }

        // --- Load View ---
        $this->load->view('templates/header_dashboard');
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('templates/footer_dashboard');
    }





    public function hitungNilaiChip($id_mahasiswa)
    {
        $raport = $this->Raport_model->getByMahasiswa($id_mahasiswa);
        $prestasi = $this->Prestasi_model->getByMahasiswa($id_mahasiswa);
        $tes = $this->Tes_model->getByMahasiswa($id_mahasiswa);

        $data_nilai = [];

        // Ambil kriteria dari database
        $kriteria_db = $this->db->get('kriteria')->result_array();

        // Map kriteria kode => id
        $kriteria_map = [];
        foreach ($kriteria_db as $k) {
            $kriteria_map[$k['kode']] = $k['id_kriteria'];
        }

        // Mapel per kode kriteria
        $mapel_per_kode = [
            'C1' => [
                'Pendidikan Agama',
                'PPkn',
                'Bahasa Indonesia',
                'Bahasa Inggris',
                'Matematika',
                'Sejarah',
                'PJOK',
                'Kimia',
                'Seni Budaya'
            ],
            'C2' => [
                'Matematika',
                'Ekonomi',
                'Bahasa Indonesia',
                'Bahasa Inggris',
                'TIK (informatika)',
                'Kewirausahaan'
            ],
            'C3' => [
                'PPkn',
                'Bahasa Indonesia',
                'Bahasa Inggris',
                'Matematika',
                'Ekonomi',
                'TIK (informatika)'
            ],
            'C4' => [
                'Seni Budaya',
                'Bahasa Indonesia',
                'Bahasa Inggris',
                'Matematika',
                'Fisika',
                'TIK (informatika)'
            ],
        ];

        // Hitung C1 – C6
        foreach ($mapel_per_kode as $kode => $mapel_list) {
            if (!isset($kriteria_map[$kode])) continue; // skip jika id kriteria tidak ada
            $id_kriteria = $kriteria_map[$kode];

            $filter = array_filter($raport, function ($r) use ($mapel_list) {
                return in_array($r['nama_mapel'], $mapel_list);
            });

            $nilaiArray = array_map(function ($v) {
                return isset($v['nilai_akhir']) && is_numeric($v['nilai_akhir']) ? $v['nilai_akhir'] : 0;
            }, $filter);

            $nilai = count($nilaiArray) ? array_sum($nilaiArray) / count($nilaiArray) : 0; // tidak dibulatkan

            // echo "<pre>";
            // print_r($nilaiArray);
            // echo "</pre>";


            $data_nilai[] = ['id_mahasiswa' => $id_mahasiswa, 'id_kriteria' => $id_kriteria, 'nilai' => $nilai];
        }

        // C7 Prestasi Akademik
        if (isset($kriteria_map['C7'])) {
            $id_kriteria_c7 = $kriteria_map['C7'];
            $nilaiTingkat = [
                'Internasional' => [1 => 16, 2 => 15, 3 => 14, '>=4' => 13],
                'Nasional'      => [1 => 12, 2 => 11, 3 => 10, '>=4' => 9],
                'Provinsi'      => [1 => 8, 2 => 7, 3 => 6, '>=4' => 5],
                'Kabupaten'     => [1 => 4, 2 => 3, 3 => 2, '>=4' => 1],
            ];

            // echo "<pre>";
            // print_r($prestasi);
            // echo "</pre>";

            $nilai_c7 = 0;
            foreach ($prestasi as $p) {
                $tingkat = $p['tingkat'];
                $juara = $p['juara'];
                if (isset($nilaiTingkat[$tingkat])) {
                    $nilai_c7 += $juara >= 4 ? $nilaiTingkat[$tingkat]['>=4'] : ($nilaiTingkat[$tingkat][$juara] ?? 0);
                }
            }

            // echo "<pre>";
            // print_r($nilai_c7);
            // echo "</pre>";

            $data_nilai[] = ['id_mahasiswa' => $id_mahasiswa, 'id_kriteria' => $id_kriteria_c7, 'nilai' => $nilai_c7];
        }


        if (isset($kriteria_map['C8']) && !empty($tes)) {
            $id_kriteria_c8 = $kriteria_map['C8'];

            // Ambil row pertama dari result_array()
            $tes_data = $tes[0];
            // echo "<pre>";
            // print_r($tes_data);
            // echo "</pre>";

            $iq = isset($tes_data['iq']) && is_numeric($tes_data['iq']) ? $tes_data['iq'] : 0;
            $wawancara = isset($tes_data['wawancara']) && is_numeric($tes_data['wawancara']) ? $tes_data['wawancara'] : 0;

            // Ambil rata-rata
            $nilai_c8 = ($iq + $wawancara) / 2;
            // echo "<pre>";
            // print_r($nilai_c8);
            // echo "</pre>";
            $data_nilai[] = ['id_mahasiswa' => $id_mahasiswa, 'id_kriteria' => $id_kriteria_c8, 'nilai' => $nilai_c8];
        }


        // Simpan batch ke tabel nilai
        $this->Nilai_model->insert_batch($data_nilai);

        return true;
    }


    public function alternatif()
    {
        $dataNilai = $this->Nilai_model->getNilaiAlternatif();

        // Ubah ke format [id_mahasiswa][kode_kriteria] = nilai
        $alternatif = [];
        foreach ($dataNilai as $row) {
            // simpan nama_siswa
            $alternatif[$row['id_mahasiswa']]['nama_siswa'] = $row['nama_siswa'];
            $alternatif[$row['id_mahasiswa']][$row['kriteria']] = $row['nilai'];
        }

        $data['alternatif'] = $alternatif;
        $this->load->view('templates/header_dashboard');
        $this->load->view('mahasiswa/alternatif', $data);
        $this->load->view('templates/footer_dashboard');
    }

    public function normalisasi()
    {
        $data['normalisasi'] = $this->Nilai_model->get_normalisasi();
        $this->load->view('templates/header_dashboard');
        $this->load->view('mahasiswa/normalisasi', $data);
        $this->load->view('templates/footer_dashboard');
    }



    public function prosesChip($id_mahasiswa)
    {
        // Jalankan fungsi hitung
        $this->hitungNilaiChip($id_mahasiswa);

        // Set flash message
        $this->session->set_flashdata('success', 'Nilai chip mahasiswa berhasil dihitung.');

        // Redirect kembali ke halaman detail
        redirect('mahasiswa/detail/' . $id_mahasiswa);
    }



    public function hitungPreferensiMahasiswa($id_mahasiswa)
    {

        $this->Preferensi_model->hitungPreferensi($id_mahasiswa);

        // Redirect atau tampilkan pesan
        $this->session->set_flashdata('success', 'Preferensi mahasiswa berhasil dihitung');
        redirect('mahasiswa/detail/' . $id_mahasiswa);
    }


    public function rekomendasi($id_mahasiswa)
    {

        $data['ranking'] = $this->Preferensi_model->getPreferensiMahasiswa($id_mahasiswa);
        $data['mahasiswa'] = $this->Mahasiswa_model->getById($id_mahasiswa);
        $data['rekomendasi'] = $this->Preferensi_model->getRekomendasiJurusan($id_mahasiswa);

        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('mahasiswa/rekomendasi', $data);
        $this->load->view('templates/footer_dashboard', $data);
    }

    public function preferensi($id_mahasiswa)
    {
        // Ambil hasil perhitungan preferensi
        $preferensi = $this->Nilai_model->hitung_preferensi($id_mahasiswa);

        // Kirim ke view
        $data['preferensi'] = $preferensi;
        //find mahasiswa name
        $data['mahasiswa'] = $this->Mahasiswa_model->getById($id_mahasiswa);
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('mahasiswa/preferensi', $data);
        $this->load->view('templates/footer_dashboard', $data);
    }
}
