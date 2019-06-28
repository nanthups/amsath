<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgreementController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('UserAuth');
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->model(['CommonModel', 'User_model']);
  }	

 /** User Dashboard **/
  public function agreementList()
  {
    $this->userauth->logged_in();
    $userid = $this->session->userdata('userid');
    $data['users'] = $this->User_model->get_users_details($userid);	
    $data['agreements'] = $this->CommonModel->getAll('users_agreement', 'user_id', $userid);
    $this->load->view('user/agreement-list', $data);
  }

  /** Seller Files **/
  function agreementAdd()
  {       
    $this->userauth->logged_in();
    $userid = $this->session->userdata('userid');
    $data['users'] = $this->User_model->get_users_details($userid); 
    $data['followers'] = $this->User_model->returnFollower($userid);
    $this->load->view('user/agreement-add',$data);    
  }

  function manageAgreement()
  {
    $this->userauth->logged_in();
    $userid = $this->session->userdata('userid');
    $data['users'] = $this->User_model->get_users_details($userid); 
    $data['agr_title'] = $this->input->post('agr_title');
    $data['agr_with'] = $this->input->post('agr_with');
    $data['agr_amt'] = $this->input->post('agr_amt');
    $data['agr_exp'] = $this->input->post('agr_exp');
    $data['no_images'] = $this->input->post('no_images');
    $dataArray = array(
      'user_id' => $userid,
      'agr_title' => $data['agr_title'], 
      'agr_with' => $data['agr_with'],
      'agr_amt' => $data['agr_amt'],
      'agr_desc' => $data['agr_desc'],
      'agr_exp' => date('Y-m-d',strtotime($data['agr_exp'])),
      'no_images' => $data['no_images'],
      'agr_status' => 'Ongoing',
    );

    $this->form_validation->set_rules('agr_title', 'Title', 'required');
    $this->form_validation->set_rules('agr_with', 'Agreement with', 'required');
    $this->form_validation->set_rules('agr_amt', 'Total Amount', 'required');
    $this->form_validation->set_rules('agr_exp', 'Expire Date', 'required');
    $this->form_validation->set_rules('no_images', 'Number of Images', 'required');
    if($this->form_validation->run() === false)
    {
      $this->load->view('user/agreement-add',$data);   
    }
    else
    {
      $returnId = $this->CommonModel->insertReturnId('users_agreement', $dataArray);
      $filesCount = count($_FILES['file_name']['name']);
      for ($i=0; $i < $filesCount ; $i++) 
      { 
        $_FILES['file1']['name']=$_FILES['file_name']['name'][$i];
        $_FILES['file1']['type']=$_FILES['file_name']['type'][$i];
        $_FILES['file1']['tmp_name']=$_FILES['file_name']['tmp_name'][$i];
        $_FILES['file1']['error']=$_FILES['file_name']['error'][$i];
        $_FILES['file1']['size']=$_FILES['file_name']['size'][$i];
        $config['upload_path']="./uploads/agreementFiles/";
        $config['allowed_types']="gif|png|jpg|jpeg";
        $config['max_size']="10000000000000";
        $config['max_width']="5000";
        $config['max_height']="1000";
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('file1'))
        {
          $info = $this->upload->data();
          $fileName = $info["file_name"];
          $fileArray = array(
            'uagr_id' => $returnId, 
            'file_name' => $fileName,
          );
          $responce = $this->CommonModel->insertData('agreement_files', $fileArray);
        }
      }
      $this->session->set_flashdata('alert', 'Agreement Create Sucessfully');
      redirect('user-agreement-list'); 
    } 
  }

}
