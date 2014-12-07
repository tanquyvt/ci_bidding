<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Item
{
	public $cid;
	public $title;
	public $description;
	public $start_time;
	public $end_time;
	public $starting_bid;
	//public $buynow_price;
	public $increment;
	public $reserve;
	//public $duration;
	
	function __construct()
	{
		
	}

	public function setData($data)
	{
		$this->cid = $data['cid'];
		$this->title = $data['title'];
		$this->description = $data['description'];
		$this->start_time = $data['start_time'];

		$duration = $data['duration'];	// Not include in DB

		// Calculate end time from start time and duration
		$start_time_obj = date_create($this->start_time); // datetime obj (for implement below PHP function)
		$end_time_obj = date_create(); // end_time also should be a datetime obj
		date_add($end_time_obj, date_interval_create_from_date_string($duration . " days"));
		$this->end_time = date_format($end_time_obj, "Y-m-d H:i:s");

		$this->starting_bid = $data['starting_bid'];
		$this->increment = $data['increment'];
		$this->reserve = $data['reserve'];
	}

	public function getData()
	{
		$data = array(
			'cid' => $this->cid,
			'title' => $this->title,
			'description' => $this->description,
			'start_time' => $this->start_time,
			'end_time' => $this->end_time,
			'starting_bid' => $this->starting_bid,
			'increment' => $this->increment,
			'reserve' => $this->reserve
			);

		return $data;
	}

	public function calTimeLeft($start_time, $end_time)
	{
		//$start_time = date("Y-m-d H:i:s");
		$start_time_obj = date_create($start_time);

		//$end_time = $this->end_time;
		$end_time_obj = date_create($end_time);

		$result = "";

		if ($start_time >= $end_time) {
			$result = "Expired";
		} else {
			$diff = date_diff($start_time_obj, $end_time_obj);
			$ndays = $diff->format("%a");
			if ($ndays == 0) {
				$nhours = $diff->format("%h");
				if ($nhours == 0) {
					$nmins = $diff->format("%i");
					if ($nmins == 0) {
						$nsecs = $diff->format("%s");
						$result = $nsecs . " second(s)";
					} else {
						$result = $diff->format("%i minute(s) %s second(s)");
					}
				} else {
					$result = $diff->format("%h hour(s) %i minute(s)");
				}
			} else {
				$result = $diff->format("%d day(s) %h hour(s)");
			}
		}
		return $result;
	}
}