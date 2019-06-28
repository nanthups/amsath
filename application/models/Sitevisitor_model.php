<?php
class Sitevisitor_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
        }
        public function new_signup_registeration($params)
		{
			return $this->db->insert('users',$params);
		}
        function check_emailid($email)
		{
			return $this->db->get_where('users',array('email'=>$email))->row_array();
		}
		function login_check($username,$password)
		{
			return $this->db->get_where('users',array('email'=>$username,'password'=>$password))->row_array();			
		}

		public function get_expert() {
			$this->db->select('id,fname,sname,type,image');
			$this->db->limit(12, 0);
			$query = $this->db->get('users');

			return $query->result();
			
		}
		
		    public function get_weblink()
			{
			$this->db->select('land_number,mobile_number,email,facebook_id,twitter_id,google_id,insta_id,youtub_id,meta_titile');
			$query = $this->db->get('website_contact');
			return $query->result();
			
		}
	
		public function common_search($tableName='', $field='', $search='')
		{
			$this->db->select('*');
			$this->db->from($tableName);
			$this->db->like($field, $search);
			return $this->db->get()->result();
		}
	
	
	  }