<?php

class LoginModel extends CI_Model{
	public function valid_login($email,$password){
		$query = $this->db->get_where('users',array('email'=>$email,'password'=>$password));
		if($query->num_rows()){
			return $query->row()->id;
		}
		else{
			return FALSE;
		}
	}
}