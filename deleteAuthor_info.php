<!DOCTYPE html>
<head>
<title>GingerReads/DeleteAuthorinfo</title>
</head>

<body>
<center>
<p><a href="/deleteAuthor_info.php">Refresh</a></p>
<p><a href="/Homepage.php">Back to Homepage</a></p>
</center>
<p>Here you can delete records from the Author information here</p>

<p>Please enter the ID of the record you would like to delte</p>
<form action="deleteAuthor_info.php" method="post">
	<label>ID</label>
	<input type="text" name="ID">
	<input type="submit" name="submit" Value="Submit"/>
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
$sql= "DELETE FROM Author_info
       WHERE Author_ID = '$ID'";
if(mysqli_query($link,$sql)){
 echo "Record has been deleted";
}else{
echo "Error: ".$sql.":-".mysqli_error($link);
}
}
mysqli_close($link);
?>
</center>
</body>
</html>
