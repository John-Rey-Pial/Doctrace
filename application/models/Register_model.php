<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model  {

    
	public function __construct()
    {
        parent::__construct();
    }

 
      
      function register($data)
      {
		$this->load->database();

           $res = $this->db->insert('user',$data);
           return $res;

		   $this->db->close();
      }

      function change_password($data, $id)
      {
		$this->load->database();

            $this->db->where('id', $id);
            $this->db->update('user', $data);
           return true;
		   $this->db->close();
      }

    
}
