<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads extends CI_Controller {

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
				$this->load->model('Ads_model');
				$this->load->model('Reg_model');
				$this->load->library('UserAuth');
				$this->load->library('pagination');
				$this->userauth->is_logged_in_admin();
   
     }

    
     public function list_ads ($action= NULL, $id=NULL ) 
     {
     	 $data['titles'] = ' List Ads';
		 $data['adddiv'] = 'none';
		 $data['srdiv'] = 'none'; 

        
        
        if($action=='delete')
		 {
		
				$this->Ads_model->delete_ads($id);
				$this->session->set_flashdata('success_msg','Ads deleted successfully.');
				redirect('admin/list-ads');
		 }




          if($action=='agr_status')
		  {
		 
				
				$this->Ads_model->change_active($ads_id,$agr_status);
				$this->session->set_flashdata('success_msg','Ads  status updated successfully.');
				redirect('admin/list-ads');
			
		 }

         

		 if ( ! file_exists('application/views/admin/list-ads.php' ) )
          {
            show_404();
          }

        else
        {
			    $config["base_url"] = base_url() . "admin/list-ads";
				$config["total_rows"] = $this->Ads_model->ads_count();
				$config["per_page"] = 20;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["results"] = $this->Ads_model->get_ads($config["per_page"],$page);
				$data["links"] = $this->pagination->create_links();
				$data["users"]     = $this->Ads_model->get_uname();
				$data["jobs"]      = $this->Ads_model->get_job();
				
				
				$this->load->view('admin/list-ads',$data);
			 
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


			$ads_title      		= $this->input->post('ads_title');
			$user_id      		    = $this->input->post('user_id');
			$jobs_category          = $this->input->post('jobs_category');
			$ads_cost               = $this->input->post('ads_cost');

			$data['ads_title'] 		= $ads_title;
			$data['user_id'] 		= $user_id;
			$data['jobs_category'] 	= $jobs_category;
			$data['ads_cost']       = $ads_cost;

			
			
			$config["base_url"] 	= base_url() . "admin/list-ads/searchs/$a,$b,$c,$d";
			$config["result"] 		= $this->Ads_model->ads_countsearch($ads_title,$user_id,$jobs_category,$ads_cost);
			$config["total_rows"] 	= count($config["result"]);
			$config["per_page"] 	= 20;
			$config["uri_segment"] 	= 5;
			$this->pagination->initialize($config);
			$page 				= ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
	        $data["results"] 	= $this->Ads_model->get_adssearch($config["per_page"],$page,$ads_title,$user_id,$jobs_category,$ads_cost);
			$data["links"] 		= $this->pagination->create_links();
		    $data["users"]      = $this->Ads_model->get_uname();
		    $data["jobs"]       = $this->Ads_model->get_job();

			$data["us_id"]	 	= $user_id;
			$data["js_id"]	 	= $jobs_category;
		}
		$this->load->view('admin/list-ads', $data);
	}

}

	
	