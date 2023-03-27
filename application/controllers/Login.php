<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model', 'login_mdl');
    }
    public function index()
    {
        session_destroy();
        $this->load->view('login');
    }

    public function admin_login()
    {
        session_destroy();
        $this->load->view('admin_login');
    }

    public function mobile()
    {

        session_destroy();
        $this->load->view('mobile');
    }



    public function validate()
    {
        $email = $_POST["email"];

        $data = array(
            "email"  => $this->input->post('email'),
            "password" => $this->input->post('password')
        );


        $res = $this->login_mdl->validate($data);
        $data['error_msg'] = $res;

        if (is_array($res)) {
            $new_session = array(
                'user_id'       => $res[0]->id,
                'email'         => $res[0]->email,
                'firstname'     => $res[0]->firstname,
                'lastname'      => $res[0]->lastname,
                'contact'       => $res[0]->contact,
                'office_id'     => $res[0]->office_id,
                'office'        => $res[0]->office,
                'logged_in'     => TRUE
            );
            $this->session->set_userdata($new_session);

            switch ($res[0]->office_id) {
                case 0:
                    redirect(base_url('admin'));
                    break;

                default:
                    redirect(base_url('work_place'));
                    break;
            }
        } else {
            $this->load->view('login_error', $data);
        }
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url());
    }
}
