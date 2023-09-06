<?php
    session_start();
require_once ('includes/dbh-inc.php');
require_once ('includes/functions-inc.php');

$result = display_product_table();


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Products</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/productlistcss.css'>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='css/header.css'> -->

    <script src="https://kit.fontawesome.com/89589cc083.js" crossorigin="anonymous"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    
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


    <div class="contentsofthefullproductslistpage">
    
        <div class="header">
            <div class="aquazone-logo">
                <font color="#1597BB">Aqua</font>
                <font color="#ffffff">Zone</font>
            </div>
            <div class="pagename">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <button class="btnopen" onclick="openNav()"><i class="fa-solid fa-bars-staggered" ></i></button>
        </div>


        <div class="intro">

            <h1 id="intromain">The Products We Sell</h1>
            <h3 id="introsub">At AquaZone, we take pride in offering a diverse range of high-quality products to meet your water-related needs. Our collection features a carefully curated selection of products designed to enhance your water experience. From innovative water supply solutions and reliable borewell equipment to stylish water accessories and skilled service professionals, our product lineup is designed to cater to a variety of preferences and requirements. </h3>

        </div>

        <div class="containerofthefullproductslistpage">
            <?php
       

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<a href=\"productdetails.php?product_id=".$row['pid']."\" class=\"items\">";
                echo "<div class=\"image\">";
                echo "<img src=\"images/".$row['image_one']."\" class=\"photo-on-display\">";
                echo "<p class=\"pprice\">₹".$row['pPrice']."</p>";
                echo "</div>";
                echo "<div class=\"text\">";
                echo "<p class=\"ptext\">".$row['pName']."</p>";
                echo "</div>";
                echo "</a>";
            }
            ?>
        </div>

    </div>
<?php

include "footer.php";
?>
    <script src='js/productlistjs.js'></script>  
      
</body>
</html>