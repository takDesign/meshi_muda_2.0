<?php
class Deal
{
    var $id;
    var $strRestaurant;
    var $strDeal;
    var $strImage;
    var $strLocation;
    var $strWhen;
    var $bAvailable;

    public function __construct($id, $restaurant, $deal, $image, $location, $datePosted, $available)
    {
        $this->id = $id;
        $this->strRestaurant = $restaurant;
        $this->strDeal = $deal;
        $this->strImage = $image;
        $this->strLocation = $location;
        $this->strWhen = $datePosted;
        $this->bAvailable = $available;
    }

    public static function postDeal($restaurant, $deal, $location)
    {
        $con = Db::con();
        $image = "https://image.flaticon.com/icons/svg/763/763853.svg";
        $validity = "Today until close";
        $available = 0;

        $sql = "INSERT INTO deals (
            strRestaurant, 
            strDeal, 
            strImage,
            strWhen,
            strLocation,
            bAvailable
            ) VALUES (
            '" . mysqli_real_escape_string($con, $restaurant) . "',
            '" . mysqli_real_escape_string($con, $deal) . "',
            '" . mysqli_real_escape_string($con, $image) . "',
            '" . mysqli_real_escape_string($con, $validity) . "',
            '" . mysqli_real_escape_string($con, $location) . "',
            '" . mysqli_real_escape_string($con, $available) . "'
            )";
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
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
                $deal["strWhen"],
                $deal["bAvailable"]
            );
        }
        return $arrDeals;
    }

    static public function setSoldOut()
    {
        $con = Db::con();

        if(isset($_GET['id'])){

            $available = 1;
            $id = $_GET['id'];

            $sql = "UPDATE deals SET bAvailable=$available WHERE id=$id";

            if (mysqli_query($con, $sql)) {
                return true;
                echo 'done';
            } else {
                return false;
            }
        }
    }
}

