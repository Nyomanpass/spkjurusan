<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KriteriaMapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KriteriaMapel_model');
        $this->load->model('Kriteria_model');
        $this->load->model('MataPelajaran_model');
    }

    public function index()
    {
        $data['kriteria_mapel'] = $this->KriteriaMapel_model->getGrouped();
        $data['kriteria'] = $this->Kriteria_model->get_all();
        $data['mapel'] = $this->MataPelajaran_model->get_all();

        $this->load->view('templates/header_dashboard');
        $this->load->view('kriteria_mapel/index', $data);
        $this->load->view('templates/footer_dashboard');
    }



    public function create()
    {   
        $data['mapel'] = $this->MataPelajaran_model->get_all();
        $data['kriteria'] = $this->Kriteria_model->get_all();
        $this->load->view('templates/header_dashboard');
        $this->load->view('kriteria_mapel/create', $data);
        $this->load->view('templates/footer_dashboard');
    }

    public function store()
    {
        $data = $this->input->post();
        $this->KriteriaMapel_model->insert($data);
        redirect('setting');
    }

    public function edit($id)
    {
        if ($this->input->post()) {
            $data = [
                'id_kriteria' => $this->input->post('id_kriteria'),
                'id_mapel'    => $this->input->post('id_mapel')
            ];

            $this->KriteriaMapel_model->update($id, $data);
            redirect('kriteriaMapel');
        }

        // ambil data untuk form edit
        $data['kriteria_mapel'] = $this->KriteriaMapel_model->get_by_id($id);
        $data['kriteria'] = $this->Kriteria_model->get_all();
        $data['mapel']    = $this->MataPelajaran_model->get_all();

        $this->load->view('templates/header_dashboard');
        $this->load->view('kriteria_mapel/edit', $data);
        $this->load->view('templates/footer_dashboard');
    }





    public function delete($id)
    {
        $this->KriteriaMapel_model->delete($id);
        redirect('setting');
    }
}
