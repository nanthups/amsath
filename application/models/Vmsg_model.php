<?php
class Vmsg_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();

	}

	public function vmsg_count() 
	{
		return $this->db->count_all("visitor_msg");
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




	public function vmsg_countsearch($a=NULL,$b=NULL) 
	{
		if($b!=NULL) {
			$this->db->where('user_id',$b); }

			$this->db->like('vst_name',$a);
			$this->db->like('vst_mail',$c);
			$query = $this->db->get("visitor_msg");

			return $query->result();

		}

		public function get_uname()
		{
			
			$this->db->select('id,fname');
			$query = $this->db->get("users");
			return $query->result();
		}

		public function get_countvmsg() 
		{
			$query = $this->db->query("select * from visitor_msg where vmsg_id !='1'");
			return $query->result();
		}


		public function get_vmsgsearch($limit, $start,$a=NULL,$b=NULL) 
		{
			$this->db->order_by('vmsg_id','desc');

			   if($b!=NULL) {
				$this->db->where('user_id',$b); }
				$this->db->limit($limit, $start);
				$this->db->like('vst_name',$a);
				$this->db->like('vst_mail',$c);
				$query = $this->db->get("visitor_msg");

		// $query = $this->db->query("SELECT * FROM users_agreement WHERE agr_title LIKE '%$a%' AND user_id LIKE '%$b%' AND uagr_id !='1'");
				return $query->result();


			}

			public function get_vmsg($limit, $start) 
			{

				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$this->db->join('users', 'users.id = visitor_msg.user_id');
				$query = $this->db->get("visitor_msg");
				return $query->result();
			}


			public function set_vmsg()
			{

				$data = array('user_id' => $this->input->post('user_id'),'vst_name'=>$this->input->post('vst_name'),'vst_mail'=>$this->input->post('vst_mail'),'vst_message'=>$this->input->post('vst_message'));




				return $this->db->insert('visitor_msg', $data);
			}


		}

