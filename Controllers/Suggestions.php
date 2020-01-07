<?php
class Suggestions extends Controller
{
	// index.php?controller=outside&route=default
	public function
	default()
	{
		echo "hello in suggestions";
	}

	public function processSuggestion()
	{
		$bSuggestStatus = Suggestion::suggest($_POST["strContent"], $_SESSION["userid"]);
		if ($bSuggestStatus) {
			header("location: index.php?controller=inside&route=showDashboard&success=true");
		} else {
			echo "Coudn't post your suggestion";
		}
	}

	// public function new()
	// {

	// 	$body = $this->loadView("Views/newSuggest.php");
	// 	// include("Views/suggestionList.php"); // show us the suggestion list
	// 	include("Views/mainTemplate.php"); // this mainTemplate is expecting $body
	// }

	// public function processLogin()
	// {
	// 	$bLogInStatus = User::login($_POST["username"],$_POST["password"]);
	// 	if($bLogInStatus)
	// 	{
	// 		// look for a controller called suggestions and the method inside their called "new"
	// 		header("location: index.php?controller=suggestions&route=new");
	// 	} else {
	// 		header("location: index.php?controller=outside&route=login&error=1");
	// 	}
	// }



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
