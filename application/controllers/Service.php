<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Service extends CI_Controller {
	
	public function __construct(){
		parent::__construct();

		// Protect Method
		$allowMethod = array('login','register','serviceProviderLogin','serviceProviderRegister','serviceForgotPassword');
		if (!in_array(get_current_page_method(), $allowMethod)) {
			if(!is_user_logged_in('service')){
				redirect(base_url('Service/login'));
			}
		}
	}

	/**
	 * Initilize Service Provider
	 */
	public function index(){

		redirect(base_url(get_current_page_method('class').'/dashboard'));
	}

	//Service Provider Login Page
	public function login() 
	{	
		$title['title']="Service Login";		
		$this->load->view('service/login',$title);
	}

	//Service Provider Register Page
	public function register() 
	{	
		$service_url = api_base_url('getReferrals');
		$curl_post_data = array();
		$response = call_postMethodWithEmptyArray($type = "POST",$service_url,$curl_post_data);
		$data = json_decode($response);	
		$this->load->view('service/register',$data);
	}

	//Service Provider Login 
	public function serviceProviderLogin() 
	{
		$_POST['email'] = $this->input->post('email'); 
		$_POST['password'] = $this->input->post('password'); 
		$_POST['user_type'] = 2; 
		$service_url = api_base_url('login');
		$curl_post_data = $_POST;
		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		echo $data = json_decode($response);
		if($data->status == 1){
			set_login('service',$data);
			die(json_encode(['success'=>'1','message'=>$data->message,'user_type'=>$data->data->user_type]));
		}else{     
			die(json_encode(['success'=>'0','message'=>$data->message,'user_type'=>$data->status]));
		}
	}

	//Service Provider Login 
	public function serviceProviderRegister() 
	{
		$_POST['firstname'] = $this->input->post('firstname');
		$_POST['lastname'] = $this->input->post('lastname');
		$_POST['email'] = $this->input->post('email');
		$_POST['password'] = $this->input->post('password'); 
		$_POST['password_confirm'] = $this->input->post('password_confirm');
		$_POST['referral_id'] = $this->input->post('referral_id');
		$_POST['user_type'] = 2;
		$_POST['certificate_ids']=1;
		unset($_POST['password_confirm']); 
		$service_url = api_base_url('register');
		$curl_post_data = $_POST;
		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		$data = json_decode($response);
		if($data->status == 1){
			set_login('service',$data);
			die(json_encode(['success'=>'1','message'=>$data->message,'user_type'=>$data->data->user_type]));
		}else{     
			die(json_encode(['success'=>'0','message'=>$data->message,'user_type'=>$data->status]));
		}
	}
	//Service Provider Forgot Password
	public function serviceForgotPassword() 
	{
		$_POST['email'] = $this->input->post('email');
		$_POST['user_type'] = 2; 
		$curl_post_data =$_POST;
		$service_url = api_base_url('forgetPassword');
		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		$data = json_decode($response);
		if($data->status == 1){
			die(json_encode(['success'=>'1','message'=>$data->message]));
		}else{     
			die(json_encode(['success'=>'0','message'=>$data->message]));
		}
	}
	

	// Service Provider Dashboard
	public function dashboard(){

		$_POST['user_id'] = get_current_user_id();

		if(isset($_SESSION['service']->data->token) && $_SESSION['service']->data->token != ""){
			$token =$_SESSION['service']->data->token;
		}else{
			$token =$_SESSION['service']->token;
		}
		$_POST['token'] = $token;
		$_POST['start_date'] = date('Y-m-01',strtotime(date('Y-m-d')));
		$_POST['end_date'] = date('Y-m-t',strtotime(date('Y-m-d')));
		$service_url = api_base_url('dashboard');
		$curl_post_data = $_POST;
		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		$data = json_decode($response);

		$title['title']="Dashboard";
		$this->load->view('includes/service/metadata',$title);
		$this->load->view('includes/service/header',$title);
		$this->load->view('includes/service/sidebar');
		$this->load->view('service/dashboard',$data);
		$this->load->view('includes/service/footer', $data);	
	}
	//Service Provider logout
	public function logout(){
		$_POST['user_id'] = $_SESSION['service']->data->id;
		$service_url = api_base_url('logout');
		$curl_post_data = $_POST;
		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		$data = json_decode($response);
		if($data->status == 1){
			session_destroy();
			unset($_SESSION['service']);
			die(json_encode(['success'=>'1','message'=>$data->message]));
		}else{     
			die(json_encode(['success'=>'0','message'=>$data->message]));
		}
	}
	//Service Provider Profile 
	public function serviceProfile(){

		if(empty($_SESSION['service'])){
			redirect("Service/login");
		}

		$_POST['user_id'] = $_SESSION['service']->data->id;
		$_POST['token']=$_SESSION['service']->token;
		$service_url = api_base_url('getstylistProfile');
		$curl_post_data = $_POST;
		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		$data = json_decode($response);

		$title['title']="Profile";
		$this->load->view('includes/service/metadata',$title);
		$this->load->view('includes/service/header',$title);
		$this->load->view('includes/service/sidebar');
		$this->load->view('service/profile',$data);
		$this->load->view('includes/service/footer');
	}
	//Service Provider Pending 
	public function pending(){
		if(empty($_SESSION['service'])){
			redirect("Service/login");
		}
		$_POST['user_id'] = $_SESSION['service']->data->id;
		$_POST['token']=$_SESSION['service']->token;
		$_POST['user_type'] =2;
		$service_url = api_base_url('getPendingAppoinment');
		$curl_post_data = $_POST;
		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		$data = json_decode($response);

		$title['title']="Pending";
		$this->load->view('includes/service/metadata',$title);
		$this->load->view('includes/service/header',$title);
		$this->load->view('includes/service/sidebar');
		$this->load->view('service/pending',$data);
		$this->load->view('includes/service/footer');	
	}
	//Service Provider upcoming 
	public function upcoming(){
		if(empty($_SESSION['service'])){
			redirect("Service/login");
		}
		$_POST['user_id'] = $_SESSION['service']->data->id;
		$_POST['token']=$_SESSION['service']->token;
		$_POST['user_type'] =2;
		$service_url = api_base_url('upcomingAppoinment');
		$curl_post_data = $_POST;
		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		$data = json_decode($response);
		$title['title']="Upcoming";
		$this->load->view('includes/service/metadata',$title);
		$this->load->view('includes/service/header',$title);
		$this->load->view('includes/service/sidebar');
		$this->load->view('service/upcoming',$data);
		$this->load->view('includes/service/footer');
	}

	/**
	 * Service Provider Chat
	 */
	public function chat(){

		$data = '';

		$title['title']="Chat";
		$this->load->view('includes/service/metadata',$title);
		$this->load->view('includes/service/header',$title);
		$this->load->view('includes/service/sidebar');
		$this->load->view('service/chat',$data);
		$this->load->view('includes/service/footer');


	}



	//Service Provider Previous 
	public function previous(){
		if(empty($_SESSION['service'])){
			redirect("Service/login");
		}
		$_POST['user_id'] = $_SESSION['service']->data->id;
		$_POST['token']=$_SESSION['service']->token;
		$_POST['user_type'] =2;
		$service_url = api_base_url('getPreviousAppoinment');
		$curl_post_data = $_POST;
		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		$data = json_decode($response);
		$title['title']="Previous";
		$this->load->view('includes/service/metadata',$title);
		$this->load->view('includes/service/header',$title);
		$this->load->view('includes/service/sidebar');
		$this->load->view('service/previous',$data);
		$this->load->view('includes/service/footer');	
	}
	//Service Provider Pending upcoming
	public function pendingAppoinment(){
		if(empty($_SESSION['service'])){
			redirect("Service/login");
		}
		$_POST['user_id'] = $_SESSION['service']->data->id;
		$_POST['token']=$_SESSION['service']->token;
		$_POST['user_type'] =2;
		$_POST['appoinment_id'] = $this->uri->segment('3');
		$service_url = api_base_url('getAppoinmentDetails');
		$curl_post_data = $_POST;
		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		$data = json_decode($response);

		$title['title']="Appointment Detail";
		$this->load->view('includes/service/metadata',$title);
		$this->load->view('includes/service/header',$title);
		$this->load->view('includes/service/sidebar');
		$this->load->view('service/pending_appointments',$data);
		$this->load->view('includes/service/footer');	
	}
	//Service Provider Pending upcoming
	public function upcomingAppoinment(){
		if(empty($_SESSION['service'])){
			redirect("Service/login");
		}
		$_POST['user_id'] = $_SESSION['service']->data->id;
		$_POST['token']=$_SESSION['service']->token;
		$_POST['user_type'] =2;
		$_POST['appoinment_id'] = $this->uri->segment('3');
		$service_url = api_base_url('getAppoinmentDetails');
		$curl_post_data = $_POST;
		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		$data = json_decode($response);

		$title['title']="Appointment Detail";
		$this->load->view('includes/service/metadata',$title);
		$this->load->view('includes/service/header',$title);
		$this->load->view('includes/service/sidebar');
		$this->load->view('service/upcoming_appointments',$data);
		$this->load->view('includes/service/footer');	
	}
	//Service Provider update appoinment status
	public function updateAppoinment(){
		$_POST['user_id'] = $_SESSION['service']->data->id;
		$_POST['token']=$_SESSION['service']->token;
		$service_url = api_base_url('updateAppoinmentStatus');
		$curl_post_data = $_POST;
		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		$data = json_decode($response);
		if($data->status == 1){
			die(json_encode(['success'=>'1','message'=>$data->message]));
		}else{     
			die(json_encode(['success'=>'0','message'=>$data->message]));
		}

	}
	//Service Provider Profile Pic Update
	public function profilePicUpdate(){
		$user_id = $_SESSION['service']->data->id;
		if(!empty($_FILES['pic_file']['name'])){

			$path = FCPATH.'uploads/service_provider/'.$user_id.'/';
			if (is_dir($path)) {
				if (!is_writable($path)) {
					chmod($path, 0777);
				}
			}else{
				mkdir($path, 0777);
				chmod($path, 0777);
			}

			$config['upload_path'] = $path;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['encrypt_name'] = TRUE;
			$config['file_name'] = $_FILES['pic_file']['name'];
			$this->load->library('upload');
			$this->upload->initialize($config);
			if($this->upload->do_upload('pic_file'))
			{
				$data =$this->upload->data();
				chmod($data['full_path'], 0777);
				$profile_pic = $data['file_name'];
				$saveImageId['profile_pic'] =save_data($profile_pic,'users_images');
				if(!empty($saveImageId)){
					$uploadImgID=uploadImage($saveImageId,$user_id);
					if($uploadImgID == 1){
						redirect('Service/serviceProfile');
					}		
				}
			}
			else
			{
				$error = array('error' => $this->upload->display_errors());
			}
		}
	}
		//Service Provider Save profile data
	public function saveProfileData(){
		$user_id = $_SESSION['service']->data->id;
			 //print_r(implode(",",$_POST['service_ids'])); die;
		$data['service_ids'] =implode(",",$_POST['service_ids']);	
		if(isset($_FILES['protfolio']) && !empty($_FILES['protfolio'])){
			$files = $_FILES;
			$filesCount = sizeof($_FILES['protfolio']['name']);
			$config ['upload_path'] =FCPATH.'uploads/service_provider/'.$user_id.'/'; 
			$config ['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['encrypt_name'] = TRUE;

			for($i = 0; $i < $filesCount; $i++){
				$_FILES['protfolio']['name'] = $files['protfolio']['name'][$i];
				$_FILES['protfolio']['type'] = $files['protfolio']['type'][$i];
				$_FILES['protfolio']['tmp_name'] = $files['protfolio']['tmp_name'][$i];
				$_FILES['protfolio']['error'] = $files['protfolio']['error'][$i];
				$_FILES['protfolio']['size'] = $files['protfolio']['size'][$i];
				$this->upload->initialize($config);
				if($this->upload->do_upload('protfolio')){
					$fileData = $this->upload->data();
					chmod($fileData['full_path'], 0777);
					$uploadData[$i]['image'] = $fileData['file_name'];
					$uploadData[$i]['created_date'] = date("Y-m-d H:i:s");
				}
			}
			if(!empty($uploadData)){
				$protfolio_id = multifileUpload($uploadData);
				$data['portfolio_image_ids'] = implode(',',$protfolio_id);
				$dataUpload=uploadImage($data,$user_id);
				if($dataUpload == 1){
					redirect('Service/serviceProfile');
				}	
			}else{
				$dataUpload=uploadImage($data,$user_id);
				if($dataUpload == 1){
					redirect('Service/serviceProfile');
				}	
				redirect('Service/serviceProfile');
			}
		}
	}
    //Service Provider Settings Page
	public function setting(){

		$title['title']="Setting";
		$this->load->view('includes/service/metadata',$title);
		$this->load->view('includes/service/header',$title);
		$this->load->view('includes/service/sidebar');
		$this->load->view('service/setting');
		$this->load->view('includes/service/footer');	
	}
	//Service Provider Add Contact Page
	public function settingContact(){
		$title['title']="Contact";
		$this->load->view('includes/service/metadata',$title);
		$this->load->view('includes/service/header',$title);
		$this->load->view('includes/service/sidebar');
		$this->load->view('service/contact');
		$this->load->view('includes/service/footer');	
	}
	//Service Provider Add Contact submit
	public function contactSubmitInfo(){
		$code = $this->getLatLong($_POST['postalcode']);
		$lattitude = $code['lat'];
		$longitude = $code['lang'];
		$_POST['user_id'] = $_SESSION['service']->data->id;
		$_POST['token']= $_SESSION['service']->token;
		$_POST['lat'] = $lattitude;
		$_POST['lang'] = $longitude;

		$service_url = api_base_url('updateStylistInfo');
		$curl_post_data = $_POST;
		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		$data = json_decode($response);
		if($data->status == 1){
			die(json_encode(['success'=>'1','message'=>$data->message]));
		}else{     
			die(json_encode(['success'=>'0','message'=>$data->message]));
		}

	}
	//Zipcode get Lat Lang
	public function getLatLong($zip){
		$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&sensor=false&key=AIzaSyA863uhw0eIufXkjyziP9nZIo9uJAKo2ZU";
		$details=file_get_contents($url);
		$result = json_decode($details,true);
		$lat =$result['results'][0]['geometry']['location']['lat'];
		$lng =$result['results'][0]['geometry']['location']['lng'];
		if($lat){
			$data["success"]=true;
			$data["lat"]=$lat;
			$data['lang']=$lng;
			return $data;
		}else{
			$data["success"]=false;
			$data['message']="Invalid zipcode";
			return $data;
		}
	}
    //zip code get address
	public function zipCodeInfo(){
		$zip = $_POST['zip'];
		$url="https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&sensor=false&key=AIzaSyA863uhw0eIufXkjyziP9nZIo9uJAKo2ZU";
		$details=file_get_contents($url);
		$results=json_decode($details,true);
		if(!empty($results['results'][0])){
	        //$city   =$results['results'][0]['address_components'][1]['long_name'];
	       // $address=$results['results'][0]['address_components'][3]['long_name'];
			$formattedAddress=$results['results'][0]['formatted_address'];
			if(!empty($results['results'][0]['address_components'])){
				$address=$results['results'][0]['address_components'][3]['long_name'];
				die(json_encode(['success'=>true,'address'=>$formattedAddress]));
			}else{
				die(json_encode(['success'=>true,'address'=>$formattedAddress]));  
			}
		}else{
			die(json_encode(['success'=>false,'message'=>"invalid zipcode"]));
		}
	}
	//Service Provider change Password page
	public function changePassword(){
		$title['title']="Change Password";
		$this->load->view('includes/service/metadata',$title);
		$this->load->view('includes/service/header',$title);
		$this->load->view('includes/service/sidebar');
		$this->load->view('service/change_password');
		$this->load->view('includes/service/footer');	
	}
	public function changePasswordSubmit(){
		$_POST['user_id'] = $_SESSION['service']->data->id;
		$_POST['token']= $_SESSION['service']->token;
		unset($_POST['password_confirm']);
		$service_url = api_base_url('changeUserPassword');
		$curl_post_data = $_POST;
		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		$data = json_decode($response);
		if($data->status == 1){
			die(json_encode(['success'=>'1','message'=>$data->message]));
		}else{     
			die(json_encode(['success'=>'0','message'=>$data->message]));
		}
	}
    //Service Provider certificate Page
	public function certificate(){
		$_POST['user_id'] = $_SESSION['service']->data->id;
		$_POST['token']= $_SESSION['service']->token;
		$service_url = api_base_url('getCertificate');
		$response = call_postMethod($type = "POST",$service_url,$_POST);
		$data = json_decode($response);
		$title['title']="Certificate";
		$this->load->view('includes/service/metadata',$title);
		$this->load->view('includes/service/header',$title);
		$this->load->view('includes/service/sidebar');
		$this->load->view('service/certificate',$data);
		$this->load->view('includes/service/footer');	
	}
	//Service Provider certificate add
	public function addCertificate(){
		$user_id = $_SESSION['service']->data->id;
		$_POST['name'] = $_POST['name'];
		$_POST['year'] = $_POST['year'];
		$_POST['create_date'] = date("Y-m-d H:i:s");
		$_POST['status'] =1;
		if(!empty($_FILES['certificate']['name'])){
			$config['upload_path'] = FCPATH.'uploads/service_provider/25/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['encrypt_name'] = TRUE;
			$config['file_name'] = $_FILES['certificate']['name'];
			$this->load->library('upload');
			$this->upload->initialize($config);
			if($this->upload->do_upload('certificate'))
			{
				$data =$this->upload->data();
				chmod($data['full_path'], 0777);
				$certificate = $data['file_name'];
				$_POST['image_id'] =save_data($certificate,'users_images');
				if(!empty($_POST['image_id'])){
					$uploadImgID=save_certificates($_POST,'certificates');
					if($uploadImgID!= "")
					{
						$getData = get_data(array('certificate_ids'),array('id'=>$user_id),'users');
						if($getData[0]['certificate_ids'] == "")
						{
							$update_data['certificate_ids'] = $uploadImgID;
						}
						else
						{
							$update_data['certificate_ids'] = $getData[0]['certificate_ids'].",".$uploadImgID;
						}
						update_data($update_data,array('id'=>$user_id),'users');

						redirect('Service/certificate');
					}
					else
					{
							// $res['status'] = 0;
							// $res['message'] = "Some error occured";
					}
				}
			}
			else
			{
				$error = array('error' => $this->upload->display_errors());
			}
		}
	}
		//DELETE  PORTFOLLIO IMAGE
	public function portFolioDelete(){
		$_POST['user_id'] = $_SESSION['service']->data->id;
		$_POST['token']= $_SESSION['service']->token;
		$service_url = api_base_url('deleteImage');
		$response = call_postMethod($type = "POST",$service_url,$_POST);
		$data = json_decode($response);
		if($data->status == 1){
			die(json_encode(['success'=>'1','message'=>$data->message]));
		}else{     
			die(json_encode(['success'=>'0','message'=>$data->message]));
		}
	}
	    //Get Notification
	public function notification(){
		$_POST['user_id'] = $_SESSION['service']->data->id;
		$_POST['token']= $_SESSION['service']->token;
		$service_url = api_base_url('getNotification');
		$response = call_postMethod($type = "POST",$service_url,$_POST);
		$data = json_decode($response);
		$title['title']="Notification";
		$title['count']=count($data->data);
		$this->load->view('includes/service/metadata',$title);
		$this->load->view('includes/service/header',$title);
		$this->load->view('includes/service/sidebar');
		$this->load->view('service/notification',$data);
		$this->load->view('includes/service/footer');	

	}


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

	// chef list

	public function styler_list() 
	{
		// echo is_logged_in(); die;
		if(is_logged_in()){
			//$this->load->model('Admin_model');

			$obj = $this->Admin_model->getStylers();
			
			$arr['info'] = $obj;

			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('styler_list',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('styler_list',array('error' => 'No data found'));
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

	public function orders_list() 
	{

		//$this->load->model('Admin_model');

		$obj = $this->Admin_model->getOrders();
		
		$arr['info'] = $obj;

		if($arr != 0) {

			$this->load->view('header');
			$this->load->view('order_list',$arr);
			$this->load->view('footer');

		} else {

			$this->load->view('header');
			$this->load->view('order_list',array('error' => 'No data found'));
			$this->load->view('footer');
		}
	}

	// services

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
		$category_names = $this->Admin_model->getCategoryNames();

		$arr['category_names'] = $category_names;
		if(!empty($_POST)){

			$this->Admin_model->addData($_POST,'services');
			$this->session->set_flashdata('message', 'Data added successfully');
			redirect('admin/services');

		}else{
			$this->load->view('header');
			$this->load->view('add_services',$arr);
			$this->load->view('footer');
		}

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

	public function appointments()
	{
		//$this->load->model('Admin_model');
		$res = $this->Admin_model->getAppointments();

		$this->load->view('header');
		$this->load->view('appointments',array('data' => $res));
		$this->load->view('footer');
	}

	public function getAppointmentDetails($id,$ajax = '')
	{
		//$this->load->model('Admin_model');
		$res = $this->Admin_model->getAppointmentDetails($id);

		if($ajax == 1){
			exit(json_encode($res[0]));
		}
	}

	public function orderStatus()
	{

		$id = $this->input->post('id');
		$status = $this->input->post('status');

	   //	$this->load->model('Admin_model');

		$res = $this->Admin_model->updateorderStatus($id,$status);

		return $res;

	}

	// refferals

	public function referrals()
	{
		//$this->load->model('Admin_model');

		$result = $this->Admin_model->getReferrals();
		$data['data'] = $result;

		$this->load->view('header');
		$this->load->view('refferals',$data);
		$this->load->view('footer');
	}

	// question

	public function questions()
	{
		$result = $this->Admin_model->getQuestions();
		$data['data'] = $result;

		$this->load->view('header');
		$this->load->view('questions',$data);
		$this->load->view('footer');
	}

	// kitchen lists

	public function kitchen_list() 
	{

		//$this->load->model('Admin_model');

		$obj = $this->Admin_model->getkitchen('kitchen');
		
		$arr['info'] = $obj;

		if($arr != 0) {

			$this->load->view('header');
			$this->load->view('kitchen_list',$arr);
			$this->load->view('footer');

		} else {

			$this->load->view('header');
			$this->load->view('kitchen_list',array('error' => 'No data found'));
			$this->load->view('footer');
		}
	}
	public function kitchenStatus()
	{

		$id = $this->input->post('id');
		$status = $this->input->post('status');

	   	//$this->load->model('Admin_model');

		$res = $this->Admin_model->updatekitchenStatus($id,$status);

		return $res;

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

	public function deleteKitchen()
	{
		//$this->load->model('Admin_model');
		$post = $this->input->post();
		
		if($post['id'] == 1){
			return false;
		}

		if($this->Admin_model->deleteKitchen($post['id'])){
			return true;
		} else {
			return false;
		}
	}

	public function editKitchen()
	{
		//$this->load->model('Admin_model');
		$post = $this->input->post();

		if($this->Admin_model->editKitchen($post)){
			return true;
		} else {
			return false;
		}
	}	


 //   	public function logout()  
	// {  
	//     //removing session  
	//     $this->session->unset_userdata(array('id','logged'));

	//     // $this->session->sess_destroy(); 
	//     redirect("admin");

	// }
	//delete service
	public function delete_service()  
	{  

		$response = $this->Admin_model->delete_row($_POST['id'],'services');

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

	
	//delete service
	public function delete_question()  
	{  
		$response = $this->Admin_model->delete_row($_POST['id'],'questions');

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
			$arr['fetch_customer'] = $this->Admin_model->fetchrowedit('users',$whr);

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


	public function editCustomer($id) 
	{

		if(is_logged_in()){
			
			$whr['id']=$id;
			$arr['fetch_customer'] = $this->Admin_model->fetchrowedit('users',$whr);

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
			$arr['fetch_customer'] = $this->Admin_model->fetchrowedit('users',$whr);

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
			$arr['fetch_customer'] = $this->Admin_model->fetchrowedit('users',$whr);

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
			$data['firstname']=$_POST['firstname'];
			$data['lastname']=$_POST['lastname'];
			$data['email']=$_POST['email'];
			$data['password']=$_POST['password'];
			$data['address']=$_POST['address'];
			$lati = $_POST['latitude'];
			$long = $_POST['longitude'];
			$data['latlng'] = $lati.'@'.$long;
			$data['profile_pic']=$this->upload_pic('profile_pic');
			$data['portfolio_image_ids']=$this->upload_pic('portfolio_img');
			$data['telephone']=$_POST['telephone'];
			$data['mobile']=$_POST['mobile'];
			$data['landline']=$_POST['landline'];
			$data['status']=1;
			$data['user_type']=2;


			$this->Admin_model->insertrow($data,'users');

			$this->session->set_flashdata('message', 'Data updated successfully');
			redirect('admin/get_customer');

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




	public function upload_pic($name)
	{
		$this->load->helper('form');
		$config['upload_path'] = 'uploads/customer/36/';
		$config['allowed_types'] = 'gif'|'jpg';
		$config['max_size'] = 'gif'|'jpg';
		$config['allowed_types'] = '30000';
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
}