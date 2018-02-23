<?php

class Admin extends MY_Controller{

	public function dashboard(){
		$this->load->model('articlesmodel');
		$articles = $this->articlesmodel->article_list();
		$this->load->view('admin/dashboard',['articles'=>$articles]);
	}

	public function add_article(){
		$this->load->helper('form');
		$this->load->view('admin/add_article');
	}

	public function __construct(){
		parent::__construct();
		if(! $this->session->userdata('user_id'))
			return redirect('adminlogin');
	}
}