<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

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
				$this->load->model('Web_model');
				$this->load->model('Reg_model');
				$this->load->library('UserAuth');
				$this->load->library('pagination');
				$this->userauth->is_logged_in_admin();
   
     }

    
     public function list_web ($action= NULL, $id= NULL ) 
     {
     	 $data['titles'] = ' List Web Links';
		 $data['adddiv'] = 'none';
		 $data['srdiv'] = 'none'; 


		 if($action=='delete')
		 {
		
				
				$this->Web_model->delete_web($id);
				$this->session->set_flashdata('success_msg','User deleted successfully.');
				redirect('admin/list-web');
			 
		 }
		 
		     //$arr_fields              = $this->Web_model->get_row('users_contact','*',array('id'=>$id));
			 //$data['id']              = $arr_fields->id;
			 //$data['user_id']         = $arr_fields->user_id;


         

		 if ( ! file_exists('application/views/admin/list-web.php' ) )
          {
            show_404();
          }

        else
        {
			    $config["base_url"] = base_url() . "admin/list-web";
				$config["total_rows"] = $this->Web_model->web_count();
				$config["per_page"] = 20;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["results"] = $this->Web_model->get_web($config["per_page"],$page);
				$data["links"] = $this->pagination->create_links();
				
				
				$this->load->view('admin/list-web',$data);
			 
		 }		

     }

    public function searchs($action = NULL,$title= NULL,$per_page = NULL)
	{
	//print_r($usertype);
	 $data['adddiv'] = 'none';
	 $data['srdiv'] = 'block'; 
		
	  if($action=='searchs')	
		{
			$data['titles'] = ucfirst($action).'Web Links'; 
			$data['btnactions'] = 'search';
			$data['adddiv'] = 'none';
			$data['srdiv'] = 'block';

			if($title){ $user_id    = $title; } 
			else { $user_id     	= $this->input->post('user_id'); }
			$data['user_id'] 		= $user_id;

			
			
			$config["base_url"] 	= base_url() . "admin/list-web/searchs/$a";
			$config["result"] 		= $this->Web_model->web_countsearch($user_id);
			$config["total_rows"] 	= count($config["result"]);
			$config["per_page"] 	= 20;
			$config["uri_segment"] 	= 5;
			$this->pagination->initialize($config);
			$page 				= ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$data["results"] 	= $this->Web_model->get_websearch($config["per_page"],$page,$user_id);
			$data["links"] 		= $this->pagination->create_links();
		}
		$this->load->view('admin/list-web', $data);
	}

}

	
	