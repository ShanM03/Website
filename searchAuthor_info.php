<!DOCTYPE html>
<head>
<title>GingerReads/SearchAuthor</title>
</head>

<body>
<center>
<h1>Search Author Info</h1>
<p><a href="/Homepage.php">Back to Homepage</a></p>
</center>

<p>Here you can search the surname of any specific author you are looking for</p>
<form action="searchAuthor_info.php" method="post">
	<label>Surname</label>
	<input type="text" name="Surname"/>
	<input type="submit" name="submit" value="Submit"/>
</form>
<center>
<?php
$link=mysqli_connect("127.0.0.1","Cherry","Batman69!","Books");
if($link===false){
die("ERROR:Could not connect. ".mysqli_connect_error());
}

if (isset($_POST['submit'])){
$Surname=$_POST['Surname'];
$sql = "SELECT * FROM Author_info
        WHERE(Author_surname LIKE '$Surname')";
$result=mysqli_query($link,$sql);
if(mysqli_num_rows($result)>0){
echo "<table border='1'><tr><th>ID</th><th>First Name</th><th>Surname</th><tr>";
while($row=mysqli_fetch_assoc($result)){
echo "<tr><td>".$row["Author_ID"]."</td><td>".$row["Author_firstName"]."</td><td>".$row["Author_surname"]."</td><tr>";
}
echo "</table>";
}else{
echo "0 results";
}
}
mysqli_close($link);
?>
</center>
</body>
</html>
