<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Specifications extends CI_Controller {

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
				$this->load->model('Product_model');
				$this->load->model('Specification_model');
				$this->load->library('UserAuth');
				$this->load->library('pagination');
				$this->userauth->is_logged_in_admin();
   
     }

     public function add_specifications ($action = NULL,$id = NULL)
     {

     	$data['titiles']   = 'Add Specifications';
     	$data['adddiv']    = 'none';
		$data['srdiv'] 	   = 'none';
		$data['status']    = 'active';

	 if($action=='add'){

      $data['btnaction'] = 'add';
      $this->form_validation->set_rules('prod_id', 'prod_id', 'required');
      
	 	 if($this->form_validation->run() === TRUE && $this->Specification_model->chk_spec() === true)
				{
					$this->Specification_model->set_spec();
					$this->session->set_flashdata('success_msg1', 'Specifications  Added Successfully');

					redirect('admin/list-specifications');
				}


	 }

	  if($action=='edit')  
	  {
             $data['btnaction'] = 'edit';
			 $data['titles'] 	= 'Edit Specifications';
			 $data['adddiv'] 	= 'block';
			 $data['srdiv'] 	= 'none';

			  $this->form_validation->set_rules('prod_id', 'prod_id', 'required');


			 $arr_fields              = $this->Specification_model->get_row('specifications','*',array('id'=>$id));
			 $data['id']              = $arr_fields->id;
			 $data['prod_id']         = $arr_fields->prod_id;
			 $data['sleeve_styling']  = $arr_fields->sleeve_styling;
			 $data['multipack_set']   = $arr_fields->multipack_set;
			 $data['occasion']        = $arr_fields->occasion;
			 $data['print_pattern_type']= $arr_fields->print_pattern_type;
			 $data['neck']           = $arr_fields->neck;
			 $data['pattern']        = $arr_fields->pattern;
			 $data['sleeve_length']  = $arr_fields->sleeve_length;
			 $data['wash_care']      = $arr_fields->wash_care;
			 $data['fit']            = $arr_fields->fit;
			 $data['length']         = $arr_fields->length;
			 $data['fabric']         = $arr_fields->fabric;

			 if($this->form_validation->run() === TRUE)
				{
				 	$id 		    = $this->input->post('id');
					$prod_id 	    = $this->input->post('prod_id');
					$sleeve_styling = $this->input->post('sleeve_styling');
					$multipack_set  = $this->input->post('multipack_set');
					$occasion       = $this->input->post('occasion');
					$print_pattern_type = $this->input->post('print_pattern_type');
					$neck          = $this->input->post('neck');
					$pattern       = $this->input->post('pattern');
					$sleeve_length = $this->input->post('sleeve_length');
					$wash_care     = $this->input->post('wash_care');
					$fit           = $this->input->post('fit');
					$length        = $this->input->post('length');
					$fabric        = $this->input->post('fabric');

					if($this->Specification_model->chk_spec() === false)
			 		{
					
				      //$data['error_msg'] = 'Category Already Exists.';
					 //$arr_fields 		= $this->Specification_model->get_row('specifications','*',array('id'=>$id));
					 //$data['id'] 		= $arr_fields->id;
					 //$data['category2'] = $arr_fields->category2;
				   	}
				   else
				   {

				   $data= array('id'=>$id,'prod_id'=>$prod_id,'sleeve_styling'=>$sleeve_styling,'multipack_set'=>$multipack_set,'occasion'=>$occasion,'print_pattern_type'=>$print_pattern_type,'neck'=>$neck,'pattern'=>$pattern,'sleeve_length'=>$sleeve_length,'wash_care'=>$wash_care,'fit'=>$fit,'length'=>$length,'fabric'=>$fabric);

				$this->Specification_model->update_spec($id,$data);
				$this->session->set_flashdata('success_msg1','Specifications updated successfully.');

				redirect('admin/list-specifications');
					}
				}
		       
	  }
          
	  	  
	
     }
	 

     


     public function list_specifications ($action= NULL, $id= NULL ) 
     {

     	 $data['titles'] = ' List Specifications';
		 $data['adddiv'] = 'none';
		 $data['srdiv']  = 'none'; 

		 if($action=='delete')
		 {
		
				$this->Specification_model->delete_spec($id);
				$this->session->set_flashdata('success_msg','Specifications deleted successfully.');
				redirect('admin/list-specifications');
			 
		 }


        

		 if ( ! file_exists('application/views/admin/list-specifications.php' ) )
          {
            show_404();
          }

        else
        {

			    $config["base_url"] = base_url() . "admin/list-specifications";
				$config["total_rows"] = $this->Specification_model->spec_count();
				$config["per_page"] = 20;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["results"] = $this->Specification_model->get_spec($config["per_page"],$page);
				$data["links"] = $this->pagination->create_links();
				
				
				$this->load->view('admin/list-specifications', $data);
			 
		 }		

     }

    public function searchs($action = NULL,$title= NULL,$per_page = NULL)
	{
	//print_r($usertype);
	 $data['adddiv'] = 'none';
	 $data['srdiv'] = 'block'; 
		
	  if($action=='searchs')	
		{
			$data['titles'] = ucfirst($action).'specifications'; 
			$data['btnactions'] = 'search';
			$data['adddiv'] = 'none';
			$data['srdiv'] = 'block';


			

			if($title){ $prod_id    = $title; } 
			else { $prod_id    	    = $this->input->post('prod_id'); }
			$data['prod_id'] 		= $prod_id;


			$config["base_url"] 	= base_url() . "admin/list-specifications/searchs/$a";
			$config["result"] 		= $this->Specification_model->spec_countsearch($prod_id);
			$config["total_rows"] 	= count($config["result"]);
			$config["per_page"] 	= 20;
			$config["uri_segment"] 	= 5;
			$this->pagination->initialize($config);
			$page 				= ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$data["results"] 	= $this->Specification_model->get_specsearch($config["per_page"],$page,$prod_id);
			$data["links"] 		= $this->pagination->create_links();
		}
		$this->load->view('admin/list-specifications', $data);
	}

	 

}

	
	