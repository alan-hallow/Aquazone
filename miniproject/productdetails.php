<?php
    session_start();
require_once ('includes/dbh-inc.php');
require_once ('includes/functions-inc.php');

// Retrieve the product ID from the URL parameter
$product_id = $_GET['product_id'];

// Fetch the details of the selected product based on the product ID
$product = get_product_details($product_id); // Implement this function


// ... (other code) ...



if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $user_id = $_SESSION['username'];
    $product_id = $_GET['product_id']; // Get the product ID from the URL parameter
    $amount = mysqli_real_escape_string($conn, $_POST['quantity']); // Retrieve quantity from form
    
    $cart_table_name = "cart_" . $user_id;
    // Insert the selected product and amount into the user's cart table
    $sql = "INSERT INTO     $cart_table_name (cartID, productID, quantity) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "iii", $user_id, $product_id, $amount);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: mycart.php?productid=$product_id"); // Redirect to cart page or wherever you want
        exit();
    } else {
        // Handle error if insertion fails
        echo "Error: " . mysqli_error($conn);
    }
}

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Product Details</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/productdetailscss.css'>

    
    <script src="https://kit.fontawesome.com/89589cc083.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Makasar&display=swap" rel="stylesheet">

</head>
<body>

<div id="myNav" class="overlay">
        <button class="btnclose" onclick="closeNav()"><i class="fa-solid fa-xmark"></i></button>

        <div class="overlay-content">
            <a href="homepage.php" class="links">Home</a>
            <a href="productlist.php" class="links">Products</a>
            <a href="#" class="links">Water Supply</a>
            <a href="#" class="links">Borewell</a>
            <a href="#" class="links">Service men</a>
            <a href="#" class="links">About</a>
        </div>
        <div class="account">
                <?php
                    if(isset($_SESSION["username"])){
                        echo "<a href='#' class='login'><i class='fa-solid fa-user'></i></a>";
                        echo "<a href='includes/logout-inc.php' class='login'><i class='fa-solid fa-right-from-bracket'></i></a>";
                    }
                    else{
                        echo "<a href='login.php' class='login'>login</a>";
                        echo "<a href='signup.php' class='login'>signup</a>";
                    }
                ?>

            </div>
        <div id="menu-background-pattern"></div>
    </div>
    <div class="contents">
    
        <div class="header">
            <div class="aquazone-logo">
                <font color="#007aff">Aqua</font>
                <font color="#ffffff">Zone</font>
            </div>
            <div class="pagename">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <button class="btnopen" onclick="openNav()"><i class="fa-solid fa-bars-staggered" ></i></button>
        </div>
    </div>

    <div class="container">


        




        
        <div class="changingimages">
            <div class="thumbnail-container">
            <?php

            echo "<img src=\"images/".$product['image_one']."\" class=\"thumbnail\">";
            echo "<img src=\"images/".$product['image_two']."\" class=\"thumbnail\">";
            echo "<img src=\"images/".$product['image_three']."\" class=\"thumbnail\">";
            echo "<img src=\"images/".$product['image_four']."\" class=\"thumbnail\">";

            ?>
            <!-- Add more thumbnails here -->
            </div>
            <div class="main-image-container">
            <img id="mainImage" src="image1.jpg" alt="Main Image">
            </div>
        </div>
    


        <div class="details">
            <div class="item name">
                <?php
                
                echo $product['pName'];
                ?>
            </div>
            <div class="item about">
            <span class="abouthead">Description</span>
            <?php
            echo "<span class='aboutbody'>" . $product['pDescription'] . "</span>";
            ?>

            </div>
            <div class="item specifications">
                <span class="specificationsone">Specifications</span>
                <?php
                echo "<span class='aboutbody'>" . $product['pSpecification'] . "</span>";
                ?>
            </div>
            <div class="item extras">
                <span class="extrasdetails">Shipment details</span>
                <li>Available: <span>in stock</span></li>
                <li>Category: <span>Shoes</span></li>
                <li>Shipping Area: <span>India</span></li>
                <li>Shipping Fee: <span>Free</span></li>
            </div>
            <!-- <div class="item amount">
                <div class="amountone">
                    <button class="amountbtn decrementbtn" onclick="decrement()">-</button>
    
                    <div class="amountvalue">
                      <span id="valueresult">1</span>
                    </div>
    
                    <button class="amountbtn incrementbtn" onclick="increment()">+</button>
                  </div>
            </div> -->
            <div class="item price">
                <div class="priceleft">

                    <div class="productdetails lineleft">
                        <span class="priceinfo">Sub Total ($)</span>
                        <span class="priceinfo">Shipment ($)</span>
                        <span class="priceinfo">Discount ($)</span>
                    </div>
                    
                    
                    <div class="productdetails lineright">
                    <?php
            echo "<span class='pricecash'>" . $product['pPrice'] . "</span>";
            ?>

                        <span class="pricecash"> 15.00 </span>
                        <span class="pricecash"> -10.00 </span>
                    </div>

                </div>

                <div class="productdetails linetotal">
                    <span class="datatotal">Total</span>
                    <!-- echo \"<span class='cashtotal' id='totvalue'>\ . $product['pPrice'] . "</span>\"; -->
                    <?php
                    echo "<span class='cashtotal' id='totvalue'>" . $product['pPrice'] . "</span>";
                    ?>
                </div>

            </div>

            <form action="" method="post">

                <div class="item amount">
                    <input type="number" name="quantity" placeholder="1" id="postal" min="1" max="20" />
                </div>



                <div class="item order">
                    <button type="submit" name="submit" id="submit" class="submitbutton btn btn-1"onclick="calculateAndDisplay()">Add to Cart<i class = "fas fa-shopping-cart"></i></button>
                </div>
            </form>

        </div>
    </div>

    <?php

    include "footer.php";
    ?>
  <script src='js/productdetailsjs.js'></script>
</body>
</html>