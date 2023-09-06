<?php
// Start or resume the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect or handle the case where the user is not logged in
    header('Location: ../login.php');
    exit();
}

// Include the database connection file
require_once 'dbh-inc.php';

// Fetch the user's information from the session
$username = $_SESSION['username'];

// Check if the database connection was successful
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Prepare a query to fetch user data based on the username
$user_query = "SELECT userId, usersPhoneNo FROM users WHERE usersName = '$username'";

// Execute the query
$result = mysqli_query($conn, $user_query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Fetch the user's data from the query result
$row = mysqli_fetch_assoc($result);

// Extract the user data
$userId = $row['userId'];
$phoneNumber = $row['usersPhoneNo'];


// Process the selected water quantity if it's submitted
if (isset($_POST['submit'])) {
    $quantity = $_POST['submit'];
    

    // Insert the order into the 'watersupplyorders' table
    $insert_query = "INSERT INTO watersupplyorders (userId, userName, waterQuantity, userPhoneno) VALUES ('$userId', '$username', '$quantity', '$phoneNumber')";

    // Execute the insert query
    $insert_result = mysqli_query($conn, $insert_query);

    // Check if the insertion was successful and handle errors accordingly
    if ($insert_result) {

        // Order successfully placed
        // Redirect or display a success message
        header('Location: ../watersupply.php?error=none');
        exit();
    } else {
        

        // Order failed
        // Handle the error, display an error message, or redirect as needed
        header('Location: ../watersupply.php?error=doitagain');
        exit();
    }

}else{
    header('Location: ../watersupply.php?error=didntworkasusual');
    exit();
}

// Close the database connection
mysqli_close($conn);