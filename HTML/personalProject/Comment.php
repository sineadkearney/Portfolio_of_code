<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>
			Personal Project
		</title>
		<link rel="stylesheet" type="text/css" title="main" href="defaultStyle.css"/>
		<link rel="alternative stylesheet" type="text/css" title="large" href="large.css"/>
		<link rel="alternative stylesheet" type="text/css" title="access" href="access.css"/>
		<script type="text/javascript" src="styleswitcher.js"></script>
	</head>
	
	<body>
		<div id="main">
			<?php
            include('header.php');
            include('navigation.php');
			?>	
			
			<div id="content">
				<p>
					Feel free to leave a comment :
				</p>	
					<p>					
					<form name="input" action="insertCom.php" method="post">
						<p><label for="name">Name: </label><input type="text" name="name" /></p>
						<p><label for="comment">Comment: </label>
							<textarea cols="50" rows="4" name="comment"></textarea>	</p>								
						<p class="submit"><input type="submit" value="Submit" /></p>
					</form> 
					</p>
			
				
				 <?php 
					 // Connects to your Database 
					 mysql_connect("localhost", "se211011", "10380307") or die(mysql_error()); 
					 mysql_select_db("se211011") or die(mysql_error()); 
					 $data = mysql_query("SELECT * FROM pkcomments ORDER BY comID DESC") 
					 or die(mysql_error()); 
					 while($info = mysql_fetch_array( $data )) 
					 { 
					 Print "<div id ='comment'><span>Name: </span>".$info['name']."</div>"; 
					 Print "<div id ='comment'><span>Time Posted: </span>".$info['time']."</div>"; 
					 Print "<div id ='commentContent'><span>Comment: </span>".$info['comment']."</div>"; 
					 }  
					 ?> 
				</div>
			<?php
            include('footer.php');
			?>	
			
		</div>
	</body>
</html>