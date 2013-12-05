<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
        $this->load->model('country_model');
        $this->load->model('department_model');
        $this->load->model('organization_model');
        $this->load->model('topic_model');
        $this->load->model('topicHierarchy_model');
        $this->load->model('interestInTopic_model');
        $this->load->model('expertInTopic_model');
        $this->load->helper('hierarchy_helper' );
        $this->load->model('meeting_model');
        $this->load->model('news_model');
	}
    
	public function manageUsers()
    {    
        $username = $this->session->userdata('idUser');
		if ($username) {
            $this->load->view('header');
            $param['users'] = $this->user_model->get_all_users();
            $this->load->view('manage_user', $param);
        }else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to manage users');
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
    
    public function editUser()
    {
        $username = $this->session->userdata('idUser');
		if ($username) {
            $this->load->view('header');
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

            
            $UserID = $this->input->get("id");
            
            $param['interest'] = $this->interestInTopic_model->get_interestInTopic_of_user($UserID);
            $param['expert'] = $this->expertInTopic_model->get_expertInTopic_of_user($UserID);
            $param['user'] = $this->user_model->get_user($UserID)[0];
            $param['country'] = $this->country_model->get_all_country();
            $param['department'] = $this->department_model->get_all_department();
            $param['organization'] = $this->organization_model->get_all_organization();
            $this->load->view('edit_user', $param);
        }else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to edit users');
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
   
    public function updateUser()
    {
        $username = $this->session->userdata('idUser');
		if ($username) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $country = $_POST['country'];
            $organization = $_POST['organization'];
            $department = $_POST['department'];
            $interests = $_POST['interest'];
            $experts = $_POST['expert'];
            

            $oldInterests =  $this->interestInTopic_model->get_interestInTopic_of_user($username);
            $oldExperts = $this->expertInTopic_model->get_expertInTopic_of_user($username);
            
            $this->user_model->update_user($username, $password, $firstname, $lastname, $email, $country, $organization, $department);
            
            foreach($oldExperts as $oldE){
                $delete = true;
                foreach($experts as $key => $e){
                    if($e == $oldE->idTopic){
                        $delete = false;
                        unset($experts[$key]);
                    }
                }
                if($delete){
                    $this->expertInTopic_model->delete_expertInTopic($username, $oldE->idTopic);
                }
            }
            foreach($oldInterests as $oldI){
                $delete = true;
                foreach($interests as $key => $i){
                    if($i == $oldI->idTopic){
                        $delete = false;
                        unset($interests[$key]);
                    }
                }
                if($delete){
                    $this->interestInTopic_model->delete_interestInTopic($username, $oldI->idTopic);
                }
            }
            
            foreach($interests as $i){
                $this->interestInTopic_model->create_interestInTopic($username, $i);
            }
            
            foreach($experts as $e){
                $this->expertInTopic_model->create_expertInTopic($username, $e);
            }
            
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
            $param['interest'] = $this->interestInTopic_model->get_interestInTopic_of_user($username);
            $param['expert'] = $this->expertInTopic_model->get_expertInTopic_of_user($username);
            $param['successMessages'][0] = "The user has been successfully updated.";
            $this->load->view('header', $param);
            $param['users'] = $this->user_model->get_user($username);
            $param['country'] = $this->country_model->get_all_country();
            $param['department'] = $this->department_model->get_all_department();
            $param['organization'] = $this->organization_model->get_all_organization();
            $this->load->view('edit_user', $param);	
        }else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to manage users');
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
	
    public function manageTopic()
    {
        $username = $this->session->userdata('idUser');
		if ($username) {
            $param['topic'] = $this->topic_model->get_all_topic();
            $param['hierarchy'] = $this->topicHierarchy_model->get_all_topicHierarchy();
            $this->load->view('header');
            $this->load->view('edit_topic', $param);	
        }else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to update users');
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
    
    public function createTopic()
    {
        $username = $this->session->userdata('idUser');
		if ($username) {
            $topicName = $_POST['topicName'];
            $topicParent = $_POST['topicParent'];
            
            if($topicParent == 0) $topicParent = NULL;
            
            $this->topic_model->create_topic($topicName);
            $idTopic = mysql_insert_id();
            $this->topicHierarchy_model->create_topicHierarchy($idTopic, $topicParent);
        
            $param['successMessages'][0] = "The topic has been successfully saved.";
            $param['topic'] = $this->topic_model->get_all_topic();
            $param['hierarchy'] = $this->topicHierarchy_model->get_all_topicHierarchy();
            $this->load->view('header',$param);
            $this->load->view('edit_topic', $param);	
        }else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to create topics');
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
    public function updateTopic()
    {
        $username = $this->session->userdata('idUser');
		if ($username) {
        
            $param['topic'] = $this->topic_model->get_all_topic();
            $param['hierarchy'] = $this->topicHierarchy_model->get_all_topicHierarchy();
            
            foreach( $param['topic'] as $topic){
                $topicName = $_POST[$topic->idTopic];
                $topicParent = $_POST[$topic->idTopic."Parent"];
                if($topicName != $topic->idTopic){
                    $this->topic_model->update_topic($topic->idTopic, $topicName);
                }
                $exists = false;
                foreach( $param['hierarchy'] as $parent){
                    if($parent->idTopic == $topic->idTopic){
                        $exists = true;
                        if($parent->idTopicHierarchy != $topicParent){
                            if($topicParent == "0"){
                                 $this->topicHierarchy_model->delete_topicHierarchy($topic->idTopic);
                            } else{
                                $this->topicHierarchy_model->update_topicHierarchy($topic->idTopic, $topicParent);
                            }
                        }
                        break;
                    }
                }
                if(!$exists && $topicParent != "0"){
                    $this->topicHierarchy_model->create_topicHierarchy($topic->idTopic, $topicParent);
                }
            }
            
            $param['successMessages'][0] = "The topic(s) has been successfully updated.";
            $param['topic'] = $this->topic_model->get_all_topic();
            $param['hierarchy'] = $this->topicHierarchy_model->get_all_topicHierarchy();
            $this->load->view('header',$param);
            $this->load->view('edit_topic', $param);
        }else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to update topics.');
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