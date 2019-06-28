<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
   	 {

        parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	    $this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('password');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->model('page_model');
		$this->load->library('UserAuth');
		$this->load->library('pagination');
		$this->userauth->is_logged_in_admin();
   
     }

	
	public function add_pages($action= NULL,$id= NULL,$main_img= NULL)
		{ 
	 		
			$data['titles'] = 'Add Pages';
	 if($action=="add")
		{
	
				 $data['titles'] = 'Add Pages';
				 $data['btnaction'] = 'add';
				 $this->form_validation->set_rules('title', 'Title', 'required');
				 $this->form_validation->set_rules('description', 'Description', 'required');
				 $this->form_validation->set_rules('page', 'Page', 'required');
				 if($this->page_model->chk_pages() === false)
			 		{
			 			
						$this->session->set_flashdata('error_msg','	Title exists.');
						$data['titlep']=$this->input->post('title');
						$data['descriptionp']=$this->input->post('description');
						$data['pagep']=$this->input->post('page');
					}
					if($this->page_model->chk_page() === false)
			 		{
			 			
						$this->session->set_flashdata('error_msg','Page exists.');
						$data['descriptionp']=$this->input->post('description');
						$data['titlep']=$this->input->post('title');
						$data['pagep']=$this->input->post('page');
					}
 
  				if($this->form_validation->run() === TRUE && $this->page_model->chk_pages() === true && $this->page_model->chk_page() === true)
					{
						$config['upload_path']="./uploads/orginal/";
						$config['allowed_types']="gif|png|jpg|jpeg";
						$config['max_size']="10000000000000";
						$config['max_width']="5000";
						$config['max_height']="1000";
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						if(!$this->upload->do_upload('userfile'))
						{
						  $title =  $this->input->post('title');
						  $description = $this->input->post('description');
						  $page= $this->input->post('page');
						  $data = array('id'=>$id,'title'=>$title,'description'=>$description,'page'=>$page);
						  $this->page_model->set_page($data);
						  $data['titles'] = 'Add Pages';
						  $this->session->set_flashdata('success_msgs','Page Added successfully.');
						}
						else
						{
						$data=array('upload_data'=>$this->upload->data());
						$image=  $this->upload->data();
						$name=$image["file_name"]; 
						$this->resizesmall($data['upload_data']['full_path'],$data['upload_data']['file_name']);
						$this->resizelarge($data['upload_data']['full_path'],$data['upload_data']['file_name']);
						$this->resizemedium($data['upload_data']['full_path'],$data['upload_data']['file_name']);
						$title =  $this->input->post('title');
						$description = $this->input->post('description');
						$page= $this->input->post('page');
						$data=array('title'=>$title,'description'=>$description,'page'=>$page,'image'=>$name);
						$this->page_model->set_page($data);
						$data['titles'] = 'Add Pages';
						$this->session->set_flashdata('success_msgs','Page Added successfully.');
						}
					}
			 }
		if($action=="editpage")
		{
			 $data['btnaction'] = 'edit';
			 $data['titles'] = 'Edit Pages';
			 $this->form_validation->set_rules('title', 'Title', 'required');
			 $this->form_validation->set_rules('description', 'Description', 'required');
			 $this->form_validation->set_rules('page', 'Page', 'required');
			 $arr_fields = $this->page_model->get_row('pages','*',array('id'=>$id));
			 $data['id'] = $arr_fields->id;
			 $data['titlep'] = $arr_fields->title;
			 $data['descriptionp'] = $arr_fields->description;
			 $data['pagep'] = $arr_fields->page;
			 $data['main_img'] = $arr_fields->image;
			

			 if($this->form_validation->run() === TRUE )
			 {
			 	$config['upload_path']="./uploads/orginal/";
        		$config['allowed_types']="gif|png|jpg|jpeg";
       	 		$config['max_size']="10000000000000";
        		$config['max_width']="5000";
        		$config['max_height']="1000";
        		$this->load->library('upload',$config);
				$this->upload->initialize($config);
        		if(!$this->upload->do_upload('userfile'))
        		{
				 if($this->page_model->chk() === false)
			 		{
						$data['descriptionp']=$this->input->post('description');
						$data['titlep']=$this->input->post('title');
						$data['pagep']=$this->input->post('page');
						$this->session->set_flashdata('error_msg','	Page exists.');
						
					}
					else
					{
						$id=$this->input->post('id');
						$title =  $this->input->post('title');
						$description = $this->input->post('description');
						$page= $this->input->post('page');
						$data=array('id'=>$id,'title'=>$title,'description'=>$description,'page'=>$page);
						$this->page_model->update_page($id,$data);
						$this->session->set_flashdata('success_msg1','Page Updated successfully.');
						redirect('admin/list-pages');
					}
				
				}
                else
				{
					
				
						$data=array('upload_data'=>$this->upload->data());
						$image=  $this->upload->data();
						$name=$image["file_name"]; 
						$this->resizesmall($data['upload_data']['full_path'],$data['upload_data']['file_name']);
						$this->resizelarge($data['upload_data']['full_path'],$data['upload_data']['file_name']);
						$this->resizemedium($data['upload_data']['full_path'],$data['upload_data']['file_name']);
						$id=$this->input->post('id');
						$title =  $this->input->post('title');
						$description = $this->input->post('description');
						$page= $this->input->post('page');
						$data=array('id'=>$id,'title'=>$title,'description'=>$description,'page'=>$page,'image'=>$name);
						$this->page_model->update_page($id,$data);
						$this->session->set_flashdata('success_msg1','Page Updated successfully.');
						redirect('admin/list-pages');
				  
				}
			}
		}
					
		$this->load->view('admin/add-page',$data);
	}
		
	
	
	public function list_pages($action= NULL, $id= NULL, $main_img=NULL ) 
		{
			 $data['titles'] = 'List Pages';
			 $data['adddiv'] = 'none';
		 	 $data['srdiv'] = 'none'; 
		
	 if($action=="delete")
			  {
				    
					$this->page_model->delete_page($id,$main_img);
					$this->session->set_flashdata('success_msg1','Page Delete successfully.');
					redirect('admin/list-pages');
			  }
			
	 if($action=="deleteimg")
		     {
					$data = array('image' => '');
					$this->db->where('id', $id); 
					unlink(FCPATH."uploads/orginal/".$main_img);
			  		unlink(FCPATH."uploads/small/".$main_img);
			  		unlink(FCPATH."uploads/medium/".$main_img);
			  		unlink(FCPATH."uploads/large/".$main_img); 
					$this->db->update('pages', $data);
					redirect('admin/add-pages/edit/'.$id);
					
		      }
	
	if ( ! file_exists('application/views/admin/list-page.php' ) )
          {
					show_404();
          }
        else
        	{
					
					$config["base_url"] = base_url() . "admin/list-pages";
					$config["result"] = $this->page_model->record_count();	
					$config["total_rows"] = count($config["result"]);
					$config["per_page"] = 20;
					$config["uri_segment"] = 3;
					$this->pagination->initialize($config);
					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					$data["results"] = $this->page_model->get_pages($config["per_page"], $page);
					$data["links"] = $this->pagination->create_links();
					
			 }
					$this->load->view('admin/list-page',$data);
		 }
		
	public function resizesmall($path,$file)
		{
					$config['image_library']='gd2';
					$config['source_image']=$path;
					$config['maintain_ratio']=TRUE;
					$config['width']=100;
					$config['height']=100;
					$config['new_image']="./uploads/small/".$file;
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
	
		}
		public function resizemedium($path,$file)
		{
					$config['image_library']='gd2';
					$config['source_image']=$path;
					$config['maintain_ratio']=TRUE;
					$config['width']=250;
					$config['height']=250;
					$config['new_image']="./uploads/medium/".$file;
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
	
		}
		public function resizelarge($path,$file)
		{
					$config['image_library']='gd2';
					$config['source_image']=$path;
					$config['maintain_ratio']=TRUE;
					$config['width']=1900;
					$config['height']=800;
					$config['new_image']="./uploads/large/".$file;
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
	
		}
		
		
		public function searchs($action= NULL,$title= NULL,$per_page= NULL)
		{ 
			 
			 $data['titles'] = 'Admin Pages';
			 $data['adddiv'] = 'none';
		 	 $data['srdiv'] = 'none'; 
			 if($action=='searchs')
			 {
			 
					$data['adddiv'] = 'none';
					$data['srdiv'] = 'block';
					$data['btnaction'] = 'search';
				if($title){ $search = $title; } else {
				$search=$this->input->post('title'); }
				$data['searchs']=$search;
				$config = array();
				$config["base_url"] = base_url() . "admin/list-page/search/".$search;
    			$config["result"] = $this->page_model->record_countsearch($search);
     			$config["total_rows"] = count($config['result']);
				$config["per_page"] =20;
        		$config["uri_segment"] = 5;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
				$data["results"] = $this->page_model->get_pagesearch($config["per_page"], $page,$search);
				$data['searchs']=$search;
        		$data["links"] = $this->pagination->create_links();
				$this->load->view('admin/list-page',$data);

			  }
		  }
	}
