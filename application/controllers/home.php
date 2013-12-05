<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        $this->load->model('news_model');
        $param['news'] = $this->news_model->get_all_news();
        $this->load->model('meeting_model');
        $param['meetings'] = $this->meeting_model->get_upcoming_meeting();
        
		$this->load->view('header');
		$this->load->view('home_page', $param);
	}
    
    public function signIn()
	{
		$this->load->view('header');
		$this->load->view('signed-in-page');
	}
}