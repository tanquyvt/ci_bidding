<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifybid extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('auction_model', 'amodel');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = $this->input->post(NULL, TRUE);

		$this->form_validation->set_rules('bid_price', 'Bid price', 'trim|required|xss_clean|callback_check_price');

		if ($this->form_validation->run() == FALSE) {
			$data['page_title'] = "Auction detail";

			$this->load->view('partials/header_view', $data);
			echo '<script>alert("Invalid bid price!")</script>';
			redirect('auction/detail/'. $data['iid'], 'refresh');
			$this->load->view('partials/footer_view');
		} else {
			redirect('auction/listall', 'refresh');
		}
	}

	public function check_price($bid_price)
	{
		$data = $this->input->post(NULL, TRUE);
		if ($bid_price > $data['hbid']) {
			$this->amodel->update_auction($data);
			return TRUE;
		} else {
			$this->form_validation->set_message('check_price', 'Bid price should larger than current bid');
			return FALSE;
		}
	}

}

/* End of file verifybid.php */
/* Location: ./application/controllers/verifybid.php */