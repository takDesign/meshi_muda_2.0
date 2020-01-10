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

        $city = $_POST['city'];
        
        $username = $_POST['email'];

        $arrClean["username"] = mysqli_real_escape_string($con, $username);
        $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
        
        $statement = $con->prepare("INSERT INTO users (strEmail, strPassword, strCity) VALUES (?, ?, ?)");
        // echo $statement;
        // die;
        $statement->bind_param("sss", $arrClean["username"], $hashedPassword, $city); // s = string
        $statement->execute();

        header("location: index.php?newaccount");
    } // end save register
}
