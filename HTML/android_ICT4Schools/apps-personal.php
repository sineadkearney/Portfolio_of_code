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
                    
					<h3 class="page-header">Apps for Personal Use</h3>
					<hr>
				
				<p class="lead">
				The emphasis in this page is on Apps for use by a Teacher or Other in his/her Personal/Professional Life.</p>
				
				<p>Hopefully the range of apps will help to support our view that Android is a perfectly acceptable alternative to 'the other mobile platform'
				</p>
				
				<p>
				<strong>Click on any icon below</strong> to see a description of the app, and a link to the (usually) Google Play Store (for which you will 
				have previously registered an email account). Click anywhere on the page to close the description. We have have copied and pasted the description of the apps listed below but the <i>use 
				of Italics indicates that the App has also been Tested by us </i>
				</p>
				
				
				<div class="col-xs-12 col-md-offset-7 col-md-5">
					<form id="bootstrapSelectForm" method="post" class="form-horizontal ">
						<div class="form-group">
							<label class="col-xs-2 col-md-4 control-label">Jump To:</label>
							<div class="col-xs-10 col-md-7 selectContainer">
								<select id="jumpToSelection" onchange="location = this.options[this.selectedIndex].value" class="form-control">
									<option value="#top"></option>
									<option value="#banking">Banking/Finance</option>
									<option value="#cloud">Cloud Storage</option>
									<option value="#entertainment">Entertainment/Hobbies</option>
									<option value="#games">Games</option>
									<option value="#netComm">Networking/Communication</option>
									<option value="#news">News/Media</option>
									<option value="#office">Office</option>
									<option value="#property">Property</option>
									<option value="#shopping">Shopping</option>
									<option value="#travel">Travel</option>
									<option value="#weather">Weather</option>
								</select>
							</div>
						</div>
					</form>
				</div>
				
				<div class="row col-xs-12" id="banking">
				<hr>
				<p> <h4>Banking/Finance:</h4>
				<br>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Personal Banking</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=aib.ibank.android&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/AIB.jpg">
					<p class="text-center">Allied Irish Bank</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Personal Banking</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.bankofireland.mobilebanking&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/BankOfIreland.jpg">
					<p class="text-center">Bank Of Ireland</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> MyBudgetBuddy is the official app of the Irish League of Credit Unions. MyBudgetBuddy is an easy-to-use 
				budgeting application that helps you understand and manage your income and expenses. Income and expenses are grouped into categories 
				and you can display all income and expenses in a list or in graph view. You can also use the interactive Credit Union Locator to help 
				you find a credit union in Ireland close to you. Keep up to date with the latest news from the Irish League of Credit Unions social media 
				channels including the latest Facebook, Twitter and Blog feeds.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=ie.creditunion.iphone&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/CreditUnion.jpg">
					<p class="text-center">Credit Union</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Author:</strong> Karl Grabe</p>
				<p><strong>Description:</strong> Irish PAYE Income Tax calculator for Budget 2014 (& 2013). Changes from 2013:
				<ul><li>Property Tax Doubled (2013 only charged for 2nd half of the year)</li>
				<li>The Haddington Road Agreement; Public sector pension levy changes</li></ul>
				This is the mobile version of the desktop tax calculator <a href='http://www.TaxCalc.eu/>TaxCalc.eu</a></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=eu.phonetax&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/PhoneTax.jpg">
					<p class="text-center">Income Tax</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Personal Banking, ROI version</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.rbs.mobile.android.ubr&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/UlsterBank.jpg">
					<p class="text-center">Ulster Bank</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="cloud">
				<hr>
				<p> <h4>Cloud Storage:</h4>
				<br>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Cloud Storage with Dropbox</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.dropbox.android&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/DropboxPers.JPG">
					<p class="text-center">Dropbox</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <ul><lli>With Google Drive, you can store all your files in one place, so you can access them from 
				anywhere and share them with others</li>
				<li>Use the Google Drive Android app to access your photos, documents, videos and other files stored on your Google Drive</li>
				<li>Upload files to Google Drive directly from your Android device</li>
				<li>Share any file with your contacts ...</li></ul></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.google.android.apps.docs' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/GoogleDriveTr.png">
					<p class="text-center">Google Drive</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Microsoft's Store, access and share your files ‘in the cloud’ aka 'SkyDrive</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.microsoft.skydrive' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/SkyDrive.JPG">
					<p class="text-center">OneDrive</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="entertainment">
				<hr>
				<p> <h4>Entertainment/Hobbies:</h4>
				<br>
				</p></div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Art Academy aims to be an art reference app for modern and classic art. This virtual art gallery lets 
				its users learn more about their favorite paintings and artists and share their findings with friends. Additionally, using this art 
				guide they can also browse the painting collections of the best museums in the world and locate them on a map.<p>
				<p><i>Supposed to be heavy on resources so check that you Quit when finished! Works in Portrait Mode (although images rotate to Landscape 
				when fully pinch-zoomed). Painters listed from Aachen to Zwart. Images can be shared, saved, used as Wallpaper. Uses Wikipedia for 
				additional info.</i></p>
				<p><strong>Advertising:</strong> <i>Ads appear ...App needs to be online</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.merdroid.artyfarty&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/ArtAcademy.JPG">
					<p class="text-center">Art Academy</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> (Unofficial) Dublin zoo visitor app, developed as a project for an Android programming course at UCD.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.smellyhector.DubZoo' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/DubZoo.jpg">
					<p class="text-center">Dublin Zoo</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Ireland's most popular entertainment website brings you the App that you can never be without! 
				From entertainment.ie, Ireland's most up-to-date and reliable online listings service for over 10 years. Features include:
				<ul><li>Complete Cinema Guide for Ireland</li>
				<li>What's on Today for Gigs, Theatre, Events and Festival</li>
				<li>Maps for venues</li></ul></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.entertainment.ie' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Entertainment.jpg">
					<p class="text-center">Entertainment.ie</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Explore the renowned, idyllic Fota Island Resort on your Android phone.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=clients.fotaisland#?t=W251bGwsMSwxLDIxMiwiY2xpZW50cy5mb3RhaXNsYW5kIl0.' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Fota.jpg">
					<p class="text-center">Fota</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> The GAA is the largest amateur sporting association in the world promoting gaelic games and Irish culture. 
				The Official GAA Android app provides latest news, fixtures, results, photos, videos and venue information.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=ie.ebow.gaa&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/GAA.png">
					<p class="text-center">GAA</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Author:</strong> </p>
				<p><strong>Description:</strong> The official IRFU App brought to you in association with O2 is the best way to get all the latest 
				information from the Irish Rugby Football Union including live score updates on your Android – absolutely free!</p>
				<p><strong>Advertising:</strong> <i></i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.imobile.irfu' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/IRFU.png">
					<p class="text-center">IRFU</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>Read ‘kindle-type’ eBooks on your Android. Text can be Pinched to Zoom (to quite a large font size). 
				Long Click on a word to see its definition (via the free Downloaded Dictionary). Stroke sideways to turn pages (or tap bottom corner). 
				User Notes can be inserted. Background Colour can be set, as can Line Spacing, Number of Columns and Margin Size (very good for Dyslexia). 
				Some free titles (Alice in Wonderland, Pride and Prejudice etc.) can be downloaded from 
				<a href='http://www.amazon.com/Totally-Free-kindle-Books/lm/R27UG52OAM3TFX(registration'>Amazon</a> needed) ...or from 
				<a href='http://m.gutenberg.org/'>Project Gutenberg</a> (no reg. needed).</p>
				<p>Note that the Installed 'FBReader' (below) will also read the Kindle .mobi formats</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.amazon.kindle&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/KindleReader.JPG">
					<p class="text-center">Kindle Reader</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> The latest version of the official YouTube app. Keep up with your favourite YouTube channels and 
				access the world’s videos anywhere with the official YouTube app for Android.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.google.android.youtube&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/YouTube.jpg">
					<p class="text-center">YouTube</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="games">
				<hr>
				<p> <h4>Games:</h4>
				<br>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Author:</strong> Grey Olltwit</p>
				<p><strong>Description:</strong> 2 player game of snakes and ladders. You can play the traditional way of up the ladders and down the snakes 
				or down the ladders and up the snakes, hence the name ADDers and Ladders. It is also a reference to the condition of Attention Deficit 
				Disorder (or ADHD) as I also look after the charity ADDers.org. There is no advertising in the game but future editions may include it 
				to raise funds for our charity. A one player game against the computer is also included ...Can be played landscape on a cell phone but 
				best played on a tablet. On screen help is included via a help button, as well as a great dice shaker and automated up and down counter 
				sliding.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.greyolltwit.addersnladders' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/GreyLadders.jpg">
					<p class="text-center">ADDers and Ladders</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Author:</strong> Grey Olltwit</p>
				<p><strong>Description:</strong> 2 player checkers game. A traditional board game where cunning strategy and forward planning skill is 
				required to beat your opponent. One player against the computer is included as an option... Can be played landscape on a phone but best 
				played on a tablet.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.greyolltwit.draughts' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/GreyCheckers.jpg">
					<p class="text-center">Checkers</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.teazel.crossword.lite&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Crossword.jpg">
					<p class="text-center">Crossword LITE</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Hangman comes with huge options of categories to play on.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=in.appbulous.hangman' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Hangman.png">
					<p class="text-center">Hangman</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.mobilityware.solitaire&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Solitaire.jpg">
					<p class="text-center">Solitaire</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.icenta.sudoku.ui&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Sudoku.jpg">
					<p class="text-center">Sudoku</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Author:</strong> Grey Olltwit</p>
				<p><strong>Description:</strong> Addictive simple game of TIC TAC TOE, or Noughts and Crosses as we call it in the UK. I know there are 
				lots of this type of game available but I think mine is unique in that I've made it so that the computer makes as near human like moves 
				as possible, giving you every chance of beating it i.e. it makes mistakes. Make a line of X's or O's to win.</p>
				<p><strong>Advertising:</strong> <i></i></p>
				<p><strong>Link:</strong> <a href='' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/GreyTTT.jpg">
					<p class="text-center">Tic Tac Toe</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Tic Tac Toe HD app is a modern version of ancient classic game. Tic Tac Toe is a simple, free, fun and 
				addictive game for 1 or 2 players. You can play as single player against Android or play with your friends or relatives.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.cgames.tictactoehd' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/TicTac.png">
					<p class="text-center">Tic Tac Toe HD</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="netComm">
				<hr>
				<p> <h4>Networking/Communication:</h4>
				<br>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Social Networking</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.facebook.katana&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Facebook.jpg">
					<p class="text-center">Facebook</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Over 200 million users love Instagram! It's a simple way to capture and share the world's moments on your 
				Android. Customize your photos and videos with one of several gorgeous and custom built filter effects.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.instagram.android' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Instagram.jpg">
					<p class="text-center">Instagram</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Social Networking for Professionals</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.linkedin.android&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/LinkedIn.jpg">
					<p class="text-center">LinkedIn</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Pinterest is a tool to find your inspiration and share it with others. Use it to collect things you love, 
				organize and plan important projects, and more.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.pinterest&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Pinterest.png">
					<p class="text-center">Pinterest</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Video and Audio Conferencing via the web</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.skype.raider&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/SkypePers.JPG">
					<p class="text-center">Skype</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> For Tweets and Retweets</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.twitter.android&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/TwitterPers.JPG">
					<p class="text-center">Twitter</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> WhatsApp Messenger is a smartphone messenger available for Android and other smartphones. WhatsApp uses 
				your 3G or WiFi (when available) to message with friends and family. Switch from SMS to WhatsApp to send and receive messages, pictures, 
				audio notes, and video messages. First year FREE! ($0.99 USD/year after)</p>
				<p><strong>Advertising:</strong> <i>Yarvik is 'not compatible'</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.whatsapp' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/WhatsApp.png">
					<p class="text-center">Whats App</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Viber allows you to call, text, and send photos worldwide for free to over 175 million users.
				<ul><li>Free calls with HD sound quality</li>
				<li>Free text and photo messaging </li>
				<li>Simple to use</li>
				<li>Always on</li>
				<li>Ad free</li>
				<li>100% free (Network data charges may apply)</li></ul></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.viber.voip&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Viber.png">
					<p class="text-center">Viber</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>

				<div class="row col-xs-12" id="news">
				<hr>
				<p> <h4>News/Media:</h4>
				<br>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.grabradioworld.FourFM&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/4fm.jpg">
					<p class="text-center">4 FM</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>I like that you can Increase/Decrease the Font Size</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.feedhenry.fhjjjn7In7fqJG2LHTv3LVLanX&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/IrishIndo.jpg">
					<p class="text-center">Irish Independent</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.irishtimes.newsapp' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/IrishTimes.jpg">
					<p class="text-center">Irish Times</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.thisisaim.newstalk&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Newstalk.jpg">
					<p class="text-center">Newstalk.ie</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=ie.rte.news&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/RTEnews.jpg">
					<p class="text-center">RTE News Now</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.thisisaim.docsonone&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/RTEdocs.JPG">
					<p class="text-center">RTE Radio Documentaries</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Up-to-the-minute breaking news, all day, every day. We tell our stories through word, video, pictures, 
				polls and readers' comments.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.distilledmedia.thejournal&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Journal.jpg">
					<p class="text-center">TheJournal.ie</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.thisisaim.todayfm&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/TodayFM.jpg">
					<p class="text-center">Today FM</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="office">
				<hr>
				<p> <h4>Office:</h4>
				<br>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i><ul><li>'Office Compatible' Editor and Saver for 'Word, Excel and PowerPoint'. Can 'Pinch and Zoom' document, 
				Save and/or Print to Cloud</li>
				<li>Word - nice style of Menu buttons; can Insert Bookmarks, Comments; Word Count; Encrypt; Change Colour Scheme; Spell Check; Undo and Redo; </li>
				<li>Pinch to Zoom (or use a Slider); Landscape format only (although one can scroll, of course)</li>
				<li>PowerPoint - Can insert Text, with Bullet Points (but these don't animate). Nice Transitions, use Swipe to Navigate. Cannot insert media :-(</li>
				<li>Excel - has many of the features of the 'real thing'; fairly advanced statistical and financial analysis. Chart Option appeared in Update to 5.3.2. 
				PDFs can be opened :-)</li></ul>
				Free Desktop version from <a href='http://www.kingsoftstore.com/software/kingsoft-office-freeware'>kingsoftstore.com</a></i></p>
				<p><strong>Advertising:</strong> <i>No Ads. Works Offline</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=cn.wps.moffice_eng&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Kingsoft.JPG">
					<p class="text-center">Kingsoft Office</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>'Office' App as used on Samsung Galaxy Tab but available for other tablets also. This come with a 
				Text-to-Speech (TTS) feature which underlines line-by-line as read, with a ‘human’ voice. Punctuation is good although there are 
				pauses at the end of line of text, and some contractions are unexpected. The interface is different (but not a problem!). Supports 
				both .doc and .docx formats</i></p>
				<p><strong>Advertising:</strong> <i>Runs Offline. No ads</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.infraware.polarisoffice4&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/PolarisOffice.jpg">
					<p class="text-center">Polaris Office</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="property">
				<hr>
				<p> <h4>Property:</h4>
				<br>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Search Ireland’s largest property website with the free Daft.ie Android app - over 100,000 properties 
				right at your finger tips.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.daft.ie&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Daft.jpg">
					<p class="text-center">Daft.ie</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=ie.myhome.android.app&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/MyHome.jpg">
					<p class="text-center">MyHome.ie</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="shopping">
				<hr>
				<p> <h4>Shopping:</h4>
				<br>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=de.apptiv.business.android.aldi_ie&feature=also_installed#?t=W251bGwsMSwyLDEwNCwiZGUuYXBwdGl2LmJ1c2luZXNzLmFuZHJvaWQuYWxkaV9pZSJd' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Aldi.jpg">
					<p class="text-center">Aldi Ireland</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>Used to identify a Product, for which you can then Search on the 'net. Scanning is done via 
				Tablet/Phone's Camera</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.google.zxing.client.android&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/BarCode.png">
					<p class="text-center">Bar-code Scanner</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.productworld.centra&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Centra.jpg">
					<p class="text-center">Centra</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=de.sec.mobile' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Lidl.jpg">
					<p class="text-center">Lidl</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>Used in many advertising campaigns, QR Codes are a a qucik way of linking you to websites with further 
				information, images, videos etc. This tool will also create a QR Code for your own use. Scanning is done via Tablet/Phone's Camera</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=la.droid.qr&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/QRdroid.jpg">
					<p class="text-center">QR Scanner</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.ammeon.supervalu' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Supervalu.jpg">
					<p class="text-center">Supervalu</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> This is the Tesco UK app (I couldn't yet locate one for Ireland) ...but useful for its Recipes, Bar Code 
				Scanner - and price comparison</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.tesco.grocery.view&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Tesco.jpg">
					<p class="text-center">Tesco</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Get fantastic vouchers direct to your Android handset - Simply search and save. Vouchercloud is now 
				available in UK,Ireland, Malta and Netherlands.</p>
				<p>If you love saving money and you love big brands and local businesses then you’ll love vouchercloud. Free to download and use, 
				vouchercloud has the biggest selection of mobile discount vouchers – an unrivalled mix of High Street giants and carefully selected 
				local independents.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.vouchercloud.android&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/VoucherCloud.png">
					<p class="text-center">Voucher Cloud</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="travel">
				<hr>
				<p> <h4>Travel:</h4>
				<br>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Hope it's the Irish version!</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.theaa.android.theaa&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/AAroad.jpg">
					<p class="text-center">AA Roadwatch</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.feedhenry.fhOKcsg_B__vVOb8G_OvkN_kbB&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/AerLingus.jpg">
					<p class="text-center">Aer Lingus</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Get this FREE city guide, a personal trip advisor in your pocket. With restaurants, attractions, 
				hotels and TripAdvisor reviews you love, stored in the app, all available offline -- no data roaming charges!</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.tripadvisor.android.apps.cityguide.dublin' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/DublinCity.png">
					<p class="text-center">Dublin City Guide</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Discover the history of Dungarvan, Co. Waterford, Ireland and explore some of the historic landmarks. 
				This easy to use audio tour features contemporary accounts from soldiers, travellers and writers from times past. Travel back in time and 
				see the town as our ancestors saw it. Contains an interactive map, 38 photos (most over 100 years old), a cast of 9 actors, sound effects 
				and a script created by historians from Waterford County Museum.</p>
				<p>Once the tour has been downloaded it works offline, which means that you can enjoy the tour without needing to connect to the internet.</p>
				<p><strong>Advertising:</strong> <i>Guide works Offline</i></p>
				<p><strong>Link:</strong> <a href='' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Dungarvan.png">
					<p class="text-center">Dungarvan Town Trail</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Guide on how to use the European Health Insurance Card in the 27 EU countries, Iceland, Lichtenstein, 
				Norway and Switzerland. It includes general information about the card, emergency phone numbers, covered treatments and costs, how to 
				claim reimbursement and who to contact in case you have lost your card.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=eu.europa.ec.ehic&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/EuroHealth.png">
					<p class="text-center">European Health Insurance Card</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Discover Ireland</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.ammeon.di#?t=W251bGwsMSwyLDIxMiwiY29tLmFtbWVvbi5kaSJd' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Discover.JPG">
					<p class="text-center">Fáilte Ireland</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>…even better than the Apple one??? Pre-installed on many Tablets but also available from the Play 
				Store. Can Pinch to Zoom In/Out.</i></p>
				<p><strong>Advertising:</strong> <i>In airplane/no-wifi mode, you will be able to see the last visited location but you need to be 
				on-line to get the full potential of this app.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.google.android.apps.maps&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/GoogleMaps.jpg">
					<p class="text-center">Maps</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Get timetable and realtime results for any train station in Ireland! Includes the ability to check all 
				the stations a train will call at, save favo(u)rite stations, receive travel alerts and find your nearest station. Data provided by 
				Irish Rail.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.nextTrain&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/NextTrain.png">
					<p class="text-center">Next Train Ireland</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Pumps.ie for Android will help you get the best price for your petrol and diesel throughout Ireland.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=ie.pumps&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Pumps.jpg">
					<p class="text-center">Pumps.ie</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.ryanair.cheapflights&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/Ryanair.jpg">
					<p class="text-center">Ryanair</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> No more searching through your inbox to find your airline reservation. No more scrambling to get directions 
				to your hotel. No more worrying about what time your business dinner starts. With TripIt, everything you need to get you where you’re going 
				and back again is at your fingertips</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.tripit&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/TripIt.jpg">
					<p class="text-center">TripIt</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Passengers stranded at airports or awaiting missing luggage may now use a mobile application to check 
				their rights immediately and on the spot.</p>
				<p>Launched by the European Commission in 2013, the app now covers all modes of transport in the EU – air, rail, bus and boat.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.mobility.dg.android&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/YourPassenger.png">
					<p class="text-center">Your Passenger Rights</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="weather">
				<hr>
				<p> <h4>Weather:</h4>
				<br>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> ...and when will there be rain?</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=net.fusio.meteireann&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/personal/MetEireann.jpg">
					<p class="text-center">Met Eireann</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
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
