<?php

if (isset($_POST["submit"])) {
    // Retrieve product details from form
    $pname = $_POST["productName"];
    $pdescription = $_POST["description"];
    $pprice = $_POST["price"];
    $pspecification = $_POST["specification"];

    require_once '../../includes/dbh-inc.php';  // Include the database connection

    // Handle image uploads for all four images
    $allowed = array('jpg', 'jpeg', 'png');

    $fileDestinations = array();  // Array to store uploaded image file paths

    for ($i = 1; $i <= 4; $i++) {
        $file = $_FILES['image' . $i];  // Get the image file from form
        $fileName = $_FILES['image' . $i]['name'];
        $fileTmpName = $_FILES['image' . $i]['tmp_name'];
        $fileSize = $_FILES['image' . $i]['size'];
        $fileError = $_FILES['image' . $i]['error'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        // Check if the file extension is allowed
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                // Check if the file size is within limits
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '../../images/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $fileDestinations[] = $fileDestination;  // Store uploaded image path
                } else {
                    echo "The file $i is too big<br>";
                }
            } else {
                echo "There was an error uploading file $i<br>";
            }
        } else {
            echo "You cannot upload files of this type for image $i<br>";
        }
    }

    // Insert data into the database
    if (emptyproducts($pname, $pdescription, $pprice, $pspecification, $fileDestinations) !== false) {
        header("location: ../productupload.php?error=emptyinput");
        exit();
    }

    // Insert product data into the database
    createProduct($conn, $pname, $pdescription, $pprice, $pspecification, $fileDestinations);
} else {
    // Redirect if the form was not submitted
    header("location: ../productupload.php");
    exit();
}

function emptyproducts($pname, $pdescription, $pprice, $pspecification, $fileDestinations) {
    $result;

    if (empty($pname) || empty($pdescription) || empty($pprice) || empty($pspecification) || in_array("", $fileDestinations)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createProduct($conn, $pname, $pdescription, $pprice, $pspecification, $fileDestinations) {
    // SQL query to insert product data into the database
    $sql = "INSERT INTO products (pName, pDescription, pPrice, pSpecification, image_one, image_two, image_three, image_four) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Redirect with an error message if SQL preparation fails
        header("location: ../productupload.php?error=sqlerror");
        exit();
    } else {
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "ssdsssss", $pname, $pdescription, $pprice, $pspecification, $fileDestinations[0], $fileDestinations[1], $fileDestinations[2], $fileDestinations[3]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        // Redirect with a success message after successful insertion
        header("location: ../productupload.php?uploadsuccess");
        exit();
    }
}
