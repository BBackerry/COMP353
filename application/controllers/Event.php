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
		$this->load->model('phase_model');
		$this->load->model('phaseType_model');
	}
	
	public function listEvents()
	{
		$username = $this->session->userdata('idUser');
		
		$param['events'] = $this->event_model->get_all_event();
		
		if ($username) {
			$this->load->view('header');
			$this->load->view('events_list', $param);
		}
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to submit papers');
			$this->load->view('header', $errors);
			$this->load->view('home_page');
		}
	}
	
	public function addEvent()
	{
		$admin = $this->session->userdata('isAdmin');
		$param['meeting']= $this->meeting_model->get_all_meeting();
		$param['EventTopic']= $this->topic_model->get_all_topic();
		$param['phaseType']= $this->phaseType_model->get_all_phaseType();
		
		
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
		$idPhase = $this->input->get('phaseTypes');
		$firstStartDate = date( "Y-m-d H:i:s", strtotime($this->input->get('firstStartDate')));	
		$firstEndDate = date( "Y-m-d H:i:s", strtotime($this->input->get('firstEndDate')));
		$secondStartDate = date( "Y-m-d H:i:s", strtotime($this->input->get('secondStartDate')));	
		$secondEndDate = date( "Y-m-d H:i:s", strtotime($this->input->get('secondEndDate')));
		$thirdStartDate = date( "Y-m-d H:i:s", strtotime($this->input->get('thirdStartDate')));	
		$thirdEndDate = date( "Y-m-d H:i:s", strtotime($this->input->get('thirdEndDate')));
		$fourthStartDate = date( "Y-m-d H:i:s", strtotime($this->input->get('fourthStartDate')));	
		$fourthEndDate = date( "Y-m-d H:i:s", strtotime($this->input->get('fourthEndDate')));
		$fifthStartDate = date( "Y-m-d H:i:s", strtotime($this->input->get('fifthStartDate')));	
		$fifthEndDate = date( "Y-m-d H:i:s", strtotime($this->input->get('fifthEndDate')));		
		
		$this->event_model->create_event($startDate, $endDate, $username, $eventDescription, $eventName);
		$idEvent = mysql_insert_id();
		
		$this->phase_model->create_phase(1, $idEvent, $firstStartDate, $firstEndDate);
		$this->phase_model->create_phase(2, $idEvent, $secondStartDate, $secondEndDate);
		$this->phase_model->create_phase(3, $idEvent, $thirdStartDate, $thirdEndDate);
		$this->phase_model->create_phase(4, $idEvent, $fourthStartDate, $fourthEndDate);
		$this->phase_model->create_phase(5, $idEvent, $fifthStartDate, $fifthEndDate);
				
		foreach($idMeeting as $m)
		{
			$this->meetingEvent_model->create_meetingEvent($idEvent, $m);
		}
		//echo $idTopic;
		//die();
		foreach($idTopic as $t)
		{
			$this->eventTopic_model->create_eventTopic($idEvent, $t);
		}

		foreach($idPhase  as $p)
		{ 
			$this->eventTopic_model->create_phase($p, $idEvent, $startDate, $endDate, $username);
		}
		
		$this->load->view('header');
		$this->load->view('event_page');
	}
	
	public function editEvent()
	{
		$idEvent = $this->input->get('idEvent');
		$data['event'] = $this->event_model->get_event($idEvent);
		$data['meetings']= $this->meeting_model->get_all_meeting();
		$data['topics']= $this->topic_model->get_all_topic();
		$data['phases']= $this->phaseType_model->get_all_phaseType();
		$this->load->view('header');
		$this->load->view('event_edit', $data);
	}
	
	public function submitEditEvent
	{
		$username = $this->session->userdata('idUser');	
		$eventName = $this->input->get('eventName');
		$eventDescription = $this->input->get('eventDescription');		
		$startDate = date( "Y-m-d H:i:s", strtotime($this->input->get('startDate')));	
		$endDate = date( "Y-m-d H:i:s", strtotime($this->input->get('endDate')));
		$topics = $this->input->get('topics');
		$phases = $this->input->get('phases');
		$meetings = $this->input->get('meetings');
		
		$this->event_model->update_event($startDate, $endDate, $username, $eventDescription, $eventName);

		$this->eventTopic_model->delete_eventTopic_by_event($idEvent);	//Remove previous associations
		foreach($topics as $t)
		{
			$this->eventTopic_model->create_eventTopic($idEvent, $t);
		}
		
		$this->phase_model->delete_phase_by_event($idEvent);	//Remove previous associations
		foreach($phases  as $p)
		{ 
			$this->eventTopic_model->create_phase($p, $idEvent, $startDate, $endDate, $username);
		}
		
		$this->meetingEvent_model->delete_meetingEvent_by_event($idEvent);	//Remove previous associations
		foreach($meetings as $m)
		{
			$this->meetingEvent_model->create_meetingEvent($idEvent, $m);
		}
	}
}