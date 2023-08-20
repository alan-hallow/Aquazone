<?php

require_once('../includes/dbh-inc.php');

function display_product_table(){

    global $conn;

    $query = "SELECT * FROM products";

    $result = mysqli_query($conn, $query);
    
    return $result;
}

