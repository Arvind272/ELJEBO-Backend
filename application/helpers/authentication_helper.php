<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('auth'))
{
    function auth($username, $password)
    {

    	$CI =& get_instance();
    	$query = $CI->db->get_where('users',array('email' => $username,'password' => md5($password)));
      
    	$rows = $query->result_array();
    	$count = $query->num_rows();

      
    	if( $count >= 1 )
        {
    		$CI->session->set_userdata('id',$rows[0]['id']);
    		$CI->session->set_userdata('logged',true);

    		return 1;

    	} else {

    		return 0;

    	}
    }

    function is_logged_in() {

        $CI =& get_instance();

    	if( $CI->session->logged == true && isset($CI->session->id)) {

    		return true;

    	} else {

    		return false;
    		
    	}

    }
}