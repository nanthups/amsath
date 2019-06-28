<?php
class Admin_model extends CI_Model {

       
	   public function login_valid($username, $password)
	    {
 
			$query = $this->db->get_where('admin',array('username'=>$username,'password' => $password));
	  		return $query->result();
		}
	}