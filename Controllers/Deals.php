<?php
class Deals extends Controller
{
	// index.php?controller=outside&route=default
	public function
	default()
	{
		echo "hello in deals controller";
	}

	// public function processDeal()
	// {
	// 	$bSuggestStatus = Suggestion::suggest($_POST["strContent"], $_SESSION["userid"]);
	// 	if ($bSuggestStatus) {
	// 		header("location: index.php?controller=inside&route=showDashboard&success=true");
	// 	} else {
	// 		echo "Coudn't post your suggestion";
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
