<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {
	
	public function addEvent()
	{
		$this->load->view('header');
		$this->load->view('add_new_event');
	}
    
    public function submit()
	{
		$this->load->view('header');
		$this->load->view('event_page');
	}
	
	public function addedEvent()
	{
		$eventTitle = $this->input->get('eventTitle');
		$eventDescription = $this->input->get('eventDescription');
		$idTopicHierarcy = $this->input->get('idTopicHierarchy');
		$startDate = $this->input->get('startDate');
		$endDate = $this->input->get('endDate');
		$schedulingTemplate = $this->input->get('schedulingTemplate');
		$copyGroupsFrom = $this->input->get('copyGroupsFrom');
		$requestFullPaper = $this->input->get('requestFullPaper');
		$requestAbstract = $this->input->get('requestAbstract');
		$enableRegistration = $this->input->get('enableRegistration');
		$enablePaperAuction = $this->input->get('enablePaperAuction');
		$enablePaperReview = $this->input->get('enablePaperReview');
		$enableAutoReviewAllocation = $this->input->get('enableAutoReviewAllocation');
		$enableBlindDebate = $this->input->get('enableBlindDebate');
		$requestPublisherCpoyright = $this->input->get('requestPublisherCpoyright');
		$upload = $this->input->get('upload');
		$inline = $this->input->get('inline');
		$online = $this->input->get('online');
		$requestCIDI = $this->input->get('requestCIDI');
		$upload1 = $this->input->get('upload1');
		$inline1 = $this->input-get('inline1');
		$online1 = $this->input->get('online1');
		$requestFinal = $this->input->get('requestFinal');
		$requestSlide = $this->input->get('requestSlide');
		$enablePresentation = $this->input->get('enablePresentation');
		$checkFonts = $this->input->get('checkFonts');
			
	}
}