<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paper extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('paper_model');
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
			$this->load->view('home_page');
		}
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
			$this->load->view('home_page');
		}
	}
	
	public function submittedPapers()
	{
		$username = $this->session->userdata('idUser');
		if ($username) {
			$query['papers'] = $this->paper_model->get_paper_by_user($username);
			$this->load->view('header');
			$this->load->view('submitted_papers', $query);
		}
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to submit papers');
			$this->load->view('header', $errors);
			$this->load->view('home_page');
		}
	}

	public function search()
	{
		$this->load->view('header');
		$this->load->view('search_papers');
	}
    
    public function paperReview()
	{
		$this->load->model('reviewAssignment_model');
		
		$username = $this->session->userdata('idUser');
		
		$query['assignments'] = $this->reviewAssignment_model->get_reviewAssignment_by_assignedTo($username);
		$query['papers'] = $this->reviewAssignment_model->get_paper_assignedTo_user($username);
		
		if ($username) {
			$this->load->view('header');
			$this->load->view('paper_review', $query);
		}
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to review papers');
			$this->load->view('header', $errors);
			$this->load->view('home_page');
		}
	}
    
	public function submitReview()
	{
		$this->load->model('reviewAssignment_model');
		
		$username = $this->session->userdata('idUser');
		
		if ($username){
			$score = $this->input->post('score');
			$comment = $this->input->post('comment');
			$idPaper = $this->input->get('idPaper');
			
			$this->reviewAssignment_model->update_reviewAssignment($username, $idPaper, $comment, $score/10);
			$query['successMessages'][0] = "Your review has been saved successfully.";
			$query['assignments'] = $this->reviewAssignment_model->get_reviewAssignment_by_assignedTo($username);
			$query['papers'] = $this->reviewAssignment_model->get_paper_assignedTo_user($username);
			
			$this->load->view('header', $query);
			$this->load->view('paper_review');
		}
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to review papers');
			$this->load->view('header', $errors);
			$this->load->view('home_page');
		}
	}
	
   	public function detailedPaperReview()
	{
		$this->load->model('paper_model');
		$this->load->model('paperTopics_model');
		
		$username = $this->session->userdata('idUser');
		$idPaper = $this->input->get('idPaper');
		$query['paper'] = $this->paper_model->get_paper($idPaper);
		$query['topics'] = $this->paperTopics_model->get_topic_by_paper($idPaper);
		
		if ($username) {
			$this->load->view('header');
			$this->load->view('detailed_paper_review',$query);
		}
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to review papers');
			$this->load->view('header', $errors);
			$this->load->view('home_page');
		}
	}

	public function submitted()
	{
		$this->load->model('paperTopics_model');
		$this->load->model('paperAuthor_model');
		
		$errors['errorMessages'] = array();
		
		$username = $this->session->userdata('idUser');
		if ($username) {
			$idEvent = $this->input->post('idEvent');
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
			$this->load->view('home_page');
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