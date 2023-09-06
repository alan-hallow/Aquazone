<?php


session_start();


?>


<!-- <!DOCTYPE html>
<html>
    <head> -->
        <!-- <title>header</title> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/headercss.css">

        <script src="https://kit.fontawesome.com/89589cc083.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
                <a href="mycart.php" class="links">My Cart</a>
                <a href="#" class="links">Water Supply</a>
                <a href="#" class="links">Borewell</a>
                <a href="#" class="links">Service Men</a>
            </div>
            <div class="account">
                <?php
                    if(isset($_SESSION["username"])){
                        echo "Welcome, " . $_SESSION['username'];
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
                    <i class="fa-solid fa-house"></i>
                    </div>
                    <button class="btnopen" onclick="openNav()"><i class="fa-solid fa-bars-staggered" ></i></button>
                </div>
            </div>
        <script src='js/headerjs.js'></script>
        
    <!-- </body>
</html> -->
