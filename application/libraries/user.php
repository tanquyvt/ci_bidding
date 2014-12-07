<?php 
	/**
	* 
	*/
	class User
	{
		public $email;
		public $firstname;
		public $lastname;
		private $password;

		function __construct(argument)
		{
			# code...
		}

		public function setData($data)
		{
			$this->email = $data['email'];
			$this->firstname = $data['firstname'];
			$this->lastname = $data['lastname'];
			$this->password = $data['password'];
		}
	}
 ?>