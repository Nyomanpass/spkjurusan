<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper(array('url','form'));
    }

    // Halaman login
    public function index(){
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('login', $data);
        $this->load->view('templates/footer', $data);
    }

    // Proses login
    public function auth(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->get_user($username);

        if($user && password_verify($password, $user['password'])){
            $this->session->set_userdata('id_user', $user['id_user']);
            $this->session->set_userdata('username', $user['username']);
            $this->session->set_userdata('level', $user['level']);
            redirect('home');
        } else {
            $this->session->set_flashdata('error', 'Username atau Password salah!');
            redirect('login');
        }
    }

    // Halaman register
    public function register(){
        $data['title'] = 'register';
        $this->load->view('templates/header', $data);
        $this->load->view('register', $data);
        $this->load->view('templates/footer', $data);
    }

    // Proses register
    public function proses_register(){
        $data = [
            'id_user' => uniqid(),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'no_telepon' => $this->input->post('no_telepon'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'level' => $this->input->post('level')
        ];

        $this->User_model->register($data);
        $this->session->set_flashdata('success', 'Register berhasil, silahkan login!');
        redirect('login');
    }

    // Logout
    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}
