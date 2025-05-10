<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg_Log_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function Get_Email($email) {
        return $this->db->get_where('user_tbl', ['Email_Address' => $email])->row_array();
    }

    public function Verify_User($data) {
        $this->db->where('Verification_Code', $data['Verification_Code']);
        $this->db->where('Verified', 0);
        $query = $this->db->get('user_tbl');

        if ($query->num_rows() == 1) {
            $this->db->where('Verification_Code', $data['Verification_Code']);
            return $this->db->update('user_tbl', ['Verified' => 1]);
        }

        return false;
    }

    public function Registration($data) {
        return $this->db->insert('user_tbl', $data) ? 
            $this->db->insert_id() : false;
    }

    public function Email_Verified($email) {
        $this->db->where('Email_Address', $email);
        $this->db->where('Verified', 1);
        $query = $this->db->get('user_tbl');
        return $query->num_rows() > 0;
    }
    
}
?>
