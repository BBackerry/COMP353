<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
      		$this->load->model('meeting_model');
            $this->load->model('event_model');
	}
	public function viewNews()
    {     
        $this->load->view('header');
        $param['news'] = $this->news_model->get_news($this->input->get("id"));
        $param['eventName'] = $this->event_model->get_event_name( $param['news'][0]->idEvent);
        $this->load->view('news_details', $param);
    }
    
	public function createNews()
	{
        if($this->session->userdata('isAdmin') || $this->session->userdata('isProgramChair')){
            $this->load->view('header');
            $param['events'] = $this->event_model->get_all_event();
            $this->load->view('add_new_news', $param);
        }
		else 
		{
			$errors['errorMessages'] = array("Sorry but you are no allowed to create News");
			$this->load->view('header', $errors);
		    $idEvent = $this->session->userdata('idEvent');
           
            $param['news'] = $this->news_model->get_all_news_for_event($idEvent);
            $param['meetings'] = $this->meeting_model->get_upcoming_meeting_for_event($idEvent);
			$this->load->view('home_page', $param);
		}
	}
    
    public function editNews()
    {
        $this->load->view('header');
        $param['news'] = $this->news_model->get_news($this->input->get("id"));
        $param['events'] = $this->event_model->get_all_event();
        $this->load->view('edit_new_news', $param);
    }
    
    public function deleteNews()
    {
        $this->news_model->delete_news($this->input->get("id"));
        $param['successMessages'][0] = "The news has been successfully deleted.";
        $idEvent = $this->session->userdata('idEvent');
        
        $param['news'] = $this->news_model->get_all_news_for_event($idEvent);
        $param['meetings'] = $this->meeting_model->get_upcoming_meeting_for_event($idEvent);
        $this->load->view('header', $param);
        $this->load->view('home_page', $param);
    }
    
    public function updateNews()
    {
        $createdBy = $this->session->userdata('idUser');
        $title = $_POST['title'];
        $description = $_POST['description'];
        $date = date( "Y-m-d H:i:s", strtotime($_POST['date']));	
        $idNews = $_POST['id'];
        $idEvent = $_POST['idEvent'];
                
        $this->news_model->update_news($idNews, $title, $date, $description, $createdBy, $idEvent);

        $param['successMessages'][0] = "The news has been successfully updated.";
		$this->load->view('header', $param);
        $param['news'] = $this->news_model->get_news($idNews);
        $param['eventName'] = $this->event_model->get_event_name($idEvent);
        $this->load->view('news_details', $param);	
    }
	
	public function submitedNews()
	{
		$createdBy = $this->session->userdata('idUser');
        $date = new DateTime();
        $timestamp = $date->getTimestamp();
        $title = $_POST['title'];
        $description = $_POST['description'];
        $idEvent = $_POST['idEvent'];

		$this->news_model->create_news($title, date( "Y-m-d H:i:s", $timestamp), $description, $createdBy, $idEvent);
        
		redirect(site_url('Event/switchEvent?idEvent=' . $idEvent));
	}
		
			
	
}