<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->library('form_validation');
		
		$data['page_title'] = "Sign in page";
		$this->load->view('partials/header_view', $data);
		$this->load->view('user/signin');
		$this->load->view('partials/footer_view');
	}

}

/* End of file signin.php */
/* Location: ./application/controllers/signin.php */