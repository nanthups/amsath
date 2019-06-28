<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller 
{

	public function __construct()
   	 {
            parent::__construct();
			$this->load->database();
			$this->load->library('session');
   			$this->load->helper('url');
		    $this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('password');
			$this->load->library('upload');
			$this->load->library('image_lib');
			$this->load->model('Values_model');
			$this->load->model('Brand_model');
			$this->load->model('Product_model');
			$this->load->model('Category1_model');
			$this->load->model('Category2_model');
			$this->load->library('UserAuth');
			$this->load->library('pagination');
			$this->userauth->is_logged_in_admin();
   
     }

	
	public function add_product($action= NULL,$id= NULL)
		{
	 		$this->userauth->is_logged_in_admin();
			$data['titles']       = 'Add Product';
			$data['adddiv']       = 'none';
		    $data['srdiv']        = 'none';
			$data['status']       = 'active';
			$data['best_sale']    = 'no';
			$data['cust_choice']  = 'no';
			$data['show_home']    = 'no';
			$data['show_new']     = 'no';
			$data['available']    = 'Kerala';
			$data['qty_aval']  	  = 1;

			$data['Sleeve_styling'][0] = 'Normal sleeve';
			$data['Sleeve_styling'][1] = 'Raglan sleeves';
			$data['Sleeve_styling'][2] = 'Cap sleeves';

			$data['Multipack_set'][0]  ='2-pack jersey dresses';
			$data['Multipack_set'][1]  ='2-pack all-in-one pyjamas';
			$data['Multipack_set'][2]  ='Jersey vest top and shorts';
			$data['Multipack_set'][3]  ='2-pack leggings';


			$data['Occasion'][0]       = 'Formal';
			$data['Occasion'][1]       = 'Casual';

			$data['Main_trend'][0]     = 'Streetwear Style';
			$data['Main_trend'][1]     = 'Ethnic fashion style';
			$data['Main_trend'][2]     = 'Formal Office Wear';
			$data['Main_trend'][3]     = 'Business Casual';

			$data['Print_pattern_type'][0] = 'Abstract Patterns';
			$data['Print_pattern_type'][1] = 'African Patterns';
			$data['Print_pattern_type'][2] = 'Animal Patterns';
			$data['Print_pattern_type'][3] = 'Airbrush Patterns';

			$data['Neck'][0] 			   = 'Crew Neckline';
			$data['Neck'][1] 			   = 'Jewel Neckline';
			$data['Neck'][2] 			   = 'U neckline';
			$data['Neck'][3] 			   = 'Square Neckline';

			$data['Pattern'][0] 		   = 'Batik Patterns';
			$data['Pattern'][1] 		   = 'Bull Eye Pattern';
			$data['Pattern'][2] 		   = 'Brick network Patterns';
			$data['Pattern'][3] 		   = 'Camouflage Patterns';

			$data['Sleeve_length'][0] 	   = 'Batwing sleeve';
			$data['Sleeve_length'][1] 	   = 'Bell sleeve';
			$data['Sleeve_length'][2] 	   = 'Bishop sleeve';
			$data['Sleeve_length'][3] 	   = 'Butterfly sleeve';

			$data['Wash_care'][0]          = 'Washing';
			$data['Wash_care'][1]          = 'Tumble drying';
			$data['Wash_care'][2]          = 'Natural drying';
			$data['Wash_care'][3]          = 'Ironing';
			$data['Wash_care'][4]          = 'Dry Cleaning';

			$data['Fit'][0] 			   = 'Sim Fit';
			$data['Fit'][1] 			   = 'Regular Fit';		

			$data['Length'][0] 			   = 'Short';
			$data['Length'][1] 			   = 'Long ';
			$data['Length'][2] 			   = 'Half';

			$data['Fabric'][0] 			   = 'Wool';
			$data['Fabric'][1] 			   = 'Silk';
			$data['Fabric'][2] 			   = 'Cotton';
			$data['Fabric'][3] 			   = 'Nylon';
			$data['Fabric'][4] 			   = 'Polyester';
			
	    	if($action=="add")
				{
				 $data['titles'] = 'Add Product';
				 $data['btnaction'] = 'add';
				 $this->form_validation->set_rules('name', 'Name', 'required');
				 $this->form_validation->set_rules('short_description', 'Short Description', 'required');
				 $this->form_validation->set_rules('long_description', 'Long Description', 'required');
				 $this->form_validation->set_rules('specifications', 'Specifcations', 'required');
				 $this->form_validation->set_rules('price_inr', 'Price In INR', 'required');
				 $this->form_validation->set_rules('actual_price_inr', 'Actual Price', 'required');
				 $this->form_validation->set_rules('in_stock', 'In Stock', 'required');
				 $this->form_validation->set_rules('available', 'Availbale', 'required');
				 // $this->form_validation->set_rules('attr_id', 'Attributes', 'required');
				 $this->form_validation->set_rules('status', 'Status', 'required');
				 $this->form_validation->set_rules('gender ', 'Gender');
				 $this->form_validation->set_rules('cat_id1', 'Category', 'required');
				 $this->form_validation->set_rules('cat_id2', 'Sub Category', 'required');
				 $this->form_validation->set_rules('url_from', 'url Form');
				 $this->form_validation->set_rules('prod_code', 'Product Code', 'required');
				 $this->form_validation->set_rules('qty_aval', 'Quality Available', 'required');
				 $this->form_validation->set_rules('offer_text', 'Offer Text', 'required');
				 $this->form_validation->set_rules('best_sale', 'Best Sale', 'required');
				 $this->form_validation->set_rules('cust_choice', 'Customer Choices', 'required');
				 $this->form_validation->set_rules('brand', 'Brand', 'required');
				 $this->form_validation->set_rules('show_home', 'Show Home', 'required');
				 $this->form_validation->set_rules('show_new', 'Show New', 'required');
				 $this->form_validation->set_rules('min_qty', 'Minumm Quality');
				 $this->form_validation->set_rules('brand_text', 'brand Text');
				 $this->form_validation->set_rules('estimated_tax', 'Estimated Tax Text');
				 $this->form_validation->set_rules('delivery_charge', 'Delivery Charge');
				 $this->form_validation->set_rules('spec_details', 'Specification Details');
				 $this->form_validation->set_rules('deal', 'Deal');
				 $this->form_validation->set_rules('deal_text', 'Deal Text');
				 $this->form_validation->set_rules('deal_end', 'Deal End');
				 $this->form_validation->set_rules('specail_offer', 'Special Offer');
				 $this->form_validation->set_rules('special_deal', 'Special Deal');
				 if($this->Product_model->chk_pro() === false)
			 		{
			 			$data['error_msg'] = 'Product Already Exists.';
			 			$data['prod_code']=$this->input->post('prod_code');
						$this->session->set_flashdata('error_msg','	Product Code exists.');
					}
				 if($this->form_validation->run() === TRUE && $this->Product_model->chk_pro() === true)
					{
						$config['upload_path']="./uploads/orginal/";
						$config['allowed_types']="gif|png|jpg|jpeg";
						$config['max_size']="10000000000000";
						$config['max_width']="5000";
						$config['max_height']="1000";
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
						if($this->upload->do_upload('main_img'))
							{
							  $data  =  array('upload_data'=>$this->upload->data());
							  $image =  $this->upload->data();
							  $imgs  =  $data['upload_data']["file_name"]; 
							  
							  $this->resizesmall($data['upload_data']['full_path'],$data['upload_data']['file_name']);
							  $this->resizelarge($data['upload_data']['full_path'],$data['upload_data']['file_name']);
							  $this->resizemedium($data['upload_data']['full_path'],$data['upload_data']['file_name']);
							  // print_r($_POST);die();
							  
							  $id 		         = $this->input->post('id');
						 	  $name              = $this->input->post('name');
							  $short_description = $this->input->post('short_description');
							  $long_description  = $this->input->post('long_description');
							  $specifications    = $this->input->post('specifications');
							  $price_inr         = $this->input->post('price_inr');
							  $actual_price_inr  = $this->input->post('actual_price_inr');
							  $in_stock          = $this->input->post('in_stock');
							  $available         = $this->input->post('available');
							  // $attr_id           = $this->input->post('attr_id');
							  $status            = $this->input->post('status');
							  $gender            = $this->input->post('gender');
							  $cat_id1           = $this->input->post('cat_id1');
							  $cat_id2           = $this->input->post('cat_id2');
							  $url_from          = $this->input->post('url_from');
							  $prod_code         = $this->input->post('prod_code');
							  $qty_aval          = $this->input->post('qty_aval');
							  $offer_text        = $this->input->post('offer_text');
							  $best_sale         = $this->input->post('best_sale');
							  $cust_choice       = $this->input->post('cust_choice');
							  $brand             = $this->input->post('brand');
							  $show_home         = $this->input->post('show_home');
							  $show_new          = $this->input->post('show_new');
							  $min_qty           = $this->input->post('min_qty');
							  $brand_text        = $this->input->post('brand_text');
							  $estimated_tax     = $this->input->post('estimated_tax');
							  $delivery_charge   = $this->input->post('delivery_charge');
							  $spec_details      = $this->input->post('spec_details');
							  $deal              = $this->input->post('deal');
							  $deal_text         = $this->input->post('deal_text');
							  $deal_end          = date("Y-m-d",strtotime($this->input->post('deal_end')));
							  $specail_offer     = $this->input->post('specail_offer');
							  $special_deal      = $this->input->post('special_deal');
							  $main_image 		 = $imgs;

							  $color_arr		 = $this->input->post('color');
							  $size_arr 	     = $this->input->post('size');


							  $color 			 = implode(',', $color_arr);
							  $size 			 = implode(',', $size_arr);

							  //print_r($color); exit();
							  

							$data = array(
							'id'=>$id,
							'name'=>$name,
							'short_description'=>$short_description,
							'long_description'=>$long_description,
							'specifications'=>$specifications,
							'price_inr'=>$price_inr,
							'actual_price_inr'=>$actual_price_inr,
							'in_stock'=>$in_stock,
							'available'=>$available,
							//'attr_id'=>$attr_id,
							'status'=>$status,
							'gender'=>$gender,
							'cat_id1'=>$cat_id1,
							'cat_id2'=>$cat_id2,
							'url_from'=>$url_from,
							'prod_code'=>$prod_code,
							'qty_aval'=>$qty_aval,
							'offer_text'=>$offer_text,
							'best_sale'=>$best_sale,
							'cust_choice'=>$cust_choice,
							'brand'=>$brand,
							'show_home'=>$show_home,
							'show_new'=>$show_new,
							'min_qty'=>$min_qty,
							'brand_text'=>$brand_text,
							'estimated_tax'=>$estimated_tax,
							'delivery_charge'=>$delivery_charge,
							'spec_details'=>$spec_details,
							'deal'=>$deal,
							'deal_text'=>$deal_text,
							'deal_end'=>$deal_end,
							'specail_offer'=>$specail_offer,
							'special_deal'=>$special_deal,
							'main_image' => $main_image,
							'color' => $color,
							'size' => $size
							);
							
							$gid = $this->Product_model->addpro($data);

							if($gid)
							{
							  $spec = array(
								'prod_id' 		        => $gid,
						 	  	'sleeve_styling'        => $this->input->post('sleeve_styling'),
							  	'multipack_set' 		=> $this->input->post('multipack_set'),
							  	'occasion'  			=> $this->input->post('occasion'),
							  	'main_trend'    		=> $this->input->post('main_trend'),
							  	'print_pattern_type'    => $this->input->post('print_pattern_type'),
							  	'neck'  				=> $this->input->post('neck'),
							  	'pattern'          		=> $this->input->post('pattern'),
							  	'sleeve_length'         => $this->input->post('sleeve_length'),
							  	'wash_care' 	        => $this->input->post('wash_care'),
							  	'fit'            		=> $this->input->post('fit'),
							  	'length'           		=> $this->input->post('length'),
							  	'fabric'           		=> $this->input->post('fabric')
							  );

							  $this->Product_model->addpro_spec($spec);

							}
							// $this->product_model->set_pro($data);
						}

						$filecount = count($_FILES['image']['name']);

						for ($i=0; $i < $filecount ; $i++) 
						{ 
							$_FILES['image1']['name']=$_FILES['image']['name'][$i];
							$_FILES['image1']['type']=$_FILES['image']['type'][$i];
							$_FILES['image1']['tmp_name']=$_FILES['image']['tmp_name'][$i];
							$_FILES['image1']['error']=$_FILES['image']['error'][$i];
							$_FILES['image1']['size']=$_FILES['image']['size'][$i];
							$config['upload_path']="./uploads/orginal/";
							$config['allowed_types']="gif|png|jpg|jpeg";
							$config['max_size']="10000000000000";
							$config['max_width']="5000";
							$config['max_height']="1000";
							$this->load->library('upload',$config);
							$this->upload->initialize($config);
							if($this->upload->do_upload('image1'))
							{
								$data= array('upload_data'=>$this->upload->data());
								$data= $this->upload->data();
								$insert[$i]['image']= $data['file_name'];
								$insert[$i]['prod_id']= $gid;
							    $this->resizesmall($data['full_path'],$data['file_name']);
								$this->resizelarge($data['full_path'],$data['file_name']);
								$this->resizemedium($data['full_path'],$data['file_name']);
								
							}
						}
						
						$this->db->insert_batch('product_img',$insert);
						$data['titles'] = 'Add Product';
						$this->session->set_flashdata('success_msgs','Product Added successfully.');
						
					}
			}
	 
		if($action=="editproduct")
		{

	     $data['btnaction'] = 'edit';
	     $data['titles']    = 'Edit Product';
	     $data['adddiv'] 	= 'block';
	     $data['srdiv'] 	= 'none';

	     $arr_fields = $this->Product_model->get_row('product','*',array('id'=>$id));

	     $data['id']                = $arr_fields->id;
	     $data['name']              = $arr_fields->name;
	     $data['short_description'] = $arr_fields->short_description;
	     $data['long_description']  = $arr_fields->long_description;
	     $data['specifications']    = $arr_fields->specifications;
	     $data['price_inr']         = $arr_fields->price_inr;
	     $data['actual_price_inr']  = $arr_fields->actual_price_inr;
	     $data['in_stock']          = $arr_fields->in_stock;
	     $data['available']         = $arr_fields->available;
	     $data['status']            = $arr_fields->status;
		 $data['gender']            = $arr_fields->gender;
	     $data['cat_id1']           = $arr_fields->cat_id1;
	     $data['cat_id2']           = $arr_fields->cat_id2;
	     $data['url_from']          = $arr_fields->url_from;
	     $data['prod_code']         = $arr_fields->prod_code;
	     $data['qty_aval']          = $arr_fields->qty_aval;
	     $data['offer_text']        = $arr_fields->offer_text;
	     $data['best_sale']         = $arr_fields->best_sale;
	     $data['cust_choice']       = $arr_fields->cust_choice;
	     $data['brand_id']          = $arr_fields->brand;
	     $data['show_home']         = $arr_fields->show_home;
	     $data['show_new']          = $arr_fields->show_new;
	     $data['min_qty']           = $arr_fields->min_qty;
	     $data['brand_text']        = $arr_fields->brand_text;
	     $data['estimated_tax']     = $arr_fields->estimated_tax;
	     $data['delivery_charge']   = $arr_fields->delivery_charge;
	     $data['spec_details']      = $arr_fields->spec_details;
	     $data['deal']              = $arr_fields->deal;
	     $data['deal_text']         = $arr_fields->deal_text;
	     $data['deal_end']          = $arr_fields->deal_end;
	     $data['specail_offer']     = $arr_fields->specail_offer;
	     $data['special_deal']      = $arr_fields->special_deal;
	     $data['main_image']        = $arr_fields->main_image;
	     $data['color']        		= $arr_fields->color;
	     $data['size']        		= $arr_fields->size;

	     $spec_arr = $this->Product_model->get_row('specifications','*',array('prod_id'=>$id));

	     $data['sleeve']            = $spec_arr->sleeve_styling;
	     $data['pack']              = $spec_arr->multipack_set;
	     $data['occ'] 				= $spec_arr->occasion;
	     $data['trend']  			= $spec_arr->main_trend;
	     $data['print_pattern']     = $spec_arr->print_pattern_type ;
	     $data['nec']         		= $spec_arr->neck;
	     $data['patt']  			= $spec_arr->pattern;
	     $data['slev_length']       = $spec_arr->sleeve_length;
	     $data['wash_care']         = $spec_arr->wash_care;
	     $data['fitt']              = $spec_arr->fit;
		 $data['lenth']             = $spec_arr->length;
	     $data['fabrick']           = $spec_arr->fabric;



	     $this->form_validation->set_rules('name', 'Name', 'required');
		 $this->form_validation->set_rules('short_description', 'Short Description', 'required');
		 $this->form_validation->set_rules('long_description', 'Long Description', 'required');
		 $this->form_validation->set_rules('specifications', 'Specifcations', 'required');
		 $this->form_validation->set_rules('price_inr', 'Price In INR', 'required');
		 $this->form_validation->set_rules('actual_price_inr', 'Actual Price', 'required');
		 $this->form_validation->set_rules('in_stock', 'In Stock', 'required');
		 $this->form_validation->set_rules('available', 'Availbale', 'required');
		 //$this->form_validation->set_rules('attr_id', 'Attributes', 'required');
		 $this->form_validation->set_rules('status', 'Status', 'required');
		 $this->form_validation->set_rules('gender ', 'Gender');
		 $this->form_validation->set_rules('cat_id1', 'Category', 'required');
		 $this->form_validation->set_rules('cat_id2', 'Sub Category', 'required');
		 $this->form_validation->set_rules('url_from', 'url Form');
		 $this->form_validation->set_rules('prod_code', 'Product Code', 'required');
		 $this->form_validation->set_rules('qty_aval', 'Quality Available', 'required');
		 $this->form_validation->set_rules('offer_text', 'Offer Text', 'required');
		 $this->form_validation->set_rules('best_sale', 'Best Sale', 'required');
		 $this->form_validation->set_rules('cust_choice', 'Customer Choices', 'required');
		 $this->form_validation->set_rules('brand', 'Brand', 'required');
		 $this->form_validation->set_rules('show_home', 'Show Home', 'required');
		 $this->form_validation->set_rules('show_new', 'Show New', 'required');
		 $this->form_validation->set_rules('min_qty', 'Minumm Quality');
		 $this->form_validation->set_rules('brand_text', 'brand Text');
		 $this->form_validation->set_rules('estimated_tax', 'Estimated Tax Text');
		 $this->form_validation->set_rules('delivery_charge', 'Delivery Charge');
		 $this->form_validation->set_rules('spec_details', 'Specification Details');
		 $this->form_validation->set_rules('deal', 'Deal');
		 $this->form_validation->set_rules('deal_text', 'Deal Text');
		 $this->form_validation->set_rules('deal_end', 'Deal End');
		 $this->form_validation->set_rules('specail_offer', 'Special Offer');
		 $this->form_validation->set_rules('special_deal', 'Special Deal');
				 
				
			if($this->form_validation->run() === TRUE )
			 {


			 	$data = array(

			 	  'id' 		          => $this->input->post('id'),
			 	  'name'              => $this->input->post('name'),
				  'short_description' => $this->input->post('short_description'),
				  'long_description'  => $this->input->post('long_description'),
				  'specifications'    => $this->input->post('specifications'),
				  'price_inr'         => $this->input->post('price_inr'),
				  'actual_price_inr'  => $this->input->post('actual_price_inr'),
				  'in_stock'          => $this->input->post('in_stock'),
				  'available'         => $this->input->post('available'),
				   //$attr_id           = $this->input->post('attr_id');
				  'status'            => $this->input->post('status'),
				  'gender'            => $this->input->post('gender'),
				  'cat_id1'           => $this->input->post('cat_id1'),
				  'cat_id2'           => $this->input->post('cat_id2'),
				  'url_from'          => $this->input->post('url_from'),
				  'prod_code'         => $this->input->post('prod_code'),
				  'qty_aval'          => $this->input->post('qty_aval'),
				  'offer_text'        => $this->input->post('offer_text'),
				  'best_sale'         => $this->input->post('best_sale'),
				  'cust_choice'       => $this->input->post('cust_choice'),
				  'brand'             => $this->input->post('brand'),
				  'show_home'         => $this->input->post('show_home'),
				  'show_new'          => $this->input->post('show_new'),
				  'min_qty'           => $this->input->post('min_qty'),
				  'brand_text'        => $this->input->post('brand_text'),
				  'estimated_tax'     => $this->input->post('estimated_tax'),
				  'delivery_charge'   => $this->input->post('delivery_charge'),
				  'spec_details'      => $this->input->post('spec_details'),
				  'deal'              => $this->input->post('deal'),
				  'deal_text'         => $this->input->post('deal_text'),
				  'deal_end'          => date("Y-m-d",strtotime($this->input->post('deal_end'))),
				  'specail_offer'     => $this->input->post('specail_offer'),
				  'special_deal'      => $this->input->post('special_deal'),
				  'main_image'        => $this->input->post('main_image'),
				  'color'		 	  => implode(',',$this->input->post('color')),
				  'size'	          => implode(',',$this->input->post('size'))

				);


        		
				 //  if($this->Product_model->chk_pro() === false)
			 	// 	{

					//    $data['error_msg'] = 'Product Already Exists.';
					//    $arr_fields 		= $this->Product_model->get_row('product','*',array('id'=>$data['id']));
					//    $data['id'] 		= $arr_fields->id;
					//    $data['prod_code'] = $arr_fields->prod_code;
				 //   	}
					// else
					// {
			 		
						if (isset($_FILES['main_img']['name']))
						{
							
							$config['upload_path']="./uploads/orginal/";
							$config['allowed_types']="gif|png|jpg|jpeg";
							$config['max_size']="10000000000000";
							$config['max_width']="5000";
							$config['max_height']="1000";
							$this->load->library('upload',$config);
							$this->upload->initialize($config);
							
							if($this->upload->do_upload('main_img'))
							{
							  $data1  =  array('upload_data'=>$this->upload->data());
							  $image =  $this->upload->data();

							 

							  $data['main_image']  =  $data1['upload_data']["file_name"]; 
							  
							  $this->resizesmall($data1['upload_data']['full_path'],$data1['upload_data']['file_name']);
							  $this->resizelarge($data1['upload_data']['full_path'],$data1['upload_data']['file_name']);
							  $this->resizemedium($data1['upload_data']['full_path'],$data1['upload_data']['file_name']);
							}


						}
						

				  	
				  //  	$filecount = count($_FILES['image']['name']);

						// for ($i=0; $i < $filecount ; $i++) 
						// { 

						// 	$_FILES['image1']['name']=$_FILES['image']['name'][$i];
						// 	$_FILES['image1']['type']=$_FILES['image']['type'][$i];
						// 	$_FILES['image1']['tmp_name']=$_FILES['image']['tmp_name'][$i];
						// 	$_FILES['image1']['error']=$_FILES['image']['error'][$i];
						// 	$_FILES['image1']['size']=$_FILES['image']['size'][$i];
						// 	$config['upload_path']="./uploads/orginal/";
						// 	$config['allowed_types']="gif|png|jpg|jpeg";
						// 	$config['max_size']="10000000000000";
						// 	$config['max_width']="5000";
						// 	$config['max_height']="1000";
						// 	$this->load->library('upload',$config);
						// 	$this->upload->initialize($config);
						// 	if($this->upload->do_upload('image1'))
						// 	{
						// 		echo $data['id'];
						// 		exit;
						// 		$data2= array('upload_data'=>$this->upload->data());
						// 		$data2= $this->upload->data();
						// 		$insert[$i]['image']= $data2['file_name'];
						// 		$insert[$i]['prod_id']= $data2['id'];
						// 	    $this->resizesmall($data2['full_path'],$data2['file_name']);
						// 		$this->resizelarge($data2['full_path'],$data2['file_name']);
						// 		$this->resizemedium($data2['full_path'],$data2['file_name']);
								
						// 	}

						//  }


						// $this->db->insert_batch('product_img',$insert);
			

				    $this->Product_model->update_pro($data['id'],$data);

					  $spec = array(
						
				 	  	'sleeve_styling'        => $this->input->post('sleeve_styling'),
					  	'multipack_set' 		=> $this->input->post('multipack_set'),
					  	'occasion'  			=> $this->input->post('occasion'),
					  	'main_trend'    		=> $this->input->post('main_trend'),
					  	'print_pattern_type'    => $this->input->post('print_pattern_type'),
					  	'neck'  				=> $this->input->post('neck'),
					  	'pattern'          		=> $this->input->post('pattern'),
					  	'sleeve_length'         => $this->input->post('sleeve_length'),
					  	'wash_care' 	        => $this->input->post('wash_care'),
					  	'fit'            		=> $this->input->post('fit'),
					  	'length'           		=> $this->input->post('length'),
					  	'fabric'           		=> $this->input->post('fabric')
					  );

					$this->Product_model->update_pro_spec($data['id'],$spec);

				$this->session->set_flashdata('success_msg1','Product Updated successfully.');
				redirect('admin/list-product');
			//}

		}

			$subimg_cnt      		= $this->Product_model->get_sub_img_cnt($id);
          	$subimg_arr      		= $this->Product_model->get_subimg($id);
	  	  	$data['subimg_cnt'] 	= $subimg_cnt;
          	$data['subimg']   		= $subimg_arr;

          	$cat2_cnt		        = $this->Category2_model->cat2_count();
		  	$cat2_arr               = $this->Category2_model->get_fullcat2();
		  	$data['cat2']           = $cat2_arr;
		  	$data['cat2_cnt']       = $cat2_cnt;
		}
		
		  $cat1_cnt		          = $this->Category1_model->cat1_count();
	  	  $cat1_arr               = $this->Category1_model->get_fullcat1();
	  	  $data['cat1']           = $cat1_arr;
	  	  $data['cat1_cnt']       = $cat1_cnt;

	  	  $clr_cnt         		= count($this->Values_model->get_attr("color"));
          $clr_arr         		= $this->Values_model->get_attr("color");
	  	  $data['color_cnt'] 	= $clr_cnt;
          $data['clr']     		= $clr_arr;

	  	  $size_cnt         	= count($this->Values_model->get_attr("size"));
          $size_arr         	= $this->Values_model->get_attr("size");
	  	  $data['size_cnt'] 	= $size_cnt;
          $data['siz']     	= $size_arr;

	  	  $brand_cnt       = $this->Brand_model->bar_count();
          $brand_arr       = $this->Brand_model->get_fullbrand();
          $data['brand']   = $brand_arr;
	  	  $data['brand_cnt'] = $brand_cnt;

          $this->load->view('admin/add-product',$data);
	
     }

		public function list_product($action= NULL, $id= NULL ) 
       {
	 
			 $data['titles'] = 'List Products';
			 $data['adddiv'] = 'none';
		 	 $data['srdiv'] = 'none'; 
		
	 if($action=="delete")
			  {
				    
					$this->Product_model->delete_pro($id);
					$this->session->set_flashdata('success_msg1','Product Delete successfully.');
					redirect('admin/list-product');
			  }
			
	
	
	if ( ! file_exists('application/views/admin/list-product.php' ) )
          {
					show_404();
          }
        else
        	{
					
					$config["base_url"] = base_url() . "admin/list-product";
					$config["result"] = $this->Product_model->pro_count();	
					$config["total_rows"] = count($config["result"]);
					$config["per_page"] = 20;
					$config["uri_segment"] = 3;
					$this->pagination->initialize($config);
					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					$data["results"] = $this->Product_model->get_pro($config["per_page"], $page);
					$data["links"] = $this->pagination->create_links();
					
			 }
					$this->load->view('admin/list-product',$data);
		 }
		
	
		
		
		public function searchs($action= NULL,$title= NULL,$per_page= NULL)
		{ 

			 $data['adddiv'] = 'none';
		 	 $data['srdiv'] = 'none'; 
			 if($action=='searchs')
			 {
			 
					$data['adddiv'] = 'none';
					$data['srdiv'] = 'block';
					$data['btnaction'] = 'search';
					
				
				if($title){ $prod_code  = $title; } 
				else { $prod_code   	= $this->input->post('prod_code'); }
				$data['prod_code'] 		= $prod_code;
				
				if($title){ $name       = $title;} 
				else { $name    	    = $this->input->post('name'); }
				$data['name'] 		    = $name;

				if($title){ $status     = $title;} 
				else { $status     	    = $this->input->post('status'); }
				$data['status'] 		= $status ;

				if($title){ $in_stock   = $title;} 
				else { $in_stock      	= $this->input->post('in_stock'); }
				$data['in_stock'] 		= $in_stock;

				if($title){ $cat_id1    = $title;} 
				else { $cat_id1      	= $this->input->post('cat_id1'); }
				$data['cat_id1'] 		= $cat_id1;

				if($title){ $cat_id2    = $title;} 
				else { $cat_id2      	= $this->input->post('cat_id2'); }
				$data['cat_id2'] 		= $cat_id2;
				
				$data['searchs']=$search;
				$config = array();
				$config["base_url"] = base_url() . "admin/list-product/searchs/$a,$b,$c,$d,$e,$f";
    			$config["result"] = $this->Product_model->pro_countsearch($prod_code,$name,$status,$in_stock,$cat_id1,$cat_id2);
     			$config["total_rows"] = count($config['result']);
				$config["per_page"] =20;
        		$config["uri_segment"] = 5;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
				$data["results"] = $this->Product_model->get_prosearch($config["per_page"],$page,$prod_code,$name,$status,$in_stock,$cat_id1,$cat_id2);
				$data['searchs']=$search;
        		$data["links"] = $this->pagination->create_links();
				

			  }
			  $this->load->view('admin/list-product',$data);
		
		  }
		  
		  
		  public function resizesmall($path,$file)
		  {
		  	$config['image_library']='gd2';
		  	$config['source_image']=$path;
		  	$config['maintain_ratio']=TRUE;
		  	$config['width']=127;
		  	$config['height']=170;
		  	$config['new_image']="./uploads/small/".$file;
		  	$this->image_lib->initialize($config);
		  	$this->image_lib->resize();
		  	
		  }
		  
		  
		  public function resizemedium($path,$file)
		  {
		  	$config['image_library']='gd2';
		  	$config['source_image']=$path;
		  	$config['maintain_ratio']=TRUE;
		  	$config['width']=245;
		  	$config['height']=184;
		  	$config['new_image']="./uploads/medium/".$file;
		  	$this->image_lib->initialize($config);
		  	$this->image_lib->resize();
		  	
		  }
		  public function resizelarge($path,$file)
		  {
		  	$config['image_library']='gd2';
		  	$config['source_image']=$path;
		  	$config['maintain_ratio']=TRUE;
		  	$config['width']=1900;
		  	$config['height']=1200;
		  	$config['new_image']="./uploads/large/".$file;
		  	$this->image_lib->initialize($config);
		  	$this->image_lib->resize();
		  	
		  }
	}

