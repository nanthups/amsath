<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filemanage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('password');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->library('UserAuth');
		$this->load->library('pagination');
		$this->load->model(['CommonModel', 'User_model']);
	}

	public function insertFile()
	{
		$userid = $this->session->userdata('userid');
		$this->userauth->logged_in();
		$action            = $this->input->post('submit');
		$id = $this->input->post('file_id');
		$data['file_type'] = $this->input->post('file_type');
		$data['file_title'] = $this->input->post('file_title');
		$data['category'] = $this->input->post('category');
		$data['file_price'] = $this->input->post('file_price');
		$data['web_charge'] = $this->input->post('web_charge');
		$data['show_price'] = $this->input->post('show_price');
		$data['keyword'] = $this->input->post('keyword');
		$old_file = $this->input->post('old_file');
		$old_zip = $this->input->post('old_zip');

		$this->form_validation->set_rules('file_type', 'File Type', 'required');
		$this->form_validation->set_rules('file_title', 'File Title', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('file_price', 'File Price', 'required');
		$this->form_validation->set_rules('web_charge', 'Website Charge', 'required');
		$this->form_validation->set_rules('show_price', 'Show Price', 'required');
		$this->form_validation->set_rules('keyword', 'Keyword', 'required');

		if($this->form_validation->run() === false)
		{
			$data['users'] = $this->User_model->get_users_details($userid); 
			$data['files_category'] = $this->CommonModel->getAll('file_category');
			$this->load->view('user/seller-files',$data);
		}
		else
		{
			if ($action == 'submit') 
			{
				$config['upload_path']="./uploads/orginal/";
				$config['allowed_types']="gif|png|jpg|jpeg";
				$config['max_size']="1000000";
				$config['max_width']="10000";
				$config['max_height']="10000";
				$this->load->library('upload',$config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('file_name'))
				{
					$file  =  $this->upload->data();
					$image  =  $file["file_name"]; 
					$config['image_library']='gd2';
					$config['source_image']=$file['full_path'];
					$config['maintain_ratio']=TRUE;
					$config['width']=150;
					$config['height']=75;
					$config['new_image']="./uploads/small/".$file['file_name'];
					$this->image_lib->initialize($config);
					$this->image_lib->resize();

					$configFile['upload_path'] = './uploads/zipFile/'; 
					$configFile['max_size'] = '1000000';
					$configFile['allowed_types'] = 'zip|rar|gif|png|jpg|jpeg'; 
					$configFile['overwrite'] = FALSE;
					$configFile['remove_spaces'] = TRUE;
					$file_name = $data['file_title'].'_file';
					$configFile['file_name'] = $file_name;

					$this->load->library('upload', $configFile);
					$this->upload->initialize($configFile);

					if($this->upload->do_upload('illustrator_file'))
					{
						$fileIlu  =  array('upload_data'=>$this->upload->data());
						$illustrator  =  $fileIlu['upload_data']["illustrator_file"];
						$dataArray = array('user_id'=>$userid,'file_type'=>$data['file_type'],'file_name'=>$image,'illustrator_file'=>$file_name,'file_title'=>$data['file_title'],'category'=>$data['category'],'file_price'=>$data['file_price'],'web_charge'=>$data['web_charge'],'show_price'=>$data['show_price'],'keyword'=>$data['keyword']);
						$return = $this->CommonModel->insertData('sell_files', $dataArray);
					}
					else
					{
						$data['users'] = $this->User_model->get_users_details($userid);
						$data['files_category'] = $this->CommonModel->getAll('file_category');
						$this->session->set_flashdata('alert', 'File Not Supported'); 
						$this->load->view('user/seller-files',$data);
					}
					if ($return) 
					{
						$data['users'] = $this->User_model->get_users_details($userid); 
						$data['files_category'] = $this->CommonModel->getAll('file_category');
						$this->session->set_flashdata('alert', 'File upload Successfully');
						$this->load->view('user/seller-files',$data);
					}
				}
			}
			elseif ($action == 'update') 
			{
				$config['upload_path']="./uploads/orginal/";
				$config['allowed_types']="gif|png|jpg|jpeg";
				$config['max_size']="1000000";
				$config['max_width']="10000";
				$config['max_height']="10000";
				$this->load->library('upload',$config);
				$this->upload->initialize($config);

				if(!$this->upload->do_upload('file_name'))
				{
					$image  = $old_file;
				}
				else
				{
					$file = $this->upload->data();
					$image = $file["file_name"]; 
					$config['image_library']='gd2';
					$config['source_image']=$file['full_path'];
					$config['maintain_ratio']=TRUE;
					$config['width']=150;
					$config['height']=75;
					$config['new_image']="./uploads/small/".$file["file_name"];
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
				}
				$configFile['upload_path'] = './uploads/zipFile/'; 
				$configFile['max_size'] = '1000000';
				$configFile['allowed_types'] = 'zip|rar|gif|png|jpg|jpeg'; 
				$configFile['overwrite'] = FALSE;
				$configFile['remove_spaces'] = TRUE;
				$this->load->library('upload', $configFile);
				$this->upload->initialize($configFile);

				if(!$this->upload->do_upload('illustrator_file'))
				{
					$file_name = $old_zip;
				}
				else
				{
					$file = $this->upload->data();
					$file_name = $file["file_name"];
				}
				$fileIlu  =  array('upload_data'=>$this->upload->data());
				$illustrator  =  $fileIlu['upload_data']["illustrator_file"];
				$dataArray = array('user_id'=>$userid,'file_type'=>$data['file_type'],'file_name'=>$image,'illustrator_file'=>$file_name,'file_title'=>$data['file_title'],'category'=>$data['category'],'file_price'=>$data['file_price'],'web_charge'=>$data['web_charge'],'show_price'=>$data['show_price'],'keyword'=>$data['keyword']);
				$return = $this->CommonModel->updateData('sell_files', $dataArray, 'file_id', $id);

				if ($return) 
				{
					$this->session->set_flashdata('alert', 'File update Successfully');
					redirect('user-sell-shop');
				}
			}
		}
	}

	public function returnFile($id='')
	{
		$this->userauth->logged_in();
		$userid = $this->session->userdata('userid');
		$data['files_category'] = $this->CommonModel->getAll('file_category');
		$returnFile     = $this->CommonModel->returnOfId( 'sell_files', 'file_id', $id);
		$data['file_id']   = $returnFile->file_id;
		$data['file_type']  = $returnFile->file_type;
		$data['old_file'] = $returnFile->file_name;
		$data['illustrator_file']  = $returnFile->illustrator_file;
		$data['file_title']  = $returnFile->file_title;
		$data['category']  = $returnFile->category;
		$data['file_price']  = $returnFile->file_price;
		$data['web_charge']  = $returnFile->web_charge;
		$data['show_price']  = $returnFile->show_price;
		$data['keyword']  = $returnFile->keyword;

		$data['users'] = $this->User_model->get_users_details($userid); 
		$this->load->view('user/seller-files',$data);
	}

	public function deleteFile($id)
	{
		$this->userauth->logged_in();
		$return = $this->CommonModel->deleteOfId( 'sell_files', 'file_id', $id);
		if ($return)
		{
			$this->session->set_flashdata('alert', 'File deleted Successfully');
		}
		redirect('user-sell-shop');
	}
}
