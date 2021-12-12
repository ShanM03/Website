<!DOCTYPE html>
<head>
<title>GingerReads/viewBookinfo</title>
</head>
<body>
<center>
<h1>Browse the Book info</h1>
<p><a href="/viewBook_info.php">Refresh</a></p>
<p><a href="/Homepage.php">Back to Homepage</a></p>
</center>
<p>Here you can view the information about your favourite books and edit anything that could be incorrect!</p>
<center>
<?php
$link=mysqli_connect("127.0.0.1","Cherry","Batman69!","Books");
if($link===false){
die("ERROR: Could not connect. ".mysqli_connect_error());
}
$result = mysqli_query($link,"SELECT * FROM Book_info");
if(mysqli_num_rows($result)>0){
echo "<table border='1'><tr><th>ID</th><th>Title</th><th>Publication Yr</th><th>Author Name</th></tr>";
while($row=mysqli_fetch_assoc($result)){
echo"<tr><td>".$row["Book_ID"]."</td><td>".$row["Title"]."</td><td>".$row["Publication_Yr"]."</td><td>".$row["Author_Name"]. "</td></tr><br>";
}
echo "</table>";
}else{
 echo"0 results";
}
mysqli_close($link); 
?>
</center>
</body>
</html>
