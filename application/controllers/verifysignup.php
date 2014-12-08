<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifysignup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('user_model', 'umodel');
	}

	public function index()
	{
		$this->load->library('form_validation');

		$data = $this->input->post(NULL, TRUE);

		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[6]');

		if ($this->form_validation->run() == FALSE) {
			$data['page_title'] = "Sign up";
			$this->load->view('partials/header_view', $data);
			$this->load->view('user/signup');
			$this->load->view('partials/footer_view');
		} else {
			$this->insert_database();
			$this->load->view('user/success');
		}
	}

	public function insert_database()
	{
		$data = $this->input->post(NULL, TRUE);

		$data['password'] = md5($data['password']);

		$uid = $this->umodel->signup($data);

		return $uid;
	}

}

/* End of file verifysignup.php */
/* Location: ./application/controllers/verifysignup.php */