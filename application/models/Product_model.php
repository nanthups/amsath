<?php
class Product_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
        }
		
	 	public function pro_count() 
		{
          	return $this->db->count_all("product");
			
			
    	}
		public function pro_countsearch($a,$b,$c,$d,$e,$F) 
		{
			$query = $this->db->query("SELECT * FROM product WHERE prod_code='$a'AND name='$b' AND status='$c' AND in_stock='$d' AND cat_id1='$e' AND cat_id2='$f'");
				return $query->result();
			
    	}

    	public function get_pro($limit,$start) 
		{
			$this->db->order_by('id','desc');
			$this->db->limit($limit, $start);
			$query = $this->db->get("product");
			return $query->result();
		
  	    }

  	    public function get_product($cat, $prod_id) 
		{
			if($prod_id!="")
			{
				$this->db->where('id ='.$prod_id);
			}
			
				$this->db->order_by('id','desc');
				$this->db->where('cat_id1 ='.$cat);
				$query = $this->db->get("product");
				return $query->result();
					
  	    }

  	    
		public function get_prosearch($limit, $start,$a,$b,$c,$d,$e,$f) 
		{
				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$query = $this->db->query("SELECT * FROM product WHERE prod_code LIKE '%$a%' AND name LIKE '%$b%' AND  status LIKE '%$c%' AND  in_stock LIKE '%$d%' AND  cat_id1 LIKE '%$e%' AND  cat_id2 LIKE '%$f%'  AND id !='1'");
				return $query->result();

  	    }
  	     
		
  		public function chk_pro()
		{		
				$prod_code = $this->input->post('prod_code');
				$query = $this->db->get_where('product', array('prod_code' => $prod_code));				
				if($query->num_rows()>0)
				{
					return false;
				}
				else
				{
					return true;
			 	}
         
		}
		
		
		 public function set_pro($data)
		 {
		  
			$this->db->insert('product',$data);
		  
		  }
		  public function get_countpro()
		  {
		  
			  $query=$this->db->get('product');
			  return $query->result();
		  }
		  public function delete_pro($id)
		  {
		      $this->db->where('id',$id);
			  $this->db->delete('product');
		
		  }

		  public function delete_sub_img($id)
		  {
		      $this->db->where('id',$id);
			  $this->db->delete('product_img');
		
		  }
		 
		  public function update_pro($id,$data)
		  {

			  $this->db->where('id',$id);
			  $this->db->update('product',$data);
		  }
		  public function update_pro_spec($id,$data)
		  {

			  $this->db->where('prod_id',$id);
			  $this->db->update('specifications',$data);
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
		
		    public function addpro($data)
		    {
				
		    	$this->db->insert('product', $data);
				// echo $this->db->insert_id();				
				return $this->db->insert_id();
				
		    }

		    public function addpro_spec($data)
		    {
		    	$this->db->insert('specifications', $data);						
		    }


		    public function get_sub_img_cnt($prod_id=NULL)
		    {
		    	$query = $this->db->query("SELECT * FROM product_img WHERE prod_id=$prod_id");
				return $query->num_rows();
		    }

		    public function get_subimg($prod_id=NULL)
		    {
				$this->db->where('prod_id',$prod_id);
				$query=$this->db->get('product_img');
				return $query->result();
		    }

			
}






