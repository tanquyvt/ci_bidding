<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auction_model', 'amodel');
		$this->load->library('pagination');
		$this->load->helper('date');
		$this->load->library('form_validation');
	}

	public function index()
	{
		redirect('auction/listall', 'refresh');
	}

	public function add()
	{
		$data['cid'] = $this->amodel->getCategory();
		$data['page_title'] = "Add auction";

		$this->load->view('partials/header_view', $data);
		$this->load->view('auction/add', $data);
		$this->load->view('partials/footer_view');
	}

	public function listall()
	{
		$config = array();
		$config['base_url'] = base_url() . 'auction/listall';
		$config['total_rows'] = $this->amodel->record_count();
		$config['per_page'] = 20;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['results'] = $this->amodel->fetch_auctions($config['per_page'], $page);
		$data['links'] = $this->pagination->create_links();
		$data['page_title'] = "Auction list";

		$this->load->view('partials/header_view', $data);
		$this->load->view('partials/nav_view');
		$this->load->view('partials/auction_menu');
		$this->load->view('auction/list', $data);
		$this->load->view('partials/footer_view');
	}

	public function insert()
	{
		$data = $this->input->post(NULL, TRUE);
		$data['iid'] = $this->amodel->insertAuction($data);
	}

	public function confirm()
	{
		$data = $this->input->post(NULL, TRUE); // return all (NULL) POST items with (TRUE) XSS filter
		$data['page_title'] = "Auction confirm";

		$this->load->view('partials/header_view', $data);
		$this->load->view('auction/confirm', $data);
		$this->load->view('partials/footer_view');
	}

	public function detail($iid)
	{
		$data['result'] = $this->amodel->detail_auction($iid);
		
		$this->load->view('partials/header_view', $data);
		$this->load->view('auction/detail', $data);
		$this->load->view('partials/footer_view');
	}

	public function update($data)
	{
		$data = $this->input->post(NULL, TRUE);

		$this->amodel->updateStatus($data);

		redirect('index', 'refresh');
	}

	public function bid()
	{
		$iid = $this->input->post('iid', TRUE);
		$bid_price = $this->input->post('bid_price', TRUE);

		$data = $this->amodel->detail_auction($iid);

		$this->amodel->update_auction($data);
	}

}

/* End of file auction.php */
/* Location: ./application/controllers/auction.php */