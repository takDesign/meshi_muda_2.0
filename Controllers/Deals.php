<?php
class Deals extends Controller
{
	// index.php?controller=outside&route=default
	public function
	default()
	{
		echo "hello in deals controller";
	}

	public function processDeal()
	{
        User::checkLoggedIn();
        
        Deal::postDeal();

        header("location: index.php?controller=inside&route=showDashboard&");
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
