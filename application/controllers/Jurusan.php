<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Jurusan_model');
        $this->load->library('session');
        $this->load->helper('url');

        // cek login
        if(!$this->session->userdata('id_user')){
            redirect('login');
        }
    }

    public function index() {
        $data['jurusan'] = $this->Jurusan_model->get_all();
        $this->load->view('templates/header_dashboard'); // header_dashboard dengan sidebar
        $this->load->view('jurusan/index', $data);
        $this->load->view('templates/footer_dashboard');
    }

    public function create() {
        if ($this->input->post()) {
            $data = ['nama' => $this->input->post('nama')];
            $this->Jurusan_model->insert($data);
            redirect('jurusan');
        }
        $this->load->view('templates/header_dashboard');
        $this->load->view('jurusan/create');
        $this->load->view('templates/footer_dashboard');
    }

    public function edit($id) {
        $data['jurusan'] = $this->Jurusan_model->get_by_id($id);

        if ($this->input->post()) {
            $update = ['nama' => $this->input->post('nama')];
            $this->Jurusan_model->update($id, $update);
            redirect('jurusan');
        }

        $this->load->view('templates/header_dashboard');
        $this->load->view('jurusan/edit', $data);
        $this->load->view('templates/footer_dashboard');
    }

    public function delete($id) {
        $this->Jurusan_model->delete($id);
        redirect('jurusan');
    }
}
