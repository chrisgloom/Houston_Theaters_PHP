<?php
//including the database connection file
include_once("config.php");
 include_once("../adminValidate.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($con, "SELECT * FROM member ORDER BY ID DESC");

?>

<html>
<head>
    <title>Members</title>
</head>
     <link rel="stylesheet" href="../Sakura.css">
<body>
    <a href="add_member.html">Add Member</a><br/><br/>

    <font face="helvetica" size="4"><h1>Members</h1></font>

    <form action="result_member.php" method="post" form style="width=-80%" border=0>
    <input type= "text" name= "ID" placeholder ="ID" size ="5">
    <input type="text" name="First" placeholder="First">
    <input type="text" name="Last" placeholder="Last">
    <input type="text" name="Phone" placeholder="Phone">
    <input type="text" name="Email" placeholder="Email">
    <input type="text" name="Password" placeholder="Password">
    <input type="text" name="isAdmin" placeholder="isAdmin" size ="5">
    <input type="submit" name="indexMember">

    <table width='80%' border=0 style="white-space: nowrap;">
        <tr bgcolor='#CCCCCC'>
            <td>ID</td>
            <td>First</td>
			<td>Last</td>
            <td>Phone</td>
            <td>Email</td>
            <td>Password</td>
            <td>Is Admin</td>
			<td>Update</td>
        </tr>
        <?php
        while($res = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$res['ID']."</td>";
            echo "<td>".$res['First']."</td>";
			echo "<td>".$res['Last']."</td>";
            echo "<td>".$res['Phone']."</td>";
            echo "<td>".$res['email']."</td>";
            echo "<td>".$res['password']."</td>";
            echo "<td>".$res['isAdmin']."</td>";
            echo "<td><a href=\"edit_member.php?ID=$res[ID]\">Edit</a> | <a href=\"delete_member.php?ID=$res[ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        ?>
    </table>
    </form>

    <a href="http://db3380group11.xyz/admin.php"><button type="button">Back</button></a>
    <?php
    include_once('../logoutButton.php');
    ?>
</body>
</html>
