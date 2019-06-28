<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agreement extends CI_Controller {

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
				$this->load->model('Agreement_model');
				$this->load->model('Reg_model');
				$this->load->library('UserAuth');
				$this->load->library('pagination');
				$this->userauth->is_logged_in_admin();
   
     }

    
     public function list_agreement ($action= NULL, $id= NULL ) 
     {
     	 $data['titles'] = ' List Agreement Details';
		 $data['adddiv'] = 'none';
		 $data['srdiv'] = 'none'; 


		    

          if($action=='agr_status')
		  {
		 
				
				$this->Agreement_model->change_active($uagr_id,$agr_status);
				$this->session->set_flashdata('success_msg','Agreement  status updated successfully.');
				redirect('admin/list-agreement');
			
		 }

         

		 if ( ! file_exists('application/views/admin/list-agreement.php' ) )
          {
            show_404();
          }

        else
        {
			    $config["base_url"] = base_url() . "admin/list-agreement";
				$config["total_rows"] = $this->Agreement_model->agree_count();
				$config["per_page"] = 20;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["results"] = $this->Agreement_model->get_agree($config["per_page"],$page);
				$data["links"] = $this->pagination->create_links();
				$data["users"]      = $this->Agreement_model->get_uname();

				$this->load->view('admin/list-agreement',$data);
			 
		 }		

     }

    public function searchs($action = NULL,$title= NULL,$per_page = NULL)
	{
	//print_r($usertype);
	 $data['adddiv'] = 'none';
	 $data['srdiv'] = 'block'; 
		
	  if($action=='searchs')	
		{

			$data['titles'] 	= ucfirst($action).'Web Links'; 
			$data['btnactions'] = 'search';
			$data['adddiv'] 	= 'none';
			$data['srdiv'] 		= 'block';

			// if($title){ $agr_title  = $title; } 
			// else { $agr_title      	= $this->input->post('agr_title'); }
			// $data['agr_title'] 		= $agr_title;
			
			// if($title){ $user_id   = $title; } 
			// else { $user_id       	= $this->input->post('user_id'); }
			// $data['user_id'] 		= $user_id;

			$agr_title      		= $this->input->post('agr_title');
			$user_id       			= $this->input->post('user_id');
			$data['agr_title'] 		= $agr_title;
			$data['user_id'] 		= $user_id;
			
			
			$config["base_url"] 	= base_url() . "admin/list-agreement/searchs/$a,$b";
			$config["result"] 		= $this->Agreement_model->agree_countsearch($agr_title,$user_id);
			$config["total_rows"] 	= count($config["result"]);
			$config["per_page"] 	= 20;
			$config["uri_segment"] 	= 5;
			$this->pagination->initialize($config);
			$page 				= ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$data["results"] 	= $this->Agreement_model->get_agreesearch($config["per_page"],$page,$agr_title,$user_id);
			$data["links"] 		= $this->pagination->create_links();
			$data["users"]      = $this->Agreement_model->get_uname();

			$data["us_id"]	 	= $user_id;
		}

		$this->load->view('admin/list-agreement', $data);
	}
}

	
	