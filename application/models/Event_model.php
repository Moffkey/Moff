<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends MY_Model
{

    public function __construct(){
        parent::__construct();

    }

    public function get_by_id($id){
        $query = $this->db->from('events')
            ->where('id', $id)
            ->get();
        if($query->num_rows() == 1){
            $results = $query->result_object();
            return $results[0];
        }else{
            return false;
        }
    }


}