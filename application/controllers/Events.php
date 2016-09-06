<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');

        $this->load->library('session');

        $this->load->model('Event_model');
    }
    public function index()
    {
        $this->load_view('events/index.php');
    }
    public function detail($id)
    {
        if($Event = $this->Event_model->get_by_id($id))
        {
            $this->load->model('Comment_model');
            $data['Comments'] = $this->Comment_model->get_by_id($id);
            $data['Events'] = $Event;
            $data['Dates'] = $this->Event_model->get_candidate_date_by_id($id);
            $this->load_view('events/detail.php', $data);
        } else {
            $this->load_view('events/_notfound.php');
        }
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
                    'created_by' => $this->session->userdata('screen_name'),
                );
                if($this->db->insert('events',$data)){
                    $id = $this->db->insert_id();
                    $dates = $this->input->post('candidate_date');
                    foreach($dates as $date){
                        $data = array(
                            'event_id' => $id,
                            'date' => $date,
                        );
                        $this->db->insert('candidate_date',$data);
                    }
                    redirect('events/detail/'.$id);
                }else{
                    $this->session->set_flashdata('edit_result', "{$this->_page_title}の登録に失敗しました。");
                }
            }

        }

        $this->load_view('events/create.php');
    }
    public function postcomment($id)
    {
        if($param = $this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            $this->form_validation->set_rules('text', '本文', 'trim|required|min_length[1]');

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'user' => $this->session->userdata('screen_name'),
                    'event_id' => $id,
                    'text' => $this->input->post('text'),
                );
                if($this->db->insert('event_comments',$data)){
                    redirect('events/detail/'.$id);
                }else{
                    $this->session->set_flashdata('edit_result', "{$this->_page_title}の登録に失敗しました。");
                    redirect('events/detail/'.$id);
                }
            }

        }

    }
    public function edit()
    {
        $this->load_view('events/edit.php');
    }

}
