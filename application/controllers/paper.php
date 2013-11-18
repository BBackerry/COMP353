<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paper extends CI_Controller {

	public function submit()
	{
		$this->load->view('submit_new_paper');
	}
}