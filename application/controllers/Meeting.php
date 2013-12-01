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
			
		$this->load->view('header');
		$this->load->view('meeting_page');		
	}
		
			
	
}