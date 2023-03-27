<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Work_place extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('work_place_model', 'work_mdl');
    }
    public function load_view()
    {
        if (!isset($this->session->logged_in)) {
            redirect(base_url());
        }

        $this->load->view('work_place');
    }

    public function get_recent()
    {
        if (!isset($this->session->logged_in)) {
            redirect(base_url());
        }
        echo json_encode($this->work_mdl->get_recent());
    }
}
