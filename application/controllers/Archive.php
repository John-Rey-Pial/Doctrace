<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archive extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('archive_model', 'archive_mdl');
    }
	public function index()
	{
        if(! isset($this->session->logged_in))
		 {
			redirect(base_url());
		 }
		$this->load->view('archive');
	}

    public function load_archive($date_from, $date_to)
    {
        echo json_encode($this->archive_mdl->load_archive($date_from, $date_to));
    }
}
