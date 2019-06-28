<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resizeupload
{

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('Image_lib');
	}
	public function resizesmall($path,$file)
	{
		$config['image_library']='gd2';
		$config['source_image']=$path;
		$config['create_thumb']=TRUE;
		$config['maintain_ratio']=TRUE;
		$config['width']=150;
		$config['height']=75;
		$config['new_image']="./uploads/small/".$file;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
	}
}

