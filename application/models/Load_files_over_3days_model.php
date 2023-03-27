<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Load_files_over_3days_model extends CI_Model  {

    var $arr = array();

    var $table = "trace";
    var $select_column = array(
    'trace_id',
    '(select document from document where document.document_id = trace.document_id) as document',
    '(select referral_code from document where document.document_id = trace.document_id) as referral_code',
    '(SELECT office
    from office WHERE office.office_id = (select office_id from document where document.document_id = trace.document_id)) as `office`',
    'date',
    'note',
    '(SELECT regular_procedures
    from regular_steps WHERE regular_steps.regular_id =
    (SELECT document_type from document where document.document_id = trace.document_id)) as `regular_procedures`');
    var $order_column = array( null,'document',"office", "date", "regular_procedures");
	public function __construct()
    {
        parent::__construct();
    }

    function make_query()
      {

           $this->db->select($this->select_column)
           ->from($this->table)
           ->where('office_id', $this->session->office_id)
           ->where('action', null)
           ->where("DATE_FORMAT(date, '%Y%m%d' ) <= CURRENT_DATE () -3");

           if(isset($_POST["search"]["value"]))
           {
                $this->db->like("date", $_POST["search"]["value"]);
           }
           if(isset($_POST["order"]))
           {
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
           }
           else
           {
                $this->db->order_by('date', 'DESC');
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

      function save_outside_document($data)
      {
		$this->load->database();

           $res = $this->db->insert('outside_document',$data);
           return $res;

		 $this->db->close();
      }

      function receive_document($data)
      {
		$this->load->database();

           $res = $this->db->insert('trace',$data);
           return $res;

		 $this->db->close();
      }

      function update_action($data, $id)
      {
		$this->load->database();

          $res = $this->db->where('trace_id', $id)
          ->update('trace', $data);
          return $res;

		$this->db->close();
      }

      function update_done($data, $id)
      {
		$this->load->database();

          $res = $this->db->where('trace_id', $id)
          ->update('trace', $data);
          return $res;

		$this->db->close();
      }

      function update_note($data, $id)
      {
		$this->load->database();

          $res = $this->db->where('trace_id', $id)
          ->update('trace', $data);
          return $res;

		$this->db->close();
      }

      function cancel_document($data, $id)
      {
		$this->load->database();

          $res = $this->db->where('document_id', $id)
          ->update('document', $data);
          return $res;
		$this->db->close();
      }


      function getDocument($referral_code)
      {
		$this->load->database();

           $q = $this->db->select("document_id, document, date, referral_code, status,
           (SELECT office from office where office.office_id = document.office_id) as `office`,
           (SELECT regular_procedures FROM regular_steps WHERE regular_steps.regular_id = document.document_type) as `document_type`,
           document_type as doctype")
           ->from('document')
           ->where('referral_code', $referral_code)
           ->get();

           return $q->result();

		 $this->db->close();
      }

      function load_trace($referral_code)
      {
		$this->load->database();

           $result = $this->db->select('trace_id, trace.document_id, trace.office_id,
           trace.date, note, document.document_type, firstname, lastname, office')
          ->join('document','document.document_id = trace.document_id')
          ->join('office','trace.office_id = office.office_id')
          ->join('user', 'trace.user_id = user.id')
          ->where('referral_code', $referral_code)
          ->order_by('trace_id')
          ->get('trace');
          return $result->result();

		$this->db->close();
      }

      function remaining_steps($step, $procedure_type)
      {
		$this->load->database();

           $result = $this->db->select('*')
           ->distinct()
           ->from('steps')
           ->join('office', 'office.office_id = steps.office_id')
           ->where_not_in('steps.office_id', $step)
           ->where('regular_id', $procedure_type)
           ->get();
           return $result->result();

		 $this->db->close();
      }

      function last_step($last_office, $document_type)
      {
		$this->load->database();

          $result = $this->db->select('*')
           ->from('steps')
           ->where('office_id', $last_office)
           ->where('regular_id', $document_type)
           ->get();
           return $result->result();

		 $this->db->close();
      }

      function get_steps($document_type)
      {
		$this->load->database();

          $res = $this->db->select('*')
          ->from('steps')
          ->where('regular_id', $document_type)
          ->get();

          return $res->result();

		$this->db->close();
      }

      function get_last_id($document_id)
      {
		$this->load->database();

           $res = $this->db->select('max(trace_id) as `last_id`')
           ->from('trace')
           ->where('document_id', $document_id)
           ->get();

           return $res->result();

		 $this->db->close();
      }

     function get_trace_info($trace_id)
     {
		$this->load->database();

          $result = $this->db->select('trace_id, trace.document_id, trace.office_id,
          (SELECT office
    		 from office WHERE office.office_id = trace.office_id) as `office`,
           trace.date, note')
          ->where('trace_id', $trace_id)
          ->get('trace');
          return $result->result();

		$this->db->close();
     }

}
