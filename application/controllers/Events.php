<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
    }
    public function index()
    {
        $this->load_view('events/index.php', $data);
    }
    public function detail($id)
    {
        $data['val'] = $id;
        $this->load_view('events/detail.php', $data);
    }
    public function create()
    {
        if($param = $this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            $this->form_validation->set_rules('name', 'タイトル', 'trim|required|min_length[1]');
            $this->form_validation->set_rules('description', '説明文', 'trim|required|min_length[1]');
            $this->form_validation->set_rules('thumbnail', 'サムネイル', 'trim');
            $this->form_validation->set_rules('capacity', '定員', 'trim');
            $this->form_validation->set_rules('deadline', '締切日', 'trim');

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'title' => $this->input->post('name'),
                    'description' => $this->input->post('description'),
                    'thumbnail' => $this->input->post('thumbnail'),
                    'capacity' => $this->input->post('capacity'),
                    'deadline' => $this->input->post('deadline'),
                );
                if($this->db->insert('events',$data)){
                    redirect('events/detail/'.$this->db->insert_id());
                }else{
                    $this->session->set_flashdata('edit_result', "{$this->_page_title}の登録に失敗しました。");
                }
            }
        }

        $this->load_view('events/create.php');
    }
    public function edit()
    {
        $this->load_view('events/edit.php');
    }

}
