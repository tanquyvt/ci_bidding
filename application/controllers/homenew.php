<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homenew extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->helper('date');
		$data['page_title'] = "Home";
		$this->load->view('partials/header_view', $data);
		$this->load->view('partials/nav_view');
		$this->load->view('home_view', $data);
		$this->load->view('partials/footer_view');
	}

}

/* End of file homenew.php */
/* Location: ./application/controllers/homenew.php */