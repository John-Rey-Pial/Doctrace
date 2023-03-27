<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archive_model extends CI_Model {

    var $select_column = array(
    'trace_id',
    '(select document from document where document.document_id = trace.document_id) as document',
    '(SELECT office 
    from office WHERE office.office_id = (select office_id from document where document.document_id = trace.document_id)) as `office`',
    'date',
    '(SELECT regular_procedures 
    from regular_steps WHERE regular_steps.regular_id = 
    (SELECT document_type from document where document.document_id = trace.document_id)) as `regular_procedures`');  
    
	public function __construct()
    {
        parent::__construct();
    }

    public function load_archive($date_form, $date_to)
    {
		$this->load->database();

        $q = $this->db->select($this->select_column)
        ->from('trace')
        ->where('date >=', $date_form)
        ->where('date <=', $date_to)
        ->where('office_id', $this->session->office_id)
        ->get();
        return $q->result();

		$this->db->close();
    }
}
