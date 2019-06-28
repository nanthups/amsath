<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends CI_Controller {

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
				$this->load->model('Coupon_model');
				$this->load->library('UserAuth');
				$this->load->library('pagination');
				$this->userauth->is_logged_in_admin();

     }

     public function add_coupon ($action = NULL,$id = NULL)

     {
     	$data['titiles']   = 'Add Discount Coupon';
     	$data['adddiv']    = 'none';
		$data['srdiv'] 	   = 'none';
		$data['status']    = 'active';

	 if($action=='add'){

      $data['btnaction'] = 'add';
      $this->form_validation->set_rules('category','category', 'required');
      $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'required');
      $this->form_validation->set_rules('percentage', 'Percentage');
      $this->form_validation->set_rules('amount', 'Amount', 'required');
      $this->form_validation->set_rules('expirydate', 'Expiry Date');
      $this->form_validation->set_rules('resamount', 'Resamount');
      $this->form_validation->set_rules('numcount', 'Number Count');
      $this->form_validation->set_rules('status', 'Status');


	 	 if($this->form_validation->run() === TRUE && $this->Coupon_model->chk_cou() === true)
				{
					$this->Coupon_model->set_cou();
					$this->session->set_flashdata('success_msg1', 'Discount Coupon  Added Successfully');

					redirect('admin/list-coupon');
				}


	 }

	  if($action=='editcoupon')  
	  {

             $data['btnaction'] = 'edit';
			 $data['titles'] 	= 'Edit Discount Coupon';
			 $data['adddiv'] 	= 'block';
			 $data['srdiv'] 	= 'none';

			  $this->form_validation->set_rules('category','category', 'required');
		      $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'required');
		      $this->form_validation->set_rules('percentage', 'Percentage');
		      $this->form_validation->set_rules('amount', 'Amount', 'required');
		      $this->form_validation->set_rules('expirydate', 'Expiry Date');
		      $this->form_validation->set_rules('resamount', 'Resamount');
		      $this->form_validation->set_rules('numcount', 'Number Count');
		      $this->form_validation->set_rules('status', 'Status');

			 $arr_fields             = $this->Coupon_model->get_row('discount_coupon','*',array('id'=>$id));

			 $data['id']             = $arr_fields->id;
			 $data['category']       = $arr_fields->category;
			 $data['coupon_code']    = $arr_fields->coupon_code;
			 $data['percentage']     = $arr_fields->percentage;
			 $data['amount']         = $arr_fields->amount;
			 $data['expirydate']     = $arr_fields->expirydate;
			 $data['resamount']      = $arr_fields->resamount;
			 $data['numcount']       = $arr_fields->numcount;
			 $data['status']         = $arr_fields->status;

			 if($this->form_validation->run() === TRUE)
				{
				 	$id 		    = $this->input->post('id');
					$category 	    = $this->input->post('category');
					$coupon_code 	= $this->input->post('coupon_code');
					$percentage     = $this->input->post('percentage');
					$amount         = $this->input->post('amount');
					$expirydate     = date("Y-m-d",strtotime($this->input->post('expirydate')));
					$resamount      = $this->input->post('resamount');
					$numcount       = $this->input->post('numcount');
					$status         = $this->input->post('status');

					$expirydate = date('Y-m-d',strtotime($expirydate));

					if($this->Coupon_model->chk_cou() === false)
			 		{
					
					 $data['error_msg'] = 'Category Already Exists.';
					 $arr_fields 		= $this->Coupon_model->get_row('discount_coupon','*',array('id'=>$id));
					 $data['id'] 		= $arr_fields->id;
					 $data['category']  = $arr_fields->category;
					 


				   	}

				   else
				   {

				   $data= array('id'=>$id,'category'=>$category,'coupon_code'=>$coupon_code,'percentage'=>$percentage,'amount'=>$amount,'expirydate'=>date("y-m-d",strtotime($expirydate)),'resamount'=>$resamount,'numcount'=>$numcount,'status'=>$status);  
				   
				  
				$this->Coupon_model->update_cou($id,$data);
				$this->session->set_flashdata('success_msg1','Discount Coupon updated successfully.');

				redirect('admin/list-coupon');
					}
				}
		       
	  }
          $this->load->view('admin/add-coupon',$data);
	
     }

     public function list_coupon ($action= NULL, $id= NULL ) 
     {
     	 $data['titles'] = ' List Discount Coupon';
		 $data['adddiv'] = 'none';
		 $data['srdiv'] = 'none'; 


		 if($action=='delete')
		 {
		
				
				$this->Coupon_model->delete_cou($id);
				$this->session->set_flashdata('success_msg','Discount Coupon deleted successfully.');
				redirect('admin/list-coupon');
			 
		 }


          if($action=='status')
		  {
		 
				
				$this->Coupon_model->change_active($id,$status);
				$this->session->set_flashdata('success_msg','Discount Coupon  status updated successfully.');
				redirect('admin/list-coupon');
			
		 }
		

		 if ( ! file_exists('application/views/admin/list-coupon.php'))
          {
            show_404();
          }

        else
        {
			    $config["base_url"] = base_url() . "admin/list-coupon";
				$config["total_rows"] = $this->Coupon_model->cou_count();
				$config["per_page"] = 20;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page            = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["results"] = $this->Coupon_model->get_cou($config["per_page"],$page);
				$data["links"]   = $this->pagination->create_links();
				
				
				$this->load->view('admin/list-coupon', $data);
			 
		 }		

     }

    public function searchs($action = NULL,$title= NULL,$per_page = NULL)
	{
	//print_r($usertype);
	 $data['adddiv'] = 'none';
	 $data['srdiv'] = 'block'; 
		
	  if($action=='searchs')	
		{
			$data['titles'] = ucfirst($action).'Discuont Coupon'; 
			$data['btnactions'] = 'search';
			$data['adddiv'] = 'none';
			$data['srdiv'] = 'block';

			if($title){ $category  = $title; } 
			else { $category       = $this->input->post('category'); }
			$data['category']      = $category;

			if($title){ $coupon_code  = $title; } 
			else { $coupon_code 	  = $this->input->post('coupon_code'); }
			$data['coupon_code']      = $coupon_code;

			

			$config["base_url"] 	= base_url() . "admin/list-coupon/searchs/$a,$b";
			$config["result"] 		= $this->Coupon_model->cou_countsearch($category,$coupon_code);
			$config["total_rows"] 	= count($config["result"]);
			$config["per_page"] 	= 20;
			$config["uri_segment"] 	= 5;
			$this->pagination->initialize($config);
			$page 				= ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$data["results"] 	= $this->Coupon_model->get_cousearch($config["per_page"],$page,$category,$coupon_code);
			$data["links"] 		= $this->pagination->create_links();
		}
		$this->load->view('admin/list-coupon', $data);
	}

}

