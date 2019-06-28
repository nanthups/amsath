<?php
class Front_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();

	}

	function register($data){
		$this->db->insert('users',$data);
	}
	
	public function productview(){
		
		$query=$this->db->get('product');
		return $query->result();		
	}

	public function get_product($cat, $prod_id) 
	{
		if($prod_id!="")
		{
			$this->db->where('id ='.$prod_id);
		}
	
		$this->db->where('cat_id1 ='.$cat);
		$this->db->order_by('id','desc');
		$query = $this->db->get("product");
		return $query->result();
	}

	public function get_catId($catName) {
		$this->db->where('category',$catName);
		$this->db->limit(4, 0);
		$this->db->select('id');
		$query = $this->db->get('category1');
		return $query->row();
	}

	public function search_prod($search) {

		$query = $this->db->query("SELECT * FROM product WHERE name LIKE '%$search%'");
		return $query->row();

	} 	
	
	public function get_products($cat,$prod_id=NULL) 
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
	
	public function get_pdtimage($id){
		$this->db->where('prod_id=',$id);
		$this->db->select('image');
		$query=$this->db->get('product_img');
		return $query->result();
	}

	
	public function get_prodspec($id) {
		$this->db->where('prod_id=',$id);
		$query=$this->db->get('specifications');
		return $query->result();
	}

	public function get_attrName($id) {
		$this->db->where('id=',$id);
		$this->db->select('attr_val');
		$query=$this->db->get('attributes_values');
		return $query->row();

	}

	public function get_brands() {
		
		$query=$this->db->get('brand');
		return $query->result();
	}

	public function add_wish($data) {

		$this->db->insert('wishlist', $data);
	}

	public function rem_wish($id) {

		$this->db->where('prod_id=',$id);
		$this->db->where('user_id=',$this->session->userdata('userid'));
		$this->db->delete('wishlist');
	}

	public function get_wishlist() {

	  $this->db->select('*');
	  $this->db->from('wishlist');
	  $this->db->join('product', 'product.id = wishlist.prod_id');
	  $this->db->where('wishlist.user_id=',$this->session->userdata('userid'));

		$result=$this->db->get();

		return $result->result();

	}
	
	
	public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("product");
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
	public function get_total() 
    {
        return $this->db->count_all("product");
    }
	
	
	
	public function get_filterproduct($p_cat) 
    {

		$this->db->where('cat_id1',$p_cat);
		if(isset($_SESSION['filter']['price']))
		{
			$minmax = array();
			$minmax = explode(',', $_SESSION['filter']['price']);
			$this->db->where('price_inr >='.$minmax[0]);
			$this->db->where('price_inr <='.$minmax[1]);

		}
		if(isset($_SESSION['filter']['gender']))
		{
			$this->db->where('gender',$_SESSION['filter']['gender']);
		}
		if(isset($_SESSION['filter']['brand']))
		{
			//print_r($_SESSION['filter']['brand']);
			
				$this->db->where_in('brand',$_SESSION['filter']['brand']);
			
		}

		$query = $this->db->get("product");
		return $query->result();

    }


}