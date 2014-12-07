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
			$data['first_name'] = $session_data['first_name'];
			$this->load->view('home_view', $data);
		} else {
			redirect('signin', 'refresh');
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