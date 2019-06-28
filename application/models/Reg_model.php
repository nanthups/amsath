<?php
class Reg_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
        }

        public function reg_count() 
        {
			return $this->db->count_all("users");
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
	    	 


		public function reg_countsearch($a=NULL,$b=NULL,$c=NULL) 
		{
			
		    $this->db->like('fname',$a);
		    $this->db->like('email',$b);
		    $this->db->like('phone',$c);
		    $this->db->like('phone',$d);
		    $this->db->like('phone',$e);
			$query = $this->db->get("users");

			return $query->result();
				
    	}
		
 		public function get_countreg() 
		{
			    $query = $this->db->query("select * from users where id !='1'");
				return $query->result();
    	}


    	public function get_regsearch($limit, $start,$a=NULL,$b=NULL,$c=NULL) 
		{
			   $this->db->order_by('id','desc');

				$this->db->limit($limit, $start);
				$this->db->like('fname',$a);
				$this->db->like('email',$b);
				$this->db->like('phone',$c);
				$this->db->like('phone',$d);
				$this->db->like('phone',$e);
				$query = $this->db->get("users");

				return $query->result();

			
			
  	    }

		public function get_reg($limit, $start) 
		{
				
				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$query = $this->db->get("users");
				return $query->result();
			
			
  	    }

		
		public function set_reg()
		{
		    	
		   $data = array('name' => $this->input->post('name'),'email'=>$this->input->post('email'),'phone'=>$this->input->post('phone'),'place'=>$this->input->post('place'),'type'=>$this->input->post('type'),'create_date'=>$this->input->post('create_date'));


		   $this->db->where('users BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');

				return $this->db->insert('users', $data);
		}
		
		public function delete_reg($id)
		{
		
				$this->db->where('id',$id);
				$this->db->delete('users');
		
		}

		public function change_active($id,$status)
		{
			if($status=='active')
			 {
					$this->db->where('id',$id);
					$this->db->update('users',array('status'=>'inactive'));
							  
			  }
			 else 
			  {
					$this->db->where('id',$id);
					$this->db->update('users',array('status'=>'active'));
			   }
				
 		  }

 		 


    }
		
	