<?php 
        $conDets = parse_ini_file("db_config_meshi_muda.ini"); // REMOVE FOR FTP AND REPLACE W/LINE 7
        $con = mysqli_connect($conDets['host'], $conDets['username'], $conDets['password'], $conDets['database']);

        $restaurant = $_POST["strRestaurant"];
        $deal = $_POST["strDeal"];
        $image = "https://image.flaticon.com/icons/svg/763/763853.svg";
        $price = "0.00";
        $validity = "Today until close";
        $location = $_POST["strLocation"];

        $sql = "INSERT INTO deals (
        strRestaurant, 
		strDeal, 
        strImage,
        nPrice,
		strWhen,
        strLocation
        ) VALUES (
        '".mysqli_real_escape_string($con, $restaurant)."',
		'".mysqli_real_escape_string($con, $deal)."',
        '".mysqli_real_escape_string($con, $image)."',
        '".mysqli_real_escape_string($con, $price)."',
		'".mysqli_real_escape_string($con, $validity)."',
        '".mysqli_real_escape_string($con, $location)."'
        )";

        mysqli_query($con, $sql);
        
        header("location: index.php?controller=inside&route=showDashboard&successPost=true");
    ?>