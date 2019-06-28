<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_visitor extends CI_Controller {
	function __construct() 
	{
		parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
	    $this->load->model('Sitevisitor_model');
		$this->load->model(['User_model','CommonModel','front_model']);
		$this->load->library(['UserAuth','pagination','session','cart','image_lib']);
	}

	/** Load index page **/
      public function index()
	   {
		$userid = $this->session->userdata('userid');
		$this->load_wishlist();
		
		if($this->session->userdata('userid'))
		{
		 	$data['user_id']  	  = $this->session->userdata('userid');
		 	$userid 			  = $this->session->userdata('userid');
		 	$data['users']   	  = $this->User_model->get_users_details($userid);
			$data['products']     = $this->front_model->get_wishlist();
			$this->load->view('front/includes/header-after-login',$data);
		}
		else
		{
			$this->load->view('front/includes/header');
			
		}
		

		$data['files'] = $this->CommonModel->getAll('sell_files','','',6);
		$data['ads'] = $this->User_model->load_ads();
		//$this->load->view('front/index', $data);
		
		$data['expert'] = $this->CommonModel->experts_list(NULL,NULL);
		$data['footer'] = $this->Sitevisitor_model->get_weblink();

		$cat 			 = $this->front_model->get_catId('Cloths');
		$data['fileWishlist'] = $this->session->userdata('fileWishlist');
		$data['product'] = $this->front_model->get_products($cat->id);
		$data['itemCountu'] = $this->CommonModel->totalRows('users', 'id');
	    $data['itemCountp'] = $this->CommonModel->totalRows('product', 'id');
		$data['itemCounts'] = $this->CommonModel->totalRows('sell_files', '	file_id'); 
		$data['itemCounta'] = $this->CommonModel->totalRows('users', 'type'); 
		($this->userauth->login_return() == true)?
		$this->load->view('front/includes/header'):
		$this->load->view('front/includes/header-after-login',$data);
		$this->load->view('front/index',$data);
	}
	
	
	 public function common_search()
	  {
	      	$userid = $this->session->userdata('userid');
			$return = array();
			$searchInput = $this->input->post('search_name');
			$data['users']    = $this->User_model->get_users_details($userid);
			$return = $this->Sitevisitor_model->common_search('users', 'fname', $searchInput);
			$return = empty($return)?$this->Sitevisitor_model->common_search('users', 'type', $searchInput):$return;
			if($return[0]->fname != NULL):
			$data['expert'] = $return;
			($this->userauth->login_return() == true)?
			$this->load->view('front/includes/header'):
			$this->load->view('front/includes/header-after-login',$data);
			$this->load->view('front/expert-list', $data);
			endif;
			$return = empty($return)?$this->Sitevisitor_model->common_search('product', 'name', $searchInput):$return;
			if($return[0]->name != NULL):
			$data['expert'] = $return;
			endif;
			$return = empty($return)?$this->Sitevisitor_model->common_search('sell_files', 'file_title', $searchInput):$return;
			if($return[0]->file_title != NULL):
			$data['files'] = $return;
			($this->userauth->login_return() == true)?
			$this->load->view('front/includes/header'):
			$this->load->view('front/includes/header-after-login',$data);
			$this->load->view('front/image-list', $data);
		    else:
			$this->session->set_flashdata('alert','No result for the search');
			redirect(base_url());
		    endif;
	}
	
	
	public function experts_list()
	{
		$userid = $this->session->userdata('userid');
		$data['users'] = $this->User_model->get_users_details($userid);
		$config = array();
		$config["base_url"] = base_url() . "experts-list";
		$total_row = $this->CommonModel->recordCount('users','id',$userid);
		$config["total_rows"] = $total_row;
		$config["per_page"] = 14;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
		$config['cur_tag_open'] = '<a class="page-link">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = '&raquo;';
		$config['prev_link'] = '&laquo;';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data["expert"] = $this->CommonModel->experts_list($config["per_page"], $page);
		$strlinks = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$strlinks);
		$data['fileWishlist'] = $this->session->userdata('fileWishlist');
		($this->userauth->login_return() == true)?
		$this->load->view('front/includes/header'):
		$this->load->view('front/includes/header-after-login',$data);
		$this->load->view('front/expert-list', $data);
		$data['footer'] = $this->Sitevisitor_model->get_weblink();
		$this->load->view('front/includes/footer',$data);
	}
	
	public function expert_search()
	{
	    $userid = $this->session->userdata('userid');
		$data['users'] = $this->User_model->get_users_details($userid);
		$input = $this->input->post('searchexpert');
		$rating = $this->input->post('userrating');
		$data["expert"] = $this->CommonModel->inputSearch('users', 'fname', $input);
		$data["expert"] = $this->CommonModel->inputSearch('users', 'star_rate', $rating);
		$data['fileWishlist'] = $this->session->userdata('fileWishlist');
		($this->userauth->login_return() == true)?
		$this->load->view('front/includes/header'):
		$this->load->view('front/includes/header-after-login',$data);
		$this->load->view('front/expert-list', $data);
	}
	

	public function image_details($id)
	{
		$userid = $this->session->userdata('userid');
		$data['users'] = $this->User_model->get_users_details($userid);
		$data['products'] = $this->front_model->get_wishlist();
		$data['fileWishlist'] = $this->session->userdata('fileWishlist');
		($this->userauth->login_return() == true)?
		$this->load->view('front/includes/header'):
		$this->load->view('front/includes/header-after-login',$data);
		$data['files'] = $this->CommonModel->returnOfId('sell_files','file_id', $id);
		$this->load->view('front/image-detail', $data);
		$data['footer'] = $this->Sitevisitor_model->get_weblink();
		$this->load->view('front/includes/footer',$data);
	}
	
	
	public function image_list()
	{
	
		$userid = $this->session->userdata('userid');
		$data['users'] = $this->User_model->get_users_details($userid);
		$config = array();
		$config["base_url"] = base_url() . "image-list";
		$total_row = $this->CommonModel->recordCount('sell_files','user_id',$userid);
		$config["total_rows"] = $total_row;
		$config["per_page"] = 6;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
		$config['cur_tag_open'] = '<a class="page-link">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = '&raquo;';
		$config['prev_link'] = '&laquo;';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data["files"] = $this->CommonModel->getImageList($config["per_page"], $page,NULL);
		$strlinks = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$strlinks);
		$data['fileWishlist'] = $this->session->userdata('fileWishlist');
		($this->userauth->login_return() == true)?
		$this->load->view('front/includes/header'):
		$this->load->view('front/includes/header-after-login',$data);
		$this->load->view('front/image-list', $data);
		$data['footer'] = $this->Sitevisitor_model->get_weblink();
		$this->load->view('front/includes/footer',$data);

	}
	
	
	public function image_search($category='')
	{
		$input = $this->input->post('imagesearch');
		$data["files"] = $this->CommonModel->inputSearch('sell_files', 'file_title', $input, $category);
		$data['fileWishlist'] = $this->session->userdata('fileWishlist');
		($this->userauth->login_return() == true)?
		$this->load->view('front/includes/header'):
		$this->load->view('front/includes/header-after-login',$data);
		$data['heading'] = ($category==NULL)?"Search Result":"Category Result";
		$this->load->view('front/image-list', $data);
	}
	
	
	function image_cart($file_id)
	{		
		$userid=$this->session->userdata('userid');
		$files = $this->CommonModel->returnOfId('sell_files', 'file_id', $file_id);
		$datausers=$this->User_model->get_users_details($files->user_id);
		$cart = array(
			'id'      => $files->file_id,
			'qty'     => 1,
			'price'   => $files->show_price,
			'name'    => $files->file_title,
			'userid'  => $userid,
			'username'  => $datausers->fname,
			'fileprice'  => $files->file_price,
			'showprice'  => $files->show_price,
			'filename'  => $files->file_name,
			'options' => array('Size' => 'L', 'Color' => 'Red')
		);

		$returs = $this->cart->insert($cart);	
		if ($returs) {
			$this->session->set_flashdata('alert','Add to cart successfully');
		}else{
			$this->session->set_flashdata('error','Failed when adding to cart, Try again.');
		}	
		redirect('image-details/'.$file_id); 
	 
	}
	
	
	function delete_item_cart($rowid)
	{
		$deleteItem = array(
			'rowid' => $rowid,
			'qty'   => 0
		);
		$returs = $this->cart->update($deleteItem);
		if ($returs) {
			$this->session->set_flashdata('alert','Removed from cart successfully');
		}else{
			$this->session->set_flashdata('error','Failed when removing, Try again.');
		}	
		redirect('file-cart');
	}
	
	
	function item_cart($id)
	{	
		
	$userid=$this->session->userdata('userid');
		$item = $this->CommonModel->returnOfId('product', 'id', $id);
		 
		$cart = array(
		

			'id'        => $item->id,
			'qty'       => 1,
			'price'     => $item->price_inr,
			'name'      => $item->name,
			'main_image'=> $item->main_image,
			'userid'    => $userid,
			'username'  => "Amsath",
            'fileprice' => $item->actual_price_inr,
			'showprice' => $item->price_inr,
			'filename'  => $item->main_image,
			'estimated_tax'  => $item->	estimated_tax,
			'delivery_charge'  => $item->delivery_charge,
			'options'   => array('Size' => 'L', 'Color' => 'Red')

		);
        
		$returs = $this->cart->insert($cart);
  //print_r($returs); exit;
		if ($returs) {
			$this->session->set_flashdata('alert','Add to cart successfully');
		}else{
			$this->session->set_flashdata('error','Failed when adding to cart, Try again.');
		}	
		$cat =$item->cat_id1;
		redirect('product-details/'.$cat.'/'.$id); 	
	}
	
	public function filecart()
	{			
		$userid=$this->session->userdata('userid');
		$data['users']=$this->User_model->get_users_details($userid);
		$data['fileWishlist'] = $this->session->userdata('fileWishlist');
		($this->userauth->login_return() == true)?
		$this->load->view('front/includes/header'):
		$this->load->view('front/includes/header-after-login',$data);
		$this->load->view('front/file-cart');
		
		$data['footer'] = $this->Sitevisitor_model->get_weblink();
		$this->load->view('front/includes/footer',$data);
	}
	
	public function load_wishlist()
	{		
		$userid=$this->session->userdata('userid');
		$fileWishlist = $this->User_model->load_wishlist('file_wishlist', 'sell_files', 'file_id', 'file_id','user_id', $userid);	
		$this->session->set_userdata('fileWishlist', $fileWishlist);
	}
	
	public function view_wishlist($file_id)
	{		
		$userid = $this->session->userdata('userid');
		$data['users'] = $this->User_model->get_users_details($userid);
		$data['fileWishlist'] = $this->session->userdata('fileWishlist');
		($this->userauth->login_return() == true)?
		$this->load->view('front/includes/header'):
		$this->load->view('front/includes/header-after-login',$data);
		$this->load->view('front/file-wishlist');
	}


	/** load signup page **/
	public function signup()
	{		
		$this->load->view('sign-up');		
	}	
	
	/** Signup **/
	public function signup_exe()
	{		
		$email=$this->input->post('email');
		$check=$this->Sitevisitor_model->check_emailid($email);
		if($check==null)
		{
			$newpwd=$this->input->post('password');
			$conpwd=$this->input->post('repassword');
			if($newpwd==$conpwd)
			{	
				if(!empty($_FILES['myfile']['name']))
				{
					$config['upload_path']='./uploads/users';
					$config['allowed_types']='jpg|jpeg|png';
					$config['max_size']='25000';
					$config['overwrite']  = TRUE;
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload('myfile'))
					{
						$this->session->set_flashdata('alert', 'Login Failed, File Can not Upload ..Please upload jpg|png|jpeg types only..!');
						redirect('sign-up');       
					}
					else
					{  
						$info = $this->upload->data();
						$imageName = $info["file_name"];
						$config['image_library']='gd2';
						$config['source_image']= $info['full_path'];
						$config['maintain_ratio']=TRUE;
						$config['width']=154;
						$config['height']=132;
						$config['new_image']="./uploads/users/thumb/".$imageName;
						$this->image_lib->initialize($config);
						$this->image_lib->resize();
						$params = array(
							'image' => $imageName,
							'fname'=>$this->input->post('fname'),
							'sname'=>$this->input->post('sname'),
							'email'=>$this->input->post('email'),
							'phone'=>$this->input->post('mobile'),
							'type'=>$this->input->post('type'),
							'password'=>$this->input->post('password'),
							'role'=>'User',
							'create_date'=>date('d-m-y')
						);								  
						$this->Sitevisitor_model->new_signup_registeration($params);
						//redirect(base_url('user-login'));  
						redirect ('user-login');   
					}                        
				}
				else
				{
					$params = array(
						'fname'=>$this->input->post('fname'),
						'sname'=>$this->input->post('sname'),
						'email'=>$this->input->post('email'),
						'phone'=>$this->input->post('mobile'),
						'type'=>$this->input->post('type'),
						'password'=>$this->input->post('password'),
						'role'=>'User',
						'create_date'=>date('d-m-y')
					);							  
					$this->Sitevisitor_model->new_signup_registeration($params);
						redirect ('user-login');    
				}			
			}
			else
			{
				$this->session->set_flashdata('alert', 'Password not match');
				redirect('sign-up');
			}				
		}
		else
		{
			$this->session->set_flashdata('alert', 'Emailid already exist');
			redirect('sign-up'); 
		} 
	}

	/** Load login page **/
	public function userlogin()
	{		
		$this->load->view('login');
	}

	function login_exe()
	{	
		$username = $this->input->post('name');
		$password = $this->input->post('password');	
		$check = $this->Sitevisitor_model->login_check($username,$password);
		if($check!=null)
		{
		    $userid = $check['id'];	
			$utype  = $check['role'];
			$type = $check['type'];
			$name   = $check['fname'];
			$email  = $check['email'];
			$image  = $check['image'];					 
			if($utype=="User")
			{
				$this->session->set_userdata('userid',$userid);
				$this->session->set_userdata('fname',$name);
				$this->session->set_userdata('email',$email);
				$this->session->set_userdata('utype',$type);
				$this->session->set_userdata('image',$image);
				$this->CommonModel->setData('users', 'status', 'active', 'id', $userid);
		       	redirect();				
			}
			else
			{ 
				$this->session->set_flashdata('alert', 'Login Failed..!');
				redirect('user-login');				   
			}
		}
		else
		{
			$this->session->set_flashdata('alert', 'Login Failed, Check email and password..!');
			redirect('user-login');
		}
	}

	function viewprofile()
	{		
		$userid=$this->session->userdata('userid');
		$data['users']=$this->User_model->get_users_details($userid);		
		$this->load->view('front/includes/header-after-login');	
		$this->load->view('front/profile',$data);	
	}
	
	function viewwelinks()
	{		
		$data['users']=$this->User_model->get_users_details($userid);		
		$this->load->view('front/includes/header-after-login');	
		$this->load->view('front/profile',$data);	
	}



	function about_us()
	{

	     if($this->session->userdata('userid'))
		{
		 	$data['user_id']  	  = $this->session->userdata('userid');
		 	$userid 			  = $this->session->userdata('userid');
		 	$data['users']   	  = $this->User_model->get_users_details($userid);
			$data['product_wish'] = $this->front_model->get_wishlist();

			$this->load->view('front/includes/header-after-login',$data);
		}
	    else
	    {
			$this->load->view('front/includes/header');
		}
			
		$this->load->view('front/about-us',$data);
		
		$data['footer'] = $this->Sitevisitor_model->get_weblink();
		$this->load->view('front/includes/footer',$data);

	}



	function terms_condition()
	{	

		if($this->session->userdata('userid'))
		{
		 	$data['user_id']  	  = $this->session->userdata('userid');
		 	$userid 			  = $this->session->userdata('userid');
		 	$data['users']   	  = $this->User_model->get_users_details($userid);
			$data['product_wish'] = $this->front_model->get_wishlist();

			$this->load->view('front/includes/header-after-login',$data);
		}
	    else
	    {
			$this->load->view('front/includes/header');
		}
			
		$this->load->view('front/terms-condition',$data);
		
		$data['footer'] = $this->Sitevisitor_model->get_weblink();
		$this->load->view('front/includes/footer',$data);	

	}



	function errorpage()
	{		
		$this->load->view('page_404');	
	}
}
