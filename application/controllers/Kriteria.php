<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kriteria_model');
        $this->load->library('session');
        $this->load->helper('url');

        // cek login
        if(!$this->session->userdata('id_user')){
            redirect('login');
        }
    }

    public function index() {
        $data['kriteria'] = $this->Kriteria_model->get_all();
        $this->load->view('templates/header_dashboard');
        $this->load->view('kriteria/index', $data);
        $this->load->view('templates/footer_dashboard');
    }

    public function tambah() {
        if ($this->input->post()) {
            $data = [
                'kode'  => $this->input->post('kode'),
                'nama'  => $this->input->post('nama'),
                'sifat' => $this->input->post('sifat')
            ];
            $this->Kriteria_model->insert($data);
            redirect('kriteria');
        }
        $this->load->view('templates/header_dashboard');
        $this->load->view('kriteria/tambah');
        $this->load->view('templates/footer_dashboard');
    }

    public function edit($id) {
        $data['kriteria'] = $this->Kriteria_model->get_by_id($id);

        if ($this->input->post()) {
            $update = [
                'kode'  => $this->input->post('kode'),
                'nama'  => $this->input->post('nama'),
                'sifat' => $this->input->post('sifat')
            ];
            $this->Kriteria_model->update($id, $update);
            redirect('kriteria');
        }

        $this->load->view('templates/header_dashboard');
        $this->load->view('kriteria/edit', $data);
        $this->load->view('templates/footer_dashboard');
    }

    public function delete($id) {
        $this->Kriteria_model->delete($id);
        redirect('kriteria');
    }
}
