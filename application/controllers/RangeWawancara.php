<?php
class RangeWawancara extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RangeWawancara_model');
    }

    public function index() {
        $data['wawancara'] = $this->RangeWawancara_model->get_all();
        $this->load->view('range_wawancara/index', $data);
    }

    public function add() {
        if ($_POST) {
            $this->RangeWawancara_model->insert($_POST);
            redirect('setting');
        }
        $this->load->view('range_wawancara/add');
    }

    public function edit($id) {
        if ($_POST) {
            $this->RangeWawancara_model->update($id, $_POST);
            redirect('setting');
        }

        $data['wawancara'] = $this->db->get_where('range_wawancara', ['id_range_wawancara' => $id])->row();
        $this->load->view('range_wawancara/edit', $data);
    }

    public function delete($id) {
        $this->RangeWawancara_model->delete($id);
        redirect('setting');
    }
}
