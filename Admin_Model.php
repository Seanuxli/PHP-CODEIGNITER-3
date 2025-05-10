<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_accounts() {
        $query = $this->db->get('user_tbl');
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }

    public function get_products() {
        $query = $this->db->get('products_tbl');
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }

    public function insert_product($data) {
        if ($this->db->insert('products_tbl', $data)) {
            return true;
        } else {
            log_message('error', 'Insert Error: ' . $this->db->_error_message());
            return false;
        }
    }

    public function remove($ID) {
        $this->db->where('ID', $ID);
        $this->db->delete('products_tbl');
    }

    public function get_user_count() {
        $this->db->where('Role !=', 'admin');
        return $this->db->count_all_results('user_tbl');
    }

    public function get_admin_count() {
        $this->db->where('Role', 'admin');
        return $this->db->count_all_results('user_tbl');
    }

    public function get_released_count() {
        $this->db->where('STATUS', 'released');
        return $this->db->count_all_results('products_tbl');
    }

    public function get_unreleased_count() {
        $this->db->where('STATUS', 'unreleased');
        return $this->db->count_all_results('products_tbl');
    }

    public function get_unreleased_products() {
        return $this->db
                    ->where('STATUS', 'Unreleased')
                    ->order_by('CREATED_AT', 'DESC')
                    ->get('products_tbl')
                    ->result();
    }

    public function get_unreleased_by_category($category) {
        return $this->db
                    ->where('STATUS', 'Unreleased')
                    ->where('CATEGORY', $category)
                    ->order_by('CREATED_AT', 'DESC')
                    ->get('products_tbl')
                    ->result();
    }

    public function get_unreleased_shirts() {
        return $this->get_unreleased_by_category('shirt');
    }

    public function get_unreleased_hoodies() {
        return $this->get_unreleased_by_category('hoodie');
    }

    public function get_unreleased_patches() {
        return $this->get_unreleased_by_category('patch');
    }

    public function ban_user($ID) {
        $this->db->where('ID', $ID);
        return $this->db->update('user_tbl', ['Banned' => 1]);
    }

    public function unban_user($ID) {
        $this->db->where('ID', $ID);
        return $this->db->update('user_tbl', ['Banned' => 0]);
    }

    public function is_user_banned($ID) {
        $this->db->select('Banned');
        $this->db->where('ID', $ID);
        $query = $this->db->get('user_tbl');
        if ($query->num_rows() > 0) {
            return $query->row()->Banned == 1;
        }
        return false;
    }

    public function get_user_details($ID) {
        $this->db->select('Email_Address, Full_Name');
        $this->db->where('ID', $ID);
        $query = $this->db->get('user_tbl');
        return ($query->num_rows() > 0) ? $query->row() : false;
    }

    public function delete_user($ID) {
        $this->db->where('ID', $ID);
        return $this->db->delete('user_tbl');
    }
    
}
