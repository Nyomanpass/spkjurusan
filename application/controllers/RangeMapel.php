<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class RangeMapel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RangeMapel_model');
    }

    public function index() {
        $data['range'] = $this->RangeMapel_model->get_all();
        $this->load->view('range_mapel/index', $data);
    }

    public function add() {
        if ($_POST) {
            $this->RangeMapel_model->insert($_POST);
            redirect('setting');
        }
        $this->load->view('range_mapel/add');
    }

    public function edit($id) {
        if ($_POST) {
            $this->RangeMapel_model->update($id, $_POST);
            redirect('setting');
        }
        $data['range'] = $this->RangeMapel_model->get($id);
        $this->load->view('range_mapel/edit', $data);
    }

    public function delete($id) {
        $this->RangeMapel_model->delete($id);
         redirect('setting');
    }
}
