<?php
class Category1_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
        }

        public function cat1_count() 
		{
			return $this->db->count_all("category1");
    	} 


		public function cat1_countsearch($a,$b=NULL) 
		{
			
		        $query = $this->db->query("SELECT * FROM category1 WHERE category LIKE '%$a%'");
				return $query->result();
				
    	}
		
 		public function get_countcat() 
		{
			    $query = $this->db->query("select * from category1 where id !='1'");
				return $query->result();
    	}


    	public function get_cat1search($limit, $start,$a) 
		{
				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$query = $this->db->query("SELECT * FROM category1 WHERE category LIKE '%$a%' AND id !='1'");
				return $query->result();

  	    }

		public function get_cat1($limit, $start) 
		{
				
				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$query = $this->db->query("select * from category1");
				return $query->result();
			
  	    }

  	    public function get_fullcat1() 
		{
			
				$this->db->order_by('id','desc');
				$query = $this->db->query("select * from category1");
				return $query->result_array();
			
  	    }

		
		public function set_cat1()
		{
		    	
				$data = array('category' => $this->input->post('category'),'status'=>$this->input->post('status'));
				
				return $this->db->insert('category1', $data);
		}
		
		public function delete_cat1($id)
		{
		
				$this->db->where('id',$id);
				$this->db->delete('category1');
		
		}

  		public function update_cat1($id,$data)
  		{
  				
				$this->db->where('id',$id);
				$this->db->update('category1',$data);	
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


		public function chk_cat1()
		  {
				
				$category  = $this->input->post('category');
				$id        = $this->input->post('id');
				$query     = $this->db->query("select * from `category1` where category='$category' and id!='$id'");
				if($query->num_rows()>0)
				{
					return false;
				}
				else
				{
					return true;
			 	}
         
		}
	

    }
		
	