<?php


session_start();
require_once('../includes/dbh-inc.php');

if (isset($_GET['id'])) {
    // Sanitize and validate the ID
    $id = intval($_GET['id']);


    $user_id = $_SESSION['username'];
    // Construct and execute the DELETE query
    $cart_table_name = "cart_" . $user_id;
    $sql = "DELETE FROM $cart_table_name WHERE cartID = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Location: ../mycart.php"); // Redirect back to the main page
        exit();
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
}