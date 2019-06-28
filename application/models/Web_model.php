<?php
class Web_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
        }

        public function web_count() 
        {
			return $this->db->count_all("users_contact");
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
    	 
    	 
    	 


		public function web_countsearch($a=NULL,$b=NULL) 
		{

		    if($b!=NULL) {
			$this->db->where('user_id',$b); }

			$this->db->like('mobile',$a);
			$query = $this->db->get("users_contact");

			return $query->result();

		}

		public function get_uname()
		{
			
			$this->db->select('id,fname');
			$query = $this->db->get("users");
			return $query->result();
		}

		
 		public function get_countweb() 
		{
			    $query = $this->db->query("select * from users_contact where uc_id !='1'");
				return $query->result();
    	}


    	public function get_websearch($limit, $start,$a=NULL,$b=NULL) 
		{
			  $this->db->order_by('uc_id','desc');

			    if($b!=NULL) {
				$this->db->where('user_id',$b); }
				$this->db->limit($limit, $start);
				$this->db->like('mobile',$a);
				$query = $this->db->get("users_contact");

				return $query->result();


			}
			
			
  	 

		public function get_web($limit, $start) 
		{
				
				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$this->db->join('users', 'users.id = users_contact.user_id');
				$query = $this->db->get("users_contact");
				return $query->result();
			
			
  	    }

		
		public function set_web()
		{
		    	
		   $data = array('user_id' => $this->input->post('user_id'),'mobile'=>$this->input->post('mobile'),'whatsapp'=>$this->input->post('whatsapp'),'skype'=>$this->input->post(' 	skype'),'address'=>$this->input->post('address'),'behance'=>$this->input->post('behance'));


		 

				return $this->db->insert('users_contact', $data);
		}
		
		public function delete_web($uc_id)
		{
		
				$this->db->where('uc_id',$uc_id);
				$this->db->delete('users_contact');
		
		}

		


    }
		
	