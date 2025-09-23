<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MataPelajaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MataPelajaran_model');
    }

    // ✅ List semua data
    public function index()
    {
        $data['mapel'] = $this->MataPelajaran_model->get_all();

        $this->load->view('templates/header_dashboard');
        $this->load->view('matapelajaran/index', $data);
        $this->load->view('templates/footer_dashboard');
    }

    // ✅ Tambah data
    public function create()
    {
        if ($this->input->post()) {
            $data = [
                'nama_mapel' => $this->input->post('nama_mapel')
            ];
            $this->MataPelajaran_model->insert($data);
            redirect('mataPelajaran');
        }

        $this->load->view('templates/header_dashboard');
        $this->load->view('matapelajaran/create');
        $this->load->view('templates/footer_dashboard');
    }

    // ✅ Edit data
    public function edit($id)
    {
        if ($this->input->post()) {
            $data = [
                'nama_mapel' => $this->input->post('nama_mapel')
            ];
            $this->MataPelajaran_model->update($id, $data);
            redirect('mataPelajaran');
        }

        $data['mapel'] = $this->MataPelajaran_model->getById($id);

        $this->load->view('templates/header_dashboard');
        $this->load->view('matapelajaran/edit', $data);
        $this->load->view('templates/footer_dashboard');
    }

    // ✅ Hapus data
    public function delete($id)
    {
        $this->MataPelajaran_model->delete($id);
        redirect('mataPelajaran');
    }
}
