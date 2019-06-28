<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

		public function __construct()
    		{
                parent::__construct();
				$this->load->database();
				$this->load->library('session');
       			$this->load->helper('url');
			    $this->load->helper('form');
				$this->load->library('form_validation');
				$this->load->library('password');
				$this->load->model('user_model');
				$this->load->library('UserAuth');
				$this->load->library('pagination');
   
     }

	public function list_admin_users($action = NULL,$id = NULL, $status= NULL) 
	{

         $this->userauth->is_logged_in_admin();
		 $data['title'] = 'Admin Users';
		 $data['adddiv'] = 'none';
		 $data['srdiv'] = 'none'; 
		
		if($action=='add')	
		{
	        
			 $data['title'] = ucfirst($action).' Admin User';
			 $data['btnaction'] = 'add';
			 $data['adddiv'] = 'block';
			 $data['srdiv'] = 'none';
			 
		 		
			 	$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
		
				if($this->user_model->chk_users() === false)
			 	{
					$data['error_msg'] = 'User Already Exists.';
					$data['username'] =  $this->input->post('username');
					$data['password'] =  $this->password->decrypt_password($this->input->post('password'));
					$data['user_type'] = $this->input->post('user_type');
		
			 	}

				if($this->form_validation->run() === TRUE && $this->user_model->chk_users() === true)
				{
					$this->user_model->set_user();
					$this->session->set_flashdata('success_msg', 'User Added Successfully');
				
				}
	
		  }
		  
		if($action=='update')	
		{
		
		
		
			$data['title'] = ucfirst($action).' Admin User'; 
			$data['btnaction'] = 'update';
			$data['adddiv'] = 'block';
			$data['srdiv'] = 'none';
			 
				 $arr_fields = $this->user_model->get_row('admin','*',array('id'=>$id));
				 $data['id'] = $arr_fields->id;
				 $data['username'] = $arr_fields->username;
				 $data['password'] = $arr_fields->password;
				 $data['de']=		$this->password->decrypt_password($data['password']);
				 $data['user_type'] = $arr_fields->user_type;
			 	 $this->form_validation->set_rules('username', 'Username', 'required');
			 	 $this->form_validation->set_rules('password', 'Password', 'required');
				
		       
			 	 if($this->form_validation->run() === TRUE)
				  {
				 	$id=$this->input->post('id');
					$username=$this->input->post('username');
					$password =  $this->password->encrypt_password($this->input->post('password'));
					$usertype=$this->input->post('user_type');
					if($this->user_model->chk_user() === false)
			 		{
					
						 $data['error_msg'] = 'User Already Exists.';
						 $arr_fields = $this->user_model->get_row('admin','*',array('id'=>$id));
						 $data['id'] = $arr_fields->id;
						 $data['username'] = $arr_fields->username;
						 $data['password'] = $arr_fields->password;
						 $data['de']	   = $this->password->decrypt_password($data['password']);
				   	}
				   else
				   {
				   
						$data=array('id'=>$id,'username'=>$username,'password'=>$password,'user_type'=>$usertype);
						$this->user_model->update_user($id,$data);
						$this->session->set_flashdata('success_msg','User updated successfully.');
						redirect('admin/admin-users');
					
					}
				 
				}
				   
		   }
	    
	   if($action=='delete')
		 {
		
				
				$this->user_model->delete_user($id);
				$this->session->set_flashdata('success_msg','User deleted successfully.');
				redirect('admin/admin-users');
			 
		 }
	  if($action=='status')
		 {
		 
				
				$this->user_model->change_active($id,$status);
				$this->session->set_flashdata('success_msg','User status updated successfully.');
				redirect('admin/admin-users');
			
		 }
				 
		if ( ! file_exists('application/views/admin/admin-users.php' ) )
          {
            show_404();
          }
        else
        {
		
				
				$config["base_url"] = base_url() . "admin/admin-users";
				$config["total_rows"] = $this->user_model->user_count();
				$config["per_page"] = 20;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["results"] = $this->user_model->get_users($config["per_page"],$page);
				$data["links"] = $this->pagination->create_links();
				foreach($data["results"] as $key=>$val)
				{
					//$data["results"][$key]['password'] =   $this->password->decrypt_password($val['password']);
	
				}
				
				$this->load->view('admin/admin-users', $data);
			 
		 }
		 
			
	}
 	public function searchs($action = NULL, $usernames = NULL, $usertype = NULL , $per_page = NULL)
	{
	//print_r($usertype);
	 $data['adddiv'] = 'none';
	 $data['srdiv'] = 'none'; 
		
	  if($action=='searchs')	
			{
				 $data['title'] = ucfirst($action).' Admin Users'; 
				 $data['btnactions'] = 'search';
				 $data['adddiv'] = 'none';
				 $data['srdiv'] = 'block';
			    if($usernames){ $usernames = $a; } else {
					$a=$this->input->post('usernames');}
					$data['usernames']=$a;
					if($usertype){
					$usertype=$b; } else {
					$b=$this->input->post('usertype');
					}
					
					$data['usertype']=$b;
					$config["base_url"] = base_url() . "admin/admin-user/searchs/$a/$b";
					$config["result"] = $this->user_model->user_countsearch($a,$b);
					$config["total_rows"] = count($config["result"]);
					$config["per_page"] = 20;
					$config["uri_segment"] = 5;
					$this->pagination->initialize($config);
					$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
					$data["results"] = $this->user_model->get_userssearch($config["per_page"],$page,$a,$b);
					$data["links"] = $this->pagination->create_links();
					
					$this->load->view('admin/admin-users', $data);
				
			 
		}
	}
	
	}
