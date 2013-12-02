<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}
	public function viewNews()
    {     
        $this->load->view('header');
        $param['news'] = $this->news_model->get_news($this->input->get("id"));
        $this->load->view('news_details', $param);
    }
    
	public function createNews()
	{
        if($this->session->userdata('isAdmin') || $this->session->userdata('isProgramChair')){
            $this->load->view('header');
            $this->load->view('add_new_news');
        }
		else 
		{
			$errors['errorMessages'] = array("Sorry but you are no allowed to create News");
			$this->load->view('header', $errors);
			$this->load->view('home_page');
		}
	}
    
    public function editNews()
    {
        $this->load->view('header');
        $param['news'] = $this->news_model->get_news($this->input->get("id"));
        $this->load->view('edit_new_news', $param);
    }
    
    public function deleteNews()
    {
        $this->news_model->delete_news($this->input->get("id"));
        $param['successMessages'][0] = "The news has been successfully deleted.";
        $param['news'] = $this->news_model->get_all_news();
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
                
        $this->news_model->update_news($idNews, $title, $date, $description, $createdBy);

        $param['successMessages'][0] = "The news has been successfully updated.";
		$this->load->view('header', $param);
        $param['news'] = $this->news_model->get_news($idNews);
        $this->load->view('news_details', $param);	
    }
	
	public function submitedNews()
	{
		$createdBy = $this->session->userdata('idUser');
        $date = new DateTime();
        $timestamp = $date->getTimestamp();
        $title = $_POST['title'];
        $description = $_POST['description'];
        
		$this->news_model->create_news($title, date( "Y-m-d H:i:s", $timestamp), $description, $createdBy );
        $idNews = mysql_insert_id();
        
        $param['successMessages'][0] = "The news has been successfully saved.";
		$this->load->view('header', $param);
        $param['news'] = $this->news_model->get_news($idNews);
        $this->load->view('news_details', $param);	
	}
		
			
	
}