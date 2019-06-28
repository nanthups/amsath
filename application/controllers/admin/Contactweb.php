<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contactweb extends CI_Controller
{

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
		$this->load->model('Contactweb_model');
		$this->load->library('UserAuth');
		$this->load->library('pagination');
		$this->userauth->is_logged_in_admin();
	}


	public function Update($action = NULL, $id = NULL, $main_img = NULL)
	{

		if ($action == "edit") {

			$data['btnaction'] = 'edit';
			$data['titles']    = 'Upadte Website';
			$data['adddiv']    = 'block';
			$data['srdiv'] 	   = 'none';




			$arr_fields         = $this->Contactweb_model->get_row('website_contact', '*', array('id' => $id));
			$data['id']         = 1;
			$data['land_number'] = $arr_fields->land_number;
			$data['mobile_number'] = $arr_fields->mobile_number;
			$data['email'] = $arr_fields->email;
			$data['facebook_id'] = $arr_fields->facebook_id;
			$data['twitter_id'] = $arr_fields->twitter_id;
			$data['google_id'] = $arr_fields->google_id;
			$data['insta_id'] = $arr_fields->insta_id;
			$data['youtub_id'] = $arr_fields->youtub_id;
			$data['meta_titile'] = $arr_fields->meta_titile;
			$data['meta_description'] = $arr_fields->meta_description;
			$data['address'] = $arr_fields->address;
			$data['state'] = $arr_fields->state;
			$data['city'] = $arr_fields->city;
			$data['place'] = $arr_fields->place;
			$data['pincode'] = $arr_fields->pincode;



			if ($this->form_validation->run() === TRUE) {
				$id 		    = $this->input->post('id');
				$land_number    = $this->input->post('land_number');
				$mobile_number  = $this->input->post('mobile_number');
				$email          = $this->input->post('email');
				$facebook_id    = $this->input->post('facebook_id');
				$twitter_id    = $this->input->post('twitter_id');
				$google_id     = $this->input->post('google_id');
				$insta_id      = $this->input->post('insta_id');
				$youtub_id     = $this->input->post('youtub_id');
				$meta_titile   = $this->input->post('meta_titile');
				$meta_description = $this->input->post('meta_description');
				$address      = $this->input->post('address');
				$state        = $this->input->post('state');
				$city         = $this->input->post('city');
				$place        = $this->input->post('place');
				$pincode      = $this->input->post('pincode');


				$this->Contactweb_model->update_web($id, $data);
				$this->session->set_flashdata('success_msg1', 'Website updated successfully.');

				redirect('admin/list-website');
			}
		}
	}
}

