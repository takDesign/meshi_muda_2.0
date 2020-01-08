<?php
class Api extends Controller
{
	// index.php?controller=outside&route=default
	public function
	default()
	{
		echo "hello in suggestions";
	}

	public function getSuggestions()
	{
		$this->data = Suggestion::getAll();
	}

	public function preTrip()
	{
		// this function will run before doing any routes inside this controller
		$nUserID = User::checkLoggedIn();
		if (!$nUserID) {
			header("location: index.php?controller=outside&route=login&error=true");
		}
	}

	public function postTrip()
	{
		// this function will run after running a routes inside this controller
	}
}
