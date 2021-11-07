<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends External_Controller {
	
	function __construct(){
    parent::__construct();

		$this->load->model('M_users');
	}

	public function index(){
		$post = $this->input->post();

		// bila sudah login maka redirect ke halaman utama
		if($this->session->userdata(APP_SESSION)){
			redirect('/');
		}

		if($post){
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email', 
				[
					'required' 		=> 'Email harus dimasukkan',
					'valid_email' => 'Format Email tidak valid.'
				]
			);
			$this->form_validation->set_rules('password', 'Password', 'required', 
				[
					'required' 		=> 'Password harus dimasukkan'
				]
			);
			$this->form_validation->set_error_delimiters(null, '<br>');

			if($this->form_validation->run()){
				// proses data cek apakah password dan user name sesuai?
				$db = $this->M_users->verify_login($post['email'], md5($post['password']));
				if($db){
					// bila sesuai set session untuk user ini
					$data_session = [
						'user_id'		=> $db->id,
						'full_name' => $db->full_name,
						'email'			=> $db->email
					];

					$this->session->set_userdata(APP_SESSION, $data_session);

					// redirect ke halaman utama
					redirect('home', true);
				}else{
					$this->session->set_flashdata('msg', 'Email dan Password tidak cocok.');
				}
			}else{
				// terjadi kesalahan pada form
				$this->session->set_flashdata('msg', validation_errors());
			}
		}

		// tampilkan halmaan login
		$data['page_title']		= 'Login';
		$data['page_content'] = 'login/V_login';
		
		$this->load->view('V_master_external', $data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/loginapp');
	}
}
