<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Words extends CI_Controller {

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
				$this->load->model('Words_model');
				$this->load->library('UserAuth');
				$this->load->library('pagination');
				$this->userauth->is_logged_in_admin();
   
     }

	
	public function add_words($action= NULL,$id= NULL,$main_img= NULL)
		{ 
	 		
	     $data['titles']    = 'Add Words';
		 $data['adddiv']    = 'none';
		 $data['srdiv']     = 'none';
		 $data['show_home'] = 'yes';  

      if($action=='add')	
		{
	        
    	$data['btnaction'] = 'add';

	 	$this->form_validation->set_rules('words', 'words', 'required');
	 	

		if($this->Words_model->chk_w() === false)
	 	{
			$data['error_msg']  = 'Words Already Exists.';
			$data['words']     =  $this->input->post('words');
			$this->session->set_flashdata('error_msg', 'Words Already Exists');

	 	}

	if($this->form_validation->run() === TRUE && $this->Words_model->chk_w() === true)
	{
			        $this->Words_model->set_words();
					$this->session->set_flashdata('success_msg1', 'Words  Add Successfully');

				    redirect('admin/list-words');


			}
		}

		

			if($action=="edit")
			{

			$data['btnaction'] = 'edit';
			$data['titles']    = 'Edit Words';
			$data['adddiv']    = 'block';
			$data['srdiv'] 	   = 'none';
			

			$this->form_validation->set_rules('words', 'Words', 'required');
			
			$arr_fields         = $this->Words_model->get_row('list_chat_words','*',array('id'=>$id));
			$data['id']         = $arr_fields->id;
			$data['words']      = $arr_fields->words;
			


			if($this->form_validation->run() === TRUE)
				{
				 	$id 		    = $this->input->post('id');
					$words          = $this->input->post('words');
					

					if($this->Words_model->chk_w() === false)
			 		{
					
					 $data['error_msg'] = 'Words Already Exists.';
					 $arr_fields 		= $this->Words_model->get_row('list_chat_words','*',array('id'=>$id));
					 $data['id'] 		= $arr_fields->id;
					 $data['words']      = $arr_fields->words;
				   	}
				   else
				   {

				   $data= array('id'=>$id,'words'=>$words);

				$this->Words_model->update_w($id,$data);
				$this->session->set_flashdata('success_msg1','Words updated successfully.');

				redirect('admin/list-words');
					}
				}
		        }
          $this->load->view('admin/add-words',$data);
	
     }

	
	public function list_words($action= NULL, $id= NULL ) 
		{
			 $data['titles'] = 'List Words';
			 $data['adddiv'] = 'none';
		 	 $data['srdiv']  = 'none'; 

		 if($action=='delete')
		 {
		
				
				$this->Words_model->delete_w($id);
				$this->session->set_flashdata('success_msg','Words deleted successfully.');
				redirect('admin/list-words');
			 
		 }
      if ( ! file_exists('application/views/admin/list-words.php'))
          {
            show_404();
          }

        else
        {
			    $config["base_url"]   = base_url() . "admin/list-words";
				$config["total_rows"] = $this->Words_model->w_count();
				$config["per_page"]   = 20;
				$config["uri_segment"]= 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["results"] = $this->Words_model->get_w($config["per_page"],$page);
				$data["links"] = $this->pagination->create_links();
				
				
				$this->load->view('admin/list-words', $data);
			 
		 }		

     }


     public function searchs($action = NULL,$title= NULL,$per_page = NULL)
	 {
	//print_r($usertype);
	 $data['adddiv'] = 'none';
	 $data['srdiv'] = 'block'; 
		
	  if($action=='searchs')	
		{
			$data['titles']     = ucfirst($action).'Words'; 
			$data['btnactions'] = 'search';
			$data['adddiv']     = 'none';
			$data['srdiv']      = 'block';

			if($title){ $words  = $title; } 
			else { $words 		= $this->input->post('words'); }
			$data['words']      = $words;

			$config["base_url"] 	= base_url() . "admin/list-words/searchs/$a";
			$config["result"] 		= $this->Words_model->w_countsearch($words);
			$config["total_rows"] 	= count($config["result"]);
			$config["per_page"] 	= 20;
			$config["uri_segment"] 	= 5;
			$this->pagination->initialize($config);
			$page 				= ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$data["results"] 	=  $this->Words_model->get_wsearch($config["per_page"],$page,$words);
			$data["links"] 		= $this->pagination->create_links();
		}
		$this->load->view('admin/list-words', $data);
	}

	}
	
























                  