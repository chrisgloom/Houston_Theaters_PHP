<?php
include("config.php");

function redirectAndDie(){
  ?>
  <script type="text/javascript">
  window.location.href = 'http://db3380group11.xyz/login.php';
  </script>
  <?php
   die();
};

$useremail =$_SESSION['login_email'];
$userpassword=$_SESSION['login_pw'];

if (isset($useremail) && isset($userpassword)) {
  $result = mysqli_query($con,"SELECT isAdmin from member where email='$useremail' and password='$userpassword';");

  //Check if the result is empty


  if (($result->num_rows)==0) {
    // echo 'result is empty';
    //Not properly logged in
    redirectAndDie();
  }

  $res = mysqli_fetch_array($result);


  if ($res['isAdmin']==1) {
    // echo 'hit admin';

    // They are an admin
    redirectAndDie();
  }else{
    // echo 'hit user';
    // They are a user
  }
  ?>
<?php
}else{
  // No input at all
  redirectAndDie();
}
