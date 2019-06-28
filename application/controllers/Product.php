<?php
defined('BASEPATH') OR exit('No direct script access allowed');

        class Product extends CI_Controller {
        function __construct() {
        parent::__construct();
		$this->load->model('Category1_model');
        $this->load->model(['front_model', 'CommonModel', 'User_model']);
        $this->load->model('Sitevisitor_model');
        $this->load->library('UserAuth');
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library("cart");
		$this->load->library("pagination");
		$this->load->helper('url');
    }

public function getdata($cat =NULL,$prod_id=NULL)
	{
		unset($_SESSION['filter']);
		$p_name = $_GET['p_name'];
		if($p_name!="")
		{		
			$data['prod'] = $this->front_model->search_prod($p_name);
		}
		else
		{
			$data['prod'] = $this->front_model->get_product($cat, $prod_id);
		}

		if($this->session->userdata('userid'))
		{
		 	$data['user_id']  	  = $this->session->userdata('userid');
		 	$userid 			  = $this->session->userdata('userid');
		 	$data['users']   	  = $this->User_model->get_users_details($userid);
			$data['products']     = $this->front_model->get_wishlist();
		}
		

		
		
	    if($prod_id == "")
		{
		 	$data['brands'] = $this->front_model->get_brands();

		    if($userid)
		    {
				$this->load->view('front/includes/header-after-login',$data);				
			}
			else
			{
				$this->load->view('front/includes/header');
			}

				$this->load->view('front/list-view-product',$data);

		 }
		 else
		 {
		 		$data['prod_subimg'] = $this->front_model->get_pdtimage($prod_id);
		 		$data['specification'] = $this->front_model->get_prodspec($prod_id);
		   
		 		if($userid)
			    {
					$this->load->view('front/includes/header-after-login',$data);
				}
				else
				{
					$this->load->view('front/includes/header');
				}

			    $this->load->view('front/product-details',$data);
	
		 }

		 $data['footer'] = $this->Sitevisitor_model->get_weblink();
		 $this->load->view('front/includes/footer',$data);
		
	}
	
	
	 function add_to_wishlist()
	 { 
		$data = array('user_id' => $this->session->userdata('userid'), 'prod_id' => $_GET['prod_id'], 'created_date' => date('Y-m-d'));
		$this->front_model->add_wish($data);
		$data_wish = $this->front_model->get_wishlist();

		$html  = "";
		$html .= '<li class="dropdown cart-notify" style="margin-top: 0px;">
                            <span class="notification" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
		$html .= '<span class="number">'.count($data_wish).'</span>                                
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            </span>
                            <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuButton">';                            
                            foreach($data_wish as $key => $val)
                            {
                            
        $html .= '<a class="dropdown-item" href="'.base_url().'wishlist">
                        <span class="cart-nofy-img"><img src="'.base_url().'uploads/large/'.$val->main_image.'" alt=""></span>
                                    <span class="cart-nofy-ttl">'.$val->name.'<br>
                                        <b>Rs.'.$val->price_inr.'</b>
                                    </span>
                                    <br clear="all">
                            </a>';
                            
                            }
                            
        $html .= '<a href="'.base_url().'wishlist" class="btn btn-primary btn-sm">View all</a>
                            </div></li>';

        echo $html;
                           
	 }
	 
	 function view_wishlist()
	 { 
		if($this->session->userdata('userid'))
		{
		 	$data['user_id']  	  = $this->session->userdata('userid');
		 	$userid 			  = $this->session->userdata('userid');
		 	$data['users']   	  = $this->User_model->get_users_details($userid);
			$data['products']     = $this->front_model->get_wishlist();
			$this->load->view('front/includes/header-after-login',$data);
		}

		$data['products_wish'] = $this->front_model->get_wishlist();
		$this->load->view('front/wishlist',$data);

		 $data['footer'] = $this->Sitevisitor_model->get_weblink();
		 $this->load->view('front/includes/footer',$data);
	 }
		
	 function remove_wishlist()
	 { 
		$id = $this->input->post('id');		 	
		$this->front_model->rem_wish($id);
		$data['products'] = $this->front_model->get_wishlist();
		redirect('wishlist',$data);
		 	
	 }
		 
		
        public function index() 
        {
        // load db and model
        $this->load->database();
        $this->load->model('Front_model');
 
        // init params
        $params = array();
        $limit_per_page = 1;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->Pagenation->get_total();
 
        if ($total_records > 0) 
        {
            // get current page records
            $params["results"] = $this->Pagenation->get_current_page_records($limit_per_page, $start_index);
             
                $config["base_url"] = base_url() . "front/list-view-product";
				$config["total_rows"] = $this->Front_model->get_total();
				$config["per_page"] = 20;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data["results"] = $this->Front_model->get_page($config["per_page"],$page);
				$data["links"] = $this->pagination->create_links();
				
				
        }
         
		$this->load->view('front/list-view-product', $data);
    }
	
	 
	 public function custom()
    {
       
        $this->load->database();
        $this->load->model('Front_model');
     
       
        $params = array();
        $limit_per_page = 2;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->Paging->get_total();
     
        if ($total_records > 0)
        {
            
            $params["results"] = $this->Paging->get_current_page_records($limit_per_page, $page*$limit_per_page);
                 
            $config['base_url'] = base_url() . 'front/list-view-product';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<div class="pagination">';
            $config['full_tag_close'] = '</div>';
             
            $config['first_link'] = 'First Page';
            $config['first_tag_open'] = '<span class="firstlink">';
            $config['first_tag_close'] = '</span>';
             
            $config['last_link'] = 'Last Page';
            $config['last_tag_open'] = '<span class="lastlink">';
            $config['last_tag_close'] = '</span>';
             
            $config['next_link'] = 'Next Page';
            $config['next_tag_open'] = '<span class="nextlink">';
            $config['next_tag_close'] = '</span>';
 
            $config['prev_link'] = 'Prev Page';
            $config['prev_tag_open'] = '<span class="prevlink">';
            $config['prev_tag_close'] = '</span>';
 
            $config['cur_tag_open'] = '<span class="curlink">';
            $config['cur_tag_close'] = '</span>';
 
            $config['num_tag_open'] = '<span class="numlink">';
            $config['num_tag_close'] = '</span>';
             
            $this->pagination->initialize($config);
                 
            // build paging links
            $params["links"] = $this->pagination->create_links();
        }
     
         $this->load->view('front/list-view-product', $params);
    }

         function search_prod(){ 

		$search = $this->input->post('search_name');
		$data['products'] = $this->front_model->search_prod($search);
		
		if($data['products'] != "")
		{
			$cat = $data["products"]->cat_id1;
			redirect('product-details/'.$cat.'/'.$data["products"]->id,$data);
		}
		else
		{
			redirect('Site_visitor');
		}

	}
	
	
	public function address()
	{

		if($this->session->userdata('userid'))
		{

		 	$data['user_id']  	  = $this->session->userdata('userid');
		 	$userid 			  = $this->session->userdata('userid');
		 	$data['users']   	  = $this->User_model->get_users_details($userid);
			$data['products']     = $this->front_model->get_wishlist();

			$this->load->view('front/includes/header-after-login',$data);
			$this->load->view('front/checkout-address');
			$data['footer'] = $this->Sitevisitor_model->get_weblink();
		 	$this->load->view('front/includes/footer',$data);

		}
		else
		{
			redirect('user-login');
		}

	}
	
	
	public function payment()
    {
		$this->load->view('front/payment');
		
	}
	
	
	public function filter()
	{
		$val   = $_GET['val'];
		$cat   = $_GET['cat'];
		$p_cat = $_GET['p_cat'];


		if($cat == 'brand')
		{
			if(isset($_SESSION['filter']['brand'])) 
			{
				$ses_brand_cnt = count($_SESSION['filter']['brand']);
			}
			else
			{
				$ses_brand_cnt = 0;
			}
			$_SESSION['filter'][$cat][$ses_brand_cnt] = $val;

		}
		else
		{
			$_SESSION['filter'][$cat] = $val;
		}

		echo $result = $this->create_filter_list($p_cat);

	}
	
	
	
	public function filter_unset()
	{
		$cat   = $_GET['cat'];
		$p_cat = $_GET['p_cat'];

		if($cat == 'price')
		{
			unset($_SESSION['filter']['price']);
		}
		else if($cat == 'gender')
		{
			unset($_SESSION['filter']['gender']);
		}
		else
		{
			if(isset($_SESSION['filter']['brand']))
			{
				if(count($_SESSION['filter']['brand']) > 1)
				{
					for($j = 0;$j < count($_SESSION['filter']['brand']);$j++)
					{
						if($_SESSION['filter']['brand'][$j] == $cat)
						{
							unset($_SESSION['filter']['brand'][$j]);
						}
					}
				}
				else
				{
					unset($_SESSION['filter']['brand']);
				}

			}		
		}
		
		echo $result = $this->create_filter_list($p_cat);

	}
	
	
	public function create_filter_list($p_cat)
	{
		$filter_prodlist = $this->front_model->get_filterproduct($p_cat);

		$html  = "";

		if(count($filter_prodlist) > 0)
		foreach($filter_prodlist as $key => $val)
		{
			$html .= '<div class="col-md-4"><a href="'.base_url().'product-details/'.$p_cat.'/'.$val->id.'" class="prodcut-list"><figure><img style="min-width: 210px; min-height: 280px;" src="'.base_url().'uploads/large/'.$val->main_image.'" width="150"/></figure>
	         <span class="details"><h3>'.$val->name.'</h3><h4>'.$val->short_description.'</h4>
	           <h5> Rs.'.$val->price_inr.'&nbsp; <s>Rs.'. $val->actual_price_inr.'</s></h5>
	         </span></a>';   
	        $html .= '<a href="'.base_url().'product-details/'.$p_cat.'/'.$val->id.'" class="view-cart2 add_cart"> <i class="fa fa-cart-plus"></i> Buy Now</a>';

	        if($this->session->userdata('userid') != "")
	         {
	        $html .= '<a href="javascript:void(0);" class="view-cart2" onClick="add_wish('.$val->id.')" >
	            <i class="fa fa-heart"></i> Add to Wishlist</a>';
	         
	          }
	          else
	          {
	         
	        $html .= '<a href="'.base_url().'site_visitor/userlogin" class="view-cart2"><i class="fa fa-heart"></i> Add to Wishlist</a>';
	           
	          }
	         
	        $html .= '</div>';
	    }
	    return $html;
	}



	
}