<?php
// ini_set('display_errors', 0);
class Admin extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
	}

	public function index() {
		if (!is_logged_in()) {
			$this->load->view('login');
			$this->load->view('footer');
		} else {
			redirect('admin/dashboard');
		}
	}
	// login
	public function login() {
		$username = $this->input->post('firstname');
		$password = $this->input->post('password');
		$return = auth($username,$password);
		if($return == 1) {
			redirect('admin/dashboard');
		} else {
			$this->session->set_flashdata('error_msg', 'Wrong username and password');
			redirect('admin');
		}
	}

	// dashboard

	public function dashboard()
	{

		if(is_logged_in()){
			//$this->load->model('Admin_model');
			// $new_kitchens = $this->Admin_model->getCount(array('value' => 'kitchen'));
			$new_orders = $this->Admin_model->getCount(array('value' => 'appointments'));
			$new_stylist = $this->Admin_model->getCount(array('value' => 'stylist'));
			$new_customer = $this->Admin_model->getCount(array('value' => 'customer'));

			$data = array(
				// 'kitchen_count' => $new_kitchens,
				'order_count' => $new_orders,
				'stylist_count' => $new_stylist,
				'customer_count' => $new_customer
			);

			$this->load->view('header');
			$this->load->view('dashboard',$data);
			$this->load->view('footer');
		} else {
			redirect('admin');
		}	
	}

	// user list

	public function customer_list() 
	{
		// echo is_logged_in(); die;
		if(is_logged_in()){
			//$this->load->model('Admin_model');

			$obj = $this->Admin_model->getCustomers();
			
			$arr['info'] = $obj;

			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('customer_list',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('customer_list',array('error' => 'No data found'));
				$this->load->view('footer');
			}
		} else {
			redirect('admin');
		}
	}

	
	public function userStatus()
	{

		$id = $this->input->post('id');
		$status = $this->input->post('status');

	   //	$this->load->model('Admin_model');

		$res = $this->Admin_model->updateUserStatus($id,$status);

		return $res;

	}
	// order lists


	public function services() 
	{

		//$this->load->model('Admin_model');

		$obj = $this->Admin_model->getServices();
		$category_names = $this->Admin_model->getCategoryNames();
		
		$arr['info'] = $obj;
		$arr['category_names'] = $category_names;

		if($arr != 0) {

			$this->load->view('header');
			$this->load->view('services',$arr);
			$this->load->view('footer');

		} else {

			$this->load->view('header');
			$this->load->view('services',array('error' => 'No data found'));
			$this->load->view('footer');
		}
	}


	public function add_service() 
	{

		if(is_logged_in()){
			
			$arr['category_nam'] = $this->Admin_model->fetchrow('category');

			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('add_services',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('add_services',array('error' => 'No data found'));
				$this->load->view('footer');
			}
		} else {
			redirect('admin/services');
		}
	}
	

	public function add_servicess()
	{
		


		$data['category_id']=$_POST['category_id'];
		$data['service_name']=$_POST['service_name'];
		$data['service_charge']=$_POST['service_charge'];

		$file_name = $_FILES['service_image']['name'];
		$new_fileName = time().'_'.$file_name;
		$service_img = $this->upload_picservice('service_image',$new_fileName);
		$data['service_image'] = $service_img;


		$this->Admin_model->insertrow($data,'services');

		$this->session->set_flashdata('message', 'Data updated successfully');
		redirect('admin/services');


	}

	public function edit_service()
	{
		$id = $this->uri->segment(3);
		$category_names = $this->Admin_model->getCategoryNames();

		$arr['category_names'] = $category_names;

		$arr['row'] = $this->Admin_model->getDataById($id,'services');

		if(!empty($_POST)){
			$id = $_POST['id'];

			unset($_POST['id']);

			$this->Admin_model->updateData($id,$_POST,'services');
			$this->session->set_flashdata('message', 'Data updated successfully');
			redirect('admin/services');

		}else{
			$this->load->view('header');
			$this->load->view('edit_service',$arr);
			$this->load->view('footer');
		}

	}

	

	public function update_service()
	{
		if(isset($_POST['update'])){
			$data['category_id']=$_POST['category_id'];
			$data['service_name']=$_POST['service_name'];
			$data['service_charge']=$_POST['service_charge'];
			$data['service_time']=$_POST['service_time'];

			$file_name = $_FILES['service_image']['name'];


			if(!empty($file_name) && isset($file_name)){
				$new_fileName = time().'_'.$file_name;
				$data['service_image'] = $this->upload_picservice('service_image',$new_fileName);
				
			}

			$whr['id']=$_POST['id'];
			$this->Admin_model->updaterow($data,'services',$whr);

			$this->session->set_flashdata('message', 'Data updated successfully');
			redirect('admin/services');
		}

	}


	public function deleteUser()
	{
		//$this->load->model('Admin_model');
		$post = $this->input->post();
		
		if($post['id'] == 1){
			return false;
		}

		if($this->Admin_model->deleteUser($post['id'])){
			return true;
		} else {
			return false;
		}
	}

	public function editUser()
	{
		//$this->load->model('Admin_model');
		$post = $this->input->post();

		if($this->Admin_model->editUser($post)){
			return true;
		} else {
			return false;
		}
	}

	public function logout()  
	{  
	    //removing session  
		$this->session->unset_userdata(array('id','logged'));

	    // $this->session->sess_destroy(); 
		redirect("admin");

	}
	//delete service
	public function delete_service()  
	{  

		$response = $this->Admin_model->deleteservice($_POST['id'],'services');

		if($response){
			die(json_encode(['success'=>true,'message'=>'Record deleted successfully.']));
			
		}else{

			die(json_encode(['success'=>false,'message'=>'Unable to delete this. Please try after some time.']));	
		}


	} 

	public function delete_user()  
	{  

		$response = $this->Admin_model->deleteUser($_POST['id'],'users');

		if($response){
			die(json_encode(['success'=>true,'message'=>'Record deleted successfully.']));
			
		}else{

			die(json_encode(['success'=>false,'message'=>'Unable to delete this. Please try after some time.']));	
		}


	} 
	
	//get 
	public function get_customer() 
	{

		if(is_logged_in()){
			
			$whr['user_type']=1;
			$arr['fetch_customer'] = $this->Admin_model->get_customerList('users',$whr);


			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('get_customer',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('get_customer',array('error' => 'No data found'));
				$this->load->view('footer');
			}
		} else {
			redirect('admin');
		}
	}


	public function viewCustomer($id) 
	{

		if(is_logged_in()){
			$arr = array();
			$whr['id']=$id;
			$arr['fetch_customer'] = $this->Admin_model->fetchrowedit('users',$whr);
			$arr['getBeautySubCatData'] = $this->Admin_model->getCustomerBeautyDetial($id);




			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('editCustomer',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('editCustomer',array('error' => 'No data found'));
				$this->load->view('footer');
			}
		} else {
			redirect('admin');
		}
	}

	
	public function editServiceProvider($id) 
	{

		if(is_logged_in()){
			
			$whr['id']=$id;
			$arr['fetch_customer'] = $this->Admin_model->fetchrow_user('users',$whr);
			$arr['getService'] = $this->Admin_model->fetchrow('services');


			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('editServiceProvider',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('editServiceProvider',array('error' => 'No data found'));
				$this->load->view('footer');
			}
		} else {
			redirect('admin');
		}
	}


	public function updateservice()
	{
		

		if(isset($_POST['update'])){
			$data['firstname']=$_POST['firstname'];
			$data['lastname']=$_POST['lastname'];
			$data['address']=$_POST['address'];
			$data['mobile']=$_POST['mobile'];
			$data['landline']=$_POST['landline'];
			$data['status']=$_POST['status'];
			$serviceID = $_POST['service_ids'];

			$arr = implode(",", $serviceID);
			$data['service_ids'] = $arr;

			$whr['id']=$_POST['id'];
			$this->Admin_model->updaterow($data,'users',$whr);

			$this->session->set_flashdata('message', 'Data updated successfully');
			redirect('admin/get_serviceProvider');

		}

	}

	
	public function get_serviceProvider() 
	{

		if(is_logged_in()){
			
			$whr['user_type']=2;
			$arr['fetch_customer'] = $this->Admin_model->get_user('users',$whr);

			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('get_serviceProvider',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('get_serviceProvider',array('error' => 'No data found'));
				$this->load->view('footer');
			}
		} else {
			redirect('admin');
		}
	}


	public function add_serviceProvider() 
	{

		if(is_logged_in()){
			
			$whr['user_type']=1;
			$arr['fetch_customer'] = $this->Admin_model->fetchrowedit('users',$whr);
			$arr['getService'] = $this->Admin_model->fetchrow('services');

			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('add_serviceProvider',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('add_serviceProvider',array('error' => 'No data found'));
				$this->load->view('footer');
			}
		} else {
			redirect('admin');
		}
	}

	public function add_servicePro()
	{
		

		if(isset($_POST['add_provider'])){
			$data['firstname'] = $_POST['firstname'];
			$data['lastname'] = $_POST['lastname'];
			$data['email'] = $_POST['email'];
			$data['password'] = $_POST['password'];
			$data['address'] = $_POST['address'];
			$lati = $_POST['latitude'];
			$long = $_POST['longitude'];
			$data['latlng'] = $lati.'@'.$long;
			$data['profile_pic'] = $this->upload_pic('profile_pic');
			$data['portfolio_image_ids']=$this->upload_pic('portfolio_img');
			$data['telephone'] = $_POST['telephone'];
			$data['mobile'] = $_POST['mobile'];
			$data['landline'] = $_POST['landline'];
			$data['status'] = $_POST['status'];
			$serviceID = $_POST['service_ids'];

			$arr = implode(",", $serviceID);
			$data['service_ids'] = $arr;

			$data['user_type'] = 2;


			$this->Admin_model->insertrow($data,'users');

			$this->session->set_flashdata('message', 'Data updated successfully');
			redirect('admin/get_serviceProvider');

		}

	}

	public function active_user($id)
	{
		$data['status'] = 0;
		$whr['id'] = $id;
		$this->Admin_model->updaterow($data,'users',$whr);
		redirect('admin/get_customer');
	}

	public function deactive_user($id)
	{
		$data['status'] = 1;
		$whr['id'] = $id;
		$this->Admin_model->updaterow($data,'users',$whr);
		redirect('admin/get_customer');
	}


	public function active_userp($id)
	{
		$data['status'] = 0;
		$whr['id'] = $id;
		$this->Admin_model->updaterow($data,'users',$whr);
		redirect('admin/get_serviceProvider');
	}

	public function deactive_userp($id)
	{
		$data['status'] = 1;
		$whr['id'] = $id;
		$this->Admin_model->updaterow($data,'users',$whr);
		redirect('admin/get_serviceProvider');
	}

	public function getCategory() 
	{

		if(is_logged_in()){
			

			$arr['fetch_category'] = $this->Admin_model->fetchcat('category');

			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('getCategory',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('getCategory',array('error' => 'No data found'));
				$this->load->view('footer');
			}
		} else {
			redirect('admin');
		}
	}

	//delete category
	public function delete_category()  
	{  

		$response = $this->Admin_model->deleteCate($_POST['id'],'category');

		if($response){
			die(json_encode(['success'=>true,'message'=>'Record deleted successfully.']));
			
		}else{

			die(json_encode(['success'=>false,'message'=>'Unable to delete this. Please try after some time.']));	
		}


	} 

	public function add_category()
	{
		$category_names = $this->Admin_model->getCategoryNames();

		$arr['category_names'] = $category_names;
		if(!empty($_POST)){

			$this->Admin_model->addData($_POST,'services');
			$this->session->set_flashdata('message', 'Data added successfully');
			redirect('admin/services');

		}else{
			$this->load->view('header');
			$this->load->view('add_category',$arr);
			$this->load->view('footer');
		}

	}

	public function add_categ()
	{
		

		if(isset($_POST['add_cat'])){

			$data['category_name']=$_POST['category_name'];

			$this->Admin_model->insertrow($data,'category');

			$this->session->set_flashdata('message', 'Data Insert successfully');
			redirect('admin/getCategory');

		}

	}


	public function edit_category($id) 
	{

		if(is_logged_in()){
			
			$whr['id']=$id;
			$arr['fetch_category'] = $this->Admin_model->fetchrowedit('category',$whr);

			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('edit_category',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('edit_category',array('error' => 'No data found'));
				$this->load->view('footer');
			}
		} else {
			redirect('admin');
		}
	}

	public function updatecategory()
	{
		

		if(isset($_POST['update'])){
			$data['category_name']=$_POST['category_name'];

			$whr['id']=$_POST['id'];
			$this->Admin_model->updaterow($data,'category',$whr);

			$this->session->set_flashdata('message', 'Data updated successfully');
			redirect('admin/getCategory');

		}

	}

	public function active_service($id)
	{
		$data['status'] = 0;
		$whr['id'] = $id;
		$this->Admin_model->updaterow($data,'services',$whr);
		redirect('admin/services');
	}

	public function deactive_service($id)
	{
		$data['status'] = 1;
		$whr['id'] = $id;
		$this->Admin_model->updaterow($data,'services',$whr);
		redirect('admin/services');
	}

	

	public function insert_bsubcat()
	{
		


		$data['beauty_category_id']=$_POST['beauty_category_id'];
		$data['name']=$_POST['name'];


		$this->Admin_model->insertrow($data,'beauty_sub_category');

		$this->session->set_flashdata('message', 'Data updated successfully');
		redirect('admin/getBeautySubCategory');


	}
	


	public function upload_pic($name)
	{
		$this->load->helper('form');
		$config['upload_path'] = 'uploads/customer/36/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '30000';
		$config['max_width'] = '102400';
		$config['max_height'] = '76800';
		$this->load->library('upload',$config);
		$this->load->initialize($config);
		if(!$this->upload->do_upload($name)){
			$data = array('msg' =>$this->upload->display_errors());
		}else{
			$data = array('msg' =>"success");
			$databasea['upload_data'] = $this->upload->data();
			$this->load->library('image_lib');

			return $databasea['upload_data']['file_name'];

		}
		return '';
	}

	public function upload_picservice($name,$file_name)
	{
		$this->load->helper('form');
		$config['upload_path'] = 'uploads/service_image/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '30000';
		$config['max_width'] = '102400';
		$config['max_height'] = '76800';
		$config['file_name'] = $file_name;
		$this->load->library('upload',$config);
		$this->load->initialize($config);
		if(!$this->upload->do_upload($name)){
			// print_r($data);
			//die();
		}else{
			$data = array('msg' =>"success");
			$databasea['upload_data'] = $this->upload->data();
			$this->load->library('image_lib');

			return $databasea['upload_data']['file_name'];

		}
		return '';
	}



}