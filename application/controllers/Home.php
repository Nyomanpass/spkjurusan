<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        // cek login
        if(!$this->session->userdata('id_user')){
            redirect('login');
        }
    }

    public function index(){
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('home', $data);
        $this->load->view('templates/footer_dashboard', $data);
    }

    public function profile(){  // Profile
        $data['title'] = 'Profile';
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('profile', $data);
        $this->load->view('templates/footer_dashboard', $data);
    }



}
