<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meeting extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('meeting_model');
        $this->load->model('place_model');
	}
	
	public function createMeeting()
	{
        if($this->session->userdata('isAdmin')){
            $this->load->view('header');
            $param['place'] = $this->place_model->get_all_place();
            $this->load->view('add_new_meeting', $param);
        }
		else 
		{
			$errors['errorMessages'] = array("Sorry but you are no allowed to create meetings");
			$this->load->view('header', $errors);
			$this->load->view('home_page');
		}
	}
	
	public function viewMeetings($message = null)
	{
		$admin = $this->session->userdata('isAdmin');
		if($admin)
		{
			$data['meetings'] = $this->meeting_model->get_all_meeting();
			$this->load->view('header', $message);
			$this->load->view('meetings_list', $data);
		}		
		else 
		{
			$errors['errorMessages'] = array('Sorry you are not allowed to edit a meeting');
			$this->load->view('header', $errors);
			$this->load->view('home_page');
		}
	}
	
	public function editMeeting()
	{
		$data['meeting'] = $this->meeting_model->get_meeting($this->input->get('idMeeting'))[0];
		$data['places'] = $this->place_model->get_all_place();
		$this->load->view('header');
		$this->load->view('edit_meeting', $data);
	}
	
	public function updateMeeting()
	{
		$createdBy = $this->session->userdata('idUser');
		
		$meeting = $this->meeting_model->get_meeting($this->input->post('idMeeting'))[0];
        if ($this->input->post('newLocation')) {
            $this->place_model->create_place($this->input->post('newLocation'));
            $idPlace = mysql_insert_id();
        } else {
            $idPlace = $this->input->post('place');
        }
		$startTime = date( "Y-m-d H:i:s", strtotime($this->input->post('startTime')));	
		$endTime = date( "Y-m-d H:i:s", strtotime($this->input->post('endTime')));
		
		if($this->meeting_model->update_meeting($meeting->idMeeting, $idPlace, $createdBy, $startTime, $endTime)) {
			$success['sucessMessages'] = array('Meeting successfully updated');
			$this->viewMeetings($success);
		}
		else {
			$errors['errorMessages'] = array('Meeting update failed. Please try again');
			$this->viewMeetings($errors);
		}
	}
    
	public function submitMeeting()
	{
		$createdBy = $this->session->userdata('idUser');
        if ($this->input->post('newLocation')) {
            $this->place_model->create_place($this->input->post('newLocation'));
            $idPlace = mysql_insert_id();
        } else {
            $idPlace = $this->input->post('place');
        }            
		$startTime = date( "Y-m-d H:i:s", strtotime($this->input->post('startTime')));	
		$endTime = date( "Y-m-d H:i:s", strtotime($this->input->post('endTime')));
					
		if ($this->meeting_model->create_meeting($idPlace, $createdBy, $startTime, $endTime)) {
			$success['successMessages'] = array('Meeting successfully created');
			$this->viewMeetings($success);
        }
		else {
			$errors['errorMessages'] = array('Sorry but something went wrong. Please try again');
			$this->viewMeetings($errors);
		}	
	}
		
			
	
}