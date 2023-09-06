<?php
require_once('includes/dbh-inc.php');
require_once('includes/functions-inc.php');

session_start(); // Call session_start() before any output

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['username'];

// Fetch cart data for the user
$cart_table_name = "cart_" . $user_id;
$cart_query = "SELECT cartID, productID, quantity FROM $cart_table_name";
$cart_result = mysqli_query($conn, $cart_query);

$cart_items = [];

while ($row = mysqli_fetch_assoc($cart_result)) {
    $cart_items[] = $row;
}

// Fetch product details for each cart item
foreach ($cart_items as &$cart_item) {
    $product_id = $cart_item['productID'];
    $product_query = "SELECT * FROM products WHERE pid = $product_id";
    $product_result = mysqli_query($conn, $product_query);

    if ($product_result && mysqli_num_rows($product_result) > 0) {
        $product_data = mysqli_fetch_assoc($product_result);
        $cart_item['productData'] = $product_data;
    }
}

mysqli_free_result($cart_result);

// Now $cart_items contains an array of cart items with product data
// You can use this data to display the products in the user's cart
