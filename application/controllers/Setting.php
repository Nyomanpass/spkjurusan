<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kriteria_model');
        $this->load->model('Prestasi_model');
        $this->load->model('MataPelajaran_model');
        $this->load->model('KriteriaMapel_model');
        $this->load->model('RangeMapel_model');
        $this->load->model('RangeIQ_model');
        $this->load->model('RangeWawancara_model');
    }


     public function index()
    {
        $kriteria_data = $this->Kriteria_model->get_all();
        $kriteria = [];

        foreach ($kriteria_data as $row) {
            $kriteria[$row['id_kriteria']] = [
                'kode' => $row['kode'],
                'nama' => $row['nama'] // sesuaikan dengan field di db
            ];
        }

        $data['prestasi_nilai'] = $this->Prestasi_model->getAllNilai();
        $data['kriteria_mapel'] = $this->KriteriaMapel_model->getGrouped();
        $data['kriteria'] = $this->Kriteria_model->get_all();
        $data['mapel'] = $this->MataPelajaran_model->get_all();
        $data['range'] = $this->RangeMapel_model->get_all();
        $data['iq'] = $this->RangeIQ_model->get_all();
        $data['wawancara'] = $this->RangeWawancara_model->get_all();
        $this->load->view('templates/header_dashboard');
        $this->load->view('setting/index', $data);
        $this->load->view('templates/footer_dashboard');
    }

    // Update mapel per kriteria
    public function updateMapel()
    {
        if($this->input->post()){
            $id_kriteria = $this->input->post('id_kriteria');
            $mapel = $this->input->post('mapel'); // array nama mapel

            $this->Kriteria_model->updateMapel($id_kriteria, $mapel);
            redirect('setting');
        }
    }


    public function update_prestasi()
        {
            $data = $this->input->post('nilai');
            $this->Prestasi_model->updateNilai($data);
            redirect('setting'); // balik ke halaman setting
        }


}
