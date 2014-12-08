<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('signed_in')) {
			$session_data = $this->session->userdata('signed_in');
			$data['email'] = $session_data['email'];
			$data['page_title'] = "Home";

			$this->load->view('partials/header_view', $data);
			$this->load->view('partials/nav_view', $data);
			$this->load->view('home_view');
			$this->load->view('partials/footer_view');
		} 
		else {
			$data['page_title'] = "Home";

			$this->load->view('partials/header_view', $data);
			$this->load->view('partials/nav_view');
			$this->load->view('home_view');
			$this->load->view('partials/footer_view');
		}
	}

	public function signout()
	{
		$this->session->unset_userdata('signed_in');
		session_destroy();
		redirect('home', 'refresh');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */