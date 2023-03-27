<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Document extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Office_document_model', 'odm_mdl');
        $this->load->model('log_document_model', 'ldm_mdl');
        $this->load->model('outside_document_model', 'outside_mdl');
        $this->load->model('Notification_model', 'notif_mdl');
        $this->load->model('Load_files_over_3days_model', 'lfo_mdl');
    }

    public function create_view()
    {
        if (!isset($this->session->logged_in)) {
            redirect(base_url());
        }
        $this->load->view('work_place/document_create');
    }

    public function log_documents_view()
    {
        $data['query'] = $this->notif_mdl->n_notif();
        if (!isset($this->session->logged_in)) {
            redirect(base_url());
        }
        $this->load->view('work_place/log_documents', $data);
    }

    public function trace_document($code)
    {
        if (!isset($this->session->logged_in)) {
            redirect(base_url());
        }
        $data['doc_info'] = $this->ldm_mdl->getDocument($code);
        $this->load->view('work_place/trace_document', $data);
    }

    public function load_trace($code)
    {
        echo json_encode($this->ldm_mdl->load_trace($code));
    }

    function remaining_steps()
    {
        $offices = $this->input->post('offices');
        $procedure_type = $this->input->post('procedure_type');
        echo json_encode($this->ldm_mdl->remaining_steps($offices, $procedure_type));
    }

    public function get_steps($doctype)
    {
        echo json_encode($this->ldm_mdl->get_steps($doctype));
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
            $sub_array[] = '
                <button id="' . $row->id . '" class="btn btn-danger btn-sm btnCancelModal"><i class="fa fa-times"></i></button>
            ';
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

    function load_office_document()
    {
        $fetch_data = $this->odm_mdl->make_datatables();
        $data = array();

        foreach ($fetch_data as $row) {
            $doc_type = '';
            $phpdate = strtotime($row->date);
            $mysqldate = date('m-d-Y', $phpdate);
            ($row->regular_procedures == '') ? $doc_type = 'Other Document' : $doc_type = $row->regular_procedures;
            $sub_array = array();
            $sub_array[] = $row->document_id;
            $sub_array[] = $row->document;
            $sub_array[] = $row->referral_code;
            $sub_array[] = $mysqldate;
            $sub_array[] = $doc_type;
            $sub_array[] = '
                <a href="' . base_url('document/trace_document/' . $row->referral_code) . '" class="btn btn-primary btn-sm"> <i class="fa fa-search"></i></a>
                <button id="' . $row->document_id . '" class="btn btn-danger btn-sm btnCancelModal"><i class="fa fa-times"></i></button>
               <button  type="button"><i class="fa fa-check"></i></button>
                
            ';

            $data[] = $sub_array;
        }
        $output = array(
            "draw"                  =>     intval($_POST["draw"]),
            "recordsTotal"          =>     $this->odm_mdl->get_all_data(),
            "recordsFiltered"       =>     $this->odm_mdl->get_filtered_data(),
            "data"                  =>     $data
        );
        echo json_encode($output);
    }


    function load_log_document()
    {
        $fetch_data = $this->ldm_mdl->make_datatables();
        $data = array();

        foreach ($fetch_data as $row) {
            $doc_type = '';
            ($row->regular_procedures == '') ? $doc_type = 'Other Document' : $doc_type = $row->regular_procedures;
            $sub_array = array();
            $sub_array[] = $row->trace_id;
            $sub_array[] = $row->document;
            $sub_array[] = $row->date;
            $sub_array[] = $row->office;
            $sub_array[] = $doc_type;
            $sub_array[] = $row->note;
            $sub_array[] = "
            <button id='" . $row->trace_id . "' class='btn btn-success btn-sm btnDoneModal'> <i class='fa fa-check'></i></button>
            <button id='" . $row->trace_id . "' class='btn btn-warning btn-sm btnNoteModal'>  <i class='fa fa-book'></i> </button>
            <button id='" . $row->referral_code . "' class='btn btn-primary btn-sm btnPreviousModal'>  <i class='fa fa-search'></i> </button>";
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                  =>     intval($_POST["draw"]),
            "recordsTotal"          =>     $this->ldm_mdl->get_all_data(),
            "recordsFiltered"       =>     $this->ldm_mdl->get_filtered_data(),
            "data"                  =>     $data
        );
        echo json_encode($output);
    }

    //load files over 3 days controller
    function load_files_over_3days_document()
    {
        $fetch_data = $this->lfo_mdl->make_datatables();
        $data = array();

        foreach ($fetch_data as $row) {
            $doc_type = '';
            ($row->regular_procedures == '') ? $doc_type = 'Other Document' : $doc_type = $row->regular_procedures;
            $sub_array = array();
            $sub_array[] = $row->trace_id;
            $sub_array[] = $row->document;
            $sub_array[] = $row->date;
            $sub_array[] = $row->office;
            $sub_array[] = $doc_type;
            $sub_array[] = $row->note;
            $sub_array[] = "
            <button id='" . $row->trace_id . "' class='btn btn-success btn-sm btnDoneModal'> <i class='fa fa-check'></i></button>
            <button id='" . $row->referral_code . "' class='btn btn-primary btn-sm btnPreviousModal'>  <i class='fa fa-search'></i> </button>";
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                  =>     intval($_POST["draw"]),
            "recordsTotal"          =>     $this->ldm_mdl->get_all_data(),
            "recordsFiltered"       =>     $this->ldm_mdl->get_filtered_data(),
            "data"                  =>     $data
        );
        echo json_encode($output);
    }
    // end of load files over 3 days controller

    public function load_document_type()
    {
        $res = $this->odm_mdl->load_document_type();
        echo json_encode($res);
    }

    public function save_document()
    {
        $permitted_chars = 'ABCDEFGHIJKLMNOP';
        // Output: 54esmdr0qf
        $referral_code = 'DTS_';

        $referral_code .= substr(str_shuffle($permitted_chars), 0, 6);
        $data = array(
            "document"        => $this->input->post('document'),
            "referral_code"   => $referral_code,
            "office_id"       => $this->session->office_id,
            "document_type"   => $this->input->post('document_type'),
            "user_id" => $this->session->user_id,
            'date' => date('Y-m-d H:i:s')
        );

        $res = $this->odm_mdl->save_document($data);
        if ($res) {
            $data['referral_code'] = $referral_code;
            $this->load->view('work_place/document_success', $data);
        }
    }

    public function saveOutsideDocument()
    {
        $data = array(
            "document" => $this->input->post('document'),
            "office_id" => $this->session->office_id,
            "status" => $this->input->post('status'),
            "outside_person" => $this->input->post('person'),
            "date" => $this->input->post('date')
        );

        $res = $this->ldm_mdl->save_outside_document($data);
        if ($res) {
            $this->load->view('work_place/outside_document_success', $data);
        }
    }

    public function recieve_document()
    {
        $data = array(
            "document_id" => $this->input->post('document_id'),
            "office_id" => $this->session->office_id,
            "user_id" => $this->session->user_id
        );

        $data2 = array(
            "action" => '1'
        );

        $res = $this->ldm_mdl->receive_document($data);
        if ($res) {
            $res2 = $this->ldm_mdl->update_action($data2, $this->input->post('last_id'));
            if ($res2) {
                $this->load->view('work_place/note_success', $data);
            }
        }
    }

    public function doneDocument()
    {
        $data2 = array(
            "action" => '2'
        );
        $res2 = $this->ldm_mdl->update_done($data2, $this->input->post('trace_id'));
        if ($res2) {
            $this->load->view('work_place/done_success');
        }
    }

    public function noteDocument()
    {
        $data2 = array(
            "note" => $this->input->post('note')
        );
        $res2 = $this->ldm_mdl->update_note($data2, $this->input->post('trance_id'));
        if ($res2) {
            $this->load->view('work_place/done_success');
        }
    }

    public function cancelDocument()
    {
        $data2 = array(
            "status" => 'cancel'
        );
        $res2 = $this->ldm_mdl->cancel_document($data2, $this->input->post('document_id'));
        if ($res2) {
            $this->load->view('work_place/cancel_success');
        }
    }

    public function search_referral_code()
    {
        $referral_code = $this->input->post('referral_code');
        $res = $this->ldm_mdl->getDocument($referral_code);
        echo json_encode($res);
    }

    public function get_last_id($document_id)
    {
        echo json_encode($this->ldm_mdl->get_last_id($document_id));
    }

    public function get_info_trace($trace_id)
    {
        echo json_encode($this->ldm_mdl->get_trace_info($trace_id));
    }
}
