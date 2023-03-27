 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Login_model extends CI_Model
    {


        public function __construct()
        {
            parent::__construct();
        }
        public function validate($data)
        {
            $this->load->database();

            $this->db->select('id, email, firstname, lastname,
        contact, password, office_id, (SELECT office from office where office_id = user.office_id) as `office`')
                ->from('user')
                ->where('email', $data['email']);

            $q = $this->db->get();
            $res = $q->result();

            if ($res) {
                return (password_verify($data['password'], $res[0]->password)) ? $res : 'wrong password';
            } else {
                return 'wrong email';
            }
            $this->db->close();
        }
    }
