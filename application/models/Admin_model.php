<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model  {

    var $arr = array();

    var $table = "user";  
    var $select_column = array('id','firstname','lastname','email');  
    var $order_column = array( null,"firstname", "lastname", "email");  
	public function __construct()
    {
        parent::__construct();
    }

    function make_query()  
      {  
           $this->db->select($this->select_column); 
           $this->db->from($this->table);  
           
           if(isset($_POST["search"]["value"]))  
           {  

                $this->db->like("firstname", $_POST["search"]["value"]);  
                $this->db->or_like("lastname", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
           }  
      } 

      function make_datatables(){
		
		$this->load->database();

           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  

           $query = $this->db->get();  
           return $query->result(); 

		 $this->db->close();
             
      }  
      function get_filtered_data(){  
		$this->load->database();

           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
		 $this->db->close();

      }       
      function get_all_data()  
      {  
		$this->load->database();

           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
		 $this->db->close();

      } 
      
      function save($data)
      {
		$this->load->database();

           $this->db->insert('department',$data);
		 $this->db->close();

      }

      function load_offices()
      {
		$this->load->database();

           $this->db->select("*");  
           $this->db->from('office');  
           $q = $this->db->get();  
           return $q->result();

		 $this->db->close();

      }

      public function change_password($data, $id)
     {
		$this->load->database();

          $this->db->where('id', $id);
          $insert = $this->db->update('user',$data);
          return $insert;
		$this->db->close();

     }
}
