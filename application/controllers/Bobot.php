<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bobot extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bobot_model');
        $this->load->model('Jurusan_model');
        $this->load->model('Kriteria_model');
    }

    public function index()
    {
        $data['bobot_list'] = $this->Bobot_model->getAll(); // ganti nama biar jelas
        $data['jurusan'] = $this->Jurusan_model->get_all();
        $data['kriteria'] = $this->Kriteria_model->get_all();
        $this->load->view('templates/header_dashboard');
        $this->load->view('bobot/index', $data);
        $this->load->view('templates/footer_dashboard');
    }

    public function create()
    {
        if ($this->input->post()) {
            $data = [
                'id_jurusan' => $this->input->post('id_jurusan'),
                'id_kriteria' => $this->input->post('id_kriteria'),
                'bobot' => $this->input->post('bobot')
            ];
            $this->Bobot_model->insert($data);
            redirect('bobot');
        }
        $data['jurusan'] = $this->Jurusan_model->get_all();
        $data['kriteria'] = $this->Kriteria_model->get_all();
        $this->load->view('templates/header_dashboard');
        $this->load->view('bobot/create', $data);
        $this->load->view('templates/footer_dashboard');
    }

    public function edit($id)
    {
        if ($this->input->post()) {
            $data = [
                'id_jurusan' => $this->input->post('id_jurusan'),
                'id_kriteria' => $this->input->post('id_kriteria'),
                'bobot' => $this->input->post('bobot')
            ];
            $this->Bobot_model->update($id, $data);
            redirect('bobot');
        }
        $data['bobot'] = $this->Bobot_model->get_by_id($id);
        $data['jurusan'] = $this->Jurusan_model->get_all();
        $data['kriteria'] = $this->Kriteria_model->get_all();
        $this->load->view('templates/header_dashboard');
        $this->load->view('bobot/edit', $data);
        $this->load->view('templates/footer_dashboard');
    }

    public function delete($id)
    {
        $this->Bobot_model->delete($id);
        redirect('bobot');
    }
}
