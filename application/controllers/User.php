<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('password');
		$this->load->library('UserAuth');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->model(['front_model', 'CommonModel', 'User_model']);
		$this->load->model('Sitevisitor_model');
		$this->load->library("cart");
  }	

  /** User Dashboard **/
  public function dashboard()
  {
    $this->userauth->logged_in();
    $userid = $this->session->userdata('userid');
    $data['itemCount'] = $this->CommonModel->totalRows('sell_files', 'user_id', $userid);
    $data['users'] = $this->User_model->get_users_details($userid);	
    $this->load->view('user/seller-dashboard', $data);
  }

  /** Seller Files **/
  function sellfiles()
  {       
    $this->userauth->logged_in();
    $userid = $this->session->userdata('userid');
    $data['files_category'] = $this->CommonModel->getAll('file_category');
    $data['users'] = $this->User_model->get_users_details($userid); 
    $this->load->view('user/seller-files',$data);    
  }

  /** Seller Shop **/
  function sellshop()
  {       
    $this->userauth->logged_in();
    $userid = $this->session->userdata('userid');
    $data['users'] = $this->User_model->get_users_details($userid); 
    $data['files'] = $this->CommonModel->getImageList(NULL,NULL, $userid);
    $this->load->view('user/seller-shop',$data);    
  }

  /** Seller Shop **/
  function sellwork()
  {       
    $this->userauth->logged_in();
    $userid = $this->session->userdata('userid');
    $data['users'] = $this->User_model->get_users_details($userid); 
    $data['files'] = $this->CommonModel->fetchJoinAll('sell_files', 'file_category', 'category', 'id');
    $this->load->view('user/seller-works',$data);    
  }

  function manage_works($type)
  {
    $this->userauth->logged_in();
    $userid=$this->session->userdata('userid');
    $data['users']=$this->User_model->get_users_details($userid); 

    $work_link = $this->input->post('work_link');
    $work_title = $this->input->post('work_title');
    if ($type == 'photo') {

      $filecount = count($_FILES['work_file']['name']);

      for ($i=0; $i < $filecount ; $i++) 
      { 
        $_FILES['work_file1']['name']=$_FILES['work_file']['name'][$i];
        $_FILES['work_file1']['type']=$_FILES['work_file']['type'][$i];
        $_FILES['work_file1']['tmp_name']=$_FILES['work_file']['tmp_name'][$i];
        $_FILES['work_file1']['error']=$_FILES['work_file']['error'][$i];
        $_FILES['work_file1']['size']=$_FILES['work_file']['size'][$i];
        $config['upload_path']="./uploads/userwork/";
        $config['allowed_types']="gif|png|jpg|jpeg";
        $config['max_size']="1000000";
        $config['max_width']="10000";
        $config['max_height']="10000";
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('work_file1'))
        {
          $data= $this->upload->data();
          $data= $this->upload->data();
          $configg['image_library']='gd2';
          $config['source_image']=$data['full_path'];
          $config['maintain_ratio']=TRUE;
          $config['width']=75;
          $config['height']=75;
          $config['new_image']="./uploads/small/".$_FILES['work_file1']['name'];
          $this->image_lib->initialize($config);
          $this->image_lib->resize();
          $dataarray = array(
            'user_id' => $userid, 
            'file_type' => $type, 
            'work_file' => $data['file_name'],
            'work_link' => $work_link,
            'work_title' => $work_title,
          );
          $this->CommonModel->insertData('users_works', $dataarray);
          $this->session->set_flashdata('alert','Uploaded Successfully');
        }
      }
    }
    else
    {
      $dataarray = array(
        'user_id' => $userid, 
        'file_type' => $type, 
        'work_file' => '',
        'work_link' => $work_link,
        'work_title' => $work_title,
      );
      $this->CommonModel->insertData('users_works', $dataarray);
      $this->session->set_flashdata('alert','Link saved Successfully');
    }
    redirect('user-user-works');
  }

  function delete_work($id)
  {
   $this->userauth->logged_in();
   $return = $this->CommonModel->deleteOfId('users_works', 'uw_id', $id);
   if($return)
   {
    $this->session->set_flashdata('alert', 'Deleted Successfully');
  }
  redirect('user-profile');
}
/** User Profile **/

function profile($getid='')
{
   
  if ($getid == NULL) :
   $user_id = $this->session->userdata('userid');
 else:
  $user_id = $getid;
endif;
  $data['users'] = $this->User_model->get_users_details($user_id);
  $data['flowr'] =  $this->User_model->count_follow('user_follower','follower_id',$user_id);
  $data['flowg'] =  $this->User_model->count_follow('user_follower','following_id',$user_id);
  $data['biography'] = $this->CommonModel->getAll('user_bio', 'user_id', $user_id);
  $data['contact'] = $this->User_model->fetchJoin($user_id);
  $data['appearance'] = $this->CommonModel->returnOfId('users_appear', 'user_id', $user_id);
  $data['work_file'] = $this->User_model->get_not_null('users_works', 'work_file', 'user_id', $user_id);
  $data['work_link'] = $this->User_model->get_not_null('users_works', 'work_link', 'user_id', $user_id);
  $data['agreements'] = $this->User_model->get_not_null('users_agreement', 'agr_title', 'user_id', $user_id);
  $data['followers'] = $this->User_model->returnFollower($user_id);
  $data['following'] = $this->User_model->returnFollowing($user_id);
  $data['follow_noti']=$this->User_model->follow_noti($user_id);
  $data['msg_noti']=$this->User_model->msg_noti($user_id);
  //print_r($data['msg_noti']);
  $data['friends'] = array_intersect($data['following'],$data['followers']);
  $data['groups'] = $this->CommonModel->getAll('users_group');
  $data['usersadds'] = $this->CommonModel->getAll('users_ads', 'user_id', $user_id);
  $data['footer'] = $this->Sitevisitor_model->get_weblink();
    if($this->session->userdata('userid'))
    {
        $data['user_id']      = $this->session->userdata('userid');
        $userid               = $this->session->userdata('userid');
        $data['products']     = $this->front_model->get_wishlist();
    }
  ($this->userauth->login_return() == true)?
   $this->load->view('front/includes/header'):
   $this->load->view('front/includes/header-after-login',$data);
   $this->load->view('front/profile',$data);	
   $this->load->view('front/includes/footer',$data);
}


/** Edit Profile **/
function edit_profile()
{
  $this->userauth->logged_in();
  $userid=$this->session->userdata('userid');
  $data['users']=$this->User_model->get_users_details($userid);	
  $this->load->view('user/profile-settings',$data);	
}

/** Edit Biography **/
function edit_bio()
{
  $this->userauth->logged_in();
  $userid=$this->session->userdata('userid');
  $data['biography'] = $this->CommonModel->getAll('user_bio', 'user_id', $userid);
  $data['users']=$this->User_model->get_users_details($userid); 
  $this->load->view('user/profile-biography',$data); 
}

/** Edit Contact **/
function edit_contact()
{
  $this->userauth->logged_in();
  $userid=$this->session->userdata('userid');
  $data['contact'] = $this->CommonModel->fetchJoinAll('users', 'users_contact', 'id', 'user_id', $userid);
  $data['users']=$this->User_model->get_users_details($userid); 
  $this->load->view('user/contact-details',$data); 
}
/** Add Biography **/
function add_biography()
{
  $this->userauth->logged_in();
  $userid=$this->session->userdata('userid');
  $data['users']=$this->User_model->get_users_details($userid); 
  $this->load->view('user/biography-details',$data); 
}

/** Edit Biography **/
function edit_biography($id)
{
  $this->userauth->logged_in();
  $userid=$this->session->userdata('userid');
  $data['biography'] = $this->CommonModel->returnOfId('user_bio','bio_id', $id);
  $data['users']=$this->User_model->get_users_details($userid); 
  $this->load->view('user/biography-details',$data); 
}

function manage_bio()
{
  $this->userauth->logged_in();
  $userid=$this->session->userdata('userid');
  $data['users']=$this->User_model->get_users_details($userid); 
  $button = $this->input->post('button');
  $bio_id = $this->input->post('bio_id');
  $data['bio_from'] = $this->input->post('bio_from');
  $data['bio_to'] = $this->input->post('bio_to');
  $data['bio_title'] = $this->input->post('bio_title');
  $data['institution'] = $this->input->post('institution');
  $data['place'] = $this->input->post('place');
  $data['description'] = $this->input->post('description');

  $this->form_validation->set_rules('bio_from', 'From', 'required');
  $this->form_validation->set_rules('bio_title', 'Title', 'required');
  $this->form_validation->set_rules('institution', 'Company', 'required');
  $this->form_validation->set_rules('place', 'Location', 'required');
  if($this->form_validation->run() === false)
  {
    $data['users'] = $this->User_model->get_users_details($userid); 
    $this->load->view('user/biography-details',$data); 
  }
  else
  {
    $bio_to = new DateTime($data['bio_to']);
    $dataarray = array(
      'user_id' => $userid,
      'bio_title' => $data['bio_title'],
      'bio_from' => date('Y-m-d',strtotime($data['bio_from'])),
      'bio_to' => $bio_to->format('Y-m-d'),
      'institution' => $data['institution'],
      'place' => $data['place'],
      'description' => $data['description'],
    );
    if ($button == 'submit')
    {
     $return = $this->CommonModel->insertData('user_bio', $dataarray);
     $this->session->set_flashdata('alert','Biography added Successfully');
   }
   elseif ($button == 'update') 
   {
    $return = $this->CommonModel->updateData('user_bio', $dataarray, 'bio_id', $bio_id);
    $this->session->set_flashdata('alert','Biography updated Successfully');
  }
  redirect('user-biography');
}
}

/** Edit Appearance **/
function edit_appearance()
{
  $this->userauth->logged_in();
  $userid=$this->session->userdata('userid');
  $data['appearance'] = $this->CommonModel->returnOfId('users_appear', 'user_id', $userid);
  $data['users']=$this->User_model->get_users_details($userid); 
  $this->load->view('user/appearance-details',$data); 
}

function appearance_update()
{
  $userid = $this->session->userdata('userid');
  $dataArray = array(
    'user_id'=>$userid,
    'ua_gender'=>$this->input->post('ua_gender'),
    'ua_height'=>$this->input->post('ua_height'),
    'ua_waist'=>$this->input->post('ua_waist'),
    'ua_chest'=>$this->input->post('ua_chest'),
    'ua_collar'=>$this->input->post('ua_collar'),
    'ua_inseam'=>$this->input->post('ua_inseam'),
    'ua_suit'=>$this->input->post('ua_suit'),
    'ua_sleev'=>$this->input->post('ua_sleev'),
    'ua_shoe_size'=>$this->input->post('ua_shoe_size'),
    'ua_hair_colour'=>$this->input->post('ua_hair_colour'),
    'ua_eye_colour'=>$this->input->post('ua_eye_colour')
  );

  $count = $this->CommonModel->totalRows('users_appear', 'user_id', $userid);
  if ($count > 0)
  {
   $return = $this->CommonModel->updateData('users_appear', $dataArray, 'user_id', $userid);
   $this->session->set_flashdata('alert','Appearance updated Successfully');
 }
 else
 {
   $return = $this->CommonModel->insertData('users_appear', $dataArray);
   $this->session->set_flashdata('alert','Appearance inserted Successfully');
 }
 redirect('user-appearance');
}

public function delete_bio($id)
{
  $this->userauth->logged_in();
  $return = $this->CommonModel->deleteOfId('user_bio', 'bio_id', $id);
  if ($return)
  {
    $this->session->set_flashdata('alert', 'Biography deleted Successfully');
  }
  redirect('user-bio');
}

/** Follow **/
function follow($id)
{
 $this->userauth->logged_in();
 return $this->User_model->follow($id); 
}

/** Unfollow **/
function unfollow($id)
{
 $this->userauth->logged_in();
 return $this->User_model->unfollow($id); 
}

/** List Ads **/
function listads()
{       
  $this->userauth->logged_in();
  $userid = $this->session->userdata('userid');
  $data['users'] = $this->User_model->get_users_details($userid); 
  $data['ads'] = $this->User_model->load_wishlist('users_ads', 'jobs_category', 'jobs_category', 'jobs_id', 'user_id', $userid);
  $this->load->view('user/ads-listing',$data);    
}

/** Add Ads **/
function addads()
{  
 $data['head']= "Create";     
 $this->userauth->logged_in();
 $userid = $this->session->userdata('userid');
 $data['users'] = $this->User_model->get_users_details($userid); 
 $data['jobs'] = $this->CommonModel->getAll('jobs_category');
 $this->load->view('user/ads-add',$data);    
}

/** Insert Ads **/
function manage_ads()
{    
  $this->userauth->logged_in();
  $userid=$this->session->userdata('userid');
  $data['users']=$this->User_model->get_users_details($userid); 
  $button = $this->input->post('button');
  $ads_id = $this->input->post('ads_id');
  $data['ads_title'] = $this->input->post('ads_title');
  $data['jobs_category'] = $this->input->post('jobs_category');
  $data['ads_cost'] = $this->input->post('ads_cost');
  $data['ads_description'] = $this->input->post('ads_description');
  $data['ads_person'] = $this->input->post('ads_person');
  $data['ads_expire'] = $this->input->post('ads_expire');

  $this->form_validation->set_rules('ads_title', 'Title', 'required');
  $this->form_validation->set_rules('jobs_category', 'Category', 'required');
  $this->form_validation->set_rules('ads_cost', 'Cost', 'required');
  $this->form_validation->set_rules('ads_description', 'Description', 'required');
  $this->form_validation->set_rules('ads_person', 'Number', 'required');
  $this->form_validation->set_rules('ads_expire', 'Expire Data', 'required');
  if($this->form_validation->run() === false)
  {
    $data['head']= "Create";
    $data['jobs'] = $this->CommonModel->getAll('jobs_category');
    $this->load->view('user/ads-add',$data); 
  }
  else
  {
    $ads_expire = new DateTime($data['ads_expire']);
    $dataarray = array(
      'user_id' => $userid,
      'ads_title' => $data['ads_title'],
      'jobs_category' => $data['jobs_category'],
      'ads_cost' => $data['ads_cost'],
      'ads_description' => $data['ads_description'],
      'ads_person' => $data['ads_person'],
      'ads_expire' => $ads_expire->format('Y-m-d'),
    );
    if ($button == 'Create')
    {
     $return = $this->CommonModel->insertData('users_ads', $dataarray);
     $this->session->set_flashdata('alert','Ad added Successfully');
   }
   elseif ($button == 'Update') 
   {
    $return = $this->CommonModel->updateData('users_ads', $dataarray, 'ads_id', $ads_id);
    $this->session->set_flashdata('alert','Ad updated Successfully');
  }
  redirect('user-ads-listing');
}   
}

/** Return Ads **/
function returnads($ads_id)
{    
 $data['head']= "Update";  
 $this->userauth->logged_in();
 $userid = $this->session->userdata('userid');
 $data['users'] = $this->User_model->get_users_details($userid); 
 $data['jobs'] = $this->CommonModel->getAll('jobs_category');
 $return = $this->CommonModel->returnOfId('users_ads', 'ads_id ', $ads_id);
 $data['ads_id'] = $return->ads_id;
 $data['ads_title'] = $return->ads_title;
 $data['jobs_category'] = $return->jobs_category;
 $data['ads_cost'] = $return->ads_cost;
 $data['ads_description'] = $return->ads_description;
 $data['ads_person'] = $return->ads_person;
 $data['ads_expire'] = $return->ads_expire;
 $this->load->view('user/ads-add',$data);    
}

function deleteads($ads_id)
{
 $this->userauth->logged_in();
 $return = $this->CommonModel->deleteOfId('users_ads', 'ads_id', $ads_id);
 if($return)
 {
  $this->session->set_flashdata('alert', 'Deleted Successfully');
}
redirect('user-ads-listing');
}

/** Change Password **/
function chngpwd_exe()
{	
 $this->userauth->logged_in();
 $oldpassword             = $this->input->post('password');
 $newpassword             = $this->input->post('newpassword');
 $retypepassword          = $this->input->post('retypepassword');
 $userid                  = $this->session->userdata('userid');
 $users                   = $this->User_model->get_users_details($userid);  
 if ($newpassword == $retypepassword && $users->password == $oldpassword) 
 {
  $return = $this->User_model->changePassword($userid, $newpassword);
  $this->session->set_flashdata('alert','Password Changed Successfully');
  redirect('user-profile-settings');
}
else
{
  $this->session->set_flashdata('alert',' Current password Missmatch');
  redirect('user-profile-settings');
}
}

/** logout **/
public function logout()
{
  $this->userauth->logged_in();
  $userid=$this->session->userdata('userid');
  $this->CommonModel->setData('users', 'status', 'inactive', 'id', $userid);
  $this->session->sess_destroy();
  redirect('user-profile-settings');
}

/** Profile update **/
function profile_update($id, $image)
{
  $config['upload_path']='./uploads/users';
  $config['allowed_types']='jpg|jpeg|png';
  $config['max_size']='25000';
  $config['overwrite']  = TRUE;
  $this->load->library('upload',$config);
  $this->upload->initialize($config);

  if (!$this->upload->do_upload('image'))
  {
    $imageName = $image;
  }
  else
  {
    $info = $this->upload->data();
    $imageName = $info["file_name"];
  }
  $params=array('fname'=>$this->input->post('fname'),
    'sname'=>$this->input->post('sname'),
    'image'=>$imageName,
    'email'=>$this->input->post('email'),
    'phone'=>$this->input->post('phone'),
    'place'=>$this->input->post('place'),
    'facebook_id'=>$this->input->post('facebook_id'),
    'twitter_id'=>$this->input->post('twitter_id'),
    'instagram_id'=>$this->input->post('instagram_id'),
    'youtube_ch'=>$this->input->post('youtube_ch')
  );
  $this->User_model->profile_updates($id,$params);
  $this->session->set_flashdata('alert', 'Profile Updated Sucessfully');
  redirect('user-profile-settings');	 
}

/** Profile update **/
function contact_update()
{
  $userid = $this->session->userdata('userid');
  $dataArray = array(
    'user_id'=> $userid,
    'mobile'=>$this->input->post('mobile'),
    'whatsapp'=>$this->input->post('whatsapp'),
    'skype'=>$this->input->post('skype'),
    'address'=>$this->input->post('address'),
    'behance'=>$this->input->post('behance'),
  );
  $count = $this->CommonModel->totalRows('users_contact', 'user_id', $userid);
  if ($count > 0)
  {
   $return = $this->CommonModel->updateData('users_contact', $dataArray, 'user_id', $userid);
   $this->session->set_flashdata('alert','Contact updated Successfully');
 }
 else
 {
   $return = $this->CommonModel->insertData('users_contact', $dataArray);
   $this->session->set_flashdata('alert','Contact inserted Successfully');
 }
 redirect('user-contact');
}
/** User Notification **/
function user_noti()
{
  $this->userauth->logged_in();
  $userid = $this->session->userdata('userid');
  $notification = $this->input->post('notification');
  if ($notification) :
    $this->CommonModel->updateOneData('users', 'email_noti', 'Y', 'id', $userid);
    $this->session->set_flashdata('alert','Permission updated Successfully');
    redirect('user-profile-settings');
  else:
   $this->CommonModel->updateOneData('users', 'email_noti', 'N', 'id', $userid);
   $this->session->set_flashdata('alert','Permission disabled updated Successfully');
   redirect('user-profile-settings');
 endif;
}


/** Delete User **/
function delete_profile()
{
  $this->userauth->logged_in();
  $userid = $this->session->userdata('userid');
  $inputOne = $this->input->post('inputDelete');
  $this->form_validation->set_rules('inputDelete', 'Delete option', 'required');
  if($this->form_validation->run() === false):
    $this->session->set_flashdata('error','Select a option for deletion');
    redirect('user-profile-settings');
  else:
    if ($inputOne == 'deleteFull') :
     $return = $this->CommonModel->deleteOfId('user_bio', 'user_id', $userid);
     if ($return) : $this->CommonModel->deleteOfId('user_bio', 'user_id', $userid);
       $this->CommonModel->deleteOfId('users_works', 'user_id', $userid);
       $this->CommonModel->deleteOfId('users_contact', 'user_id', $userid);
       $this->CommonModel->deleteOfId('users_appear', 'user_id', $userid);
       $this->CommonModel->deleteOfId('users_agreement', 'user_id', $userid);
       $this->CommonModel->deleteOfId('users_ads', 'user_id', $userid);
       $this->CommonModel->deleteOfId('sell_files', 'user_id', $userid);
       $this->CommonModel->deleteOfId('users', 'id', $userid);
       $this->session->unset_userdata('userid', 'fname', 'email', 'image');
     endif;
     redirect();
   elseif ($inputOne == 'deleteAccount'):
    $return = $this->CommonModel->deleteOfId('user_bio', 'user_id', $userid);
    if ($return) : $this->CommonModel->deleteOfId('user_bio', 'user_id', $userid);
     $this->CommonModel->deleteOfId('users_works', 'user_id', $userid);
     $this->CommonModel->deleteOfId('users_contact', 'user_id', $userid);
     $this->CommonModel->deleteOfId('users_appear', 'user_id', $userid);
     $this->CommonModel->deleteOfId('users', 'id', $userid);
     $this->session->unset_userdata('userid', 'fname', 'email', 'image');
   endif;
   redirect();
 endif;
endif;
}

/** User Message **/
function user_message($user_id)
{
  $email = $this->input->post('email');
  $message = $this->input->post('message');
  $name = $this->input->post('name');
  $dataArray = array('user_id'=>$user_id, 'vst_name'=>$name, 'vst_mail'=>$email, 'vst_message'=>$message, 'vstmsg_date'=>date("Y-m-d"));
  $this->CommonModel->insertData('visitor_msg', $dataArray);
  $this->session->set_flashdata('msg_sent','Message sent Successfully');
  redirect('user-profile/'.$user_id);
}


public function addcart()
{
 $id=$this->input->post('id');
 if($this->session->userdata('cart')){
  $cart=$this->session->userdata('cart');
  foreach($cart as $cart){
   $id1=$cart;
   if($id1 == $id){
    $this->session->set_flashdata('crt-msg','Already in cart');
    redirect('index');

  }
}

$cart=$this->session->userdata('cart');

array_push($cart, $id);
$this->session->set_userdata('cart',$cart);

}
else{

  $cart=array();
  array_push($cart,$id);
  $this->session->set_userdata('cart',$cart);
}

echo count($cart);

}

//****forgotPassword*******//
	public function forgotpassword(){

	$email = $this->input->post('email');
	$finduser = $this->User_model->get_users_details($email);

		if(!empty($finduser)) 
		{
		$this->email->from('lakshmicute32100kochi@gmail.com', 'AMSATH');


		$this->email->to($finduser['email']);
		$this->email->subject('subject');
		$this->email->message('Your Old Password is '.$finduser['password']);
		$this->email->send();
		$this->session->set_flashdata('msg', 'Password send your mail.');
		} 
	    else 
	    {
		$this->session->set_flashdata('msg', 'Email not found!');
		}
		$this->load->view('front/reset-password');

}	

}
