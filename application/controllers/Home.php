<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Internal_Controller {
	
	function __construct(){
    parent::__construct();
	}

	public function index(){
		$data['page_content'] = 'home/V_index';
		
		$this->load->view('V_master_internal', $data);
	}
}
