<?php
session_start(); //tracking user when they log in
//looks in the files, libs, controls and models - means you don't have to do your includes
include("autoload.php");
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
