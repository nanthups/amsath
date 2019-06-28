<?php
   class CommonModel extends CI_Model {       
   	function __construct()
   	{            
   		parent::__construct();
   	}

    /** For get all data **/
    function getAll($tableName='', $field='', $id='', $limit='')
    {
    	$this->db->from($tableName);
      if ($field) :
       $this->db->where($field, $id);
     endif;
     $this->db->order_by( $field, "desc");
     if ($limit) :
      $this->db->limit($limit); 
      return $this->db->get()->result_array(); 
    else:
      return $this->db->get()->result_array();
    endif;
  }

  /** This function is used get all by joining two **/
 function fetchJoinAll($tableOne='', $tableTwo='', $fieldOne='', $fieldTwo='', $id='', $limit='')
{
  $userid = $this->session->userdata('userid');
  $this->db->select('*');   
  $this->db->from($tableOne);
  $this->db->join($tableTwo, $tableTwo.'.'.$fieldTwo. '='. $tableOne.'.'.$fieldOne);
  $this->db->group_by($tableOne.'.'.$fieldOne);
  $this->db->order_by($tableOne.'.'.$fieldOne,'desc');
  if ($id != NULL) :
    $this->db->where($tableOne.'.'.$fieldOne, $id);
    $this->db->where($tableOne.'.'.'id', $userid);
    return $this->db->get()->row();
  elseif ($limit != NULL) :
    $this->db->limit($limit); 
    return $this->db->get()->result_array(); 
  else :
   return $this->db->get()->result_array(); 
 endif;
}

/** This function is used to count all **/
public function totalRows($tableName='',$fields='',$id='') 
{
  $this->db->select($fields);
  $this->db->from($tableName);
  if ($id != '') :
   $this->db->where($fields,$id);
 endif;
 $query = $this->db->get();
 $count = $query->num_rows();
 return $count;
}

/** For insert a row **/
function insertData($tableName='', $data='')
{
  $this->db->insert($tableName,$data); 
  return true;
}

/** For insert a row and return id**/
function insertReturnId($tableName='', $data='')
{
  $this->db->insert($tableName,$data); 
  return $this->db->insert_id();
}

/** For update row of id **/
function updateData($tableName='', $data='', $field='', $id='')
{
  $this->db->where($field, $id);
  $this->db->update($tableName, $data);
  return true;
}

/** For update one field of id **/
function updateOneData($tableName='', $field='', $data='', $where='', $id='')
{
 $this->db->set($field, $data);
 $this->db->where($where,$id);
 $this->db->update($tableName);
}

/** For set field of id **/
function setData($tableName='', $field='', $data='', $where='', $id='')
{
  $this->db->set($field, $data);
  $this->db->where($where, $id);
  $this->db->update($tableName);
  return true;
}

/** For return row of id **/
function returnOfId($tableName='',$field='', $id='')
{
 $this->db->where($field, $id);
 return $this->db->get($tableName)->row();
}

/** For delete row with id **/
function deleteOfId($tableName='',$field='', $id='')
{
 $this->db->where($field, $id);
 $this->db->delete($tableName);
 return true;
}

/** For update Status **/
function updateStatus($tableName='', $status='', $idField='', $id='')
{
  $this->db->set('Status', $status);
  $this->db->where($idField, $id);
  $this->db->update($tableName);
  return true;
}

/** Get Count **/
public function recordCount($tableName='', $field='', $id='') 
{
  $this->db->where($field, $id);
  return $this->db->count_all($tableName);
}

public function getImageList($limit,$start,$id)
{
 $this->db->select('*');
 $this->db->from('sell_files');
 $this->db->join('file_category', 'file_category.id = sell_files.category');
 $this->db->group_by('sell_files.file_id');
 $this->db->order_by('sell_files.file_id','desc');
 $this->db->limit($limit, $start);
 if ($id != NULL) :
  $this->db->where('user_id', $id);
  return $this->db->get()->result_array();
else:
 return $this->db->get()->result();
endif;
}

public function inputSearch($tableName='', $field='', $search='', $category='')
{
 $this->db->select('*');
 $this->db->from($tableName);
 if ($category != NULL):
  $this->db->where('category', $category);
else:
 $this->db->like($field, $search);
endif;
return $this->db->get()->result();
}

public function experts_list($limit,$start)
{
  $this->db->select('id,fname,sname,type,image,star_rate');
  $this->db->limit($limit, $start);
  $this->db->order_by('users.id','desc');
  $query = $this->db->get('users');
  return $query->result();
}

}