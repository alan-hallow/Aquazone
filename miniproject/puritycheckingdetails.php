<?php

include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purity Checking</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/puritycheckingdetailscss.css'>
</head>
<body>

    <div class="heading">
        <h2>Please choose the date and time</h2>
    </div>
    


    <form id="form" class="form" action="includes/puritychecking-inc.php" method="post" name="signupform">
        <div class="formcontainer">
            <div class="adddate">
                <label for="selectdate">Please select a date</label>
                <input type="date" id="selectdate" name="selectdate"> 
            </div>

            <div class="addtime">
                <label for="selecttime">Please select a time</label>
                <input type="time" id="selecttime" name="selecttime"> 
            </div>

            <div class="book">
                <button type="submit" name="submit" id="submit" class="submitbutton">Place A Reservation</button>
            </div>
        </div>
    </form>
    <div class="locations">
        <p class="addresslab">address of the lab</p>

    <!-- address goes here -->

        <div class="location-1">
            <p>123, Green Valley Street, Idukki, Kerala, India 685593</p>
            <p>contact no: 6282609019</p>
        </div>


    </div>
    <?php 

if (isset($_GET["error"])){
    if ($_GET["error"] == "emptyinput"){
        echo "<p class='errors'>Fill in all fields</p>";

    }
    elseif($_GET["error"] == "invalid_date"){
        echo "<p class='errors'>check the date before adding</p>";

    }
    elseif($_GET["error"] == "invalid_time"){
        echo "<p class='errors'>We only open for 10AM to 6PM</p>";

    }
    elseif($_GET["error"] == "usernotfound"){
        echo "<p class='errors'>User not found</p>";

    }
    elseif($_GET["error"] == "stmtfailed"){
        echo "<p class='errors'>Something went wrong</p>";

    }
    elseif($_GET["error"] == "insertstmtfailed"){
        echo "<p class='errors'>insert statement failed</p>";

    }
    elseif($_GET["error"] == "none"){
        echo "<p class='errors'>you successfully made a reservation</p>";

    }
}


?>
<?php

include "footer.php";
?>
<script src="js/puritycheckingdetailsjs.js"></script> 
</body>
</html>