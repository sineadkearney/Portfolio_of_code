<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ICT 4 Schools - Interactive Whiteboards</title>

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
  </head>

  <body>

    <!-- Fixed navbar -->
    <?php
		include('menu.php');
	?>

    <!-- Begin page content -->
    <div class="container content">	
			
		<div class="col-xl-12">
			<div class="page-header">
				<h1>Interactive Whiteboards</h1>
				<hr>
			</div>
		
			<p>
				Everything you need to know about Interactive Whiteboards in Ireland is to be found on this other site that I maintain at 
				<a href="www.cbiproject.net">the Drumcondra Interactive Whiteboard Project</a>
			</p>
				
			<div class="col-xs-12 col-md-8 col-md-offset-2">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  </ol>
			 
			  <!-- Wrapper for slides -->
			  <div class="carousel-inner">
				<div class="item active">
				  <img src="images/cbiproject1.png" alt="...">
				</div>
				<div class="item">
				  <img src="images/cbiproject2.png" alt="...">
				</div>
				<div class="item">
				  <img src="images/cbiproject3.png" alt="...">
				</div>
			  </div>
			 
			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			  </a>
			</div> <!-- Carousel -->			
			</div>
			
		</div>		
	</div>

    <?php
		include('footer.php');
	?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js-libraries/jquery-2.1.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js-libraries/ie10-viewport-bug-workaround.js"></script>
  

</body></html>