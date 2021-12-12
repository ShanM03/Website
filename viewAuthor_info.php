<!DOCTYPE html>
<head>
<title>GingerReads/viewAuthorinfo</title>
</head>

<body>
<center>
<h1>View Author info</h1>
<p><a href="/viewAuthor_info.php">Refresh</a></p>
<p><a href="/Homepage.php">Back to Homepage</a></p>
</center>

<p>Here you can view the information about authors and edit them if you think it is needed!</p>

<center>
<?php
$link = mysqli_connect("127.0.0.1","Cherry","Batman69!","Books");
if($link===false){
die("ERROR:Could not connect. ".mysqli_connect_error());
}
$result=mysqli_query($link,"SELECT * FROM Author_info");
if(mysqli_num_rows($result)>0){
echo "<table border='1'><tr><th>ID</th><th>First Name</th><th>Surname</th></tr>";
while($row=mysqli_fetch_assoc($result)){
echo"<tr><td>".$row["Author_ID"]."</td><td>".$row["Author_firstName"]."</td><td>".$row["Author_surname"]. "</td></tr>";
}
}else{
 echo"0 results";
}
mysqli_close($link);
?>

</center>
</body>
</html>
