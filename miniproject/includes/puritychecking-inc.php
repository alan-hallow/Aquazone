<?php



session_start();


if (isset($_POST["submit"])) {

    $date = $_POST["selectdate"];
    $time = $_POST["selecttime"];

    require_once 'dbh-inc.php';
    require_once 'functions-inc.php';

    if(emptyTimeDate($date, $time) !== false) {

        header("location: ../puritycheckingdetails.php?error=emptyinput");
        exit();
    }

    if(invalidDate($date) !== false) {

        header("location: ../puritycheckingdetails.php?error=invalid_date");
        exit();
    }
    if(invalidTime($time) !== false) {

        header("location: ../puritycheckingdetails.php?error=invalid_time");
        exit();
    }

}
else{

    header("location: ../puritycheckingdetails.php");
    exit();

}


if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $loggedInUsername = $_SESSION['username'];
    $date = $_POST["selectdate"];
    $time = $_POST["selecttime"];
    
    require_once 'dbh-inc.php'; // Assuming this includes the database connection
    require_once 'functions-inc.php';

    // Call the function and handle the result
    $result = makeReservation($conn, $loggedInUsername, $date, $time);

    if ($result === 'success') {
        // Reservation successfully added
        header("location: ../puritycheckingdetails.php?error=none");
        exit();
    } elseif ($result === 'stmtfailed') {
        // Statement preparation failed
        header("location: ../puritycheckingdetails.php?error=stmtfailed");
        exit();
    } elseif ($result === 'insertstmtfailed') {
        // Insert statement preparation failed
        header("location: ../puritycheckingdetails.php?error=insertstmtfailed");
        exit();
    } elseif ($result === 'usernotfound') {
        // No matching user found
        header("location: ../puritycheckingdetails.php?error=usernotfound");
        exit();
    }
} else {
    header("location: ../homepage.php?error=somethingisnothappening");
    // Handle the case when the username session is not set or empty
}
