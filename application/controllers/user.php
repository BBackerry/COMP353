<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function login()
	{
		if ($this->verify_login()) {
		$this->session->set_userdata('logged_in', true);
		redirect('Home', 'index'); }
		else {
		$this->session->set_userdata('logged_in', false);
		redirect('Home', 'index'); }
	}
	
	public function register_email()
	{
		$this->load->view('header');
		$this->load->view('user_registration_email');
	}
	
	public function register_form()
	{
		$this->load->view('header');
		$this->load->view('user_registration_form');
	}
	
	public function logout()
	{
		$this->session->set_userdata('logged_in', false);
		redirect('Home', 'index');
	}
	
	private function verify_login()
	{
		if ($this->input->get('username') != '')
		{
			return true;
		}
		
		return false;
	}
}