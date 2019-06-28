<?php
class Words_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
        }
		
	 	public function w_count() 
		{
			return $this->db->count_all("list_chat_words");
    	} 

		

    	public function get_w($limit,$start) 
		{
			$this->db->order_by('id','desc');
			$this->db->limit($limit, $start);
			$query = $this->db->get("list_chat_words");
			return $query->result();
			
			
  	     }
		 public function get_wsearch($limit, $start,$search) 
		{
			
		 $this->db->limit($limit, $start);
	   	 $this->db->like('words',$search);
       	 $query = $this->db->get("list_chat_words");
		 if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        	}
        return false;
  	  }
  	     
		
  		public function chk_w()
		{
				
				$words = $this->input->post('words');
				$query      = $this->db->get_where('list_chat_words', array('words' => $words));
				
				if($query->num_rows()>0)
				{
					return false;
				}
				else
				{
					return true;
			 	}
         
		}


		
		public function set_words()
		{
		    	
				$data = array('words' => $this->input->post('words'));
				return $this->db->insert('list_chat_words', $data);
		}
		 
		 public function delete_w($id)
		  
		  
		 {
		      $this->db->where('id',$id);
			  $this->db->delete('list_chat_words');
		 } 
		
		 
		  public function update_w($id,$data)
		   {
			  $this->db->where('id',$id);
			  $this->db->update('list_chat_words',$data);
		  	}
   		  public function get_row($tablename='',$fields='',$where='')
		   {
		
				$this->db->where($where);
				$this->db->select($fields);
				$this->db->from($tablename);
				$query  = $this->db->get();
				$result = $query->row(); 
				return $result;
		    }

		    public function w_countsearch($a,$b=NULL) 
		{
			
		        $query = $this->db->query("SELECT * FROM list_chat_words WHERE words LIKE '%$a%'");
				return $query->result();
				
    	}
				
}




