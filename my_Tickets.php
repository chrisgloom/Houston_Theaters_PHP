<?php
session_start();
include_once("config.php");
include_once("userValidate.php");
?>
<html>
<head>
	<title>Your Tickets</title>
	<link rel="stylesheet" href="Sakura.css">
</head>
<body>
	<h1>Your Tickets:</h1>
<table style="white-space: nowrap;">
	<tr>
	<td>Ticket Serial Number</td>
	<td>Event Name</td>
	<td>Start</td>
	<td>End</td>
	<td>Theater Name</td>
	<td>Address</td>
	</tr>
<?php

$user=$_SESSION['login_email'];

echo "$user";
$user_Tickets = mysqli_query($con, "SELECT * FROM userTicketInfo2 WHERE email='$user';")or die(mysqli_error($con));
while ($row_result = mysqli_fetch_array($user_Tickets)) {

	echo "<tr>";
	echo "<td>".$row_result["ticket_id"]."</td>";
	echo "<td>".$row_result["Name"]."</td>";
	echo "<td>".$row_result["Start"]."</td>";
	echo "<td>".$row_result["End"]."</td>";
	echo "<td>".$row_result["theater_name"]."</td>";
	echo "<td>".$row_result["Address"]."</td>";
	echo"</tr>";
}
?>
</table>
<a href="http://db3380group11.xyz/user.php"><button type="button">Back</button></a>
<?php
include('logoutButton.php');
 ?>





</body>
</html>
