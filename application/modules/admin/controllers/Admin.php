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

	
	public function alreadyemail()
    { 
        $uName['email'] = $this->input->post('email'); 
        $isUNameCount = $this->Admin_model->alreadyexits('users',$uName); 

		if($isUNameCount > 0){
		    
		    echo 'false';

		} else{ 
			
            echo 'true'; 

        } 
	}


	function upload_service($name)
    { 
                $this->load->helper('form'); 
                $config['upload_path'] = 'uploads/service_provider/'; 
                $config['allowed_types'] = 'jpg|png|jpeg'; 
                $config['max_size'] = '30000'; 
                $config['max_width'] = '102400'; 
                $config['max_height'] = '76800'; 
                $this->load->library('upload', $config);          
                $this->upload->initialize($config); 
                if (!$this->upload->do_upload($name)) 
                { 
                    $data = array('msg' => $this->upload->display_errors()); 
                }
                else
                {       
                        $data = array('msg' => "success"); 
                        $databasea['upload_data'] = $this->upload->data(); 
                        $this->load->library('image_lib'); 
                        return $databasea['upload_data']['file_name']; 
                } 
                return ''; 
    }



    function upload_customer($name)
    { 
                $this->load->helper('form'); 
                $config['upload_path'] = 'uploads/customer/'; 
                $config['allowed_types'] = 'jpg|png|jpeg'; 
                $config['max_size'] = '30000'; 
                $config['max_width'] = '102400'; 
                $config['max_height'] = '76800'; 
                $this->load->library('upload', $config);          
                $this->upload->initialize($config); 
                if (!$this->upload->do_upload($name)) 
                { 
                    $data = array('msg' => $this->upload->display_errors()); 
                }
                else
                {       
                        $data = array('msg' => "success"); 
                        $databasea['upload_data'] = $this->upload->data(); 
                        $this->load->library('image_lib'); 
                        return $databasea['upload_data']['file_name']; 
                } 
                return ''; 
    }




	
	// login
	public function login() {
		$username = $this->input->post('firstname');
		$password = $this->input->post('password');
		$return = auth($username,$password);
		if($return == 1) {
			redirect('admin/dashboard');
		} else {
			$this->session->set_flashdata('error_msg', 'Wrong email and password');
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
	
	public function staff1() 
	{
		// echo is_logged_in(); die;
		if(is_logged_in()){
			//$this->load->model('Admin_model');

			$obj = $this->Admin_model->getStaff();
			
			$arr['info'] = $obj;

			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('staff',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('staff',array('error' => 'No data found'));
				$this->load->view('footer');
			}
		} else {
			redirect('admin');
		}
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
	
	public function add_customer() 
	{

		if(is_logged_in()){
			
			$whr['user_type']=1;
			$arr['fetch_customer'] = $this->Admin_model->fetchrowedit('users',$whr);
			$arr['getService'] = $this->Admin_model->fetchrow('services');
			$whr_status['status'] = 1;
			$arr['countries'] = $this->Admin_model->fetchrowedit('countries',$whr_status);

				$role = $this->session->userdata('role');
				if ($role  != '0'){

					redirect('admin/customer_list');

				}

			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('add_customer',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('add_customer',array('error' => 'No data found'));
				$this->load->view('footer');
			}
		} else {
			redirect('admin');
		}
	}

	public function save_customer()
	{


		$role = $this->session->userdata('role');
				if ($role  != '0'){

					redirect('admin/customer_list');

				}
		

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
			$data['service_ids'] = 0;

			$data['user_type'] = '1';


			$this->Admin_model->insertrow($data,'users');

			$this->session->set_flashdata('message', 'Data updated successfully');
			redirect('admin/customer_list');

		}

	}
	
	


	public function updateCustomer()
	{
		$role = $this->session->userdata('role');
				if ($role  != '0'){

					redirect('admin/customer_list');

				}

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
			redirect('admin/customer_list');

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

		if($obj != '' && $obj!=0 ) {
			
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

			$role = $this->session->userdata('role');
				if ($role  != '0'){

					redirect('admin/services');

				}

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
		
		$role = $this->session->userdata('role');
				if ($role  != '0'){
			redirect('admin/services');
		}

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

		$role = $this->session->userdata('role');
				if ($role  != '0'){
					redirect('admin/services');
				}
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

		$role = $this->session->userdata('role');
				if ($role  != '0'){
					redirect('admin/services');
				}
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

		$whr['user_id'] = $post['id'];
		$this->Admin_model->deleterow('users_services',$whr);

		if($this->Admin_model->deleteUser($post['id'])){
			$success = 1;
			$msg="User has been deleted successfully.";
		} else {
			$success = 0;
			$msg="Please try again.";
		}

		echo json_encode(array("success"=>$success,"message"=>$msg));
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

	$userid = $_POST['id']; 

	$response = $this->Admin_model->deleteUser($userid,'users');

		
		$img = $this->Admin_model->deleterow('users_services',$userid);



		if($response){
			die(json_encode(['success'=>true,'message'=>'Record deleted successfully.']));
			
		}else{

			die(json_encode(['success'=>false,'message'=>'Unable to delete this. Please try after some time.']));	
		}


	} 
	
	public function delete_userApp()  
	{  

		$response = $this->Admin_model->deleteApp($_POST['id'],'appointments');

		if($response){
			die(json_encode(['success'=>true,'message'=>'Record deleted successfully.']));
			
		}else{

			die(json_encode(['success'=>false,'message'=>'Unable to delete this. Please try after some time.']));	
		}


	} 


	public function delete_reference()  
	{  

		$response = $this->Admin_model->deleteReferral($_POST['id'],'referral');

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
	


	public function viewCustomer($id) 
	{

		if(is_logged_in()){
			$whr['id']=$id;
			$arr['fetch_customer'] = $this->Admin_model->fetchrow_user('users',$whr);

			$whr_status['status'] = 1;
			$arr['countries'] = $this->Admin_model->fetchrowedit('countries',$whr_status);
			$arr['states'] = $this->Admin_model->fetchrow('states');
			$arr['cities'] = $this->Admin_model->fetchrow('cities');

			// echo '<pre>';
			// print_r($arr['fetch_customer']);
			// exit();
			// $arr['getService'] = $this->Admin_model->fetchrow('services');

			// $arr['getServices'] = $this->Admin_model->fetch_service($id);
			// $arr['getServicesCharge'] = $this->Admin_model->fetch_service_charge($id);




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

		$role = $this->session->userdata('role');
				if ($role  != '0'){
					redirect('admin/get_serviceProvider');
				}

		if(is_logged_in()){
			
			$whr['user_type']=1;
			$arr['fetch_customer'] = $this->Admin_model->fetchrowedit('users',$whr);
			$arr['getService'] = $this->Admin_model->fetchrow('services');
			$whr_status['status'] = 1;
			$arr['countries'] = $this->Admin_model->fetchrowedit('countries',$whr_status);
			

			$arr['service_category'] = $this->Admin_model->fetch_all_categotry_all();
			
		if($arr != 0) 
			{
				$this->load->view('header');
				$this->load->view('add_serviceProvider',$arr);
				$this->load->view('footer');
			}
			else 
			{
				$this->load->view('header');
				$this->load->view('add_serviceProvider',array('error' => 'No data found'));
				$this->load->view('footer');
			}
		} 
			else 
			{
				redirect('admin');
			}
	}

	public function add_servicePro()
	{
		
		$role = $this->session->userdata('role');
				if ($role  != '0'){
					redirect('admin/get_serviceProvider');
				}
	if(isset($_POST['add_provider'])){

		$dataimage['image'] = $this->upload_service('certification');
		$this->Admin_model->insertrow($dataimage,'users_images');
			$data['certificate_ids'] = $this->db->insert_id();
			$data['firstname'] = $_POST['firstname'];
			$data['lastname'] = $_POST['lastname'];
			$data['email'] = $_POST['email'];
			$data['password'] = md5($_POST['password']);
			$data['address'] = $_POST['address'];
			$data['address2'] = $_POST['address2'];
			$question1 = $_POST['question1'];
			$question2 = $_POST['question2'];
			$question3 = $_POST['question3'];
			$answer1 = $_POST['answer1'];
			$answer2 = $_POST['answer2'];
			$answer3 = $_POST['answer3'];
			
			$data['description'] = $_POST['description'];
			$data['country_id'] = $_POST['country'];
			$data['state_id'] = $_POST['state'];
			$data['city_id'] = $_POST['city'];
			$data['username'] = $_POST['username'];
			$data['zip_code'] = $_POST['zip_code'];
			$data['security_que_ans'] =  '[{
							    "answer" : "'.$answer1.'",
							    "question" : "'.$question1.'"
							  },
							  {
							    "answer" : "'.$answer2.'",
							    "question" : "'.$question2.'"
							  },
							  {
							    "answer" : "'.$answer3.'",
							    "question" : "'.$question3.'"
							  }]';
			$data['start_time'] = $_POST['from'].':00';
			$data['end_time']   = $_POST['to'].':00';
			$data['mobile'] = $_POST['phone'];
			$data['status'] = $_POST['status'];
			$data['user_type'] = 2;
			$data['education'] = implode(',', $_POST['education']);
			$serviceID = $_POST['service_ids'];
			$dataservice['services']    = $_POST['service_amount'];
			$dataservice['services_id'] = $_POST['service_ids'];
			$this->Admin_model->insertrow($data,'users');
			$insert['user_id'] = $this->db->insert_id();
			

			$count =  count($_POST['service_ids']);
			$serviceIds=$_POST['service_ids'];
			$serviceAmount=$_POST['service_amount'];
				// echo "<pre>";
				// 			print_r($serviceAmount); die;
			$service_data = array();
			
			foreach($serviceIds as $k=>$service){
				$insert['service_id'] = $service;
				$insert['charge'] = $serviceAmount[$service];
				$this->db->insert('users_services',$insert);
			}
 		$this->session->set_flashdata('success' , ' Add service provider  Sucessfully');			
 			redirect('admin/get_serviceProvider');

		}

	}

	public function edit_servicePro()
	{
		
		$role = $this->session->userdata('role');
				if ($role  != '0'){
					redirect('admin/get_serviceProvider');
				}
	if(isset($_POST['edit_provider'])){



		if(!empty($_FILES['certification']['name']) && isset($_FILES['certification']['name'])){

			$whrimageids['id'] = $_POST['image_ids'];
			$dataimageupdate['image'] = $this->upload_service('certification');
			$this->Admin_model->updaterow($dataimageupdate,'users_images',$whrimageids);
			
			}  else {
			
			$data['certificate_ids'] = $_POST['image_ids'];
			
			}
			// $data['certificate_ids'] = $this->db->insert_id();
			$data['firstname'] = $_POST['firstname'];
			$data['lastname'] = $_POST['lastname'];
			$data['email'] = $_POST['email'];
			$data['password'] = md5($_POST['password']);
			$data['address'] = $_POST['address'];
			$data['address2'] = $_POST['address2'];
			$question1 = $_POST['question1'];
			$question2 = $_POST['question2'];
			$question3 = $_POST['question3'];
			$answer1 = $_POST['answer1'];
			$answer2 = $_POST['answer2'];
			$answer3 = $_POST['answer3'];
			
			$data['description'] = $_POST['description'];
			$data['country_id'] = $_POST['country'];
			$data['state_id'] = $_POST['state'];
			$data['city_id'] = $_POST['city'];
			$data['username'] = $_POST['username'];
			$data['zip_code'] = $_POST['zip_code'];
			$data['security_que_ans'] =  '[{
							    "answer" : "'.$answer1.'",
							    "question" : "'.$question1.'"
							  },
							  {
							    "answer" : "'.$answer2.'",
							    "question" : "'.$question2.'"
							  },
							  {
							    "answer" : "'.$answer3.'",
							    "question" : "'.$question3.'"
							  }]';
			$data['start_time'] = $_POST['from'].':00';
			$data['end_time']   = $_POST['to'].':00';

			$data['mobile'] = $_POST['phone'];
			$data['status'] = $_POST['status'];
			// $data['user_type'] = 2;
			$data['education'] = implode(',', $_POST['education']);
			$serviceID = $_POST['service_ids'];
			$dataservice['services']    = $_POST['service_amount'];
			$dataservice['services_id'] = $_POST['service_ids'];


				$whereServices['user_id'] = $_POST['user_id'];
				$this->Admin_model->deleterow('users_services',$whereServices);
			$whruser['id']= $_POST['user_id'];
			$this->Admin_model->updaterow($data,'users',$whruser);

			// echo '<pre>';
			// print_r($data);
			// echo $this->db->last_query();
			// exit();
			$insert['user_id'] = $_POST['user_id'];
			$count =  count($_POST['service_ids']);
			$serviceIds=$_POST['service_ids'];
			$serviceAmount=$_POST['service_amount'];
				// echo "<pre>";
				// 			print_r($serviceAmount); die;
			$service_data = array();
			
			foreach($serviceIds as $k=>$service){
				$insert['service_id'] = $service;
				$insert['charge'] = $serviceAmount[$service];
				$this->db->insert('users_services',$insert);
			}

	$this->session->set_flashdata('success','Update service provider Sucessfully');			

			redirect('admin/get_serviceProvider');

		}

	}


	public function add_CustomerPro()
	{
		$role = $this->session->userdata('role');
				if ($role  != '0'){
					redirect('admin/get_serviceProvider');
				}

		if(isset($_POST['add_provider'])){

			$dataimage['image'] = $this->upload_customer('certification');
			
			$this->Admin_model->insertrow($dataimage,'users_images');


			$data['certificate_ids'] = $this->db->insert_id();
			$data['firstname'] = $_POST['firstname'];
			$data['lastname'] = $_POST['lastname'];
			$data['email'] = $_POST['email'];

			$data['password'] = md5($_POST['password']);
			$data['address'] = $_POST['address'];
			$data['address2'] = $_POST['address2'];

			$question1 = $_POST['question1'];
			$question2 = $_POST['question2'];
			$question3 = $_POST['question3'];
			$answer1 = $_POST['answer1'];
			$answer2 = $_POST['answer2'];
			$answer3 = $_POST['answer3'];

			
			$data['description'] = $_POST['description'];


			$data['country_id'] = $_POST['country'];
			$data['state_id'] = $_POST['state'];
			$data['city_id'] = $_POST['city'];
			$data['username'] = $_POST['username'];
			$data['zip_code'] = $_POST['zip_code'];


			
			$data['security_que_ans'] =  '[{
							    "answer" : "'.$answer1.'",
							    "question" : "'.$question1.'"
							  },
							  {
							    "answer" : "'.$answer2.'",
							    "question" : "'.$question2.'"
							  },
							  {
							    "answer" : "'.$answer3.'",
							    "question" : "'.$question3.'"
							  }]';
			/*$data['start_time'] = $_POST['from'].':00';
			$data['end_time']   = $_POST['to'].':00';*/
			$data['mobile'] = $_POST['phone'];
			$data['status'] = $_POST['status'];
			$data['user_type'] = 1;
			$data['education'] = implode(',', $_POST['education']);

			// echo '<pre>';
			// print_r($data);
			// exit();

			


			$serviceID = $_POST['service_ids'];
			$dataservice['services']    = $_POST['service_amount'];
			$dataservice['services_id'] = $_POST['service_ids'];
			$this->Admin_model->insertrow($data,'users');
			$insert['user_id'] = $this->db->insert_id();
			
			// $count =  count($_POST['service_ids']);
			// $service_data = array();
			// for ($i=0; $i < $count ; $i++) {
				
			// 	$insert['service_id'] = $_POST['service_ids'][$i];
			// 	$insert['charge'] = $_POST['service_amount'][$i];
			// 	$this->db->insert('users_services',$insert);
			// }

			 $this->session->set_flashdata('success' , 'Payment Added Sucessfully');
			redirect('admin/customer_list');

		}

	}


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



	



	public function viewServiceProvider($id) 
	{

		if(is_logged_in()){
			
			$whr['id']=$id;
			$whr['user_type']=2;
			$arr['fetch_customer'] = $this->Admin_model->fetchrow_user('users',$whr);
			$arr['getService'] = $this->Admin_model->fetch_service($id);

			// echo '<pre>';
			// print_r($arr['getService']);
			// exit();
			

			$whr_status['status'] = 1;
			$arr['countries'] = $this->Admin_model->fetchrowedit('countries',$whr_status);
			$arr['states'] = $this->Admin_model->fetchrow('states');
			$arr['cities'] = $this->Admin_model->fetchrow('cities');



			if($arr != 0) {
				$this->load->view('header');
				$this->load->view('viewServiceProvider',$arr);
				$this->load->view('footer');
			} else {
				$this->load->view('header');
				$this->load->view('viewServiceProvider',array('error' => 'No data found'));
				$this->load->view('footer');
			}
		} else {
			redirect('admin');
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

		$role = $this->session->userdata('role');
				if ($role  != '0'){
					redirect('admin/getCategory');
				}
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
		$role = $this->session->userdata('role');
				if ($role  != '0'){
					redirect('admin/getCategory');
				}

		if(isset($_POST['add_cat'])){

			$data['category_name']=$_POST['category_name'];

			$this->Admin_model->insertrow($data,'category');

			$this->session->set_flashdata('message', 'Data Insert successfully');
			redirect('admin/getCategory');

		}

	}


	public function edit_category($id) 
	{


		$role = $this->session->userdata('role');
				if ($role  != '0'){
					redirect('admin/getCategory');
				}

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
		$role = $this->session->userdata('role');
				if ($role  != '0'){
					redirect('admin/getCategory');
				}

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

	

	public function getBeautyCategory() 
	{

		if(is_logged_in()){
			

			$arr['beautycategory'] = $this->Admin_model->fetchBeautyCat('beauty_category');

			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('getBeautyCategory',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('getBeautyCategory',array('error' => 'No data found'));
				$this->load->view('footer');
			}
		} else {
			redirect('admin');
		}
	}

	public function add_beautycategory()
	{
		
		if(is_logged_in()){
			$this->load->view('header');
			$this->load->view('add_beautycategory',array('error' => 'No data found'));
			$this->load->view('footer');
			
		} else {
			redirect('admin');
		}

	}

	
	public function insertBeautyCat($id) 
	{

		$data['name']=$_POST['name'];

		$this->Admin_model->insertrow($data,'beauty_category');

		$this->session->set_flashdata('message', 'Data updated successfully');
		redirect('admin/getBeautyCategory');
	}


	public function delete_beautycategory()  
	{  

		$response = $this->Admin_model->deleteBeautyCate($_POST['id'],'beauty_category');

		if($response){
			die(json_encode(['success'=>true,'message'=>'Record deleted successfully.']));
			
		}else{

			die(json_encode(['success'=>false,'message'=>'Unable to delete this. Please try after some time.']));	
		}


	} 

	public function edit_beautyCategory($id) 
	{

		if(is_logged_in()){
			
			$whr['id']=$id;
			$arr['fetch_beautycategory'] = $this->Admin_model->fetchrowedit('beauty_category',$whr);

			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('edit_beautyCategory',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('edit_beautyCategory',array('error' => 'No data found'));
				$this->load->view('footer');
			}
		} else {
			redirect('admin');
		}
	}


	public function active_beautyCat($id)
	{
		$data['status'] = 0;
		$whr['id'] = $id;
		$this->Admin_model->updaterow($data,'beauty_category',$whr);
		redirect('admin/getBeautyCategory');
	}

	public function deactive_beautyCat($id)
	{
		$data['status'] = 1;
		$whr['id'] = $id;
		$this->Admin_model->updaterow($data,'beauty_category',$whr);
		redirect('admin/getBeautyCategory');
	}

	public function updateBeautycategory()
	{
		if(isset($_POST['update'])){
			$data['name']=$_POST['name'];

			$whr['id']=$_POST['id'];
			$this->Admin_model->updaterow($data,'beauty_category',$whr);

			$this->session->set_flashdata('message', 'Data updated successfully');
			redirect('admin/getBeautyCategory');

		}

	}

	

	public function getBeautySubCategory() 
	{

		if(is_logged_in()){
			

			$arr['bsubcat'] = $this->Admin_model->fetchBeautySubCat('beauty_sub_category');

			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('getBeautySubCategory',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('getBeautySubCategory',array('error' => 'No data found'));
				$this->load->view('footer');
			}
		} else {
			redirect('admin');
		}
	}


	public function active_SubbeautyCat($id)
	{
		$data['status'] = 0;
		$whr['id'] = $id;
		$this->Admin_model->updaterow($data,'beauty_sub_category',$whr);
		redirect('admin/getBeautySubCategory');
	}

	public function deactive_SubbeautyCat($id)
	{
		$data['status'] = 1;
		$whr['id'] = $id;
		$this->Admin_model->updaterow($data,'beauty_sub_category',$whr);
		redirect('admin/getBeautySubCategory');
	}

	public function delete_Suzbeautycategory()  
	{  

		$response = $this->Admin_model->deleteSubBeautyCate($_POST['id'],'beauty_sub_category');

		if($response){
			die(json_encode(['success'=>true,'message'=>'Record deleted successfully.']));
			
		}else{

			die(json_encode(['success'=>false,'message'=>'Unable to delete this. Please try after some time.']));	
		}


	} 


	
	public function add_BeautySubCategory() 
	{

		if(is_logged_in()){
			
			$arr['bcat'] = $this->Admin_model->fetchrow('beauty_category');

			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('add_BeautySubCategory',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('add_BeautySubCategory',array('error' => 'No data found'));
				$this->load->view('footer');
			}
			
		} else {
			redirect('admin');
		}
	}

	public function insert_bsubcat()
	{
		


		$data['beauty_category_id']=$_POST['beauty_category_id'];
		$data['name']=$_POST['name'];


		$this->Admin_model->insertrow($data,'beauty_sub_category');

		$this->session->set_flashdata('message', 'Data updated successfully');
		redirect('admin/getBeautySubCategory');


	}
	

	public function edit_beautySubCategory($id) 
	{

		if(is_logged_in()){
			
			$arr['bcat'] = $this->Admin_model->fetchrow('beauty_category');
			$whr['id']=$id;
			$arr['fetch_subcat'] = $this->Admin_model->fetchrowedit('beauty_sub_category',$whr);

			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('edit_beautySubCategory',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('edit_beautySubCategory	',array('error' => 'No data found'));
				$this->load->view('footer');
			}
			
		} else {
			redirect('admin');
		}	
	}

	
	public function update_bsubcat()
	{
		
		$data['beauty_category_id']=$_POST['beauty_category_id'];
		$data['name']=$_POST['name'];

		$whr['id']=$_POST['id'];
		$this->Admin_model->updaterow($data,'beauty_sub_category',$whr);

		$this->session->set_flashdata('message', 'Data updated successfully');
		redirect('admin/getBeautySubCategory');

		
	}


	public function getAppointments() 
	{
		if(is_logged_in()){
			$service_chrge = array();
			$result = $this->Admin_model->getAppointmentsList('appointments');
			foreach ($result as $value) {
				$sql = $this->db->query('SELECT SUM(service_charge) as total_charge FROM `services` WHERE id in('.$value->service_id.')');
				$service_chrge = $sql->result();
				foreach ($service_chrge as $key => $object) {
					$service_chrge[] = $object->total_charge;
				}
			}
			$data['final_data'] = array_merge($result,$service_chrge);
			if($data != 0) {
				$this->load->view('header');
				$this->load->view('getAppointments',$data);
				$this->load->view('footer');
			} else {

				$this->load->view('header');
				$this->load->view('getAppointments',array('error' => 'No data found'));
				$this->load->view('footer');
			}
			
		} else {
			redirect('admin');
		}
	}

	public function getAppointmentList($id){
		if(is_logged_in()){
			$whr['id'] = $id;
			$result = $this->Admin_model->fetchrowedit('appointments',$whr);
			$data['final_data'] = $result;
			foreach ($result as $appoint) {

				$stylerId = $appoint->service_provider_id;
				$customerId = $appoint->customer_id;
				$serviceId = $appoint->service_id;
				$catName = $appoint->category_id;
				$result['appointment_date'] = $appoint->appointment_date;
				$result['location'] = $appoint->location;
				$result['travel_fee'] = $appoint->travel_fee;
				$result['parking_fee'] = $appoint->parking_fee;
				$result['status'] = $appoint->status;
				
				if($stylerId!=0 && $stylerId!="")
				{	
					$whrs['id'] = $stylerId;
					$stylerData = $this->Admin_model->fetchrowedit('users',$whrs);
					
					foreach ($stylerData as $styler) {
						$result['stylist_name'] = $styler->firstname;
						$result['lname'] = $styler->lastname;
						$result['email'] = $styler->email;
						$result['mobile'] = $styler->mobile;

					}
					
				}
				else
				{
					$result['stylist_name'] = "";
					$result['email'] = "";
					$result['mobile'] = "";
				}

				if($customerId!=0 && $customerId!="")
				{	

					$whrc['id'] = $customerId;
					$customerData = $this->Admin_model->fetchrowedit('users',$whrc);


					foreach ($customerData as $customer) {
						$result['customerfname'] = $customer->firstname;
						$result['customerlname'] = $customer->lastname;
						$result['customeremail'] = $customer->email;
						$result['customermobile'] = $customer->mobile;

					}
					
				}
				else
				{
					$result['customerfname'] = "";
					$result['customerlname'] = "";
					$result['customeremail'] = "";
					$result['customermobile'] = "";
				}

				if($serviceId!=0 && $serviceId!="")
				{	

					$arr = explode(",", $serviceId);
					$query2 = $this->db->select('*')->where_in('id',$arr)->get('services');
					$data['serviceData'] = $query2->result_array();

				}else{
					$result['serviceName'] = "";
					$result['service_charge'] = "";
				}

				if($serviceId!=0 && $serviceId!="")
				{
					$whrcat['id'] = $catName;
					$catData = $this->Admin_model->fetchrowedit('category',$whrcat);

					foreach ($catData as $cat) {
						$result['cat_name'] = $cat->category_name;

					}

				}else{
					$result['cat_name'] = "";
				}
			}

			$data['final_data'] = $result;
			if($data != 0) {
				$this->load->view('header');
				$this->load->view('getAppointmentList',$data);
				$this->load->view('footer');
			} else {

				$this->load->view('header');
				$this->load->view('getAppointmentList',array('error' => 'No data found'));
				$this->load->view('footer');
			}
			
		} else {
			redirect('admin');
		}
	}

	public function reference() 
	{

		if(is_logged_in()){


			$result = $this->Admin_model->getReference('referral');
			$data['final_data'] = $result;

			if($data != 0) {

				$this->load->view('header');
				$this->load->view('reference',$data);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('reference',array('error' => 'No data found'));
				$this->load->view('footer');
			}
			
		} else {
			redirect('admin');
		}
	}

	/**
	 * Get Referral
	 */

	public function getReferenceView($id){
		
		if(is_logged_in()){
			
			$get_ref_order_sql = "SELECT a.*,u.firstname,u.lastname,u2.firstname as styler_firstname,u2.lastname as styler_lastname FROM appointments a INNER JOIN users u ON a.customer_id IN (SELECT id FROM users WHERE referral_id = $id ORDER BY id ASC) AND a.actual_amount > '0' AND a.settlement_status = '0' AND (a.status='6' OR a.status='9') AND a.customer_id=u.id INNER JOIN users u2 on u2.id=a.service_provider_id GROUP BY a.customer_id ORDER BY a.create_date ASC";


			$referral_orders_data = $this->db->query($get_ref_order_sql)->result();
			$data['referral_orders'] = $referral_orders_data;

			$que = "SELECT id FROM `users` WHERE `referral_id` = ".$id." ORDER BY `id` ASC";
			
			$refferalsID = $this->db->query($que)->result_array();
			$resulArray =array();
			foreach ($refferalsID as $referral) {
				$final = "SELECT a.*,u.firstname as stylist_firstname,u.lastname as stylist_lastname,c.firstname as customer_firstname,c.lastname as customer_lastname,c.referral_id, p.amount,p.id as paymentId FROM `appointments` a INNER JOIN users u ON u.id = a.service_provider_id INNER JOIN users c ON c.id = a.customer_id INNER JOIN payment p ON p.appoinment_id = a.id WHERE a.`settlement_status` = 0 AND a.`customer_id` = '".$referral['id']."' ORDER BY `a`.`appointment_date` ASC LIMIT 1";
				$result_array = $this->db->query($final)->result_array();

				if(!empty($result_array)){
					$resulArray[] = $this->db->query($final)->result_array();
				}
			}

			$whr['id']=$id;
			$nameGet = $this->Admin_model->fetchrowedit('referral',$whr);
			$data['referralName'] = $nameGet[0]->name;
			$data['final_data'] = $resulArray;

			$query = "SELECT settlOrder.orderID,settlOrder.amount as settlementAmount,settlOrder.settlement_date,ur.firstname as styler_Fname,ur.lastname as styler_Lname,usr.firstname as customer_Fname,usr.lastname as customer_Lname FROM `settlement_order` settlOrder INNER JOIN appointments app ON app.id = settlOrder.orderID INNER JOIN users ur ON ur.id = app.service_provider_id INNER JOIN users usr ON usr.id = app.customer_id ORDER BY `settlOrder`.`settlement_date`";
			$settlementOrders = $this->db->query($query)->result();
			$data['final_data1'] = $settlementOrders;
			if($data != 0) {
				$this->load->view('header');
				$this->load->view('getReferenceView',$data);
				$this->load->view('footer');
			} else {
				$this->load->view('header');
				$this->load->view('getReferenceView',array('error' => 'No data found'));
				$this->load->view('footer');
			}			
		} else {
			redirect('admin');
		}
	}

	public function add_settlement(){


		print_r($_POST);

		// $data = array();

		// $ordersID = $_POST['orderID'];
		// $data['orderid'] = explode(",",$ordersID);
		// $referralAmount = $_POST['amount'];
		// $data['actualamount'] = explode(",",$referralAmount);

		// $cust_id = $_POST['customer_id'];
		// $data['customerid'] = explode(",",$cust_id);

		// print_r($data);

		// foreach ($data as $key => $value) {
		// 	// $orderid = $value['']
		// 	// $actualamount = 
		// 	// $customerid = 
		// }

		
		// $ordersID = $_POST['orderID'];
		// $orderIDS = explode(",",$ordersID);
		// $referralAmount = $_POST['amount'];
		// $referralsAmount = explode(",",$referralAmount);

		// $cust_id = $_POST['customer_id'];
		// $customer_id = explode(",",$cust_id);
		
		// $arr = array_combine($orderIDS, $referralsAmount);

		// print_r($arr);

		// foreach ($data as $key => $value) {
		// 	// $orderid = $value['']
		// 	// $actualamount = 
		// 	// $customerid = 
		// }
		if (isset($_POST['settle']) && $_POST['settle']) {
			
			$settle = $_POST['settle'];

			if (!empty($settle) && is_array($settle)) {

				foreach ($settle as $orderid => $settle_data) {

					$referral_id 	= $settle_data['referral_id'];
					$customer_id 	= $settle_data['customer_id'];
					$order_id 		= $settle_data['order_id'];
					$amount 		= $settle_data['amount'];

					$settle_order  = array(
						'orderID' 		=> $order_id,
						'referralID' 	=> $referral_id,
						'amount' 		=> $amount,
						'customerID' 	=> $customer_id,
					);

					// Update Appoinment Status
					$status['settlement_status'] = 1;
					$whr['id'] 			= $order_id;
					$whr['customer_id'] = $customer_id;

					$this->Admin_model->insertrow($settle_order,'settlement_order');
					$this->Admin_model->updaterow($status,'appointments',$whr);
				}
			}
		}

		redirect('admin/reference');

		// die();

		// $ordersID = $_POST['orderID'];
		// $cars = explode(",",$ordersID);

		// $count = count($cars);

		// foreach ($cars as $cars_info ) {
		// 	$status['settlement_status'] = 1;
		// 	$whr['id'] = $cars_info;
		// 	//$this->Admin_model->updaterow($status,'appointments',$whr);
		// }

		//redirect('admin/reference');

	}


	public function editReference($id)
	{


		if(is_logged_in()){
			
			$whr['id'] = $id;
			$arr['fetchReferral'] = $this->Admin_model->fetchrowedit('referral',$whr);

			if($arr != 0) {

				$this->load->view('header');
				$this->load->view('editReference',$arr);
				$this->load->view('footer');

			} else {

				$this->load->view('header');
				$this->load->view('editReference',array('error' => 'No data found'));
				$this->load->view('footer');
			}
			
		} else {
			redirect('admin');
		}	

	}

	public function editReferral()
	{
		if(isset($_POST['editReferral'])){

			$data['name']=$_POST['name'];
			$data['description']=$_POST['description'];

			$whr['id'] = $_POST['id'];
			$this->Admin_model->updaterow($data,'referral',$whr);
		}

		redirect('admin/reference');

	}

	public function add_reference()
	{
		if(is_logged_in()){

			$this->load->view('header');
			$this->load->view('add_reference',array('error' => 'No data found'));
			$this->load->view('footer');

		} else {
			redirect('admin');
		}
	}

	public function add_customerReference()
	{
		$data['name']=$_POST['name'];
		$data['description']=$_POST['description'];
		$data['status']=1;


		$this->Admin_model->insertrow($data,'referral');

		$this->session->set_flashdata('message', 'Data Insert successfully');
		redirect('admin/reference');

	}


	public function active_reference($id)
	{
		$data['status'] = 0;
		$whr['id'] = $id;
		$this->Admin_model->updaterow($data,'referral',$whr);
		redirect('admin/reference');
	}

	public function inactive_reference($id)
	{
		$data['status'] = 1;
		$whr['id'] = $id;
		$this->Admin_model->updaterow($data,'referral',$whr);
		redirect('admin/reference');
	}

	
	public function referenceOrder() 
	{

		if(is_logged_in()){

			$result = $this->Admin_model->getreferenceOrder('referral_order');
			$data['final_data'] = $result;

			if($data != 0) {
				$this->load->view('header');
				$this->load->view('referenceOrder',$data);
				$this->load->view('footer');
			} else {
				$this->load->view('header');
				$this->load->view('referenceOrder',array('error' => 'No data found'));
				$this->load->view('footer');
			}
			
		} else {
			redirect('admin');
		}
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


	public function chat() {
		if(!is_logged_in()) redirect('admin');
		$chat_sql 	= "SELECT * FROM chat INNER JOIN users WHERE chat.message_from = users.id";
		$chat_data 	= $this->db->query($chat_sql)->result();
		$data['chat_data'] = $chat_data;
		$this->load->view('header');
		$this->load->view('chat', $data);
		$this->load->view('footer');
	}


	public function getstate($id){

	$whr['country_id'] = $id;
	$state = $this->Admin_model->fetchrowedit('states',$whr);
	// echo $this->db->last_query();
	$st = '';

	if (!empty($state)) {

		$st = '<option value = "">Select State</option>';
		foreach ($state as $statedata) {

		$st.= '<option value = "'.$statedata->id.'">'.$statedata->name.'</option>';

		}
	}
	
	print_r($st);

	}


	public function getcity($id){

	$whr['state_id'] = $id;
	$state = $this->Admin_model->fetchrowedit('cities',$whr);
	// echo $this->db->last_query();
	$st = '';
	if (!empty($state)) {
	$st = '<option value = "">Select State</option>';

		foreach ($state as $statedata) {

		$st.= '<option value = "'.$statedata->id.'">'.$statedata->name.'</option>';

		}
	}
	
	print_r($st);

	}



	function deactivate($id){

		$dataStatus['status'] = 0;

		$whr['id']=$id;
		$this->Admin_model->updaterow($dataStatus,'users',$whr);
	}

	function activate($id){

		$dataStatus['status'] = 1;

		$whr['id']=$id;
		$this->Admin_model->updaterow($dataStatus,'users',$whr);
	}



	public function editCustomer($id) 
	{

		$role = $this->session->userdata('role');
				if ($role  != '0'){
					redirect('admin/customer_list');
				}

		if(is_logged_in()){
			$whr['id']=$id;
			$arr['fetch_customer'] = $this->Admin_model->fetchrow_user('users',$whr);

			$whr_status['status'] = 1;
			$arr['countries'] = $this->Admin_model->fetchrowedit('countries',$whr_status);
			$arr['states'] = $this->Admin_model->fetchrow('states');
			$arr['cities'] = $this->Admin_model->fetchrow('cities');

			// echo '<pre>';
			// print_r($arr['fetch_customer']);
			// exit();
			// $arr['getService'] = $this->Admin_model->fetchrow('services');

			// $arr['getServices'] = $this->Admin_model->fetch_service($id);
			// $arr['getServicesCharge'] = $this->Admin_model->fetch_service_charge($id);




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
public function edit_CustomerPro()
	{

		$role = $this->session->userdata('role');
				if ($role  != '0'){
					redirect('admin/getCategory');
				}
		

	if(isset($_POST['edit_provider'])){
		if(!empty($_FILES['certification']['name']) && isset($_FILES['certification']['name'])){

			$whrimageids['id'] = $_POST['image_ids'];
			$dataimageupdate['image'] = $this->upload_customer('certification');
			$this->Admin_model->updaterow($dataimageupdate,'users_images',$whrimageids);
			
			}  else {
			
			$data['certificate_ids'] = $_POST['image_ids'];
			
			}
			// $data['certificate_ids'] = $this->db->insert_id();
			$data['firstname'] = $_POST['firstname'];
			$data['lastname'] = $_POST['lastname'];
			$data['email'] = $_POST['email'];
			$data['password'] = md5($_POST['password']);
			$data['address'] = $_POST['address'];
			$data['address2'] = $_POST['address2'];
			$question1 = $_POST['question1'];
			$question2 = $_POST['question2'];
			$question3 = $_POST['question3'];
			$answer1 = $_POST['answer1'];
			$answer2 = $_POST['answer2'];
			$answer3 = $_POST['answer3'];
			
			$data['description'] = $_POST['description'];
			$data['country_id'] = $_POST['country'];
			$data['state_id'] = $_POST['state'];
			$data['city_id'] = $_POST['city'];
			$data['username'] = $_POST['username'];
			$data['zip_code'] = $_POST['zip_code'];
			$data['security_que_ans'] =  '[{
							    "answer" : "'.$answer1.'",
							    "question" : "'.$question1.'"
							  },
							  {
							    "answer" : "'.$answer2.'",
							    "question" : "'.$question2.'"
							  },
							  {
							    "answer" : "'.$answer3.'",
							    "question" : "'.$question3.'"
							  }]';
			// $data['start_time'] = $_POST['from'].':00';
			// $data['end_time']   = $_POST['to'].':00';
			$data['mobile'] = $_POST['phone'];
			$data['status'] = $_POST['status'];
			// $data['user_type'] = 2;
			$data['education'] = implode(',', $_POST['education']);

			$serviceID = $_POST['service_ids'];
			$dataservice['services']    = $_POST['service_amount'];
			$dataservice['services_id'] = $_POST['service_ids'];


			$whereServices['user_id'] = $_POST['user_id'];
				$this->Admin_model->deleterow('users_services',$whereServices);
			$whruser['id']= $_POST['user_id'];
			// echo '<pre>';
			// print_r($_POST);

			$this->Admin_model->updaterow($data,'users',$whruser);


			echo $this->db->last_query();
			// exit();
			

			  $this->session->set_flashdata('success' , 'Customer update Sucessfully');
			redirect('admin/customer_list');

		}

	}


	public function viewCustomerData($id) 
	{
		if(is_logged_in()){
			$whr['id']=$id;
			$whr['user_type']=1;
			$arr['fetch_customer'] = $this->Admin_model->fetchrow_user('users',$whr);
			$whr_status['status'] = 1;
			$arr['countries'] = $this->Admin_model->fetchrowedit('countries',$whr_status);
			$arr['states'] = $this->Admin_model->fetchrow('states');
			$arr['cities'] = $this->Admin_model->fetchrow('cities');
			if($arr != 0) {
				$this->load->view('header');
				$this->load->view('viewCustomer',$arr);
				$this->load->view('footer');
			} else {
				$this->load->view('header');
				$this->load->view('viewCustomer',array('error' => 'No data found'));
				$this->load->view('footer');
			}
		} else {
			redirect('admin');
		}
	}


	public function editServiceProvider($id) 
	{

		$role = $this->session->userdata('role');
				if ($role  != '0'){
					redirect('admin/get_serviceProvider');
				}

		if(is_logged_in()){
			
			$whr['id']=$id;
			$arr['fetch_customer'] = $this->Admin_model->fetchrow_user('users',$whr);

			$whr_status['status'] = 1;
			$arr['countries'] = $this->Admin_model->fetchrowedit('countries',$whr_status);
			$arr['states'] = $this->Admin_model->fetchrow('states');
			$arr['cities'] = $this->Admin_model->fetchrow('cities');

			
			$arr['getServeducationice'] = $this->Admin_model->fetchrow('services');
			$arr['service_category'] = $this->Admin_model->fetch_all_categotry_all();

			$arr['getService'] = $this->Admin_model->fetch_service($id);
			// echo '<pre>';
			// echo $this->db->last_query();
			// print_r($arr['getService']);
			// exit();
			$arr['getServicesCharge'] = $this->Admin_model->fetch_service_charge($id);
		
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



}