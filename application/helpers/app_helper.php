<?php defined('BASEPATH') OR exit('No direct script access allowed');

function get_account_info($item = null){
  $CI =& get_instance();

  $s = $CI->session->userdata(APP_SESSION);

  return (isset($s[$item])) ? $s[$item] : null;
}