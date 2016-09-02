<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends MY_Controller {

    public function index()
    {
        $this->load->view('events/index.php', $data);
    }
    public function detail($id)
    {
        $data['val'] = $id;
        $this->load->view('events/detail.php', $data);
    }
    public function create()
    {
        $this->load->view('events/create.php');
    }
    public function edit()
    {
        $this->load->view('events/edit.php');
    }

}
