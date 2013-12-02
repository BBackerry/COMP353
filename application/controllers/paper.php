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
		
		$query['events'] = $this->event_model->get_all_event();
		$query['users'] = $this->user_model->get_all_users();
		
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
		
		$query['events'] = $this->event_model->get_all_event();
		$query['users'] = $this->user_model->get_all_users();
		
		$username = $this->session->userdata('idUser');
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
		$this->load->view('header');
		$this->load->view('paper_review');
	}
    
   	public function detailedPaperReview()
	{
		$this->load->view('header');
		$this->load->view('detailed_paper_review');
	}

	public function submitted()
	{
		$this->load->model('paperTopics_model');
		$this->load->model('paperAuthor_model');
		
		$errors['errorMessages'] = array();
		
		$username = $this->session->userdata('idUser');
		if ($username) {
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
				$create_paper_check = $this->paper_model->create_paper($title, $abstract, $submittedby, mysql_real_escape_string(file_get_contents($file["tmp_name"])), $keywords);
				if($create_paper_check) {
					$idpaper = mysql_insert_id();
					for ($j = 0; $j < count($subjects); $j++) {
						$this->paperTopics_model->create_paperTopics($idpaper, $subjects[$j]);
					}
					
					for ($k = 0; $k < count($authors); $k++) {
						$this->paperAuthor_model->create_paperAuthor($idpaper, $authors[$k]);
					}
					
					$this->load->view('header');
					$this->load->view('paper_submitted_successfully');
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

	public function getSearchDetails()
	{
		$event = $this->input->get('event');
		$author = $this->input->get('author');
		$keywords = $this->input->get('keywords');
		$title = $this->input->get('title');
	}	

}