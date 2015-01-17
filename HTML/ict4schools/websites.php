<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ICT 4 Schools - Websites</title>

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

$(document).ready(function(){
	

	//hide all the individual sections when we load the page
	contents = ["art", "business", "cspe", "english", "french", "gaeilge", "geography", "history", "homeec", "latin", "maths", "wood", "music", "religion", "science", "type", "intwhite", "collab", "resource", "brain", "ref", "textbook", "games"]
	contents.forEach(function(section) {
		$("#"+section+"_content").hide();
	});
	
	openSectionIfSearchResult()
	
	
	
	function ToggleVisibility(element)
	{
		var id = element.id;
		
		var section = id.substr(0, id.indexOf("_")) //art, business, cspe, etc
		$("#"+section+"_content").toggle(100); //hide/show the list
	
		//element.children[0] is the <span> that is contained within the <h3>
		if (element.children[0].className.indexOf("plus") != -1) //contains, "plus", change to "minus"
			element.children[0].className = element.children[0].className.replace("plus", "minus");
		else	
			element.children[0].className = element.children[0].className.replace("minus", "plus");	
	}
	
	jQuery("h3").click(function() { //every time I click on a h3 element, print the ID
		ToggleVisibility(this)
	});
	
});

function HideSelection(section)
{
	$("#"+section+"_content").toggle(100); //hide the content
	var element = document.getElementById(section+"_header");
	element.children[0].className = element.children[0].className.replace("minus", "plus")
}
</script>


  </head>

  <body>

    <!-- Fixed navbar -->
    <?php
		include('menu.php');
	?>

    <!-- Begin page content -->
    <div class="container content">	
		<div class="col-xs-12 col-sm-12 col-md-12">
			
			<div class="page-header">
				<h1>Websites for Education</h1>
				<hr>
			</div>
						
			<p>
				<h3>Introduction</h3>
			</p>
			<p>
				These links are organised by Subject (using the Junior Cycle listing). The initial entries in each category are aimed 
				towards Primary Classrooms while the later entries are more suited for Second-Level classrooms. Towards the end of this page, 
				there are generic resources for Teachers. I cannot be held liable for the (changing) content of external sites! Teacher discretion 
				is advised. On occasion, you may have to check copyright with regard to the use of any download resources.
			</p>
			<p>
				Mobile Device Update (May 2014): All sites have been tested on PC Win 7, Android 4.0.4 ICS and iPad2 (iOS 6.0.1). Of the 150 sites 
				running on PC, 74 use Flash and another 10 use Java (my Original Testing, May 2012, had 155 sites running on PC, 79 used Flash and 
				another 13 used Java)
			</p>
		

			<!--Art-->
			<p>
				<a class="anchor" name="art"></a>
				<h3 style="width:100px" class="clickable" id="art_header">Art <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="art_content">
					<ul>
						<li>
							<a href="http://www.coloringcastle.com/">Colouring Pages</a> ...resources are in PDF format
						</li>
						<li>
							A useful set of resources from <a href="https://hwb.wales.gov.uk/Resources">Digital Learning for Wales</a> ...(Requires Flash)
						</li>
						<li>
							<a href="http://www.iamanartist.ie/index.aspx">'I am an Artist'</a> is NCTE's resource for the Visual Arts ...Video Guides for Teachers require Flash</li>
						<li>
							<a href="http://animoto.com">Animoto</a> is an online/web application that, with the click of a button, produces videos using images, 
							video clips and music that a user selects. Registration required. 
							View my simple Sample <a href="http://animoto.com/play/dl6YmYFd0HLywx8GYXBQbA">here</a>
						</li>
						<li>
							<a href="http://www.artteachers.ie/index.php?id=1">Art Teachers</a> have Resources for registered users
						</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('art');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--Business-->
			<p>
				<a class="anchor" name="business"></a>
				<h3 class="clickable" id="business_header">Business <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="business_content">
					<ul>
						<li>
							<a href="http://www.bstai.ie/">Business Teachers</a> have many resources/links. Resources (in the 'Teaching' section are often PDF or 
							SlideShares ...latter can be slow to open on Tablets, although www.slideshare.net opens fine directly)
						</li>
						<li>
							<a href="http://www.skoool.ie/junior.asp?id=1169">Skool</a> (Requires Flash) to 'launch lessons'
						</li>
						<li>
							<a href="http://www.teambuilding.ie/team-building-events/interactive-business-games/">TeamBuilding.ie</a> provide a range of resources 
							(in PDF format)
						</li>
						<li>
							<a href="http://www.totemlearning.com/the-business-game">Business Game</a> (uses $ currency)(thnx, Eileen) ...(Requires Flash)
						</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('business');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--CSPE, SPHE, RSE-->
			<p>
				<a class="anchor" name="cspe"></a>
				<h3 class="clickable" id="cspe_header">CSPE, SPHE, RSE <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="cspe_content">
					<ul>
						<li>
							<a href="http://www.actonline.ie/">CSPE Teachers</a> Their Resources section has some materials available through links: 
							there is a collection of very useful Video clips (although the 'vimeo' one does not seem to open on iPad, but is fine on Android and Web)
							</li>
						<li>
							<a href="http://www.pdst.ie/node/3961">The Junior Cert CSPE Support Service</a> (now part of PDST) has all of the advisory PDFs
						</li>
						<li>
							<a href="http://www.pdst.ie/node/810">The SPHE Support Service</a> (now part of PDST) has PDF resources
						</li>
						<li>
							<a href="http://www.pdst.ie/jc/sphe/rse">RSE (Post Primary) material</a>
						</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('cspe');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--English-->
			<p>
				<a class="anchor" name="english"></a>
				<h3 class="clickable" id="english_header">English <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="english_content">
					<ul>
						<li>
							For a very good illustration of activities that would work well on an IWB, visit <a href="http://www.iboard.co.uk/activities">
							TES iboard</a>. ...Resources without the 'Big +' seem to be free to use. I sampled 
							<a href="http://www.iboard.co.uk/iwb/Channel-A-42">this</a> (Requires Flash)
						</li>
						<li>
							Scholastic's <a href="http://teacher.scholastic.com/clifford1/flash/phonics/index.htm">"Clifford the Big Red Dog: 
							Interactive Storybooks"</a> (Requires Flash)
						</li>
						<li>
							<a href="http://www.starfall.com/">Starfall</a> - excellent online resource for Reading, Onset-rhyme etc. If a Mobile Device 
							is detected, and using the default Browser, you will be redirected to the App Store (iTunes) option; with Firefox (Beta) 
							you are brought to the website just as with a Desktop
						</li>
						<li>
							Loads of Audio (with Text) Stories from <a href="http://storynory.com/">Storynory</a>. Listen Live on the web or download 
							the stories from iTunes.
						</li>
						<li>
							A huge collection of Literacy links from <a href="http://www.woodlands-junior.kent.sch.uk/interactive/literacy/index.htm">
							Woodlands School</a>. Some at least (such as CVC Words - ICT Games) require Flash.
						</li>
						<li>
							Based on the Oxford Reading Tree series, there are lots of activities at 
							<a href="http://www.bbc.co.uk/schools/magickey/index.shtml">The Magic Key</a>. 
							Some 'Adventures' at least (such as Sweet Tooth - Full Stops) require Flash</li>
						<li>
							Make Online Games based on the spellings of words that you enter <a href="http://www.spellingcity.com/">Spelling City</a> 
							(Apps available for iOS and Android or continue to the website)
						</li>
						<li>
							Patrick Kavanagh: Text, Video and Audio from RTE's
							<a href="http://www.rte.ie/archives/exhibitions/1323-patrick-kavanagh/">Look and Listen archive</a> Video Clips 
							(such as that of Brendan Kennelly) use Flash
							</li>
						<li>
							Brendan Behan:  Text, Video and Audio from RTE's
							<a href="http://www.rte.ie/archives/exhibitions/925-brendan-behan/">Look and Listen archive</a> Video Clips use Flash.
						</li>
						<li>
							<a href="http://www.bbc.co.uk/skillswise/topic-group/word-grammar">BBC Skillwise for Adults</a>. Some Resources 
							(such as Word Grammar - Adverbs - Level 1 Quiz) require both JavaScript and Flash. The former is enabled via your Browser's 
							Settings (although this doesn't work on my default Android Browser, nor on PC's Chrome but it is fine in IE)
						</li>
						<li>
							Texts (and often Audio) of all of the Classics from <a href="http://www.gutenberg.org/catalog/">
							Project Gutenberg </a> ...in a range of Formats (e.g. <a href="http://www.gutenberg.org/ebooks/76">Huckleberry Finn</a> 
							Note that there is a Kindle App available for Android and iOS.
						</li>
						<li>
							More texts (including that of Frances Hodgson Burnett - "The Secret Garden") at 
							<a href="http://www.online-literature.com/">Online Literature</a> 
							A Mobile Device is detected and you are invited to follow the iTunes link ...or you can continue to use the web version.
						</li>
						<li>
							Extracts and Teaching Notes for <a href="http://www.obrien.ie/aubrey-flegg">Aubrey Flegg's "The Cinnamon Tree"</a>
						</li>
						<li>
							How well do you know your Irish authors? Find out in this game from 
							<a href="http://askaboutireland.ie/learning-zone/secondary-students/games-3d-tours/the-irish-writers-game/index.xml">
							An Chomhairle Leabharlanna</a>. (Requires Flash)
						</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('english');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--French, German, ...-->
			<p>
				<a class="french" name="business"></a>
				<h3 class="clickable" id="french_header">French, German, ... <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="french_content">
					<ul>
						<li>
							<a href="http://www.mlpsi.ie/">The Modern Language in Primary Schools Initiative</a> has resources (including for IWBs) 
							for each of the four languages.	The site is still in place, with links to a range of resource types (.xls, .doc, .ppt, 
							.notebook) and to websites such as Teachers' TV (where Clips need Flash but can be downloaded in .mov or .wmv) ...Teacher's 
							TV is now hosted through a <a href="https://www.gov.uk/government/publications/teachers-tv/teachers-tv">number of agencies</a>
						</li>
						<li>
							<a href="http://fr.euronews.com/">Euronews</a> (French) ...use the drop-down to change over to French, German, Spanish, 
							Italian (or open the <a href="http://www.euronews.com/">English version</a> in a separate Tab)... so that you have two or 
							more language versions available to compare. Apps available for iOS, Android and Win.
						</li>
						<li>
							<a href="http://www.germanteachers.ie/resources/">German Teachers</a> Many Shared Resources are available to download: 
							on iOS, you are asked for an archiving program although this appears to be in place for Android.
						</li>
						<li>
							German:  A useful set of resources from <a href="https://hwb.wales.gov.uk/cms/hwbcontent/Shared%20Documents/vtc/ngfl/german/j_field_schule/index.html">
							Digital Learning for Wales</a>. Many Worksheets are .docs while Activities require Flash ...such as 
							<a href="https://hwb.wales.gov.uk/cms/hwbcontent/Shared%20Documents/vtc/20050330/German/Keystage4/wordorder/arbeiteni/introduct/mainsession1.htm">
							this example</a>.
						</li>
						<li>
							<a href="http://www.french.ie">French.ie</a> has a number of resources (mostly links), many organised around 'dossiers'
						</li>
						<li>
							<a href="www.francais.ie">Francais.ie</a> A commercial site - with some free audio/pdf resources</li>
						<li>
							French, German, Spanish, Italian and English (great for the translation) at <a href="www.linguastarsonline.org/">
							Linguastars</a>. This is a subscription site but there are some very good free resources at 
							<a href="http://www.linguascope.com/preview/">Linguascope</a> which require Flash
						</li>
						<li>
							<a href="http://atsirlanda.com/resources/">Spanish Teachers (Association of)</a> have some useful (docs and ppts) resources
						</li>
						<li>
							<a href="http://www.lightbulblanguages.co.uk/estrellas-spanish-index.htm">Lightbulb Languages</a>
							many activities for Spanish (and others)...these all seem to use Flash
						</li>
						<li>
							<a href="http://atiireland.com/2012/useful-resources/">Italian Teachers</a> have some resources (.doc, .pdf and .ppt)
						</li>
						<li>
							Watch the <a href="http://www.mystudymate.ie/italian.html">videos</a> by the students of Ratoath College (videos require Flash)
						</li>
						<li>
							Type text or a web address (or even upload a document) into <a href="http://translate.google.com/#">Google Translate</a> 
							to get translations (verbatim?) in many languages</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('french');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--Gaeilge-->
			<p>
				<a class="anchor" name="gaeilge"></a>
				<h3 class="clickable" id="gaeilge_header">Gaeilge <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="gaeilge_content">
					<ul>
						<li>
							<a href="http://www.seomraranga.com">Seomra Ranga</a>An excellent shared resource by Aidan in Sligo. 
							So many resources shared, in a number of formats)
						</li>
						<li>
							<a href="http://www.isfeidirliom.ie/">IsFeidirLiom</a> (GRMA, Seamus) has free 'Interactives' (Nouns, Verbs)
							Site is 'for Parents' but useful in a school setting also. (Requires Flash)
						</li>
						<li>
							Online <a href="http://www.irishdictionary.ie">Irish dictionary</a> (I am not sure who is behind this site!)
						</li>
						<li>
							<a href="http://www.curriculumonline.ie/Junior-cycle/Junior-Cycle-Subjects/Gaeilge">NCCA's Junior Cycle Curriculum</a>
						</li>
						<li>
							Peig: Text and Audio from RTE's <a href="http://www.rte.ie/archives/exhibitions/921-peig-sayers/289575-peig-field-recordings/">
							Look and Listen archive</a> Video Clips use Flash.
						</li>
						<li>
							<a href="http://www.studybase.com/">Studybase</a> (based in Kildare)</li>
						<li>
							<a href="http://www.cnmg.ie">CnaMG</a> (including Podchraoltai in QuickTime, maybe more for Registered Users)
						</li>
						<li>
							<a href="http://www.beo.ie/">Beo</a>...monthly magazine
						</li>
						<li>
							<a href="http://www.enjoyirish.ie/Sampla.html#acnhor">Enjoy Irish</a> Sampla (text and MP3 audio)
						</li>
						<li>
							Type text or a web address (or even upload a document) into <a href="http://translate.google.com/">Google Translate</a> 
							to get translations (verbatim?) ...Irish is listed among the language options
						</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('gaeilge');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--Geography-->
			<p>
				<a class="anchor" name="geography"></a>
				<h3 class="clickable" id="geography_header">Geography <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="geography_content">
					<ul>
						<li>
							Barnaby Bear (ages 4-11), such as <a href="http://www.bbc.co.uk/schools/barnabybear/games/map.shtml">
							Map Symbols</a> (Requires Flash).
						</li>
						<li>
							Online Geography (Ireland, Europe) from <a href="http://edware.ie/graphics/Ireland_Jigsaw_Free.html">Edware</a> (Requires Flash) 
							(iOS App available to purchase from iTunes)
						</li>
						<li>
							<a href="http://www.learninghorizons.ie/component/content/article/110-play-sese-interavtive-now">Ireland Bays and Counties</a> ...sample from SESE Interactive (thank you, Kevin, RIP)</li>
						<li>
							<a href="http://maps.google.com">Google Maps</a> (via Browser or via Apps on iPad and Android)</li>
						<li>
							<a href="http://maps.scoilnet.ie">Maps from Scoilnet</a> (via Schools Broadband) Mobile Devices are given option to install ArcGIS app 
							(from iTunes or GooglePlay), otherwise proceed via web. OSI access to School or Registered Users, but 'general users' can access, e.g., 
							heritage map.
						</li>
						<li>
							View statistical maps of Ireland with <a href="http://www.airo.ie/browse-theme">airo.ie: Browse by Theme</a> (Education etc.)
						</li>
						<li>
							<a href="http://www.geography.ie">Peter Lydon's Wordpress Blog</a> has lots of links and resources.
						</li>
						<li>
							Geography Support Service from <a href="http://www.scoilnet.ie/geography/">scoilnet</a>
						</li>
						<li>
							<a href="http://geography.uoregon.edu/envchange/clim_animations/">Climate Animations</a>. Animations are provided in Flash and .gif formats 
							(the former provides navigation buttons)
						</li>
						<li>
							Demographic statistics, among others, from <a href="http://www.gapminder.org/downloads/">GapMinder</a> For PC and Mac; some presentations are
							Flash, others PPT</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('geography');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--History-->
			<p>	
				<a class="anchor" name="history"></a>
				<h3 class="clickable" id="history_header">History <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="history_content">
					<ul>
						<li>
							National Library's Collection of <a href="http://www.nli.ie/digital-photographs.aspx">Digital Photos</a>
						</li>
						<li>
							Create Timelines (free registration) at <a href="http:// www.timetoast.com">Timetoast</a> (Requires Flash)
						</li>
						<li>
							History Support Service from <a href="http://www.scoilnet.ie/hist/">scoilnet</a>
						</li>
						<li>
							<a href="http://www.askaboutireland.ie/reading-room/digital-book-collection/">An Chomhairle Leabharlanna</a> 
							has lots of Primary Sources (the eBooks are PDF format of many texts written in the 1800s) ... also valuable for Geography
							...some of these are large 40Mb files. The 'Talking eBook' section provides streaming .swf (OpusFlex package), 
							.pdf and streaming .mp3 (streaming formats not on iOS)
						</li>
						<li>
							Donal O'Mahony's <a href="http://historypcs.edublogs.org/">"Second-Year History Blogs'</a> Lovely site, works well 
							on all platforms
						</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('history');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--Home Economcs-->
			<p>
				<a class="anchor" name="homeec"></a>
				<h3 class="clickable" id="homeec_header">Home Economics <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="homeec_content">
					<ul>
						<li>
							<a href="http://www.athe-ireland.com/">Association of Teachers of Home Economics</a>
						</li>
						<li>
							TeachNet resources e.g. <a href="http://www.teachnet.ie/portfolio-category/senior-cycle/home-economics-senior-cycle/">
							Home Economics, senior cycle</a>
						</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('homeec');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--Latin, Greek, Classical Studies-->
			<p>
				<a class="anchor" name="latin"></a>
				<h3 class="clickable" id="latin_header">Latin, Greek, Classical Studies <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="latin_content">
					<ul>
						<li>
							<a href="http://www.caiteachers.com/">The Classical Teachers' Association</a> have resources - in Word, PDF, PowerPoint formats. 
							Their Latin and Classical sections are well served. There is an extensive Image Gallery also. For some video clips 
							(e.g. Homer's Odyssey - Quicktime in YouTube), you will be invited to use the appropriate App on Android, while iOS will 
							continue to the website
						</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('latin');">[Hide]</span> <a href="#top">[Back to Top]</a>
				</div>
			</p>

			<!--Maths-->
			<p>
				<a class="anchor" name="maths"></a>
				<h3 class="clickable" id="maths_header">Maths <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="maths_content">
					<ul>
						<li>
							<a href="http://www.ilearn.ie/playground-mata-ar-line">iLearn Online Samples</a> ...as Gaeilge, such as 
							<a href="http://www.ilearn.ie/playground-mata-ar-line-demo-2">this demo</a> (Requires Flash)
						</li>
						<li>
							<a href="http://www.priorywoods.middlesbrough.sch.uk/page_viewer.asp?page=Free%20Program%20Resources&pid=161">
							A number of maths (and other) activities</a> (look for the 'Play Online' icon) are shared by the former ICT Teacher at Priorywoods 
							(Requires Flash)
						</li>
						<li>
							<a href="http://www.mathsframe.co.uk/free_resources.asp">Maths Frame:</a>
							Online Flash activities (Number Line, Multiplication etc.) suitable for IWB
						</li>
						<li>
							<a href="http://www.mathsframe.co.uk/free_resources.asp">Shape Recognition, and other Activities</a> 
							(from Digital Learning for Wales) ...follow the path, e.g., Resources\KeyStage2\Mathematics. Some require Flash.
						</li>
						<li>
							<a href="http://www.bbc.co.uk/schools/ks1bitesize/numeracy/ordering/index.shtml">Number Ordering</a> (Flash and Worksheet) from BBC Bitesize
						</li>
						<li>
							BBC has some lovely <a href="http://www.bbc.co.uk/schools/numbertime/games/index.shtml">number games</a> 
							(including Snakes and Ladders). Requires Macromedia Shockwave Player, only available on Win and Mac</li>
						<li>
							<a href="http://www.arcademicskillbuilders.com">Online Racing Games</a> - based on Arithmetic(Requires Flash),
							and there is also an iOS App. Games can be Public or Private (you set a Password).
						</li>
						<li>
							<a href="http://www.math-exercises-for-kids.com">Math Exercises For Kids</a> (note US abbreviation). Uses Javascript, 
							runs on both iOS and Android ICS
						</li>
						<li>
							Gaming Approach! <a href="http://multiplication.com/interactive_games.htm">Multiplication.com</a> (Requires Flash)
						</li>
						<li>
							Politically incorrect Addition game at <a href="http://fun4thebrain.com/addition/addgranny.html">Granny Prix</a> (Requires Flash)</li>
						<li>
							<a href="http://nces.ed.gov/nceskids/createagraph/default.aspx">Create a Graph</a> - Online - Bar, Pie etc. 
							(then Print or Capture the PDF, Requires Flash)
						</li>
						<li>
							Interactive Teaching Programmes - ITPs (UK)
							<a href="http://webarchive.nationalarchives.gov.uk/20110809101133/">[link dead]</a>
							<a href="http:/www.nsonline.org.uk/search/primary/results/nav:49909">[link dead]</a> 
							(Requires Flash)</li>
						<li>
							<a href="http://ie.ixl.com/math/">IXL</a> is now mapped to the Irish Curriculum. Use the Sample materials
						</li>
						<li>
							A huge collection of links from <a href="http://www.woodlands-junior.kent.sch.uk/maths/index.html">Woodland School</a>. 
							Many links are already on this ICT4Schools site, many use Flash
						</li>
						<li>
							Practise your Tables at <a href="http://www.teachingtables.co.uk/">Teaching Tables</a> 
							(the activities carry an 'Evaluation' watermark ...but a school could purchase instead). Most use Flash, but there is an 
							iOS App available for some
						</li>
						<li>
							<a href="http://www.sumdog.com/">Sumdog</a> Play games to practise your sums 'as a Guest' or via free registration. 
							A school can also take out a subscription. e.g. Fish (you can use the Arrow Keys or Drag the Picture to change visual theme of the 
							Multiplication game). Online games require Flash, but there is also an iOS app
						</li>
						<li>
							<a href="http://www.weandus.ie/maths.html">WeAndUs</a> has lots of PDF Resources and One(? at top of page) Interactive.(Requires Flash).
						</li>
						<li>
							351 (at the last count) activities from <a href="http://nrich.maths.org/public/leg.php?group_id=37&code=5039#results">NRich</a>. (Requires Flash)
						</li>
						<li>
							Dozens of activities from <a href="http://www.shodor.org/interactivate/activities/">Shodor</a> Uses Java (not on your Mobile Device)
						</li>
						<li>
							Misunderstanding of 'place value': Ma and Pa Kettle's '25/5 = 14' is now Copyright-Blocked on YouTube. 
							Watch <a href="http://www.youtube.com/watch?v=xkbQDEXJy2k">'7x13=28'</a> or this quick version ...things get worse in
							<a href="http://www.youtube.com/watch?v=f7pMYHn-1yA&feature=related">Abbott & Costello's: "Two Tens for a Five"</a>
							(note that YouTube may be blocked in schools so you have to find alternative access). With these YouTube clips, you will be invited 
							to use the appropriate App on Android, while iOS will continue to the website
						</li>
						<li>
							<a href="http://gofree.indigo.ie/~hallinan/">Neil Hallinan's Maths site</a> (especially his GeoGebra section)
						</li>
						<li>
							<a href="http://www.loretothegreen.scoilnet.ie/GreenMaths/">David Hobson's 'GreenMaths' site</a> (also has very good use of GeoGebra)
						</li>
						<li>
							Tom Kendall 'recommends' some lovely resources on <a href="http://tkendall.edublogs.org/">his blog</a>
						</li>
						<li>
							My <a href="http://www.flashcardmachine.com/machine/?read_only=181407&p=z1s1">'Revision Flashcards'</a> (with some 
							deliberate errors!) for Leaving Cert Higher (old syllabus!) As well as Mobile Web access, there is also an App for 
							iOS and Android
						</li>
						<li>
							<a href="http://www.waldomaths.com/index1116.jsp">'Waldo Maths'</a> has a very visual collection of 'applets'. 
							Uses Java (not on your Mobile Device)
						</li>
						<li>
							'M Aitchison' (a teacher in Scotland) has <a href="http://htends2zero.wordpress.com/downloads/">shared spreadsheets, powerpoints and links</a>
						</li>
						<li>
							My favourite <a href="http://nlvm.usu.edu/EN/NAV/frames_asid_324_g_4_t_2.html">Manipulative for Linear Equations</a> 
							- using Weights and Balloons. Uses Java (not on your Mobile Device)
						</li>
						<li>
							Another <a href="http://www.heymath.com/main/samples/us18/teacherstemplate.html">'Equation Balance'</a> (Requires Flash)
						</li>
						<li>
							<a href="http://www.mathopenref.com/graphfunctions.html">General Function (including Sin) Grapher</a> (Requires Flash)
						</li>
						<li>
							<a href="http://www.stclarescomprehensive.ie/PDF/Formulae%20&%20Tables.pdf">Maths Formulae Tables</a>
						</li>
						<li>
							<a href="http://phet.colorado.edu/en/simulations/category/math">PhET Simulations</a> (such as Binomial Distribution - 
							virtual Binostat, Grapher) (Requires Flash)
						</li>
						<li>
							<a href="http://www.imta.ie/">Maths Teachers' Association</a> ...with some of the wonderful Newsletters (PDF)
						</li>
						<li>
							<a href="http://www.bbc.co.uk/schools/websites/11_16/site/maths.shtml">BBC General Maths resources/activities</a> (Requires Flash)
						</li>
						<li>
							For a series of Video Tutorials, visit the webpage of <a href="http://www.steps.ie/maths/maths-video.aspx">Engineers Ireland</a> 
							....and some nice PDF Resources also.
						</li>
						<li>
							<a href="http://www.projectmaths.ie">Project Maths</a> ...lots of resources - powerpoints, spreadsheets, documents, flash 
							...made by teachers ...and lots of GeoGebras on the Student CD
						</li>
						<li>
							S1: <a href="http://www.bbc.co.uk/education/mathsfile/shockwave/games/datapick.html">Game regarding Tallies and Charts</a>
							Requires Macromedia Shockwave Player, only available on Win and Mac
						</li>
						<li>
							S1: <a hfef="www.youtube.com/v/ZPhozQJUcSs">Watch</a> the students in Ratoath College showing how to Tally (on YouTube, press 'open' and hit Enter again!)
							(Requires Flash)
						</li>
						<li>
							S1: <a href="http://www.bgfl.org/bgfl/custom/resources_ftp/client_ftp/ks1/maths/dice/">Customise and Roll a die (from 6 to 12 sides)</a> (Requires Flash)</li>
						<li>
							S1: <a href="http://www.bbc.co.uk/skillswise/maths/games?page=2">Choose the 'Handling Data' Game from BBC</a> (Requires Flash)
						</li>
						<li>
							S1: <a href="http://www.jfitz.com/cards/">Download Playing Card images</a>
						</li>
						<li>
							S2: <a href="http://www.mathplayground.com/ShapeMods/ShapeMods.html">Transformations - Choose the Transformation(s)</a> (Requires Flash)
						</li>
						<li>
							S2:  <a href="http://www.mathplayground.com/locate_aliens.html">Co-ordinate Geometry - 'Find the Aliens' game</a> (Requires Flash)
						</li>
						<li>
							S2: <a href="http://www.mathopenref.com/constructions.html">Useful animations for a number of Constructions</a> 
						</li>
						<li>
							<a href="http://www.livescribe.com/cgi-bin/WebObjects/LDApp.woa/wa/MLSOverviewPage?sid=LRctLmj0rckh">'LiveScribe' Pencasts</a> ...such as OL 2008 P2 Q (Requires Flash)</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('maths');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--Materials Technology-->
			<p>
				<a class="anchor" name="wood"></a>
				<h3 class="clickable" id="wood_header">Materials Technology - Wood, Metalwork, Technology <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="wood_content">
					<ul>
						<li>
							<a href="http://www.ncte.ie/att/">The Association of Technology Teachers</a> (although last entry seems to be 2008)
						</li>
						<li>
							<a href="http://www.etta.ie/">The Engineering Technology Teachers</a> ...lots of resources (pdfs, docs, ppts) in the 
							'Students' section; there may be more in the Members' Area
						</li>
						<li>
							<a href="http://www.t4.ie/">The Technology Subjects Support Service</a> ...this has resources (PDFs, TIFFimages, 
							PowerPoints) for each of the subject areas. Also, Teachers-Resource-Sharing-DCG has AVIs - these get Downloaded and 
							then need a Player App; or you are given the option to use one of your pre-installed Apps
						</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('wood');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--Music-->
			<p>
				<a class="anchor" name="music"></a>
				<h3 class="clickable" id="music_header">Music <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="music_content"> 
					<ul>
						<li>
							<a href="http://bussongs.com/">BusSongs</a> "has the largest collection of children's music on the Internet - with lyrics, 
							videos, and music for 2,100 kid's songs and nursery rhymes". Music, when provided, is in mp3 format and plays online. 
							Note that - on your iOS - you cannot 'Control+Click' (i.e. right-click) in order to set a Download location. With 
							your Android, you can long-click and choose 'Save link' in order to download
						</li>
						<li>
							<a href="http://dig.ccmixter.org/">dig.ccmixter</a> is devoted to helping you find that great music, all of which is 
							liberally licensed under a Creative Commons license so you already have permission to use this music in your video, 
							podcast, school project, personal music player, or where ever… (online or as per BusSongs to download)
						</li>
						<li>
							<a href="http://www.nyphilkids.org/main.phtml">NY Philharmonic Orchestra for Kids - Learn and Compose</a> (Requires Flash)
						</li>
						<li>
							<a href="http://ppmta.ie/">Music Teachers</a> had resources at (site under redevelopment) ...many were PDFs 
							(by the Curriculum Support Team) but there were <a href="http://www.ppmta.ie/Resources/ICT.html">ICT resource/links</a>
						</li>
						<li>
							There are lots of useful <a href="https://hwb.wales.gov.uk/Find%20it/Pages/Home.aspx">set of resources</a> from Wales 
							...you have to Navigate manually to Resources\KeyStage3\Music ....then Appraising, Composing or Performing. I tried the 
							Texture activity ...this would work very well on an IWB; many activities seem to require Flash.
						</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('music');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--Religion-->
			<p>
				<a class="anchor" name="religion"></a>
				<h3 class="clickable" id="religion_header">Religious Education <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="religion_content">
					<ul>
						<li>
							<a href="http://www.ress.ie/">The RESS</a> had support PDF and Audio materials at ...this site is now subsumed under 
							<a href="http://www.pdst.ie/jc/religiouseducation">PDST</a> which is 'under construction' at time of visit
						</li>
						<li>
							<a href="http://www.rtai.ie/?page_id=237">Religion Teachers</a> have some General Resources (PDFs and PPS) at 
							(there may be additional resources for Registered Users)
						</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('religion');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--Science-->
			<p>
				<a class="anchor" name="science"></a>
				<h3 class="clickable" id="science_header">Science <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="science_content">
					<ul>
						<li>
							Forfas <a href="http://www.primaryscience.ie/index.php">'Primary Science'</a> has lots of resources - PDFs, 
							weblinks, activities ...while Videos require Flash
						</li>
						<li>
							<a href="http://www.bbc.co.uk/schools/ks2bitesize/games/gut_instinct/science.shtml">BBC Bitesize</a> has multi-choice 
							quiz ...based on Science questions (Maths and English questions also available) (Requires Flash)
						</li>
						<li>
							<a href="http://www.scispy.ie">The Scoilnet/RTE site</a> adddresses the four strands of the primary science curriculum 
							(Living Things, Energy and Forces, Materials, Environmental
						</li>
						<li>
							<a href="http://www.learninghorizons.ie/component/content/article/110-play-sese-interavtive-now">Electricity and Law of Lever</a>
							...sample from SESE Interactive (Requires Flash)
						</li>
						<li>
							Answers to Everything! from <a href="http://www.newscientist.com/topic/lastword/">New Scientist magazine</a>
						</li>
						<li>
							<a href="http://scienceireland.ie/">Science Ireland</a> provides some useful tips and videos - use the Teachers Tab
						</li>
						<li>
							 <a href="http://www.yteach.ie/">YTeach</a> is a subscription site from Prim-Ed. It has hundreds of resources for 
							 Maths as well as Science (many are useful for whole-class teaching and/or interactive whiteboards)(Requires Flash)
						</li>
						<li>
							<a href="http://microbemagic.ucc.ie/">UCC's Microbe Magic</a> Informative and Engaging. 'Games' require Flash
						</li>
						<li>
							<a href="http://experiland.com">Experiland</a> is U.S. based. If offers complete Science Texts in .pdf ebook format to subscribers. 
							There is a <a href="http://experiland.com/html_books/free_sample.htm"> useful sample</a> ...with experiments related to 'Magic Ink', 
							making a Sundial, a 'rain alarm', an insect trap and an experiment related to air pressure.
						</li>
						<li>
							<a href="http://www.ista.ie/">Irish Science Teachers' Association</a> (access to editions of Science Journal PDFs)
						</li>
						<li>
							<a href="http://phet.colorado.edu/simulations/">PhET Simulations</a> Most use Java (not on your Mobile Device) such as 
							Circuit Construction  ...some now are <a href="http://phet.colorado.edu/en/simulations/category/html">recreated for html5</a>. 
							Some are translated into Gaeilge
						</li>
						<li>
							Noel Cunningham has put together a <a href="http://www.thephysicsteacher.ie">great collection</a> of Links (including YouTubes), 
							Documents and Podcasts for Junior and Leaving Cert Science (it also has some scary photos!)
						</li>
						<li>
							Mr Garvey in Loreto, Balbriggan has a great <a href="http://www.loretobalbriggan.ie/physics/index.htm">collection of resources</a>
						</li>
						<li>
							Chemistry - <a href="http://www.chemcollective.org/vlab/vlab.php">Virtual Lab Simulator</a> (web page, but download available).
							Uses Java (not on your Mobile Device)
						</li>
						<li>
							Online Circuit Builders:
							<ul>
								<li>
									<a href="http://www.echalk.co.uk/Science/physics/circuitBuilder/circuitBuilder.html">Circuit Builder</a> (Requires Flash)
								</li>
								<li>
									<a href="https://www.circuitlab.com/editor/">Circuit Lab</a> (Elements did not Drag on Android but were okay on iOS)
								</li>
							</ul>					
						</li>
						
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('science');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--Typewriting-->
			<p>	
				<a class="anchor" name="type"></a>
				<h3 class="clickable" id="type_header">Typewriting <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="type_content">
					You might want to connect your Bluetooth or USB Keyboard to your Mobile Device for this!
					<ul>
						<li>
							Typewriting is an official subject on the Junior Cert list. <a href="http://www.curriculumonline.ie/Junior-cycle/Junior-Cycle-Subjects/Typewriting">
							View the syllabus</a>.
						</li>
						<li>
							<a href="http://games.sense-lang.org/">Online Typing Games</a> (Requires Flash) (but you are invited to get the App on iTunes)
						</li>
						<li>
							<a href="http://www.cs.cmu.edu/~rvirga/TypingTutor.html">Typing Tutor</a> is an arcade-type game where the student has 
							to type the letters that fall down the screen. Uses Java (not on your Mobile Device)
						</li>
						<li>
							A whole host of typing links (freeware and shareware) can be found <a href="http://typingsoft.com/all_typing_tutors.htm">
							here</a> with new online ones highlighted. I liked the online one at <a href="http://www.typingarena.com/">Typing Arena</a></li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('type');">Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--Interactive Whiteboards-->
			<p>
				<a class="anchor" name="intwhite"></a>
				<h3 class="clickable" id="intwhite_header">Interactive Whiteboards <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="intwhite_content">
					<ul>
						<li>
							<a href="http://www.cbiproject.net">Drumcondra Project</a> ...Ireland's top site for all IWB resources (well, I would say that, 
							wouldn't I?!)
						</li>
					</ul>
					Online collaborative (whiteboard) workspace:
					<ul>
						<li>
							<a href="http://www.board800.com/draw">Board800</a>, it can also be bought and installed on your own server; has text, 
							pens, shapes etc.). (Requires Flash)
						</li>
						<li>
							<a href="http://www.twiddla.com">Twiddla</a> has useful Maths (includes LaTex Editor)
						</li>
						<li>
							<a href="http://www.scriblink.com/">Scribbl</a> has pens etc. ...looks good. Uses Java (not on your Mobile Device)
						</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('intwhite');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--Inter-School Collaborations-->
			<p>
				<a class="anchor" name="collab"></a>
				<h3 class="clickable" id="collab_header">Inter-School Collaborations <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="collab_content">
					<ul>
						<li>
							<a href="http://www.etwinning.net/en/pub/index.htm">eTwinning</a> offers a tried-and-tested vehicle for international communication 
						</li>
						<li>
							<a href="http://www.dissolvingboundaries.org/">Dissolving Boundaries</a>
							Cross-cultural educational linkages between schools in the North and Republic of Ireland
						</li>
						<li>
							<a href="http://www.ning.com/">Ning</a>: Purchase and create your own social network. I think you purchase a custom App 
							(either platform) from <a href="http://www.shoutem.com/ning">here</a>
						</li>
						<li>
							Check out the <a href="http://www.aec.asef.org/">Asia-Europe Classroom</a> ...it references the Irish-partner project 
							<a href="http://www.aec.asef.org/resources/sinikka.html">WHAZZUP?</a> and <a href="http://www.kaarina24.fi/lukio/mm/index.html">
							Mastering Media</a>.
						</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('collab');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--Teacher Resources and Utilities-->
			<p>
				<a class="anchor" name="resource"></a>
				<h3 class="clickable" id="resource_header">Teacher Resources and Utilities <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="resource_content">
					<ul>
						<li>
							 <a href="http://www.cesi.ie">CESI</a>, the premier peer-support site for Ireland's education professionals
						</li>
						<li>
							Supported by the INTO, <a href="http://groups.yahoo.com/group/dictat/messages/">DICTAT Mailings</a> ...em, can't locate it now!?
						</li>
						<li>
							<a href="http://www.teachnet.ie">TeachNet</a> is a multi-partner project aimed at supporting Teacher CPD.
						</li>
						<li>
							<a href="http://www.scoilnet.ie">Scoilnet</a> is the Dept. of Education's official portal for Primary and Post-Primary Schools
						</li>
						<li>
							<a href="http://www.primaryresources.co.uk/">PrimaryResources</a> hosts a range of file types (Docs, Ppts, IWB etc.)</li>
						<li>
							<a href="http://www.topmarks.co.uk">TopMarks</a> is a Portal, but also hosts its own resources  ...many are for IWB and 
							may need Flash
						</li>
						<li>
							<a href="http://www.teachertube.com/">Teacher Tube</a> Video Clips for classroom and/or Teacher (also has podcasts). 
							I had to Exit (Top Right) the covering advert in order to see the clip.
						</li>
						<li>
							ClipArt Collections: see <a href="http://www.cbiproject.net/clipart.html">my page</a> on the Drumcondra IWB site</li>
						<li>
							Scoilnet's <a href="http://www.imagebank.ie/">Imagebank</a>
						</li>
						<li>
							<a href="http://www.surveymonkey.com/Home_Pricing2.aspx">Survey Monkey</a>
							Create and Analyse your own Surveys - many of which are free
						</li>
						<li>
							<a href="http://classtools.net/">Class Tools</a>: Access up to 17 different tools (such as the 'Random Name Picker') 
							for the classroom. Originally required Flash, some formats are now also available for iOS
						</li>
						<li>
							<a href="http://www.puzzle-maker.com/WS/index.htm">Wordsearch Maker (online</a></li>
						<li>
							<a href="http://www.crosswordpuzzlegames.com/create.html">Crossword Maker (online)</a>. The crosswords can then be Printed 
							(hardcopy or, depending on your computer, to PDF etc.). Watch out for Advertising!
						</li>
						<li>
							<a href="http://resources.oswego.org/games/">Use Owego's page</a> to make your own (matching, dragging, multi-choice) Games 
							...these games are then stored online at the oswego site ...so make sure you write down the names of the files and/or save in 
							Favourites/Bookmarks. Oswego City School District is in New York, by the way! (Requires Flash)
						</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('resource');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--Online Brain-Storming / Concept-Mapping-->
			<p>
				<a class="anchor" name="brain"></a>
				<h3 class="clickable" id="brain_header">Online Brain-Storming / Concept-Mapping <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="brain_content">
					<ul>
						<li>
							<a href="http://bubbl.us/">Bubbl.us</a> (Requires Flash) to create on the Desktop Computer; Mobile App can view existing
							</li>
						<li>
							<a href="http://mind42.com/">Mind42</a> works on all (although Chrome gives you the option to 'translate page')
						</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('brain');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--Reference Material-->
			<p>
				<a class="anchor" name="ref"></a>
				<h3 class="clickable" id="ref_header">Reference Material <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="ref_content">
					<ul>
						<li>
							<a href="http://en.wikipedia.org/wiki/Main_Page">Wikipedia</a> 
						</li>
						<li>
							on Schools Broadband, Britannica Online ...the latter is linked to from <a href="http://www.scoilnet.ie/">scoilnet</a></li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('ref');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--Textbooks-->
			<p>
				<a class="anchor" name="textbook"></a>
				<h3 class="clickable" id="textbook_header">Textbooks <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="textbook_content">
					<ul>
						<li>
							<a href="http://www.folensonline.ie/">Folens</a>. Some <a href="https://www.folens.ie/primary-teachers/resources">PDF Resources</a>
							and <a href="https://www.folens.ie/post-primary-teachers/resources">PDFs and Audio</a> (some 'zipped'). eBooks Apps available 
							for the three mobile platforms.
						</li>
						<li>
							<a href="http://www.cjfallon.ie/">CJ Fallon</a>. eBooks available via <a href="http://my.cjfallon.ie/login">login</a> 
							...registration needed. eBooks available 'through the cloud' in partnership with Microsoft.
						</li>
						<li>
							<a href="http://www.edcodigital.ie/books/">Edco</a> has Online Sample Chapters available - these require Flash. eBooks 
							Apps available for the three mobile platforms. Visit their <a href="http://todaysworld2.edco.ie/">Exam Centre</a> for online testing 
							(Junior and Leaving Cert)
						</li>
						<li>
							<a href="http://www.gillmacmillan.ie/education">Gill and MacMillan</a> - Cannot yet test as registration needed. G&M are also behind 
							the sites <a href="http://www.phonics.ie/">Sounds Good Phonics</a>; 
							<a href="http://www.fireworksenglish.ie/">Fireworks</a>; <a href="http://www.crackingmaths.ie/">Cracking Maths</a> 
							which has eBook Samples to download for Win, Mac, iOS and Android; 2nd Level Teachers can Make - and Pupils can Take - 
							<a href="http://www.etest.ie/">online tests</a>
						</li>
						<li>
							<a href="http://www.mentorbooks.ie/ebooks.aspx">Mentor</a> Cannot yet test as registration needed. Available for Win, iOS 
							and Android. Some Student Resources free to download...e.g. with Audio
						</li>
						<li>
							Celtic Press: Text&Tests available via Edco (above) e.g. <a href="http://www.edcodigital.ie/sample-edcodigital-viewer/?bookid=S-AMA9011S">this example</a> 
							...(Requires Flash) (server problem at time of access?) ...and some Sample Chapters available via their 
							<a href="http://www.celticpress.ie/teacher-resources-catalogue.html">own site</a> (pdf, ppt and GeoGebra applets)
						</li>
						<li>
							<a href="http://www.prim-ed.com/webshop/category/eBooks">Prim-Ed</a> ...<a href="http://www.prim-ed.com/webshop/downloads">Sample materials</a> 
							(stored in Google Docs)
						</li>
						<li>
							<a href="http://www.veritasbooksonline.com/">Veritas</a> have a range of eBooks, with some sample pdfs for BeoGoDeo ...or read about their 
							<a href="http://www.faithconnect.ie/">online programme</a>
						</li>
						<li>
							<a href="https://www.educate.ie/">Educate.ie</a>: The <a href="https://www.educate.ie/teachers">Teachers Tab</a> will give you access to some Downloads 
							(pdf and mp3) while their main resource features are found via <a href="https://educateplus.ie/">EducatePlus.ie</a> 
							which has some sample videos such as <a href="https://educateplus.ie/sites/default/files/resources/Activity%208A_FIXED%202.mp4">this</a>
							...with many more for Registered Users.</li>
					</ul>
					<p>
						There may be other 'educational publishers' whom I have accidentally omitted: if so, please let me know
					</p>
					<span class="clickable hideSection" onclick="HideSelection('textbook');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<!--Games-->
			<p>
				<a class="anchor" name="games"></a>
				<h3 class="clickable" id="games_header">Games for Students (not for the Staff Room!) <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="games_content">
					<ul>
						<li>
							<a href="http://askaboutireland.ie/learning-zone/secondary-students/games-3d-tours/an-tain-bo-cuailnge-game/index.xml">An Chomhairle Leabharlanna's</a>
							Role Playing with Fionn, Maeve, Ferdia etc. (Requires Flash)
						</li>
						<li>
							<a href="http://www.funbrain.com/">Fun Brain</a>: Lots of educational games to choose from (Requires Flash)
						</li>
						<li>
							Lots more at <a href="http://pbskids.org/games/">PBS Kids</a> (Requires Flash), but iOS Apps also available
						</li>
						<li>
							and at <a href="http://www.learninggamesforkids.com/">Learning Games for Kids</a> (Requires Flash)</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('games');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
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