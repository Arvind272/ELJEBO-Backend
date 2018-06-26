<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();	
	}

	
	//Service Provider Register Page
	public function upcoming() 
	{	
		$service_url = api_base_url('upcomingAppoinment');

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
		// echo "pre";
		// print_r($data);
		// die;

		
	
		//$this->load->view('includes/user/metadata',$data);
		//$this->load->view('includes/user/dashboard_header');
		$this->load->view('home/dashboard');
		//$this->load->view('includes/user/footer');	
	}

}