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
					To book your battle with the Gym Leader, please enter your details in the section below. Also note that battles can range from just a few minutes to an hour.
				</p>
				<p>					
					<form name="input" action="insertBat.php" method="post">
						<p><label for="name">Name: </label><input type="text" name="name" /></p>
						<p><label for="email">E-mail: </label><input type="email" name="email" /></p>
						<p><label for="date">Date for Battle: </label><input type="text" name="date" /> (please use yyyy-mm-dd format)</p>
						<p><label for="checkbox"></label><input type="checkbox" name="badge" value="1" />By ticking this box, you confirm that you are the in posession of the previous 7 Gym Badges of the Kanto region</p>
						<p class="submit"><input type="submit" value="Submit" /></p>
					</form> 
				</p>
			</div>

			<?php
            include('footer.php');
			?>	
			
		</div>
	</body>
</html>