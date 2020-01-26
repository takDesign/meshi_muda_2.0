<?php
class Deal
{
	var $id;
	var $strRestaurant;
    var $strDeal;
    var $strImage;
    var $strLocation;
    var $strWhen;
    
	public function __construct($id, $restaurant, $deal, $image, $location, $datePosted)
	{
		$this->id = $id;
		$this->strRestaurant = $restaurant;
        $this->strDeal = $deal;
        $this->strImage = $image;
        $this->strLocation = $location;
		$this->strWhen = $datePosted;
    }
    
	public static function postDeal()
	{
        $con = Db::con();

        $restaurant = $_POST["strRestaurant"];
        $deal = $_POST["strDeal"];
        $image = "https://image.flaticon.com/icons/svg/763/763853.svg";
        $price = "0.00";
        $validity = "Today until close";
        $location = $_POST["strLocation"];

        $sql = "INSERT INTO deals (
        strRestaurant, 
		strDeal, 
        strImage,
        nPrice,
		strWhen,
        strLocation
        ) VALUES (
        '".mysqli_real_escape_string($con, $restaurant)."',
		'".mysqli_real_escape_string($con, $deal)."',
        '".mysqli_real_escape_string($con, $image)."',
        '".mysqli_real_escape_string($con, $price)."',
		'".mysqli_real_escape_string($con, $validity)."',
        '".mysqli_real_escape_string($con, $location)."'
        )";
echo $sql;
die;
        mysqli_query($con, $sql);
        
        header("location: index.php?controller=inside&route=showDashboard&successPost=true");
    }
    
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
                $deal["strLocation"],
				$deal["strWhen"]
			);
		}
		return $arrDeals;
	}
}