<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auction_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->database('default');
	}

	public function index()
	{
		
	}

	public function insertItem($data)
	{
		$this->db->insert('item', $data);

		return $this->db->insert_id();
	}

	public function insertAuction($data)
	{
		$this->db->insert('auction', $data);
	}

	public function getCategory($cid = FALSE)
	{
		if ($cid === FALSE) {
			$query = $this->db->get('category');
			if ($query->num_rows() == 0) {
				show_error('Can not get category data!');
			} else {
				return $query->result_array();
			}
		} else {
			$query = $this->db->get_where('category', array('cid' => $cid));
			if ($query->num_rows() == 0) {
				show_error('Can not get data of cid = '. $cid);
			}
			return $query->row();
		}
	}

	public function getItem($iid = FALSE)
	{
		if ($iid === FALSE) {
			$query = $this->db->get('item');

			return $query->result_array();
		}
		$query = $this->db->get_where('item', array('iid' => $iid));

		return $query->row_array();
		
	}

	public function getAuction($aid = FALSE)
	{
		if ($aid === FALSE) {
			$query = $this->db->get('item');
			
			return $query->result_array();
		}

		$query = $this->db->get_where('auction', array('aid' => $aid));
		return $query->row_array();
	}

	public function updateStatus($iid, $value)
	{
		$this->db->update('item', array('is_active' => $value), array('iid' => $iid));
	}

	public function checkActivation()
	{
		$data = $this->getItem();
		$now_time_unix = human_to_unix(date("Y-m-d H:i:s"));

		foreach ($data as $item) {
			$end_time_unix = human_to_unix($item['end_time']);
			if ($now_time_unix <= $end_time_unix) {
				$this->updateStatus($item['iid'], 1);
			} else {
				$this->updateStatus($item['iid'], 0);
			}
		}
	}

}

/* End of file auction_model.php */
/* Location: ./application/controllers/auction_model.php */