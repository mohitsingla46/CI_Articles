<?php

class AdminLogin extends MY_Controller{
	public function index(){
		if($this->session->userdata('user_id'))
			return redirect('admin/dashboard');
		
		$this->load->helper('form');
		$this->load->view('admin/admin_login');
	}
	public function login(){
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if($this->form_validation->run('admin_login')){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->load->model('loginmodel');
			$user_id = $this->loginmodel->valid_login($email,$password);
			if($user_id){
				$this->session->set_userdata('user_id',$user_id);
				return redirect('admin/dashboard');
			}
			else{
				$this->session->set_flashdata('login_failed','Invalid Email or Password');
				return redirect('adminlogin');
			}
		}
		else{
			$this->load->view('admin/admin_login');
		}
	}

	public function logout(){
		$this->session->unset_userdata('user_id');
		return redirect('adminlogin');
	}
}