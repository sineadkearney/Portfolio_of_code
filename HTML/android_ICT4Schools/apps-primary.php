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
					<h3 class="page-header">Apps for Primary School</h3>
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
									<option value="#english">English</option>
									<option value="#irish">Gaeilge</option>
									<option value="#geography">Geography</option>
									<option value="#history">History</option>
									<option value="#maths">Maths</option>
									<option value="#music">Music</option>
									<option value="#science">Science</option>
									<option value="#typing">Typing</option>
									<option value="#arts">Visual Arts</option>
									<option value="#allMixed">All/Mixed Subjects</option>
								</select>
							</div>
						</div>
					</form>
				</div>
				
				<div class="row col-xs-12" id="english">
				<hr >
				<p> <h4>English:</h4>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> ABC HandWriting is a fun way for children to learn Alphabet, digits and how to write them. Two modes: 
				Free drawing and guided drawing</p>
				<p><i>Works in Portrait Mode. Guided Mode: trace correctly, get rewarded with a picture</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. No Ads when Offine.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.divmob.abchandwrittingactivity' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/ABCHandwriting.JPG">
					<p class="text-center">ABC Handwriting</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>The standard for working with PDFs. Can Annotate and Save Annotations. Can Pinch to Zoom. 
				Can insert (and Save) a Text Note. Can use a Highlighter, ‘strike through’, underline, add signature, scroll (horizontally or 
				vertically depending on reading mode), search for text, share (via Bluetooth, Dropbox etc.)</i></p>
				<p><strong>Advertising:</strong> <i>No Ads. Runs when offline</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.adobe.reader&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/AdobeReader.JPG">
					<p class="text-center">Adobe Reader</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Alphabet Soup ...from Grey Olltwit. An educational game for helping to learn the Alphabet. It has 
				three levels of play from beginner, with full spoken instructions (in British English) including the letter names and the phonic sound, 
				to picking out the letters one by one against the clock. Capital letters option is also included. As in many of my educational programs, 
				good work is rewarded with a certificate which can saved as a screen shot. Best played on a Tablet.</p>
				<p>Suitable for UK Key Stage 1, 2, 3, 4 & 5 - USA 1st to 12th Grade (Age 5 - adult)</p>
				<p><strong>Advertising:</strong> <i>Runs when offline. No Ads.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.greyolltwit.alphabetsoup' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/GreyAlphaSoup.JPG">
					<p class="text-center">Alphabet Soup</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Choose a Title – such as ‘Huckleberry Finn’ - and the Download begins. All of the recordings are
				in the Public Domain. Volunteer Recorders (American). Audio without Text: students may wish to have the hardcopy beside them (or downloaded
				onto another screen from, e.g., <a href='http://www.gutenberg.org/'>Project Gutenberg</a>). Portrait Mode.</i></p>
				<p><strong>Advertising:</strong> <i>Ad supported.Wifi is not needed one the Audio has been downloaded.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.crossforward.audiobooks' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/Audiobooks.JPG">
					<p class="text-center">Audiobooks</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> The LITE version lets you evaluate Brilliant Spelling with just a few levels and the ability to edit 
				one custom word list. ... Over 3100 American English words are included in the full version (about 500 words in this LITE version). You 
				may also enter your own word lists and play the game to learn them.</p>
				<p><i>From the same 'Effective Authors' as WordBot and similar in design and functionality. Portrait Mode</i></p>
				<p><strong>Advertising:</strong> <i>Runs when offline. No Ads.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.effectiveobjects.bspellinglite&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/BrillSpell.JPG">
					<p class="text-center">Brilliant Spelling Lite</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Reads downloaded texts (e.g. Aladdin from Project Gutenberg). Font can be increased but page cannot 
				be scrolled. Downloaded Texts – option to ‘continue reading’. Texts can be 'imported from SD'</i></p>
				<p><strong>Advertising:</strong> <i>Online: Advertising from booking.com etc. Runs when offline</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.graphilos.epub&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/ePubPrimary.JPG">
					<p class="text-center">ePub Reader</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
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
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Collection of approx. 20 stories for children. Books are downloaded when online and are then 
				available afterwards. Very nicely illustrated. Option to have text read aloud (although no highlighting). You can also run the eBooks 
				on your PC from the <a href='https://www.istorybooks.co/free-books.html'>iStory Books site</a></i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. No Ads when Offine.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.infomarvel.istorybooks&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/iStoryBooks.JPG">
					<p class="text-center">iStoryBooks</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" data-placement="bottom" 
				data-content="
				<p><strong>Description:</strong> <i>This free version includes letters A to H and is fully-featured. Has 4 different activities: 
				Learn Letters (Three Pictures are used for each Onset), Make Words (put letter/sounds together), Pop Letters (continues from where 
				you left off), Letter Blocks/Cubes (drag Pictures onto Sounds)</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. No Ads.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=zok.android.phonics' target='_blank'>
				Google Play Store</a></p>">
				<img class="centered" src="images/primary/ABCphonics.jpg">
					<p class="text-center">Kids ABC Phonics</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
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
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" data-placement="bottom"
				data-content="
				<p><strong>Description:</strong> This free app prompts the reader to touch the correct word on a screen of similar sounding words. 
				The large type allows young readers to move their fingers along the words while they sound it out, while the alliterative and 
				rhyming verse promote phonemic awareness. This app is optimized for tablet devices. </p>
				<p><i>Three words are used, with the option to purchase another 13 for €1.45</i></p>
				<p><strong>Advertising:</strong> <i>No Ads. Runs when offline.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=lmb.ebooks.CatCatFree' target='_blank'>
				Google Play Store</a></p>"
				>
				<img class="centered" src="images/primary/CatCat.JPG">
					<p class="text-center">Learn To Read Kids App</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> The Lexia App (free) is available for those with an active account. Lexia Reading UK on Android Tablets 
				is for students using Lexia Early Reading®, Lexia Primary Reading®, and Lexia Strategies for Older Students</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.lexialearning.lexiareadinguk' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/Lexia.JPG">
					<p class="text-center">Lexia Reading UK</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Described as 'The #1 app for children’s books. Downloaded over a million times by parents across 
				the globe. MeeGenius is the fun, free and easy-to-use library of e-books'. Books generally cost 2.99. Junglebook is free. Individual 
				Words are highlighted as they are being read. When you Register and Sign In, you get two books on your Shelf: Rapunzel and Pinocchio – 
				when you are online, these books can be downloaded and then accessed while offline. More free books 
				<a href='http://www.meegenius.com/store/books/free/'>here</a>. Skip the part about 'Facebook'!</p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. No Ads when Offine.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.meegenius.reader&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/MeeGenius.JPG">
					<p class="text-center">MeeGenius</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" data-placement="bottom"
				data-content="
				<p><strong>Description:</strong> <i>While Jolly Phonics is not (yet?) available as an Android App, 'Big Top' is a very viable alternative. 
				This is a paid-for app (€1.40) and seems very good value for a comprehensive package. It is written by a phonics expert from the Jolly 
				Discoveries literacy teaching team</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=au.com.mobiddiction.phonics' target='_blank'>
				Google Play Store</a></p>"
				>
				<img class="centered" src="images/primary/PhonicsBigTop.JPG">
					<p class="text-center">Phonics Under the Big Top</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" data-placement="bottom" 
				data-content="
				<p><strong>Description:</strong> sAyBC free - Alphabet Sounds</p>
				<p><i>This is a very simple Phonic Alphabet. I wonder is it produced here in Ireland? (sounds like an ‘Irish Child’ voice/accent)</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.androidlandscape.saybc.free&hl=en' target='_blank'>
				Google Play Store</a></p>"
				>
				<img class="centered" src="images/primary/SayBC.JPG">
					<p class="text-center">sAyBC</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> FivePumpkins</p>
				<p><strong>Description:</strong> <i>Use Edit Mode to change the words, and to do your own (or the student's) Recordings. 
				Toggle the Case. Swipe through the cards -or use the large Arrow buttons - to move from word to word in a linear sequence OR use the 
				Top Left Button for a Random, non-linear set. Turn off the audio using the Quiz Mode. In the Top Right, you can 'Star' a word - 
				and then Menu 'Favourites Mode' to review only those selected by you. (Remember to turn off 'Fav Mode' when finished!). <p>
				</p>Requires access to prevent Tablet from Sleeping (so watch the battery levels!). Author does a range of similar apps - 
				follow the link</i></p>
				<p><strong>Advertising:</strong> <i>Runs when offline. No Ads.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.fivepumpkins.words&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/SightWords.JPG">
					<p class="text-center">Sight Words</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>The online <a href'http://www.spellingcity.com/'>Spelling City</a> is used in some schools and it 
				has an android app. This has a range of engaging activities. Custom word lists may be entered online by registered parents or teachers 
				(registration is free) for use in the games and activities on VocabularySpellingCity’s app.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=air.com.spellingcity.VocabularySpellingCityAndroid&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/SpellCity.JPG">
					<p class="text-center">Spelling City</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Classic tale, nicely illustrated. Option to Listen or just to Read. More free stories available 
				(such as Aesop’s ‘The Ant and The Grasshopper’ – 18MB). Books in their Library appear on the Bookshelf. Scroll to the previously 
				downloaded ones in order to ‘Read’. Option to Record your own Reading of the Story.  Individual Sentences are highlighted as they 
				are being read. $0.99 to purchase individual story without ads</i></p>
				<p><strong>Advertising:</strong> <i>When online, Advertising from booking.com etc., and for their own books. Runs when Offline. No Ads when Offine.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.tabtale.goldilocks.googles' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/TabGoldilocks.JPG">
					<p class="text-center">TabTale Goldilocks</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Of all the WordSearch Apps I have looked at, this one is by far the most configurable ...and it 
				runs in Landscape mode. I would skip the part regarding Sign In. You still don't have full 'teacher' control such as at the online 
				<a href='http://www.puzzle-maker.com/WS/index.htm'>puzzle maker</a> for example</i></p>
				<p><strong>Advertising:</strong> Ad supported but paid version (0.99)  available</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.havos.wordsearch' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/WordSearchH.JPG">
					<p class="text-center">Word Search</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>A simple Word Search for younger users. Runs in Portrait Mode.</i></p>
				<p>Suitable for UK Key Stage 1, 2, 3, 4 & 5 - USA 1st to 12th Grade (Age 5 - adult)</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=air.com.bluecowgames.wordsearchfun' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/WordSearch.JPG">
					<p class="text-center">Word Search Fun</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" data-placement="bottom"
				data-content="
				<p><strong>Description:</strong> This is a Lite version of WordBot! 3D Spelling to try before buying. It challenges your knowledge 
				of words and helps build vocabulary and spelling skills as it takes you on a 3D tour of the solar system.
				<ul>
				<li>Lite version to evaluate before buying</li>
				<li>3D robot guides you through spelling challenges</li>
				<li>Rocket letters spelling game</li>
				<li>Custom word lists</li>
				<li>Great for ADD, ADHD, dyslexia</li></ul></p>
				<p><i>In order to Export a word list, I found I had to firstly create a Folder in SD called 'EffectiveObjects'. A 'Text List' can 
				be Imported (the structure is Word,WordPhonetic,Sentence ...no space after commas)</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=au.com.mobiddiction.phonics' target='_blank'>
				Google Play Store</a></p>"
				>
				<img class="centered" src="images/primary/WordBot.JPG">
					<p class="text-center">WordBot Lite 3D</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div class="row col-xs-12" id="irish">
				<hr>
				<p> <h4>Gaeilge:</h4>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> From TG4: These Apps bring you over 100 fun Irish language words and images for pre-school kids or learners. 
				The words include Weather, Animals, Vehicles, and Parts of the Body ...and Alphabet, Numbers, Colours, Food and Clothes. They include the 
				written and the spoken version of each word. They also includes a drawing page, to scribble your own words!</p>
				<p><i>Visually engaging, simple interface. Go híontach!</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. No Ads when Offine.</i></p>
				<p><strong>Link:</strong> Cúla Caint 1: <a href='https://play.google.com/store/apps/details?id=air.com.opus.culacainte' target='_blank'>
				Google Play Store</a></p>
				<p>Cúla Caint 2: <a href='https://play.google.com/store/apps/details?id=air.com.opus.culacaint2' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/CulaCaint.JPG">
					<p class="text-center">Cúla Caint</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Gaeilfón Free Irish Translator is a 2-way English-Irish translator which contains over 13,000 
				off-line words and terms.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.maithu.android.gaelfonfree&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/GaelfonPrimary.JPG">
					<p class="text-center">Gaelfon</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Folens and StoryToys are proud to present Mo Chéad Fhocail, an early learning app designed for young 
				children. Mo Chéad Fhocail will delight and encourage children as they learn their first words in Irish using a combination of superb, 
				colourful photographs, simple word labels and friendly narration. It's also a great way to teach children another language, with the 
				option to add a second language that you'd like to see and hear from a choice of English, French, German, Spanish or Chinese.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.storytoys.myfirstwords.ga.free.android.googleplay' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/MoCheadFhocail.JPG">
					<p class="text-center">Mo Chéad Fhocail</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div id="geography" class="row col-xs-12">
				<hr>
				<p> <h4>Geography:</h4>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> A jigsaw puzzle of the 49 countries that make up the continent of Europe. Drag and drop the countries 
				into place, learning where they are in relation to each other along with basic information about each.</p>
				<p>Suitable for UK Key Stage 2, 3, 4 & 5 - USA 2nd to 12th Grade (Age 7 - adult)</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.greyolltwit.eurojigsaw' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/GreyEuroJigsaw.JPG">
					<p class="text-center">European Jigsaw</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Famous Landmarks Puzzles FREE. <i>An engaging way to recognise famous scenes/buildings around the 
				world; you can even use the Camera to generate a ‘local image’ (including a photo from a book!). Works in Portrait Mode; start with 
				‘No thanks’ to the download offer. Choose from any of the 46 images presented; choose a 3x3 up to 19x19 ‘piece’ size; choose either 
				jigsaw or sliding mode; Choose ‘Cancel’ – and ‘Cancel’ - to the ‘Google Sign in’ at the end of the game!</i></p>
				<p><strong>Advertising:</strong> <i>Ad. supported.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.mokoolapps.landmarkspuzzles' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/LandmarksPuzzle.jpg">
					<p class="text-center">Landmarks Puzzle</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
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

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div id="history" class="row col-xs-12">
				<hr>
				<p> <h4>History:</h4>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>27 locations are noted; you can click through the Picture Gallery …each has a short text description 
				and a more extended audio guide. The app is created by the volunteer staff at <a href='http://www.waterfordmuseum.ie/'>Waterford Museum. 
				Clicking on the ‘Map’ option causes app to fail but otherwise no problems. This app is not compatible with my older ‘Neuropad’ 
				tablet (so would not show up in a Search in the Play Store). 22 Mb. Portrait Mode.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.deisedesign.android' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/DungarvanJ.jpg">
					<p class="text-center">Dungarvan Town Trail</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>A virtual tour of Kilkenny Castle. Designed as a 'Tourist App' but could be useful in classrooms also</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.mobanode.kilkenny_castle' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/KilkennyCastle.jpg">
					<p class="text-center">Kilkenny Castle</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div id="maths" class="row col-xs-12">
				<hr>
				<p> <h4>Maths:</h4>
				</p></div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>(as seen and tested at BETT2014) 10Monkeys offer a range of activities: this starter one allows users 
				to (rapidly) tap the correct Product on an engaging screen</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.tenmonkeys.multiplication&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/10monkeys.jpg">
					<p class="text-center">10Monkeys Multiplication</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>I like the Bubbbles game (tap the floating bubbles to place four numbers in order). 'Calculations' 
				provides addition exercises while 'Tables' offers multiplication. Exercises are timed (80 seconds countdown) with intermediate rewards 
				provided. Attractive interface. Portrait Mode</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. No Ads when Offline.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=fr.lehovetzki.ABMathlite&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/ABmathL.JPG">
					<p class="text-center">AB Math Lite</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> A spirit level. Hold any of the tablet's four sides against an object to test it for level or plumb, 
				or lay it down on a flat surface for a 360° level.</p>
				<p><i>Great for teaching ‘Horizontal’ or 'Level'! Works very well on my 'phone ; Tablets need to have an Accelerometer Sensor'</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. No Ads.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=zok.android.dots&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/Bubble.jpg">
					<p class="text-center">Bubble Level</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Pre-installed. Does the ‘big 4’ operations as well as Trig., Exponents etc. (but not too many!). 
				Follows the ‘Bodmas’ Rule, thankfully!</i></p>
				<p><strong>Advertising:</strong> <i>Runs when offline. Preinstalled</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=uk.co.bigfishstudios.eduDroid' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/CalculatorPrimary.jpg">
					<p class="text-center">Calculator</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Calculator Quest is an Old-World style game that also works as a Calculator. The ‘game’ part is for
				the student to quickly type in the answer to a given ‘sum’. Portrait Mode.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=jp.co.uraraworks.dq' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/CalcQuest.JPG">
					<p class="text-center">Calculator Quest</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>(as seen and tested at BETT2014) Part of a whole suite of apps for younger learners, this (free version) 
				will cover counting and addition up to 6</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=air.com.tribalnova.ilearnwith.ipad.PokoAddEn' target='_blank'>
				Google Play Store</a> <i>(and look for more from Developer at the bottom of the page)</i></p>">
				<img  class="centered" src="images/primary/CountAdd.JPG">
					<p class="text-center">Counting and Addition Kids Games</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Master your multiplication skills with this multiple-choice math game. Does seek to access ’phone 
				state and identity’ but should be fine on a Tablet.  Student has the option to 'Submit' scores to the Edwin Website, so exercise caution
				here!</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. No Ads when Offine.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.edwinsmath.multiplication' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/EdwinMathX.jpg">
					<p class="text-center">Edwin’s Math – Multiplication</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> From Grey Olltwit: Practise addition sums with the Everlasting Maths Worksheet. Choose from 3 levels 
				of addition sums from single digits to three figure problems. Each sum is randomly produced one at a time on a blackboard style interface. 
				Audio and visual encouragement let's you know when you are right and when you need to try again. Includes the ability to carry 1 when the
				answer to a column of figures is more than 9. Personalised certificates encourage improvement. Can be played landscape on a phone but 
				best played on a tablet. Suitable for UK Key Stage 2, 3, 4 & 5 - USA 2nd to 12th Grade (Age 7 - adult)</p>
				<p><strong>Link:</strong> Addition: <a href='https://play.google.com/store/apps/details?id=com.greyolltwit.addition' target='_blank'>
				Google Play Store</a></p>
				<p>Division: <a href='https://play.google.com/store/apps/details?id=com.greyolltwit.division' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/GreyAddition.JPG">
					<p class="text-center">Everlasting Worksheet</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> 2012 Parents' Choice Silver Award winner - Parents' Choice Foundation</p>
				<p>Best-selling time telling app for kids, Interactive Telling Time has now come to Google Play Store. Discover an easy and fun way to 
				teach your kids about analog and digital clocks. Includes 8 fun and interactive clocks that comes with movable hour and minutes hands 
				especially designed for kids!</p>
				<p><i>Note: 46 MB download file</i></p>
				<p><strong>Advertising:</strong> <i>No Ads (just invite to upgrade). Runs when Offline. No Ads when Offine.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.giggleup.ITTAFree&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/TellingTime.JPG">
					<p class="text-center">Interactive Telling Time</p>
				</div>
			
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>This is a comprehensive set of apps that covers Content and Assessment, based on the U.S. 
				'National Core Standard'. The initial level(s) in each app are free; full access to each app can cost €4.49...however, each Level 
				gets unlocked (for free) when you correctly complete the previous one :-) There is also a nice 'blackboard'  part of the app where 
				you can sketch the sum</i></p>
				<p><strong>Link:</strong> 1st: <a href='https://play.google.com/store/apps/details?id=com.edupad.app.grade1.math' target='_blank'>
				Google Play Store</a></p>
				<p>2nd: <a href='https://play.google.com/store/apps/details?id=com.edupad.app.grade2.math' target='_blank'>Google Play Store</a></p>
				<p>3rd: <a href='https://play.google.com/store/apps/details?id=com.edupad.app.grade3.math' target='_blank'>Google Play Store</a></p>
				<p>4th: <a href='https://play.google.com/store/apps/details?id=com.edupad.app.grade4.math' target='_blank'>Google Play Store</a></p>
				<p>5th: <a href='https://play.google.com/store/apps/details?id=com.edupad.app.grade5.math' target='_blank'>Google Play Store</a></p>
				<p>6th: <a href='https://play.google.com/store/apps/details?id=com.edupad.app.grade6.math' target='_blank'>Google Play Store</a></p>">
				<img  class="centered" src="images/primary/iToochMaths1.JPG">
					<p class="text-center">iTooch Math</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>The 'arcade game' that has been available on PC for some 20 years is now on Tablet. With this version,
				you can rotate yoru Tablet in order to steer the rocket! 'Arithmetic' exercises are available in the 'free' version</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. Ads for more games appear when online. Advise studnets to skip the 'Store' part</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.KnowledgeAdventure.HyperBlast2HDFree' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/MathsBlaster.jpg">
					<p class="text-center">Maths Blaster</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Simple Addition Sums. Tap on the Bubbles to indicate answer. Keeps offering new sums as long as you are 
				getting them right. Portrait Mode.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.ditiva.MathInMotion&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/MathMotion.JPG">
					<p class="text-center">Math in Motion</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>50 basic computations Add/Subratct; Multiply/D Runs in Portrait Mode. License is for personal use only.
				Does seek to access ’phone state and identity’ but should be fine on a Tablet.</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. No Ads when Offline but they appear when Online.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.akbur.mathsworkout&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/MathWorkout.JPG">
					<p class="text-center">Math Workout</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Mathletics is used a number of Irish Classrooms.<i> 
				Mathletics Student is available as a free download to all mathletics.com subscribers and requires login credentials to access.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.mathletics.android.samsung&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/MathleticsS.jpg">
					<p class="text-center">Mathletics Student</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>If I was to sit down and design a suite of Fraction Apps, I don't think I could improve on these 
				offerings. The nature of the activities fits so well with our (senior) classrooms. The apps are free (in Lite mode) and you can purchase
				an upgrade</i></p>
				<p><strong>Link:</strong> Simply Fractions 1: <a href='https://play.google.com/store/apps/details?id=com.SimplyLearningAid.SimplyFracLite' target='_blank'>
				Google Play Store</a></p>
				Simply Fractions 2: <a href='https://play.google.com/store/apps/details?id=com.SimplyLearningAid.SimplyFrac2Lite' target='_blank'>
				Google Play Store</a></p>
				Simply Fractions 3: <a href='https://play.google.com/store/apps/details?id=com.SimplyLearningAid.SimplyFrac3Lite' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/SimplifyFractions.jpg">
					<p class="text-center">Simplfy Fractions</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Place shape onscreen in order to measure angles. Can also be used as a Clinometer (but the 
				Plumbline feature did not work on my Tablet, showing a ‘magnetic sensor error’)</i></p>
				<p><strong>Advertising:</strong> <i>Ads. If online. Runs when Offline</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=kr.sira.protractor&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/SmartPro.jpg">
					<p class="text-center">Smart Protractor</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Place object on screen to measure length (up to 20cm). Displays measure to accuracy of tenths of 
				millimetre – a good exercise in ‘rounding to one place of decimals.</i></p>
				<p><strong>Advertising:</strong> <i>Ads. If online. Runs when Offline</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=kr.sira.ruler&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/SmartRuler.JPG">
					<p class="text-center">Smart Ruler</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Traditional 'Shape and Space' Game: Drag the Tan Pieces into place onto user-selected shapes. 
				User can Rotate and Flip pieces. Very good for developing spatial awareness.</i></p>
				<p><strong>Advertising:</strong> <i>Ads. if online. Runs when Offline. No Ads when Offine.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.jin.games.tangram&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/Tangrams.JPG">
					<p class="text-center">Tangram HD</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
						
				<div id="music" class="row col-xs-12">
				<hr>
				<p> <h4>Music:</h4>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Full Keyboard system. Similar to ‘My Piano’ but with no Record option. Similar instruments but can 
				also use Steel Drums, Bells etc.</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=souvey.musical&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/Musical.jpg">
					<p class="text-center">Musical Lite</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>A simpler approach than ‘Perfect Piano’ but very useful nonetheless. Just one octave by default 
				(but you can add a second via the Settings). Can Play, Record and Save. Choose from Piano, Organ, Synth, Guitar, Saxophone etc.</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. No Ads when Offine.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.bti.myPiano&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/MyPiano.JPG">
					<p class="text-center">My Piano</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Learn the Piano Keyboard from Revontulet: Single or Double Row of Keys; Can Record and Playback. 
				'Learn to Play' Mode has lots of familiar tunes. Music files can be saved (using own format) or 'Audio' can be saved as .aac</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. No Ads when Offine.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.gamestar.perfectpiano' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/PerfectPiano.jpg">
					<p class="text-center">Perfect Piano</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Virtual Drum Kit. Very realistic sound effects. Option to Record and Playback</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=br.com.rodrigokolb.realdrum&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/RealDrum.jpg">
					<p class="text-center">Real Drum</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Turns speech into Music. Works in Portrait Mode only. Users are encouraged to buy additional tracks 
				(can only proceed when online) ‘though some are free. ‘Song’ can be saved or Uploaded (Dropbox etc.) or Bluetoothed. A bit of musical fun
				really but it might encourage the ‘reluctant reader’ to hear his/her story or poem in this medium</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.smule.songify&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/Songify.jpg">
					<p class="text-center">Songify</p>
				</div>
						
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div id="science" class="row col-xs-12">
				<hr>
				<p> <h4>Science:</h4>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> From Grey Olltwit: Track down dinosaur fossils around the world without leaving home. Suitable for UK
				Key Stage 2, 3, 4 & 5 - USA 2nd to 12th Grade (Age 7 - adult). This is a fun learning game all about dinosaurs. You search for the fossil
				remains of these ancient creatures in all parts of the world in the game and store your finds in your fossil tray, learning about them 
				as you go. The game involves searching photographs of locations around the world for dinosaur remains and then correctly identifying your
				finds using the reference section. Best played on a Tablet.</p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.greyolltwit.dinohunt' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/GreyDino.jpg">
					<p class="text-center">Dinosaur Hunt</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Life Cycle of a Frog (SESE - Living Things -  Plant and Animal Life)
				<ul>
				<li>A captivating animation regarding how a single cell develops into a fish like tadpole and is finally transformed into a frog.</li>
				<li>A challenging quiz to congeal your concepts regarding the topic. • Researched web links to boost your knowledge.</li>
				<li>A glossary section to acquaint you with the technical terms and their proper meanings.</li>
				<li>A conceptual image to explain the various stages in the life history of frog.</li></ul>
				</p><p>Use it in conjunction with the <a href='http://www.seomraranga.com/2011/03/life-cycle-of-a-frog/'>PowerPoint</a> on Seomra Ranga .
				Apart from the Frog App, Designmate do a whole <a href='https://play.google.com/store/apps/developer?id=Designmate'>range of (often) free apps</a></i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.dm.frog' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/frog.png">
					<p class="text-center">Frog</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Irish Wildlife App Man</p>
				<p><strong>Description:</strong> Use this App to identify Irish Butterflies and report them if you want. The Butterflies are split up 
				into different groups so select the group you think the butterfly is in and then select the butterfly you think you may have seen. 
				Examine the picture closely by pressing it and zooming in on the details.</p>
				<p><i>This app didn't work on my first Tablet but delighted to now have access to this visual and useful resource.
				While you are there (on the Play Store) you might also wish to download the Author's 'Irish Land Mammals' and 'Irish Bumblebees'</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=org.biodiversityireland.butterfly&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/IrishButterfly.jpg">
					<p class="text-center">Irish Butterflies</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Now Derek Mooney can be with you wherever you are. If you enjoy listening to him on the radio then 
				you will love this mobile application. With a range of features including the mooneycam nest watch, Eurovision highlights <i>
				[you might want to skip that part!]</i>, Mooney’s mag and lots of archive audio and video.</p>
				<p><i>Works in Portrait Mode. Unable to watch the 'Barn Owl Cam' nor, in the Media section, the Video Clips (such as Blue Tits) nor the 
				Audio Clips (such as 'Dawn Chorus').There are a number of Podcasts ...such as ''The World of the Swallow' (others may not be suitable for
				Primary School). On the Home Screen, apart from Barn Owl (above), are Mooney Docs (mp3 files), Mooneys Mag (Articles, with Text/Pictures)
				and Garden Birds (Articles, Text/Pictures) ..pity Font Size can't be increased in latter. The Twitter link is for RTE Tweets (so not 
				specific to 'Mooney').</i></p>
				<p><strong>Link:</strong> App currently not available... Nov 2014</p>">
				<img  class="centered" src="images/primary/Mooney.png">
					<p class="text-center">RTE's Mooney App</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> Measure the loudness of sounds in the classroom! Ask students to measure loudness of their mp3 
				(or similar) player, loudness of vacuum cleaner etc.</p>
				<p><i>Not sure about its accuracy, but it is at least a useful tool for comparing graph of differing volume levels</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=kr.sira.sound&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/SmartSound.jpg">
					<p class="text-center">Sound Meter</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div id="typing" class="row col-xs-12">
				<hr>
				<p> <h4>Typing:</h4>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>This may be aimed at a younger audience. User is asked to type the words that appear on-screen. 
				The software is produced (and used) as part of PhD thesis. Have a look also at the 'SpeedTest' app in the Post-Primary App page</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=net.nhenze.game.typeit' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/TypeIt.jpg">
					<p class="text-center">Type It!</p>
				</div>
				
				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div id="arts" class="row col-xs-12">
				<hr>
				<p> <h4>Visual Arts:</h4>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>Simple Drawing App; works in Portrait mode (so do some planning if you hope to use your drawing 
				as a 'Wallpaper' ...800 by 1176 are the dimensions). Easy to set your RGB Pen Colours, but you might have to think for Yellow etc. 
				(255,255,0 by the way!); a second Pen can also be used (I like to set it as the Eraser). Can Save (drawings go into the local 
				'Camera' folder' and Send To (Dropbox, Bluetooth etc.); can Import from Gallery (or from Cloud locations such as Dropbox); can 
				Shake to Clear; can turn your drawing into a Jigsaw; can set Background Colour (239, 228, 176 for a Pale Yellow)</i></p>
				<p><strong>Advertising:</strong> <i>Ads. when online. Runs when Offline. No Ads when Offine.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.android.thewongandonly.QuickDraw&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/Draw.jpg">
					<p class="text-center">Draw</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>(as seen and tested at BETT2014) This painting app is simple and rewarding to use. It lacks a 
				Save feature so use your Tablet's capture option. Brought to you by Inclusive Technology</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=air.com.inclusive.fingerpaint' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/FingerPaint.jpg">
					<p class="text-center">Finger Paint</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Visual Blasters</p>
				<p><strong>Description:</strong> Easily make flipbook style movies with FlipaClip! FlipaClip allows you to effortlessly create, 
				edit, and export movies to your favorite social networks!</p>
				<p><i>Animations can also be saved locally ...and shared with your class (without going near those 'social networks'!). A simple and 
				accessible utility.</i></p>
				<p><strong>Advertising:</strong> <i>Works without Wifi.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.vblast.flipaclip' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/FlipaClip.jpg">
					<p class="text-center">Flip A Clip</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Lego</p>
				<p><strong>Description:</strong> For kids age 4-7 or just a playful spirit. Build your own truck (helicopter blades or legs for wheels 
				optional), bring your cargo to its right destination, and collect coins to earn more parts! Use your imagination and building skills 
				with the LEGO® Large Brick Box (6166) app. For more information about LEGO®Bricks and More, visit 
				<a href='http://creative.lego.com/en-us/default.aspx'>Creative.LEGO.com</a></p>
				<p><i>...for Flash-based activities in the 'Games' section (Build, Matching Pairs etc.). The app itself does not have many activities, 
				aimed more for age 4 than age 7.</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. No Ads when Offine.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.lego.bricksmore' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/Lego.jpg">
					<p class="text-center">Lego</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Author:</strong> Doodle Joy Studio</p>
				<p><strong>Description:</strong> <i>Not just another useful painting app as this one will also play back the brush strokes for you. 
				Images (.png) can be exported. I also use the Playback feature in Maths, English etc. Be careful with the Ads. that will appear when 
				online as these may not be appropriate for classroom - use with wifi turned off.</i></p>
				<p><strong>Advertising:</strong> <i>Works without Wifi. Ads. will appear when online</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.doodlejoy.studio.doodleworld&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/PaintJoyN.jpg">
					<p class="text-center">PaintJoy</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>High-end drawing app; Can Save and Load</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. No Ads when Offine.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.adsk.sketchbookhdexpress&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/Sketchbook.jpg">
					<p class="text-center">Sketchbook Express</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Description:</strong> <i>For Junior Infants. Paint (Tap to Fill) the provided pictures: simple but effective.</i></p>
				<p><strong>Advertising:</strong> <i>Runs when offline.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.dornbachs.zebra&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/ZebraPaint.jpg">
					<p class="text-center">Zebra Paint</p>
				</div>

				<div class="col-xs-offset-10 col-xs-2">
					<button type="button" class="btn btn-default" onclick="document.getElementById('jumpToSelection').selectedIndex = 0; location = '#top'">
					<span class="glyphicon glyphicon-arrow-up"></span></button>
				</div>
				
				<div id="allMixed" class="row col-xs-12">
				<hr>
				<p> <h4>All/Mixed Subjects:</h4>
				</p></div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> Maths/Art</p>
				<p><strong>Description:</strong> <i>Connect the Dots! In a Sequence chosen by user (1, 2, 3 or Evens or Odds ..or even Alphabetic). 
				Simple but effective. When sequence is complete, a graphic is presented</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. No Ads when Offine.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=zok.android.dots&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/connect.jpg">
					<p class="text-center">Connect the Dots - Junior Infants</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> All Subjects - Primary and Post-Primary</p>
				<p><strong>Description:</strong> CJ Fallon eBook Reader.</p>
				<p><i>Needs a Username and Password for full access. However, a Demo Mode is provided in order to download eight chapter/titles. 
				eBooks open to allow you to navigate through the texts; with the Second-Level Language Texts, multimedia (audio clips) can be 
				accessed relevant to a particular page; at all Levels, Student can enter and save Notes; Pinch to Zoom, Pan left-right or Type 
				Page Number or use Scroll to navigate through pages.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=IPI.cjfallon.ereader&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/FallonsPrimary.jpg">
					<p class="text-center">CJ Fallons</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> English/Music/All Subjects</p>
				<p><strong>Description:</strong> Easy Voice Recorder is a simple, fun, and easy to use audio & voice recorder. Use it to record meetings, 
				lectures, and personal notes, without time limits! This is the free, ad-supported version.</p>
				<p><i>Saves as .wav files. Menu allows Sharing (Bluetooth, Dropbox etc.). €2.99 for the Pro version</i></p>
				<p><strong>Advertising:</strong> <i>Ads appear</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.coffeebeanventures.easyvoicerecorder&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/EasyVoice.jpg">
					<p class="text-center">Easy Voice Recorder</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> Maths/English/Art</p>
				<p><strong>Description:</strong> <i>(as seen and tested at BETT2014) I have located this app in the Maths section but it set to become much 
				more than that. The initial offering (Numercy) uses UK coins but it and the other numeracy activities are still very relevant in Irish 
				(junior) classrooms</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=uk.co.bigfishstudios.eduDroid' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/EduDroid.JPG">
					<p class="text-center">EduDroid</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
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
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> English/Music/All Subjects</p>
				<p><strong>Description:</strong> Hi-Q MP3 Voice Recorder. <i>Saves as .mp3, and you can set a Check that allows you to assign 
				('rename') a Filename.</p>
				<p>Limit of 10-minutes per recording in the free version. Its Settings allow you to set the Location of the saved file (defaults 
				to Recordings folder ...from where file can be Moved etc.). €2.99 for the Pro version</i></p>
				<p><strong>Advertising:</strong> <i>No Ads. appear</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=yuku.mp3recorder.lite&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/HiQRecorder.jpg">
					<p class="text-center">Hi-Q Voice Recorder</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> PE/SPHE</p>
				<p><strong>Description:</strong> Graphics and information about such topics as Safe Swimming, Basic Life Support, Beach Flags, 
				Lifejackets etc.</p>
				<p><i>Simple, information rich. Some of the text may be too difficult for younger readers</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=ie.iwsapp&hl=en' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/IrishWater.jpg">
					<p class="text-center">Irish Water Safety</p>
				</div>
			
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> All Subjects - Primary and Post-Primary</p>
				<p><strong>Description:</strong> Mentor eBooks. This app is freely available for use by all students, teachers and educators who 
				can sign up for free and avail of book vouchers from their teachers or book providers to claim their education material and 
				enhance their learning experience on their Samsung Galaxy Note 10.1 or Galaxy Tab 10.1. Designed for 10.1 inch tablets only.</p>
				<p><i>Without a Login, I am unable to test this app; nor is there a Demo Mode that I can try :-(</i></p>
				<p><strong>Advertising:</strong> <i>Runs when Offline. No Ads when Offine.</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.aptriva.android.mentorbooks' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/MentorPrimary.jpg">
					<p class="text-center">Mentor</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> SESE Science, Geography</p>
				<p><strong>Description:</strong> National Geographic Explorer is a robust classroom resource that connects students to the world. 
				It supports common core science and language arts standards. Highly interactive content with videos, audio, photos, and levelled 
				text gives students an authentic learning experience that engages while it teaches.<p>
				</p><i>This App gives you access to some free editions …but watch the File Size (Young Explorer, March 2012 is 120 MB). Requires 
				Access to ‘Sleeping’ Mode on Tablet. Also Requires installation of <a href='https://play.google.com/store/apps/details?id=com.adobe.air&hl=en'>
				Adobe Air</a> app. Very visually appealing</i></p>
				<p><strong>Link:</strong> <a href='https://play.google.com/store/apps/details?id=com.cengage.mobile.android.natgeoexplorer&hl=en ' target='_blank'>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/NatGeographic.jpg">
					<p class="text-center">National Geographic</p>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
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
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
				data-content="
				<p><strong>Subject:</strong> Music/All Subjects</p>
				<p><strong>Description:</strong> <i>This is the Pre-installed App. Very simple interface. No option to see where it is being saved 
				...but the files end up in the Root folder and are called 'Recording-12345' or similar.</i></p>
				<p><strong>Advertising:</strong> <i>No Ads. appear</i></p>
				Google Play Store</a></p>">
				<img  class="centered" src="images/primary/SoundRecorder.jpg">
					<p class="text-center">Sound Recorder</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
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
				
				<div class="col-md-4 col-sm-6 col-xs-6 popover-icon" data-container="body" data-toggle="popover" 
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
