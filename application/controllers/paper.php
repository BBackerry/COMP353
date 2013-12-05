<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paper extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('paper_model');
		$this->load->model('paperDecision_model');
	        $this->load->model('news_model');
	        $this->load->model('meeting_model');
	}
	public function submitPaper($eventId)
	{	
		$this->load->model('event_model');
		$this->load->model('user_model');
		$this->load->model('phase_model');
		
		$query['events'] = $this->event_model->get_all_event();
		$query['users'] = $this->user_model->get_all_users();
		$query['phases'] = $this->phase_model->get_all_phase();
		
		if($eventId != 0){
			$this->load->model('eventTopic_model');
			$this->load->model('topic_model');
			
			$query['eventTopic'] = $this->eventTopic_model->get_eventTopic($eventId);
			$query['topics'] = $this->topic_model->get_all_topic();
			$query['eventId'] = $eventId;
			$event = $this->event_model->get_event($eventId);
			$query['eventName'] = $event[0]->eventName;
		}
		
		$username = $this->session->userdata('idUser');
		$query['username'] = $username;
		if ($username) {
			$this->load->view('header');
			$this->load->view('submit_new_paper', $query);
		}
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to submit papers');
			$this->load->view('header', $errors);
			$param['news'] = $this->news_model->get_all_news();
		        $param['meetings'] = $this->meeting_model->get_upcoming_meeting();
			$this->load->view('home_page', $param);
		}
	}
	
	public function listAcceptedPaper()
	{
		
			$param['allPapers'] = $this->paper_model->get_all_paper();
			
			$acceptedPapers = array();
			foreach($param['allPapers'] as $row)
			{
				$acceptedPaper = $this->paperDecision_model->get_paperDecision($row);
				if($acceptedPaper == 1)
				{
					array_push($acceptedPapers, $acceptedPaper[0]);
				}
			}
			$param['papers'] = $acceptedPapers;
			
				$this->load->view('header');
				$this->load->view('acceptedPaper_list', $param);
		
		
	}
	
	public function submit()
	{
		$this->load->model('event_model');
		$this->load->model('user_model');
		$this->load->model('phase_model');
		
		$query['events'] = $this->event_model->get_all_event();
		$query['users'] = $this->user_model->get_all_users();
		$query['phases'] = $this->phase_model->get_all_phase();
		
		$username = $this->session->userdata('idUser');
		$query['username'] = $username;
		if ($username) {
			$this->load->view('header');
			$this->load->view('submit_new_paper', $query);
		}
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to submit papers');
			$this->load->view('header', $errors);
			$param['news'] = $this->news_model->get_all_news();
		        $param['meetings'] = $this->meeting_model->get_upcoming_meeting();
			$this->load->view('home_page', $param);
		}
	}
	
	public function submittedPapers()
	{
		$username = $this->session->userdata('idUser');
		if ($username) {
			$this->load->model('event_model');
			$this->load->model('paperDecision_model');
			$this->load->model('reviewAssignment_model');
			
			$papers = $this->paper_model->get_paper_by_user_no_blob($username);
			
			for($i = 0; $i < count($papers); ++$i) {
				$data['papers'][$i]['paper'] = $papers[$i];
				$data['papers'][$i]['event'] = $this->event_model->get_event_name($papers[$i]->idEvent)[0]->eventName;
				$paper_decided = $this->paperDecision_model->get_paperDecision($papers[$i]->idPaper);
				if (isset($paper_decided) && !empty($paper_decided)) {
					$data['papers'][$i]['reviews'] = $this->reviewAssignment_model->get_reviewAssignment_by_paper($papers[$i]->idPaper);
				}
				$data['papers'][$i]['decision'] = $this->paperDecision_model->get_paperDecision($papers[$i]->idPaper);
			}

			$this->load->view('header');
			$this->load->view('papers_submitted', isset($data) ? $data : null);
		}
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to view papers');
			$this->load->view('header', $errors);
			$param['meetings'] = $this->meeting_model->get_upcoming_meeting();
			$this->load->view('home_page', $param);
		}
	}
	
	public function publishedPapers()
	{
		$this->load->model('paperDecision_model');
		$this->load->model('paper_model');
		
		$publishedPaperDecisions = $this->paperDecision_model->get_published_paperDecision();
		$data['papers'] = array();
		foreach($publishedPaperDecisions as $publishedPaperDecision) {
			array_push($data['papers'], $this->paper_model->get_paper_no_blob($publishedPaperDecision->idPaper)[0]);
		}
		
		$this->load->view('header');
		$this->load->view('papers_published', $data);
	}
	
	public function paperDecision($message = null)
	{
		$this->load->model('role_model');
		$this->load->model('event_model');
		$this->load->model('paper_model');
		$this->load->model('paperDecision_model');
		
		$CMRoles = $this->role_model->get_role_by_position_and_user(2, $this->session->userdata('idUser'));
		for($i = 0; $i < count($CMRoles); ++$i) {
			$data['map'][$i]['event'] = $this->event_model->get_event($CMRoles[$i]->idEvent)[0];
			$data['map'][$i]['papers'] = $this->paper_model->get_paper_by_event_no_blob($CMRoles[$i]->idEvent);
			for($j = 0; $j < count($data['map'][$i]['papers']); ++$j) {
				$data['map'][$i]['papers'][$j]->decision = $this->paperDecision_model->get_paperDecision($data['map'][$i]['papers'][$j]->idPaper);
			}
		}
		
		$this->load->view('header', $message);
		$this->load->view('paper_decision', $data);
	}

	public function bidForPaper()
	{
		if($this->session->userdata('isCommitteeMember')) {
			$this->load->model('phase_model');
			$this->load->model('event_model');
			$this->load->model('paperTopics_model');
			
			$idPaper = $this->input->get('idPaper');
			$papers = $this->paper_model->get_paper($idPaper);
			$query['paper'] = $papers;
			$query['topics'] = $this->paperTopics_model->get_topic_by_paper($idPaper);
			
			$events = array();
			$bidPhases = array();
			foreach($query['paper'] as $paper):
				$event = $this->event_model->get_event($paper->idEvent);
				array_push($events, $event[0]);
				$phase = $this->phase_model->get_phase(2, $paper->idEvent);
				array_push($bidPhases, $phase[0]);
			endforeach;
			$query['event'] = $events[0];
			$query['bidPhase'] = $bidPhases[0];
			
			$this->load->view('header');
			$this->load->view('paper_bid', $query);
		}
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in as a committee member to bid on papers');
			$this->load->view('header', $errors);
			$this->load->view('home_page');
		}
	
	}
	
	public function submitBid()
	{	
		if($this->session->userdata('isCommitteeMember')) {
			
			$this->load->model('event_model');
			$this->load->model('paper_model');
			$this->load->model('phase_model');
			$this->load->model('committeeBid_model');
		
			$username = $this->session->userdata('idUser');
			$idPaper = $this->input->get('idPaper');
			$newBid = $this->input->post('bid');
			$paperBidOn = $this->paper_model->get_paper($idPaper)[0];
			$idEvent = $paperBidOn->idEvent;
			$papers = $this->paper_model->get_paper_by_event($idEvent);
			$param['event'] = $this->event_model->get_event($idEvent)[0];
			$param['reviewPhase'] = $this->phase_model->get_phase(4, $idEvent)[0];
			$bidPhases = $this->phase_model->get_phase(2, $idEvent);
			foreach($bidPhases as $b)
			{
				$param['bidPhase'] = $b;
			}
			
			$this->committeeBid_model->create_committeeBid($username, $paperBidOn->idPaper, $newBid);
			$param['successMessages'][0] = "Your bid has been saved successfully.";
			
			for($i = 0; $i < count($papers); ++$i) {
			$param['papers'][$i]['paper'] = $papers[$i];
			$bids = $this->committeeBid_model->get_committeeBid($username, $papers[$i]->idPaper);
			for($j = 0; $j < count($bids); ++$j){
				$param['papers'][$i]['bid'] = $bids[$j];
			}
		}

			
			$this->load->view('header', $param);
			$this->load->view('event_papers', $param);
		}
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in as a committee member to bid on papers');
			$this->load->view('header', $errors);
			$this->load->view('home_page');
		}
	}
	
	public function updateDecision()
	{
		$decision = $this->input->post();
		$this->load->model('paperDecision_model');
		$decision_for_paper = $this->paperDecision_model->get_paperDecision_by_paper_and_user($decision['idPaper'], $this->session->userdata('idUser'));
		if(!empty($decision_for_paper)) {
			if($this->paperDecision_model->update_paperDecision_by_paper_and_user($decision['idPaper'], $decision['decision'], $this->session->userdata('idUser'), $decision['reason'])) {
				$message['successMessages'] = array('Paper Decision updated successfully');
			}
			else {
				$message['errorMessages'] = array('Something went wrong while updating paper decision. Please try again');
			}
		}
		else {
			if($this->paperDecision_model->create_paperDecision($decision['idPaper'], $decision['decision'], $this->session->userdata('idUser'), $decision['reason'])) {
				$message['successMessages'] = array('Paper Decision created successfully');
			}
			else {
				$message['errorMessages'] = array('Something went wrong while deciding on this paper. Please try again');
			}
		}
		
		$this->paperDecision($message);
	}

	public function search()
	{
		$this->load->view('header');
		$this->load->view('search_papers');
	}
    
    public function paperReview()
	{
		$this->load->model('reviewAssignment_model');
		$this->load->model('phase_model');
		
		$username = $this->session->userdata('idUser');
		
		$query['assignments'] = $this->reviewAssignment_model->get_reviewAssignment_by_assignedTo($username);
		$query['papers'] = $this->reviewAssignment_model->get_paper_assignedTo_user($username);
		
		
		$phases = array();
		foreach($query['papers'] as $paper):
			$phase = $this->phase_model->get_phase(4, $paper->idEvent);
			array_push($phases, $phase[0]);
		endforeach;
		
		$query['phases'] = $phases;
		
		if($this->session->userdata('isCommitteeMember')) {
			$this->load->view('header');
			$this->load->view('paper_review', $query);
		}
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in as a committee member to review papers');
			$this->load->view('header', $errors);
		        $param['news'] = $this->news_model->get_all_news();
		        $param['meetings'] = $this->meeting_model->get_upcoming_meeting();
			$this->load->view('home_page', $param);
		}
	}
    
	public function paperScores()
	{
		$this->load->model('reviewAssignment_model');
		$this->load->model('phase_model');
		$this->load->model('event_model');
		$this->load->model('paperTopics_model');
		
		$username = $this->session->userdata('idUser');
		
		$idPaper = $this->input->get('idPaper');
		$query['assignments'] = $this->reviewAssignment_model->get_reviewAssignment_by_paper($idPaper);
		$query['topics'] = $this->paperTopics_model->get_topic_by_paper($idPaper);
		$query['paper'] = $this->paper_model->get_paper($idPaper)[0];
		$query['event'] = $this->event_model->get_event($query['paper']->idEvent)[0];
		$query['papers'] = $this->paper_model->get_paper_by_event($query['paper']->idEvent);
		$query['reviewPhase'] = $this->phase_model->get_phase(4, $query['paper']->idEvent)[0];
		if(strtotime($query['reviewPhase']->endTime) < strtotime(date("Y-m-d H:i:s"))){
			if ($username){
				$this->load->view('header');
				$this->load->view('paper_scores', $query);
			}
			else {
				$errors['errorMessages'] = array('Sorry but you have to be logged in as a committee member to review papers');
				$this->load->view('header', $errors);
		                $param['news'] = $this->news_model->get_all_news();
		                $param['meetings'] = $this->meeting_model->get_upcoming_meeting();
				$this->load->view('home_page', $param);
			}
		}
		else {
				$errors['errorMessages'] = array('The review phase for this event has not ended. You can only see scores after it ends.');
				$this->load->view('header', $errors);
				$this->load->view('event_papers', $query);
		}
		 
	}

	public function submitReview()
	{
		$this->load->model('reviewAssignment_model');
		$this->load->model('phase_model');
		
		$username = $this->session->userdata('idUser');
		
		if ($this->session->userdata('isCommitteeMember')){
			$score = $this->input->post('score');
			$comment = $this->input->post('comment');
			$idPaper = $this->input->get('idPaper');
			
			$this->reviewAssignment_model->update_reviewAssignment($username, $idPaper, $comment, $score);
			$query['successMessages'][0] = "Your review has been saved successfully.";
			$query['assignments'] = $this->reviewAssignment_model->get_reviewAssignment_by_assignedTo($username);
			$query['papers'] = $this->reviewAssignment_model->get_paper_assignedTo_user($username);
			$phases = array();
		
			foreach($query['papers'] as $paper):
				$phase = $this->phase_model->get_phase(4, $paper->idEvent);
				array_push($phases, $phase[0]);
			endforeach;
		
			$query['phases'] = $phases;
			
			$this->load->view('header', $query);
			$this->load->view('paper_review');
		}
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in as a committee member to review papers');
			$this->load->view('header', $errors);
	                $param['news'] = $this->news_model->get_all_news();
	                $param['meetings'] = $this->meeting_model->get_upcoming_meeting();
			$this->load->view('home_page', $param);
		}
	}
	
   	public function detailedPaperReview()
	{
		$this->load->model('paper_model');
		$this->load->model('paperTopics_model');
		$this->load->model('event_model');
		$this->load->model('phase_model');
		
		$username = $this->session->userdata('idUser');
		$idPaper = $this->input->get('idPaper');
		$query['paper'] = $this->paper_model->get_paper($idPaper);
		$query['topics'] = $this->paperTopics_model->get_topic_by_paper($idPaper);
		$events = array();
		$phases = array();
		
		foreach($query['paper'] as $paper):
			$event = $this->event_model->get_event($paper->idEvent);
			array_push($events, $event[0]);
			$phase = $this->phase_model->get_phase(4, $paper->idEvent);
			array_push($phases, $phase[0]);
		endforeach;
		
		$query['events'] = $events;
		$query['phases'] = $phases;
		
		if ($this->session->userdata('isCommitteeMember')){
			$this->load->view('header');
			$this->load->view('detailed_paper_review',$query);
		}
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in as a committee member to review papers');
			$this->load->view('header', $errors);
	                $param['news'] = $this->news_model->get_all_news();
	                $param['meetings'] = $this->meeting_model->get_upcoming_meeting();
			$this->load->view('home_page', $param);
		}
	}

	public function submitted()
	{
		$this->load->model('paperTopics_model');
		$this->load->model('paperAuthor_model');
		$this->load->model('event_model');
		
		$errors['errorMessages'] = array();
		
		$username = $this->session->userdata('idUser');
		if ($username) {
			$idEvent = $this->input->post('idEvent');
			$query['events'] = $this->event_model->get_event($idEvent);
			$title = $this->input->post('title');
			$abstract = $this->input->post('abstract');
			$keywords = $this->input->post('keywords');
			$subjects = $this->input->post('subjects');
			$authors = $this->input->post('coauthors');
			$submittedby = $username;
			
			//FILE UPLOAD
			if (!empty($_FILES['file'])) {
				$file = $_FILES['file'];
				if ($file['error'] != UPLOAD_ERR_OK) {
					$error = 'File upload failed. Please try again.';
					$errors['errorMessages'] = array_push($errors['errorMessages'], $error);
				}
				
				$name = preg_replace('/[^A-Z0-9._-]/i', '_', $file['name']);
				
				$fulldir = explode('\\', __DIR__);
				$upload_dir = $fulldir[0].'\\'.$fulldir[1].'\\'.$fulldir[2].'\\'.$fulldir[3].'\\'.'papers/';
				$i = 0;
				$parts = pathinfo($name);
				while (file_exists($upload_dir . $name)) {
					$i++;
					$name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
				}
			}
			
			if (empty($errors['errorMessages'])) {
				$create_paper_check = $this->paper_model->create_paper($title, $abstract, $submittedby, addslashes(file_get_contents($file["tmp_name"])), $keywords, $idEvent);
				if($create_paper_check) {
					$idpaper = mysql_insert_id();
					for ($j = 0; $j < count($subjects); $j++) {
						$this->paperTopics_model->create_paperTopics($idpaper, $subjects[$j]);
					}
					
					for ($k = 0; $k < count($authors); $k++) {
						if($authors[$k] == NULL) break;
						$this->paperAuthor_model->create_paperAuthor($idpaper, $authors[$k]);
					}
					
					$query['papers'] = $this->paper_model->get_paper_by_user($username);
					$query['successMessages'][0] = "Your paper has been submitted successfully.";
					
					$this->load->view('header', $query);
					$this->load->view('submitted_papers', $query);
				}
				else {
					$error = 'Your paper could not be created. Please try again.';
					$errors['errorMessages'] = array_push($errors['errorMessages'], $error);
				}
			}
			else {
				$this->load->view('header', $errors);
				$this->load->view('submitted_papers');
			}
			
		}
		else {
			$error = 'Sorry but you have to be logged in to submit papers';
			$errors['errorMessages'] = array_push($errors['errorMessages'], $error);
			$this->load->view('header', $errors);
		        $param['news'] = $this->news_model->get_all_news();
		        $param['meetings'] = $this->meeting_model->get_upcoming_meeting();
			$this->load->view('home_page', $param);
		}
	}
	
	public function viewPaper()
	{
		$idEvent = $this->input->get('idPaper');
		$this->load->model('paper_model');
		$paper = $this->paper_model->get_paper($idEvent)[0];
		$blob = $paper->document;
		$data = array('paperData' => $blob);
		$this->load->view('view_paper', $data);
	}

	public function getSearchDetails()
	{
		$event = $this->input->get('event');
		$author = $this->input->get('author');
		$keywords = $this->input->get('keywords');
		$title = $this->input->get('title');
	}	

}