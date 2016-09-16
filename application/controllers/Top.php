<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Top extends MY_Controller {

	public function index()
	{
		$this->load_view('top/index.php');
	}
}
