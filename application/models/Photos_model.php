<?php
class Photos_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();

	}

	public function photos_count() 
	{
		return $this->db->count_all("sell_files");
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




	public function photos_countsearch($a=NULL,$b=NULL) 
	{
		if($a!=NULL) {
			$this->db->where('user_id',$a); }

			if($b!=NULL) {
			$this->db->where('category',$b); }
			
			 $query = $this->db->get("sell_files");

			return $query->result();

		}

		public function get_uname()
		{
			
			$this->db->select('id,fname');
			$query = $this->db->get("users");
			return $query->result();
		}
		
		public function get_catname()
		{
			
			$this->db->select('id,category');
			$query = $this->db->get("file_category");
			return $query->result();
		}

		public function get_countphotos() 
		{
			$query = $this->db->query("select * from sell_files where file_id !='1'");
			return $query->result();
		}


		public function get_photossearch($limit, $start,$a=NULL,$b=NULL) 
		{
			$this->db->order_by('file_id','desc');

			   if($a!=NULL) {
				$this->db->where('user_id',$a); }
				
				if($b!=NULL) {
				$this->db->where('category',$b); }
				
				$this->db->limit($limit, $start);
				$query = $this->db->get("sell_files");

		// $query = $this->db->query("SELECT * FROM users_agreement WHERE agr_title LIKE '%$a%' AND user_id LIKE '%$b%' AND uagr_id !='1'");
				return $query->result();


			}

			public function get_photos($limit, $start) 
			{

				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$this->db->join('users', 'users.id = sell_files.user_id');
				//$this->db->join('file_category', 'category = sell_files.category');
				
				$query = $this->db->get("sell_files");
				return $query->result();
			}


			public function set_photos()
			{

				$data = array('user_id' => $this->input->post('user_id'),'file_type'=>$this->input->post('file_type'),'file_name '=>$this->input->post('file_name'),'illustrator_file'=>$this->input->post('illustrator_file'),'file_title'=>$this->input->post('file_title'),'category'=>$this->input->post('category'),'file_price'=>$this->input->post('file_price'),'web_charge'=>$this->input->post('web_charge'),'show_price'=>$this->input->post('show_price'),'keyword'=>$this->input->post('keyword'),'create_on'=>$this->input->post('create_on'));


				return $this->db->insert('sell_files', $data);
			}
			
			
		public function delete_photos($file_id)
		   {
		
				$this->db->where('file_id',$file_id);
				$this->db->delete('sell_files');
		}



		}

