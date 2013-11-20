<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paper extends CI_Controller {

	public function submit()
	{
		$this->load->view('header');
		$this->load->view('submit_new_paper');
	}

	public function submitted()
	{
		$this->load->view('header');
		$this->load->view('submitted_papers');
	}

	public function search()
	{
		$this->load->view('header');
		$this->load->view('search_papers');
	}
    
    public function paperReview()
	{
		$this->load->view('header');
		$this->load->view('paper_review');
	}
    
    public function detailedPaperReview()
	{
		$this->load->view('header');
		$this->load->view('detailed_paper_review');
	}
}