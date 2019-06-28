<?php
class Category2_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
        }

   //      public function cat2_count($id=NULL) 
   //      {
   //      	$this->db->where('cat_id',$id);
			// return $this->db->count_all("category2");
			
   //      }


        public function get_row($tablename='',$fields='',$where='')
		 {
		
				$this->db->where($where);
				$this->db->select($fields);
				$this->db->from($tablename);
				$query = $this->db->get();
				$result = $query->row(); 
				return $result;
		  }
    	 


		public function cat2_countsearch($a,$b) 
		{
			
		        $query = $this->db->query("SELECT * FROM category2 WHERE category2 ='$a'AND cat_id1 = '$b'");
				return $query->result();
				
    	}

    	public function cat2_count() 
		{
			return $this->db->count_all("category2");
    	} 

    	public function get_fullcat2() 
		{
			
				$this->db->order_by('id','desc');
				$query = $this->db->query("select * from category2");
				return $query->result_array();
			
  	    }

    	 public function full_get_search($cat1 = "") 
		{
					
				$this->db->order_by('id','desc');
				$query = $this->db->query("select * from category2 where cat_id1 = $cat1");
				return $query->result_array();
			
  	    }

		
 		public function get_countcat() 
		{
			    $query = $this->db->query("select * from category2 where id !='1'");
				return $query->result();
    	}


    	public function get_cat2search($limit, $start,$a,$b) 
		{
				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$query = $this->db->query("SELECT * FROM category2 WHERE category2 LIKE '%$a%' AND cat_id1 LIKE '%$b%' AND id !='1'");
				return $query->result();
			
			
  	    }

		public function get_cat2($limit, $start) 
		{
				
				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$query = $this->db->query("select * from category2 ");
				return $query->result();
			
  	    }

  	    public function full_get_cat2($cat1 = "") 
		{
					
				$this->db->order_by('id','desc');
				$query = $this->db->query("select * from category2 where cat_id1 = $cat1");
				return $query->result_array();
			
  	    }

		
		public function set_cat2()
		{
		    	
		   $data = array('category2' => $this->input->post('category2'),'cat_id1'=>$this->input->post('cat_id1'),'status'=>$this->input->post('status'));

				return $this->db->insert('category2', $data);
		}
		
		public function delete_cat2($id)
		{
		
				$this->db->where('id',$id);
				$this->db->delete('category2');
		
		}

		public function change_active($id,$status)
		{
			if($status=='active')
			 {
					$this->db->where('id',$id);
					$this->db->update('category2',array('status'=>'inactive'));
							  
			  }
			 else 
			  {
					$this->db->where('id',$id);
					$this->db->update('category2',array('status'=>'active'));
			   }
				
 		  }


  		public function update_cat2($id,$data)
  		{
				$this->db->where('id',$id);
				$this->db->update('category2',$data);	
  		}

		public function chk_cat2()
		  {
				
				$category2  = $this->input->post('category2');
				$id         =$this->input->post('id');
				$query      = $this->db->query("select * from `category2` where category2='$category2' and id!='$id'");
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
		
	