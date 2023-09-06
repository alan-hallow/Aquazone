<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>AquaZone</title>
<link rel="stylesheet" href="css/logincss.css">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=IBM+Plex+Sans:wght@700&family=Nunito&family=Oswald:wght@500&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">


</head>


<body>

<div id="login-form-wrap">


  <h2>
    <font color="#007aff">Aqua</font-color>
    <font color="#000000">Zone</font-color>
  </h2>
  <form id="login-form" class="form" action="includes/login-inc.php" method="post">
    <p>
      <label>Username</label>
      <input type="text" id="username" name="user_name" placeholder="Username/email" ><i class="validation"><span></span><span></span></i>
      </p>
      <p>
      <label>Password</label>
      <input type="password" id="mypassword" name="password"  placeholder="Password" ><i class="validation"><span></span><span></span></i>
      </p>
      <p>
      <button type="submit" name="submit" id="login" class="submitbutton">Login</button>
      </p>
  </form>


  <div id="create-account-wrap">
   <p>Not a member? <a style="text-decoration:none" href="signup.php">Create Account</a><p>
  </div>


</div>
<?php 

if (isset($_GET["error"])){
    if ($_GET["error"] == "emptyinput"){

        echo "<p class='errors'>Fill in all fields</p>";

    }
    elseif($_GET["error"] == "wronglogin"){

        echo "<p class='errors'>Incorrect login information</p>";

    }
}


?>

</body>

</html>

