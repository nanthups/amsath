<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vmsg extends CI_Controller {

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
				$this->load->model('Vmsg_model');
				$this->load->model('Reg_model');
				$this->load->library('UserAuth');
				$this->load->library('pagination');
				$this->userauth->is_logged_in_admin();
   
     }

    
     public function list_vmsg ($action= NULL, $id= NULL ) 
     {
     	 $data['titles'] = ' List User Msg';
		 $data['adddiv'] = 'none';
		 $data['srdiv'] = 'none'; 


		    


		 if ( ! file_exists('application/views/admin/list-vmsg.php' ) )
          {
            show_404();
          }

        else
        {
			    $config["base_url"] = base_url() . "admin/list-vmsg";
				$config["total_rows"] = $this->Vmsg_model->vmsg_count();
				$config["per_page"] = 20;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["results"] = $this->Vmsg_model->get_vmsg($config["per_page"],$page);
				$data["links"] = $this->pagination->create_links();
				$data["users"]      = $this->Vmsg_model->get_uname();

				$this->load->view('admin/list-vmsg',$data);
			 
		 }		

     }

    public function searchs($action = NULL,$title= NULL,$per_page = NULL)
	{
	//print_r($usertype);
	 $data['adddiv'] = 'none';
	 $data['srdiv'] = 'block'; 
		
	  if($action=='searchs')	
		{

			$data['titles'] 	= ucfirst($action).'Msg'; 
			$data['btnactions'] = 'search';
			$data['adddiv'] 	= 'none';
			$data['srdiv'] 		= 'block';

			// if($title){ $agr_title  = $title; } 
			// else { $agr_title      	= $this->input->post('agr_title'); }
			// $data['agr_title'] 		= $agr_title;
			
			// if($title){ $user_id   = $title; } 
			// else { $user_id       	= $this->input->post('user_id'); }
			// $data['user_id'] 		= $user_id;

			$vst_name      		    = $this->input->post('vst_name');
			$user_id       			= $this->input->post('user_id');
			$vst_mail       		= $this->input->post('vst_mail');
			$data['vst_name'] 		= $vst_name;
			$data['user_id'] 		= $user_id;
			$data['vst_mail'] 		= $vst_mail;
			
			
			$config["base_url"] 	= base_url() . "admin/list-vmsg/searchs/$a,$b,$c";
			$config["result"] 		= $this->Vmsg_model->vmsg_countsearch($vst_name,$user_id,$vst_mail);
			$config["total_rows"] 	= count($config["result"]);
			$config["per_page"] 	= 20;
			$config["uri_segment"] 	= 5;
			$this->pagination->initialize($config);
			$page 				= ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$data["results"] 	= $this->Vmsg_model->get_vmsgsearch($config["per_page"],$page,$vst_name,$user_id,$vst_mail);
			$data["links"] 		= $this->pagination->create_links();
			$data["users"]      = $this->Vmsg_model->get_uname();

			$data["us_id"]	 	= $user_id;
		}

		$this->load->view('admin/list-vmsg', $data);
	}
}

	
	