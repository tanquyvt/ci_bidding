<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auction_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->database('default');
	}

	public function insertAuction($data)
	{
		$this->db->insert('item', $data);
		$iid = $this->db->insert_id();
		$this->db->insert('auction', array('iid' => $iid, 'hbid' => $data['starting_bid']));
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

	public function record_count()
	{
		return $this->db->count_all('auction');
	}

	public function fetch_auctions($limit, $start)
	{
		$this->db->limit($limit, $start);

		$this->db->select('*');
		$this->db->from('item');
		$this->db->join('auction', 'item.iid = auction.iid', 'inner');

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return FALSE;
	}

	public function detail_auction($iid)
	{
		$this->db->select('*');
		$this->db->from('item');
		$this->db->where('item.iid', $iid);
		$this->db->join('auction', 'item.iid = auction.iid', 'inner');

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return FALSE;
	}

	public function update_auction($set)
	{
		$data = array(
				'hbid' => $set['bid_price'],
				'nbids' => $set['nbids'] + 1
			);
		$this->db->update('auction', $data, array('iid' => $set['iid']));		
	}

}

/* End of file auction_model.php */
/* Location: ./application/controllers/auction_model.php */