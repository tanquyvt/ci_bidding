<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auction_model', 'amodel');
	}

	public function index()
	{
		$this->load->helper('date');
		$this->amodel->checkActivation();

		$data['auction'] = $this->amodel->getAuction();
		$data['page_title'] = "Auction";

		$this->load->view('partials/header_view', $data);
		$this->load->view('partials/nav_view');
		// $this->load->view('auction/list', $data);
		$this->load->view('partials/footer_view');
	}

	public function add()
	{
		$data['cid'] = $this->amodel->getCategory();
		$data['page_title'] = "Add auction";

		$this->load->view('partials/header_view', $data);
		$this->load->view('Auction_add_view', $data);
		$this->load->view('partials/footer_view');
	}

	public function insert()
	{
		$data = $this->input->post(NULL, TRUE);
		$data['iid'] = $this->amodel->insertItem($data);

		$this->amodel->insertAuction($data);
	}

	public function confirm()
	{
		$data = $this->input->post(NULL, TRUE); // return all (NULL) POST items with (TRUE) XSS filter

		$this->item_obj->setData($data);

		$this->load->view('partials/header_view', $data);
		$this->load->view('auction/confirm', $this->item_obj);
		$this->load->view('partials/footer_view');
	}

	public function detail($iid)
	{
		$data = $this->amodel->getItem($iid);
		
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

}

/* End of file auction.php */
/* Location: ./application/controllers/auction.php */