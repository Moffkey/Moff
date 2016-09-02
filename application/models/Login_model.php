<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends MY_Model
{

    public function __construct(){
        parent::__construct();

    }

    public function genToken(){
        $session_key = md5(time());

        return $session_key;
    }

    public function get_by_token($token){
        $query = $this->db->from('auth_session')
            ->where('session_key', $token)
            ->get();
        if($query->num_rows() == 1){
            $results = $query->result_object();
            return $results[0];
        }else{
            return false;
        }
    }

    public function is_session_key_exists($session_key) {
        $this->db->where("session_key", $session_key);
        $query = $this->db->get("auth_session");
        if($query->num_rows() == 1){
            $results = $query->result_object();
            return $results[0];
        }else{
            return false;
        }
    }


}
