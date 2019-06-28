<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg extends CI_Controller {

	public function __construct()
   	 {
                parent::__construct();
				$this->load->database();
				$this->load->library('session');
       			$this->load->helper('url');
			    $this->load->helper('form');
				$this->load->library('form_validation');
				$this->load->library('password');
				$this->load->library('upload');
				$this->load->library('image_lib');
				$this->load->model('Reg_model');
				$this->load->library('UserAuth');
				$this->load->library('pagination');
				$this->userauth->is_logged_in_admin();
   
     }

    
     public function list_reg ($action= NULL, $id= NULL ) 
     {
     	 $data['titles'] = ' List User';
		 $data['adddiv'] = 'none';
		 $data['srdiv'] = 'none'; 


		 if($action=='delete')
		 {
		
				
				$this->Reg_model->delete_reg($id);
				$this->session->set_flashdata('success_msg','User deleted successfully.');
				redirect('admin/list-reg');
			 
		 }


          if($action=='status')
		  {
		 
				
				$this->Reg_model->change_active($id,$status);
				$this->session->set_flashdata('success_msg','User  status updated successfully.');
				redirect('admin/list-reg');
			
		 }
		

		 if ( ! file_exists('application/views/admin/list-reg.php' ) )
          {
            show_404();
          }

        else
        {
			    $config["base_url"] = base_url() . "admin/list-reg";
				$config["total_rows"] = $this->Reg_model->reg_count();
				$config["per_page"] = 20;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["results"] = $this->Reg_model->get_reg($config["per_page"],$page);
				$data["links"] = $this->pagination->create_links();
				
				
				$this->load->view('admin/list-reg', $data);
			 
		 }		

     }

    public function searchs($action = NULL,$title= NULL,$per_page = NULL)
	{
	//print_r($usertype);
	 $data['adddiv'] = 'none';
	 $data['srdiv'] = 'block'; 
		
	  if($action=='searchs')	
		{
			$data['titles'] = ucfirst($action).'Users'; 
			$data['btnactions'] = 'search';
			$data['adddiv'] = 'none';
			$data['srdiv'] = 'block';

			if($title){ $name       = $title; } 
			else { $name    	    = $this->input->post('name'); }
			$data['name'] 		    = $name;

			if($title){ $email      = $title; } 
			else { $email     	    = $this->input->post('email'); }
			$data['email']          = $email ;

			if($title){ $phone      = $title; } 
			else { $phone      	    = $this->input->post('phone'); }
			$data['phone']          = $phone;
			
			if($title){ $place      = $title; } 
			else { $place      	    = $this->input->post('place'); }
			$data['place']          = $place;
			
			if($title){ $type      = $title; } 
			else { $type      	    = $this->input->post('type'); }
			$data['type']          = $type;

			//if($title){ $create_date= $title; } 
			//else { $create_date     = $this->input->post('create_date'); }
			//$data['create_date']    = $create_date;

			
			$config["base_url"] 	= base_url() . "admin/list-reg/searchs/$a,$b,$c,$d,$e";
			$config["result"] 		= $this->Reg_model->reg_countsearch($name,$email,$phone,$place,$type);
			$config["total_rows"] 	= count($config["result"]);
			$config["per_page"] 	= 20;
			$config["uri_segment"] 	= 5;
			$this->pagination->initialize($config);
			$page 				= ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$data["results"] 	= $this->Reg_model->get_regsearch($config["per_page"],$page,$name,$email,$phone,$place,$type);
			$data["links"] 		= $this->pagination->create_links();
		}
		$this->load->view('admin/list-reg', $data);
	}

}

	
	