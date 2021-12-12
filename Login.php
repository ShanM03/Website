<!DOCTYPE html>
<head>
<title>GingerReads/Login</title>
</head>

<body>
<center>
<h1>Login to your account</h1>
<p><a href="/Homepage.php">Back to Homepage</a></p>
</center>

<p>Please enter your login below</p>
<form action="Login.php" method="post">
	<label>Username</label>
	<input type="text" name="Username"/>
	<input type="submit" name="submit" value="Submit"/>
</form>
<?php
$link = mysqli_connect("127.0.0.1","Cherry","Batman69!","Books");
if ($link===false){
	die("ERROR: could not connect. ".mysqli_connect_error());
}

if (isset($_POST['submit'])){
$Username=$_POST['Username'];
$sql = "SELECT * FROM website_users
	WHERE(Username LIKE  '$Username')";
if (mysqli_query($link,$sql)){
	echo "You have logged in!";
}else{
 echo "Error:Incorrect username";
}
}
mysqli_close($link);
?>

</body>
</html>
