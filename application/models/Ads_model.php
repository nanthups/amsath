<?php
class Ads_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
        }

        public function ads_count() 
        {
			return $this->db->count_all("users_ads");
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
    	 
    	 


		public function ads_countsearch($a=NULL,$b=NULL,$c=NULL,$d=NULL) 
		{
			  if($b!=NULL) 
			  {
			   $this->db->where('user_id',$b);
			   }

			  if($b!=NULL) 
			   {
			   $this->db->where('jobs_category',$c);
			    }

			   $this->db->like('ads_title',$a);
			   $this->db->like('ads_cost',$d);

		       $query = $this->db->get("users_ads");

			   return $query->result();
				
    	}

    	public function get_uname()
		{
			
			$this->db->select('id,fname');
			$query = $this->db->get("users");
			return $query->result();
		}

		public function get_job()
		{
			
			$this->db->select('jobs_id,jobs_category');
			$query = $this->db->get("jobs_category");
			return $query->result();
		}
		
 		public function get_countads() 
		{
			    $query = $this->db->query("select * from users_ads where ads_id !='1'");
				return $query->result();
    	}


    	public function get_adssearch($limit, $start,$a=NULL,$b=NULL,$c=NULL,$d=NULL) 
		{
				$this->db->order_by('ads_id','desc');

			   if($b!=NULL) {
				$this->db->where('user_id',$b); }

				 if($c!=NULL) {
				 $this->db->where('jobs_category',$c); }

				$this->db->limit($limit, $start);
				$this->db->like('ads_title',$a);
				$this->db->like('ads_cost',$d);
				$query = $this->db->get("users_ads");

				return $query->result();


			
  	    }

		public function get_ads($limit, $start) 
		{
				
				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$this->db->join('users', 'users.id = users_ads.user_id');
				$this->db->join('jobs_category', 'jobs_id = users_ads.jobs_category');
				$query = $this->db->get("users_ads");
				return $query->result();
			
			
  	    }

		
		public function set_ads()
		{
		    	
		   $data = array('user_id' => $this->input->post('user_id'),'ads_title'=>$this->input->post('ads_title'),'jobs_category'=>$this->input->post('jobs_category'),'ads_cost'=>$this->input->post('ads_cost'),'ads_description'=>$this->input->post('ads_description'),'ads_person'=>$this->input->post('ads_person'),'ads_expire'=>$this->input->post('ads_expire'),'ads_post_date'=>$this->input->post('ads_post_date'));


		 

				return $this->db->insert('users_ads', $data);
		}
		
		
		public function change_active($ads_id,$agr_status)
		{
			if($agr_status=='active')
			 {
					$this->db->where('id',$ads_id);
					$this->db->update('users_ads',array('agr_status'=>'Ongoing'));
							  
			  }
			 else 
			  {
					$this->db->where('id',$ads_id);
					$this->db->update('users_ads',array('agr_status'=>'Completed'));
			   }
				
 		  }
 		  
 		  
 		  public function delete_ads($ads_id)
		   {
		
				$this->db->where('ads_id',$ads_id);
				$this->db->delete('users_ads');
		}
		
		

    }
		
	