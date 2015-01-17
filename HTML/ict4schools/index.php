<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ICT 4 Schools - Home</title>

    <!-- Bootstrap core CSS -->
    <link href="css/custom-bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	
	<script src="../js-libraries/jquery-2.1.1.min.js"></script>
	<script src="js/ict4schools.js"></script>
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script>
function setWelcomeImage()
{
	var myWidth = GetWindowWidth();
	var myHeight = GetWindowHeight();
	
	if (myWidth < 800)
		document.getElementById("welcomeImage").src = "images/headerSmall.png";
	else
		document.getElementById("welcomeImage").src = "images/header.png";
}

$( document ).ready(function() {

setWelcomeImage()

});
</script>
  </head>

  <body>

    <!-- Fixed navbar -->
    <?php
		include('menu.php');
	?>

	
    <!-- Begin page content -->
    <div class="container content">	

			<div class="col-xs-12">
			
			<div class="col-md-offset-1 col-md-10">
				<br>
				<img class="img-responsive" id="welcomeImage" src="images/header.png" alt="welcome image">
				<br>
			</div>
			
			
			<div class="page-header">
				<h1>Welcome</h1>
				<hr>
			</div>
			
			
			
				<!--<p class="lead">
					Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar 
					has been added with <code>padding-top: 60px;</code> on the <code>body &gt; .container</code>.
					</p>-->
				
				<p class="lead">
					ICT4Schools.ie is a service that brings many years of ICT Experience into your Classroom or Training Room. 
					The service has grown from my own first-hand experience at, what was then, the 'chalkface' ...and continued through my years 
					of organising and delivering CPD for teachers. On this site, you can learn about Interactive Whiteboards, Android Tablets, 
					Websites appropriate for Schools, Software for Schools, and dip into some third-party Research in ICT in Education.
				</p>
				
				
			</div>
		
	</div>

    <?php
		include('footer.php');
	?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js-libraries/ie10-viewport-bug-workaround.js"></script>
  

</body></html>