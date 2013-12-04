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
	
	public function viewEvents()
	{
		$idEvent = $this->input->get('idEvent');
		$param['event'] = $this->event_model->get_event($idEvent)[0];
		$param['meetingDetail']= $this->meetingEvent_model->get_meetingEvent($idEvent);
		$meetings = array();
		foreach($param['meetingDetail'] as $row) {
			$meeting = $this->meeting_model->get_meeting($row->idMeeting);
			array_push($meetings, $meeting[0]);
		}
		$param['meetings'] = $meetings;

		$param['EventTopicDetail']= $this->eventTopic_model->get_eventTopic($idEvent);
		$param['phaseDetail']= $this->phase_model->get_all_phase_for_event($idEvent);
		$param['phaseTypeDetail']= $this->phaseType_model->get_all_phaseType();

		$this->load->view('header');
		$this->load->view('event_page', $param);
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
		$data['event'] = $this->event_model->get_event($idEvent)[0];
		$data['meetings']= $this->meeting_model->get_all_meeting();
		$data['topics']= $this->topic_model->get_all_topic();
		$data['phases']= $this->phaseType_model->get_all_phaseType();
		$this->load->view('header');
		$this->load->view('event_edit', $data);
	}
	
	public function submitEditEvent()
	{
		$username = $this->session->userdata('idUser');
		$idEvent = $this->input->post('idEvent');
		$eventName = $this->input->post('eventName');
		$eventDescription = $this->input->post('eventDescription');		
		$startDate = date( "Y-m-d H:i:s", strtotime($this->input->post('startDate')));	
		$endDate = date( "Y-m-d H:i:s", strtotime($this->input->post('endDate')));
		$topics = $this->input->post('topics');
		$phases = $this->input->post('phases');
		$meetings = $this->input->post('meetings');
		
		$this->event_model->update_event($idEvent, $startDate, $endDate, $username, $eventDescription, $eventName);
		

		$this->eventTopic_model->delete_eventTopic($idEvent);	//Remove previous associations
		if(isset($topics) && !empty($topics)) {
			foreach($topics as $t)
			{
				$this->eventTopic_model->create_eventTopic($idEvent, $t);
			}
		}
		
		$this->phase_model->delete_phase_by_event($idEvent);	//Remove previous associations
		if(isset($phases) && !empty($phases)) {
			foreach($phases  as $p)
			{ 
				$this->eventTopic_model->create_phase($p, $idEvent, $startDate, $endDate, $username);
			}
		}
		
		$this->meetingEvent_model->delete_meetingEvent_by_event($idEvent);	//Remove previous associations
		if(isset($meetings) && !empty($meetings)) {
			foreach($meetings as $m)
			{
				$this->meetingEvent_model->create_meetingEvent($idEvent, $m);
			}
		}
		
		$this->listEvents();
	}
}