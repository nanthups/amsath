<?php
class Specification_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
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
    	 


		public function spec_countsearch($a) 
		{
			
		        $query = $this->db->query("SELECT * FROM specifications WHERE prod_id='$a'");
				return $query->result();
				
    	}

    	public function spec_count() 
		{
			return $this->db->count_all("specifications");
    	} 

    	

    	 public function full_get_search($pro1 = "") 
		{
					
				$this->db->order_by('id','desc');
				$query = $this->db->query("select * from specifications where prod_id = $pro1");
				return $query->result_array();
			
  	    }

		
 		public function get_countspec() 
		{
			    $query = $this->db->query("select * from specifications where id !='1'");
				return $query->result();
    	}


    	public function get_specsearch($limit, $start,$a) 
		{
				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$query = $this->db->query("SELECT * FROM specifications WHERE prod_id LIKE '%$a%' AND id !='1'");
				return $query->result();
			
			
  	    }

		public function get_spec($limit, $start) 
		{
				
				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$query = $this->db->query("select * from specifications");
				return $query->result();
			
  	    }

  	    public function full_get_spec($pro1 = "") 
		{
					
				$this->db->order_by('id','desc');
				$query = $this->db->query("select * from specifications where prod_id = $pro1");
				return $query->result_array();
			
  	    }

		
		public function set_spec()
		{
		    	
		   $data = array('specifications' => $this->input->post('prod_id'));

				return $this->db->insert('specifications', $data);
		}
		
		public function delete_spec($id)
		{
		
				$this->db->where('id',$id);
				$this->db->delete('specifications');
		
		}

		


  		public function update_spec($id,$data)
  		{
				$this->db->where('id',$id);
				$this->db->update('specifications',$data);	
  		}

		
	

    }
		
	