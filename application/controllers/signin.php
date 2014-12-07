<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('signin_view');
	}

}

/* End of file signin.php */
/* Location: ./application/controllers/signin.php */