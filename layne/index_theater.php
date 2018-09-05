<?php
//including the database connection file
include_once("config.php");
 
//fetching data in descending order (lastest entry first)
$result = mysqli_query($con, "SELECT * FROM theater ORDER BY id DESC"); 
?>
 
<html>
<head>    
    <title>Theaters</title>
</head>
 
<body>
    <a href="add.html">Add New Theater</a><br/><br/>	
	
	<p>Theaters</p>
 
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>ID</td>
            <td>Name</td>
            <td>Address</td>
            <td>Capacity</td>
			<td>Update</td>
        </tr>
        <?php 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['ID']."</td>";
            echo "<td>".$res['Name']."</td>";
            echo "<td>".$res['Address']."</td>";  
			echo "<td>".$res['Capacity']."</td>";
            echo "<td><a href=\"edit_theater.php?ID=$res[ID]\">Edit</a> | <a href=\"delete_theater.php?ID=$res[ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
</body>
</html>