<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddEvent extends CI_Controller {
	
	public function addEvent()
	{
		$this->load->view('add_new_event');
	}
}