<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// $this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->view('signup_view_new');
	}

}

/* End of file signup.php */
/* Location: ./application/controllers/signup.php */