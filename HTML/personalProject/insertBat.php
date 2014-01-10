<?php
$con = mysql_connect("localhost", "se211011", "10380307");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("se211011", $con) or die(mysql_error());

if ($_POST[badge] != '1')
{	
	header('Location: Error.php');
}
else
{
	$sql="INSERT INTO pkbattle (name, email, date, badge)
	VALUES
	('$_POST[name]','$_POST[email]','$_POST[date]', '$_POST[badge]')";

	if (!mysql_query($sql,$con))
	  {
	  die('Error: ' . mysql_error());
	  }

	header('Location: Booked.php');
}




mysql_close($con);
?> 