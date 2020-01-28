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

    $successPost = Deal::postDeal($_POST["strRestaurant"], $_POST["strDeal"], $_POST["strLocation"]);

    if ($successPost) {
      header("location: index.php?controller=inside&route=showDashboard&successPost=true");
    } else {
      header("location: index.php?controller=inside&route=showDashboard&successPost=false");
    }
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
