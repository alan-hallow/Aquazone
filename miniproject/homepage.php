

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/homepagecss.css">
    <title>AquaZone</title>
    <script src="https://kit.fontawesome.com/89589cc083.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    include "header.php";
    ?>


    <div class="wholecontainer">



        <section class="section section-1">
            <div id="logomain">
                <h1 data-value="AquaZone">AquaZone</h1>
            </div>

            <div class="loginpagelinkifnotloggedin">
                    <?php
                        if(!isset($_SESSION["username"])){
                            echo "<a href='login.php' class='loginpagelinkifnotloggedinlogin'>login</a>";
                        }
                    ?>
            </div>

        </section>
        <section class="section section-2">

        </section>
        <section class="section section-3">
            <div class="navigationforpages navigation-1">
                <a href="productlist.php">go to page<i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="sectiontitle onetitle">
                <h1>Products</h1>
            </div>
            <div class="descriptionsection descriptionsection-1">
                <p>We offer a diverse range of high-quality products designed to meet your specific needs. From cutting-edge technology to stylish accessories, our products combine innovation and functionality to enhance your everyday life.</p>
            </div>
        </section>
        <section class="section section-4">
            <div class="navigationforpages navigation-1">
                <a href="puritychecking.php">go to page<i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="sectiontitle twotitle">
                <h1>Purity</h1>
            </div>
            <div class="descriptionsection descriptionsection-2">
                <p>We offer a comprehensive water purity checking service. Our expert team utilizes advanced techniques to analyze water quality, identifying and addressing contaminants to ensure clean and safe water for your peace of mind and well-being.</p>
            </div>
        </section>
        <section class="section section-5">
            <div class="navigationforpages navigation-1">
                <a href="#">go to page<i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="sectiontitle threetitle">
                <h1>purify</h1>
            </div>
            <div class="descriptionsection descriptionsection-2">
                <p>Our water purification service employs cutting-edge technology to eliminate impurities, providing you with crystal-clear and safe drinking water. We prioritize environmental responsibility, offering sustainable solutions that guarantee the highest purity standards while reducing ecological impact.</p>
        </section>
        <section class="section section-6">
            <div class="navigationforpages navigation-1">
                <a href="#">go to page<i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="sectiontitle fourtitle">
                <h1>Services</h1>
            </div>
            <div class="descriptionsection descriptionsection-2">
                <p>A service man is a dedicated professional who provides essential assistance, maintenance, or repairs to various systems or equipment. Their expertise ensures smooth operations, resolves issues promptly, and enhances customer satisfaction through skillful, reliable service.</p>
        </section>

    <?php
    include "homepagefooter.php";
    ?>

    </div>    


<script src="js/homepagejs.js"></script>
</body>
</html>
