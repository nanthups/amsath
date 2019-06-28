<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	 
	public function __construct()
    {
                parent::__construct();
                $this->load->library('AdminTemplate');
				$this->load->database();
				$this->load->library('session');
       			$this->load->helper('url');
			    $this->load->helper('form');
				$this->load->library('form_validation');
				$this->load->library('password');
				$this->load->library('UserAuth');
				$this->load->model('user_model');
				$this->load->model('page_model');
   
     }

	public function home($page = 'home')
	{
		if (!file_exists(APPPATH.'views/admin/'.$page.'.php'))
		{
		
			show_404();
		}
		
			$data['title'] = ucfirst($page); 
			$data['username'] = $this->session->userdata('username');
			
	
			if($page!='login')
		{
		
			 $this->userauth->is_logged_in_admin();
			 $data['result']=$this->user_model->get_countuser();
			 $data['results']=$this->page_model->get_countpages();
			 $this->load->view('admin/home',$data);
		}
		else
		{
			  $this->userauth->is_logged_in_admin();
			  $this->load->view('admin/'.$page, $data);
		}
		
	
	}
	
	public function login() 
	{
		
		$this->load->helper('cookie');
		$data['username'] = get_cookie('swebin_user_ad');
		$data['password'] = $this->password->decrypt_password(get_cookie('swebin_sec'));
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('admin/login',$data);
		}
		else
		{
			$username = $this->input->post('username');
			$password_input = $this->input->post('password');
			$remember_me = $this->input->post('remember_me');
			$password = $this->password->encrypt_password($password_input);
			
			
			if($remember_me){
				$expire = time()+365*60*60*24;
				setcookie('swebin_user_ad',$username, $expire);
				setcookie('swebin_sec',$password, $expire);
		  	}
		else
			{
				setcookie("swebin_user_ad", "", time()-3600);
				setcookie("swebin_sec", "", time()-3600);
	        }
 
            $this->load->model('admin_model');
            $login_det = $this->admin_model->login_valid($username, $password);
            
            
		if(!empty($login_det)) 
			{

                $this->session->set_userdata('admin_id', $login_det[0]->id);
                $this->session->set_userdata('user_type', $login_det[0]->user_type);
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('password', $password);
				$data['result']=$this->user_model->get_countuser();
			    $data['results']=$this->page_model->get_countpages();
                $this->load->view('admin/home',$data);
            }
			else 
			{
				$this->session->set_flashdata('login_failed', 'Invalid Username/Password');
				$this->load->view('admin/login',$data);
			}
    	}
	}
 
	
    public function logout()
	 {
				$this->session->unset_userdata('admin_id');
				$this->session->unset_userdata('username');
				$this->load->view('admin/login');
	  }
	
	public function reset_password($action = NULL)
	{
	    $data['title'] = ucfirst($action).' Reset Password';
		$this->userauth->is_logged_in_admin();
		if($action =="change")
		{
				$data['title'] = 'Reset Password'; 
				$pass=$this->input->post('old_pwd');
				$npass=$this->input->post('new_pwd');
				$rpass=$this->input->post('conf_password');
				if($npass!=$rpass)
				{
				
					$this->session->set_flashdata('fail', 'mismatching password');
					$data['old_pwd']=$this->input->post('old_pwd');
					$data['new_pwd']=$this->input->post('new_pwd');
					$data['conf_password']=$this->input->post('conf_password');
				}
				else
				{
					$a=$this->session->userdata('username');
					$password=$this->password->encrypt_password($pass);
					$this->db->select('*');
					$this->db->from('admin');
					$this->db->where('username',$a);
					$this->db->where('password',$password);
					$query = $this->db->get();
					if($query->num_rows()==1)
					{
						$data = array(
									   'password' => $this->password->encrypt_password($npass)
									);
								
						$this->db->where('username', $this->session->userdata('username'));
						$this->db->update('admin', $data); 
						$this->session->set_flashdata('sucess', 'Password updated Successfully');
				
					}
				 else
					{
						$data['old_pwd']=$this->input->post('old_pwd');
						$data['new_pwd']=$this->input->post('new_pwd');
						$data['conf_password']=$this->input->post('conf_password');
						$this->session->set_flashdata('fail', 'some error occurs');
			
					}
			
				}
				
				
			}
			$this->load->view('admin/reset-password',$data);
	
	}
	
}