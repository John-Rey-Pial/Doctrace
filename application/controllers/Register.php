<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_model','register_mdl');
    }
	public function index()
	{
		$this->load->view('login');
	}

    public function register()
    {
        $data = array(
            "firstname"  =>$this->input->post('firstname'),
            "lastname"   =>$this->input->post('lastname'),
            "birthdate"  =>$this->input->post('birthdate'),
            "sex"        =>$this->input->post('sex'),
            "contact"    =>$this->input->post('contact'),
            "email"      =>$this->input->post('email'),
            "office_id"  =>$this->input->post('office_id'),
            "password"   =>password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        );

        $res = $this->register_mdl->register($data);
        if($res)
        {
            $this->load->view('admin/user_success');
        }
    }

    public function change_password()
    {
        $data = array(
            "password" => password_hash(/* $this->input->post('password') */ '', PASSWORD_DEFAULT) 
        );
        $this->register_mdl->change_password($data, 17);
    }
}
