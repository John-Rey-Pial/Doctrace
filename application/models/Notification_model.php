<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_model extends CI_Model
{
    public function n_notif()
    {
        $this->load->database();
        //$this->db->select("*,  DATE_FORMAT(date, '%Y%m%d')");
        //$this->db->get_where('document', ["DATE_FORMAT(date, '%Y%m%d') = " => date('Ymd',strtotime(date('Ymd') . " +1 days"))] )-> result();
        //$this->db->where('date = CURRENT_DATE()');
        //$res = $this->db->result();
        //$rs = $this->db->get('document')->result();

        $this->db->select("*,  DATE_FORMAT(date, '%Y%m%d')")
        ->from('trace')
        ->where('action is NULL')
        ->where("DATE_FORMAT(date, '%Y%m%d' ) <= CURRENT_DATE () -3");
        $this->db->where('office_id', $this->session->office_id);

        //echo $this->db->last_query();
        //return $rs;

        return  $this->db->count_all_results();

    }
}
