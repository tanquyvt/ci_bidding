<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('auction_model', 'amodel');

		$this->load->library('Item', '', 'item_obj');
	}

	public function index()
	{
		$this->load->helper('date');
		$data['auction'] = $this->amodel->getAuction();

		$this->amodel->checkActivation();

		//$this->item_obj->setData($data);
		$data['item_obj'] = $this->item_obj;
		//$data['timeleft'] = $this->item_obj->calTimeLeft();
		
		$data['css'] = $this->config->item('css');
		$data['base'] = $this->config->item('base_url');
		$this->load->view('partials/header_view', $data);
		$this->load->view('auction/list', $data);
		$this->load->view('partials/footer_view');
	}

	public function add()
	{
		$data['cid'] = $this->amodel->getCategory();
		
		$data['css'] = $this->config->item('css');
		$data['base'] = $this->config->item('base_url');

		$this->load->view('partials/header_view', $data);
		$this->load->view('Auction_add_view', $data);
		$this->load->view('partials/footer_view');
	}

	public function insert()
	{
		$data = $this->input->post(NULL, TRUE);

		$item['iid'] = $this->amodel->insertItem($data);

		$this->amodel->insertAuction($item);
	}

	public function confirm()
	{
		$data = $this->input->post(NULL, TRUE); // return all (NULL) POST items with (TRUE) XSS filter
		
		$data['css'] = $this->config->item('css');
		$data['base'] = $this->config->item('base_url');

		$this->item_obj->setData($data);

		$this->load->view('partials/header_view', $data);
		$this->load->view('Auction_confirm_view', $this->item_obj);
		$this->load->view('partials/footer_view');
	}

	public function detail($iid)
	{
		$data = $this->amodel->getItem($iid);
		
		$data['css'] = $this->config->item('css');
		$data['base'] = $this->config->item('base_url');
		
		$this->load->view('partials/header_view', $data);
		$this->load->view('Auction_detail_view', $data);
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