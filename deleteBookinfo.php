<!DOCTYPE html>
<head>
<title>GingerReads/DeleteBookinfo</title>
</head>

<body>
<center>
<p><a href="/deleteBookinfo.php">Refresh</a></p>
<p><a href="/Homepage.php">Back to Homepage</a></p>
</center>
<p>Here you can delete records from within the table</p>

<p>Enter the ID of the record you would like to delete</p>
<form action="deleteBookinfo.php" method="post">
	<label>ID</label>
	<input type="text" name="ID"/>
	<input type="submit" name="submit" Value="Submit"/>
</form>
<br>
<center>
<?php
$link=mysqli_connect("127.0.0.1","Cherry","Batman69!","Books");
if($link===false){
die("ERROR:Could not connect. ".mysqli_connect_error());
}
$result=mysqli_query($link,"SELECT * FROM Book_info");
if(mysqli_num_rows($result)>0){
echo "<table border='1'><tr><th>ID</th><th>Title</th><th>Publication_Yr</th><th>Author Name</th></tr>";
while($row=mysqli_fetch_assoc($result)){
echo "<tr><td>".$row["Book_ID"]."</td><td>".$row["Title"]."</td><td>".$row["Publication_Yr"]."</td><td>".$row["Author_Name"]."</td></tr>";
}
echo "</table>";
}else{
 echo "0 results";
}

if (isset($_POST['submit'])){
$ID=$_POST['ID'];
$sql= "DELETE FROM Book_info
       WHERE Book_ID = '$ID'";
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
