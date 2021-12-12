<!DOCTYPE html>
<head>
<title>GingerReads/SearchBooks</title>
</head>

<body>
<center>
<h1>Search Book Info</h1>
<p><a href="/Homepage.php">Back to Homepage</a></p>
</center>
<p>Here you can search for specific titles of books that you want info for</p>

<p>Please enter the title you would like to search below </p>
<form action="searchBook_info.php" method="post">
	<label>Title</label>
	<input type="text" name="Title"/><br><br>
	<input type="submit" name="submit" value="Submit"/>
</form>
<center>
<?php
$link=mysqli_connect("127.0.0.1","Cherry","Batman69!","Books");
if($link===false){
die("ERROR:Could not connect. ".mysqli_connect_error());
}

if (isset($_POST['submit'])){
$Title=$_POST['Title'];
$sql = "SELECT * FROM Book_info
	WHERE(Title LIKE '$Title')";
$result=mysqli_query($link,$sql);
if(mysqli_num_rows($result)>0){
echo "<table border='1'><tr><th>ID</th><th>Title</th><th>Publication Year</th><th>Author Name</th><tr>";
while($row=mysqli_fetch_assoc($result)){
echo "<tr><td>".$row["Book_ID"]."</td><td>".$row["Title"]."</td><td>".$row["Publication_Yr"]."</td><td>".$row["Author_Name"]."</td></tr>";
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
