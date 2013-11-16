<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserRegistration extends CI_Controller {

	public function index()
	{
		$this->load->view('user_registration_email');
	}
	
	public function registration()
	{
		$this->load->view('user_registration_form');
	}
}