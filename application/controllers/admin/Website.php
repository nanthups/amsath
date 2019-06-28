<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

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
				$this->load->model('Website_model');
				$this->load->model('Reg_model');
				$this->load->library('UserAuth');
				$this->load->library('pagination');
				$this->userauth->is_logged_in_admin();
   
     }

    
     public function list_website ($action= NULL) 
     {
     	 $data['titles'] = ' List Web Site details';
		 $data['adddiv'] = 'none';
		 $data['srdiv'] = 'none'; 


		 if($action=="edit")
		 {

				$id 		    = $this->input->post('id');
				$land_number    = $this->input->post('land_number');
				$mobile_number  = $this->input->post('mobile_number');
				$email          = $this->input->post('email');
				$facebook_id    = $this->input->post('facebook_id');
				$twitter_id     = $this->input->post('twitter_id');
				$google_id      = $this->input->post('google_id');
				$insta_id       = $this->input->post('insta_id');
				$youtub_id      = $this->input->post('youtub_id');
				$meta_titile    = $this->input->post('meta_titile');
				$meta_description	= $this->input->post('meta_description');
				$address	    = $this->input->post('address');
				$state	        = $this->input->post('state');
				$city	        = $this->input->post('city');
				$place	        = $this->input->post('place');
				$pincode	    = $this->input->post('pincode');

					
				$data= array(	
								'id'=>$id,
								'land_number'=>$land_number,
								'mobile_number'=>$mobile_number,
								'email'=>$email,
								'facebook_id'=>$facebook_id,
								'twitter_id'=>$twitter_id,
								'google_id'=>$google_id,
								'insta_id'=>$insta_id,
								'youtub_id'=>$youtub_id,
								'meta_titile'=>$meta_titile,
								'meta_description'=>$meta_description,
								'address'=>$address,
								'state'=>$state,
								'city'=>$city,
								'place'=>$place,
								'pincode'=>$pincode
				);

				$this->Website_model->set_website($data);
				$data['results'] = $this->Website_model->get_website();

				$this->session->set_flashdata('success_msg1','Details updated successfully.');

				redirect('admin/list-website',$data);
					
				
		    }
         

		 if ( ! file_exists('application/views/admin/list-website.php' ) )
          {
            show_404();
          }

        else
        {	   
				$data["results"] = $this->Website_model->get_website();
				$this->load->view('admin/list-website',$data);
			 
		 }		

     }

    

}

	
	