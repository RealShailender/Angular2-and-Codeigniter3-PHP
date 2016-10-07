<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_2_auth extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function old_2_login()
	{
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Headers: X-Requested-With');
		header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
		$response = array();
		$response = var_dump($_POST);
		echo"we are getting budy";
		echo json_encode($response);                           
        
	}
}
