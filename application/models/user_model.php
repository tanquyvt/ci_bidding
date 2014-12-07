<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database('default');
	}

	public function getData($uid = FALSE)
	{
		if ($uid === FALSE) {
			$query = $this->db->get('user');

			return $query->result_array();
		} else {
			$query = $this->db->get_where('user', array('uid' => $uid));

			return $query->row_array();
		}
	}

	public function signup($data)
	{
		$this->db->insert('user', $data);

		return $this->db->insert_id();
	}

	public function signin($email, $password)
	{
		$query = $this->db->get_where('user', array('email' => $email, 'password' => md5($password)), 1);

		if ($query->num_rows == 1) {
			return $query->result_array();
		} else {
			return FALSE;
		}
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */