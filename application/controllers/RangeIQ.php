<?php
class RangeIQ extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RangeIQ_model');
    }

    public function index() {
        $data['iq'] = $this->RangeIQ_model->get_all();
        $this->load->view('range_iq/index', $data);
    }

    public function add() {
        if ($_POST) {
            $this->RangeIQ_model->insert($_POST);
             redirect('setting');
        }
        $this->load->view('range_iq/add');
    }

    public function edit($id) {
        if ($_POST) {
            $this->RangeIQ_model->update($id, $_POST);
             redirect('setting');
        }

        $data['iq'] = $this->db->get_where('range_iq', ['id_range_iq' => $id])->row();
        $this->load->view('range_iq/edit', $data);
    }

    public function delete($id) {
        $this->RangeIQ_model->delete($id);
         redirect('setting');
    }
}
