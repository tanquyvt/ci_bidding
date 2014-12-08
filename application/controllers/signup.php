<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->library('form_validation');

		$data['page_title'] = "Sign up page";
		$this->load->view('partials/header_view', $data);
		$this->load->view('user/signup');
		$this->load->view('partials/footer_view');
	}

}

/* End of file signup.php */
/* Location: ./application/controllers/signup.php */