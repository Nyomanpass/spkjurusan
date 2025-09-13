<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        $this->load->model('Mahasiswa_model');
        $this->load->model('Jurusan_model');
        $this->load->model('Kriteria_model');
        $this->load->model('Bobot_model');

        // cek login
        if (!$this->session->userdata('id_user')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';

        // Statistik Utama
        $data['total_mahasiswa'] = $this->Mahasiswa_model->count_all();
        $data['total_jurusan'] = $this->Jurusan_model->count_all();
        $data['total_kriteria'] = $this->Kriteria_model->count_all();
        $data['total_bobot'] = $this->Bobot_model->count_all();

        // Data untuk grafik atau informasi tambahan
        $data['jurusan_list'] = $this->Jurusan_model->get_all();
        $data['kriteria_list'] = $this->Kriteria_model->get_all();

        // Statistik tambahan
        $data['user_info'] = $this->session->userdata();

        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('home', $data);
        $this->load->view('templates/footer_dashboard', $data);
    }

    public function profile()
    {  // Profile
        $data['title'] = 'Profile';
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('profile', $data);
        $this->load->view('templates/footer_dashboard', $data);
    }
}
