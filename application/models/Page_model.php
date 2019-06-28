<?php
class Page_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
        }
		
	 	public function record_count() 
		{
          	$query=$this->db->get('pages'); 
		 	return $query->result();
			
			
    	}
		public function record_countsearch($search) 
		{
			$query=$this->db->query("select * from `pages` where `title` LIKE '%$search%'");
	        return $query->result();
			
    	}

    	public function get_pages($limit,$start) 
		{
			
			$this->db->order_by('id','desc');
			$this->db->limit($limit, $start);
			$query = $this->db->get("pages");
			return $query->result();
			
			
  	     }
		 public function get_pagesearch($limit, $start,$search) 
		{
			
		 $this->db->limit($limit, $start);
	   	 $this->db->like('title',$search);
       	 $query = $this->db->get("pages");
		 if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        	}
        return false;
  	  }
  	     
		
  		public function chk_pages()
		{
				
				$title = $this->input->post('title');
				$query = $this->db->get_where('pages', array('title' => $title));
				
				if($query->num_rows()>0)
				{
					return false;
				}
				else
				{
					return true;
			 	}
         
		}
		public function chk_page()
		{
				
				$title = $this->input->post('page');
				$query = $this->db->get_where('pages', array('page' => $title));
				
				if($query->num_rows()>0)
				{
					return false;
				}
				else
				{
					return true;
			 	}
         
		}
			public function chk()
		{
				
				$title = $this->input->post('page');
				$id=$this->input->post('id');
				$query = $this->db->query("select * from `pages` where page='$title' and id!='$id'");
				if($query->num_rows()>0)
				{
					return false;
				}
				else
				{
					return true;
			 	}
         
		}
		
		
		
		 public function set_page($data)
		 {
		  
			$this->db->insert('pages',$data);
		  
		  }
		  public function get_countpages()
		  {
		  
			  $query=$this->db->get('pages');
			  return $query->result();
		  }
		 public function delete_page($id,$main_image)
		  {
		  
		  if($main_image!=""){
			  $this->db->where('id',$id);
			  unlink(FCPATH."uploads/orginal/".$main_image);
			  unlink(FCPATH."uploads/small/".$main_image);
			  unlink(FCPATH."uploads/medium/".$main_image);
			  unlink(FCPATH."uploads/large/".$main_image);
			  $this->db->delete('pages');
			
		  }
		  else
		 {
		      $this->db->where('id',$id);
			  $this->db->delete('pages');
		 } 
		 }
		 
		  public function update_page($id,$data)
		   {
			  $this->db->where('id',$id);
			  $this->db->update('pages',$data);
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
		


			
}