<?php
class Agreement_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();

	}

	public function agree_count() 
	{
		return $this->db->count_all("users_agreement");
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




	public function agree_countsearch($a=NULL,$b=NULL) 
	{
		if($b!=NULL) {
			$this->db->where('user_id',$b); }

			$this->db->like('agr_title',$a);
			$query = $this->db->get("users_agreement");

			return $query->result();

		}

		public function get_uname()
		{
			
			$this->db->select('id,fname');
			$query = $this->db->get("users");
			return $query->result();
		}

		public function get_countagree() 
		{
			$query = $this->db->query("select * from users_agreement where uagr_id !='1'");
			return $query->result();
		}


		public function get_agreesearch($limit, $start,$a=NULL,$b=NULL) 
		{
			$this->db->order_by('uagr_id','desc');

			   if($b!=NULL) {
				$this->db->where('user_id',$b); }
				$this->db->limit($limit, $start);
				$this->db->like('agr_title',$a);
				$query = $this->db->get("users_agreement");

		// $query = $this->db->query("SELECT * FROM users_agreement WHERE agr_title LIKE '%$a%' AND user_id LIKE '%$b%' AND uagr_id !='1'");
				return $query->result();


			}

			public function get_agree($limit, $start) 
			{

				$this->db->order_by('id','desc');
				$this->db->limit($limit, $start);
				$this->db->join('users', 'users.id = users_agreement.user_id');
				$query = $this->db->get("users_agreement");
				return $query->result();
			}


			public function set_agree()
			{

				$data = array('user_id' => $this->input->post('user_id'),'agr_title'=>$this->input->post('agr_title'),'agr_with '=>$this->input->post('agr_with'),'agr_amt '=>$this->input->post('agr_amt'),'agr_desc'=>$this->input->post('agr_desc'),'agr_exp'=>$this->input->post('agr_exp'),'arg_delay'=>$this->input->post('arg_delay'),'agr_comp'=>$this->input->post('agr_comp'),'no_images'=>$this->input->post('no_images'),'agr_status'=>$this->input->post('agr_status'),'create_on'=>$this->input->post('create_on'));




				return $this->db->insert('users_agreement', $data);
			}


			public function change_active($uagr_id,$agr_status)
			{
				if($agr_status=='active')
				{
					$this->db->where('id',$uagr_id);
					$this->db->update('users_agreement',array('agr_status'=>'Ongoing'));

				}
				else 
				{
					$this->db->where('id',$uagr_id);
					$this->db->update('users_agreement',array('agr_status'=>'Completed'));
				}

			}



		}

