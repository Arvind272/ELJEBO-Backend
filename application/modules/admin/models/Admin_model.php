	<?php

class Admin_model extends CI_Model {

	public function getCustomers () 
	{

		$query = $this->db->get_where('users',array('user_type' => '1'));

		if ($query -> num_rows() > 0) {
			return $query -> result_array();
		} else {
			return 0;
		}

	}
	
	public function getServices ()
	{

		$this->db->select('*');
		$this->db->from('services');
		//$this->db->where('status','0');
		$this->db->order_by("id","desc");
		$query = $this->db->get();

		$result = $query -> result_array();

		foreach ($result as $key => $value) {

			$this->db->select('category_name');
			$this->db->from('category');
			$this->db->where(array('id' => $value['category_id']));
			$category_q = $this->db->get();
			$category_name = $category_q->result_array();
			$category_name = $category_name[0]['category_name'];

			$result[$key]['category_name'] = $category_name;

		}
		
		if (count($result) > 0) {
			return $result;
		} else {
			return 0;
		}
		
	}

	public function getUserName($id)
	{
		$sql = $this->db->select('*')->where('id',$id)->get('users');

		return $sql->result_array();
	}
	public function getCategoryNames ()
	{
		$this->db->select(array('id','category_name'));
		$this->db->from('category');
		$query = $this->db->get();

		if ($query -> num_rows() > 0) {
			return $query -> result_array();
		} else {
			return 0;
		}
	}

	public function addData($post,$table)
	{
		if($this->db->insert($table,$post)){
			return 1;
		} else {
			return 0;
		}
	}
	public function updateUserStatus($id,$status)
	{
		if($status=='0'){
			$this->db->set(array('status' => '0'));
            $this->db->where(array('id'=>$id));
			$this->db->update('users');
			return 1;
		}
		else if($status=='1'){
			$this->db->set(array('status' => '1'));
		    $this->db->where(array('id'=>$id));
			$this->db->update('users');	
			return 1;
		}
	}
	public function delete_row($id,$table)
	{
		$this->db->set(array('status' => '1'));
		$this->db->where(array('id'=>$id));
		$this->db->limit(1);
		$this->db->update($table);
		return 1;
	}

	public function updateData($id,$post,$table)
	{
		$this->db->set($post);
		$this->db->where(array('id'=>$id));
		$this->db->limit(1);
		$this->db->update($table);
		return 1;
	}
	public function getDataById($id,$table)
	{
		$this->db->where(array('id'=>$id));
		$this->db->limit(1);
		$obj = $this->db->get($table);
		return $obj->row();
	}
	public function updateorderStatus($id,$status)
	{
		if($status==1){

            $this->db->where(array('id'=>$id,'status'=>$status));
			$this->db->update('orders',array('status'=>'0'));
			return 1;

		}
		else if($status==0){

		    $this->db->where('status',$status);
			$this->db->update('orders',array('status'=>'1'));	
			return 1;

		}
	}
	public function deleteUser($id)
	{
		if($this->db->delete('users', array('id' => $id))){
			return true;
		} else {
			return false;
		}
	}


	public function deleteservice($id)
	{
		if($this->db->delete('services', array('id' => $id))){
			return true;
		} else {
			return false;
		}
	}

	public function editUser($data)
	{	
		$this->db->where('id',$data['id']);

		if($this->db->update('users', $data)){
			return true;
		} else {
			return false;
		}
	}

	public function getCount($data)
	{

		$date = date('Y-m-d');
		if($data['value'] == 'stylist'){

			$this->db->select('id');
			$this->db->from('users');
			$this->db->where('(user_type = "2")');
			$query = $this->db->get();

			return $query->num_rows();

		} else if($data['value'] == 'customer'){

			$this->db->select('id');
			$this->db->from('users');
			$this->db->where('user_type = "1"');
			$query = $this->db->get();

			return $query->num_rows();

		} /*else if($data['value'] == 'kitchen'){

			$this->db->select('id');
			$this->db->from('kitchen');
			$query = $this->db->get();

			return $query->num_rows();		

		}*/ else if($data['value'] == 'appointments'){

			$this->db->select('id');
			$this->db->from('appointments');
			$query = $this->db->get();

			return $query->num_rows();

		}
	}

	public function get_user($tbl_name,$id)
	{
		$this->db->order_by("id","desc");
		$query = $this->db->get_where($tbl_name,$id);
		return $query->result();
	}


	public function fetchrow_user($tbl_name,$id)
	{
		$query = $this->db->get_where($tbl_name,$id);
		return $query->result();
	}

	public function fetchrow($tbl_name)
	{
		$query = $this->db->get($tbl_name);
		return $query->result();
	}


	public function fetchBeautySubCat($tbl_name)
	{
		$this->db->order_by("id","desc");
		$query = $this->db->get($tbl_name);
		return $query->result();
	}

	public function fetchBeautyCat($tbl_name)
	{
		$this->db->order_by("id","desc");
		$query = $this->db->get($tbl_name);
		return $query->result();
	}
	

	public function updaterow($data,$table,$id)
	{
		$this->db->where($id);
		$this->db->update($table,$data);
	}
	
	public function insertrow($data,$table)
	{
		$this->db->insert($table,$data);
		
	}

	public function deleterow($table,$id)
	{
		$this->db->where($id);
		$this->db->update($table);
		
	}

	public function deleteCate($id)
	{
		if($this->db->delete('category', array('id' => $id))){
			return true;
		} else {
			return false;
		}
	}


	public function getUserData($id)
	{
		$query = $this->db->select('*')->where(array('id'=>$id))->get('users')->result();

		return $query;

	}

	
    public function getUserDataFromId($id)
        {
        	$sql = $this->db->select()->where()->get('users');
        	$result = $sql->result_array();

        	return $result;
        }

       public function getServiceCharge($serviceIds)
       {

       $sql = $this->db->query('SELECT SUM(service_charge) as total_charge FROM `services` WHERE id in('.$serviceIds.')');
       return $result = $sql->result();
      
       }




    
}