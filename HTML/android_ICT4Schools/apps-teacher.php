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
                    
					<h3 class="page-header">Apps for Teachers</h3>
					<hr>
				
				<p class="lead">
				The emphasis in this Resource is on Free Apps that can be used by the Teacher and/or that the Teacher may recommend to be used by the 
				Students - with the Student as Active Collaborator/Contributor/Producer.</p>
				
				<p>These Apps try to move beyond the 'drill and practice' type - they are, hopefully, less of the 'student as consumer' type and aim 
				to support collaborative, managed learning.
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
									<option value="#all">All Subjects</option>
									<option value="#coding">Coding</option>
									<option value="#creating">Creating</option>
									<option value="#diagnostic">Diagnostic</option>
									<option value="#editing">Editing</option>
									<option value="#personalDev">Personal Development</option>
									<option value="#publishing">Publishing</option>
									<option value="#teachingAid">Teaching Aid</option>
									<option value="#whiteboard">Whiteboard</option>
									<option value="#schools">Apps by Schools</option>
									
								</select>
							</div>
						</div>
					</form>
				</div>
				
				<div class="row col-xs-12" id="all">
				<hr>
				<p> <h4>All Subjects:</h4>
				<br>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Voting App from Promethean. Launch your Poll from ActivInspire (free five-user version available from 
				Promethean) and collect your students’ responses. Uses Local Wifi</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.promethean.activengage&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/ActivEngage.jpg">
					<p class="text-center">ActivEngage</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Store, access and share your files ‘in the cloud’</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.dropbox.android&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Dropbox.jpg">
					<p class="text-center">Dropbox</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Social Networking for Schools. Edmodo for the Android makes it easy for teachers and students to stay 
				connected and share information. Use your Android phone to send notes, post replies, and check messages and upcoming events while away 
				from the classroom.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.fusionprojects.edmodo&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Edmodo.jpg">
					<p class="text-center">Edmodo</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Create Notes, with multi-media. You need to 'sign in' with an email address. Can type or, when in 
				typing mode, dictate text; can insert Attachment ( Picture, Audio, Video, File e.g. PDF); you can use tablet's Camera. Pictures etc. 
				do not get inserted into the 'notebook' document but appear along an 'attachment strip' during the creation stage, but into the 
				document when saved. 11 Mb download</i></p>
				<p><strong>Advertising:</strong> <i>This free version needs to be online. No Ads</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.evernote&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Evernote.jpg">
					<p class="text-center">Evernote</p>
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
				<p><strong>Description:</strong> <i>MindBoard adopts a more-tablet based approach in that the content is created through free-hand 
				gestures (rather than typed entry). Can export as PDF. Changing ‘Theme’ does help with legibility. The full version cost €4.99</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=jp.osima.android.mindboardfree' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/MindBoard.JPG">
					<p class="text-center">MindBoard Free</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Standalone App. Also works in the Browser of your PC …30-day trial from the <a href='http://www.mindjet.com'>
				MindJet website</a>. Save in Mindjet 'cloud' or locally.<p>
				</p><i>Log out via Settings. Login Screen is in Portrait Mode but app is in Landscape. Must Login :-( More powerful (insert Images, Links) 
				than SimpleMind (below). Opens files created in <a href='http://freemind.sourceforge.net/wiki/index.php/Main_Page'>FreeMind</a> (.mm) - 
				run this on your Desktop. Opens files created online in <a href='http://www.Mind42.com/>Mind42.com</a>  of the .mm type. There is a Video 
				Tutorial on the Google Play download page.</i></p>
				<p><strong>Advertising:</strong> <i>No Ads. Needs to be online.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=net.thinkingspace&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/MindJet.jpg">
					<p class="text-center">MindJet</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Microsoft's Store, access and share your files ‘in the cloud’ aka 'SkyDrive</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.microsoft.skydrive' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/SkyDrive.JPG">
					<p class="text-center">OneDrive</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> SimpleMind Free for Android™ is a mind mapping tool. The Free version comes with basic but powerful Mind 
				Mapping features. Also available as a <a href='http://www.simpleapps.eu/simplemind/desktop'>Trial Download</a> for Desktops.</p>
				<p><i>Very nice, clean interface. Exports in 'SimpleMind Pro' format ..but otherwise can't Share :-(</i></p>
				<p><strong>Advertising:</strong> <i>No Ads. Works offline</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.modelmakertools.simplemindfree&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/SimpleMind.JPG">
					<p class="text-center">SimpleMind</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Engage the class, save on grading time
				<ul><li>Socrative brings smart clickers to a whole new level. </li>
				<li>Engage the entire classroom with educational games and exercises while getting student results in real-time. </li>
				<li>Run Socrative off any web browser, while your students run it off their smartphone / iPod Touch / Laptop.</li>
				<li>Socrative takes 3 minute for you to setup and 30 sec for your students to load.</li>
				<li>Saves you time grading and lesson planning.</li>
				<li>Games and exercises on their device, results show up on the classroom screen.</li></ul></p>
				<p><strong>Link:</strong> Student: <a href='https://play.google.com/store/apps/details?id=com.socrative.student&hl=en' target='_blank'>
				Google Play Store</a></p>
				<p>Teacher: <a href='https://play.google.com/store/apps/details?id=com.socrative.teacher&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Socrative.jpg">
					<p class="text-center">Socrative</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Inter-student/classroom/school conferencing</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.skype.raider&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Skype.jpg">
					<p class="text-center">Skype</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Planning and Collaboration Tool:</i> You'll know exactly what needs to get done, who's going to do 
				it, and what's coming up next. Plus, everything you do is synced and saved instantly to the cloud, so that all your devices are always 
				up to date. With Trello, you can create boards to organize anything you're working on. Use them solo, or invite <i>[students]</i> to work together</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.trello&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Trello.jpg">
					<p class="text-center">Trello</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Used by many Teachers and a number of classes</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.twitter.android&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Twitter.jpg">
					<p class="text-center">Twitter</p>
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
				
				<div class="row col-xs-12" id="coding">
				<hr>
				<p> <h4>Coding:</h4>
				<br>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Algoid is a more high-level offering (text input but with option of turtle-graphic output). The 
				scripting language is not unlike Java/Python. Programmes can be Saved and/or Shared. Some serious programming is possible! And there 
				is still a Turtle option for the younger audience</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=fr.cyann.algoid' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Algoid.jpg">
					<p class="text-center">Algoid</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Control your Arduino board from your Android device over Bluetooth, Ethernet or USB (Diecimila, Duemilanove, 
				Uno r1/r2/r3, Mega, Leonardo, Nano) using WYSIWYG interface, Android sensors or JavaScript script.</p>
				<p><i>I also found other Apps/Projects at <a href='http://blog.arduino.cc/category/languages/android/'>here</a></i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=name.antonsmirnov.android.arduinocommander&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/ArduinoComm.JPG">
					<p class="text-center">ArduinoCommander</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>LightBot: a useful, visual way to introduce coding. User chooses 'coding buttons' (equivalent to 
				Forward, Jump, Switch, Procedure) in order to control an on-screen robot</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.lightbot.lightbothoc' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/LightBot.jpg">
					<p class="text-center">LightBot</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Pocket Code allows you to create, edit, execute, share, and remix Catrobat programs in a visual, 
				'LEGO-style' programming environment. You can develop your own games, animations, interactive art, music videos, and many kinds of 
				other apps, directly on your phone or tablet. Catrobat is a visual programming language and set of creativity tools for smartphones, 
				tablets, and mobile browsers. Catrobat and the software developed by the Catrobat team are inspired by the Scratch programming system 
				developed by the Lifelong Kindergarten Group at the MIT Media Lab. Learn more at <a href='http://www.catrobat.org/'>catrobat.org</a></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=org.catrobat.catroid' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/PocketCode.jpg">
					<p class="text-center">Pocket Code</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>QuckHTML may have been designed for phones but it gives a clean interface on tablets. User 
				types/creates the raw html code and saves (locally). There is a Run button to generate a Preview</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.vinay.QuickHTML' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/QuickHtml.jpg">
					<p class="text-center">QuickHtml</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Simple Rich Text & Html Editor is a small wysiwyg editor. Just create the document (like any other 
				text object) and 'create html'. There is an option to show/hide the html tags. Use 'Create HTML' to generate the .html file (saved 
				locally in the sd folder) or File can be sent (as a .txt file and then renamed as .html) to Dropbox, LAN etc. Not powerful but a 
				useful start.</i></p>
				<p><strong>Advertising:</strong> <i>Ads</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.lilait.html.speaker.creator.richtext.editor.free' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/SimpleRTweb.JPG">
					<p class="text-center">Simple RT Web Editor</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Spark (Lite) is a serious offering for creating html (and has the option to create accompanying 
				CSS and Javascript). It has a Preview pane. Menus can be dragged from either side of the screen. There is also a FTP facility (but 
				you can just save locally)</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.aesop.systems.htmlx_free' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/sparklite.JPG">
					<p class="text-center">Spark Lite</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Much better than Turtle Graphics, Turtle Draw does have Pen Up/Down ...as well as background-colour 
				changer. Cons: Portrait Mode only, can't see a Turtle :-(</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.alimuzaffar.turtledraw' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/TurtleDraw.jpg">
					<p class="text-center">Turtle Draw</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Turtle Graphics: this app will be familiar to users of Logo from the 1980s! Use commands (such as 
				Repeat, Move, Left and Right) in order to generate a shape. Cons: Portrait Mode only; lacks PenUp/Down commands; can't see a Turtle :-(</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.darkgadgeteer.turtlegraphics' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/TurtleGraphics.jpg">
					<p class="text-center">Turtle Graphics</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>W3schools.com is the premier website for learners of coding. As of yet, it does not have an App so 
				below is provided as a link to the website</i></p>
				<p><strong>Advertising:</strong> <i></i></p>
				<p><strong>Link:</strong> <a href='http://www.w3schools.com/' target='_blank'>
				W3Schools.com</a></p>">
				<img  class="centered" src="images/teacher/w3schools.jpg">
					<p class="text-center">W3Schools</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="creating">
				<hr>
				<p> <h4>Creating:</h4>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Clayframes Lite, might be a more school-appropriate app than Motion. This will, in the paid-for version 
				(€1.89), let you Export etc.; does not have audio</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=jal.clickstudiofree.mainpack' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/ClayFrames.JPG">
					<p class="text-center">Clayframes Lite</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Animating Touch: <i>cartoon animation with 'tweening' and 'pivot points'. Can also export to .mp4. 
				Very useful! I think I just might have to buy the full version!</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=ru.jecklandin.stickman' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Cartoon.png">
					<p class="text-center">Drawing Cartoons</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>At BETT2014, I watched staff of British Museum (at the Samsund Stand) using a Stop Motion app 
				...I hope I have linked to the correct one below. </i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=us.feras.motion&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Motion.jpg">
					<p class="text-center">Motion - Stop Motion Camera</p>
				</div>
=
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Make Videos using images in Gallery (or from your own My Pictures etc.). Zoom in/out to different 
				parts of the 'canvas'. I found the best way to add voice-over was to Export, then play the video (in a Media Player) and note where the 
				insertion points should be. Available as an app (below, €2.49) but I used the seven-day trial from <a href='http://www.sparkol.com/home'>
				sparkol.com</a></i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=air.com.sparkol.videoscribetv' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/videoscribeJ.JPG">
					<p class="text-center">VideoScribe</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Woices is a FREE service for creating, sharing and listening to audioguides made by [students] for 
				the [students] ...using the Android GPS feature which allows Woices to know exactly where you are.</p>
				<p><i>Need to Register. Nice one - in Spanish - regarding Phoenix Park at <a href='http://woices.com/echo/10753'>woices.com</a>. 
				Education Guide (in Spanish, so use Translate) at <a href='http://www.educacontic.es/blog/mapas-sonoros-educativos-con-woices'>educacontic.es</a>.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.woices&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Woices.png">
					<p class="text-center">Woices</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="diagnostic">
				<hr>
				<p> <h4>Diagnostic:</h4>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> The 'Ishiahara' Colour Blindness Test.</p>
				<p><i>A simple but useful diagnostic app (most usually - but not exclusively - for Boys or Mixed classrooms)</i></p>
				<p><strong>Advertising:</strong> <i>No Ads. Runs when offline</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=inutilsoft.ColorBlindnessTest&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Colour.JPG">
					<p class="text-center">Colour Blindness</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> This add free app uses latest research on the transtheoretical model of physical activity participation 
				to help you assess your PE students quickly. Note: The research in this app was done across 6 secondary schools in the Republic of Ireland.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=appinventor.ai_garyjokeeffe.PETEACHERTOOL' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/PEassess.JPG">
					<p class="text-center">PE Teacher Assessment Tool</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="editing">
				<hr>
				<p> <h4>Editing:</h4>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Google provides its own Image Takers and Editing app. Panaroma Mode looks interesting</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.google.android.GoogleCamera' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/GoogleCam.JPG">
					<p class="text-center">Google Camera</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Adobe Photoshop Express. Edit and share photos virtually anywhere. Touch to crop, rotate, adjust color, 
				and add artistic effects. Quickly share with family and friends. Requires SD card.</p>
				<p><i>This well-known brand is now available on your Tablet: Choose pictures in your Gallery and make all(?) the edits you want. Save 
				the changes (and your Original stays intact). Options to Upload to Facebook or Twitpic (but you can just save locally).</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.adobe.psmobile' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Photoshop.png">
					<p class="text-center">Photoshop</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Skitch: <i>edit, modify and share images. Annotate over Images and Web Shots ...and over a blank screen 
				(whiteboard type)</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.evernote.skitch&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Skitch.png">
					<p class="text-center">Skitch</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Snapseed is the only photo app you’ll want to use every day. It makes any photograph extraordinary with 
				a fun, high-quality photo experience right at your fingertips. Anyone can enhance, transform, and share their photos with ease using 
				incredibly advanced features from the leader in digital photography software.</p>
				<p><i>I really like the way this app works on the Tablet: the abilty to slide to change the various effects is very user-friendly. 
				'Crop' option even shows 'Rule of Thirds' gridlines.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.niksoftware.snapseed&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Snapseed.png">
					<p class="text-center">Snapseed</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="personalDev">
				<hr>
				<p> <h4>Personal Development:</h4>
				<br>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>The first(?) 'Education Centre' on Android. :-)</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.ogxapps.ecdrumcondra&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/DEC.JPG">
					<p class="text-center">Drumcondra Education Centre</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> TED's official Android app presents talks from some of the world's most fascinating people: education 
				radicals, tech geniuses, medical mavericks, business gurus, and music legends. Find more than 1200 TEDTalk videos and audios (with more 
				added each week) on the official TED app -- now for tablets and smartphones. This app is made possible with the generous support of Sony.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.ted.android&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/TED.jpg">
					<p class="text-center">TED</p>
				</div>
				
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="publishing">
				<hr>
				<p> <h4>Publishing:</h4>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Book Creator was previoulsy avaialble on the iPad. Released for Android April 2014. The simple way to 
				create your own beautiful ebooks, right on your tablet.</p>
				<p><i>Quote from CESI List 'I really can't recommend the book creator app enough. 
				It's such a user friendly app.'. Cost €2.50</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=net.redjumper.bookcreator' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/BookCreator.jpg">
					<p class="text-center">Book Creator</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Not just Files in the Cloud, but Applications in the Cloud also. Access all your Clouds (Dropbox, 
				Box, Drive, OneDrive, Hightail) from one location. Works - without charge - on Desktop (via <a href='http://www.cloudon.com/>cloudon.com</a>
				) also (having downloaded Plugin): you get a simplified Office toollbar. Same interface on App ...use a Long Press for Menu (e.g. to 
				make a correction to a typo). Automatic Saving and Syncing across devices. Additional features are available for €3 or €4 monthly fee.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/people/details?id=114979229546573125506&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/CloudOn.jpg">
					<p class="text-center">CloudOn</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Creative Book Builder for Android enables everyone to create, edit and publish ebooks in a few minutes on the go. 
				All published ebooks can be read by any ePub readers. <i>Cost €3.05</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.tigernghk.android.cbb' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/CBB.JPG">
					<p class="text-center">Creative Book Builder</p>
				</div>
				
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
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Designed for 'budding Journalists' this app combines Text with Video Editing, Image Capture, 
				Voice Recording ....could be interesting</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=info.guardianproject.mrapp' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/StoryMaker.jpg">
					<p class="text-center">StoryMaker</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Weebly for Android lets you:
				<ul><li>Start a new blog with our powerful drag & drop creator and modern themes</li>
				<li>Create new blog posts while on the go</li>
				<li>Easily add text and photos to your blog posts</li>
				<li>Receive push notifications for blog comments and form entries</li>
				<li>Instantly respond to blog comments & form entries etc.</li></ul></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.weebly.android' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/weebly.jpg">
					<p class="text-center">Weebly</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> WordPress for Android puts the power of publishing in your hands, making it easy to create and consume 
				content. Write, edit, and publish posts to your site, check stats, and get inspired with great posts in the Reader</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=org.wordpress.android&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Wordpress.jpg">
					<p class="text-center">Wordpress</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="teachingAid">
				<hr>
				<p> <h4>Teaching Aid:</h4>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> ClassDojo helps teachers improve behavior in their classrooms quickly and easily. It also captures 
				and generates data on behavio[u]r that teachers can share with parents and administrators. Teachers can use this app to give students 
				realtime feedback while in class - it will sync with the main <a href='http://www.classdojo.com/'>ClassDojo website</a></p>
				<p><i>I note that it is used by a number of Teachers on the CESI List. Very easy to use app</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.classdojo.android' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/ClassDojo.png">
					<p class="text-center">Class Dojo</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Remind101 provides a safe way for teachers to text message students and stay in touch with parents. 
				It is 100% free and is used by over 500,000 teachers, students and parents to send millions of messages every month.</p>
				<p><i>Need to test this for Ireland!</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.remind101' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Remind101.png">
					<p class="text-center">Free Teacher Text Messaging</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Whiteboard-style app that allows you (or your students) to create Screencasts. Includes Voice Recorder 
				as well as drawing tools. Screencasts are published (and stored) on <a href='http://www.lensoo.com/>Lensoo website</a></i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.lensoo.create' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Lensoo.JPG">
					<p class="text-center">Lensoo Create</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Mathletics is used in a number of Irish schools.</i> Mathletics Teacher is available as a free 
				download to all mathletics.com subscribers and requires login credentials to access. Mathletics is evolving… right into your hands. 
				Mathletics Teacher is the dedicated smartphone app for teachers. Simply use your Mathletics Teacher ID to sign in.</p>
				<p><strong>Advertising:</strong> <i></i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=air.MTApp&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/MathleticsTr.JPG">
					<p class="text-center">Mathletics Teacher</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Simply set your document on the table and then frame it up on the screen. Tap on the screen to focus 
				your device camera on the document. If lighting is bad in your room, tap on the light bulb icon to turn on your device camera flash. 
				Then tap on the save icon. The document will be converted to a PDF file and stored on your SD card.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.ape.camera.docscan' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/DocScan.JPG">
					<p class="text-center">PDF Document Scanner</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Optical Text Recognition (OCR) application which can be used to convert text (either English or 
				Russian for now) on a paper to editable digital text on your device. Extracted/converted text can later be edited if required, 
				selected and saved to a clipboard and/or shared via any application installed on the device (e.g. translated with Google translate).</p>
				<p><i>Works best on text of same size i.e. don't scan Headings at same time as Body Text</i></p>
				<p><strong>Advertising:</strong> <i>No Ads. Runs offline</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.andretor.scantotext' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/ScanTextOCR.png">
					<p class="text-center">ScanToText (OCR)</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> ***Winner*** for best android teacher app. The app allows teachers to take attendance and record grades 
				on their phone or tablet, along with many additional features. Pro Version also available.</p>
				<p><strong>Link:</strong> Demo version: <a href='https://play.google.com/store/apps/details?id=com.apps.ips.TeacherAideDemo2' target='_blank'>
				Google Play Store</a></p>
				<p>Ver 1 €7.99: <a href='https://play.google.com/store/apps/details?id=com.glen.apps.TeacherAidePro' target='_blank'>
				Google Play Store</a></p>
				<p>Ver 2 €9.99: <a href='https://play.google.com/store/apps/details?id=com.apps.ips.TeacherAidePro2' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/TeacherAide.JPG">
					<p class="text-center">Teaching Aide</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="whiteboard">
				<hr>
				<p> <h4>Whiteboard:</h4>
				</p></div>
				
				<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Display runs as a Host on the Teacher's PC. Students (or Teacher) can then login via wifi as Participant. 
				Clent App is free (but a fee for Host version). Client App may also be be used for free as a stand-alone IWB app. Pros: Different Backgrounds; 
				Pinch to Rotate or Zoom; Shapes, Colours, Pens, Fill</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.displaynote.app&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/DisplayNote.jpg">
					<p class="text-center">DisplayNote</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> IWB Sharing: Groupboard is a free multi-user shared whiteboard, allowing you to draw and chat in real 
				time with other people anywhere on the internet. Use it for online tutoring, collaborative design, or just for fun! </p>
				<p>Simple to use - simply start the app and then draw on the screen by dragging your finger. Use two fingers (pinch gesture) to zoom 
				in or out and scroll. Click the Connect tab to connect with other people.</p>
				<p><i>Note: also works via their website (as html) at <a href='http://www.groupboard.com/'>groupboard.com</a> (e.g. .../board/268699) 
				but the app can work as a stand-alone without connection</i></p>
				<p><strong>Advertising:</strong> <i>Needs to be online. Ads in free 5-user version</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.grouptechnologies.groupboard&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/Groupboard.jpg">
					<p class="text-center">Groupboard</p>
				</div>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="schools">
				<hr>
				<p> <h4>Some of the Schools wihich provide Android App Access:</h4>
				<br>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.appmakr.app494277' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/StGeralds.jpg">
					<p class="text-center">St Gerald's College, Castlebar</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.uniquepublishing.schoolmounttemple&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/mountTemple.jpg">
					<p class="text-center">Mount Temple, Dublin</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.uniquepublishing.holychildschool' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/holyChild.jpg">
					<p class="text-center">Holy Child, Killiney</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.app_stfinians.layout' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/finians.jpg">
					<p class="text-center">St. Finian's CC, Swords</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.app_donabatecc.layout&hl=fr_CA' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/donabate.jpg">
					<p class="text-center">Donabate CC</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.uniquepublishing.stpeterscollegewexford&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/stpeters.jpg">
					<p class="text-center">St. Peter's College, Wexford</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.schoolspace.athlonecc&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/athlone.jpg">
					<p class="text-center">Athlone CC</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.app_deelecollege.layout&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/deele.jpg">
					<p class="text-center">Deele CC, Raphoe</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.schoolspace.staidanscbs' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/aidans.jpg">
					<p class="text-center">St. Aidan's CBS, D9</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.schoolspace.stmarysch' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/marys.jpg">
					<p class="text-center">St. Mary’s, Charleville</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.schoolspace.davis' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/davis.jpg">
					<p class="text-center">Davis College, Mallow</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.schoolspace.loreto' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/loreto.jpg">
					<p class="text-center">Loreto College, Kilkenny</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.schoolspace.cbccork2' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/cbsCork.jpg">
					<p class="text-center">CBS, Cork</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.schoolspace.liberties' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/liberties.jpg">
					<p class="text-center">Liberties College</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.schoolspace.causeway' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/causeway.jpg">
					<p class="text-center">Causeway Comp, Kerry</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.schoolspace.pearse' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/pearse.jpg">
					<p class="text-center">Pearse College, Crumlin</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.schoolspace.mountmercy2' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/mountMercy.jpg">
					<p class="text-center">Mount Mercy, Cork</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.schoolspace.kildareplace' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/kildarePlace.jpg">
					<p class="text-center">Kildare Place, Dublin</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.schoolspace.colaistetreasa' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/treasa.jpg">
					<p class="text-center">Col. Treasa, Kanturk</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.schoolspace.sjsb' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/ballybunion.jpg">
					<p class="text-center">St Joseph’s, Ballybunion</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.schoolspace.mallow' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/teacher/mallow.jpg">
					<p class="text-center">Mallow College</p>
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
