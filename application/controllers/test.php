<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}

	public function page()
	{
		$this->load->library('pagination');

		$config['base_url'] = 'http://localhost/ci_bidding/test/page/';
		$config['total_rows'] = 200;
		$config['per_page'] = 20; 

		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";


		$this->pagination->initialize($config); 



		echo $this->pagination->create_links();
		
		$this->load->view('partials/header_view', $data);
		$this->load->view('home_view');
	}

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */