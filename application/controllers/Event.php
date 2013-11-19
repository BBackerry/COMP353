<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {
	
	public function addEvent()
	{
		$this->load->view('add_new_event');
	}
    
    public function submit()
	{
		$this->load->view('event_page');
	}
}