<?php

Class Pages extends Controller
{
	public function default()
	{	
		$body = $this->loadView("Views/mainnav.php");

		$arrPeople = People::getAll(); // call the model to get all our people
		$body .= $this->loadView("Views/recordsAsList.php", $arrPeople);

		$arrFeaturedProducts = Products::getFeatured();
		$body .= $this->loadView("Views/productsPreview.php", $arrFeaturedProducts);

		$body .= $this->loadView("Views/footer.php");

		include("Views/mainTemplate.php");
	}

	public function products()
	{
		$body = $this->loadView("Views/mainnav.php");

		$arrProducts = Products::getAll(); // call the model to get all our people
		$body .= $this->loadView("Views/recordsAsList.php", $arrProducts);

		$body .= $this->loadView("Views/footer.php");

		include("Views/mainTemplate.php");
	}

	public function resources()
	{
		$body = $this->loadView("Views/mainnav.php");

		$arrResources = Resources::getAll(); // call the model to get all our people
		$body .= $this->loadView("Views/recordsAsList.php", $arrResources);

		$arrFeaturedProducts = Products::getFeatured();
		$body .= $this->loadView("Views/productsPreview.php", $arrFeaturedProducts);
		$body .= $this->loadView("Views/footer.php");

		include("Views/mainTemplate.php");
	}

	public function preTrip()
	{
		// this function will run before doing any routes inside this controller
		Util::log("checking login");
	}

	public function postTrip()
	{
		// this function will run after running a routes inside this controller
	}
}

?>