<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="icon" type="image/png"  href="images/Android_robot.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Android Tablets in the Classroom</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	    <!-- jQuery -->
    <script src="../js-libraries/jquery-2.1.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js-libraries/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
	
	<script src="js/androidICT.js"></script>
	
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

    <div id="wrapper">

        <!-- Navigation -->
        		  <?php
		include('menu.php');
	?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="page-header">Search Results:</h3>
					<hr>
					
					<div id="search-results">
					</div>
				
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

			

	<!-- /#page-wrapper -->
        </div>
        
    </div>
    <!-- /#wrapper -->

				  
				  
				  <?php
		include('footer.php');
	?>


</body>

</html>
