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
                    
					<h3 class="page-header">Apps for Post Primary School</h3>
					<hr>
				
				<p class="lead">
				The emphasis in this Resource is on Apps that can be used by the Students. These Apps tend to be of the 'drill and practice' type.
				</p>
				
				<p>
				<strong>Click on any icon below</strong> to see a description of the app, and a link to the (usually) Google Play Store (for which you will 
				have previously registered an email account). Click anywhere on the page to close the description.
				</p>
				
				<div class="col-xs-12 col-md-offset-7 col-md-5">
					<form id="bootstrapSelectForm" method="post" class="form-horizontal ">
						<div class="form-group">
							<label class="col-xs-2 col-md-4 control-label">Jump To:</label>
							<div class="col-xs-10 col-md-7 selectContainer">
								<select id="jumpToSelection" onchange="location = this.options[this.selectedIndex].value" class="form-control">
									<option value="#top"></option>
									<option value="#art">Art</option>
									<option value="#business">Business</option>
									<option value="#cspe">CSPE</option>
									<option value="#english">English</option>
									<option value="#irish">Gaeilge</option>
									<option value="#geography">Geography</option>
									<option value="#history">History</option>
									<option value="#homeEc">Home Ec</option>
									<option value="#languages">Languages</option>
									<option value="#matTech">Materials Technology</option>
									<option value="#maths">Maths</option>
									<option value="#music">Music</option>
									<option value="#pe">PE/Health</option>
									<option value="#religion">Religion</option>
									<option value="#science">Science</option>
									<option value="#all">All Subjects</option>
								</select>
							</div>
						</div>
					</form>
				</div>
				
				<div class="row col-xs-12" id="art">
				<hr>
				<p> <h4>Art:</h4>
				</p></div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Hand-drawn animations right on your tablet! No tools needed- just your fingers and Animation Desk and 
				off you go. The drawing interface provided by Animation Desk for Android resembles the real working environment of a professional 
				animator who completes each frame of an animation on a specially-designed desk, the animation desk.</p>
				<p><i>Pressure sensitive. Choice of 3 to 24 fps. An image (such as from your Camera) as Background. 'Projects' can be re-edited. 
				Files are saved locally as .mp4. Help found <a href='http://www.kdanmobile.com/en/animation-desk/howto/?page_id=112'>here</a> 
				€2.95 for Full Version but Free works well.</i></p>
				<p><strong>Advertising:</strong> <i>Online - Ads.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.kdanmobile.android.animationdesk' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/AnimDesk.JPG">
					<p class="text-center">Animation Desk</p>
				</div>
				
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
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Convert your tablet or phone into digital sketchbook with more than 70 paint brushes, smudge, file and 
				eraser tool. This fast and intuitive painting application will unlock full power of your imagination. With support for pressure sensitive 
				pens (like Samsung's S Pen) you device will be changed into real canvas.</p>
				<p><i>I have tested the pressure-sensitive aspect - it works very nicely!</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.bytestorm.artflow&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/ArtFlow.JPG">
					<p class="text-center">ArtFlow</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Portrait Mode! A simple 'colour and draw' app ...except it also has a Playback feature (from Single 
				to 12 Speed!) ...try it with Long Division! Images are saved into DoodleTalent folder: these static images can be Shared ...or they can 
					be re-opened and re-played at leisure</i></p>
				<p><strong>Advertising:</strong> <i>Ads appear, even when offline</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.doodlejoy.studio.doodleworld' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/PaintJoy.JPG">
					<p class="text-center">Paint Joy</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>High-end drawing app; Can Save and Load</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. No Ads when Offine.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.adsk.sketchbookhdexpress&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/Sketchbook.jpg">
					<p class="text-center">Sketchbook Express</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="business">
				<hr>
				<p> <h4>Business:</h4>
				</p></div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Zingy Minds</p>
				<p><strong>Description:</strong> Accounting Basics informations. Accounting & Financial Formula. Accounting & Financial Terms 
				and Abbreviation.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=me.jakir.accounting' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/BasicAccounting.JPG">
					<p class="text-center">Basic Accounting</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Daily Accounting is a free double-entry accounting application. It was designed to be simple, small, 
				easy to use, and useful. Reports currently supported are income statement, balance sheet, and general ledger. Export reports to PDF 
				(files is stored at external storage: Daily Accounting/Reports directory). It is suitable for small business and people studying 
				accounting.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=me.sory.countriesinfo&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/DailyAccounting.JPG">
					<p class="text-center">Daily Accounting</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="cspe">
				<hr>
				<p> <h4>CSPE:</h4>
				</p></div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Text can be in English or ‘as Gaeilge’. Font size can be set; content can be Black on White, or 
				vice versa. Click on an ‘Article’ and read its details. Unfortunately, text cannot be Copied from the app.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.al.icfinal&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/IrishConst.JPG">
					<p class="text-center">Irish Constitution</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="english">
				<hr>
				<p> <h4>English:</h4>
				</p></div>

				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Reads downloaded texts (e.g. Aladdin from Project Gutenberg). Font can be increased but page cannot 
				be scrolled. Downloaded Texts – option to ‘continue reading’. Texts can be 'imported from SD'</i></p>
				<p><strong>Advertising:</strong> <i>Online: Advertising from booking.com etc. Runs when offline</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.graphilos.epub&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/ePubPrimary.JPG">
					<p class="text-center">ePub Reader</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> FBReader (FBReaderJ) is an e-book reader. Supports epub, rtf, fb2(.zip), mobi, and plain text file formats.
				FBReader is fast, highly customizable. Can use external TrueType/OpenType fonts. Includes hyphenation patterns for 16 languages. 
				Includes a browser/downloader for network e-book catalogs/stores.</p>
				</i>Pre-installed but you can also download from...</i></p>
				<p><strong>Advertising:</strong> <i>No Ads. Works offline.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=org.geometerplus.zlibrary.ui.android&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/FBReaderP.png">
					<p class="text-center">FBReader</p>
				</div>

				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" data-placement="bottom" 
				data-content="
				<p><strong>Author:</strong> International Reading Association</p>
				<p><strong>Description:</strong> Students  begin by brainstorming words for their poem, and then they compose their poem with attention 
				to how many syllables they’ve written for each line. The final step allows students to customize the design of their poem with one of 
				the provided artistic backgrounds or by uploading their own image.</p>
				<p><i>Very nice graphics which are cutomisable; Encourages you to brainstorm words/adjectives/images; doesn't do the Syllable Counting 
				for you (so you could use the <a href='http://writeahaiku.com'>online site</a> ...although be careful with the 'kiru'!). Files saved as 
				.rwt extension. Use in conjunction with the <a href='http://www.readwritethink.org/files/resources/printouts/30697_haiku.pdf'>
				hardcopy (or .iwb) pdf</a>...or with the <a href='http://www.readwritethink.org/files/resources/interactives/theme_poems/'>
				(Flash) interactive</a>. Curriculum advice (Creative Writing in TY) from 
				<a href='http://www.ncca.ie/en/Curriculum_and_Assessment/Post-Primary_Education/Senior_Cycle/Transition_Year/Transition_Units/Creative_writing.pdf'>
				NCCA.</a></i></p>
				<p><strong>Advertising:</strong> <i>No Ads.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=air.org.reading.haiku' target='_blank'>
				Google Play Store</a></p>">
				<img class="centered" src="images/postprimary/Haiku.jpg">
					<p class="text-center">Haiku Poem</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" data-placement="bottom" 
				data-content="
				<p><strong>Description:</strong> ReadWriteThink.org’s Word Mover mobile app can be used to ...promote out-of-school literacy through the 
				use of tablet devices and their associated functionality. Word Mover allows children and teens to create “found poetry” by choosing from 
				word banks and existing famous works; additionally, users can add new words to create a piece of poetry by moving/manipulating the text.</i>
				<p><i>In the Word Bank, one can use two-finger gesturing to resize and rotate the words. App contains Shakepeare's Sonnet 18, Gettysburg Address, I have a Dream, America the Beautiful ...and allows user to create ab initio. A 'word' can be a phrase up to 23 characters in length. Files are saved as Images (so cannot be shared for editing within the App)</i></p>
				<p><strong>Advertising:</strong> <i>No Ads.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=org.reading.wordmover' target='_blank'>
				Google Play Store</a></p>"
				>
				<img class="centered" src="images/postprimary/WordMover.JPG">
					<p class="text-center">Word Mover</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="irish">
				<hr>
				<p> <h4>Gaeilge:</h4>
				</p></div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Coláiste Lurgan</p>
				<p><strong>Description:</strong> OIDE focuses exclusively on spoken Gaeilge as used in everyday interaction and gets learners speaking 
				relevant, practical Irish language dialogue ...It sets out to help learners practice conversational Gaeilge...</p>
				<p><i>Use as a stand-alone app and/or in conjunction with the <a href='http://lurgan.biz/oide-2015/'>website</a></i></p>
				<p><strong>Advertising:</strong> <i>Needs to be online</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=air.AbairleatOideMobile' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/AbairLeat.JPG">
					<p class="text-center">Abair Leat Oide</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Gaeilfón Free Irish Translator is a 2-way English-Irish translator which contains over 13,000 
				off-line words and terms.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.maithu.android.gaelfonfree&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/GaelfonPrimary.JPG">
					<p class="text-center">Gaelfon</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" data-placement="bottom"
				data-content="
				<p><strong>Author:</strong> Maithiu</p>
				<p><strong>Description:</strong> 'Get the Focal' is a 2 way English-Irish translator with 13,000 words and terms. Get the Focal is an 
				English/Irish and Irish/English Translator with over 13,000 translations all checked by Irish language body Foras na Gaeilge.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.maithu.android.getthefocalfree&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img class="centered" src="images/postprimary/GetFocal.JPG">
					<p class="text-center">Get the Focal</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" data-placement="bottom"
				data-content="
				<p><strong>Author:</strong> dkspex</p>
				<p><strong>Description:</strong> Free Version..., containing 6 lessons. ... Upgrade to the full version to remove adverts, receive 
				exclusive updates and enjoy over 20 lessons.</p>
				<p><i>'Use the Slider to move along the list of Topics: Animals, Colours, Days, Months, Numbers, St Patrick. Hear and see the words</i></p>
				<p><strong>Advertising:</strong> <i>Ads appear</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.numbersfree&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img class="centered" src="images/postprimary/LearnIrishLite.JPG">
					<p class="text-center">Learn Irish Lite</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Sraith Pictiúr: Ideal for last minute revision, this Sraith Pictiúr app helps leaving cert students 
				revise and practice all 20 stories quickly and effectively. Packed with sample audio descriptions, key vocabulary, useful phrases 
				for every sraith, this app will help you practice your pronunciation to prepare you for your leaving cert oral Irish exam. Includes 
				translations for all vocabulary and phrases. Designed for students studying for the ordinary level exam.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.apierian.spol2014Free' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/SraithPictiur.JPG">
					<p class="text-center">Sraith Pictiúr</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" data-placement="bottom"
				data-content="
				<p><strong>Author:</strong> Coláiste Lurgan</p>
				<p><strong>Description:</strong> TG Lurgan presents the very best of modern Irish Language music videos. While the songs themselves provide 
				first class entertainment they are also an excellent vehicle for language learning. </p>
				<p><i>Lots of songs with lyrics 'as Gaeilge'</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=ie.lurgan.android&hl=en' target='_blank'>
				Google Play Store</a></p>"
				>
				<img class="centered" src="images/postprimary/TGLurgan.JPG">
					<p class="text-center">TG Lurgan</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="geography">
				<hr>
				<p> <h4>Geography:</h4>
				</p></div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Offline Directory of all the countries of the world. It contains basic and detailed information 
				about all countries of the world. It also contains information about the oceans, seas, all monetary units, types of government, regions, 
				international organizations, languages, and about many other things. Does not require Internet connection.</p>
				<p><i>During its first Run, it Imports data ...thereafter runs offline</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=me.sory.countriesinfo&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/CountriesInfo.JPG">
					<p class="text-center">Countries Info</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Orimar</p>
				<p><strong>Description:</strong> Political map. Educational game to learn easily the countries and capitals of the world (Europe, Africa, 
				America, Oceania and Asia). You can move the map with your finger and zoom.</p>
				<p><i>Runs in Portrait orientation. Two Modes: Study and Test. Simple 'point and click' interface</i></p>
				<p><strong>Advertising:</strong> <i>Ads appear.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=orimar.politicalMap' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/PoliticalMap.JPG">
					<p class="text-center">Political Map</p>
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
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Used in conjunction with Maps (previous), this app allows you to measure Distance and Area</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=de.j4velin.mapsmeasure' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/MapsMeasure.JPG">
					<p class="text-center">Maps Measure</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="history">
				<hr>
				<p> <h4>History:</h4>
				</p></div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>eBook: Modern Europe, starting at the Hundred Years War and ending at the present time. It 
				requires also the <a href='https://play.google.com/store/apps/details?id=code.alphonso.android.bookviewer&hl=en'>'Alphonso EBook Viewer'</a>
				– the free version of this latter is Ad supported (a bit instrusive!) …I had to move my Play Store filtering up to ‘medium’ to get this. 
				Start the Reader app, and then click on the Book Title. Once inside the eBook, you can Pinch to Zoom, set Bookmarks. A useful check on 
				content may be to visit <a href='http://en.wikipedia.org/wiki/History_timeline'>History Timeline</a> on wikipedia in order to 'triangulate 
				the data' ...or use the Wikipedia app below …or ask your Teacher!</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=code.alphonso.android.bookviewer.books.europeanhistory' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/EuroHistory.JPG">
					<p class="text-center">European History</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> RIA, Fintan O'Toole</p>
				<p><strong>Description:</strong> <i>A fascinating trip through Ireland's history as told through its historial treasure troves.
				App was free when I first accessed it but now costs €2.33</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=air.ie.ria.A100objects1' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/Ireland100.JPG">
					<p class="text-center">Ireland in 100 Objects</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Test you your knowledge of 20th century figures with a fun trivia quiz game. Includes leaders, scientists, 
				soldiers, artists, actors, entertainers, athletes, criminals, and more.</p>
				<p><i>Comes with 20-30 images and more are downloaded during Wifi-connected use. Stick with 'Gallery' and Quiz' options and avoid the 
				other download links!</i></p>
				<p><strong>Link:</strong> 1st: <a href='https://play.google.com/store/apps/details?id=com.edupad.app.grade1.math' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/Name20Figure.jpg">
					<p class="text-center">Name that 20th Century Figure</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Test and improve your knowledge of notable historical figures with a fun trivia quiz game. Includes monarchs, 
				presidents, prime ministers, revolutionaries, artists, scientists, dictators, war criminals, generals, admirals, and more Play for leisure or 
				compete for high scores with an online leader board. Features over 600 images.</p>
				<p><i>Information provided via links to Wikipedia</i></p>
				<p><strong>Advertising:</strong> <i>Ads appear</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=ta.namethathistoricalfigure' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/NameHistFigure.jpg">
					<p class="text-center">Name that Historical Figure</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Events that happened ‘on this day’ are listed and have ‘external links’ (to Wikipedia, which are 
				based on the text in the ‘event’). There is a Search facility; typing ‘Ireland’ brings up a range of events, from 2008 back to, after 
				about 7 clicks on ‘load more’, St Patrick in 456. There are major gaps: there is, for example, no reference to the Famine of 1845</i></p>
				<p><strong>Advertising:</strong> <i>Ads. if online. Runs when Offline. No Ads when Offine.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.downshift.android.tih&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/TodayHistory.JPG">
					<p class="text-center">Today in History</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Test your knowledge of World War II with a fun trivia quiz game. Includes key figures, aircraft, 
				ships, tanks, weapons, places, awards, transports, and other cool stuff. Compete with your friends and the world via a global score board.</p>
				<p><i>Comes with 20-30 images and more are downloaded during Wifi-connected use. Stick with 'Gallery' and Quiz' options and avoid the other 
				download links!</i></p>
				<p><strong>Advertising:</strong> <i>Ads appear</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.wwiiquiz' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/WW2.JPG">
					<p class="text-center">WWII Quiz</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>

				<div class="row col-xs-12" id="homeEc">
				<hr>
				<p> <h4>Home Ec:</h4>
				</p></div>

				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>In ‘Plan Mode’, create a 2D floorplan of a building; put in doors, furniture etc. Transform it into 3D. 
				In order to save your work (as a File or as a Screenshot), you have to upgrade to the Pro version for €4.26 …you could use another 
				Tablet to take a snap!</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.leonid.myroom' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/BuildApp.JPG">
					<p class="text-center">BuildApp</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>29,194 recipes with Shopping List. Very good Search facility: 'low fat, low cal and low carb' 
				generated just two suggestions. A ‘Shopping List’ can be created: handy to have this app on your android phone for the shopping. 
				Remember to deselect your previous choices: otherwise you will be searching within a search. I had to change my Play Store ‘ratings 
				filter’ to a ‘higher maturity’ setting to download this. Portrait mode.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.epicurious&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/Epi.JPG">
					<p class="text-center">Epicurious Recipe App</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Food Network</p>
				<p><strong>Description:</strong> Get instant access to your favorite Food Network chefs and thousands of their most popular recipes 
				with In the Kitchen, the award-winning, top-rated recipe app, now available for FREE! Cook with Alton Brown, Giada De Laurentiis, 
				Rachael Ray, Bobby Flay, Guy Fieri and more. Save your favorite Food Network recipes, access your own personal recipes saved on 
				FoodNetwork.com, add ingredients to your SHOPPING LIST and more with the new and improved RECIPE BOX.</p>
				<p><i>Leans towards US/Mexican recipes but others (e.g. French) available via the online search. Chef Giada De Laurentiis has her 
				'Everyday Italian' Show.  Shareable, can add Notes. U.S. measurements given (but Conversion tool included). Landscape (Tablet) Mode</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.scripps.android.foodnetwork' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/CountriesInfo.JPG">
					<p class="text-center">Food Network in the Kitchen</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="languages">
				<hr>
				<p> <h4>Languages:</h4>
				</p></div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Crosswords. Lines (3 ... 25) columns (3 ... 25) and difficulty levels (3) - Game infinite combinations.
				<ul><li>A huge list of words. - Automatic saving of started crossword - The size of the panel will fit your device.</li>
				<li>Viewing solution if correct or wrong. Author also does WordSearches in these languages.</li></ul></p>
				<p><strong>Link:</strong> French: <a href='https://play.google.com/store/apps/details?id=com.berniiiiiiii.motscroises' target='_blank'>
				Google Play Store</a></p>
				<p>Spanish: <a href='https://play.google.com/store/apps/details?id=com.berniiiiiiii.palabrascruzadas' target='_blank'>
				Google Play Store</a></p>
				<p>German: <a href='https://play.google.com/store/apps/details?id=com.berniiiiiiii.kreuzwortratsel' target='_blank'>
				Google Play Store</a></p>
				<p>Italian: <a href='https://play.google.com/store/apps/details?id=com.berniiiiiiii.cruciverba' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/CrossItalian.JPG">
					<p class="text-center">Crosswords</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> babbel.com</p>
				<p><strong>Description:</strong> Play, understand, speak and write! Get the free Basic and Advanced Vocabulary at home and on-the-go: 
				study vocabulary with interactive exercises, systematically deepen your knowledge and practice your pronunciation. Actively speak 
				French with babbel.com, one of the biggest language learning platforms worldwide.</p>
				<p><i>You can skip the Log In part. A Number of Levels are provided without Logging in. See and Listen; Listen and Select; Test 
				(spell, gap fill etc.)</i></p>
				<p><strong>Link:</strong> French: <a href='https://play.google.com/store/apps/details?id=com.babbel.mobile.android.fr' target='_blank'>
				Google Play Store</a></p>
				<p>Spanish: <a href='https://play.google.com/store/apps/details?id=com.babbel.mobile.android.es' target='_blank'>
				Google Play Store</a></p>
				<p>German: <a href='https://play.google.com/store/apps/details?id=com.babbel.mobile.android.de' target='_blank'>
				Google Play Store</a></p>
				<p>Italian: <a href='https://play.google.com/store/apps/details?id=com.babbel.mobile.android.it' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/BabbelFrench.JPG">
					<p class="text-center">Learn French, German....</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Lingua.ly turns any mobile device into a language learning experience.
				<ul><li>Type or paste words to enrich your vocabulary with our smart dictionary</li>
				<li>Practice what you learned with personalized flashcards and fun games</li>
				<li>See your new words in real articles from around the web that are just right for you</li></ul></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.lingualy.lingualymobile' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/LinguaLy.JPG">
					<p class="text-center">Lingua.ly</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="matTech">
				<hr>
				<p> <h4>Materials Technology:</h4>
				</p></div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>This is the official AutoCAD mobile app. 21 MB. Need to register for an account. Opens .dwg files.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.autodesk.autocadws' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/AutoCAD.JPG">
					<p class="text-center">AutoCAD 360</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> The SolidWorks Tips Daily App will give you access to our Free Video Tutorials, Tips, Website, 
				Social Media and more. If you are a user of SolidWorks every bit of help is a benifit. Checking this app on a regular basis will
				help you learn new tools you didn't know before and keep you updated with changes in SolidWorks.</p>
				<p>Additonal Note: <a href='https://play.google.com/store/apps/details?id=com.solidworks.eDrawingsAndroid'>eDrawings App</a> - to 
				open 3D (EASM, EPRT, SLDASM, SLDPRT), 2D (EDRW, SLDDRW) and associated files from any source - is available but costs €1.47</p>
				<p><i>Some <a href='http://www.t4.ie/dcg_com_design_cad.html'>'T4' files are available</a> ...choose the CAD tab, then e.g. '6 Pencil 
				Case' ...Long Press and Open ...with ES Downloader (I use ES File Manager on my tablets) ...Long Press ...More ...Extract ...with 
				ES again.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.conduit.app_b81b2aee33bd4b2191c160263f2776d7.app' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/SolidWorksTips.JPG">
					<p class="text-center">Solidworks Tips Daily</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> TFTPad is a free 3D viewer that visualizes 3D models from TFTLabs JSON3D Gallery. Select a model 
				in the public JSON3D Gallery (or among the 3 sample models installed with the application) and load it. Pinch to zoom, single finger
				drag to rotate, two finger drag to pan and double tap on the screen to fit all the model. To visualize your own 3D models on your 
				device with TFTPad, create your free account at <a href='http://json3d.tftlabs.com'>TFT Lab</a></p>
				<p><i>Also designed as a SolidWorks (.SLDDRW) viewer app but I have not yet succeeded in so doing; it is fine with .JSON files.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=tftlabs.web.mobile&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/TFTPad.JPG">
					<p class="text-center">TFT Pad</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="maths">
				<hr>
				<p> <h4>Maths:</h4>
				</p></div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Chris and Chloe Burke</p>
				<p><strong>Description:</strong> Mobile app for viewing Junior and Leaving Certificate maths theorems.</p>
				<p><i>Provides the information ...in a non-interactive way, but useful to have at hand</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.apptheorems' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/AppTheorems.png">
					<p class="text-center">App Theorems</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Pre-installed. Does the ‘big 4’ operations as well as Trig., Exponents etc. (but not too many!). 
				Follows the ‘Bodmas’ Rule, thankfully!</i></p>
				<p><strong>Advertising:</strong> <i>Runs when offline. Preinstalled</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=uk.co.bigfishstudios.eduDroid' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/CalculatorPrimary.jpg">
					<p class="text-center">Calculator</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Appestry</p>
				<p><strong>Description:</strong> CalPad helps you do calculations and take notes along side. You can save them to a text file on the 
				device or share them via email, SMS or online.
				<ul>
				<li>Enter numbers and operators just like you'd do in a calculator and press the = sign to get results.</li>
				<li>Use the result to do more calculations and chain more equations.</li>
				<li>Use math functions as part of your equations and even nest them within other functions.</li>
				<li>Override the operator precedence using brackets</li>
				<li>Some examples:<ul>
					<li>5.79 + 3.87 = 9.66 / 3.42 = 2.82456</li>
					<li>(146 - 34) * 84 = 9408</li>
					<li>146 - 34 * 84 = -2710 * cos(1.025) = -1406.75798</li>
					<li>abs(tan(6)) = 0.29101</li>
					<li>15.35 * 4 = 61.40 inches of plywood, need to confirm</li>
					<li>$5.75 * 7 = 40.25 total expense</li>
					<li>850000 - ¥784253 = 65747</li>
					<li>73 / 0 = ∞</li></ul></li>
				<i>Results appear in the Calculator; the work can later be opened in a Word Document as a text file from the CalPad_Notes folder</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.appestry.calpad' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/CalPad.png">
					<p class="text-center">CalPad</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Ming Shen</p>
				<p><strong>Description:</strong> Flatland: A Romance of Many Dimensions is an 1884 satirical novella by the English schoolmaster Edwin
				A Abbott.</p>
				<p><i>Having read this book many years ago, I was delighted to see it listed on the Play Store</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.aoandroid.jiuboo.edwinabbott' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/Flatland.JPG">
					<p class="text-center">Edwin Abbott's Flatland</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> GeoGebra: <i>it's here at last: the wonderful (and free) dynamic software, previously available on 
				desktops. The app does not yet have the full funtionality of its desktop cousin but it's a great start.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=org.geogebra' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/GeoGebra.JPG">
					<p class="text-center">GeoGebra</p>
				</div>

				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Duck</p>
				<p><strong>Description:</strong> A digital version of the Formulae and Tables booklet used in Irish State Examinations. Has all the 
				information supplied in the exams for subjects like Maths, Physics, Chemistry and Economics. Made as part of a project for the BT Young 
				Scientist and Technology Exhibition. Easier to use and more accessible than the booklet itself. Note: This application cannot be used 
				during State Examinations, only the Formulae and Tables booklet supplied by the examiner can be used.</p>
				<p><i>Appears to be Scans of the Booklet</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.duck.log&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/LogTables.JPG">
					<p class="text-center">Log Tables</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Explanatory Calculator
				<ul><li>Includes basic calculator</li>
				<li>Performs trigonometric functions</li>
				<li>Solves quadratic equations (roots, maxima, minima, etc)(with solution)</li>
				<li>Solves a pair of linear equations (with solution) ...uses Substitution rather than 'Cancellation' method</li>
				<li>Can evaluate the equation of a line (with solution)</li>
				<li>Can evaluate point, and angle, of intersection of two lines (with solution)</li>
				<li>Can solve problems involving parallel lines (with solution)</li>
				<li>Can solve problems involving points (with solution)</li>
				<li>Performs linear regression (although graph cannot Pinch to Zoom)</li>
				<li>Displays indicative graph of the best square fit line</li>
				<li>Data remains stored</li>
				<li>Space provided to store any notes</p></li></ul>
				<p><strong>Advertising:</strong> <i>Ads appear when online. App does not need online access.</i></p>
				<p><strong>Link:</strong> No longer available in the Google Play Store</p>">
				<img  class="centered" src="images/postprimary/MathMate.JPG">
					<p class="text-center">Math Mate</p>
				</div>

				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Mathlab.us</p>
				<p><strong>Description:</strong> <i>Use ‘keyboard’ at bottom right to modify Function. Nice Pinch-to-Zoom effect. Can switch views 
				between Graph, Table (of values on a curve). X-Axis is marked in Units (so 1.571 represents Pie/2). You can Save a Library of 
				Calculations/Functions in the Pro version:  $5 for unlimited offline mode and no ads</i></p>
				<p><strong>Advertising:</strong> Free Version needs to be online</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=us.mathlab.android' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/MathLab.JPG">
					<p class="text-center">Mathlab Graphing Calculator</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Paul Cullen</p>
				<p><strong>Description:</strong> Exclusively designed to assist students studying for the Junior Certificate Honours Mathamatics syllabus.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.list.ListView' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/MathsRecall.png">
					<p class="text-center">Maths Recall</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> With MyScript© Calculator, perform mathematical operations naturally using your handwriting.
				Specially designed for Android devices. Easy, simple and intuitive, just write the mathematical expression on the screen then let 
				MyScript technology perform its magic converting symbols and numbers to digital text and delivering the result in real time.</p>
				<p><i>Very effective use of the technology!</i></p>
				<p><strong>Advertising:</strong> <i>No Ads. Works offline ...although useful for Sharing</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.visionobjects.calculator&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/MyScriptCalc.JPG">
					<p class="text-center">MyScript Calculator</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Moletag</p>
				<p><strong>Description:</strong> Features:
				<ul><li>Random integer numbers (can contain duplicates or not); Random real numbers (decimal places of your choice)</li>
				<li>American) Coin Flipper</li>
				<li>Dice Roller </li>
				<li>Random Strings (characters and length of your choice / can be used as password generator - nice example!)</li>
				<li>Random Cards (useful to do a 'Tally Count' of the result)</li>
				<li>Copy results to clipboard</li></ul>
				App can be installed to SD or to memory</p>
				<p><strong>Advertising:</strong> <i>Annoying Ads when online. App does not to be online</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.moletag.random.allinone' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/RandomGenerator.JPG">
					<p class="text-center">Random All-in-One Generator</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="music">
				<hr>
				<p> <h4>Music:</h4>
				</p></div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> MobileSheets ...allows you to carry your entire sheet music (or guitar tablature) library with you 
				wherever you go. It also enhances the experience by providing features that all musicians can appreciate - annotations, a built-in 
				metronome, music playback from your library, wireless bluetooth pedal support, the ability to jump between pages with a single click, 
				and bookmarking.</p>
				<p><i>NOTE: This application is designed and optimized for 7-inch and larger tablets. Full version costs €6.99 and there is 
				a <a href='http://www.zubersoft.com/mobilesheets/about.html'>pc companion app</a></i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.zubersoft.mobilesheetsfree' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/Maestro.png">
					<p class="text-center">Maestro</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> An easy to use music sequencer ... Tap on the screen to add notes and make your own tunes. Draw pictures 
				and see how they sound! Fun for kids or anybody who likes to play and create songs. Like a small tenori-on or ToneMatrix, it's an 
				eight step sequencer with four different instruments and a two octave range.</p>
				<p>Just start tapping the screen to see it work. Drag to lay down many notes at once. The colored marks on the side change the 
				instrument you put down. The clear mark on the right erases notes. Tunes that you invent can be saved as .wav files</p>
				<p><i>Works in Portrait Mode. I could only manage to choose Three of the Four Instruments. Pity there isn't a Pause/Resume button. 
				Files are exported to the 'Music' folder</i></p>
				<p><strong>Advertising:</strong> No Ads</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=org.igoweb.bleep' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/Miniseq.png">
					<p class="text-center">MiniSeq</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <ul><li>Musical notation editor (supports chords)</li>
				<li>Calculates the size of each measure and fills automatically</li>
				<li>Change tempo, clef, key signature, time signature, keys and instruments</li>
				<li>Playable with 128 different instruments (Piano, Organ, Guitar, Electric Guitar, Bass, Violin, Cello, Trumpet, Drum and more)</li>
				<li>Export to printable image file</li>
				<li>Export to playable audio file</li></ul>
				<i>Saves .ay file in MusicComposition/Workspace folder; Exports .midi to MusicComposition folder; .midi can then be Shared via Dropbox or Bluetooth</i></p>
				<p><strong>Advertising:</strong> Ads</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.ayelectronics.MusicComposition' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/MusicComp.png">
					<p class="text-center">Music Composition</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Zingy Minds</p>
				<p><strong>Description:</strong> PocketBand Lite: Build high quality tracks as a sequence of loops, mixing synths, drums, audio recordings, 
				analog modulators and arpeggiators. Apply Fx to channels and export to mp3 or ringtones. Also publish, play and collaborate in our community.</p>
				<p>Cloud-based technology: performs the audio rendering process in a remote service. Pro Version costs €7.64</p>
				<p><i>Downside: When you add new sounds, you must do an 'online save' before you can hear the addition :-( Local savings of .mp3 seem to be 
				in the PocketBand/Saved folder</i></p>
				<p><strong>Advertising:</strong> No Ads</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=net.uloops.android' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/PocketBand.png">
					<p class="text-center">PocketBand</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="pe">
				<hr>
				<p> <h4>PE/Health:</h4>
				</p></div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Place the tip of your index finger on phone’s camera and in a couple of seconds your Heart Rate 
				will be shown... This is the same technique that medical pulse oximeters use.</p>
				<p><i>You have to wait a while for the countdown to finish but seems accurate</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=si.modula.android.instantheartrate' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/InstHeart.JPG">
					<p class="text-center">Instant Heart Rate Monitor</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Simple. Free. It can save a life. The official Irish Red Cross First Aid app gives you instant access 
				to the information you need to know to handle the most common first aid emergencies. With videos, interactive quizzes and simple 
				step-by-step advice ... Interactive quizzes.</p>
				<p><i>Nice One! Useful to have on all Student and Teacher tablets/phones</i></p>
				<p><strong>Advertising:</strong> <i>Does not need wifi. No Ads.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.cube.gdpc.ire' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/IrishRedCross.JPG">
					<p class="text-center">Irish Red Cross</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Basic Pemometer. Seems to use Accelerometer (i.e you can 'shake' rather than 'walk'!). Need to 
				log in (use 'Manual option'). When online, you can see scores for other 'Noom Walkers' arond the world. Portrait Mode.</i></p>
				<p><strong>Advertising:</strong> <i>Doesn't need wifi. No Ads.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.noom.walk' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/NoomWalk.JPG">
					<p class="text-center">Noom Walk</p>
				</div>

				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> The Physical Education VSB Course will explain the importance of staying in shape and having a fit 
				and healthy body. It will discuss fun athletic sports, such as, basketball, volleyball, tennis, and track and field, to name a few. 
				It will also give some historical background on where these sports originated. NB: 125 MB download. 'VSB' represents Virtual Smart Books.</p>
				<p><i>Need to Register in order to use. Watch the video, read the script, answer the Quiz ...in order to advance to the next lesson/sport. 
				'Run on Track' is a virtual race that uses tablet well - Swipe and Tilt. Your progress through the lessons is recorded online. Also 
				available to download for Desktop from <a href='http://ericshs.com/'>ericshs.com</a></i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.gen4web.vsb.physicaleducations' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/VSBpe.JPG">
					<p class="text-center">VSB Physical Education</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="religion">
				<hr>
				<p> <h4>Religion:</h4>
				</p></div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Listen to Gregorian Chant. Read the text of ‘Daily Prayer’. See what Events are upcoming</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=org.glenstal.app&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/Glenstal.JPG">
					<p class="text-center">Glenstal Abbey</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>I don't have the 'cultural knowledge' to be able to recommend an RE App. I can only point you 
				in the direction of a range of Apps and let you make your choice. Head over to ....(you might get back to with suggestions for Irsih Schools)</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/search?q=religion+free&c=apps' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/ReligionWikipediaImage.JPG">
					<p class="text-center">Religion</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="science">
				<hr>
				<p> <h4>Science:</h4>
				</p></div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Dolan DNA</p>
				<p><strong>Description:</strong> (Biology) Use your touch screen to rotate and zoom around the interactive brain structures. Discover how 
				each brain region functions, what happens when it is injured, and how it is involved in mental illness. Each detailed structure 
				comes with information on functions, disorders, brain damage, case studies, and links to modern research.</p>
				<p><i>Note: view is Portrait Mode only</i></p>
				<p><strong>Advertising:</strong> <i>No Ads. when offline. Runs offline</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=org.dnalc.threedbrain&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/3Dbrain.JPG">
					<p class="text-center">3D Brain</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> (Biology) Alimentary Assault 3D puts you in the driving seat of a miniature jet as it travels through the 
				human digestive system. ...You must pilot the ship through fast paced environments full of food particles, polyps and other matter 
				that you'd come across in the gut....</p>
				<p>This app was created with the Alimentary Pharmabiotic Centre (APC). The APC is a research centre located in Cork, Ireland, that 
				aims to link Irish science with industry and society through excellence in research, education and outreach in gastrointestinal health.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.jamesfinnmedia.alimentaryassault3d&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/Alimentary.JPG">
					<p class="text-center">Alimentary Assault</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Andrew Whitaker</p>
				<p><strong>Description:</strong> (Biology) Podcast with Diagrams. In this application you will find the lecture on the Heart and Pericardium 
				from <a href='http://www.instantanatomy.net/>instantanatomy.net</a></p>
				<p>The lecture will play and the relevant diagrams will appear in time with the audio. You can zoom in on the images with the pinch 
				gesture as the audio plays.</p>
				<p><i>A bit advanced for Leaving Cert. but still useful.</i></p>
				<p><strong>Advertising:</strong> <i>No Ads. when offline. Runs offline</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=net.instantanatomy.heart&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/Anatomy.JPG">
					<p class="text-center">Anatomy Heart Lecture</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> CCB Goettingen</p>
				<p><strong>Description:</strong> (Chemistry) The Atomdroid app is a computational chemistry tool for the Android platform. It can be used as a 
				3D molecular viewer/builder and contains local optimization and Monte Carlo simulation features.</p>
				<p><i>Downside: when you go to ‘Add an Atom’ the view of the Periodic Table is very small (nor does this latter Pinch to Zoom)
				Note that if you Download (such as Ethanol, Benzene etc.), the files will go into /mnt/sdcard/org.atomdroid/Library/Public</i></p>
				<p><strong>Advertising:</strong> <i>Runs Offline (but useful to have access to online Databses)</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=org.atomdroid' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/AtomDroid.JPG">
					<p class="text-center">Atomdroid</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> HandsApps</p>
				<p><strong>Description:</strong> (Chemistry) You can equate all chemical reactions: - You don’t need Internet connection; - Application contains 
				theory that helps you explain your answer to teacher; - If you have made a mistake writing an equation, application shows your error. 
				I tried HBrO3+O2 (as a reagent) and Br2+H2O (as product). Firstly 'numbers get subscripted' (good) with, secondly, the answer 
				corrected as 4HBrO3=5O2+2Br2+2H2O. A useful option also is the online <a href='http://www.gregthatcher.com/Chemistry/BalanceChemicalEquations.aspx'>
				Balance Chemical Equations</a></p>
				<p><strong>Advertising:</strong> <i>No Ads.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=ru.handapps.chemistrysolverreactions' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/ChemistrySolver.JPG">
					<p class="text-center">Chemistry Solver</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Antonio Carlon</p>
				<p><strong>Description:</strong> (Physics) Doodle Physics (Lite Version).</p>
				<i>Very different – watch and enjoy the Video before you install! Takes a bit of practice to get the Pivot Points working …make these 
				(with a Long Tap) before you draw the Shape around them</i></p>
				<p><strong>Advertising:</strong> No Ads. when offline. Runs Offline</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=doodle.physics.lite' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/PhysDoodle.JPG">
					<p class="text-center">Doodle Physics</p>
				</div>
	
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> PhysicsOne</p>
				<p><strong>Description:</strong> (Physics) This app contains a concept summary of Electricity, 20 quiz questions, and 'Get Help' buttons 
				on each question to help you if you need it. Covers 20 of the most essential questions on the physics of electricity, electric forces, 
				electric fields, voltage, resistance, current, charge and circuits. ‘Get Help’ button brings you out to a Google Search.</p>
				<p><i>There is a suite of Physics Apps – at a small price – available from this Author</i></p>
				<p><strong>Advertising:</strong> No Ads. when offline. Runs Offline (but the ‘Get Help’ option won’t then work)</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/developer?id=PhysicsOne&hl=en' target='_blank'>
				Google Play Store</a> …'Electricity' is one of the Apps</p>">
				<img  class="centered" src="images/postprimary/Electricity.JPG">
					<p class="text-center">Electricity</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> (Phyics) <i>You may have tried 'Crododile Clips' on your Pc or Circuits with 
				<a href='http://skoool.ie/teachers.asp?id=3194'>skoool.ie</a> (the latter beign Flash-based will still work on your Android). Now on 
				Tablet have a look at this Drag and Drop simulation. If you want more features, 
				you can upgrade to the full version for €7.00. I also liked the look of 
				<a href='https://play.google.com/store/apps/details?id=air.com.ljcreate.virtualElectricalCircuitsTrainer&hl=en'>'Circuit Builder'</a> 
				but this latter does not have a Free version to try</i></p>
				<p><strong>Advertising:</strong> <i>No Ads. Runs when Offline (although extra Examples are available from the Online Community)</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.everycircuit.free&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/EveryCircuit.JPG">
					<p class="text-center">EveryCircuit Free</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> (Physics) Featured in Times of India, NextBigWhat, Technodify and YourStory. 
				<ol><li>Equations Calculator for over 170 equations covering over 20+ topics.</li>
				<li>160+ Definitions covering all the topics.</li>
				<li>Descriptions for all the Units and Lessons.</li>
				<li>Wiki pages for all the Units and Lessons inside the app.</li>
				<li>Equations List for all the formulae.</li>
				<li>Graphs for all the formulae</li>
				<li>Clipboard support for all the Equations and Results</p></li></ol>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.asb.full.highschoolphysics' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/HighSchoolPhysics.JPG">
					<p class="text-center">High School Physics</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> (Biology) 3D view inside a cell. iCell gives students, teachers, and anyone interested in biology a 3D view 
				inside a cell. Included are examples of three types of cells: animal, plant, and bacteria. You can use your finger to tap on parts
				of the cell to select and zoom in on that particular organelle. Each organelle comes with a name and a short description of its 
				function in the cell.</p>
				<p>For a better view of each cell, hold down one finger on the screen, and drag to rotate around the cell or selected organelle. 
				<i>Pinch To Zoom.</i></p>
				<p><strong>Advertising:</strong> <i>No Ads. when offline. Runs offline</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=org.hudsonalpha.icell&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/iCell.JPG">
					<p class="text-center">iCell</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> K12 inc</p>
				<p><strong>Description:</strong> (Chemistry) K12 Periodic Table lets you explore the elements and their key attributes in a simple, easy-to-use way. 
				It's a perfect reference for working through homework problems for Science courses.</p>
				<p>Version 2 has these new, advanced features:
				<ul><li>Improved swipe and touch functions display element details such as name, symbol, atomic number, atomic mass, Lewis dots, and radius.</li>
				<li>Colors change in the table to show classification, melting point, boiling point, outermost orbital, radius, ion radius, electronegativity, 
				and ionization energy.</li>
				<li>Temperatures are shown in Kelvin, Celsius, and Fahrenheit scales.</li>
				<li>The table includes the newly named elements Darmstadtium (110), Roentgenium (111), Copernicium (112), and Ununhexium (116).</li></ul></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=air.com.k12.periodictablev2&feature=also_installed' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/PeriodicK12.JPG">
					<p class="text-center">K12 Periodic Table</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> (Physics) The standard model of particle physics reference app. The most complete Standard Model reference 
				on the market!</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=standardmodel.namespace' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/ParticlePhysics.jpg">
					<p class="text-center">Particle Physics</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Brett Plummer</p>
				<p><strong>Description:</strong> (Physics) Multiple-choice Physics questions. Choose from 20 to Unlimited set</p>
				<p><i>Does seek to access ’phone state and identity’ but should be fine on a Tablet. ‘Profile’ part can be skipped</i></p>
				<p><strong>Advertising:</strong> No Ads. when offline. Runs Offline</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.alaskajim.physics&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/PhysQuiz.JPG">
					<p class="text-center">Physics Quiz</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Egansoft</p>
				<p><strong>Description:</strong> (Physics) Physics Sketchpad is a physics simulator in which one can observe the effect of different forces upon 
				objects. It can be used as a planet simulator or projectile simulator if one adjusts the forces accordingly. Forces include:
				<ul><li>Gravity Between Objects: normal, inverted, or none with adjustable strength</li>
				<li>Global Gravity: none, downward or upward with adjustable strength</li>
				<li>Collision Type: merge, bounce, destroy, or none</li>
				<li>Drag/Acceleration: none, drag, or acceleration with adjustable strength</p></li></ul></p>
				<p><strong>Advertising:</strong> No Ads. when offline. Runs Offline</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.egansoft.physics.sketchpad&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/PhysSketch.JPG">
					<p class="text-center">Physics Sketchpad Beta</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> (Physics) Pocket Physics is an easy-to-use, free app that covers most of physical formulas with descriptions 
				and images.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=Gecko.Droid.PhysicsHelper&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/PocketPhys.png">
					<p class="text-center">Pocket Physics</p>
				</div>
	
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> (Phsyics) Sensor Kinetics demonstrates the physics of gravity, acceleration, rotation, magnetism and more as 
				these forces are measured by your phone or tablet. The app includes comprehensive help files with easy to understand information 
				and experiments you can perform with the sensors.</p>
				<p><i>Only one (Accelerometer) works on Yarvik …whereas all of the others are rated as ‘not available’ on Neuropad. …and most are 
				available on Samsung. Physics Teachers may wish to choose platform carefully. Remember to Suspend Activity to save on battery consumption.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.innoventions.sensorkinetics&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/Sensor.JPG">
					<p class="text-center">Sensor Kinetics</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="all">
				<hr>
				<p> <h4>All Subjects:</h4>
				</p></div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> English/All Subjects</p>
				<p><strong>Description:</strong> <i>The standard for working with PDFs. Can Annotate and Save Annotations. Can Pinch to Zoom. 
				Can insert (and Save) a Text Note. Can use a Highlighter, ‘strike through’, underline, add signature, scroll (horizontally or 
				vertically depending on reading mode), search for text, share (via Bluetooth, Dropbox etc.)</i></p>
				<p><strong>Advertising:</strong> <i>No Ads. Runs when offline</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.adobe.reader&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/AdobeReader.JPG">
					<p class="text-center">Adobe Reader</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> English/All Subjects</p>
				<p><strong>Description:</strong> Top-rated #1 Android dictionary app, with trusted reference content from Dictionary.com & Thesaurus.com!
				Time Magazine ‘Top 10 Back-To-School App’, ‘Top 10 App’ High School Survival Guide, Winner: CNET Top 100 Mobile App Award</p>
				<p><i>Switch between Dictionary and Thesaurus mode (icon top right). Uses American and British spelling ('color' as well as'colour'). 
				Displays Synonyms and Antonyms; says Word.</i></p>
				<p><strong>Advertising:</strong> <i>Ads. in Free Version displayed if online</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.dictionary' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/Dictionary.png">
					<p class="text-center">Dictionary.com</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> All Subjects - Post-Primary</p>
				<p><strong>Description:</strong> The Edco e-books app is an innovative and interactive e-book application, which enables students using 
				Edco e-books to access all their Post-Primary e-book content on their Android tablet.</p>
				<p><i>Login needed for full access but 19 Sample Title/Chapters are provided (all Second Level). Icons are provided in theText but 
				these seem to point to 'real world' resources rather than embedded multimedia clips. A Search Feature brings you to the relevant 
				page(s). Pages must be Panned to (or using Thumbnails) but there is no option to Type a Page Number.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.edcolearning' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/EdcoEbook.JPG">
					<p class="text-center">Edco Digital</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> All Subjects - Post-Primary</p>
				<p><strong>Description:</strong> educate.ie is Ireland's new educational publishing imprint based in Castleisland, Co. Kerry. 
				Our eTextbooks are available for the iOS, Android and Windows platforms and they work across these platforms giving you complete 
				flexibility and freedom to roam! This means that all user-generated content is saved to the cloud, ensuring that notes, bookmarks, 
				highlights, etc. can be accessed from any location by logging into an educate.ie application or through a web browser. You can expect 
				an excellent eTextbook experience with smooth performance, reliability and high-quality graphics.</p>
				<p><i>13 Text Samples are provided. Press the Menu icon in order to see Thumbnails, add Bookmarks, Add Notes, Highlight and Change Zoom.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=air.com.yudu.ReaderAIR3355817' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/EducateIE.JPG">
					<p class="text-center">Educate.ie</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> All Subjects - Primary and Post-Primary</p>
				<p><strong>Description:</strong> CJ Fallon eBook Reader. <i>Needs a Username and Password for full access. However, a Demo Mode is 
				provided in order to download eight chapter/titles. eBooks open to allow you to navigate through the texts; with the Second-Level 
				Language Texts, multimedia (audio clips) can be accessed relevant to a particular page; at all Levels, Student can enter and save 
				Notes; Pinch to Zoom, Pan left-right or Type Page Number or use Scroll to navigate through pages.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=IPI.cjfallon.ereader' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/Fallons.JPG">
					<p class="text-center">Fallons</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> All Subjects - Post-Primary</p>
				<p><strong>Description:</strong> Your digital classroom! Download digital versions of all your Junior Cert titles to your Bookshelf for 
				offline use. Folens eBooks for Android provide an excellent eTextbook experience, smooth performance, reliability and high quality 
				graphics. The app includes a selection of free eBook content. New titles will appear automatically on your bookshelf as they are 
				released, with instructions to download or buy.</p>
				<p><i>Needs a Username and Password for full access. However, a Demo Mode is provided in order to download fifteen chapter/titles. 
				eBooks open to allow you to navigate through the texts; with the Second-Level Language Texts, multimedia (audio clips) can be accessed 
				relevant to a particular page ....these are indicated within the text; there may be relevant Video resources also; Hyperlinks are 
				provided which link to external websites; Pinch to Zoom, Pan left-right or Type Page Number or use Scroll to naviigate through pages.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=air.com.yudu.ReaderAIR3172025&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/Folens.JPG">
					<p class="text-center">Folens eBooks for Leaving Cert</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> All Subjects - Primary and Post-Primary</p>
				<p><strong>Description:</strong> Our interactive eBooks contain audio, video, animations and web links... You can use your Gill 
				& Macmillan eBook on multiple devices and all personal notes attached to your eBook will automatically sync across all of your 
				devices. Our secure cloud-based platform means that if your device is lost or broken your eBook and notes are backed up.</p>
				<p><i>Options for Thumbnails, Bookmark, Add Note, Highlight and Change Zoom. Samples for 'Cracking Maths'</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=air.com.yudu.ReaderAIR3458192&hl=en_GB' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/GillMacP.jpg">
					<p class="text-center">Gill & Macmillan</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> Maths/Science</p>
				<p><strong>Description:</strong> The easiest way to revise Maths and Science - take the tests and improve your hiscores ! Junior iCERT 
				Maths and Science is a Junior Cert revision app that helps you to improve your knowledge of selected topics in the Junior Cert Ordinary 
				and Higher Maths and Science courses. Each Junior Cert topic is examined by a question bank of 40+ questions. The Junior Cert quizzes 
				have been written and verified in practice by a qualified and experienced Maths and Science teacher.</p>
				<p>Full Version (€1.00) is 'ad free' and contains the following modules: <ul><li>Maths: Sets 1; Quadratics; Points, Lines and Angles 1; 
				Pythagoras and Trigonometry; Calculating Probabilities; Rounding Numbers; Percentages</li><li>Science: Measurement and Units; Volume, 
				Density, Velocity and Acceleration; Force and Work; Moments and Centre of Gravity; Electric Current; Periodic Table.</li></ul>
				<i>Tests can be '10 Selected' or '5 Random'</i></p>
				<p><strong>Advertising:</strong> <i>Ads appear</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=net.iBs.freejc2013' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/JunMathsScience.png">
					<p class="text-center">Junior Cert Maths & Science</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> English/All Subjects</p>
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
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> All Subjects</p>
				<p><strong>Author:</strong> Robbie Lynch</p>
				<p><strong>Description:</strong> Can do the following:
				<ul><li>Let you download any Exam Paper / Marking Scheme that you want.</li>
				<li>From years 2000 --> 2012</li>
				<li>Give you a Leaving Cert Points Calculator</li>
				<li>Give you a Leaving Cert Countdown Timer</li>
				<li>Let you follow on twitter and Facebook</p></li></ul></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=cacafogo.software.lc.dog' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/LCdog.png">
					<p class="text-center">LC Dog</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> All Subjects</p>
				<p><strong>Author:</strong> Acet</p>
				<p><strong>Description:</strong> All Leaving Cert and Junior Cert Past Papers. Now all marking schemes as well. Gives you the papers 
				you want when you want them. Won't take up storage on your device by filling it with papers you don't need. All Free. Also plays the 
				aural audio file</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.acet.leavingCertPapers&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/LCPastPapers.JPG">
					<p class="text-center">Leaving Cert Past Papers</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> All Subjects - Primary and Post-Primary</p>
				<p><strong>Description:</strong> This app is freely available for use by all students, teachers and educators who can sign up for 
				free and avail of book vouchers from their teachers or book providers to claim their education material and enhance their learning 
				experience on their Samsung Galaxy Note 10.1 or Galaxy Tab 10.1. Designed for 10.1 inch tablets only.</p>
				<p><i>Without a Login, I am unable to test this app; nor is there a Demo Mode that I can try :-(</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.aptriva.android.mentorbooks' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/Mentor.JPG">
					<p class="text-center">Mentor</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> All Subjects</p>
				<p><strong>Description:</strong> With mocks.ie's Free app you can:
				<ul<li>View Exam breakdowns</li>
				<li>View Subject Information</li>
				<li>View past papers and marking schemes</li>
				<li>Complete aurals on your phone [or Tablet?]</li>
				<li>Revise using our multiple choice revision tool</li></ul>
				<i>To use, must first create a free account and then sign in. works in Portrait Mode</i></p>
				<p><strong>Link:</strong> Junior Cert: <a href='https://play.google.com/store/apps/details?id=ie.mocks.juniorcert' target='_blank'>
				Google Play Store</a></p>
				<p>Leaving Cert: <a href='https://play.google.com/store/apps/details?id=ie.mocks.leavingcert' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/MocksIE.JPG">
					<p class="text-center">Mocks.ie</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> All Subjects - Timetabling</p>
				<p><strong>Description:</strong> My Class Schedule keeps your student life organized! This app will not only keep you informed 
				about your upcoming classes, but also reminds you of exams and unfinished homework. The main feature of My Class Schedule 
				is its timetable that shows your schedule for any particular day or week.</p>
				<p><strong>Advertising:</strong> Ad Supported. Pro version also available</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=de.rakuun.MyClassSchedule.free&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/ClassSchedule.JPG">
					<p class="text-center">My Class Schedule</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> All Subjects</p>
				<p><strong>Author:</strong> Cooper Apps</p>
				<p><strong>Description:</strong> Created by 2nd Year Students using Appmkr, and exhibited at Young Scientist 2013.</p>
				<p>Revision Precision is an app aimed to promote productive revision techniques. It is based on 'The Forgetting Curve' by Hermann 
				Ebbinghaus. He believed when you revise something at intervals of a day, a week and a month after you first study it that it 
				creates pathways in your brain. These pathways are reinforced every time you study it.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=appinventor.ai_francesmosullivan.Revision_Precision_f' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/RevisionPP.JPG">
					<p class="text-center">Revision Precision</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> English/All Subjects</p>
				<p><strong>Description:</strong> <i>Simple Writing App. Completed words and punctuations are suggested in a word bank as you type. 
				Pictures can be Attached. Files can be Shared (Dropbox etc.). A Custom Word/Phrase bank can be used. Doesn't have spell-check nor other
				word-processing features. Can also display a Note on the desktop as a 'widget' for ease of access (or Reminder). Can change font Size 
				and Serif; adjust background brightness; swap dark/light foreground/background. Has 'Voice Input' ...start it with a large'V' gesture</i></p>
				<p><strong>Advertising:</strong> <i>Needs to be online. Ads appear briefly as you dictate but you may not notice these.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.khymaera.android.listnotefree&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/SimpleNotepadPrimary.JPG">
					<p class="text-center">Simple Notepad</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> English/All Subjects</p>
				<p><strong>Description:</strong> <i>ListNote By Khymaera. Notepad with Speech-to-Text, Password Protection, and Encryption. For Special 
				Needs Access (or non-keyboard). Works in Voice (record) or Text (type) mode. Dictate your text then hold and Click to do extra work such 
				as Edit …ListNote becomes a Text Editor so that you can continue with your Keyboard. Words can be added to the dictionary. Select to Cut, 
				Copy and Paste. Seems to need Wifi access – otherwise Record option doesn’t work? Notes can be Encrypted, Colour-Coded, Put into Categories 
				(which you could use as ‘Subjects’), Deleted (and Recovered from the Trashcan), Shared (as a .txt file) into Dropbox, over Bluetooth etc.</p>
				<p>ListNote makes use of a Voice Recognition app such as <a href='https://play.google.com/store/apps/details?id=com.google.android.voicesearch&hl=en'>
				Google Voice Search</a></i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. No Ads. 'Voice Input' requires online connection.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=org.mightyfrog.android.simplenotepad&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/SpeechText.JPG">
					<p class="text-center">Speech to Text</p>
				</div>
				
				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> English/All Subjects</p>
				<p><strong>Author:</strong> Itsjoui
				<p><strong>Description:</strong> <i>Student writes (or Pastes) a short story, App reads it back. The ‘voice’ is that of the in-built 
				Pico Synthesizer. The app also underlines the (very many, initially) unrecognised words and allows you to add them to the Dictionary. 
				Basic editing (Select to Cut, copy, Paste). ‘Reading’ is from the current cursor position: you cannot highlight a word to have it alone 
				read out, for example. Many languages are available  - but not Gaeilge :-(</i></p>
				<p><strong>Advertising:</strong> <i>Ads. For Languages other than English, needs to be online to access 'all' languages</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.ktix007.talk&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/TalkTextPrimary.JPG">
					<p class="text-center">Text to Speech</p>
				</div>

				<div class="col-md-4 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> All Subjects - Reference</p>
				<p><strong>Description:</strong> Official Wikipedia App for Android. Wikipedia is the free encyclopedia containing more than 20 million 
				articles in 280 languages, and is the most comprehensive and widely used reference work humans have ever compiled.</p>
				<p>Features: Save article to read later or offline, Search articles nearby, Share articles using Android 'Share' function, 
				Read article in a different language, Full screen search.</p>
				<p><i>Only 1.47 MB for this resource …but you need to be online. Pages that you have viewed online may be Saved for offline 
				viewing (I am unable to locate this as a stand-alone file). No ‘pinch to zoom’ but Font Size may be adjusted in the Settings. 
				Note: Encyclopaedia Britannica is also available on Play Store, at a cost of €15.99</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=org.wikipedia' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/postprimary/Wikipedia.JPG">
					<p class="text-center">Wikipedia</p>
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
