<?php

function emptyInputSignup($name, $email, $address, $postal_code, $phone_no, $password, $passwordrepeat) {
    $result;

    if(empty($name) || empty($email) || empty($address) || empty($postal_code) || empty($phone_no) || empty($password) || empty($passwordrepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalideUserName($name) {
    $result;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $name)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;

    
}

function invalidEmail($email) {
    $result;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;

    
}

function passwordMatch($password, $passwordrepeat) {
    $result;

    if($password !== $passwordrepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;

    
}

function userNameExists($conn, $name, $email) {

    $sql = "SELECT * FROM users WHERE usersName = ? OR usersEmail = ?;";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
    
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $name, $email);

    mysqli_stmt_execute($stmt);


    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {

        return $row;

    }
    else{

        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}



function createUser($conn, $name, $email, $address, $postal_code, $phone_no, $password) {

    $sql = "INSERT INTO users (usersName, usersEmail, usersAddress, usersPostalCode, usersPhoneNo, usersPassword) VALUES (?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
    
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $address, $postal_code, $phone_no, $hashedpassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../header.php?error=none");
}







function emptyInputLogin($name, $password) {
    $result;

    if(empty($name) || empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}




function loginUser($conn, $name, $password) {
    $userNameExists = userNameExists($conn, $name, $name);

    if($userNameExists === false) {
        header("location: ../login.php?error=wronglogin");
    }

    $passwordHashed = $userNameExists["usersPassword"];
    $checkPassword = password_verify($password, $passwordHashed);

    if ($checkPassword === false) {

        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPassword === true) {

        session_start();
        $_SESSION["userid"] = $userNameExists["usersId"];
        $_SESSION["username"] = $userNameExists["usersName"];
        header("location: ../header.php");
        exit();
    }
}


function display_product_table(){

    global $conn;

    $query = "SELECT * FROM products";

    $result = mysqli_query($conn, $query);
    
    return $result;
}

