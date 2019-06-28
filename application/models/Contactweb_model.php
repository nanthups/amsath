<?php
class Contactweb_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
        }

        public function web_count() 
        {
			return $this->db->count_all("website_contact");
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
    	 
    	 


 		public function get_countweb() 
		{
			    $query = $this->db->query("select * from website_contact where id !='1'");
				return $query->result();
    	}



		public function get_web($limit, $start) 
		{
				
				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$query = $this->db->query("select * from website_contact");
				return $query->result();
			
			
  	    }
		
		 public function update_web($id,$data)
		   {
			  $this->db->where('id',$id);
			  $this->db->update('website_contact',$data);
		  	}

	
		


    }
		
	