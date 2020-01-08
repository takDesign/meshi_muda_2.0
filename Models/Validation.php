<?php

$con = mysqli_connect("localhost", "root", "", "seal");
// var_dump($con);
// die;

$password = mysqli_real_escape_string($con, $_POST['password']);
$user = mysqli_real_escape_string($con, $_POST['username']);
// echo ($user);
// echo($password);
// die;

$sql  = "SELECT * FROM users WHERE strUserName='".$user."'";
$results = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($results);
// echo ($sql);
// die;

if (password_verify($_POST["password"], $user["strPassword"])) 
{
	header("location: dashboard.php?success=true");
}
else{
    echo "you aren't in our database";
	//Redirect user to login or registration page if they aren't in the Db
	// header("location: register.php");
    // header("location: index.php?success=false");
}

?>