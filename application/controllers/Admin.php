<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model', 'admin_mdl');
        $this->load->model('admin_log_document_model', 'aldm_mdl');
        $this->load->model('log_document_model', 'ldm_mdl');
        $this->load->model('admin_outside_document_model', 'outside_mdl');
    }

    public function index()
    {

        $this->load->view('admin/admin1');
    }

    public function load_offices()
    {
        echo json_encode($this->admin_mdl->load_offices());
    }
    public function sample_program_output()
    {
        if (!isset($this->session->logged_in)) {
            redirect(base_url());
        }
        $this->load->view('admin/admin1');
    }

    public function log_documents()
    {
        if (!isset($this->session->logged_in)) {
            redirect(base_url());
        }
        $this->load->view('admin/log_documents');
    }

    public function outside_log_documents()
    {
        if (!isset($this->session->logged_in)) {
            redirect(base_url());
        }
        $this->load->view('admin/outside_log_documents');
    }

    public function admin1()
    {
        if (!isset($this->session->logged_in)) {
            redirect(base_url());
        }
        $this->load->view('admin');
    }


    function archive()
    {
        if (!isset($this->session->logged_in)) {
            redirect(base_url());
        }
        $this->load->view('admin/archiving');
    }
    function trace_document($code)
    {
        if (!isset($this->session->logged_in)) {
            redirect(base_url());
        }
        $data['doc_info'] = $this->ldm_mdl->getDocument($code);
        $this->load->view('admin/trace_document', $data);
    }

    public function load_trace($code)
    {
        echo json_encode($this->ldm_mdl->load_trace($code));
    }

    function load_log_document()
    {
        $fetch_data = $this->aldm_mdl->make_datatables();
        $data = array();

        foreach ($fetch_data as $row) {
            $doc_type = '';
            $phpdate = strtotime($row->date);
            $mysqldate = date('m-d-Y', $phpdate);
            ($row->regular_procedures == '') ? $doc_type = 'Other Document' : $doc_type = $row->regular_procedures;
            $sub_array = array();
            $sub_array[] = $row->document_id;
            $sub_array[] = $row->document;
            $sub_array[] = $row->office;
            $sub_array[] = $mysqldate;
            $sub_array[] = $doc_type;
            $sub_array[] = '
                <a href="' . base_url('admin/trace_document/' . $row->referral_code) . '" class="btn btn-primary btn-sm"> <i class="fa fa-search"></i></a>
            ';
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                  =>     intval($_POST["draw"]),
            "recordsTotal"          =>     $this->aldm_mdl->get_all_data(),
            "recordsFiltered"       =>     $this->aldm_mdl->get_filtered_data(),
            "data"                  =>     $data
        );
        echo json_encode($output);
    }

    function load_outside_document()
    {
        $fetch_data = $this->outside_mdl->make_datatables();
        $data = array();

        foreach ($fetch_data as $row) {
            $status = '';
            if ($row->status == 0) {
                $status = 'IN';
            } else {
                $status = 'OUT';
            }
            $doc_type = '';
            $sub_array = array();
            $sub_array[] = $row->id;
            $sub_array[] = $row->document;
            $sub_array[] = $row->outside_person;
            $sub_array[] = $status;
            $sub_array[] = $row->date;

            $data[] = $sub_array;
        }
        $output = array(
            "draw"                  =>     intval($_POST["draw"]),
            "recordsTotal"          =>     $this->outside_mdl->get_all_data(),
            "recordsFiltered"       =>     $this->outside_mdl->get_filtered_data(),
            "data"                  =>     $data
        );
        echo json_encode($output);
    }



    public function change_pass()
    {
        if (!isset($this->session->logged_in)) {
            redirect(base_url());
        }
        $this->load->view('change_pass');
    }

    public function change_password()
    {
        if ($this->input->post('password') == $this->input->post('confirm_password')) {
            $data = array(
                'password' => password_hash($this->input->post("password"), PASSWORD_DEFAULT)
            );
            $res = $this->admin_mdl->change_password($data, $this->input->post('id'));
            if ($res) {
                $this->load->view('success_change_pass');
            } else {
                redirect(base_url('error_change_pass'));
            }
        } else {
            redirect(base_url('error_change_pass'));
        }
    }

    function fetch_user()
    {
        $fetch_data = $this->admin_mdl->make_datatables();
        $data = array();
        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $row->id;
            $sub_array[] = $row->firstname;
            $sub_array[] = $row->lastname;
            $sub_array[] = $row->email;
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                  =>     intval($_POST["draw"]),
            "recordsTotal"          =>     $this->admin_mdl->get_all_data(),
            "recordsFiltered"       =>     $this->admin_mdl->get_filtered_data(),
            "data"                  =>     $data
        );
        echo json_encode($output);
    }
}
