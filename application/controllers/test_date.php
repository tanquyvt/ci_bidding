<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_date extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->helper('date');
		$this->load->view('test_date_view');
	}

}

/* End of file test_date.php */
/* Location: ./application/controllers/test_date.php */