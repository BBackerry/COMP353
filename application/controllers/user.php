<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    
	public function login()
	{
		$username = $this->input->get('username');
		$password = $this->input->get('password');
		if ($this->verify_login($username, $password)) {
			$this->session->set_userdata('idUser', $username);
            
            $this->load->model('role_model');
            $query = $this->role_model->get_role_of_user($username);
			$this->session->set_userdata('isAdmin', false);
			foreach ($query as $row)
			{
				if($row->idPosition == 1 & $row->idEvent == 1)
				$this->session->set_userdata('isAdmin', true);
			}
        }      
		else {
			$this->session->set_userdata('idUser', false);
		}
		redirect('Home', 'index'); 
	}
	
	public function register_email()
	{
		$this->load->view('header');
		$this->load->view('user_registration_email');
	}
	
	public function register_form()
	{
		$this->load->view('header');
		$this->load->view('user_registration_form');
	}
	
	public function logout()
	{
		$this->session->set_userdata('idUser', false);
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
}