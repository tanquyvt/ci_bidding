<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifySignin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('user_model', 'umodel');
	}

	public function index()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('signin_view');
		} else {
			redirect('home', 'refresh');
		}
	}

	public function check_database($password)
	{
		$email = $this->input->post('email');

		$result = $this->umodel->signin($email, $password);

		if ($result) {
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'uid' => $row['uid'],
					'first_name' => $row['first_name']
					);
				$this->session->set_userdata('signed_in', $sess_array);
			}
			return TRUE;
		} else {
			$this->form_validation->set_message('check_database', 'Invalid email or password');
			return FALSE;
		}
	}
}

/* End of file verifysignin.php */
/* Location: ./application/controllers/verifysignin.php */