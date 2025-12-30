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
                'kode'       => $this->input->post('kode'),
                'nama'       => $this->input->post('nama'),
                'sifat'      => $this->input->post('sifat'),
                'type_range' => $this->input->post('type_range') 
            ];

            $this->Kriteria_model->insert($data);
            
            $this->session->set_flashdata('pesan', 'Kriteria berhasil ditambahkan!');
            
            redirect('kriteria');
        }

        $this->load->view('templates/header_dashboard');
        $this->load->view('kriteria/tambah');
        $this->load->view('templates/footer_dashboard');
    }


    public function edit($id) {
        if ($this->input->post()) {
            $update = [
                'kode'       => $this->input->post('kode'),
                'nama'       => $this->input->post('nama'),
                'sifat'      => $this->input->post('sifat'),
                'type_range' => $this->input->post('type_range') // Tambahkan baris ini
            ];
            
            $this->Kriteria_model->update($id, $update);
            $this->session->set_flashdata('pesan', 'Kriteria berhasil diupdate!');
            redirect('kriteria');
        }

        // Ambil data kriteria berdasarkan ID untuk ditampilkan di form edit
        $data['kriteria'] = $this->Kriteria_model->getById($id); 

        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('kriteria/edit', $data); // Kirim data kriteria ke view
        $this->load->view('templates/footer_dashboard');
    }

    public function delete($id) {
        $this->Kriteria_model->delete($id);
        redirect('kriteria');
    }
}
