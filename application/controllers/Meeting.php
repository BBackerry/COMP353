<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meeting extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('meeting_model');
        $this->load->model('place_model');
	}
	public function viewMeetings()
    {
        $this->load->view('header');
        $param['place'] = $this->place_model->get_all_place();
        $this->load->view('meeting_page', $param);
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
	
	public function ViewAllMeetings()
	{
		$admin = $this->session->userdata('isAdmin');
		
		if($admin)
		{
		$param['meetings'] = $this->meeting_model->get_all_meeting();
		$this->load->view('header');
		$this->load->view('meetings_list', $param);
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
		$idMeeting = $this->input->get('idMeeting');
		
		$this->load->view('header');
		$this->load->view('edit_meeting');
	}
    
	public function submitedMeeting()
	{
		$createdBy = $this->session->userdata('idUser');
        if (isset($_POST['newPlace'])) {
            $placeName = $_POST['newPlaceName'];
            $this->place_model->create_place($placeName);
            $idPlace = mysql_insert_id();
        } else {
            $idPlace = $_POST['place'];
        }            
		$startTime = date( "Y-m-d H:i:s", strtotime($_POST['startTime']));	
		$endTime = date( "Y-m-d H:i:s", strtotime($_POST['endTime']));
					
		$this->meeting_model->create_meeting($idPlace, $createdBy, $startTime, $endTime);
        
        $param['successMessages'][0] = "The meeting has been successfully saved.";
        $param['startTime'] = $startTime;
        $param['endTime'] = $endTime;
        $param['createdBy'] = $createdBy;
        $place = $this->place_model->get_place($idPlace);
        foreach ($place as $p){
            $param['place'] = $p->placeName;
        }
        
		$this->load->view('header', $param);
		$this->load->view('meeting_page');		
	}
		
			
	
}