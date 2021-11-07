<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends Internal_Controller {

	function __construct(){
    parent::__construct();

		$this->load->model('M_pengguna');
	}

	public function index(){

		$data['columns']			= ['nama', 'alamat', 'no_hp', 'rayon', 'action'];
		$data['script']				= ['pengguna.js'];
		$data['page_title']		= 'Pengguna Terdaftar';
		$data['page_content'] = 'pengguna/V_index';
		
		$this->load->view('V_master_internal', $data);
	}

	function ajax_module_index(){
		$html_aksi      = [];
		$table_content  = [];
		$where					= [];

		$offset = $this->input->post('start');
		$limit  = $this->input->post('length');
		$draw   = $this->input->post('draw');

		// pencarian keyword
		$like   = [];
		$search = $this->input->post('search');
		if($search){
			$like = [
				'lower(nama)' 	=> strtolower($search['value']),
				'lower(alamat)' => strtolower($search['value']),
				'lower(no_hp)' 	=> strtolower($search['value']),
				'lower(rayon)' 	=> strtolower($search['value'])
			];
		}
		// end pencarian keyword

		// load data
		$db_all = $this->M_pengguna->get_count($where, $like);
		$db_ops = $this->M_pengguna->get_all($where, $like, $limit, $offset);
		foreach ($db_ops as $i => $v) {
			$html_aksi = [
				'<a href="javascript:void(0)" class="btn btn-xs btn-primary btn-edit" data-id="'.$v->id.'"><i class="fa fa-edit"></i></a>',
				'<a href="javascript:void(0)" class="btn btn-xs btn-danger btn-delete" data-id="'.$v->id.'"><i class="fa fa-trash"></i></a>',
			];

			$table_content[] = [
				'nama'		=> $v->nama,
				'alamat'  => $v->alamat,
				'no_hp'   => '<center>'.$v->no_hp.'</center>',
				'rayon'   => '<center>'.$v->rayon.'</center>',
				'action'  => '<center>' . implode('&nbsp;', $html_aksi) . '</center>'
			];
		}

		$result = [
			"draw"              => $draw,
			"recordsTotal"      => $db_all,
			"recordsFiltered"   => $db_all,
			"data"              => $table_content
		];

		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	function ajax_get_item(){
		$status = false;
		$data 	= [];
		$post 	= $this->input->post();

		if($post){
			$db = $this->M_pengguna->get_item($post['id']);
			if($db){
				$status = true;
				$data = $db;
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode(compact('data', 'status')));
	}

	function ajax_delete_item(){
		$status = false;
		$post 	= $this->input->post();

		if($post && isset($post['id'])){
			$db = $this->M_pengguna->delete_item($post['id']);
			if($db){ $status = true; }
		}

		$this->output->set_content_type('application/json')->set_output(json_encode(compact('status')));
	}

	function ajax_post_item(){
		$status = false;
		$error 	= null;
		$post 	= $this->input->post();

		if($post){
			$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', 
				['required' => 'Nama Lengkap harus dimasukkan']
			);
			$this->form_validation->set_rules('no_hp', 'No. Handphone', 'required', 
				['required' => 'No. Handphone harus dimasukkan']
			);
			$this->form_validation->set_error_delimiters(null, "\n");

			if($this->form_validation->run()){
				$id = (isset($post['id'])) ? $post['id'] : null;

				$data = [
					'nama'		=> $post['nama'],
					'alamat'	=> $post['alamat'],
					'no_hp'		=> $post['no_hp'],
					'rayon'		=> $post['rayon']
				];

				if(!$post['id']){
					$data += [
						'created_at' 	=> date('Y-m-d H:i:s'),
						'created_by' 	=> get_account_info('id')
					];
				}else{
					$data += [
						'updated_at' 	=> date('Y-m-d H:i:s'),
						'updated_by' 	=> get_account_info('id')
					];
				}

				$db = $this->M_pengguna->proccess($id, $data);
				if($db){ $status = true; }
			}else{
				$error = validation_errors();
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode(compact('status', 'error')));
	}
}
