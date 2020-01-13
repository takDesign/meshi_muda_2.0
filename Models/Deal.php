<?php
class Deal
{
	var $id;
	var $strRestaurant;
    var $strDeal;
    var $strImage;
    var $strWhen;
    
	public function __construct($id, $restaurant, $deal, $image, $datePosted)
	{
		$this->id = $id;
		$this->strRestaurant = $restaurant;
        $this->strDeal = $deal;
        $this->strImage = $image;
		$this->strWhen = $datePosted;
    }
    
	// public static function suggest($deal)
	// {
	// 	date_default_timezone_set('America/Vancouver');
	// 	$datePosted =  date("Y-m-d H:i:s"); // the MySQL DATETIME format
	// 	$con = Db::con();
	// 	$num = Db::query($con, "INSERT INTO deals (strRestaurant, strDeal, strWhen) VALUES ('" . mysqli_real_escape_string($con, $deal)) ");
	// 	if ($num) {
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
    // }
    
	public static function getAll()
	{
		// go to the database and get a bunch of deals
		$con = Db::con();
		$results = Db::query(
			$con,
			"SELECT * FROM deals 
			ORDER BY deals.id DESC
			"
		);
		while ($deal = mysqli_fetch_assoc($results)) {
			$arrDeals[] = new Deal(
				$deal["id"],
				$deal["strRestaurant"],
                $deal["strDeal"],
                $deal["strImage"],
				$deal["strWhen"]
			);
		}
		return $arrDeals;
	}
}