<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('home_page');
	}
    
    public function signIn()
	{
		$this->load->view('header');
		$this->load->view('signed-in-page');
	}
}