<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_place_model extends CI_Model  {


	public function __construct()
    {
        parent::__construct();
    }



      function get_recent()
      {
		$this->load->database();

          $res = $this->db->select('date,document_id, document, office, (select regular_procedures from regular_steps where regular_id = document.document_type) as doctype')
					->order_by('document_id DESC')
					->from('document')
					->where('status IS NULL')
          ->join('office','office.office_id = document.office_id')
          ->limit(10)
          ->get();
          return $res->result();
		  $this->db->close();

      }


}
