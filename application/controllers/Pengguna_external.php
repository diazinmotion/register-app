<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_external extends External_Controller {
	
	function __construct(){
    parent::__construct();

		$this->load->model('M_pengguna');
	}
  
  public function register(){
		$post = $this->input->post();

		if($post){
			$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', 
				['required' 	=> 'Nama Lengkap harus dimasukkan']
			);
			$this->form_validation->set_rules('no_hp', 'No. Handphone', 'required', 
				['required' => 'No. Handphone harus dimasukkan']
			);
			$this->form_validation->set_error_delimiters(null, "\n");

			if($this->form_validation->run()){
				$data = [
					'nama'				=> $post['nama'],
					'alamat'			=> $post['alamat'],
					'no_hp'				=> $post['no_hp'],
					'rayon'				=> $post['rayon'],
					'created_at' 	=> date('Y-m-d H:i:s'),
					'created_by' 	=> 0
				];

				// cek apakah data nama dan no hp sudah ada?
				$i = $this->M_pengguna->get_all(
					"lower(nama) = '".strtolower($post['nama'])."' OR lower(no_hp) = '".strtolower($post['no_hp'])."'"
				);
				if($i){
					// data sudah ada tampilkan error
					$this->session->set_flashdata('msg', 'Maaf, Anda telah terdaftar sebelumnya (Nama Lengkap atau No. HP sudah ada). Silakan hubungi administrator untuk perbaikan data.');
				}else{
					$db = $this->M_pengguna->proccess(null, $data);
					if($db){ 
						$this->session->set_flashdata('msg', null);
						$this->session->set_flashdata('msg_success', 'Terima Kasih. Anda Berhasil Terdaftar');
					}else{
						$this->session->set_flashdata('msg_success', null);
						$this->session->set_flashdata('msg', 'Maaf, Gagal Mendaftarkan Diri Anda');
					}
				}
			}else{
				$this->session->set_flashdata('msg_success', null);
				$this->session->set_flashdata('msg', validation_errors());
			}
		}

		$data['page_title']		= 'Daftarkan Diri Anda';
		$data['page_content'] = 'pengguna/V_register';
		
		$this->load->view('V_master_external', $data);
	}
}
