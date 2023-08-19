<?php

if (isset($_POST["submit"])) {

    $name = $_POST["user_name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $postal_code = $_POST["postal_code"];
    $phone_no = $_POST["phone_no"];
    $password = $_POST["password"];
    $passwordrepeat = $_POST["passwordrepeat"];

    require_once 'dbh-inc.php';
    require_once 'functions-inc.php';

    if(emptyInputSignup($name, $email, $address, $postal_code, $phone_no, $password, $passwordrepeat) !== false) {

        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if(invalideUserName($name) !== false) {

        header("location: ../signup.php?error=invalidusername");
        exit();
    }
    if(invalidEmail($email) !== false) {

        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if(passwordMatch($password, $passwordrepeat) !== false) {

        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if(userNameExists($conn, $name, $email) !== false) {

        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $address, $postal_code, $phone_no, $password);

}
else{

    header("location: ../signup.php");
    exit();

}