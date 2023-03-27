<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outside_document extends CI_Controller {

	public function index()
	{
		if(! isset($this->session->logged_in))
		 {
			redirect(base_url());
		 }
		$this->load->view('work_place/outside_document');
	}
}
