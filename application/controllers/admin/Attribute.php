<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attribute extends CI_Controller {

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
				$this->load->model('Attribute_model');
				$this->load->library('UserAuth');
				$this->load->library('pagination');
				$this->userauth->is_logged_in_admin();
   
     }

     public function add_attribute ($action = NULL,$id = NULL)

     {
     	$data['titiles'] = 'Add Attributes';
     	$data['adddiv'] = 'none';
		$data['srdiv'] 	= 'none';
		$data['status'] = 'active';

	 if($action=='add'){

      $data['btnaction'] = 'add';
      $this->form_validation->set_rules('name', 'Attributes', 'required');
      $this->form_validation->set_rules('status', 'Status', 'required');

       if($this->Attribute_model->chk_att() === false)
	 	 {
			$data['error_msg'] = 'Attribute Already Exists.';
			$data['name'] =  $this->input->post('name');
			$this->session->set_flashdata('error_msg', 'Attributes Already Exists');

	 	 }

	 	 if($this->form_validation->run() === TRUE && $this->Attribute_model->chk_att() === true)
				{
					$this->Attribute_model->set_att();
					$this->session->set_flashdata('success_msg1', 'Attribute Added Successfully');

					redirect('admin/list-attribute');
				}


	 }

	  if($action=='edit')  
	  {
             $data['btnaction'] = 'edit';
			 $data['titles'] 	= 'Edit Attributes';
			 $data['adddiv'] 	= 'block';
			 $data['srdiv'] 	= 'none';

			 $this->form_validation->set_rules('name', 'Attributes', 'required');
			 $this->form_validation->set_rules('status', 'Status', 'required');
			 $arr_fields = $this->Attribute_model->get_row('attributes','*',array('id'=>$id));
			 $data['id'] = $arr_fields->id;
			 $data['name'] = $arr_fields->name;
			 $data['status'] = $arr_fields->status;

			 if($this->form_validation->run() === TRUE)
				{
				 	$id 		= $this->input->post('id');
					$name 	    = $this->input->post('name');
					$status     = $this->input->post('status');
					if($this->Attribute_model->chk_att() === false)
			 		{
					
						 $data['error_msg'] = 'Attribute Already Exists.';
						 $arr_fields 		= $this->Attribute_model->get_row('attributes','*',array('id'=>$id));
						 $data['id'] 		= $arr_fields->id;
						 $data['name']    	= $arr_fields->name;
				   	}
				   else
				   {

						$data 	 = array('id'=>$id,'name'=>$name ,'status'=>$status);
						$this->Attribute_model->update_att($id,$data);
						$this->session->set_flashdata('success_msg1','Attribute updated successfully.');

						redirect('admin/list-attribute');
					}
				}
		       
	  }
          $this->load->view('admin/add-attribute',$data);
	
     }

     public function list_attribute ($action= NULL, $id= NULL ) 
     {
     	 $data['titles'] = ' List Attribute';
		 $data['adddiv'] = 'none';
		 $data['srdiv'] = 'none'; 


		 if($action=='delete')
		 {
		
				
				$this->Attribute_model->delete_att($id);
				$this->session->set_flashdata('success_msg','Attribute deleted successfully.');
				redirect('admin/list-attribute');
			 
		 }

		 if($action=='status')
		 {
		 
				
				$this->Attribute_model->change_active($id,$status);
				$this->session->set_flashdata('success_msg',' status updated successfully.');
				redirect('admin/add-attribute');
			
		 }

		 if ( ! file_exists('application/views/admin/list-attribute.php' ) )
          {
            show_404();
          }

        else
        {
			    $config["base_url"] = base_url() . "admin/list-attribute";
				$config["total_rows"] = $this->Attribute_model->att_count();
				$config["per_page"] = 20;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["results"] = $this->Attribute_model->get_att($config["per_page"],$page);
				$data["links"] = $this->pagination->create_links();
				
				
				$this->load->view('admin/list-attribute', $data);
			 
		 }		

     }

    public function searchs($action = NULL,$title= NULL,$per_page = NULL)
	{
	//print_r($usertype);
	 $data['adddiv'] = 'none';
	 $data['srdiv'] = 'block'; 
		
	  if($action=='searchs')	
		{
			$data['titles'] = ucfirst($action).'Attributes'; 
			$data['btnactions'] = 'search';
			$data['adddiv'] = 'none';
			$data['srdiv'] = 'block';

			if($title){ $name 	    = $title; } 
			else { $name 		    = $this->input->post('name'); }
			$data['name'] 		    = $name;

			$config["base_url"] 	= base_url() . "admin/list-attribute/searchs/$a";
			$config["result"] 		= $this->Attribute_model->att_countsearch($name);
			$config["total_rows"] 	= count($config["result"]);
			$config["per_page"] 	= 20;
			$config["uri_segment"] 	= 5;
			$this->pagination->initialize($config);
			$page 				= ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$data["results"] 	= $this->Attribute_model->get_attsearch($config["per_page"],$page,$name);
			$data["links"] 		= $this->pagination->create_links();
		}
		$this->load->view('admin/list-attribute', $data);
	}

}

	
	