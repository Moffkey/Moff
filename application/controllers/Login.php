<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

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
        }

		$this->load_view('login/index.php');
	}

    public function auth($screen_name)
    {
        $session = $this->Login_model->getSession();

        $user_id = $this->Login_model->getUserID($screen_name);

        $token = $this->Login_model->genToken($screen_name);

        $data = array(
            'screen_name' => $screen_name,
            'session_key' => $token,
        );
        $query = $this->db->insert('auth_session',$data);

        $text = "Moffへの登録を続けるには、以下のリンクをクリックしてください。\n"."http://localhost/login/regist?token={$token}\n"."このトークにお心当たりがない場合や、moffへの登録をキャンセルする場合はこのまま無視してください。リンクの有効期限は24時間です。 \n"."このメールは自動送信されています。\n"."トークの発信元に返信されても返信は帰ってきません。\n"."お問い合わせは以下のURLよりお願いいたします。\n"."配信元：@srtm\n"."https://talk.misskey.link/srtm";
        $this->Login_model->sendTalk($user_id,$text,$session);

        $data['screen_name'] = $screen_name;

        $this->load_view('login/auth.php',$data);
    }
    public function regist(){
        $token = $this->input->get('token');
        $user = $this->Login_model->is_session_key_exists($token);

        if(!empty($user))
        {
            if($user_name_and_token = $this->Login_model->get_by_token($token))
            {
                    if(time()-strtotime($user_name_and_token->created_at) < (3600*24))
                    {
                        $data['screen_name'] = $user_name_and_token->screen_name;
                        $data['token'] = $user_name_and_token->session_key;

                        $this->session->set_userdata('auth_status', TRUE); # ログインセッション開始
                        $this->session->set_userdata('screen_name', $user_name_and_token->screen_name); # ログインセッション開始
                    }

            }
        } else {
            var_dump($user);
            redirect('login/oops'); #セッションキーが何かおかしい時
        }

        $this->load_view('login/regist.php',$data);
    }
    public function oops(){
        if($this->login_status()){
            redirect('/');
        }
        $this->load_view('login/oops.php');
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
