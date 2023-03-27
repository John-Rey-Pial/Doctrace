<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Notification_model','notif_mdl');
    }//end of function

    public function Notification()
    {
      $data['query'] = $this->notif_mdl->n_notif();
      $this->load->view('work_place/log_documents', $data);
    }//end of function

    public function Load_files_over_3days()
    {
      $this->load->view('load_files_over_3days');
    }//end of function
}//end of class
