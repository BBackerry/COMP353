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
        	$this->load->model('topicHierarchy_model');
		$this->load->model('phase_model');
		$this->load->model('phaseType_model');
       		$this->load->helper('hierarchy_helper');
		$this->load->model('paper_model');
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
	
	public function eventPapers()
	{
		$idEvent = $this->input->get('idEvent');
		$param['papers'] = $this->paper_model->get_paper_by_event($idEvent);
		$param['event'] = $this->event_model->get_event($idEvent)[0];
		
		$this->load->view('header');
		$this->load->view('event_papers', $param);
	}
	
	public function addEvent()
	{
		$admin = $this->session->userdata('isAdmin');
		$param['meeting']= $this->meeting_model->get_all_meeting();
		$param['phaseType']= $this->phaseType_model->get_all_phaseType();   
		
		if ($admin)
		{
	            $param['topic'] = $this->topic_model->get_all_topic();
	            $topicParents = $this->topicHierarchy_model->get_all_topicHierarchy();
	            $hierarchy = array();
	            foreach($topicParents as $parent){
	                array_push($hierarchy, array('idTopic' => $parent->idTopic, 'idTopicHierarchy' =>$parent->idTopicHierarchy));
	            }
            
	            $tree = array();
	            foreach($param['topic'] as $topic){
	                if(isParent($topic->idTopic, $topicParents)){
	                    array_push($tree, constructHierarchy($hierarchy, $topic->idTopic));
	                }
	            }
	            $param['hierarchy'] = "";
	            foreach($tree as $parent){
	               $param['hierarchy'] .= displayTree($parent, $topicParents);
	            }
        
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
	
	public function viewEvent()
	{
		$idEvent = $this->input->get('idEvent');
		$param['event'] = $this->event_model->get_event($idEvent)[0];
		$param['meetingDetail']= $this->meetingEvent_model->get_meetingEvent($idEvent);
		$param['EventTopicDetail']= $this->eventTopic_model->get_eventTopic($idEvent);
		$param['phaseDetail']= $this->phase_model->get_all_phase_for_event($idEvent);
		$param['phaseTypeDetail']= $this->phaseType_model->get_all_phaseType();
		
		$meetings = array();
		foreach($param['meetingDetail'] as $row) {
			$meeting = $this->meeting_model->get_meeting($row->idMeeting);
			array_push($meetings, $meeting[0]);
		}
		$param['meetings'] = $meetings;
		
		$topics = array();
		foreach($param['EventTopicDetail'] as $row) {
			$topic = $this->topic_model->get_topic($row->idTopic);
			array_push($topics, $topic[0]);
		}
		$param['topics'] = $topics;

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
		$idPhase = $this->phaseType_model->get_all_phaseType();	
		
		$this->event_model->create_event($startDate, $endDate, $username, $eventDescription, $eventName);
		$idEvent = mysql_insert_id();
				
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
			$startDate = date( "Y-m-d H:i:s", strtotime($this->input->get($p->idPhase."PhaseStart")));	
		        $endDate = date( "Y-m-d H:i:s", strtotime($this->input->get($p->idPhase."PhaseEnd")));	
		        //$this->phase_model->create_phase(1, $idEvent, $firstStartDate, $firstEndDate);
			$this->phase_model->create_phase($p->idPhase, $idEvent, $startDate, $endDate, $username);
		}
		
        
		$param['event'] = $this->event_model->get_event($idEvent)[0];
		$param['meetingDetail']= $this->meetingEvent_model->get_meetingEvent($idEvent);
		$param['EventTopicDetail']= $this->eventTopic_model->get_eventTopic($idEvent);
		$param['phaseDetail']= $this->phase_model->get_all_phase_for_event($idEvent);
		$param['phaseTypeDetail']= $this->phaseType_model->get_all_phaseType();
		
		$meetings = array();
		foreach($param['meetingDetail'] as $row) {
			$meeting = $this->meeting_model->get_meeting($row->idMeeting);
			array_push($meetings, $meeting[0]);
		}
		$param['meetings'] = $meetings;
		
		$topics = array();
		foreach($param['EventTopicDetail'] as $row) {
			$topic = $this->topic_model->get_topic($row->idTopic);
			array_push($topics, $topic[0]);
		}
		$param['topics'] = $topics;
        
		$this->load->view('header');
		$this->load->view('event_page', $param);
	}
	
	public function editEvent()
	{
	        $param['topic'] = $this->topic_model->get_all_topic();
	        $topicParents = $this->topicHierarchy_model->get_all_topicHierarchy();
	        $hierarchy = array();
	        foreach($topicParents as $parent){
	            array_push($hierarchy, array('idTopic' => $parent->idTopic, 'idTopicHierarchy' =>$parent->idTopicHierarchy));
	        }
        
	        $tree = array();
	        foreach($param['topic'] as $topic){
	            if(isParent($topic->idTopic, $topicParents)){
	                array_push($tree, constructHierarchy($hierarchy, $topic->idTopic));
	            }
	        }
	        $param['hierarchy'] = "";
	        foreach($tree as $parent){
	           $param['hierarchy'] .= displayTree($parent, $topicParents);
	        }
		$idEvent = $this->input->get('idEvent');
       		$param['eventTopic'] = $this->eventTopic_model->get_eventTopic($idEvent);
		$param['event'] = $this->event_model->get_event($idEvent)[0];
		$param['meetings']= $this->meeting_model->get_all_meeting();
		$param['phases']= $this->phaseType_model->get_all_phaseType();
		$this->load->view('header');
		$this->load->view('event_edit', $param);
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