<?php

require_once ('includes/dbh-inc.php');
require_once ('includes/functions-inc.php');

$result = display_product_table();



?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/productlistcss.css'>

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

    <!-- <div id="myNav" class="overlay">
        <button class="btnclose" onclick="closeNav()"><i class="fa-solid fa-xmark"></i></button>

        <div class="overlay-content">
            <a href="#" class="links">Home</a>
            <a href="#" class="links">Products</a>
            <a href="#" class="links">Water Supply</a>
            <a href="#" class="links">Borewell</a>
            <a href="#" class="links">Service men</a>
            <a href="#" class="links">About</a>
        </div>
        <div id="menu-background-pattern"></div>
    </div> -->

    <?php 

    
    include "header.php";

    
    ?>
    <div class="contents">
    
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
            <h3 id="introsub">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium consectetur aliquid itaque commodi dignissimos velit aliquam illo, maxime eos doloremque quae in? Mollitia cupiditate culpa dolorem, rem quisquam tempora cum.</h3>

        </div>

        <div class="container">
            <?php
       

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class=\"items\">";
                echo "<div class=\"image\">";
                echo "<img src=\"images/".$row['image_one']."\" class=\"photo-on-display\">";
                echo "<p class=\"pprice\">₹".$row['pPrice']."</p>";
                echo "</div>";
                echo "<div class=\"text\">";
                echo "<p class=\"ptext\">".$row['pName']."</p>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
      <script src='js/productlistjs.js'></script>  
<!--       
      <script src="js/headerjs.js"></script> -->
</body>
</html>