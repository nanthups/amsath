<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Values extends CI_Controller 
{

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
				$this->load->model('Values_model');
				$this->load->model('Attribute_model');
				$this->load->library('UserAuth');
				$this->load->library('pagination');
				$this->userauth->is_logged_in_admin();
   
     }
     public function add_values ($action = NULL,$id = NULL)
     {
        $data['titiles'] = 'Add Attributes Values';
     	$data['adddiv'] = 'none';
		$data['srdiv'] = 'none'; 

		if($action=='add')
		{

		$data['btnaction'] = 'add';
		
	    $this->form_validation->set_rules('attr_name', 'Attributes ', 'required');
        $this->form_validation->set_rules('attr_val', 'Attributes Values', 'required');

        if($this->Values_model->chk_val() === false)
	 	 {
			$data['error_msg'] = 'Attribute Values Already Exists.';
			$data['attr_val'] =  $this->input->post('attr_val');
			$this->session->set_flashdata('error_msg', 'Attributes Values Already Exists');

	 	 }


        if($this->form_validation->run() === TRUE && $this->Values_model->chk_val() === true)
		{
			$this->Values_model->set_val();
			$this->session->set_flashdata('success_msg1', 'Attribute Values  Added Successfully');

			redirect('admin/list-attribute-values');
		}




       }

    if($action=='edit')  
      {

         $data['btnaction'] = 'edit';
		 $data['titles'] 	= 'Edit Attribute Value';
		 $data['adddiv'] 	= 'block';
		 $data['srdiv'] 	= 'none';

		 $this->form_validation->set_rules('attr_name', 'Attributes ', 'required');
         $this->form_validation->set_rules('attr_val', 'Attributes Values', 'required');
		 $arr_fields = $this->Values_model->get_row('attributes_values','*',array('id'=>$id));
		 $data['id'] = $arr_fields->id;
		 $data['attr_name'] = $arr_fields->attr_name;
		 $data['attr_val'] = $arr_fields->attr_val;


		 if($this->form_validation->run() === TRUE)
		{
		 	$id 		= $this->input->post('id');
			$attr_name 	= $this->input->post('attr_name');
			$attr_val   = $this->input->post('attr_val');
			if($this->Values_model->chk_val() === false)
	 		{
			
				 $data['error_msg'] = 'Attribute value Already Exists.';
				 $arr_fields 		= $this->Values_model->get_row('attributes_values','*',array('id'=>$id));
				 $data['id'] 		= $arr_fields->id;
				 $data['attr_name']   = $arr_fields->attr_name;
		         $data['attr_val']  = $arr_fields->attr_val;
		   	}
		   else
		   {

				$data 	 = array('id'=>$id,'attr_name'=>$attr_name ,'attr_val'=>$attr_val);
				$this->Values_model->update_val($id,$data);
				$this->session->set_flashdata('success_msg1','Attribute Value updated successfully.');

				redirect('admin/list-attribute-values');
			}
				

		}
		       
	  }

          $att_cnt         = $this->Attribute_model->att_count();
          $att_arr         = $this->Attribute_model->get_fullattr();
          $data['att']     = $att_arr;
	  	  $data['att_cnt'] = $att_cnt;
          $this->load->view('admin/add-attribute-values',$data);


     }


public function list_Values ($action= NULL, $id= NULL ) 
     {
     	 $data['titles'] = ' List Attribute Values';
		 $data['adddiv'] = 'none';
		 $data['srdiv'] = 'none'; 

		 if($action=='delete')
		 {
		
				
				$this->Values_model->delete_val($id);
				$this->session->set_flashdata('success_msg','Attribute Values  deleted successfully.');
				redirect('admin/list-attribute-values');
			 
		 }

		 if ( ! file_exists('application/views/admin/list-attribute-values.php' ) )
          {
            show_404();
          }
          else
           {
			    $config["base_url"] = base_url() . "admin/list-attribute-values";
				$config["total_rows"] = $this->Values_model->val_count();
				$config["per_page"] = 20;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["results"] = $this->Values_model->get_val($config["per_page"],$page);
				$data["links"] = $this->pagination->create_links();
				
				
				$this->load->view('admin/list-attribute-values', $data);
			 
		 }		

	}
	
	
  public function searchs($action = NULL,$title= NULL,$per_page = NULL)
	{
	//print_r($usertype);
	 $data['adddiv'] = 'none';
	 $data['srdiv'] = 'block'; 
		
	  if($action=='searchs')	
		{
			$data['titles'] = ucfirst($action).'Attributes values'; 
			$data['btnactions'] = 'search';
			$data['adddiv'] = 'none';
			$data['srdiv'] = 'block';

			if($title){ $attr_val 	    = $title; } 
			else { $attr_val 		    = $this->input->post('attr_val'); }
			$data['attr_val'] 		    = $attr_val;

			$config["base_url"] 	= base_url() . "admin/list-attribute-values/searchs/$a";
			$config["result"] 		= $this->Values_model->val_countsearch($attr_val);
			$config["total_rows"] 	= count($config["result"]);
			$config["per_page"] 	= 20;
			$config["uri_segment"] 	= 5;
			$this->pagination->initialize($config);
			$page 				= ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$data["results"] 	= $this->Values_model->get_valsearch($config["per_page"],$page,$attr_val);
			$data["links"] 		= $this->pagination->create_links();
		}
		$this->load->view('admin/list-attribute-values', $data);
	}

    public function get_faq_data() 
    {
    $this->load->model("Values_model");
    $name = $_POST['name'];
    $data["results"] = $this->Values_model->did_get_faq_data($name);
    echo json_encode($data["results"]);
    }

	}





