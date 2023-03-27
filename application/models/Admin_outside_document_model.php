<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_outside_document_model extends CI_Model  {

    var $arr = array();

    var $table = "outside_document";  
    var $select_column = array("id","status","office_id","outside_person","date","document", null);  
    var $order_column = array( null,"status","office_id","outside_person","date","document", null);  
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
                $this->db->like("document", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
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

      function load_document_type()
      {
		$this->load->database();

           $this->db->select("*");  
           $this->db->from('regular_steps');  
           $q = $this->db->get();  
           return $q->result();

		 $this->db->close();
      }

      function save_document($data)
      {
		$this->load->database();

            $res = $this->db->insert('document',$data);
           return $res;

		 $this->db->close();
      }
    
}
