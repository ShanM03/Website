<!DOCTYPE html>
<head>
<title>GingerReads/addAuthorinfo</title>
</head>

<body>
<center>
<h1>Add Author info</h1>
<p><a href="/addAuthor_info.php">Refresh</a></p>
<p><a href="/Homepage.php">Back to Homepage</a></p>
</center>

<p>Here you can add information to the Author information table!</p>

<p>Please fill in the form below.</p>
<form action="addAuthor_info.php" method="post">
	<label>First Name</label>
	<input type="text" name="Author_firstName"/><br><br>

	<label>Surname</label>
	<input type="text" name="Author_surname"/><br><br>
	<input type="submit" name="submit" value="Submit"/>
</form>
<?php
$link = mysqli_connect("127.0.0.1","Cherry","Batman69!","Books");
if($link===false){
	die("ERROR: Could not connect. ".mysqli_connect_error());
}

if (isset($_POST['submit'])){
$firstName=$_POST['Author_firstName'];
$Surname=$_POST['Author_surname'];
$sql="INSERT INTO Author_info(Author_firstName,Author_surname)
      VALUES('$firstName','$Surname')";
if (mysqli_query($link,$sql)){
	echo "New record has been added!";
}else{
 echo"Error:".$sql.":-".mysqli_error($link);
}
}
mysqli_close($link);
?>
</body>
</html>
