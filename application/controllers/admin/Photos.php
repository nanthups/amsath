<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photos extends CI_Controller {

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
				$this->load->model('Photos_model');
				$this->load->model('Reg_model');
				$this->load->model('CommonModel');
				$this->load->library('UserAuth');
				$this->load->library('pagination');
				$this->userauth->is_logged_in_admin();
   
     }

    
     public function list_photos ($action= NULL, $id= NULL ) 
     {
     	 $data['titles'] = ' List Photos Details';
		 $data['adddiv'] = 'none';
		 $data['srdiv'] = 'none'; 
		 
		  if($action=='delete')
		 {
		
				
				$this->Photos_model->delete_photos($id);
				$this->session->set_flashdata('success_msg','Photos deleted successfully.');
				redirect('admin/list-photos');
			 
		 }




		 if ( ! file_exists('application/views/admin/list-photos.php' ) )
          {
            show_404();
          }

        else
        {
			    $config["base_url"] = base_url() . "admin/list-photos";
				$config["total_rows"] = $this->Photos_model->photos_count();
				$config["per_page"] = 20;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["results"] = $this->Photos_model->get_photos($config["per_page"],$page);
				$data["links"] = $this->pagination->create_links();
				$data["users"]      = $this->Photos_model->get_uname();
				$data["cate"]      = $this->Photos_model->get_catname();

				$this->load->view('admin/list-photos',$data);
			 
		 }		

     }

    public function searchs($action = NULL,$title= NULL,$per_page = NULL)
	{
	//print_r($usertype);
	 $data['adddiv'] = 'none';
	 $data['srdiv'] = 'block'; 
		
	  if($action=='searchs')	
		{

			$data['titles'] 	= ucfirst($action).'Photos'; 
			$data['btnactions'] = 'search';
			$data['adddiv'] 	= 'none';
			$data['srdiv'] 		= 'block';

			$user_id       			= $this->input->post('user_id');
			$category        	    = $this->input->post('category');
			
			$data['user_id'] 		= $user_id;
			$data['category'] 		= $category;
			
			
			$config["base_url"] 	= base_url() . "admin/list-photos/searchs/$a,$b";
			$config["result"] 		= $this->Photos_model->photos_countsearch($user_id,$category);
			$config["total_rows"] 	= count($config["result"]);
			$config["per_page"] 	= 20;
			$config["uri_segment"] 	= 5;
			$this->pagination->initialize($config);
			$page 				= ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$data["results"] 	= $this->Photos_model->get_photossearch($config["per_page"],$page,$user_id,$category);
			$data["links"] 		= $this->pagination->create_links();
			$data["users"]      = $this->Photos_model->get_uname();
			$data["cate"]       = $this->Photos_model->get_catname();

			$data["us_id"]	 	= $user_id;
			$data["ca_id"]	 	= $category;
		}

		$this->load->view('admin/list-photos', $data);
	}
}

	
	