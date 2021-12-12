<!DOCTYPE html.
<head>
<title>GingerReads/addBookinfo</title>
</head>
<body>
<center>
<h1>Add to Book info</h1>
<p><a href="/addBook_info.php">Refresh</a></p>
<p><a href="/Homepage.php">Back to Homepage</a></p>
</center>
<p>Here you can add and delete information from the Book infomation table!</p>

<p>Please fill in the information you want to add to the table below.</p>
<form action"addBook_info.php" method="post">
	<label>Title</label>
	<input type="text" name="Title"/><br><br>

	<label>Publication Year</label>
	<input type="text" name="Publication_Yr"><br><br>

	<label>Author Name</label>
	<input type="text" name="Author_Name"><br><br>
	<input type="submit" name="submit" value="Submit">
</form>
<?php
$link = mysqli_connect("127.0.0.1","Cherry","Batman69!","Books");
if($link===false){
die("ERROR: Could not connect. ".mysqli_connect_error());
}

if (isset($_POST['submit'])){
 $title=$_POST['Title'];
 $publication_yr = $_POST['Publication_Yr'];
 $author_name = $_POST['Author_Name'];
 $sql = "INSERT INTO Book_info(Title,Publication_Yr,Author_Name)
         VALUES('$title','$publication_yr','$author_name')";
if(mysqli_query($link,$sql)){
	echo"New record has been added!";
}else{
 echo"Error: ".$sql.":- ".mysqli_error($link);
}
}
mysqli_close($link);
?>

</body>
</html>
