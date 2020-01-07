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
      header("location: index.php?error=true");
    }
  } // end check logged in function

  static public function saveRegister()
  {
    $con = Db::con();
    // empty variables catches data from form input fields
    $email = "";
    $password = "";
    $city = "";
    // setting variables to be false to later turn true once validation occurs
    $validEmail = false;
    $validPassword = false;
    $validCity = false;
    $error = '';

    // email validation - letters & numbers, must have 1 @, must have 1 . , email suffix must be a minimum of 2 characters
    if ($_POST['email'] !== '') {
      $email = $_POST['strEmail'];
      $reg = "/[a-zA-Z0-9.\-_]{3,}+@{1}[a-zA-Z0-9]{4,}[.]{1}[a-zA-Z]{2,}/";
      $reg_check = preg_match($reg, $email);
      $validEmail = ($reg_check) ? true : false;
      if (!$validEmail) {
        $error .= 'emailError=true&';
      }
    }
    // password validation - 
    if ($_POST['password'] !== '') {
      $password = $_POST['strPassword'];
      $reg = '/\A(?=.*?[a-zA-Z])(?=.*?\d)(?=.*?[!-\/:-@[-`{-~])[!-~]{8,100}+\z/i'; // check if it is longer than 8 charactors and  has lowercase, uppercase, number, special charactor 
      $reg_check = preg_match($reg, $password);
      $validPassword = ($reg_check) ? true : false;
      if (!$validPassword) {
        $error .= 'passwordError=true';
      }
    }
    // if validation is true, sanitize and hash password
    if ($validEmail && $validPassword) {
      $email = $_POST['email'];
      $arrClean["email"] = mysqli_real_escape_string($con, $email);

      $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);

      $statement = $con->prepare("INSERT INTO users (strEmail, strPassword) VALUES (?, ?)");
      // echo $statement;
      // die;
      $statement->bind_param("ss", $arrClean["strEmail"], $hashedPassword); //ssis is the pattern - so ss is the string, string
      $statement->execute();

      // Just to set $_SESSION['userid'], $_SESSION["username"]
      $results = Db::query($con, "SELECT * FROM users WHERE strEmail = '" . $arrClean["strEmail"] . "'");

      $user = mysqli_fetch_assoc($results);

      $_SESSION["userid"] = $user["id"];
      $_SESSION["useremail"] = $user["strEmail"];

      header("location: index.php?controller=inside&route=showDashboard&account=true");
    } else if (isset($error)) {
      header("location: index.php?$error");
    }
  } // end save register
}
