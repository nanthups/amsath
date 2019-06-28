 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class ChatModel extends CI_Model {
 	public function __construct()
 	{
 		parent::__construct();
 	} 
 	private $Table = 'chat';
 	
 	public function GetReciverChatHistory($receiver_id)
 	{
 		$sender_id = $this->session->userdata('userid');
 		$condition= "`sender_id`= '$sender_id' AND `receiver_id` = '$receiver_id' OR `sender_id`= '$receiver_id' AND `receiver_id` = '$sender_id'";	
 		$this->db->select('*');
 		$this->db->from($this->Table);
 		$this->db->where($condition);
 		$query = $this->db->get();
 		if ($query) {
 			return $query->result_array();
 		} else {
 			return false;
 		}
 	}

 	public function SendTxtMessage($data)
 	{
 		$res = $this->db->insert($this->Table, $data); 
 		if($res == 1)
 			return true;
 		else
 			return false;
 	}
 	
 	public function GetGroupMembers($group_id)
 	{	
 		$this->db->select('*');   
 		$this->db->from('users');
 		$this->db->join('group_members', 'group_members.user_id'. '='. 'users.id');
 		$this->db->join('users_group', 'users_group.grp_id'. '='. 'group_members.grp_id');
 		$this->db->where('group_members.grp_id', $group_id);
 		$query = $this->db->get();
 		if ($query) {
 			return $query->result_array();
 		} else {
 			return false;
 		}
 	}

 	public function GetGroupChatHistory($group_id)
 	{
 		$this->db->select('*');
 		$this->db->from($this->Table);
 		$this->db->where('grp_id',$group_id);
 		$query = $this->db->get();
 		if ($query) {
 			return $query->result_array();
 		} else {
 			return false;
 		}
 	}

 	function creategroup($table, $grouparray){
 		$this->db->insert($table, $grouparray);
 		$insert_id = $this->db->insert_id();
 		return  $insert_id;
 	}
 }