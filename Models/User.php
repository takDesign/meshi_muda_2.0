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
            $results = Db::query($con, "SELECT * FROM users WHERE id=
        '" . mysqli_real_escape_string($con, $_SESSION["userid"]) . "'
        ");

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

    static public function requestPwReset()
    {
        $con = Db::con();

        if (isset($_POST['recovery'])) {
            //declare empty vars for later use
                $password = ''; 
                $validUser = false; 
                $error = '';
            // check the security answer and email in db 
                $security = $_POST['security'];
                $email = $_POST['email'];
                $sql = "SELECT * FROM users WHERE 
                strEmail='" . mysqli_real_escape_string($con, $email) . "' AND strCity='" . mysqli_real_escape_string($con, $security) . "' ";

                $results = Db::query($con, $sql);
                $user = mysqli_fetch_assoc($results);

                // if the security answer and email have a match in the db the user is valid
                $validUser = ($user) ? true : false;
                // if the security answer and email DON'T match in the db the user bogus
                if (!$validUser) {
                    $error .= '&Error=true';
                }
            }
            // if the user is valid allow them to reset their password ELSE send them back to pw reset page
            if ($validUser) {
                header("location: index.php?controller=outside&route=showSetNewPw");
            } else {
                header("location: index.php?controller=outside&route=showReset$error");
            }
            // $security = $_POST['security'];
            // $email = $_POST['email'];
            // $sql = "SELECT * FROM users WHERE strEmail='" . mysqli_real_escape_string($con, $email) . "' AND strCity='" . mysqli_real_escape_string($con, $security) . "' ";
            // $results = mysqli_query($con, $sql);
            // echo $sql;
            // die;

            // if (!empty($email) && !empty($security) && mysqli_fetch_assoc($results) > 0 && !filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            //     $_SESSION['email'] = $email;
            //     header("location: index.php?controller=outside&route=showSetNewPw");
            // }
            // if (mysqli_fetch_assoc($results)<1) {
            //     header("location: index.php?controller=outside&route=showReset&Error=true");
            // }
    }

    // static public function getVerification()
    // {
    //     if(isset($_GET['email'], $_GET['token'])){
    //         $con = Db::con();
    //         $email = $_GET["email"];
    //         $reset_token = $_GET["token"];

    //         $results = Db::query($con, "SELECT * FROM reset-password WHERE strEmail = '" . mysqli_real_escape_string($con, $email) . "' AND strToken = '" . mysqli_real_escape_string($con, $reset_token) . "'");
    //         $result = mysqli_query($con, $sql);

    //         $user = mysqli_fetch_assoc($results);
    //         return $user;
    //     } else {
    //         return false;
    //     }
    // } 

    static public function setNewPw()
    {
        $con = Db::con();

        // $password = $_POST['password'];

        // $sql = "UPDATE users 
        // SET strPassword=('" . mysqli_real_escape_string($con, $password) . "') 
        // WHERE strEmail='".$_SESSION['email']."' ";
        // // mysqli_query($con, $sql);
        // // echo $sql;
        // // die;

        // if (mysqli_query($con, $sql)) {
        //     // show a success message to user telling them to check their email
        //     header("location: index.php?controller=outside&route=showLogin&pwReset=true");
        // } else {
        //     header("location: index.php?controller=outside&route=showLogin&pwReset=false");
        // }

        $password = ""; // empty variables catches data from form input fields
        $validPassword = false; // setting variables to be false to later turn true once validation occurs
        $error = '';

        // password validation
        if ($_POST['password'] !== '') {
            $password =  mysqli_real_escape_string($con, $_POST['password']);
            $reg = '/^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{8,}$/'; // Password must contain at least one letter, at least one number, and be longer than six charaters. 
            $reg_check = preg_match($reg, $password);
            $validPassword = ($reg_check) ? true : false;
            if (!$validPassword) {
                $error .= 'passwordError=true';
            }
        }
        // if validation is truehash password
        if ($validPassword) {
            $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $sql =
                "UPDATE users 
                SET strPassword='" . $hashedPassword . "'
                WHERE strEmail='" . $_SESSION['email'] . "' 
                ";
            mysqli_query($con, $sql);
            // echo $sql;
            // die;
            // show a success message to user telling them to check their email
            header("location: index.php?controller=outside&route=showLogin&pwReset=true");
        } else {
            header("location: index.php?controller=outside&route=showLogin&pwReset=false");
        }
    }

    static public function saveRegister()
    {
        $con = Db::con();

        // empty variables catches data from form input fields
        $email = "";
        $password = "";

        // setting variables to be false to later turn true once validation occurs
        $validEmail = false;
        $validPassword = false;
        $error = '';

        // email validation - letters & numbers, must have 1 @, must have 1 . , email suffix must be a minimum of 2 characters
        if ($_POST['email'] !== '') {
            $email = $_POST['email'];
            $reg = "/[a-zA-Z0-9.\-_]{3,}+@{1}[a-zA-Z0-9]{4,}[.]{1}[a-zA-Z]{2,}/";
            $reg_check = preg_match($reg, $email);
            $validEmail = ($reg_check) ? true : false;
            if (!$validEmail) {
                $error .= 'emailError=true&';
            }
        }

        // password validation - 
        if ($_POST['password'] !== '') {
            $password = $_POST['password'];
            $reg = '/^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{8,}$/'; // Password must contain at least one letter, at least one number, and be longer than six charaters. 
            $reg_check = preg_match($reg, $password);
            $validPassword = ($reg_check) ? true : false;
            if (!$validPassword) {
                $error .= 'passwordError=true';
            }
        }
        // if validation is true, sanitize and hash password
        if ($validEmail && $validPassword) {
            $city = $_POST['city'];
            $arrClean["city"] = mysqli_real_escape_string($con, $city);

            $email = $_POST['email'];
            $arrClean["email"] = mysqli_real_escape_string($con, $email);

            $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);

            $statement = $con->prepare("INSERT INTO users (strEmail, strPassword, strCity) VALUES (?, ?, ?)");
            // echo $statement;
            // die;
            $statement->bind_param("sss", $arrClean["email"], $hashedPassword, $arrClean["city"]);
            $statement->execute();

            // Just to set $_SESSION['userid'], $_SESSION["username"]
            $results = Db::query($con, "SELECT * FROM users WHERE strEmail= '" . $arrClean["email"] . "'");
            $user = mysqli_fetch_assoc($results);

            $_SESSION["userid"] = $user["id"];
            $_SESSION["username"] = $user["strEmail"];

            header("location: index.php?controller=inside&route=showDashboard&account=true");
        } else if (isset($error)) {
            header("location: index.php?controller=outside&route=showSignUp.$error");
        }
    } // end save register
}
