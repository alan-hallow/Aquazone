<?php

if (isset($_POST["submit"])) {

    $help = $_POST["help"];

    require_once 'dbh-inc.php';
    require_once 'functions-inc.php';

    if(helpempty($help) !== false) {

        header("location: ../help.php?error=emptyinput");
        exit();
    }


}
else{

    header("location: ../help.php?something");
    exit();

}


if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $loggedUsername = $_SESSION['username'];

    $help = $_POST["help"];
    
    require_once 'dbh-inc.php'; // Assuming this includes the database connection
    require_once 'functions-inc.php';

    // Call the function and handle the result
    $result = help($conn, $loggedUsername, $help);

    if ($result === 'success') {
        // Reservation successfully added
        header("location: ../help.php?error=none");
        exit();
    } elseif ($result === 'stmtfailed') {
        // Statement preparation failed
        header("location: ../help.php?error=stmtfailed");
        exit();
    } elseif ($result === 'insertstmtfailed') {
        // Insert statement preparation failed
        header("location: ../help.php?error=insertstmtfailed");
        exit();
    } elseif ($result === 'usernotfound') {
        // No matching user found
        header("location: ../help.php?error=usernotfound");
        exit();
    }
} else {
    header("location: ../homepage.php?error=somethingisnothappening");
    // Handle the case when the username session is not set or empty
}
