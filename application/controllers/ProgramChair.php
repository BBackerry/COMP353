<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProgramChair extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
        $this->load->model('event_model');
        $this->load->model('role_model');
        $this->load->model('paper_model');
        $this->load->model('paperTopics_model');
        $this->load->model('expertInTopic_model');
        $this->load->model('committeeBid_model');
        $this->load->model('reviewAssignment_model');
        $this->load->model('meeting_model');
        $this->load->model('news_model');
	}
    
	public function assignPaperSelectEvent()
    {   
        $username = $this->session->userdata('idUser');
		if ($username) {
            $username = $this->session->userdata('idUser');
            $roles = $this->role_model->get_role_of_user($username);
            $event = array();
            foreach($roles as $role){
                if($role->idPosition == 2){
                    $event[] = $role->idEvent;
                }
            }
            
            $eventName = array();
            foreach($event as $evt){
                $eventName[$evt] = $this->event_model->get_event_name($evt)[0]->eventName;
            }
            
            $param['events'] = $eventName;
            $this->load->view('header');
            $this->load->view('select_event_paper_assign', $param);
        }
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to assign papers to committee members');
			$this->load->view('header', $errors);
            $idEvent = $this->session->userdata('idEvent');
            if (!$idEvent) {
                $this->session->set_userdata('idEvent', 1);
                $this->load->model('event_model');
                $eventName = $this->event_model->get_event_name(1);
                $this->session->set_userdata('eventName', $eventName[0]->eventName);
            }
            
            $param['news'] = $this->news_model->get_all_news_for_event($idEvent);
            $param['meetings'] = $this->meeting_model->get_upcoming_meeting_for_event($idEvent);
			$this->load->view('home_page', $param);
		}
    }
    public function assignPaperSelectPaper()
    {   
        $username = $this->session->userdata('idUser');
		if ($username) {
            $username = $this->session->userdata('idUser');
            $idEvent = $this->input->get("idEvent");
            $param['idEvent'] = $idEvent;
            $param['papers'] = $this->paper_model->get_paper_by_event($idEvent);
           
            $this->load->view('header');
            $this->load->view('select_paper_paper_assign', $param);
        }
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to assign papers to committee members');
			$this->load->view('header', $errors);
            $idEvent = $this->session->userdata('idEvent');
            if (!$idEvent) {
                $this->session->set_userdata('idEvent', 1);
                $this->load->model('event_model');
                $eventName = $this->event_model->get_event_name(1);
                $this->session->set_userdata('eventName', $eventName[0]->eventName);
            }
            
            $param['news'] = $this->news_model->get_all_news_for_event($idEvent);
            $param['meetings'] = $this->meeting_model->get_upcoming_meeting_for_event($idEvent);
			$this->load->view('home_page', $param);
		}
    }
    public function assignPaperCommittee()
    {
        $username = $this->session->userdata('idUser');
		if ($username) {
            $idPaper = $this->input->get("idPaper");
            $idEvent = $this->input->get("idEvent");
            $roles = $this->role_model->get_role_by_event($idEvent);
            $committeeMember = array();
            $expert = array();
            $bid = array();
            foreach($roles as $role){
                if($role->idPosition == 3){
                    $committeeMember[$role->idUser] = $this->user_model->get_user($role->idUser)[0];
                    $expert[$role->idUser] = $this->expertInTopic_model->get_expertInTopic_of_user($role->idUser);
                    $bid[$role->idUser] = $this->committeeBid_model->get_committeeBid($role->idUser, $idPaper);
                }
            }
            $paper = $this->paper_model->get_paper($idPaper)[0];
            $paperTopics = $this->paperTopics_model-> get_paperTopics($idPaper);
            $reviewAssignment = $this->reviewAssignment_model->get_reviewAssignment_by_paper($idPaper);
            
            $param['committeeMembers'] = $committeeMember;
            $param['committeeExpertise'] = $expert;
            $param['committeeBid'] = $bid;
            $param['paper'] = $paper;
            $param['paperTopics'] = $paperTopics;
            $param['idEvent'] = $idEvent;
            $param['reviewAssignment'] = $reviewAssignment;
            
            $this->load->view('header');
            $this->load->view('select_committee_paper_assign', $param);
        }
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to assign papers to committee members');
			$this->load->view('header', $errors);
           $idEvent = $this->session->userdata('idEvent');
            if (!$idEvent) {
                $this->session->set_userdata('idEvent', 1);
                $this->load->model('event_model');
                $eventName = $this->event_model->get_event_name(1);
                $this->session->set_userdata('eventName', $eventName[0]->eventName);
            }
            
            $param['news'] = $this->news_model->get_all_news_for_event($idEvent);
            $param['meetings'] = $this->meeting_model->get_upcoming_meeting_for_event($idEvent);
			$this->load->view('home_page', $param);
		}
    }
    public function createReviewAssignment()
    {
        $username = $this->session->userdata('idUser');
		if ($username) {
            $idPaper = $this->input->get("idPaper");
            $idAssignedTo = $this->input->get("idAssignedTo");
            $idAssignedBy = $this->session->userdata('idUser');
            
            $this->reviewAssignment_model->create_reviewAssignment($idAssignedBy, $idAssignedTo, $idPaper);
            
            $param['successMessages'][0] = "The committee member was successfully assigned to review this paper";
             
            $idEvent = $this->input->get("idEvent");
            $roles = $this->role_model->get_role_by_event($idEvent);
            $committeeMember = array();
            $expert = array();
            $bid = array();
            foreach($roles as $role){
                if($role->idPosition == 3){
                    $committeeMember[$role->idUser] = $this->user_model->get_user($role->idUser)[0];
                    $expert[$role->idUser] = $this->expertInTopic_model->get_expertInTopic_of_user($role->idUser);
                    $bid[$role->idUser] = $this->committeeBid_model->get_committeeBid($role->idUser, $idPaper);
                }
            }
            $paper = $this->paper_model->get_paper($idPaper)[0];
            $paperTopics = $this->paperTopics_model-> get_paperTopics($idPaper);
            $reviewAssignment = $this->reviewAssignment_model->get_reviewAssignment_by_paper($idPaper);
             
            $param['committeeMembers'] = $committeeMember;
            $param['committeeExpertise'] = $expert;
            $param['committeeBid'] = $bid;
            $param['paper'] = $paper;
            $param['paperTopics'] = $paperTopics;
            $param['idEvent'] = $idEvent;
            $param['reviewAssignment'] = $reviewAssignment;
             
            $this->load->view('header', $param);
            $this->load->view('select_committee_paper_assign', $param);
        }
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to assign papers to committee members');
			$this->load->view('header', $errors);
            $idEvent = $this->session->userdata('idEvent');
            if (!$idEvent) {
                $this->session->set_userdata('idEvent', 1);
                $this->load->model('event_model');
                $eventName = $this->event_model->get_event_name(1);
                $this->session->set_userdata('eventName', $eventName[0]->eventName);
            }
            
            $param['news'] = $this->news_model->get_all_news_for_event($idEvent);
            $param['meetings'] = $this->meeting_model->get_upcoming_meeting_for_event($idEvent);
			$this->load->view('home_page', $param);
		}
        
    }
    public function deleteReviewAssignment()
    {
        $username = $this->session->userdata('idUser');
		if ($username) {
            $idPaper = $this->input->get("idPaper");
            $idAssignedTo = $this->input->get("idAssignedTo");
            $idAssignedBy = $this->session->userdata('idUser');
            
            $this->reviewAssignment_model->delete_reviewAssignment($idAssignedTo, $idPaper);
            
            $param['successMessages'][0] = "The committee member was successfully un-assigned the task to review this paper.";
             
            $idEvent = $this->input->get("idEvent");
            $roles = $this->role_model->get_role_by_event($idEvent);
            $committeeMember = array();
            $expert = array();
            $bid = array();
            foreach($roles as $role){
                if($role->idPosition == 3){
                    $committeeMember[$role->idUser] = $this->user_model->get_user($role->idUser)[0];
                    $expert[$role->idUser] = $this->expertInTopic_model->get_expertInTopic_of_user($role->idUser);
                    $bid[$role->idUser] = $this->committeeBid_model->get_committeeBid($role->idUser, $idPaper);
                }
            }
            $paper = $this->paper_model->get_paper($idPaper)[0];
            $paperTopics = $this->paperTopics_model-> get_paperTopics($idPaper);
            $reviewAssignment = $this->reviewAssignment_model->get_reviewAssignment_by_paper($idPaper);
             
            $param['committeeMembers'] = $committeeMember;
            $param['committeeExpertise'] = $expert;
            $param['committeeBid'] = $bid;
            $param['paper'] = $paper;
            $param['paperTopics'] = $paperTopics;
            $param['idEvent'] = $idEvent;
            $param['reviewAssignment'] = $reviewAssignment;
             
            $this->load->view('header', $param);
            $this->load->view('select_committee_paper_assign', $param);
        }
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to assign papers to committee members');
			$this->load->view('header', $errors);
            $idEvent = $this->session->userdata('idEvent');
            if (!$idEvent) {
                $this->session->set_userdata('idEvent', 1);
                $this->load->model('event_model');
                $eventName = $this->event_model->get_event_name(1);
                $this->session->set_userdata('eventName', $eventName[0]->eventName);
            }
            
            $param['news'] = $this->news_model->get_all_news_for_event($idEvent);
            $param['meetings'] = $this->meeting_model->get_upcoming_meeting_for_event($idEvent);
			$this->load->view('home_page', $param);
		}
        
    }
}