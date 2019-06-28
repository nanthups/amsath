<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category2 extends CI_Controller {

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
				$this->load->model('Category2_model');
				$this->load->model('Category1_model');
				$this->load->library('UserAuth');
				$this->load->library('pagination');
				$this->userauth->is_logged_in_admin();
   
     }

     public function add_category2 ($action = NULL,$id = NULL)
     {

     	$data['titiles']   = 'Add Category Level2';
     	$data['adddiv']    = 'none';
		$data['srdiv'] 	   = 'none';
		$data['status']    = 'active';

	 if($action=='add'){

      $data['btnaction'] = 'add';
      $this->form_validation->set_rules('category2', 'Category2', 'required');
      $this->form_validation->set_rules('cat_id1', 'Category1', 'required');
      $this->form_validation->set_rules('status', 'Status', 'required');


       if($this->Category2_model->chk_cat2() === false)
	 	 {

			$data['error_msg'] = 'Category Name Already Exists.';
			$data['category2'] =  $this->input->post('category2');
			$this->session->set_flashdata('error_msg', 'Category Name Already Exists');

	 	 }

	 	 if($this->form_validation->run() === TRUE && $this->Category2_model->chk_cat2() === true)
				{
					$this->Category2_model->set_cat2();
					$this->session->set_flashdata('success_msg1', 'Category  Added Successfully');

					redirect('admin/list-category2');
				}


	 }

	  if($action=='edit')  
	  {
             $data['btnaction'] = 'edit';
			 $data['titles'] 	= 'Edit Category';
			 $data['adddiv'] 	= 'block';
			 $data['srdiv'] 	= 'none';

			  $this->form_validation->set_rules('category2', 'Category2', 'required');
		      $this->form_validation->set_rules('cat_id1', 'Category1', 'required');
		      $this->form_validation->set_rules('status', 'Status', 'required');


			 $arr_fields              = $this->Category2_model->get_row('category2','*',array('id'=>$id));
			 $data['id']              = $arr_fields->id;
			 $data['category2']       = $arr_fields->category2;
			 $data['cat_id1']         = $arr_fields->cat_id1;
			 $data['status']          = $arr_fields->status;

			 if($this->form_validation->run() === TRUE)
				{
				 	$id 		    = $this->input->post('id');
					$category2 	    = $this->input->post('category2');
					$cat_id1 	    = $this->input->post('cat_id1');
					$status         = $this->input->post('status');

					if($this->Category2_model->chk_cat2() === false)
			 		{
					
					 $data['error_msg'] = 'Category Already Exists.';
					 $arr_fields 		= $this->Category2_model->get_row('category2','*',array('id'=>$id));
					 $data['id'] 		= $arr_fields->id;
					 $data['category2 '] = $arr_fields->category2;
				   	}
				   else
				   {

				   $data= array('id'=>$id,'category2'=>$category2,'cat_id1'=>$cat_id1,'status'=>$status);

				$this->Category2_model->update_cat2($id,$data);
				$this->session->set_flashdata('success_msg1','Category updated successfully.');

				redirect('admin/list-category2');
					}
				}
		       
	  }

	  	  $cat1_cnt		= $this->Category1_model->cat1_count();
	  	  $cat1_arr     = $this->Category1_model->get_fullcat1();
	  	  $data['cat1'] = $cat1_arr;
	  	  $data['cat1_cnt'] = $cat1_cnt;
          $this->load->view('admin/add-category2',$data);
	
     }

     public function list_category2_ajax () 
     {

     	$id        = $this->input->get('m');
		$cat_arr   = $this->Category2_model->full_get_cat2($id);
		$cat_count = $this->Category2_model->cat2_count($id);

		$html = "";

		$html .= '<select class="form-control selectpicker" name="cat_id2" id="cat_id2" data-live-search="true">
           <option value="" selected="selected" >-Select-</option>';

		     
             if($cat_count>0)
              {
               foreach($cat_arr as $key=>$val)
                {

        			$html .= '<option value = "'.$val['id'].'">'.$val['category2'].'</option>';
           
                }
              }
           
        $html .= '</select>';

        echo $html;	    
     }


     public function list_category2 ($action= NULL, $id= NULL ) 
     {

     	 $data['titles'] = ' List Category Level 2';
		 $data['adddiv'] = 'none';
		 $data['srdiv']  = 'none'; 

		 if($action=='delete')
		 {
		
				$this->Category2_model->delete_cat2($id);
				$this->session->set_flashdata('success_msg','Category deleted successfully.');
				redirect('admin/list-category2');
			 
		 }


          if($action=='status')
		  {
		 
				
				$this->Category2_model->change_active($id,$status);
				$this->session->set_flashdata('success_msg','Category2  status updated successfully.');
				redirect('admin/list-category2');
			
		 }
		

		 if ( ! file_exists('application/views/admin/list-category2.php' ) )
          {
            show_404();
          }

        else
        {

			    $config["base_url"] = base_url() . "admin/list-category2";
				$config["total_rows"] = $this->Category2_model->cat2_count();
				$config["per_page"] = 20;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["results"] = $this->Category2_model->get_cat2($config["per_page"],$page);
				$data["links"] = $this->pagination->create_links();
				
				
				$this->load->view('admin/list-category2', $data);
			 
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


			if($title){ $category2  = $title; } 
			else { $category2    	= $this->input->post('category2'); }
			$data['category2']      = $category2 ;

			if($title){ $cat_id1    = $title; } 
			else { $cat_id1   	    = $this->input->post('cat_id1'); }
			$data['cat_id1'] 		= $cat_id1;


			$config["base_url"] 	= base_url() . "admin/list-category2/searchs/$a,$b";
			$config["result"] 		= $this->Category2_model->cat2_countsearch($category2,$cat_id1);
			$config["total_rows"] 	= count($config["result"]);
			$config["per_page"] 	= 20;
			$config["uri_segment"] 	= 5;
			$this->pagination->initialize($config);
			$page 				= ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$data["results"] 	= $this->Category2_model->get_cat2search($config["per_page"],$page,$category2,$cat_id1);
			$data["links"] 		= $this->pagination->create_links();
		}
		$this->load->view('admin/list-category2', $data);
	}

	 public function serach_category2_ajax () 
     {

     	$id = $this->input->get('m');
		$cat_arr   = $this->Category2_model->full_get_search($id);
		$cat_count = $this->Category2_model->cat2_count($id);

		$html = "";

		$html .= '<select class="form-control selectpicker" name="cat_id2" id="cat_id2" data-live-search="true">
           <option value="" selected="selected" >-Select-</option>';

		     
             if($cat_count>0)
              {
               foreach($cat_arr as $key=>$val)
                {

        			$html .= '<option value = "'.$val['id'].'">'.$val['category2'].'</option>';
           
                }
              }
           
        $html .= '</select>';

        echo $html;	    
     }

}

	
	