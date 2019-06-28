<?php
class Coupon_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
        }

        public function cou_count() 
        {
			return $this->db->count_all("discount_coupon");
        }
    	 


		public function cou_countsearch($a,$b) 
		{
			
		        $query = $this->db->query("SELECT * FROM discount_coupon WHERE category ='$a' AND coupon_code  ='$b'");
				return $query->result();
				
    	}
		
 		public function get_countcou() 
		{
			    $query = $this->db->query("select * from discount_coupon where id !='1'");
				return $query->result();
    	}


    	public function get_cousearch($limit, $start,$a,$b) 
		{
				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$query = $this->db->query("SELECT * FROM discount_coupon WHERE category LIKE '%$a%'AND coupon_code LIKE '%$b%' AND id !='1'");
				return $query->result();
			
			
  	    }

		public function get_cou($limit, $start) 
		{
				
				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$query = $this->db->query("select * from discount_coupon ");
				return $query->result();
			
			
  	    }

		
		public function set_cou()
		{
		    	
		   $data = array('category' => $this->input->post('category'),'coupon_code'=>$this->input->post('coupon_code'),'percentage '=>$this->input->post('percentage'),'amount'=>$this->input->post('amount'),'expirydate'=>$this->input->post('expirydate'),'resamount'=>$this->input->post('resamount'),'numcount'=>$this->input->post('numcount'),'status'=>$this->input->post('status'));
		   

				return $this->db->insert('discount_coupon', $data);
		}
		
		public function delete_cou($id)
		{
		
				$this->db->where('id',$id);
				$this->db->delete('discount_coupon');
		
		}

		public function change_active($id,$status)
		{
			if($status=='active')
			 {
					$this->db->where('id',$id);
					$this->db->update('discount_coupon',array('status'=>'inactive'));
							  
			  }
			 else 
			  {
					$this->db->where('id',$id);
					$this->db->update('discount_coupon',array('status'=>'active'));
			   }
				
 		  }


		
 
  		public function update_cou($id,$data)
  		{
				$this->db->where('id',$id);
				$this->db->update('discount_coupon',$data);	
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


		public function chk_cou()
		  {
				
				$category  = $this->input->post('category');
				
				
				$id         =$this->input->post('id');
				$query      = $this->db->query("select * from `discount_coupon` where category='$category' and id!='$id'");
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
	
	
	