<!DOCTYPE html>
<head>
<title>GingerReads/EditBookinfo</title>
</head>

<body>
<center>
<p><a href="/editBook_info.php">Refresh</a></p>
<p><a href="/Homepage.php">Back to Homepage</a></p>
</center>
<p>Here you can edit records from the Book information table!</p>

<p>Please enter the ID number of the record you like to edit in. For the other text boxes fill in the new information you want to be editing into the record and also fill in anything that you don't want to change to ensure that there are no issues with editing the record.</p>
<form action="editBook_info.php" method="post">
	<label>ID</label>
	<input type="text" name="ID"/><br><br>

	<label>Title</label>
	<input type="text" name="Title"/><br><br>

	<label>Publication Year</label>
	<input type="text" name="Publication_Yr"/><br><br>

	<label>Author Name</label>
	<input type="text" name="Author_Name"/>
	<input type="submit" name="submit" value="Submit"/>
</form>
<br>
<center>
<?php
$link=mysqli_connect("127.0.0.1","Cherry","Batman69!","Books");
if($link===false){
die("ERROR:Could not connect. ".mysqli_connect_error());
}
$result = mysqli_query($link,"SELECT * FROM Book_info");
if (mysqli_num_rows($result)>0){
echo "<table border='1'><tr><th>ID</th><th>Title</th><th>Publication year</th><th>Author Name</th></tr>";
while($row=mysqli_fetch_assoc($result)){
echo "<tr><td>".$row["Book_ID"]."</td><td>".$row["Title"]."</td><td>".$row["Publication_Yr"]."</td><td>".$row["Author_Name"]."</td></tr>";
}
echo "</table>";
}else{
 echo "Something you have entered is incorrect. Please try again.";
}

if (isset($_POST['submit'])){
$ID=$_POST['ID'];
$Title=$_POST['Title'];
$Publication_Yr=$_POST['Publication_Yr'];
$Author_Name=$_POST['Author_Name'];
$sql = "UPDATE Book_info
	SET Title = '$Title', Publication_Yr = '$Publication_Yr', Author_Name = '$Author_Name'
	WHERE Book_ID = '$ID'";
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
