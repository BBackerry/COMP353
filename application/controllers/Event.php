<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('event_model');
		$this->load->model('meeting_model');
		$this->load->model('meetingEvent_model');
		$this->load->model('eventTopic_model');
		$this->load->model('topic_model');
	}
	
	public function addEvent()
	{
			$admin = $this->session->userdata('isAdmin');
			$param['meeting']= $this->meeting_model->get_all_meeting();
			$param['EventTopic']= $this->topic_model->get_all_topic();
			
			
			if ($admin)
			{
			$this->load->view('header');
			$this->load->view('add_new_event', $param);
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
		$startDate = date( "Y-m-d H:i:s", strtotime($this->input->get('startDate')));	
		$endDate = date( "Y-m-d H:i:s", strtotime($this->input->get('endDate')));
		$idMeeting = $this->input->get('meetingIDs');
		$idTopic = $this->input->get('eventTopics');
					
		$this->event_model->create_event($startDate, $endDate, $username, $eventDescription, $eventName);
		$idEvent = mysql_insert_id();
				
		foreach($idMeeting as $m)
		{
			$this->meetingEvent_model->create_meetingEvent($idEvent, $m);
		}
		
		foreach( $eventTopics as $t)
		{
			$this->eventTopic_model->create_eventTopic($idEvent, $t);
		}
		$this->load->view('header');
		$this->load->view('event_page');	
				
		
	}
		
			
	
}