<?php
$con = mysql_connect("localhost", "se211011", "10380307");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("se211011", $con) or die(mysql_error());

$sql="INSERT INTO pkcomments (name, comment)
	VALUES
	('$_POST[name]','$_POST[comment]')";

	if (!mysql_query($sql,$con))
	  {
		die('Error: ' . mysql_error());
	  }


header('Location: Comment.php');


mysql_close($con);
?> 