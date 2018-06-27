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
	public function getStylers () 
	{

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_type = "2"');
		$query = $this->db->get();

		if ($query -> num_rows() > 0) {
			return $query -> result_array();
		} else {
			return 0;
		}

	}
	public function getReferrals ()
	{

		$this->db->select('*');
		$this->db->from('refferal');
		$query = $this->db->get();

		if ($query -> num_rows() > 0) {
			return $query -> result_array();
		} else {
			return 0;
		}

	}	
	public function getQuestions ()
	{

		$this->db->select('*');
		$this->db->from('questions');
		$this->db->where('status','0');
		$query = $this->db->get();

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
		if(count($result) > 0) 
		{
			foreach ($result as $key => $value) 
			{

				$this->db->select('category_name');
				$this->db->from('category');
				$this->db->where(array('id' => $value['category_id']));
				$category_q = $this->db->get();
				$category_name = $category_q->result_array();
				$category_name = $category_name[0]['category_name'];

				$result[$key]['category_name'] = $category_name;

			}
			return $result;
		} 
		else 
		{
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
	public function getAppointments()
	{
		$query = $this->db->get('appointments');
		$result = $query -> result_array();

		foreach ($result as $key => $value) {

			$this->db->select('firstname');
			$this->db->from('users');
			$this->db->where(array('id' => $value['styler_id']));
			$styler_q = $this->db->get();
			$styler_name = $styler_q->result_array();
			$styler_name = $styler_name[0]['firstname'];
		
			$this->db->select('firstname');
			$this->db->from('users');
			$this->db->where(array('id' => $value['customer_id']));
			$customer_q = $this->db->get();
			$customer_name = $customer_q->result_array();
			$customer_name = $customer_name[0]['firstname'];

			$this->db->select('service_name');
			$this->db->from('services');
			$this->db->where(array('id' => $value['service_id']));
			$service_q = $this->db->get();
			$service_name = $service_q->result_array();
			$service_name = $service_name[0]['service_name'];

			if(date('Y-m-d') < $result[$key]['appointment_date'] && $result[$key]['status'] == '1'){
				$result[$key]['status'] = 'Upcoming';
			} else if(date('Y-m-d') > $result[$key]['appointment_date']){
				$result[$key]['status'] = 'Previous';
			} else if($result[$key]['status'] = '3') {
				$result[$key]['status'] = 'Paid';
			} else {
				$result[$key]['status'] = 'Canceled';
			}

			$result[$key]['customer_name'] = $customer_name;
			$result[$key]['styler_name'] = $styler_name;
			$result[$key]['service_name'] = $service_name;
		}
		
		if (count($result) > 0) {
			return $result;
		} else {
			return 0;
		}

	}
	public function getAppointmentDetails($id)
	{
		$query = $this->db->get_where('appointments',array('id' => $id));
		$result = $query -> result_array();

		foreach ($result as $key => $value) {

			$this->db->select('GROUP_CONCAT(category_name) as category');
			$this->db->from('category');
			$this->db->where("find_in_set(id, '".$result[$key]['category_id']."')");
			$category_q = $this->db->get();

			$category_name = $category_q->result_array();
			$category_name = $category_name[0]['category_name'];

			$this->db->select('GROUP_CONCAT(service_name) as service');
			$this->db->from('services');
			$this->db->where("find_in_set(id, '".$result[$key]['service_id']."')");
			$service_q = $this->db->get();

			$service_name = $service_q->result_array();
			$service_name = $service_name[0]['category_name'];

		}

		if (count($result) > 0) {
			return $result;
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
	public function getorders () 
	{

		$query_order = $this->db->get('orders');
		$result = $query_order -> result_array();

		foreach ($result as $key => $value) {

			$this->db->select('firstname');
			$this->db->from('users');
			$this->db->where(array('id' => $value['styler_id']));
			$styler_q = $this->db->get();
			$styler_name = $styler_q->result_array();
			$styler_name = $styler_name[0]['firstname'];
		
			$this->db->select('firstname');
			$this->db->from('users');
			$this->db->where(array('id' => $value['customer_id']));
			$customer_q = $this->db->get();
			$customer_name = $customer_q->result_array();
			$customer_name = $customer_name[0]['firstname'];

			$result[$key]['customer_name'] = $customer_name;
			$result[$key]['styler_name'] = $styler_name;
		}
		
		if (count($result) > 0) {
			return $result;
		} else {
			return 0;
		}

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
	public function getkitchen () 
	{

		$query = $this->db->get('kitchen');

		if ($query -> num_rows() > 0) {
			return $query -> result_array();
		} else {
			return 0;
		}

	}
	public function updatekitchenStatus($id,$status)
	{
		if($status==1){

            $this->db->where(array('id'=>$id,'status'=>$status));
			$this->db->update('kitchen',array('status'=>'0'));
			return 1;

		}
		else if($status==0){

		    $this->db->where('status',$status);
			$this->db->update('kitchen',array('status'=>'1'));	
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

	public function deleteApp($id)
	{
		if($this->db->delete('appointments', array('id' => $id))){
			return true;
		} else {
			return false;
		}
	}

	public function deleteReferral($id)
	{
		if($this->db->delete('referral', array('id' => $id))){
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

	public function deleteKitchen($id)
	{
		if($this->db->delete('kitchen', array('id' => $id))){
			return true;
		} else {
			return false;
		}
	}

	public function editKitchen($data)
	{	
		$this->db->where('id',$data['id']);

		if($this->db->update('kitchen', $data)){
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

	//--------------create by Neha----------------

	public function fetchrowedit($tbl_name,$id)
	{
		$query = $this->db->get_where($tbl_name,$id);
		return $query->result();
	}

	public function get_user($tbl_name,$id)
	{
		$this->db->order_by("id","desc");
		$query = $this->db->get_where($tbl_name,$id);
		return $query->result();
	}

	public function get_customerList($tbl_name,$id)
	{
		$this->db->order_by("id","desc");
		$query = $this->db->get_where($tbl_name,$id);
		//echo $this->db->last_query(); die;
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

	public function getReference($tbl_name)
	{
		$this->db->order_by("id","desc");
		$query = $this->db->get($tbl_name);
		return $query->result();
	}

	public function Referenceiew($tbl_name,$id)
	{
		$query = $this->db->get_where($tbl_name,$id);
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
	

	public function fetchcat($tbl_name)
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

	public function deleteBeautyCate($id)
	{
		if($this->db->delete('beauty_category', array('id' => $id))){
			return true;
		} else {
			return false;
		}
	}

	public function deleteSubBeautyCate($id)
	{
		if($this->db->delete('beauty_sub_category', array('id' => $id))){
			return true;
		} else {
			return false;
		}
	}

	public function getCustomerBeautyDetial($id)
	{
		$final = array();
		$query = $this->db->select('*')->where( array('user_id' => $id))->get('customer_beauty_detail');
		$data = $query->result();
		if(!empty($data)){
		//print_r($data); die;
	    $beauty_subcatid = $data[0]->beauty_sub_category_ids;
	    $arr = explode(",", $beauty_subcatid);

	    $query2 = $this->db->select('*')->where_in('id',$arr)->get('beauty_sub_category');
	   
	    $beatySubCatDetail = $query2->result_array();

	    $final['allergy'] = $data[0]->allergy; 
	    $final['beatySubCatDetail'] = $beatySubCatDetail;


	    $beauty_subcatimg = $data[0]->image_ids; 
	    
	    if($beauty_subcatimg != ''){
	    $arr2 = explode(",", $beauty_subcatimg);
	    $query3 = $this->db->select('*')->where_in('id',$arr)->get('users_images');
	    $beautyImages = $query3->result_array();
	    $final['beautyImages'] = $beautyImages;
	   // print_r($final);
	    return $final;

	  }
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


      public function getAppointmentsList()
    {

        $this->db->select('app.id,app.service_id,us.firstname as stylerFname,us.lastname as stylerLname,usr.firstname as customerFname,usr.lastname as customerLname,app.appointment_date,app.status,ser.service_charge');
        $this->db->from('appointments app');
        $this->db->join('users us','us.id = app.styler_id','left');
        $this->db->join('users usr','usr.id = app.customer_id','left');
        $this->db->join('services ser','ser.id = app.service_id','left');
        $query = $this->db->get();
        return $query->result();
         
    }   


    public function getreferenceOrder()
    {

        $this->db->select('refeoder.id as refeoderID,refeoder.appoinment_id,refeoder.amount,refe.name as referralName,app.settlement_status,app.appointment_date,us.firstname as customerFname,us.lastname as customerLname,usr.firstname as stylerFname,usr.lastname as stylerLname,refeoder.amount');

        $this->db->from('referral_order refeoder');
        $this->db->join('referral refe','refe.id = refeoder.referral_id','left');
        $this->db->join('appointments app','app.id = refeoder.appoinment_id','left');
        $this->db->join('users us','us.id = app.customer_id','left');
        $this->db->join('users usr','usr.id = app.styler_id','left');
        $query = $this->db->get();
        return $query->result();
         
    }  


    
}