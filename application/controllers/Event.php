<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('event_model');
	}
	
	public function addEvent()
	{
			$username = $this->session->userdata('idUser');
			$query['roles'] = $this->role_model->get_role_of_user($username);
			$admin = false;
			foreach ($query->result() as $row)
			{
				if($row->idPosition == 1 & $row->idEvent == 1)
				$admin = true;
			}
			if ($admin)
			{
			$this->load->view('header');
			$this->load->view('add_new_event');
			}
		else 
		{
			$errors['errorMessagesEvent'] = array("Sorry but you are no allowed to create event");
			$this->load->view('header', $errors);
			$this->load->view('home_page');
		}
	}
	
     
	public function submitedEvent()
	{
		$username = $this->session->userdata('idUser');
		
		$eventName = $this->input->get('eventName');
		$eventDescription = $this->input->get('eventDescription');		
		$startDate = $this->input->get('startDate');
		$endDate = $this->input->get('endDate');
					
		$this->event_model->create_event($eventName, $startDate, $endDate, $username);
			
		$this->load->view('header');
		$this->load->view('event_page');		
		
	}
		
			
	
}