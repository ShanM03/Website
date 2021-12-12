<!DOCTYPE html>
<head>
<title>GingerReads/EditAuthorinfo</title>
</head>

<body>
<center>
<p><a href="/editAuthor_info.php">Refresh</a></p>
<p><a href="/Homepage.php">Back to homepage</a></p>
</center>
<p>Here you can edit information from the Author information table</p>

<p>Please enter the ID of the record you want to edit below. Enter the new information you want to edit and fill in the remainder of the record with information that needs to stay the same to ensure there are no issues with editing the record.</p>
<form action="editAuthor_info.php" method="post">
	<label>ID</label>
	<input type="text" name="ID"/><br><br>

	<label>First Name</label>
	<input type="text" name="Author_firstName"/><br><br>

	<label>Surname</label>
	<input type="text" name="Author_surname"/>
	<input type="submit" name="submit" value="Submit"/>
</form>
<br>
<center>
<?php
$link=mysqli_connect("127.0.0.1","Cherry","Batman69!","Books");
if($link===false){
die("ERROR:Could not connect. ".mysqli_connect_error());
}

$result=mysqli_query($link,"SELECT * FROM Author_info");
if(mysqli_num_rows($result)>0){
echo "<table border='1'><tr><th>ID</th><th>First Name</th><th>Surname</th></tr>";
while($row=mysqli_fetch_assoc($result)){
echo "<tr><td>".$row["Author_ID"]."</td><td>".$row["Author_firstName"]."</td><td>".$row["Author_surname"]."</td></tr>";
}
echo "</table>";
}else{
 echo "0 results";
}

if (isset($_POST['submit'])){
$ID=$_POST['ID'];
$firstName=$_POST['Author_firstName'];
$Surname=$_POST['Author_surname'];
$sql = "UPDATE Author_info
        SET Author_firstName = '$firstName', Author_surname = '$Surname'
        WHERE Author_ID = '$ID'";
if (mysqli_query($link,$sql)){
        echo "Changes have been made!";
}else{
 echo "Error: ".sql.":-".mysqli_error($link);
}
}
mysqli_close($link);
?>
</center>
</body>
</html>
