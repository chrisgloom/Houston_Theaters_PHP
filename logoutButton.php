<?php
if (isset($_POST['logout'])) {
  session_unset();
  session_destroy();
  ?>
  <script type="text/javascript">
  window.location.href = 'http://db3380group11.xyz/login.php';
  </script>
  <?php
}
 ?>


 <form action="" method="post">
    <input type="submit" name="logout" value="Log out">
    </form>
