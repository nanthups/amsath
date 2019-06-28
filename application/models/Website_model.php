<?php
class Website_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
        }

		public function get_website() 
		{			
				$query = $this->db->query("select * from website_contact where id =1");
				return $query->result();						
  	    }

		
		public function set_website($data)
		{
		    $this->db->where('id',1);
			return $this->db->update('website_contact', $data);
		}
		
		
    }
		
	