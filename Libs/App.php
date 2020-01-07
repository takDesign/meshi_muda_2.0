<?php
Class App
{
	var $user;

	public function __construct()
	{
	
		$this->user = User::getCurrentUser();
		//print_r($this->user);
	}
}

?>