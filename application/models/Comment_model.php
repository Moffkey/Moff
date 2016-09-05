<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends MY_Model
{

    public function __construct(){
        parent::__construct();

    }

    public function get_by_id($id){
        $query = $this->db->from('event_comments')
            ->where('event_id', $id)
            ->get();
        if($query->num_rows() >= 1){
            $results = $query->result_object();
            return $results;
        }else{
            return false;
        }
    }

}
