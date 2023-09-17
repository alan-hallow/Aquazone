<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>AquaZone</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/watersupplycss.css'>

</head>
<body>
<?php

include "header.php";
?>
    <div class="watersupplycontainerone">
        <div class="watersupplymainheading">
            <h2 class="watersupplyheadingwatersupply">Water Supply</h2>   
            <p class="watersupplymainbody">Discover unparalleled water supply solutions with us. We ensure consistent, pure, and reliable water access for communities, industries, and homes. Trust us to deliver quality, sustainability, and 24/7 support for your essential water needs.</p>
        </div>


        <div class="watersupplyenquiry">

            <h2 class="watersupplyenquiryheading">we bring water to you</h2>

            <p class="watersupplyenquirybody">Call AquaZone to know availability of Drinking water supplying to your area. We provide drinking quality water in Tanker Lorries in Kerala.</p>

            <a href="#" class="watersupplyenquirybutton">Enquiry</a>
        </div>



        <form action="includes/watersupply-inc.php" method="post" onsubmit="return confirm('Are you sure you want to place this order?');">
    <!-- Your form content here -->
            <div class="watersupplybooknowcards">
                <div class="panel panel-1 active">
                    <h3>Discover the purest hydration for your home with our premium water supply service. From refreshing sips to daily chores, our household water, available in various quantities, ensures that your family stays hydrated and healthy. Quench your thirst with the best water for your loved ones.</h3>
                    <h1 class="watersupplybooknowcard">500 Litre</h1>


                    <button type="submit" name="submit" class="watersupplyordernowbutton" value="500" id="order-button">Order Now</button>
                </div>
                <div class="panel panel-2">
                    <h3>Elevate your apartment living with our pristine water supply solutions. Tailored to fit your space and needs, our apartment-friendly water options deliver quality hydration to your doorstep. Enjoy the convenience of clean, crisp water in every corner of your cozy abode.</h3>
                    <h1 class="watersupplybooknowcard">1000 Litre</h1>


                    <button type="submit" name="submit" class="watersupplyordernowbutton" value="1000" id="order-button">Order Now</button>

                </div>
                <div class="panel panel-3">
                    <h3>Revitalize your business with our premium commercial water supply. Whether you're running a bustling restaurant, a manufacturing facility, or any commercial enterprise, our high-capacity water solutions ensure uninterrupted hydration for your operations. Stay focused on success, let us take care of your water supply needs.</h3>
                    <h1 class="watersupplybooknowcard">5000 Litre</h1>


                    <button type="submit" name="submit" class="watersupplyordernowbutton" value="5000" id="order-button">Order Now</button>

                </div>
            </div>
        </form>



    </div>


    <?php

    if (isset($_GET["error"])){
        if ($_GET["error"] == "none"){
            echo "<p class='errors'>You have successfully ordered</p>";

        }
        elseif($_GET["error"] == "doitagain"){
            echo "<p class='errors'>Error occured! Please submit again</p>";

        }
        elseif($_GET["error"] == "didntworkasusual"){
            echo "<p class='errors'>Unknown error occured</p>";

        }

    }


    include "footer.php";
    ?>
    <script src='js/watersupplyjs.js'></script>
</body>
</html>