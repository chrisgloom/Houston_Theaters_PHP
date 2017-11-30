<?php
session_start();
 ?>
<h1> Theatre Database</h1>

<link rel="stylesheet" href="sakura.css">

<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>Address</th>
    <th>Name</th>
    <th>Total Capacity</th>
  </tr>

<?php
// DRY database setup
include("loggedin.php");

// if(isset($_POST['Submit'])) {
//     $name = $_POST['name'];
//     $age = $_POST['age'];
//     $email = $_POST['email'];
//
//     // checking empty fields
//     if(empty($name) || empty($age) || empty($email)) {
//         if(empty($name)) {
//             echo "<font color='red'>Name field is empty.</font><br/>";
//         }
//
//         if(empty($age)) {
//             echo "<font color='red'>Age field is empty.</font><br/>";
//         }
//
//         if(empty($email)) {
//             echo "<font color='red'>Email field is empty.</font><br/>";
//         }
//       }
//       end of the add field if
//     }

$sqlQueryString = 'select * from THEATER;';

$sql_result = $con->query($sqlQueryString);

while ($row = $sql_result->fetch_assoc()) {
        printf ("<tr><td>%s</td> <td>%s</td> <td>%s</td><td>%s</td></tr>",$row["ID"], $row["Address"],  $row["Name"], $row["Total Capacity"]);
    }

echo "</table>";

$con->close();

?>

<a href="TheatreStage.php"><button>Theatre Stage</button></a>
<a href="employee.php"><button>Employee</button></a>
<a href="EmployeeTitle.php"><button>Employee Title</button></a>
<a href="Theatre.php"><button>Theatre</button></a>
