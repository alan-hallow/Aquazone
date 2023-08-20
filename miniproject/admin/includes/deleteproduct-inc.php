<?php
    require_once '../../includes/dbh-inc.php';  // Include the database connection

    // Check if the 'id' parameter is provided in the URL
    if (isset($_GET['id'])) {
        // Sanitize and validate the ID
        $id = intval($_GET['id']);

        // Construct and execute the DELETE query
        $sql = "DELETE FROM `products` WHERE pid = ?";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("Location: ../productstable.php"); // Redirect back to the main page
            exit();
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
    }
?>
