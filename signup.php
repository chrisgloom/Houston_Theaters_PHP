<head>
    <title>Sign Up User</title>
</head>
<?php
include("config.php");
session_start();

if(isset($_POST['Submit'])) {
    $useremail = $_POST['myemail'];
    $userpassword = $_POST['mypassword'];
    $userfirstname = $_POST['firstname'];
    $userlastname = $_POST['lastname'];
    $userphonenumber = $_POST['phonenumber'];


if (empty($userphonenumber)) {
  $userphonenumber = NULL;
}


$result = mysqli_query($con,"SELECT email from member where email='$useremail';");

// If the email is already found in the database then they've already signed up
if ($result->num_rows>0) {
  echo '</p>Sorry, looks like that email is already signed up!<p>';
  echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
  die();
}
// id(auto increment), first name, last name, phone, email, password, isadmin
mysqli_query($con, "INSERT INTO `member` VALUES(0,'$userfirstname', '$userlastname','$userphonenumber','$useremail','$userpassword',0)") or die(mysqli_error($con));

//Check for this in login
$_SESSION['justSignedUp']=1;
?>
<script type="text/javascript">
window.location.href = 'http://www.db3380group11.xyz/login.php';
</script>
<?php
}
?>



<html>
<body>
<link rel="stylesheet" href="Sakura.css">

<form class="form-signup" name="form1" method="post" action="">
       <h2 class="form-signup-heading">Please sign up</h2>

       <label for="myemail">Email <span style="color:red;">*</span></label>
       <input name="myemail" id="myemail" type="text" class="form-control" placeholder="email" autofocus required>

       <label for="mypassword">Password <span style="color:red;">*</span></label>
       <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Password" required>

       <label for="firstname">First Name <span style="color:red;">*</span></label>
       <input name="firstname" id="firstname" type="text" class="form-control" placeholder="First Name" required>

       <label for="lastname">Last Name <span style="color:red;">*</span></label>
       <input name="lastname" id="lastname" type="text" class="form-control" placeholder="Last Name" required>

       <label for="lastname">Phone Number</label>
       <input name="phonenumber" id="phonenumber" type="text" class="form-control" placeholder="Phone Number"><br><br>

       <span><em><span style="color:red;">*</span> Indicates required field</em></span><br>
       <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>



     </form>
   </body>
</html>
