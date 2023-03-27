<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trace extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('log_document_model', 'ldm_mdl');
    }
	public function index()
	{
        $code = $this->input->post('code');
        $res = $this->ldm_mdl->getDocument($code);
        $data['doc_info'] = $res;
        if(!$res)
        {
    		$this->load->view('trace_notfound');
        }
        else
        {
    		$this->load->view('admin/trace', $data);
        }
	}
    
}
