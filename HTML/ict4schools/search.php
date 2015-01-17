<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ICT 4 Schools</title>

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
	


/**************** for search only ************************/
function showResult(str) {
	

  if (str.length==0) { 
	document.getElementById("search-results").innerHTML = 'Error: no search term'
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {

	document.getElementById("search-results").innerHTML = xmlhttp.responseText;

    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}

$( document ).ready(function() {

	var url = document.URL;
	var searchTerm = url.substr(url.indexOf("=")+1);	
	showResult(searchTerm)
});
	</script>
  </head>

  <body>

    <!-- Fixed navbar -->
    <?php
		include('menu.php');
	?>

    <!-- Begin page content -->
    <div class="container">	  
		<div class="col-md-12">
			
			 <h3 class="page-header">Search Results:
				<hr>
			 </h3>
					
					
					<div id="search-results">
					</div>
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