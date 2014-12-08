<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_new extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auction_model', 'amodel');
	}

	public function index()
	{
		$this->load->helper('date');
		$data['auction'] = $this->amodel->get9Auction($offset);
		$this->amodel->checkActivation();
		$data['psum'] = $this->amodel->pagination();
		$this->load->view('home_view', $data);
	}

	public function page($value)
	{
		$psum = $this->amodel->pagination();
	}

}

/* End of file home_new.php */
/* Location: ./application/controllers/home_new.php */