<?php

include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $username = mysqli_real_escape_string($con,$_POST['myusername']);
      $password = mysqli_real_escape_string($con,$_POST['mypassword']);

      if ($con->change_user($username, $password, "theatredatabase")) {
         $_SESSION['login_user'] = $username;
         $_SESSION['login_pw'] = $password;
         header("Location: http://localhost/web/Theatre.php");
      }else{
        // Replace this with actual log in failure
        echo '<p>failure to login. Feel free to try again.</p>';
      }
    }

 ?>
 <html>
 <body>
<link rel="stylesheet" href="sakura.css">

 <form class="form-signin" name="form1" method="post" action="">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input name="myusername" id="myusername" type="text" class="form-control" placeholder="Username" autofocus>
        <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Password">

        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>



      </form>
    </body>
</html>
