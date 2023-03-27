<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office_document_model extends CI_Model  {

    var $arr = array();

    var $table = "document";
    var $select_column = array('document_id','document','referral_code','date','(SELECT regular_procedures
    from regular_steps WHERE regular_steps.regular_id = document.document_type) as `regular_procedures`', null);
    var $order_column = array( null,'document',"referral_code", "date", "regular_procedures",null);
	public function __construct()
    {
        parent::__construct();
    }

    function make_query()
      {
           $this->db->select($this->select_column);
        //    $this->db->join('regular_steps', 'document.document_type = regular_steps.regular_id');
           $this->db->from($this->table);
           $this->db->where('status', null);
           $this->db->where('office_id', $this->session->office_id);

           if(isset($_POST["search"]["value"]))
           {
                $this->db->like("referral_code", $_POST["search"]["value"]);
                $this->db->or_like("document",$_POST["search"]["value"]);
                $this->db->where('office_id', $this->session->office_id)
                ->where('status is NULL');
           }
           if(isset($_POST["order"]))
           {
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
           }
           else
           {
                $this->db->order_by('document_id', 'DESC');
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
