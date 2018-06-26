<?php defined('BASEPATH') OR exit('No direct script access allowed.');

function is_loggedin(){
	if(!session_id()){
		session_start();
	}
	return isset($_SESSION['logged_in'])  && !empty($_SESSION['logged_in']) ?$_SESSION['logged_in'] : '';
}

if(!function_exists('createSession')){

	function createSession($array){		
		$ci = & get_instance();
		$ci->session->set_userdata($array);
		return true;
	}
}

if(!function_exists('isLoggedIn')){

	function isLoggedIn(){		
		$ci = & get_instance();
		$session = $ci->session->all_userdata();		
		if(isset($session['id']) && !empty($session['id'])){
			$arr['id'] = $session['id'];
			$arr['user_type'] = $session['user_type'];
			return $arr;
		}else{
			return false;
		}
	}
}

if (!function_exists('is_user_logged_in')) {
	function is_user_logged_in($user_type = ''){

		$ci =& get_instance();
		$session = $ci->session->userdata;
		if (!empty($session) && array_key_exists('logged_in', $session)) {
			if (!empty($user_type)) {
				if ( $session['logged_in'] == $user_type) {
					return true;
				}else{
					return false;
				}
			}else{
				return $session;
			}
		}else{
			return false;
		}

	}
}



if (!function_exists('get_current_user_data')) {
	function get_current_user_data( $output = '' ,$user_id='' ){

		$ci =& get_instance();
		
		if (!empty($user_id)) {
			
			$user_query = $ci->db->get_where('users', array('id' => $user_id));
			if (!empty($user_query)) {
				$userdata = $user_query->row();
				if (!empty($userdata) && is_object($userdata)) {
					if (property_exists($userdata, $output)) {
						return $userdata->{$output};
					}else{
						return $userdata;
					}
				}
			}


		}else{
			// Get Current User Session
			$session = $ci->session->userdata();
			// Check User Logged In
			if (!empty($session) && array_key_exists('logged_in', $session)) {
				$curr_user = $session['logged_in'];
				// Get Current User Data
				if (!empty($curr_user) && array_key_exists($curr_user, $session)) {
					$user_data = $session[$curr_user];
					// Get User Data By peroperties
					if (!empty($user_data) && !empty($output)) {
						if (property_exists($user_data, $output)) {
							return $user_data->{$output};
						}else{
							if (property_exists($user_data, 'data')) {
								return $user_data->data->{$output};
							}
						}
					}else{
						return $user_data;
					}
				}
			}else{
				return false;
			}
		}	
	}
}

/**
 * Get Current User ID
 */
if (!function_exists('get_current_user_id')) {
	function get_current_user_id(){
		return get_current_user_data('id');
	}
}


function set_login($user_type,$data){
	if(!session_id()){
		session_start();
	}
	$_SESSION['logged_in'] = $user_type; 
	$_SESSION[$user_type] = $data;
}
function api_base_url($method){

	$url = base_url('new/main/'.$method); 
	//$url = "http://localhost/glamarmy/new/main/$method";
	return $url;	
}

/*-----call_postMethod-----*/
function call_postMethod($type = "POST",$service_url,$curl_post_data,$token=''){

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $service_url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $curl_post_data,
		
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
		return "cURL Error #:" . $err;
	} else {
		return $response;
		//print_r($response);
	}
	/*-----call_postMethodWithEmptyArray-----*/
}

function call_postMethodWithEmptyArray($type = "POST",$service_url,$curl_post_data,$token=''){


	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $service_url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
		echo "cURL Error #:" . $err;
		
	} else {
		
		return $response;
	}
}

function save_data($data, $table){
	$ci = & get_instance();  
	$Query = $ci->db->insert($table, array('image'=> $data));
	$insert_id = $ci->db->insert_id();
	return  $insert_id;
}
function save_certificates($data, $table){
	$ci = & get_instance();  
	$Query = $ci->db->insert($table,$data);
	$insert_id = $ci->db->insert_id();
	return  $insert_id;
}

function multifileUpload($data = array()){
	$ids =array();
	foreach ($data as $key => $value) { 
		$CI = & get_instance();
		$CI->db->insert('users_images',$value);
		$ids[]=$CI->db->insert_id();
	}
	return $ids;
}

function uploadImage($data,$id){
	$ci = & get_instance();
	$ci->db->where('id', $id);
	$ci->db->update('users', $data);
	return true;
}

function get_data($data,$cond,$table,$order = ''){
	$ci = & get_instance();
	$select_string = $cond_string = ''; 

	if(!empty($data)){
		foreach ($data as $key => $value) {
			$select_string .= $value.', ';
		}
		$select_string = trim($select_string,", ");
	}else{
		$select_string = '*';
	}

	if(!empty($cond)){
		foreach($cond as $k => $v){
			$cond_string .= $k.' = '."'".$v."' and ";
		}
		$cond_string = 'WHERE '.rtrim($cond_string," and");
	}

	if(!empty($order)){
		$order_key = array_keys($order);
		$order_val = array_values($order);
		$order_string = ' ORDER BY '.$order_key[0].' '.$order_val[0];        
	}else{
		$order_string = '';
	}

	$query = "SELECT $select_string FROM $table $cond_string $order_string";
	$getData = $ci->db->query($query)->result_array();
	return $getData;
}

function update_data($data,$cond,$table){
	$ci = & get_instance();
	$update_string = $cond_string = '';
	foreach($data as $key => $value){
		$update_string .= $key.' = '."'".$value."', ";
	}
	$update_string = rtrim($update_string," ,");
	foreach($cond as $k => $v){
		$cond_string .= $k.' = '."'".$v."' and ";
	}
	$cond_string = rtrim($cond_string," and");      
	$query = "UPDATE $table SET $update_string WHERE $cond_string";
    // echo $query; die;
	$updateData = $ci->db->query($query);
	return $updateData;
}









/**
 * Get Data By Method Name
 * @method_name 
 */

function getDataByMethod($method_name, $post_data=array(), $output='array'){

	$data_url = base_url(). 'new/main/'.$method_name;

	$post_data['user_id'] 		= get_current_user_data('id');;
	$post_data['token'] 		= get_current_user_data('token');
	$post_data['user_type'] 	= 1;
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL 			=> $data_url,
		CURLOPT_RETURNTRANSFER 	=> true,
		CURLOPT_ENCODING 		=> "",
		CURLOPT_MAXREDIRS 		=> 10,
		CURLOPT_TIMEOUT 		=> 30,
		CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST 	=> "POST",
		CURLOPT_POSTFIELDS 		=> $post_data,
	));
	$response 	= curl_exec($curl);
	$err 		= curl_error($curl);
	curl_close($curl);
	if ($err) {
		return "cURL Error #:" . $err;
	} else {
		
		if ($output == 'json') return $response;

		$response = json_decode($response);
		if (!empty($response) && is_object($response)) {
			if (property_exists($response, 'status') && $response->status == 1) {
				
				return (property_exists($response, 'data')) ? $response->data : $response;
			}
		}else{
			return json_decode($response);
		}
	}
}






function getFileName(){
	$a = '';
	for ($i = 0; $i < 8; $i++) {
		$a .= mt_rand(0,9);
	}
	return time().'_'.$a;
}


/**
 * Create Slug By String
 * @param $str ( String ) $delimiter ( -,_,etc )
 */
if ( ! function_exists('create_slug_by_string')){
	function create_slug_by_string($str, $delimiter = '-'){
		return strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
	}
}

/**
 * Get Current Method
 */
function get_current_page_method($output = ''){

	$ci =& get_instance();
	if ($output == 'controller' || $output == 'class' || $output == 'classname') {
		return strtolower($ci->router->class);
	}else{
		return $ci->router->method;
	}

}

/**
 * Get Current Method Path
 */
function get_current_page_method_url($output = ''){

	$ci =& get_instance();
	if (!empty($output)) {	
		if ($output == 'controller' || $output == 'class' || $output == 'classname') {
			return base_url(strtolower($ci->router->class));
		}else{
			return base_url(strtolower($ci->router->class).'/'.$output);
		}
	}else{
		return base_url(strtolower($ci->router->method));
	}

}


/**
 * Upload File
 */
if (!function_exists('dcrf_upload_files')) {
	function dcrf_upload_files($file='', $path=''){

		$ci =& get_instance();
		$user_id = get_current_user_id();

		$file_name = (!empty($file)) ? $file : '';
		
		if (is_dir($path)) {
			if (!is_writable($path)) {
				chmod($path, 0777);
			}
		}else{
			mkdir($path, 0777);
			chmod($path, 0777);
		}
		
		if(!empty($file_name)){
			
			$config['upload_path'] 		= $path;
			$config['allowed_types'] 	= 'jpg|jpeg|png|gif';
			$config['encrypt_name'] 	= TRUE;
			$config['file_name'] 		= $file_name;
			
			$ci->load->library('upload');
			$ci->upload->initialize($config);
			
			if($ci->upload->do_upload('pic_file')){
				$data =$ci->upload->data();
				
				$profile_pic = $data['file_name'];
				$saveImageId['profile_pic'] =save_data($profile_pic,'users_images');
				if(!empty($saveImageId)){
					$uploadImgID=uploadImage($saveImageId,$user_id);
					if($uploadImgID == 1){
						redirect('Service/serviceProfile');
					}		
				}
			}else{
				$error = array('error' => $ci->upload->display_errors());

				print_r($error);
			}
		}


	}
}

/**
 * Check Image Exist
 */
if (!function_exists('dcrf_image_exist')) {
	
	function dcrf_image_exist( $file_path='' ){

		$file_headers = @get_headers($file_path);
		
		if($file_headers[0] == 'HTTP/1.0 404 Not Found' || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
			return false;
		}else {
			return true;
		}

	}
}