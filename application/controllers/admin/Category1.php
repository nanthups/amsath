<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category1 extends CI_Controller {

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
				$this->load->model('Category1_model');
				$this->load->library('UserAuth');
				$this->load->library('pagination');
				$this->userauth->is_logged_in_admin();
   
     }

     public function add_category1 ($action = NULL,$id = NULL)

     {
     	$data['titiles']   = 'Add Category Level 1';
     	$data['adddiv']    = 'none';
		$data['srdiv'] 	   = 'none';
		$data['status']    = 'active';

	 if($action=='add'){

      $data['btnaction'] = 'add';
      $this->form_validation->set_rules('category', 'Category1', 'required');
      $this->form_validation->set_rules('status', 'Status', 'required');


       if($this->Category1_model->chk_cat1() === false)
	 	 {
			$data['error_msg'] = 'Category Name Already Exists.';
			$data['category'] =  $this->input->post('category');
			$this->session->set_flashdata('error_msg', 'Category Name Already Exists');

	 	 }

	 	 if($this->form_validation->run() === TRUE && $this->Category1_model->chk_cat1() === true)
				{
					$this->Category1_model->set_cat1();
					$this->session->set_flashdata('success_msg1', 'Category  Added Successfully');

					redirect('admin/list-category1');
				}


	 }

	  if($action=='edit')  
	  {
             $data['btnaction'] = 'edit';
			 $data['titles'] 	= 'Edit Category';
			 $data['adddiv'] 	= 'block';
			 $data['srdiv'] 	= 'none';

			  $this->form_validation->set_rules('category', 'Category1', 'required');
		      $this->form_validation->set_rules('status', 'Status', 'required');

			 $arr_fields              = $this->Category1_model->get_row('category1','*',array('id'=>$id));



			 $data['id']              = $arr_fields->id;
			 $data['category']        = $arr_fields->category;
			 $data['status']          = $arr_fields->status;

			 if($this->form_validation->run() === TRUE)
				{
				 	$id 		    = $this->input->post('id');
					$category 	    = $this->input->post('category');
					$status         = $this->input->post('status');

					if($this->Category1_model->chk_cat1() === false)
			 		{
					
					 $data['error_msg'] = 'Category Already Exists.';
					 $arr_fields 		= $this->Category1_model->get_row('category1','*',array('id'=>$id));
					 $data['id'] 		= $arr_fields->id;
					 $data['category']  = $arr_fields->category;
				   	}
				   else
				   {

				   $data= array('id'=>$id,'category'=>$category,'status'=>$status);

				$this->Category1_model->update_cat1($id,$data);
				$this->session->set_flashdata('success_msg1','Category updated successfully.');

				redirect('admin/list-category1');
					}
				}
		       
	  }
          $this->load->view('admin/add-category1',$data);
	
     }

     public function list_category1 ($action= NULL, $id= NULL ) 
     {
     	 $data['titles'] = ' List Category';
		 $data['adddiv'] = 'none';
		 $data['srdiv'] = 'none'; 


		 if($action=='delete')
		 {
		
				
				$this->Category1_model->delete_cat1($id);
				$this->session->set_flashdata('success_msg','Category deleted successfully.');
				redirect('admin/list-category1');
			 
		 }

		

		 if ( ! file_exists('application/views/admin/list-category1.php' ) )
          {
            show_404();
          }

        else
        {
			    $config["base_url"] = base_url() . "admin/list-category1";
				$config["total_rows"] = $this->Category1_model->cat1_count();
				$config["per_page"] = 20;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["results"] = $this->Category1_model->get_cat1($config["per_page"],$page);
				$data["links"] = $this->pagination->create_links();
				
				
				$this->load->view('admin/list-category1', $data);
			 
		 }		

     }

    public function searchs($action = NULL,$title= NULL,$per_page = NULL)
	{
	//print_r($usertype);
	 $data['adddiv'] = 'none';
	 $data['srdiv'] = 'block'; 
		
	  if($action=='searchs')	
		{
			$data['titles'] = ucfirst($action).'Category'; 
			$data['btnactions'] = 'search';
			$data['adddiv'] = 'none';
			$data['srdiv'] = 'block';

			if($title){ $category   = $title; } 
			else { $category  	    = $this->input->post('category'); }
			$data['category'] 		= $category;

			$config["base_url"] 	= base_url() . "admin/list-category1/searchs/$a";
			$config["result"] 		= $this->Category1_model->cat1_countsearch($category);
			$config["total_rows"] 	= count($config["result"]);
			$config["per_page"] 	= 20;
			$config["uri_segment"] 	= 5;
			$this->pagination->initialize($config);
			$page 				= ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$data["results"] 	= $this->Category1_model->get_cat1search($config["per_page"],$page,$category);
			$data["links"] 		= $this->pagination->create_links();
		}
		$this->load->view('admin/list-category1', $data);
	}

}

	
	