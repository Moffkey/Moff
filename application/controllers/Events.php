<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

    public function index()
    {
        $data['val'] = 'FUCK U';
        $this->load->view('events/index.php', $data);
    }
    public function detail($id)
    {
        $data['val'] = $id;
        $this->load->view('events/index.php', $data);
    }

}
