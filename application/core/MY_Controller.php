<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
  
  function __construct(){
    parent::__construct();
	}
  
}

class External_Controller extends MY_Controller {
  
  function __construct(){
    parent::__construct();
	}
  
}

class Internal_Controller extends MY_Controller {
  function __construct(){
    parent::__construct();

    // cek apakah terdapat session loginnya?
    // bila tidak ada, maka redirect ke login
    if(! $this->session->userdata(APP_SESSION)){
      redirect('register');
    }
	}
}