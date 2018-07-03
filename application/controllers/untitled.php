<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() { 
		$service_url = api_base_url('getReferrals');
		$curl_post_data = array();
		$response = call_postMethodWithEmptyArray($type = "POST",$service_url,$curl_post_data);
		$data1 = json_decode($response);

		$data['title'] = 'Glam Army';
		$this->load->view('includes/user/metadata',$data);
		$this->load->view('includes/user/header');
		$this->load->view('home/home_page',$data1);
		$this->load->view('includes/user/footer');
	}
	//customer  Login 
	public function login() 
	{
		$_POST['email'] = $this->input->post('email'); 
		$_POST['password'] = $this->input->post('password'); 
		$_POST['user_type'] = 1; 

		$service_url = api_base_url('login');
		$curl_post_data = $_POST;
		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);

		$data = json_decode($response);
		if($data->status == 1){
			set_login('customer',$data);
			die(json_encode(['success'=>'1','message'=>$data->message,'user_type'=>$data->data->user_type]));
		}else{     
			die(json_encode(['success'=>'0','message'=>$data->message,'user_type'=>$data->status]));
		}
	}

	//Customer  Customer Dashboard 
	public function previousBookings(){

		$service_url = api_base_url('getPreviousAppoinment');

		$post['user_id'] = $_SESSION['customer']->data->id;

		if(isset($_SESSION['customer']->data->token) && $_SESSION['customer']->data->token !='' ){

			$post['token'] = $_SESSION['customer']->data->token;

		}else{
			$post['token'] = $_SESSION['customer']->token;
		}

		$post['user_type'] = 1;

		$curl_post_data = $post;

		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);

		$data = json_decode($response);	
		

		return $data;
	}


	//Customer  Customer Dashboard 
	public function chatList(){

		$service_url = api_base_url('getChatList');

		$post['user_id'] = $_SESSION['customer']->data->id;

		if(isset($_SESSION['customer']->data->token) && $_SESSION['customer']->data->token !='' ){

			$post['token'] = $_SESSION['customer']->data->token;

		}else{
			$post['token'] = $_SESSION['customer']->token;
		}

		$curl_post_data = $post;

		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);

		$data = json_decode($response);	
		

		return $data;
	}


	// Get Upcoming Booking BY Customer ID
	public function appoinmentDetails(){

		$post['appoinment_id'] = $_POST['s_id'];
		$post['user_type'] = 1;
		$get_appoinments = getDataByMethod('getAppoinmentDetails', $post);
		
		if (!empty($get_appoinments)) {
			
			$html = '';
			$html .= '<div class="tab_con_row Upcoming_user show_tab">
			<div class="tab_con_container">
			<span class="img_ico"><img src="'.$get_appoinments->profile_pic.'"></span>
			<div class="txt_container"><h6>'.ucwords($get_appoinments->firstname).' '.ucwords($get_appoinments->lastname).'</h6></div>
			<h5 class="price_tag">£'.round($get_appoinments->total_cost,2).'</h5></div>
			<div class="tab_schedule_row">
			<ul class="sc_ul"><li class="sc-date fa fa-calendar"> <span>'.$get_appoinments->appointment_date.'</span></li>
			<li class="sc-time fa fa-clock-o"> <span>2:31 PM</span></li>
			<li class="sc-location fa fa-map-marker"><span></span></li>
			</ul>
			</div>
			<div class="tab_schedule_row">
			<ul class="sc_ul"><li class="sc-date"><span>Services: </span></li>';
			if (!empty($get_appoinments->services) && is_array($get_appoinments->services)) {
				foreach ($get_appoinments->services as $key => $value) {
					$html .= '<li class="sc-time"><span>'.$value->service_name.'</span></li><li class="sc-time"><span>£'.round($value->service_charge,2).'</span></li>';
				}
			}
			$html .='</ul>
			</div>
			<div class="tab_schedule_row">
			<ul class="sc_ul">
			<li class="sc-date"><span>Additional Charges: </span></li>
			<ul>
			<li class="sc-date"><span>Parking Fees: </span></li>
			<li class="sc-time"><span>'.$get_appoinments->parking_fee.'</span></li>
			</ul>
			<ul>
			<li class="sc-date"><span>Travel Fees: </span></li>
			<li class="sc-time"><span>'.$get_appoinments->travel_fee.'</span></li>
			</ul>
			</ul>
			</div>
			<div class="tab_schedule_row">
			<ul class="sc_ul">
			<li class="sc-date"><span>Total: </span></li>
			<li class="sc-time"><span>£'.round($get_appoinments->total_cost,2).'</span></li>
			</ul>
			</div>';


			$half_payment = round($get_appoinments->total_cost/2);
			$full_payment = $get_appoinments->total_cost;

			$appointment_date 	= strtotime($get_appoinments->appointment_date);
			$current_date 		= strtotime(date('Y-m-d H:i:s', strtotime('+ 30 days')));

			

			// 1-'Pending'
			// 2-'Accept',
			// 3-'Reject',
			// 4-'Cancel',
			// 5-'Half Payment',
			// 6-'Full Payment',
			// 7-'Arrived At Venue',
			// 8-'Job Start Now',
			// 9-'Job Completed',
			// 10-'Feedback',
			// 11-'Feedback Submitted' 

			if ( $get_appoinments->status == 1 ){}
				if ( $get_appoinments->status == 2 ){}
					if ( $get_appoinments->status == 3 ){}
						if ( $get_appoinments->status == 4 ){}
							if ( $get_appoinments->status == 5 ){}
								if ( $get_appoinments->status == 6 ){}


			if ($get_appoinments->status == 2 || $get_appoinments->status == 5) { // 2. Accept 5. Half Payment
				$html .= '<a class="btn_indigo">Chat to stylist</a> &nbsp; <a onclick="cancelupcoming(445,10.00,5.00)" class="btn_red">Cancel appointment</a>';
				if ($appointment_date > $current_date) {
					$html .= '<div class="tab_schedule_row payment_section"><p>Payment Options</p>';
					// Full Payment
					$html .= '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" style="display:inline;">
					<input name="business" value="info@codexworld.com" type="hidden">
					<input name="cmd" value="_xclick" type="hidden">
					<input name="item_name" value="'.$get_appoinments->firstname.'" type="hidden">
					<input name="item_number" value="'.$get_appoinments->appoinment_id.'" type="hidden">
					<input name="amount" value="'.$full_payment.'" type="hidden">
					<input name="currency_code" value="USD" type="hidden">
					<input name="cancel_return" value="'.base_url().'/Home/paypalPaymentResponce" type="hidden">
					<input name="return" value="'.base_url().'/Home/paypalPaymentResponce" type="hidden">
					<input type="submit" class="btn btn_green pay_now_btn1" value="Full Payment">
					</form>';

					// Half Payment
					$html .= '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" style="display:inline;">
					<input name="business" value="info@codexworld.com" type="hidden">
					<input name="cmd" value="_xclick" type="hidden">
					<input name="item_name" value="'.$get_appoinments->firstname.'" type="hidden">
					<input name="item_number" value="'.$get_appoinments->appoinment_id.'" type="hidden">
					<input name="amount" value="'.$half_payment.'" type="hidden">
					<input name="currency_code" value="USD" type="hidden">
					<input name="cancel_return" value="'.base_url().'/Home/paypalPaymentResponce" type="hidden">
					<input name="return" value="'.base_url().'/Home/paypalPaymentResponce" type="hidden">
					<input type="submit" class="btn btn_indigo pay_now_btn1" value="Half Payment">
					</form>';
					
				}else{
					$html .= '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
					<input name="business" value="info@codexworld.com" type="hidden">
					<input name="cmd" value="_xclick" type="hidden">
					<input name="item_name" value="'.$get_appoinments->firstname.'" type="hidden">
					<input name="item_number" value="'.$get_appoinments->appoinment_id.'" type="hidden">
					<input name="amount" value="'.$get_appoinments->total_cost.'" type="hidden">
					<input name="currency_code" value="USD" type="hidden">
					<input name="cancel_return" value="'.base_url().'/Home/paypalPaymentResponce" type="hidden">
					<input name="return" value="'.base_url().'/Home/paypalPaymentResponce" type="hidden">
					<input type="submit" class="btn pay_now_btn" value="Pay Now">
					</form>';
				}
			}
			$html .= '</div>';

		}
		echo json_encode(array("success"=>1,"data"=>$html));
	}


	//Customer  Customer Dashboard 
	public function cancelAppoinment(){


		$service_url = api_base_url('updateAppoinmentStatus');

		$post['user_id'] = $_SESSION['customer']->data->id;

		if(isset($_SESSION['customer']->data->token) && $_SESSION['customer']->data->token !='' ){

			$post['token'] = $_SESSION['customer']->data->token;

		}else{
			$post['token'] = $_SESSION['customer']->token;
		}



		$post['appoinment_id'] = $_POST['s_id'];


		$post['status'] = 4;
		$post['parking_fee'] = $_POST['parking_fee'];
		$post['travel_fee'] = $_POST['travel_fee'];

		$curl_post_data = $post;


		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);

		$data = json_decode($response);	

		echo json_encode(["success"=>1,"data"=>$data]);


	}


	//Customer  Customer Dashboard 
	public function getCategoryList(){

		$service_url = api_base_url('getCategory');

		$post['user_id'] = $_SESSION['customer']->data->id;

		if(isset($_SESSION['customer']->data->token) && $_SESSION['customer']->data->token !='' ){

			$post['token'] = $_SESSION['customer']->data->token;

		}else{
			$post['token'] = $_SESSION['customer']->token;
		}

		$curl_post_data = $post;

		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);

		$data = json_decode($response);	

		return $data;
	}

	// Customer  Customer Dashboard 
	public function getStylistList(){

		$lat_long = $_POST['lat_long'];
		$lat_long = explode('_', $lat_long);
		$_POST['appointment_date'] 	= $_POST['appointment_date'];
		$_POST['lat'] 				= $lat_long[0];
		$_POST['lang'] 				= $lat_long[1];
		$_POST['service_ids'] 		= $_POST['treat_sub_cat'];;

		$stylist_data = getDataByMethod('getStylistList',$_POST);

		$html = '';

		$html .= '<div class="outer_box">';
		$html .= '<div class="all_stylist">';

		if (!empty($stylist_data)) {
			foreach ($stylist_data as $key => $value) {
				$img = '';
				if (!empty($value->portfoilioData)) {
					foreach ($value->portfoilioData as $key => $imgs) {
						$img .= '<li class="img_ico"><img src="'.$imgs.'"></li>';
					}
				}

				$html .= '<div class="tab_con_row stylist" data-id="'.$value->styler_id.'">
				<a class="stylist_man">
				<span class="img_ico"><img src="'.$value->profile_pic.'"></span>
				<input type="radio" id="st_'.$value->styler_id.'" class="stylist_ids" name="stylist_ids" value="'.$value->styler_id.'">
				<label for="st_'.$value->styler_id.'" class="stylist_name">'.ucwords($value->firstname).' '.ucwords($value->lastname).'</label>
				</a>
				<a class="stylist_profile"><i class="fa fa-user"></i> <span>View Profile</span></a>
				<input type="hidden" name="category_name" value="'.$value->category_name.'">
				<div class="portfoilio_data" style="display:none;">'.$img.'</div>
				</div>';
			}
		}
		$html .= '<a data-tab="payment" class="next_btn">Proceed to Payment</a>
		</div>
		</div>';

		if (!empty($stylist_data)) {
			//if($data->status == 1){
			die(json_encode(['success'=>'1','message'=>'$data->message','data'=>$html]));
			//}else{     
			//}
		}else{
			die(json_encode(['success'=>'0','message'=>'$data->message']));

		}
	}


	//Customer  Customer Dashboard 
	public function dashboard(){

		if(empty($_SESSION['customer'])){
			redirect("Home");
		}

		$data['upcomingBooking'] 	= getDataByMethod('upcomingAppoinment');
		$data['previousBooking'] 	= getDataByMethod('getPreviousAppoinment');
		$data['chatlist'] 			= $this->chatList();
		$data['categoryList'] 		= getDataByMethod('getCategory');

		$this->load->view('includes/user/metadata',$data);
		$this->load->view('includes/user/dashboard_header');
		$this->load->view('includes/user/sidebar');
		$this->load->view('home/dashboard');
		$this->load->view('includes/user/footer');	
	
	}


	public function getViewStylish($id)
	{
		$data = $this->db->select('*')->where(array('id'=>$id))->get('users')->result();
    	// echo "<pre>";
    	// print_r($data);
    	// die;
		echo json_encode(["success"=>1,"data"=>$data]);


	}


	//Customer Registration
	public function register() 
	{
		$_POST['firstname'] = $this->input->post('firstname');
		$_POST['lastname'] = $this->input->post('lastname');
		$_POST['email'] = $this->input->post('email');
		$_POST['password'] = $this->input->post('password'); 
		$_POST['password_confirm'] = $this->input->post('password_confirm');
		$_POST['referral_id'] = $this->input->post('referral_id');
		$_POST['user_type'] = 1;
		$_POST['certificate_ids']=1;
		unset($_POST['password_confirm']); 
		$service_url = api_base_url('register');
		$curl_post_data = $_POST;
		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		$data = json_decode($response);
		if($data->status == 1){
			set_login('customer',$data);
			die(json_encode(['success'=>'1','message'=>$data->message,'user_type'=>$data->data->user_type]));
		}else{     
			die(json_encode(['success'=>'0','message'=>$data->message,'user_type'=>$data->status]));
		}
	}
	//Customer Logout
	public function logout(){

		$_POST['user_id'] = $_SESSION['customer']->data->id;
		$service_url = api_base_url('logout');
		$curl_post_data = $_POST;
		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		$data = json_decode($response);
		if($data->status == 1){
			session_destroy();
			unset($_SESSION['customer']);
			die(json_encode(['success'=>'1','message'=>$data->message]));
		}else{     
			die(json_encode(['success'=>'0','message'=>$data->message]));
		}
	}
	//Customer Forgot Password
	public function forgotPass() 
	{
		$_POST['email'] = $this->input->post('email');
		$_POST['user_type'] = 1; 
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

	// Insert/Add New Appoinments
	public function submit_add_new_appointments_form(){

		if (isset($_POST['location_postal_code'])) {

			$post = array();

			$post['location_postal_code'] 	= (isset($_POST['location_postal_code'])) ? $_POST['location_postal_code'] : '';
			$location_address 				= (isset($_POST['location_address'])) ? $_POST['location_address'] : '';
			$location_address 				= explode('_', $location_address);
			$post['lattitude'] 				= $location_address[0];
			$post['longitude'] 				= $location_address[1];
			$post['location']				= '';
			$post['category_id'] 			= (isset($_POST['treatment_type'])) ? $_POST['treatment_type'] : '';
			$category_id 					= (isset($_POST['treatment_data'])) ? $_POST['treatment_data'] : '';
			$post['service_id'] 			= implode(',', $category_id); 
			$post['appointment_date'] 		= (isset($_POST['date'])) ? date('Y-m-d H:i:s', strtotime($_POST['date'])) : '';
			$post['styler_id'] 				= (isset($_POST['stylist_id'])) ? $_POST['stylist_id'] : '';
			
			echo getDataByMethod('addAppoinment', $post, 'json');
		}
		die();
	}



	/**
	 * Paypal Payments Response
	 */
	function paypalPaymentResponce(){


		$item_number = $_GET['item_number']; 
		$payment_gross = $_GET['amt'];
		$currency_code = $_GET['cc'];
		$payment_status = $_GET['st'];

		$postData = array();

		$postData['appoinment_id'] 	= (isset($_GET['tx'])) ? $_GET['tx'] : '';
		$postData['amount'] 		= (isset($_GET['amt'])) ? $_GET['amt'] : '';
		$postData['transaction_id'] = (isset($_GET['tx'])) ? $_GET['tx'] : '';
		$postData['status'] 		= (isset($_GET['st'])) ? $_GET['st'] : '';

		$res = getDataByMethod('saveAppoinmentPayment',$postData);

	}

	public function insertrow($data,$table)
	{
		$this->db->insert($table,$data);
		
	}

	public function updaterow($data,$table,$id)
	{
		$this->db->where($id);
		$this->db->update($table,$data);
	}


	public function profileSetting(){

		if(empty($_SESSION['customer'])){
			redirect("Home");
		}

		$service_url = api_base_url('getCustomerProfile');
		
		$post['customer_id'] = $_SESSION['customer']->data->id;

		if(isset($_SESSION['customer']->data->token) && $_SESSION['customer']->data->token !='' ){

				$post['token'] = $_SESSION['customer']->data->token;

		}else{
				$post['token'] = $_SESSION['customer']->token;
		}

		$post['user_type'] = 1; 

		$curl_post_data = $post;

		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);

		$data['getCustomerProfile'] = json_decode($response);
		
		// echo "<pre>";
		// print_r($response); die;

		$this->load->view('includes/user/metadata',$data);
		$this->load->view('includes/user/dashboard_header');
		$this->load->view('includes/user/sidebar');
		$this->load->view('home/profile_setting');
		$this->load->view('includes/user/footer');	
	}


	public function updateCustomerProfile(){

		if(empty($_SESSION['customer'])){
			redirect("Home");
		}
		// echo "<pre>";
		// print_r($_SESSION['customer']->data->id); die;

		$service_url = api_base_url('updateCustomerProfile');
		
		$post['user_id'] = $_SESSION['customer']->data->id;

		if(isset($_SESSION['customer']->data->token) && $_SESSION['customer']->data->token !='' ){

				$post['token'] = $_SESSION['customer']->data->token;

		}else{
				$post['token'] = $_SESSION['customer']->token;
		}

		$post['firstname'] = $_POST['firstname'];
		$post['lastname'] = $_POST['lastname'];
		$post['mobile'] = $_POST['mobile'];
		$post['landline'] = $_POST['landline'];

		$user_type = 1;

		// echo "<pre>";
		// print_r($_FILES); die;

		if(isset($_FILES['profile_pic']) && !empty($_FILES['profile_pic']['name']))
  	{ 
  		$unique = time();
           $filename = $unique.$_FILES['profile_pic']['name'];  
        // $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // $filename = getFileName($ext); 

        // $tfilename = @$_FILES['profile_pic']['tmp_name'];
        if($user_type == 1) 
        {            
          $dir = CUSTOMER_UPLOAD.$_SESSION['customer']->data->id; 
          $img_url = GET_CUSTOMER_IMG.$_SESSION['customer']->data->id."/".$filename; 
        }
        else
        {
          $dir = SERVICE_PROVIDER_IMG_UPLOAD.$_SESSION['customer']->data->id;
          $img_url = GET_IMG_SERVICE_PROVIDER.$_SESSION['customer']->data->id."/".$filename;
        }
        
        if(is_dir($dir) == false)
        {    
        	
          if (!@mkdir($dir)) 
          {
          	

            $error = error_get_last();
            $res['directory_error_message'] = $error['message']; 
          }
          else
          {

            chmod($dir, 0777); 

          }
                    
         }
            $path = $dir."/".$filename;   
     
        if(move_uploaded_file($filename, $path))
        {
        	   	
          chmod($path, 0777);
          $save_data = array(
                         'image' => $filename,
                         'created_date'=>date('Y-m-d H:i:s')
                        );
         $save_pic_id = save_data($save_data,'users_images');
         $res['image_id'] = $save_pic_id;

 		 $imagID =  $this->db->insert_id();

 		 $dataID['profile_pic'] = $imagID;

 		 $whr['id'] = $_SESSION['customer']->data->id;
 		 $this->updaterow($dataID,'users',$whr);

          $res['image_url'] = $img_url;
          $res['status'] = 1;
          $res['message'] = "Image has been uploaded successfully";
          
      	  }
       
 		 }

 		
		$curl_post_data = $post;

		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);

		$data['getCustomerProfile'] = json_decode($response);
		$this->session->set_flashdata('success',$data['getCustomerProfile']->message); 
		redirect(site_url().'Home/profileSetting');
	
	}

	public function upload_picservice($name,$file_name)
	{
		$this->load->helper('form');
		$config['upload_path'] = 'uploads/customer/8/';
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

	public function changePassword(){

		if(empty($_SESSION['customer'])){
			redirect("Home");
		}

		$this->load->view('includes/user/metadata');
		$this->load->view('includes/user/dashboard_header');
		$this->load->view('includes/user/sidebar');
		$this->load->view('home/changePassword');
		$this->load->view('includes/user/footer');	
	}


	public function customerChangePassword(){


		if(empty($_SESSION['customer'])){
			redirect("Home");
		}

		$service_url = api_base_url('changeUserPassword');
		
		$post['user_id'] = $_SESSION['customer']->data->id;

		if(isset($_SESSION['customer']->data->token) && $_SESSION['customer']->data->token !='' ){

				$post['token'] = $_SESSION['customer']->data->token;

		}else{
				$post['token'] = $_SESSION['customer']->token;
		}

		$post['old_password'] = $_POST['old_password'];
		$post['new_password'] = $_POST['new_password'];
		
		$curl_post_data = $post;

		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		
		$data['getCustomerProfile'] = json_decode($response);
		
		$this->session->set_flashdata('success',$data['getCustomerProfile']->message); 

		redirect(site_url().'Home/changePassword');
	
	}


	public function yourBeautyDetails()
	{

		if(empty($_SESSION['customer'])){
			redirect("Home");
		}

		$service_url = api_base_url('getBeautyCategory');
		
		$post['customer_id'] = $_SESSION['customer']->data->id;

		if(isset($_SESSION['customer']->data->token) && $_SESSION['customer']->data->token !='' ){

				$post['token'] = $_SESSION['customer']->data->token;

		}else{
				$post['token'] = $_SESSION['customer']->token;
		}
	
		$curl_post_data = $post;

		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);

		$data['getBeautyCategory'] = json_decode($response);
		

		$this->load->view('includes/user/metadata',$data);
		$this->load->view('includes/user/dashboard_header');
		$this->load->view('includes/user/sidebar');
		$this->load->view('home/your_beauty_details');
		$this->load->view('includes/user/footer');	
	}


	public function updateBeautyDetails(){

		if(empty($_SESSION['customer'])){
			redirect("Home");
		}
		$array = array();
		$service_url = api_base_url('updateBeautyDetails');
		
		$post['user_id'] = $_SESSION['customer']->data->id;

		if(isset($_SESSION['customer']->data->token) && $_SESSION['customer']->data->token !='' ){

				$post['token'] = $_SESSION['customer']->data->token;

		}else{
				$post['token'] = $_SESSION['customer']->token;
		}
		
		 $dat = count($_POST);
		 
		for ($i=0; $i < $dat; $i++) { 
			 
			if (isset($_POST['beauty_sub_category_ids'.$i])) {
				$array[] = $_POST['beauty_sub_category_ids'.$i];	
			}
			
			 $beautySUBCat = implode(',', $array);
		}
		
	
		$post['beauty_sub_category_ids'] = $beautySUBCat; 
		//$post['image_ids'] = $_POST['image_ids'];
		$post['allergy'] = $_POST['allergy'];
		
		$curl_post_data = $post;

		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);
		$data['getCustomerProfile'] = json_decode($response);
		// echo "<pre>";
		// print_r($data['getCustomerProfile']); die;
		redirect(site_url().'Home/yourBeautyDetails');
	
	}


	public function yourAddresses()
	{

		if(empty($_SESSION['customer'])){
			redirect("Home");
		}

		$service_url = api_base_url('getBeautyCategory');
		
		$post['customer_id'] = $_SESSION['customer']->data->id;

		if(isset($_SESSION['customer']->data->token) && $_SESSION['customer']->data->token !='' ){

				$post['token'] = $_SESSION['customer']->data->token;

		}else{
				$post['token'] = $_SESSION['customer']->token;
		}
	
		$curl_post_data = $post;

		$response = call_postMethod($type = "POST",$service_url,$curl_post_data);

		$data['getBeautyCategory'] = json_decode($response);
		

		$this->load->view('includes/user/metadata',$data);
		$this->load->view('includes/user/dashboard_header');
		$this->load->view('includes/user/sidebar');
		$this->load->view('home/yourAddresses');
		$this->load->view('includes/user/footer');	
	}



}
