<?php

class Inside extends Controller
{
	// index.php?controller=inside&route=default
	public function
	default()
	{
		echo "hello default";
	}

	public function showDashboard()
	{
		User::checkLoggedIn();

		$arrSuggestions = Suggestion::getAll();

		$body = $this->loadView("Views/dashboard.php", $arrSuggestions); // Passing data to loadView so suggestionList.php can read it

		include("Views/mainTemplate.php"); // this mainTemplate is expecting $body
	}

	public function preTrip()
	{
		// this function will run before doing any routes inside this controller
	}

	public function postTrip()
	{
		// this function will run after running a routes inside this controller
	}
}
