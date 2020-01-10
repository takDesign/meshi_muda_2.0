<?php
session_start(); //tracking user when they log in
//looks in the files, libs, controls and models - means you don't have to do your includes

function autoloader($class) {
    // automatically adding the php extension to $class files
    $filename = $class.".php";
    // load all files
    $arrPlaces = array("Libs", "Models", "Views", "Controllers");

    foreach($arrPlaces as $place)
    {
        if (file_exists($place."/$filename"))
        {
            include_once($place."/".$filename);
        }
    }
}
spl_autoload_register('autoloader');


//should bring me to outside?
$controller = "outside";
$route = "showLogin";

if (isset($_GET["controller"]) && isset($_GET["route"])) {
	$controller = $_GET["controller"];
	$route = $_GET["route"];
}

$routeInfo = Util::loadControllerRouter($controller, $route); // my controller is called outside

//route info is an array that has controller 
$oController = new $routeInfo["controller"]();

if (method_exists($oController, $routeInfo["route"])) {

	$oController->preTrip(); //runs teh tpretrip in the controller
	$oController->{$routeInfo["route"]}(); //this is where we are executing from, can be get variable or post variable
	$oController->postTrip(); //after it gets the route it runs the post trip
} else {
	$oController->error($routeInfo["controller"], $routeInfo["route"]);
}
