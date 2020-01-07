<?php

class User
{
	static public function login($email, $password)
	{
		$con = Db::con();

		//IMPORTANT --> you have to just check for username
		$results = Db::query($con, "SELECT * FROM users WHERE strEmail='" . mysqli_real_escape_string($con, $email) . "'");

		$user = mysqli_fetch_assoc($results);

		//POST is the users input, so if it matches the hashed password in the db then success!
		if (password_verify($_POST["password"], $user["strPassword"])) {
			// echo "Welcome to the Dash bb ---->";//PASSWORDS MATCH THE DB!
			$_SESSION["userid"] = $user["id"];
			$_SESSION["username"] = $user["strUserName"];
			return true;
		} else {
			return false;
			// print_r("Wrong Password ---->" . $_POST["password"] . ' ' . $user["strPassword"]);
		} // end login function
	}

	static public function getCurrentUser()
	{

		if (isset($_SESSION["userid"])) {
			$con = Db::con();
			$results = Db::query($con, "SELECT * FROM users WHERE id='" . mysqli_real_escape_string($con, $_SESSION["userid"]) . "'");

			$user = mysqli_fetch_assoc($results);
			return $user;
		} else {
			return false;
		}
	} // end get current user function

	static public function checkLoggedIn()
	{
		if ($_SESSION["userid"]) {
			return $_SESSION["userid"];
		} else {
			header ("location: index.php?error=true");
		}
	} // end check logged in function

	static public function saveRegister()
	{
		$con = Db::con();
		// empty variables catches data from form input fields
		$firstName = "";
		$lastName = "";
		$email = "";
		$userName = "";
		$password = "";
		// setting variables to be false to later turn true once validation occurs
		$validFirstName = false;
		$validLastName = false;
		$validEmail = false;
		$validUserName = false;
		$validPassword = false;
		$error = '';
		// first name validation - only letters, minimum of 2
		if ($_POST['strFirstName'] !== '') {
			$firstName = $_POST['strFirstName'];
			$reg = "/^([a-zA-Z' ]+){2,}$/";
			$reg_check = preg_match($reg, $firstName);
			$validFirstName = ($reg_check) ? true : false;
			if (!$validFirstName) {
				$error .= 'firstNameError=true&';
			}
		}
		// last name validation - only letters, minimum of 2
		if ($_POST['strLastName'] !== '') {
			$lastName = $_POST['strLastName'];
			$reg = "/^([a-zA-Z' ]+){2,}$/";
			$reg_check = preg_match($reg, $lastName);
			$validLastName = ($reg_check) ? true : false;
			if (!$validLastName) {
				$error .= 'lastNameError=true&';
			}
		}
		// email validation - letters & numbers, must have 1 @, must have 1 . , email suffix must be a minimum of 2 characters
		if ($_POST['strEmail'] !== '') {
			$email = $_POST['strEmail'];
			$reg = "/[a-zA-Z0-9.\-_]{3,}+@{1}[a-zA-Z0-9]{4,}[.]{1}[a-zA-Z]{2,}/";
			$reg_check = preg_match($reg, $email);
			$validEmail = ($reg_check) ? true : false;
			if (!$validEmail) {
				$error .= 'emailError=true&';
			}
		}
		// username validation - letters 
		if ($_POST['strUserName'] !== '') {
			$userName = $_POST['strUserName'];
			$reg =  "/^([a-zA-Z'\-_ ]+){2,}$/";
			$reg_check = preg_match($reg, $userName);
			$validUserName = ($reg_check) ? true : false;
			if (!$validUserName) {
				$error .= 'userNameError=true&';
			}
		}
		// password validation - 
		if ($_POST['strPassword'] !== '') {
			$password = $_POST['strPassword'];
			$reg = '/\A(?=.*?[a-zA-Z])(?=.*?\d)(?=.*?[!-\/:-@[-`{-~])[!-~]{8,100}+\z/i'; // check if it is longer than 8 charactors and  has lowercase, uppercase, number, special charactor 
			$reg_check = preg_match($reg, $password);
			$validPassword = ($reg_check) ? true : false;
			if (!$validPassword) {
				$error .= 'passwordError=true';
			}
		}
		// if validation is true, sanitize and hash password
		if ($validFirstName && $validLastName && $validEmail && $validUserName && $validPassword) {
			$firstName = $_POST['strFirstName'];
			$arrClean["strFirstName"] = mysqli_real_escape_string($con, $firstName);

			$lastName = $_POST['strLastName'];
			$arrClean["strLastName"] = mysqli_real_escape_string($con, $lastName);

			$email = $_POST['strEmail'];
			$arrClean["strEmail"] = mysqli_real_escape_string($con, $email);

			$userName = $_POST['strUserName'];
			// use mysqli_real_escape_string to clean the variable from the user
			$arrClean["strUserName"] = mysqli_real_escape_string($con, $userName);

			$hashedPassword = password_hash($_POST["strPassword"], PASSWORD_DEFAULT);

			$statement = $con->prepare("INSERT INTO users (strFirstName, strLastName, strEmail, strUserName, strPassword) VALUES (?, ?, ?, ?, ?)");
			// echo $statement;
			// die;
			$statement->bind_param("sssss", $arrClean["strFirstName"], $arrClean["strLastName"], $arrClean["strEmail"], $arrClean["strUserName"], $hashedPassword); //ssis is the pattern - so ss is the string, string
			$statement->execute();

			// Just to set $_SESSION['userid'], $_SESSION["username"]
			$results = Db::query($con, "SELECT * FROM users WHERE strUserName = '" . $arrClean["strUserName"] . "'");

			$user = mysqli_fetch_assoc($results);

			$_SESSION["userid"] = $user["id"];
			$_SESSION["username"] = $user["strUserName"];

			header("location: index.php?controller=inside&route=showDashboard&account=true");
		} else if (isset($error)) {
			header("location: index.php?$error");
		}
	} // end save register
}
