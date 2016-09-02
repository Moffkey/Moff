<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        if(!$this->session->userdata('auth_status')) {
            $this->session->set_userdata('access_uri', $this->uri->uri_string());
        }
    }
}
