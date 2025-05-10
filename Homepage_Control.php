<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage_Control extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Homepage_Model');
        $this->load->library('PHPMAILER_Library');
    }

    public function Apparel_Page() {
        $this->load->view('Apparel_View');
    }

    public function Homepage() {
        $this->load->view('Homepage_View');
    }
}