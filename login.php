<?php

include("config.php");

session_start();

   function thanksForSignup() {
     if (isset($_SESSION['justSignedUp'])) {
       echo '<p>Thanks for signing up!</p>';
       $_SESSION['justSignedUp']=NULL;
     }
    };

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // email and password sent from form

      $email = mysqli_real_escape_string($con,$_POST['myemail']);
      $password = mysqli_real_escape_string($con,$_POST['mypassword']);

      $result = mysqli_query($con,"SELECT isAdmin from member where email='$email' and password='$password';");

      // Username and password combo doesn't exist in the database
      if ($result->num_rows==0) {
        // Not in the database
        echo '<link rel="stylesheet" href="Sakura.css">';
        echo '</p>Not found! Did you sign up?<p>';
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        die();
      }else {
        $_SESSION['login_email'] = $email;
        $_SESSION['login_pw'] = $password;


        $res = mysqli_fetch_array($result);

        if ($res['isAdmin']==0) {
          // It's a user
          ?>
          <script type="text/javascript">
          window.location.href = 'http://db3380group11.xyz/user.php';
          </script>
          <?php
        }else{
          // They are an admin
          ?>
          <script type="text/javascript">
          window.location.href = 'http://db3380group11.xyz/admin.php';
          </script>
          <?php
        }

      }


    }

 ?>
 <html>
 <body>
<link rel="stylesheet" href="Sakura.css">
<h1>Houston Theaters</h1>

<p>This is where you'll login&mdash;or do you need to <a href="http://db3380group11.xyz/signup.php">sign up</a>?</p>

<?php
thanksForSignup();
 ?>

 <form style="float:right;" class="form-signin" name="form1" method="post" action="">
        <h2 class="form-signin-heading">Log in</h2>

        <label for="myemail">Email <span style="color:red;">*</span></label>
        <input name="myemail" id="myemail" type="text" class="form-control" placeholder="Email" autofocus required>
        <label for="mypassword">Password <span style="color:red;">*</span></label>
        <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Password" required>

        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
      </form>

      <p>Log in to be able to purchase tickets to these local events!</p>
      <table style="white-space: nowrap;">
        <caption style="font-weight:bold;">Upcoming Theater Events in Houston</caption>
        <tr>
          <th>Event</th>
          <th>Location</th>
          <th>Price</th>
          <th>Start</th>
          <th>End</th>
          <th>Address</th>
        </tr>


      <?php
      $sql_result = $con->query("select * from eventSearch");
      while ($row = $sql_result->fetch_assoc()) {
              printf ("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$row["Name"], $row["theaterName"], $row['Price'],$row['Start'],$row['End'],$row['Address']);
          }
          echo '</table>'
       ?>
    </body>
</html>
