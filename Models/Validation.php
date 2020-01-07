<?php
//this is in view because sees the user and is apart of the user interface process?

// $ini = parse_ini_file("../../dbconfig.ini");
// $con = mysqli_connect($ini["host"], $ini["username"], $ini["password"], $ini["database"]);
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
	//if you aren't in our db then you get to register!
	// header("location: register.php");
    // header("location: index.php?success=false");

}

?>