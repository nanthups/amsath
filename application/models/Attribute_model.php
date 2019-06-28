<?php
class Attribute_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
        }

        public function att_count() 
		{
			return $this->db->count_all("attributes");
    	}

        public function clr_count() 
		{
			$this->db->where("attr_id=1");
			return $this->db->count_all("attributes");
    	}

    	public function size_count() 
		{
			$this->db->where("attr_id=2");
			return $this->db->count_all("attributes");
    	} 



		public function att_countsearch($a,$b=NULL) 
		{

		    $query = $this->db->query("SELECT * FROM attributes WHERE name LIKE '%$a%'");
			return $query->result();

    	}

 		public function get_countatt() 
		{
			$query = $this->db->query("select * from attributes where id !='1'");
			return $query->result();
    	}


    	public function get_attsearch($limit, $start,$a) 
		{
				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$query = $this->db->query("SELECT * FROM attributes WHERE name LIKE '%$a%' AND id !='1'");
				return $query->result();
			
			
  	    }

		public function get_att($limit, $start) 
		{
					
				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$query = $this->db->query("select * from attributes");
				return $query->result();
			
			
  	    }

  	    public function get_fullattr() 
		{
			
				$this->db->order_by('id','desc');
				$query = $this->db->query("select * from attributes");
				return $query->result_array();
			
  	    }

		
		public function set_att()
		{
		    	
				$data = array('name' => $this->input->post('name'),'status'=>$this->input->post('status'));
				return $this->db->insert('attributes', $data);
		}
		
		public function delete_att($id)
		{
		
				$this->db->where('id',$id);
				$this->db->delete('attributes');
		
		}


		public function change_active($id,$status)
		{
				if($status=='active')
				 {
						$this->db->where('id',$id);
						$this->db->update('attributes',array('status'=>'inactive'));
								  
				  }
				 else 
				  {
						$this->db->where('id',$id);
						$this->db->update('attributes',array('status'=>'active'));
				   }
				
 		  }
 

		
 
  		public function update_att($id,$data)
  		{
				$this->db->where('id',$id);
				$this->db->update('attributes',$data);	
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


		public function chk_att()
		  {
				
				$name  = $this->input->post('name');
				$id    =$this->input->post('id');
				$query = $this->db->query("select * from `attributes` where name='$name' and id!='$id'");
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
		
	