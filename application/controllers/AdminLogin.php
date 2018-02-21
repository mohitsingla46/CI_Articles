<?php

class AdminLogin extends MY_Controller{
	public function index(){
		$this->load->helper('form');
		$this->load->view('admin/admin_login');
	}
	public function login(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email ID','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if($this->form_validation->run()){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->load->model('loginmodel');
			$user_id = $this->loginmodel->valid_login($email,$password);
			if($user_id){
				$this->session->set_userdata('user_id',$user_id);
				return redirect('admin/dashboard');
			}
			else{
				echo "Login Failed";
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