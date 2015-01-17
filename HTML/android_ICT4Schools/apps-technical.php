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
                    
					<h3 class="page-header">Apps for Technical Use</h3>
				
				<p class="lead">
				The emphasis in this Resource is on Free Apps that can be used by the Teacher in a more Technical Role (or can be used by a supporting 
				Tech. Company)</p>

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
				<p> <h4></h4>
				<br>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>Manage your Android from your PC over Wifi. Can also be used to demonstrate apps ...although there 
				can be a time delay. Install (then run) the App on your Tablet; then use the Browser on your PC to enter the given IP Address and Password.</p>
				<p>Allows you to, for example, take a Screenshot onto your PC of the work done by your Student/Tablet</i></p>
				<p><strong>Advertising:</strong> Needs Wifi</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.sand.airdroid' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/AirDroid.jpg">
					<p class="text-center">AirDroid</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>Move Apps to SD Card. Note that this is also an option in the Setttings on your Android. Of course, 
				not all apps can be moved! App2CD is a useful visual aid: you can see at a glance the whole range of apps that are movable. Choosing an 
				App then brings you into the afore-mentined Settings. With the App (and Settings) you can always move the individual apps back into main 
				(SD Card) memory.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.a0soft.gphone.app2sd&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/App2CD.jpg">
					<p class="text-center">App 2 CD</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Very simple approach: you set a numeric password, then use this to block access to any app(s) of your 
				choice ..including Settings, Play Store, Install/Uninstall. The shortcuts to any app(s) will still appear on the Home Screen but only 
				persons with the password will have access.</p>
				<p><i>Very useful way to lock prevent access to Settings (including Camera) and to Play Store. Well worth considering as one of your initial 
				installations (although 'profiles' in Android 4.2 may address some Policy issues)</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.domobile.applock' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/AppLock.jpg">
					<p class="text-center">AppLock</p>
				</div>	
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Author:</strong> ESRI</p>
				<p><strong>Description:</strong> ArcGIS is a great way to discover and use maps. Maps come to life in ArcGIS. Tap on the map or use your 
				current location and discover information about what you see. You can query the map, search and find interesting information, measure 
				distances and areas of interest and share maps with others.</p>
				<p><strong>Advertising:</strong> <i>Need to be online when viewing Maps</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.esri.android.client&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/ArcGisT.jpg">
					<p class="text-center">ArcGis</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> App ArchiDroid: Easy to use archive manager.
				<ol><li>Unpacking of RAR, ZIP, TAR, GZIP (gz), BZIP2 (bz2), tar.bz2, tar.gz and 7ZIP* (7z) archives.</li>
				<li>Unpacking of encrypted ZIP and RAR (password protected) archives.</li>
				<li>Support of multi-volume (split) RAR archives.</li>
				<li>In some browsers and file managers you will be able to move quickly to the process of unpacking.</li>
				<li>Can create simple or encrypted ZIP archives</li></ol></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=org.ais.archidroid' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/Archidroid.png">
					<p class="text-center">ArchiDroid Archive Manager</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Essential! Use this or another AV app.</p>
				<p>Free, top-rated, real-time antivirus and anti-theft protection for Smartphones & Tablets. AVG AntiVirus FREE for Android™ protects you 
				from harmful viruses, malware, spyware and text messages and helps keep your personal data safe.</p>
				<p><i>Option to upgrade to Pro version for €7.50</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=org.antivirus.tablet&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/AVG_bwh67308.jpg">
					<p class="text-center">AVG Anti-Virus</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>Run (some) Android Apps in a Window on your PC. Downside is that ‘Google Play’ is not one of the 
				marketplaces pre-installed ...however, there is an option to Sync with your Tablet (which does have GooglePlay, of course). In practice, 
				I have it more efficient to extract the .apk file (using AirDroid) from the Tablet App and then install this on the PC. Now your Interactive 
				Whiteboard becomes a giant touch (android) Tablet :-)</p>
				<p>To move files between Windows and Bluestacks, navigate to C ...Program Data ...BlueStacks ...UserData...SharedFolder - while in 
				BlueStacks (via a File Explorer app) copy and Paste files into sdcard ...bstfolder ...BstSharedFolder</i></p>
				<p><strong>Link:</strong> On your PC, installl from<a href='http://bluestacks.com/ ' target='_blank'>
				bluestacks.com</a></p>
				<p>Optionally, you can also install on your Android 'Cloud Connect' from the <a href='https://play.google.com/store/apps/details?id=com.bluestacks.appsyncer&hl=en' target='_blank'>
				Google Play Store</a> in order to run (sync) your Android Installed Apps on your PC</p>">
				<img  class="centered" src="images/technical/BlueStacks.jpg">
					<p class="text-center">BlueStacks</p>
				</div>	
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Move your files between Tablets and/or PC</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=it.medieval.blueftp&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/BlueToothFile.jpg">
					<p class="text-center">Bluetooth File Transfer</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>Works well ...as an alternative to the Android 'Browser'</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.android.chrome&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/Chrome.jpg">
					<p class="text-center">Chrome</p>
				</div>	
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> From Google: On each of your computers, set up remote access using the 
				<a href='https://chrome.google.com/remotedesktop'>Chrome Remote Desktop app</a> from Chrome Web Store  ...and then control via this app</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.google.chromeremotedesktop' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/ChromeRemote.jpg">
					<p class="text-center">Chrome Remote Desktop</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Dolphin for Tablets. <i>Another 'Browser' alternative. It has Voice Input to open a particular site 
				directly (if recognised ...'Irish Times') or a Google Search listing (...'Irish Independent')</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=mobi.mgeek.TunnyBrowser' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/DolphinPad.jpg">
					<p class="text-center">Dolphin Pad</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>The opposite of IP Webcam: Teacher uses a 'KenOVision' webcam attached to Desktop...then Students can 
				view through their mobile devices. EduCam Classroom Viewer enables users to view, capture, annotate and share live streaming images directly 
				from a document camera, visualizer or digital microscope. Use with FlexCam® visualizers, kena® and Ken-A-Vision® educational microscopes. 
				With the Student App, you will be prompted to also install Adobe Air (so just follow the suggested link). The 'server' version runining on 
				your PC can be downloaded from <a href='http://ken-a-vision.com/support/software-downloads'>ken-a-vision.com</a> (76 Mb file)</p>
				<p>Note: you could also use TeamViewer (below) or 'android-vnc-viewer' to see the Desktop but without a 'capture' feature</i></p>
				<p><strong>Advertising:</strong> Needs Wifi</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=air.com.kenavision.app001' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/EduCam.JPG">
					<p class="text-center">EduCam Classroom Viewer</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>ES File Manager gives you full (Windows-like) control over the filing system; with additonal features 
				such as Archiving and Extracting</i></p>
				<p><strong>Advertising:</strong> <i></i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.estrongs.android.pop' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/ESfile.JPG">
					<p class="text-center">ES File Manager</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>A Launcher that brings an iOS6 look and feel to your Android Desktop. Note that a 'Mobile Portal' 
				shortcut also gets installed (you can choose to Delete this or, in iOS mode, make it Hidden). Note that. when you return to Launcher mode, 
				you will have to reset your Desktop Wallpaper as Espier creates the iOS 'bubble' one. <strong>Note:</strong> some alterations in the App 
				due to possible copyright infringements!</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=mobi.espier.launcheri' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/EspierIOS.png">
					<p class="text-center">Espier Studio</p>
				</div>	
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>Use your Tablet's Camera to view/share Students' Work on your PC. Bring your Teacher Tablet around 
				the classroom and see the activity on the PC/Projector. Take screenshots. Note: 'Live Video' gets switched left-right but Saved Images 
				are the right way around. Desktop connects/sees in a Browser Window via a given IP Address</i></p>
				<p><strong>Advertising:</strong> <i>Needs Wifi</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.pas.webcam&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/IPwebcam.jpg">
					<p class="text-center">IP Webcam</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Tablet Management: commercial product LanSchool running on your PC but viewing/controlling content on 
				classroom tablets. Free App for the tablets. Read about it at <a href='http://www.lanschool.com/lanschool/features/android-student'>
				lanschool.com</a></p>
				<p><strong>Advertising:</strong> Needs Wifi</p>
				<p><strong>Link:</strong> Free Student App: <a href='https://play.google.com/store/apps/details?id=com.lanschool.student&feature=nav_result#?t=W251bGwsMSwyLDNd' target='_blank'>
				Google Play Store</a></p>
				<p>Free Teacher Version: <a href='http://www.lanschool.com/lanschool_lite/download' target='_blank'>
				lanschool.com</a></p>">
				<img  class="centered" src="images/technical/LanSchool.jpg">
					<p class="text-center">LanSchool</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> Meraki Client app: Systems Manager enables you to configure, monitor, and support the devices in your 
				organization. 100% cloud based, Systems Manager eliminates costly, complex management appliances and software.</p>
				<p><i>Install this app on your Tablets in order to administer them as Client Devices over the internet, from your PC through 
				<a href='http://meraki.cisco.com/'>meraki.cisco.com</a></i></p>
				<p><strong>Advertising:</strong> Defintely needs Wifi!</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.meraki.sm' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/Meraki.png">
					<p class="text-center">Meraki</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>MX Player: for playing a number of formats of downloaded video. Useful, for example, for SolidWorks 
				AVIs …these latter don’t seem to play in the pre-installed 2160P VideoPlayer</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.mxtech.videoplayer.ad&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/MXPlayer.jpg">
					<p class="text-center">MX Player</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>Creates an entry in the Long Press Menu to allow you to open a file directly in a Browser, rather 
				than having to do so via, for example, 'file:///sdcard/ICT4Documents/GeoGebra/axialsymmetry.html' (even though ES File Explorer allows 
				one, via Long Press - Properties, to 'copy fullpath' which does help). This 'open' in browser' function is useful, for example, if you 
				want to open a 'geogebra html export' app</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=ru.gelin.android.browser.open&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/OpenInBrowser.png">
					<p class="text-center">Open in Broswer</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>Adobe Flash Player is no longer available to download from the Play Store. One work-around is to 
				use a 'streaming browser' such as Photon. The link below is to the free, ad-supported version (you can upgrade for, I think, €4). Such 
				Browsers can have a time-lag effect. <strong>However, our advice is to 'side load' the flash.apk file from Adobe</strong> in order to 
				get Flash running natively on Android 4.1. Read more on our <a href='android-weblinks.php'>weblinks info'</a> page</i></p>
				<p><strong>Advertising:</strong> <i>Needs Wifi (of course!)</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.appsverse.photon' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/PhotonBrowserT.jpg">
					<p class="text-center">Photon Flash Browser</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>Print via Wifi, Bletooth, USB or Remotely. Some Printer brands have their own specific apps. Also, 
				Google's CloudPrint is an option. In addition, you might want to try this PrinterShare App (9.95 to upgrade to the Premium version)</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.dynamixsoftware.printershare' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/PrinterShare.png">
					<p class="text-center">PrinterShare</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>Free for non-commercial use. Control your PC from your Tablet as you walk around the room. Works well 
				...although some experimentation needed to get the Pointer in the right place!</i></p>
				<p><strong>Advertising:</strong> Needs Wifi</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.teamviewer.teamviewer.market.mobile&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/TeamView.jpg">
					<p class="text-center">TeamViewer</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover"
				data-content="
				<p><strong>Description:</strong> <i>A handy toggle switch to have on your Home Screen ...so that you can switch Wifi on/off without 
				having to go into Settings</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.hs.wifionoff' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/technical/WifiOnOff.jpg">
					<p class="text-center">Wifi On/Off</p>
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
