<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function profile()
	{
		$username = $this->session->userdata('idUser');
		if ($username) {
			$this->load->model('user_model');
			$this->load->model('country_model');
			$this->load->model('organization_model');
			$this->load->model('department_model');
			$this->load->model('news_model');
            		$this->load->model('meeting_model');
       
			$user = $this->user_model->get_user($username)[0];
			$data['user'] = $user;
			$data['oldCountryId'] = $this->country_model->get_country($user->country)[0]->idCountry;
			$data['oldOrganizationId'] = $this->organization_model->get_organization($user->organization)[0]->idOrganization;
			$data['oldDepartmentId'] = $this->department_model->get_department($user->department)[0]->idDepartment;
			
			$data['countries'] = $this->country_model->get_all_country();
			$data['organizations'] = $this->organization_model->get_all_organization();
			$data['departments'] = $this->department_model->get_all_department();
			
			$this->load->view('header');
			$this->load->view('user_profile', $data);
		}
		else {
			$errors['errorMessages'] = array('Sorry but you have to be logged in to edit your profile');
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
	
	public function update_profile()
	{
		$this->load->model('user_model');
		$username = $this->session->userdata('idUser');
		$form = $this->input->post();
		if ($this->user_model->update_user($username, $form['password'], $form['firstName'], $form['lastName'], $form['email'], (int)$form['country'], (int)$form['organization'], (int)$form['department'])) {
			$this->profile();
		}
		else {
			redirect('Home', 'index');
		}
	}
    
	public function interests($success = array())
	{
		$username = $this->session->userdata('idUser');
		
		$this->load->model('interestInTopic_model');
		$this->load->model('topicHierarchy_model');
		$this->load->model('topic_model');
		$data['topic'] = $this->topic_model->get_all_topic();
        $topicParents = $this->topicHierarchy_model->get_all_topicHierarchy();
        $hierarchy = array();
        foreach($topicParents as $parent){
            array_push($hierarchy, array('idTopic' => $parent->idTopic, 'idTopicHierarchy' =>$parent->idTopicHierarchy));
        }
        
        $tree = array();
        foreach($data['topic'] as $topic){
            if($this->isParent($topic->idTopic, $topicParents)){
                array_push($tree, $this->constructHierarchy($hierarchy, $topic->idTopic));
            }
        }
        $data['hierarchy'] = "";
        foreach($tree as $parent){
           $data['hierarchy'] .= $this->displayTree($parent, $topicParents);
        }
        $data['interest'] = $this->interestInTopic_model->get_interestInTopic_of_user($username);
		
		$this->load->view('header', $success);
        $this->load->view('user_interests', $data);
	}
	
		public function expertises($success = array())
	{
		$username = $this->session->userdata('idUser');
		
		$this->load->model('expertInTopic_model');
		$this->load->model('topicHierarchy_model');
		$this->load->model('topic_model');
		$data['topic'] = $this->topic_model->get_all_topic();
        $topicParents = $this->topicHierarchy_model->get_all_topicHierarchy();
        $hierarchy = array();
        foreach($topicParents as $parent){
            array_push($hierarchy, array('idTopic' => $parent->idTopic, 'idTopicHierarchy' =>$parent->idTopicHierarchy));
        }
        
        $tree = array();
        foreach($data['topic'] as $topic){
            if($this->isParent($topic->idTopic, $topicParents)){
                array_push($tree, $this->constructHierarchy($hierarchy, $topic->idTopic));
            }
        }
        $data['hierarchy'] = "";
        foreach($tree as $parent){
           $data['hierarchy'] .= $this->displayTree($parent, $topicParents);
        }
        $data['expertise'] = $this->expertInTopic_model->get_expertInTopic_of_user($username);
		
		$this->load->view('header', $success);
        $this->load->view('user_expertise', $data);
	}
	
	public function update_interests()
	{
		$idUser = $this->session->userdata('idUser');
		$idTopics = $this->input->post('interest');
		$this->load->model('interestInTopic_model');
		
		$this->interestInTopic_model->delete_interestInTopic_by_user($idUser);
		foreach($idTopics as $topic) {
			$this->interestInTopic_model->create_interestInTopic($idUser, $topic);
		}
		
		$success['successMessages'] = array('Interests List successfully updated');
		$this->interests($success);
	}
	
	public function update_expertise()
	{
		$idUser = $this->session->userdata('idUser');
		$idTopics = $this->input->post('expertise');
		$this->load->model('expertInTopic_model');
		
		$this->expertInTopic_model->delete_expertInTopic_by_user($idUser);
		foreach($idTopics as $topic) {
			$this->expertInTopic_model->create_expertInTopic($idUser, $topic);
		}
		
		$success['successMessages'] = array('Expertises List successfully updated');
		$this->expertises($success);
	}
	
	//=======================================================HIERARCHY CODE=====================================================================
    function isParent($topic, $topicHierarchy){
        foreach($topicHierarchy as $relation){
            if($relation->idTopic == $topic)
                return false;
        }
        return true;
    }
    function displayTree($parent,$topicParents,$str=""){    
        foreach($parent as $key => $value){
            if($key === "id"){
                if( $this->isParent($parent["id"], $topicParents)){
                    $str = $str ."&". $parent["id"];
                } else {
                    $str = $str . $parent["id"];
                }
            }
            if($key !== "id"){
                $str = $str . "["; 
                $str = $this->displayTree($value, $topicParents, $str);
                $str = $str . "]";                
            }
        }
        return $str;
    }
    
    function constructHierarchy(array $hierarchyData, $parentId) {
        $hierarchy = array("id" => $parentId);
        foreach ($hierarchyData as $relation) {
            if ($relation['idTopicHierarchy'] == $parentId) {
                $child = array("id"=>$relation['idTopic']);
                $children = $this->constructHierarchyNoParent($hierarchyData, $relation['idTopic']);
                if ($children) {
                    $child[] = $children;
                }
                    $hierarchy[] = $child;
            }
        }
        return $hierarchy;
    }
    function constructHierarchyNoParent(array $hierarchyData, $parentId = 1) {
        $hierarchy = array();
        foreach ($hierarchyData as $relation) {
            if ($relation['idTopicHierarchy'] == $parentId) {
                $child = array("id"=>$relation['idTopic']);
                $children = $this->constructHierarchyNoParent($hierarchyData, $relation['idTopic']);
                if ($children) {
                    $child[] = $children;
                }
                    $hierarchy[] = $child;
            }
        }
        return $hierarchy;
    }
	//============================================================END HIERARCHY CODE=======================================================================
	
	public function login()
	{
		$username = $this->input->get('username');
		$password = $this->input->get('password');
		if ($this->verify_login($username, $password)) {
			$user = $this->user_model->get_user($username)[0];
			if ($user->confirmed == 0 && (time()-strtotime($user->registrationTime) > 60*60*24))
			{
				$this->user_model->delete_user($username);
				$errors['errorMessages'] = array('Sorry but you had to login within the first 24 hours of the sign-up. Try signing-up again');
				$this->register_email($errors);
			}
			
			else {
				$this->user_model->validate_user($username);
				$this->session->set_userdata('idUser', $username);
				
				$this->load->model('role_model');
				$query = $this->role_model->get_role_of_user($username);
				$this->session->set_userdata('isAdmin', false);
                $this->session->set_userdata('idEvent', 1);
                $this->load->model('event_model');
                $eventName = $this->event_model->get_event_name(1);
                $this->session->set_userdata('eventName', $eventName[0]->eventName);
				$this->session->set_userdata('isProgramChair', false);
				$this->session->set_userdata('isCommitteeMember', false);
				foreach ($query as $row)
				{
					if($row->idPosition == 1 & $row->idEvent == 1)
					$this->session->set_userdata('isAdmin', true);
					if($row->idPosition == 2)
					$this->session->set_userdata('isProgramChair', true);
					if($row->idPosition == 3)
					$this->session->set_userdata('isCommitteeMember', true);
				}
				redirect('Home', 'index'); 
			}
        }      
		else {
			$this->session->set_userdata('idUser', false);
            $this->session->set_userdata('isAdmin', false);
            $this->session->set_userdata('isProgramChair', false);
            $this->session->set_userdata('isCommitteeMember', false);
			redirect('Home', 'index'); 
		}
	}
	
	public function register_email($messages = null)
	{
		$this->load->view('header', $messages);
		$this->load->view('user_registration_email');
	}
	
	public function register_form($email, $errors = null)
	{
		$this->load->model('organization_model');
		$this->load->model('department_model');
		$this->load->model('country_model');
		$data['email'] = $email;
		$data['organizations'] = $this->organization_model->get_all_organization();
		$data['departments'] = $this->department_model->get_all_department();
		$data['countries'] = $this->country_model->get_all_country();
		$this->load->view('header');
		$this->load->view('user_registration_form', $data);
	}
	
	public function register_new()
	{
		$this->load->model('user_model');
		$form = $this->input->post();
		if ($this->user_model->create_user($form['username'], $form['password'], $form['firstName'], $form['lastName'], $form['email'], (int)$form['country'], (int)$form['organization'], (int)$form['department'])) {
			$this->load->view('header');
			$this->load->view('user_registration_successful');
		}
		else {
			$this->load->view('header');
			$this->load->view('user_registration_error');
		}
	}
	
	public function logout()
	{
		$this->session->set_userdata('idUser', false);
        $this->session->set_userdata('isAdmin', false);
        $this->session->set_userdata('isProgramChair', false);
        $this->session->set_userdata('isCommitteeMember', false);
        $this->session->set_userdata('idEvent', 1);
        $this->load->model('event_model');
        $eventName = $this->event_model->get_event_name(1);
        $this->session->set_userdata('eventName', $eventName[0]->eventName);
		redirect('Home', 'index');
	}
	
	private function verify_login($username, $password)
	{
		$this->load->model('user_model');
		$user = $this->user_model->get_user($username);
		if (!empty($user)) {
			if ($user[0]->password == $password)
				return true;
		}
		else return false;
	}
	
	public function validate_user_registration()
	{
		if (isset($_POST['username'])) {
			$this->load->model('user_model');
			$check = $this->user_model->get_user($_POST['username']);
			if (empty($check)) { echo 1; }
			else echo 0;
		}
	}
	
	public function verify_password()
	{
		if (isset($_POST['password'])) {
			$this->load->model('user_model');
			$password = $this->user_model->get_user($this->session->userdata('idUser'))[0]->password;
			echo ($_POST['password'] == $password ? 1 : 0);
		}
	}
}