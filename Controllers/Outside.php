<?php
class Outside extends Controller
{
    // index.php?controller=outside&route=default
    public function
    default()
    {}

    public function showSignUp()
    {
        $body = $this->loadView("Views/signUpPage.php");

        include("Views/mainTemplate.php"); // this mainTemplate is expecting $body
    }

    public function processSignUp()
    {
        User::saveRegister($_POST["email"], $_POST["password"], $_POST["city"]);
    }

    public function showLogin()
    {
        $body = $this->loadView("Views/loginPage.php");

        include("Views/mainTemplate.php"); // this mainTemplate is expecting $body
    }

    public function processLogin()
    {
        //I also have to send things here...
        $bLogInStatus = User::login($_POST["email"], $_POST["password"]);

        if ($bLogInStatus) {
        // look for a controller called suggestions and the method inside their called "new"
            header("location: index.php?controller=inside&route=showDashboard&login=true");
        } else {
        // echo "jk we couldn't quite get ya there...";
            header("location: index.php?error=true");
        }
    }

    public function showReset()
    {
        $body = $this->loadView("Views/pwResetPage.php");

        include("Views/mainTemplate.php"); 
    }

    public function sendReset()
    {
        // user is sent an email with a personal link to reset pw
        User::requestPwReset($_POST["email"]);
    }

    public function showSetNewPw()
    {
        $body = $this->loadView("Views/setNewPwPage.php");

        include("Views/mainTemplate.php"); 
        // echo $_SESSION["email"];
        // die;
    }

    public function processReset()
    {
        // verify user credentials
        // User::getVerification($_GET['email'], $_GET['token']);
        // user can update pw in db
        User::setNewPw($_SESSION["email"]);
        // echo $sql;
        // die;
    }

    public function processLogout()
    {
        $_SESSION['userID'] = false;
        session_destroy();
        header("location: index.php");
    }

    public function preTrip()
    {
        // this function will run before doing any routes inside this controller
        $viewDir = 'Views/';
    }

    public function postTrip()
    {
        // this function will run after running a routes inside this controller
    }
}
