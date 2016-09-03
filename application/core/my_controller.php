<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function login_status()
    {
        $this->load->library('session');
        if(!$this->session->userdata('auth_status')) {
            $this->session->set_userdata('access_uri', $this->uri->uri_string());
            return false;
        } else {
            return true;
        }
    }
}
