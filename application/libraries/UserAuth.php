<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userauth
{

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('session');
	}

	public function logged_in(){

		if ( ! $this->CI->session->userdata('userid'))
		{ 
			redirect('user-login');
		}
	}

	public function login_return(){

		if ( ! $this->CI->session->userdata('userid'))
		{ 
			return true;
		}
	}

	public function is_logged_in_admin(){
		
		if ( ! $this->CI->session->userdata('admin_id'))
		{ 
			redirect('admin/login');
		}
	}
	
}

