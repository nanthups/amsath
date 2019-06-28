<?php
class Values_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();

	}

	public function val_count() 
	{
		return $this->db->count_all("attributes_values");
	} 


	public function val_countsearch($a,$b=NULL) 
	{

		$query = $this->db->query("SELECT * FROM attributes_values WHERE attr_val LIKE '%$a%'");
		return $query->result();

	}

	public function get_countval() 
	{
		$query = $this->db->query("select * from attributes_values where id !='1'");
		return $query->result();
	}


	public function get_valsearch($limit, $start,$a) 
	{
		$this->db->order_by('id','desc');
		$this->db->limit($limit, $start);
		$query = $this->db->query("SELECT * FROM attributes_values WHERE attr_val LIKE '%$a%' AND id !='1'");
		return $query->result();


	}

	public function get_val($limit, $start) 
	{

		$this->db->order_by("attr_name", "asc");
		$this->db->limit($limit, $start);
		$query = $this->db->get("attributes_values");
		return $query->result();
	}


	public function set_val()
	{

		$data = array('attr_name' => $this->input->post('attr_name'),'attr_val' => $this->input->post('attr_val'));
		return $this->db->insert('attributes_values', $data);
	}

	public function delete_val($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('attributes_values');	
	}



	public function update_val($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('attributes_values',$data);	
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


	public function chk_val()
	{

		$attr_val  = $this->input->post('attr_val');
		$id        =$this->input->post('id');
		$query     = $this->db->query("select * from `attributes_values` where attr_val='$attr_val' and id!='$id'");
		if($query->num_rows()>0)
		{
			return false;
		}
		else
		{
			return true;
		}

	}


	public function did_get_faq_data($name)
	{
		$this->db->select('*');
		$this->db->from('attributes');   
		$this->db->where('attributes_values', $name); 

		$query = $this->db->get('attributes');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function get_attr($attr) 
	{
		$this->db->where("attr_name",$attr);
		$query = $this->db->get('attributes_values');
		return $query->result_array();
	}

}

