<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sign in</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>


    <link rel='stylesheet' type='text/css' media='screen' href='css/signupcss.css'>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=IBM+Plex+Sans:wght@700&family=Nunito&family=Oswald:wght@500&display=swap" rel="stylesheet">
    
</head>
<body>


    <div class="container">
        <h2>
            <font color="#007aff">Aqua</font-color>
            <font color="#000000">Zone</font-color>
        </h2>


        <form id="form" class="form" action="includes/signup-inc.php" method="post" name="signupform">

            <div class="form-control">
                <label for="username">Username</label>
                <input type="text" name="user_name" placeholder="noobmaster69" id="username" />
                <small>Error message</small>
            </div>

            <div class="form-control">
                <label for="username">Email</label>
                <input type="email" name="email" placeholder="noobmaster69@gmail.com" id="email" />
                <small>Error message</small>
            </div>

            <div class="form-control">
                <label for="username">Address</label>
                <textarea id="address" rows="5" max-rows="10" name="address" placeholder="Enter your address"></textarea>
                <small>Error message</small>
            </div>

            <div class="form-control">
                <label for="username">Postal Code</label>
                <input type="number" name="postal_code" placeholder="654321" id="postal" />
                <small>Error message</small>
            </div>

            <div class="form-control">
                <label for="username">Phone Number</label>
                <input type="number" name="phone_no" placeholder="9876543210" id="phoneno" />
                <small>Error message</small>
            </div>

  
            <div class="form-control">
                <label for="username">Password</label>
                <input type="password" name="password" placeholder="P4$$w0rd" id="password"/>
                <small>Error message</small>
            </div>

            <div class="form-control">
                <label for="username">Confirm Password</label>
                <input type="password" name="passwordrepeat" placeholder="P4$$w0rd" id="password2"/>
                <small>Error message</small>
            </div>

            <button type="submit" name="submit" id="submit" class="submitbutton">Signup</button>

        </form>




        <div id="create-account-wrap" class="create-account-wrap">
            <p>Already have an account? <a style="text-decoration:none" href="login.php">Login</a><p>
        </div>
    </div>

    <?php 

    if (isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput"){
            echo "<p class='errors'>Fill in all fields</p>";

        }
        elseif($_GET["error"] == "invalidusername"){
            echo "<p class='errors'>Username must only contain numbers and letters</p>";

        }
        elseif($_GET["error"] == "invalidemail"){
            echo "<p class='errors'>Choose a proper email</p>";

        }
        elseif($_GET["error"] == "passwordsdontmatch"){
            echo "<p class='errors'>Passwords dont match</p>";

        }
        elseif($_GET["error"] == "stmtfailed"){
            echo "<p class='errors'>Something went wrong!</p>";

        }
        elseif($_GET["error"] == "usernametaken"){
            echo "<p class='errors'>Username already taken</p>";

        }
        elseif($_GET["error"] == "none"){
            echo "<p class='errors'>You have signed up</p>";

        }
    }


    ?>


    
    

    <!-- <script src='js/signupjs.js'></script> -->
</body>
</html>