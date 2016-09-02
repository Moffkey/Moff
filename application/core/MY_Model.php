<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model{
    public static $_uri = 'misskey.link';

    public function __construct(){
        parent::__construct();

    }

    public function getSession()
    {
        $session = new Requests_Session('https://'.static::$_uri);
        $csrf = $session->get('/');

        preg_match('/<meta name="csrf-token" content="([A-Za-z0-9\-_]+)">/', $csrf->body, $csrf);

        $csrf = $csrf[1];
        $session->headers['csrf-token'] = $csrf;

        $data = array('screen-name' => MISSKEY_SCREEN_NAME, 'password' => MISSKEY_PASSWORD);
        $response = $session->post('https://login.'.static::$_uri, array(), $data);

        return $session;
    }
    public function getUserID($screen_name)
    {
        $data = array('screen-name' => $screen_name);
        $user_show = Requests::post('https://api.'.static::$_uri.'/users/show', array(), $data);

        $user_show = json_decode($user_show->body);
        $user_id = $user_show->id;

        return $user_id;
    }
    public function sendTalk($user_id,$text,$_session)
    {
        $session = $_session;

        $data = array('text' => $text, 'user-id' => $user_id);
        $response = $session->post('https://himasaku.'.static::$_uri.'/talks/messages/say', array(), $data);

        return $response->body;
    }

}
