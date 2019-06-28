<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Password
{
   
    public function __construct()
    {
	  	$this->CI =& get_instance();
		//$this->CI->load->library('encrypt');
	}
	public function encrypt_password($password){
	         
			   $key  = 'swebin';
			   $key2 = 'sosp@$%Ck';
			   $string = $password; 
					   
			    $output = false;
				$encrypt_method = "AES-256-CBC";
				$key = hash( 'sha256', $key );
				$iv = substr( hash( 'sha256', $key2 ), 0, 16 );
				$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
				return $output;
	}


	public function decrypt_password($password){
	

				 $key  = 'swebin';
			     $key2 = 'sosp@$%Ck';
			     $string = $password; 
		
					   
			    $output = false;
				$encrypt_method = "AES-256-CBC";
				$key = hash( 'sha256', $key );
				$iv = substr( hash( 'sha256', $key2 ), 0, 16 );
				$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
				return $output;


	}
	
}

