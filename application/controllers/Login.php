<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->helper(array('form','url'));

        $this->load->library(array('session','PHPRequests'));

        $this->load->model('Login_model');

	}


	public function index()
	{
        if($param = $this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            $this->form_validation->set_rules('screen_name', 'MisskeyのID', 'trim|required|min_length[3]|max_length[12]|callback_is_user_exists');
            $this->form_validation->set_rules('recaptcha', 'recaptcha', 'trim|callback_recaptcha_check');
            $this->form_validation->set_message('recaptcha_check', 'recaptchaをやれ');
            $this->form_validation->set_message('is_user_exists', 'そのユーザーは存在しません');

            if ($this->form_validation->run() == TRUE) {
                redirect('login/auth/'.$this->input->post('screen_name'));
            }
        } else

		$this->load->view('login/index.php');
	}

    public function auth($screen_name)
    {
        $session = $this->Login_model->getSession();

        $user_id = $this->Login_model->getUserID($screen_name);

        $this->Login_model->sendTalk($user_id,'トーク本文',$session);

        $this->load->view('login/auth.php');
    }
    public function recaptcha_check()
    {
        if(empty($this->input->post('g-recaptcha-response'))){
            return false;
        } else {
            return true;
        }
    }

    public function is_user_exists($screen_name)
    {
        $data = array('screen-name' => $screen_name);
        $response = Requests::post('https://api.misskey.link/users/show', array(), $data);
        $json = json_decode($response->body);
        return !isset($json->error);
    }
}
