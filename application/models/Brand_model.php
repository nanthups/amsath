<?php
class Brand_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
        }
		
	 	public function bar_count() 
		{
			return $this->db->count_all("brand");
    	} 

		

    	public function get_bar($limit,$start) 
		{
			$this->db->order_by('id','desc');
			$this->db->limit($limit, $start);
			$query = $this->db->get("brand");
			return $query->result();
			
			
  	     }
		 public function get_barsearch($limit, $start,$search) 
		{
			
		 $this->db->limit($limit, $start);
	   	 $this->db->like('brand_name',$search);
       	 $query = $this->db->get("brand");
		 if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        	}
        return false;
  	  }
  	     
		
  		public function chk_bar()
		{
				
				$brand_name = $this->input->post('brand_name');
				$query      = $this->db->get_where('brand', array('brand_name' => $brand_name));
				
				if($query->num_rows()>0)
				{
					return false;
				}
				else
				{
					return true;
			 	}
         
		}


		 public function get_fullbrand() 
		{
			
				$this->db->order_by('id','desc');
				$query = $this->db->query("select * from brand");
				return $query->result_array();
			
  	    }
		
		 public function set_bar()
		 {
		  
			$data = array('brand_name' => $this->input->post('brand_name'));
				return $this->db->insert('brand', $data);
		  
		  }
		 
		 public function delete_bar($id)
		  
		  
		 {
		      $this->db->where('id',$id);
			  $this->db->delete('brand');
		 } 
		
		 
		  public function update_bar($id,$data)
		   {
			  $this->db->where('id',$id);
			  $this->db->update('brand',$data);
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

		    public function bar_countsearch($a,$b=NULL) 
		{
			
		        $query = $this->db->query("SELECT * FROM brand WHERE brand_name LIKE '%$a%'");
				return $query->result();
				
    	}
				
}




