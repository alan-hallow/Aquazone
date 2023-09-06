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
    session_start(); // Start the session at the beginning

    $sql = "INSERT INTO users (usersName, usersEmail, usersAddress, usersPostalCode, usersPhoneNo, usersPassword) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $address, $postal_code, $phone_no, $hashedpassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $_SESSION["username"] = $name; // Store the username in the session

    // Get the user ID of the newly inserted user
    $user_id = mysqli_insert_id($conn);

    // Create a cart table for the user using their username as the table name
    $cart_table_name = "cart_" . $name;
    $create_cart_table_sql = "CREATE TABLE $cart_table_name (
        cartID INT AUTO_INCREMENT PRIMARY KEY,
        productID INT NOT NULL,
        quantity INT NOT NULL
    );";
    mysqli_query($conn, $create_cart_table_sql);

    // Create an ordered products table for the user using their username as the table name
    $ordered_products_table_name = "ordered_products_" . $name;
    $create_ordered_products_table_sql = "CREATE TABLE $ordered_products_table_name (
        orderID INT AUTO_INCREMENT PRIMARY KEY,
        productID INT NOT NULL,
        quantity INT NOT NULL,
        orderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";
    mysqli_query($conn, $create_ordered_products_table_sql);

    header("location: ../homepage.php?error=none");
    exit();
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
        header("location: ../homepage.php");
        exit();
    }
}


function display_product_table(){

    global $conn;

    $query = "SELECT * FROM products";

    $result = mysqli_query($conn, $query);
    
    return $result;
}



function get_product_details($product_id) {
    global $conn; // Assuming $conn is your database connection variable

    // Escape the input to prevent SQL injection
    $product_id = mysqli_real_escape_string($conn, $product_id);

    // Query to fetch product details based on the provided product_id
    $query = "SELECT * FROM products WHERE pid = '$product_id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the row as an associative array
        $product = mysqli_fetch_assoc($result);
        return $product;
    } else {
        // Return an empty array or false if no product is found
        return false;
    }
}







// Function to check if date and time are empty
function emptyTimeDate($date, $time) {
    return (empty($date) || empty($time));
}

// Function to check if the date is not in the future
function invalidDate($date) {
    $today = strtotime(date("Y-m-d"));
    $providedDate = strtotime($date);

    if ($providedDate <= $today) {
        header("location: ../puritycheckingdetails.php?error=invalid_date");
        exit();
    }

    return ($providedDate <= $today);
}



// Function to check if the time is not within the allowed range (10 am to 6 pm)
function invalidTime($time) {
    $startTime = strtotime("10:00 AM");
    $endTime = strtotime("6:00 PM");
    $providedTime = strtotime($time);

    if ($providedTime < $startTime || $providedTime > $endTime) {
        header("location: ../puritycheckingdetails.php?error=invalid_time");
        exit();
    }

    return ($providedTime < $startTime || $providedTime > $endTime);
}




function makeReservation($conn, $loggedInUsername, $date, $time) {
    // Fetch user ID based on the username
    $sql_fetch_user = "SELECT userId FROM users WHERE usersName = ?";
    $stmt_fetch_user = mysqli_stmt_init($conn);

    // Prepare the SQL statement for fetching user data
    if (!mysqli_stmt_prepare($stmt_fetch_user, $sql_fetch_user)) {
        return 'stmtfailed';
    }

    // Bind the parameters and execute the statement
    mysqli_stmt_bind_param($stmt_fetch_user, "s", $loggedInUsername);
    mysqli_stmt_execute($stmt_fetch_user);

    // Get the result of the executed statement
    $result = mysqli_stmt_get_result($stmt_fetch_user);

    // Check if a matching user is found
    if ($row = mysqli_fetch_assoc($result)) {
        $loggedInUserId = $row['userId'];

        // Insert reservation into puritycheckingreservation table
        $sql_insert_reservation = "INSERT INTO puritycheckingreservations (userId, username, `date`, `time`) VALUES (?, ?, ?, ?)";
        $stmt_insert_reservation = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt_insert_reservation, $sql_insert_reservation)) {
            return 'insertstmtfailed';
        }

        // Bind the parameters and execute the statement
        mysqli_stmt_bind_param($stmt_insert_reservation, "isss", $loggedInUserId, $loggedInUsername, $date, $time);
        mysqli_stmt_execute($stmt_insert_reservation);

        // Close the statement for inserting reservation
        mysqli_stmt_close($stmt_insert_reservation);

        return 'success';
    } else {
        // No matching user found
        return 'usernotfound';
    }

    // Close the statement for fetching user data
    mysqli_stmt_close($stmt_fetch_user);
}





// Function to check if date and time are empty
function helpempty($help) {
    return (empty($help));
}




function help($conn, $loggedUsername, $help) {
    // Fetch user email based on the username
    $sql_fetch_user = "SELECT usersEmail FROM users WHERE usersName = ?";
    $stmt_fetch_user = mysqli_stmt_init($conn);

    // Prepare the SQL statement for fetching user data
    if (!mysqli_stmt_prepare($stmt_fetch_user, $sql_fetch_user)) {
        return 'stmtfailed';
    }

    // Bind the parameters and execute the statement
    mysqli_stmt_bind_param($stmt_fetch_user, "s", $loggedUsername);
    mysqli_stmt_execute($stmt_fetch_user);

    // Get the result of the executed statement
    $result = mysqli_stmt_get_result($stmt_fetch_user);

    // Check if a matching user is found
    if ($row = mysqli_fetch_assoc($result)) {
        $loggedemail = $row['usersEmail']; // Fix the column name here

        // Insert help request into help table
        $sql_insert_help = "INSERT INTO help (username, helptext, useremail) VALUES (?, ?, ?)";
        $stmt_insert_help = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt_insert_help, $sql_insert_help)) {
            return 'insertstmtfailed';
        }

        // Bind the parameters and execute the statement
        mysqli_stmt_bind_param($stmt_insert_help, "sss", $loggedUsername, $help, $loggedemail);
        mysqli_stmt_execute($stmt_insert_help);

        // Close the statement for inserting help request
        mysqli_stmt_close($stmt_insert_help);

        return 'success';
    } else {
        // No matching user found
        return 'usernotfound';
    }

    // Close the statement for fetching user data
    mysqli_stmt_close($stmt_fetch_user);
}
