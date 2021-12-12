<!DOCTYPE html>
<head>
<title>GingerReads/register</title>
</head>

<body>
<center>
<h1>Register your account</h1>
<p><a href="/Homepage.php">Back to Homepage</a></p>
</center>

<p>Please fill in the form below</p>
<form action="register.php" method="post">
	<label>Username</label>
	<input type="text" name="Username"/><br><br>

	<label>Password</label>
	<input type="text" name="Password"/><br><br>
	<input type="submit" name="submit" value="Submit"/>
</form>
<?php
$link=mysqli_connect("127.0.0.1","Cherry","Batman69!","Books");
if ($link===false){
	die("ERROR:Could not connect. ".mysqli_connect_error());
}
if (isset($_POST['submit'])){
$Username=$_POST['Username'];
$Password=$_POST['Password'];
$sql = "INSERT INTO website_users(Username,Password)
	VALUES('$Username','$Password')";
if (mysqli_query($link,$sql)){
	echo "New record has been added!";
}else{
 echo "Error: ".sql.":-".mysqli_error($link);
}
}
mysqli_close($link);
?>
</body>
</html>
