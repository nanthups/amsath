<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

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
				$this->load->model('Brand_model');
				$this->load->library('UserAuth');
				$this->load->library('pagination');
				$this->userauth->is_logged_in_admin();
   
     }

	
	public function add_brand($action= NULL,$id= NULL,$main_img= NULL)
		{ 
	 		
	     $data['titles']    = 'Add Brand';
		 $data['adddiv']    = 'none';
		 $data['srdiv']     = 'none';
		 $data['show_home'] = 'yes';  

      if($action=='add')	
		{
	        
    	$data['btnaction'] = 'add';

	 	$this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
	 	

		if($this->Brand_model->chk_bar() === false)
	 	{
			$data['error_msg']  = 'Brand Already Exists.';
			$data['brand_name'] =  $this->input->post('brand_name');
			$this->session->set_flashdata('error_msg', 'Brand Already Exists');

	 	}

	if($this->form_validation->run() === TRUE && $this->Brand_model->chk_bar() === true)
	{
			        $this->Brand_model->set_bar();
					$this->session->set_flashdata('success_msg1', 'Brand  Add Successfully');

				    redirect('admin/list-brand');


			}
		}

		

			if($action=="edit")
			{

			$data['btnaction'] = 'edit';
			$data['titles']    = 'Edit Brands';
			$data['adddiv']    = 'block';
			$data['srdiv'] 	   = 'none';
			

			$this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
			
			$arr_fields         = $this->Brand_model->get_row('brand','*',array('id'=>$id));
			$data['id']         = $arr_fields->id;
			$data['brand_name'] = $arr_fields->brand_name;
			


			if($this->form_validation->run() === TRUE)
				{
				 	$id 		    = $this->input->post('id');
					$brand_name     = $this->input->post('brand_name');
					

					if($this->Brand_model->chk_bar() === false)
			 		{
					
					 $data['error_msg'] = 'Brand Already Exists.';
					 $arr_fields 		= $this->Brand_model->get_row('brand','*',array('id'=>$id));
					 $data['id'] 		= $arr_fields->id;
					 $data['brand_name']= $arr_fields->brand_name;
				   	}
				   else
				   {

				   $data= array('id'=>$id,'brand_name'=>$brand_name);

				$this->Brand_model->update_bar($id,$data);
				$this->session->set_flashdata('success_msg1','Brand updated successfully.');

				redirect('admin/list-brand');
					}
				}
		        }
          $this->load->view('admin/add-brand',$data);
	
     }

	
	public function list_brand($action= NULL, $id= NULL ) 
		{
			 $data['titles'] = 'List Brands';
			 $data['adddiv'] = 'none';
		 	 $data['srdiv']  = 'none'; 

		 if($action=='delete')
		 {
		
				
				$this->Brand_model->delete_bar($id);
				$this->session->set_flashdata('success_msg','Brands deleted successfully.');
				redirect('admin/list-brand');
			 
		 }
      if ( ! file_exists('application/views/admin/list-brand.php'))
          {
            show_404();
          }

        else
        {
			    $config["base_url"]   = base_url() . "admin/list-brand";
				$config["total_rows"] = $this->Brand_model->bar_count();
				$config["per_page"]   = 20;
				$config["uri_segment"]= 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["results"] = $this->Brand_model->get_bar($config["per_page"],$page);
				$data["links"] = $this->pagination->create_links();
				
				
				$this->load->view('admin/list-brand', $data);
			 
		 }		

     }


     public function searchs($action = NULL,$title= NULL,$per_page = NULL)
	 {
	//print_r($usertype);
	 $data['adddiv'] = 'none';
	 $data['srdiv'] = 'block'; 
		
	  if($action=='searchs')	
		{
			$data['titles']     = ucfirst($action).'Brands'; 
			$data['btnactions'] = 'search';
			$data['adddiv']     = 'none';
			$data['srdiv']      = 'block';

			if($title){ $brand_name = $title; } 
			else { $brand_name 		= $this->input->post('brand_name'); }
			$data['brand_name']     = $brand_name;

			$config["base_url"] 	= base_url() . "admin/list-brand/searchs/$a";
			$config["result"] 		= $this->Brand_model->bar_countsearch($brand_name);
			$config["total_rows"] 	= count($config["result"]);
			$config["per_page"] 	= 20;
			$config["uri_segment"] 	= 5;
			$this->pagination->initialize($config);
			$page 				= ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$data["results"] 	=  $this->Brand_model->get_barsearch($config["per_page"],$page,$brand_name);
			$data["links"] 		= $this->pagination->create_links();
		}
		$this->load->view('admin/list-brand', $data);
	}

	}
	
























                  