<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

		public function __construct()
    		{
                parent::__construct();
				$this->load->database();
				$this->load->library('session');
       			$this->load->helper('url');
			    $this->load->helper('form');
				$this->load->library('form_validation');
				$this->load->library('password');
				$this->load->model('Category_model');
				$this->load->library('userauth');
				$this->load->library('pagination');
				$this->userauth->is_logged_in_admin();
   
     }

	public function add_category($action = NULL,$id = NULL) 
	{

         
		 $data['titles'] = 'Add Category';
		 $data['adddiv'] = 'none';
		 $data['srdiv'] = 'none'; 


		if($action=='add')	
		{
	        
	        	$data['btnaction'] = 'add';

			 	$this->form_validation->set_rules('cat_name', 'Category', 'required');
		
				if($this->Category_model->chk_cat() === false)
			 	{
					$data['error_msg'] = 'Category Already Exists.';
					$data['cat_name'] =  $this->input->post('cat_name');
					$this->session->set_flashdata('error_msg', 'Category Already Exists');
		
			 	}

				if($this->form_validation->run() === TRUE && $this->Category_model->chk_cat() === true)
				{
					$this->Category_model->set_cat();
					$this->session->set_flashdata('success_msg1', 'Category Added Successfully');

					redirect('admin/list-category');
				}
	
		  }


		if($action=="edit")
		{
			 $data['btnaction'] = 'edit';
			 $data['titles'] 	= 'Edit Pages';
			 $data['adddiv'] 	= 'block';
			 $data['srdiv'] 	= 'none';
			
			 $this->form_validation->set_rules('cat_name', 'Category', 'required');
			 $arr_fields = $this->Category_model->get_row('category','*',array('id'=>$id));
			 $data['id'] = $arr_fields->id;
			 $data['cat_name'] = $arr_fields->cat_name;
		       
			 if($this->form_validation->run() === TRUE)
				{
				 	$id 		= $this->input->post('id');
					$cat_name 	= $this->input->post('cat_name');
					if($this->Category_model->chk_cat() === false)
			 		{
					
						 $data['error_msg'] = 'Category Already Exists.';
						 $arr_fields 		= $this->Category_model->get_row('category','*',array('id'=>$id));
						 $data['id'] 		= $arr_fields->id;
						 $data['cat_name'] 	= $arr_fields->cat_name;
				   	}
				   else
				   {

						$data 	 = array('id'=>$id,'cat_name'=>$cat_name);
						$this->Category_model->update_cat($id,$data);
						$this->session->set_flashdata('success_msg1','Category updated successfully.');

						redirect('admin/list-category');
					}
				}
		   }
		   $this->load->view('admin/add-category',$data);
		}

   public function list_category($action= NULL, $id= NULL ) 
	   {

         
		 $data['titles'] = ' List Category';
		 $data['adddiv'] = 'none';
		 $data['srdiv'] = 'none'; 
	    
	   if($action=='delete')
		 {
		
				
				$this->Category_model->delete_cat($id);
				$this->session->set_flashdata('success_msg','Category deleted successfully.');
				redirect('admin/list-category');
			 
		 }
	  
		if ( ! file_exists('application/views/admin/list-category.php' ) )
          {
            show_404();
          }
        else
        {
		
				
				$config["base_url"] = base_url() . "admin/list-category";
				$config["total_rows"] = $this->Category_model->cat_count();
				$config["per_page"] = 20;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["results"] = $this->Category_model->get_cat($config["per_page"],$page);
				$data["links"] = $this->pagination->create_links();
				
				
				$this->load->view('admin/list-category', $data);
			 
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

			if($title){ $cat_name 	= $title; } 
			else { $cat_name 		= $this->input->post('cat_name'); }
			$data['cat_name'] 		= $cat_name;

			$config["base_url"] 	= base_url() . "admin/list-category/searchs/$a";
			$config["result"] 		= $this->Category_model->cat_countsearch($cat_name);
			$config["total_rows"] 	= count($config["result"]);
			$config["per_page"] 	= 20;
			$config["uri_segment"] 	= 5;
			$this->pagination->initialize($config);
			$page 				= ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$data["results"] 	= $this->Category_model->get_catsearch($config["per_page"],$page,$cat_name);
			$data["links"] 		= $this->pagination->create_links();
		}
		$this->load->view('admin/list-category', $data);
	}
}