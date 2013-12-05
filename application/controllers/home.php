<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        $idEvent = $this->session->userdata('idEvent');
		if (!$idEvent) {
            $this->session->set_userdata('idEvent', 1);
            $this->load->model('event_model');
            $eventName = $this->event_model->get_event_name($idEvent);
            $this->session->set_userdata('eventName', $eventName[0]->eventName);
        }
        
        $this->load->model('news_model');
        $param['news'] = $this->news_model->get_all_news_for_event($idEvent);
        $this->load->model('meeting_model');
        $param['meetings'] = $this->meeting_model->get_upcoming_meeting_for_event($idEvent);
        
		$this->load->view('header');
		$this->load->view('home_page', $param);
	}
    
    public function signIn()
	{
		$this->load->view('header');
		$this->load->view('signed-in-page');
	}
}