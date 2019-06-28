<?php
class User_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	function get_users_details($userid)
	{
		return $this->db->get_where('users',array('id'=>$userid))->row();
	}

	function get_all_users($username)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email !=' , $username);  
		$query = $this->db->get();  
		return $query->result();
	}

	function get_all_regusers()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('status = "active"');
		$query = $this->db->get();  
		return $query->result();
	}


	function get_user_password($userid)
	{
		return $this->db->get_where('users',array('email !='=>$userid))->row_array();
	}
	
	function changePassword($UserId='', $newPassword='')
	{
		$this->db->set('password',$newPassword);
		$this->db->where('id',$UserId);
		$this->db->update('users');
		return true;
	}
	
	function change_password($params,$username)
	 {    
	    $this->db->where('email',$username);
	    $this->db->update('users',$params);        
	 }

	function get_img($id)
	{
		return $this->db->get_where('users',array('id'=>$id))->result_array();
	}
	
	
		public function sendpassword($data) {
		$email = $data['email'];
		print_r($data);
		$query1 = $this->db->query("SELECT *  from users where email = '" .$email. "'");
		$row = $query1->result_array();

       if ($query1->num_rows() > 0) {

        $passwordplain = "";
        $passwordplain = rand(999999999, 9999999999);
        $newpass['user_password'] = md5($passwordplain);
        $this->db->where('email', $email);
        $this->db->update('users', $newpass);
        $mail_message = 'Dear ' . $row[0]['full_name'] . ',' . "\r\n";
        $mail_message .= 'Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>' . $passwordplain . '</b>' . "\r\n";
        $mail_message .= '<br>Please Update your password.';
        $mail_message .= '<br>Thanks & Regards';
        $mail_message .= '<br>Your company name';
        require FCPATH . 'assets/PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPSecure = "tls";
        $mail->Debugoutput = 'html';
        $mail->Host = "ssl://smtp.googlemail.com";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = "xxxxxxxxx@gmail.com";
        $mail->Password = "xxxxxxxx";
        $mail->setFrom('xxxxxxx@gmail.com', 'admin');
        $mail->IsHTML(true);
        $mail->addAddress('email', $email);
        $mail->Subject = 'OTP from company';
        $mail->Body = $mail_message;
        $mail->AltBody = $mail_message;

        if (!$mail->send()) 
        {
            $this->session->set_flashdata('msg', 'Failed to send password, please try again!');
        } 
        else 
        {
            echo $this->email->print_debugger();
            $this->session->set_flashdata('msg', 'Password sent to your email!');
        }
    }
}

	public function profile_updates($id,$params)
	{
		$this->db->where('id',$id);
		$this->db->update('users',$params);  			
	}
	
	public function update_images($id,$params)
	{
		$this->db->where('id',$id);
		$this->db->update('users',$params);  				
	}

	function get_not_null($tablename='', $fields='',$fieldid='', $id='')
	{
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where("$fields IS NOT NULL");
		$this->db->where($fieldid, $id);  
		return $this->db->get()->result_array();
	}

	function returnFollower($id='', $status='')
	{
		$this->db->from('user_follower');
		$this->db->join('users', 'users.id = user_follower.following_id');
		if ($status) { $this->db->where('users.status','active'); }
		$this->db->where('user_follower.follower_id',$id);
		$this->db->select(' users.image, users.fname, users.sname, users.place, users.status, users.id');
		return $this->db->get()->result_array();
	}

	function returnFollowing($id='')
	{
		$this->db->from('user_follower');
		$this->db->join('users', 'users.id = user_follower.follower_id');
		$this->db->where('user_follower.following_id',$id);
		$this->db->select(' users.image, users.fname, users.sname, users.place, users.status, users.id');
		return $this->db->get()->result_array();
	}

	function returnFriends($id='')
	{
		$this->db->from('user_follower');
		$this->db->join('users', 'users.id = user_follower.following_id');
		$this->db->where('users.status','active');
		$this->db->where('user_follower.follower_id',$id);
		$this->db->where('user_follower.following_id',$id);
		$this->db->where('users.id !=',$id);
		$this->db->select(' users.image, users.fname, users.sname, users.place, users.status, users.id');
		return $this->db->get()->result_array();
	}

	public function follow($id)
	{
		$userid = $this->session->userdata('userid');
		$this->db->insert('user_follower',['follower_id' => $id, 'following_id' => $userid, 'foll_from' => date("Y-m-d")]);
	}

	public function unfollow($id)
	{
		$userid = $this->session->userdata('userid');
		$this->db->where('following_id',$userid);
		$this->db->where('follower_id',$id);
		$this->db->delete('user_follower');
	}

	public function user_count() 
	{
		return $this->db->count_all("admin");
	} 
	public function user_countsearch($a,$b) 
	{

		$query = $this->db->query("SELECT * FROM admin WHERE admin.username ='$a' AND admin.user_type='$b'");
		return $query->result();

	}

	public function get_countuser() 
	{
		$query = $this->db->query("select * from admin where id !='1'");
		return $query->result();
	}

	public function get_userssearch($limit, $start,$a,$b) 
	{
		$this->db->order_by('id','desc');
		$this->db->limit($limit, $start);
		$query = $this->db->query("SELECT * FROM admin WHERE admin.username LIKE '%$a%' AND admin.user_type LIKE '%$b%' AND id !='1'");
		return $query->result();


	}
	public function get_users($limit, $start) 
	{
		$this->db->order_by('id','desc');
		$this->db->limit($limit, $start);
		$query = $this->db->query("select * from admin ");
		return $query->result();
	}

	public function chk_users()
	{
		$username = $this->input->post('username');
		$query = $this->db->get_where('admin', array('username' => $username));

		if($query->num_rows()>0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function set_user()
	{
		$this->load->library('password');
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->password->encrypt_password($this->input->post('password')),
			'user_type' => $this->input->post('user_type')
		);
		return $this->db->insert('admin', $data);
	}

	public function delete_user($admin_id)
	{
		$this->db->where('id',$admin_id);
		$this->db->delete('admin');
	}

	public function change_active($id,$status)
	{
		if($status=='active')
		{
			$this->db->where('id',$id);
			$this->db->update('admin',array('status'=>'inactive'));
		}
		else 
		{
			$this->db->where('id',$id);
			$this->db->update('admin',array('status'=>'active'));
		}

	}

	public function update_user($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('admin',$data);
	}
	public function get_row($tablename='',$fields='',$where='')
	{
		$this->db->where($where);
		$this->db->select($fields);
		$this->db->from($tablename);
		$query = $this->db->get();
		$result = $query->row(); 
		return $result;
	}
	public function chk_user()
	{
		$username = $this->input->post('username');
		$id=$this->input->post('id');
		$query = $this->db->query("select * from `admin` where username='$username' and id!='$id'");
		if($query->num_rows()>0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	function get_all_ads($id)
	{
		$this->db->select('*');   
		$this->db->from('users_ads');
		$this->db->join('jobs_category', 'jobs_category.jobs_id'. '='. 'users_ads.jobs_category');
		$this->db->join('users', 'users.id'. '='. 'users_ads.user_id');
		$this->db->where('users_ads.user_id' , $id);  
		return $this->db->get()->result_array(); 
	}
	
	
	function fetchJoin($user_id='')
	{
	    $user_id;
		$this->db->select('*');   
		$this->db->from('users_contact');
		$this->db->join('users', 'users.id'. '='. 'users_contact.user_id');
		$this->db->group_by('users_contact.user_id');
		$this->db->order_by('users_contact.user_id','desc');
		$this->db->where('users_contact.user_id', $user_id);
		return $this->db->get()->row();
	}
	
	function load_wishlist($tableOne='',$tableTwo='',$fieldOne='',$fieldTwo='',$where='', $id='')
	{
		$this->db->select('*');   
		$this->db->from($tableOne);
		$this->db->join($tableTwo, $tableTwo.'.'.$fieldTwo. '='. $tableOne.'.'.$fieldOne);
		$this->db->group_by($tableOne.'.'.$fieldOne);
		$this->db->order_by($tableOne.'.'.$fieldOne,'desc');
		$this->db->where($tableOne.'.'.$where, $id);
		return $this->db->get()->result_array();
	}

	function load_ads()
	{
		$this->db->select('*');   
		$this->db->from('users_ads');
		$this->db->join('jobs_category', 'jobs_category.jobs_id'. '='. 'users_ads.jobs_category');
		$this->db->join('users', 'users.id'. '='. 'users_ads.user_id');
	    $this->db->group_by('users_ads.ads_id');
		$this->db->order_by('users_ads.ads_id','desc');
		return $this->db->get()->result_array();
	}
	
	function count_follow($table='',$field='',$userid)
	{
	   $this->db->select('*');   
	   $this->db->from($table); 
       $this->db->where($field, $userid);
       return $this->db->get()->num_rows();
	}
   function follow_noti($userid='')
	{
	  $this->db->select('fname');   
	  $this->db->from('user_follower');
	  $this->db->join('users', 'users.id'. '='. 'user_follower.follower_id');
      $this->db->where('foll_from BETWEEN DATE_SUB(NOW(), INTERVAL 5 DAY) AND NOW()');
      $this->db->where('following_id', $userid);
      return $this->db->get()->result_array();
	}
	  function msg_noti($userid='')
	{
	  $this->db->select('*');   
	  $this->db->from('visitor_msg');
	  $this->db->where('vstmsg_date BETWEEN DATE_SUB(NOW(), INTERVAL 5 DAY) AND NOW()');
      $this->db->where('user_id', $userid);
      print_r($this->db->get()->result_array());
	}
}