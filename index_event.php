<?php
//including the database connection file
include_once("config.php");
include_once("../adminValidate.php");
//fetching data in descending order (lastest entry first)
$result = mysqli_query($con, "SELECT * FROM event ORDER BY id DESC");
?>

<html>
<head>
    <title>Events</title>
    <link rel="stylesheet" href="../Sakura.css">
</head>

<body>
    <a href="add_event.html">Add New Event</a><br/><br/>

    <font face="helvetica" size="4"><h1>Event</h1></font>
    <form action="result_event.php" method="post" form style="width=-80%" border=0>
        <input type= "text" name= "ID" placeholder ="ID" size ="5">
        <input type="text" name="Theater" placeholder="Theater">
        <input type="text" name="Name" placeholder="Name">
    <select name="operator">
        <option value = ">=">>=</option>
        <option value = "<="><=</option>
        <option value = "=">=</option>
    </select>
    <input type = "text" name="price" placeholder= "$$" size =10><br>
    <input type="date" name="start" >
    <input type="date" name="end" >
    <input type="submit" name="indexEvent">

    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>ID</td>
            <td>Theater</td>
            <td>Name</td>
            <td>Price</td>
			<td>Start Date</td>
			<td>End Date</td>
			<td>Update</td>
        </tr>
        <?php
        while($res = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$res['ID']."</td>";
            echo "<td>".$res['theater']."</td>";
            echo "<td>".$res['Name']."</td>";
			echo "<td>".$res['Price']."</td>";
			echo "<td>".$res['Start']."</td>";
			echo "<td>".$res['End']."</td>";
            echo "<td><a href=\"edit_event.php?ID=$res[ID]\">Edit</a> | <a href=\"delete_event.php?ID=$res[ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
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
