<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Need Help</title>
    <link rel='stylesheet' type='text/css' href='css/helpcss.css'>
</head>
<body>
    <?php
    include "header.php";
    ?>
    <div class="helptext">
    <section>
        <h1>Welcome to Our Help Page</h1>
        <h2>Frequently Asked Questions (FAQ)</h2>
        
        <h3>1. How do I create an account?</h3>
        <p>To create an account, simply click on the "Sign Up" button on the top right corner of the page. Fill in the required information, such as your email address and password, and follow the instructions to complete the registration process.</p>
        
        <h3>2. I forgot my password. What should I do?</h3>
        <p>If you've forgotten your password, click on the "Forgot Password" link on the login page. Follow the prompts to reset your password. You'll receive an email with instructions on how to set a new password.</p>
        
        <h3>3. How can I make a reservation?</h3>
        <p>To make a reservation, log in to your account and navigate to the reservation page. Select the desired date and time, and then click the "Submit" button. Your reservation will be confirmed once you receive a confirmation email.</p>
        
        <h3>4. Can I modify or cancel a reservation?</h3>
        <p>Yes, you can modify or cancel a reservation by logging into your account and accessing the reservation management section. Please note that there may be specific cancellation policies depending on the type of reservation.</p>
        
        <h3>5. How can I contact customer support?</h3>
        <p>If you need further assistance, our customer support team is here to help. You can reach us through the "Contact Us" page on our website or by sending an email to <a href="mailto:a.l.a.n.j.o.h.n.s.a.l.a.n@gmail.com">support@Aquazon.com</a>. We strive to respond to all inquiries within 24 hours.</p>

        <h2>Contact Us</h2>
        <p>If you have any questions, concerns, or feedback, please feel free to get in touch with us. Our customer support team is available to assist you.</p>
        
        <ul>
            <li>Email: <a href="mailto:a.l.a.n.j.o.h.n.s.a.l.a.n@gmail.com">support@Aquazon.com</a></li>
            <li>Phone: +91 62826-09019</li>
            <li>Office Hours: Monday to Friday, 9:00 AM - 6:00 PM (EST)</li>
        </ul>

        <p>Thank you for choosing our services! We're dedicated to providing you with a seamless and enjoyable experience.</p>
    </section>
    </div>



    <form id="form" class="form" action="includes/help-inc.php" method="post" name="signupform">
        <div class="container">
            <div class="textareacontainer">
                <label for="helptext">Tell us what you need help with</label>
                <textarea id="helptext" class="helptextinput" rows="5" max-rows="10" name="help" placeholder="How may we help you?"></textarea>
            </div>

            <div class="submithelp">
                <button type="submit" name="submit" id="submit" class="submitbuttonhelp">Request Help</button>
            </div>
        </div>
    </form>

    <?php 

if (isset($_GET["error"])){
    if ($_GET["error"] == "emptyinput"){
        echo "<p class='errors'>You should write what is your problem</p>";

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
        echo "<p class='errors'>You will be contacted shortly</p>";

    }
}


?>

<!-- 

    <script src="js/helpjs.js"></script>  -->
</body>
</html>