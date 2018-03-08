<?php

class Admin extends MY_Controller{

	public function dashboard(){
		$this->load->library('pagination');
		$config = [
			'base_url'   => base_url('admin/dashboard'),
			'per_page'   => 5,
			'total_rows' => $this->articlesmodel->num_rows()
		];
		$this->pagination->initialize($config);
		$articles = $this->articlesmodel->article_list($config['per_page'],$this->uri->segment(3));
		$this->load->view('admin/dashboard',['articles'=>$articles]);
	}

	public function add_article(){
		$this->load->view('admin/add_article');
	}

	public function submit_article(){
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if($this->form_validation->run('add_article_rules')){
			$post = $this->input->post();
			unset($post['submitbtn']);
			return $this->flashAndRedirect(
						$this->articlesmodel->add_article($post),
						'Article added successfully',
						'Article failed to add'
					);
		}
		else{
			$this->load->view('admin/add_article');
		}
	}

	public function edit_article($article_id){
		$article = $this->articlesmodel->find_article($article_id);
		$this->load->view('admin/edit_article',['article'=>$article]);
	}
	public function update_article($article_id){
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if($this->form_validation->run('add_article_rules')){
			$post = $this->input->post();
			unset($post['submitbtn']);
			return $this->flashAndRedirect(
						$this->articlesmodel->update_article($article_id, $post),
						'Article Updated successfully',
						'Article failed to Update'
					);
		}
		else{
			$this->load->view('admin/edit_article');
		}

	}

	public function delete_article(){
		$article_id = $this->input->post('article_id');
		return $this->flashAndRedirect(
					$this->articlesmodel->delete_article($article_id),
					'Article Deleted successfully',
					'Article failed to Delete'
					);
	}

	public function __construct(){
		parent::__construct();
		if(! $this->session->userdata('user_id'))
			return redirect('adminlogin');
		$this->load->model('articlesmodel');
		$this->load->helper('form');
	}

	private function flashAndRedirect($successful, $successMessage, $failureMessage){
		if($successful){
			$this->session->set_flashdata('feedback',$successMessage);
			$this->session->set_flashdata('feedback_class','alert-success');
		}
		else{
			$this->session->set_flashdata('feedback',$failureMessage);
			$this->session->set_flashdata('feedback_class','alert-danger');
		}
		return redirect('admin/dashboard');
	}
}