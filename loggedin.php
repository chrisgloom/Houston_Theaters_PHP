

<?php
$host="127.0.0.1";
$port=3306;
$socket="";
$user=$_SESSION['login_user'];
$password=$_SESSION['login_pw'];
$dbname="theatredatabase";
$con = new mysqli($host, $user, $password, $dbname, $port, $socket) or die();
echo '<p> logged in as ';
echo $_SESSION['login_user'];
echo '</p>';
 ?>
