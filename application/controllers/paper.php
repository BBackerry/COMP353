<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paper extends CI_Controller {

	public function submit()
	{
		$this->load->view('header');
		$this->load->view('submit_new_paper');
	}

	public function submittedPapers()
	{	
		include '/system/database/DB_Paper.php';
		$this->session->set_userdata('userId','testUser');
        //$query = db_get_papers_by_userId($this->session->userdata('userId'));
        $query['first'] = db_get_papers_by_userId('testUser')->result();
		$this->load->view('header');
		$this->load->view('submitted_papers', $query);
		//$this->output->set_output(var_dump($query['first']));
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

	public function submitted()
	{
		$title = $this->input->get('title');
		$abstract = $this->input->get('abstract');
		$document = $this->input->get('file');
		$keywords = $this->input->get('keywords');
		$subject = $this->input->get('subject');
		$submittedby = "testUser";
		
        include '/system/database/DB_Paper.php';
        db_create_paper($title, $abstract, $submittedby, $document, $keywords);

		$this->load->view('header');
		$this->load->view('paper_submitted_successfully');
	}

	public function getSearchDetails()
	{
		$event = $this->input->get('event');
		$author = $this->input->get('author');
		$keywords = $this->input->get('keywords');
		$title = $this->input->get('title');
	}	

}