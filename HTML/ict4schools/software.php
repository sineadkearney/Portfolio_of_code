<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ICT 4 Schools - Software</title>

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
	contents = ["horizons", "rainbow", "siopag", "fios", "edware", "knowIreland", "knowEurope", "knowUsa", "knowWorld", "knowMoney", "art", "business", "english", "gaeilge", "geography", "history", "homeec", "lang", "maths", "music", "science", "specneeds", "tools", "utilities"]
	contents.forEach(function(section) {
		$("#"+section+"_content").hide();
	});
	
	openSectionIfSearchResult()
	
jQuery("h3").click(function() { //every time I click on a h3 element, print the ID
		ToggleVisibility(this)
	});

});

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
		<div class="col-md-12">
			
			<div class="page-header">
				<h1>Software</h1>
				<hr>
			</div>
 
			<p class="lead">
				Information regarding software (mostly Windows-based) produced in Ireland, as well as - further down the page -
				subject-by-subject information regarding Freeware for Win/Mac/Lin Desktop Computers
			</p>

			<p>
				Here are some software titles produced in Ireland for Irish Classrooms. I receive no commission for these links! 
				This listing is provided as a point of convenience for you, and to show that there is an Irish Education Software Sector. 
				There may be other Titles and Suppliers whom I have accidentally omitted! Descriptions of the Titles are those provided on 
				the relevant websites. I assume all Titles and Resellers are the 'genuine article'! Note that I reference the alternative 'App' 
				approach (well, the 'android' side of it!) on my other site <a href="android.ict4schools.ie">android.ict4schools.ie</a>
			</p>

<!--TEMPLATE, note that ID must be unique:
	<p>
	<h3 class="clickable" id="ID_header"> ...title... <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
	<div class="expandSection" id="ID_content">

		...content...

		<span class="clickable hideSection" onclick="HideSelection('ID');">[Hide]</span> <a href="#top">[Back to Top]</a>
	</div>
	</p>
	-->
			<p>
			<h3 class="clickable" id="horizons_header">Learning Horizons <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
			<div class="expandSection" id="horizons_content">
				</p>
				At <a href="http://learninghorizons.ie/">Learning Horizons</a> I located the following titles
				<p>
				<ul>
					<li>
						<a href="http://learninghorizons.ie/index.php?page=shop.product_details&flypage=flypage.tpl&product_id=1642&category_id=167&option=com_virtuemart&Itemid=194&vmcchk=1&Itemid=194">SESE Interactive, €195</a>:
						Award-winning designer uses proven formula to make it easy and exciting to combine the teaching of history, geography and science, so that 
						each complements the other perfectly. Here are just some of the many modules that SESE Interactive includes: Historical Stories: 9 interactive 
						stories from Ireland and the world with Irish pupils' artwork and original photos and complete with Irish voiceovers (even including some of 
						the historical stories "as Gaeilge"); Civilization Grids: investigate the Aztecs, Romans and other cultures; Geography Countdown: action packed 
						games, identifying counties, rivers etc. in the fastest possible time; Lifecycles: visually recreate each stage of the lifecycles of the butterfly, 
						salmon and frog.
					</li>
					<li>
						<a href="http://learninghorizons.ie/component/virtuemart/?page=shop.product_details&flypage=flypage.tpl&category_id=159&product_id=1639">Sounds to Words, €85</a>
						Designed and created for the Irish Curriculum by practising Newbridge primary teacher, Michael Murphy, Sounds to Words 1, 2 and 3 and 
						Sounds to Words Grammar evolved as a result of the work he was doing over a period of years in Patrician primary school with his own children.
						Michael has had over twenty years experience in providing professional development courses in IT in the Kildare area. 27,000 students in over 
						900 Irish schools already have access to Sounds to Words.   
					</li>
					<li>
						<a href="http://learninghorizons.ie/component/virtuemart/?page=shop.product_details&flypage=flypage.tpl&category_id=159&product_id=1125">The Spell Write Right Programme, €119.50</a>
						Produced in Association with Learning Horizons, Outside the Box Learning and the Dyslexia Association of Ireland. A powerful, games-based 
						programme to effortlessly teach students of all ages how to understand the differences between confusing pairs of words, particulary students 
						who have literacy difficulties or dyslexic tendancies. The Spell Write Right Programme will equip your students with clever methods, mental 
						strategies, essential skills, problem-solving techniques and an abundance of confidence to work out the differences between common, everyday, 
						confusing words.</li>
				
					</li>

				</ul>
			<span class="clickable hideSection" onclick="HideSelection('horizons');">[Hide]</span> <a href="#top">[Back to Top]</a>
			<hr>
			</div>
			</p>

			<p>
				<h3 class="clickable" id="rainbow_header">Rainbow Education <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="rainbow_content">

					<p>
					At <a href="http://www.rainboweducation.ie">Rainbow Education</a> I located the following titles
					</p>
					
					<ul>
						<li>
							<a href="http://www.rainboweducation.ie/index.php?route=product/product&path=48&product_id=1703">eGaeilge 1, €85</a>
							‘E-Gaeilge’ is a new interactive teaching resource that has been developed specifically to help teach the 10 Strand Units of 
							Gaeilge in the primary curriculum and uses the vocabulary range featured in all popular textbooks up to third / fourth class. 
							Everything about the software is designed to engage the pupil; instant response to input, over 400 high quality sound recordings, 
							a simple navigation system, reward games and many other features. Being conscious of the time available during class, only 5 minutes 
							of reward game activities are permitted before the pupil is returned to learning activities. The activities include: Multiple choice, 
							Word Recognition, Word Searches, Spelling, Matching and Listening etc. E-Gaeilge was produced as a result of consultation with practising 
							primary teachers and their concerns with the teaching of Irish.   
						</li>
						<li>
							<a href="http://www.rainboweducation.ie/index.php?route=product/product&path=48&product_id=1704">Reading Tracks 1</a>
							Essential for every learning support / resource teacher. Designed by 2 Irish LS Teachers and programmed in Cork by CDEG. It is 
							designed to support and track a child’s progress in the essential skills of reading development. Pupils log in under their names 
							and all progress across the 200 activities is tracked and saved for analysis by the teacher. If a child with a reading age of 7 
							successfully works through the 200 sets of learning activities in the reading tracks software, then reading age will be 11+ when 
							they emerge out the other side of the programme. Reading Tracks was planned and developed in close consultation with experienced 
							Irish Learning Support Teachers and will provide a full year’s work for individual pupils needing extra help in reading, spelling 
							and word recognition skills. The programme is not age specific. “I am confident that Reading Tracks would be a valuable resource 
							to any Special Needs, Resource Teacher or Language Teacher” – Matt Reville - Irish Learning Support Association  
						</li>
						<li>
							<a href="http://www.rainboweducation.ie/index.php?route=product/product&path=48&product_id=1702">The Vikings in Ireland, €19.95</a>
							The Vikings in Ireland is an interactive CD-ROM, written by well known tech-guru and Principal Robbie O’Leary – Sacred Heart S.N.S., 
							Tallaght. “The key to this software is in its simplicity. A teacher has a piece of software that can teach a full history unit on an 
							Interactive Whiteboard (or any computer)”- Simon Lewis – www.anseo.net. Robbie conceived, planned and devised this software program to 
							enhance the teaching and the learning of this fascinating period of Irish history. It offers schools an attractive, interactive resource 
							which can be used in a variety of ways. The program is divided into seven sections, each of which describes and explores a specific 
							dimension of the topic. Each section is illustrated with colourful photographs, original artwork and pop-up features. All areas contain 
							a set of varied quizzes, cloze tests and many activities which will allow users test their knowledge and understanding of the material 
							and if successful, to print out a customised certificate testifying to their achievement. The pupils will certainly enjoy discovering 
							the full interactive-story of the Vikings in Ireland.   
						</li>
					</ul>

					<span class="clickable hideSection" onclick="HideSelection('rainbow');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
				</p>
				
			<p>
				<h3 class="clickable" id="siopag_header">Siopa Gaeilge <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="siopag_content">

					<p>
					At <a href="https://www.siopagaeilge.ie/">Siopa Gaeilge</a> - I located the following (All are listed <a href="https://www.siopagaeilge.ie/Catal%F3gScoileanna2011.pdf">here</a>)
					</p>

					<ul>
						<li>
							<span class="sectionEntry">ABC Anois</span>. €19.99. ABC Anois CD-ROM covers the alphabet, numbers 1 – 10 and over 100 curriculum-based words. Children can use the 
							software independently or in groups led by parents or teacher. The printable worksheets and other resources reinforce learning in the 
							classroom environ-ment. CD-ROM allows you to choose your preferred dialect. Suitable for 4 – 7 year olds.
						</li>
						<li>
							<span class="sectionEntry">An Chéad Choiscéim</span>. First Steps in Irish. €20.00 . Interactive multimedia CD-ROM for Children, a fun-filled way to start learning Irish 
							with Oscar and Orla Octopus, 100 common nouns with cartoon illustrations, read in the three dialects. See them and hear them. Colours, 
							numbers and sentences. Games and animations. Aimed at children in early education.
						</li>
						<li>
							<span class="sectionEntry">Boghaisín na bhFocal</span>. €45.00. Using Boghaisín na bhFocal children can play away to their heart‘s content while learning to read Irish 
							the whole time. There are 2 CD‘s in the package. On the Children‘s CD, there are 9 games to play up to 6 levels, cards, noughts and 
							crosses, shopping and matching. The teacher‘s CD, has 7 games to print out including bingo, draughts and word search with games for 
							solitaire play, games
						</li>
						<li>
							<span class="sectionEntry">Cormac & Órla agus Fionn Mac Cumhaill</span>. €30.00. Interactive multimedia CD-ROM for Children, in English and in three dialects of Irish. 
							The basic story is a traditional one about Fionn Mac Cumhaill, chosen and arranged with the help of the Irish Folklore Dept at UCD. 
							Learn about Irish History, Archaeology and Nature. Aimed primarily at children in senior classes. for small groups and games for the 
							whole class.
						</li>
						<li>
							<span class="sectionEntry">Tíreolaíocht le Cormac & Órla</span>. €60.00. Cormac and Órla is a fun-filled way to learn about the geography of Ireland, based on the new 
							primary school curriculum for fifth and sixth classes / on the Program of Study for Geography at Key Stage 2. There is an extensive 
							atlas with a complete section on each county, as well as a section on the countries of Europe. Games, puzzles and quizzes based on the 
							entire content of the CD, with the highligh being Cormac and Órla‘s virtual tour of Ireland with 28 different trips and 141 stops.
						</li>
						<li>
							<span class="sectionEntry">Ruairí sa Zú</span>. €30.00. Children join Ruairí and his school friends on their trip to the zoo. Interactive multimedia CD-ROM; fun and 
							educational and is read in the three dialects. Games, Jigsaw Puzzles and Quizzes about the animals. Rang 3&4.
						</li>
						<li>
							<span class="sectionEntry">Drochlá Ruairí</span>. €30.00. Interactive multimedia CD-ROM; fun and educational and is read in the three dialects. Games, Colouring and Animations. 
							Rang 3&4.
						</li>		
						<li><span class="sectionEntry">Dora DVD‘s as Gaeilge</span>. €20.00</li>
						<li><span class="sectionEntry">Spongebob Squarepants DVD‘s as Gaeilge</span>. €20.00</li>
						<li><span class="sectionEntry">Doodlebops DVD‘s as Gaeilge</span>. €20.00</li>
						<li><span class="sectionEntry">Clifford</span>. DVD €12.00</li>
						
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('siopag');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
				</p>

			<p>
				<h3 class="clickable" id="fios_header">Fios Feasa <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></span></h3>
				<div class="expandSection" id="fios_content">

					<p>
						<a href="http://www.fiosfeasa.com/products.asp">Fios Feasa</a> have a lovely collection of titles 'as Gaeilge', such as
					<p>

					<ul>
						<li>
							<a href="http://www.fiosfeasa.com/product.asp?id=32">An Bíobla Naofa CD-Rom, €20.00</a>
							This is an electronic version of An Bíobla Naofa (“The Holy Bible”), as published by An Sagart. It includes the entire text, 
							along with the introductions and commentaries. It also includes the Letters of St. Patrick, as translated by Mons. Pádraig Ó 
							Fiannachta. There is a powerful facility to search the entire text for words or phrases. Illustrations from the Book of Kells 
							and other sources are included, as well as Gregorian Chant by Nóirín Ní Riain and the seminarians of Thurles College.    
						</li>
						<li>
							<a href="http://www.fiosfeasa.com/product.asp?id=42">Geography with Cormac and Órla, €60</a>
							This is a fun filled way to learn about the geography of Ireland, based on the new primary school curriculum for fifth and sixth 
							classes / on the Program of Study for Geography at Key Stage 2. There is an extensive atlas with a complete section on each county, 
							as well as a section on the countries of Europe. There are games, puzzles and quizzes based on the entire content of the CD. But the 
							highlight of the CD is a virtual tour throughout Ireland in the company of Cormac, Órla and Daideo. During these 28 different trips 
							with 141 stops all over the country, they meet local people and learn about the geography, history, economy, and culture of the places 
							they visit. Start your own journey of discovery today!    
						</li>
					</ul>
					<span class="clickable hideSection" onclick="HideSelection('fios');">[Hide]</span> <a href="#top">[Back to Top]</a>
					<hr>
				</div>
			</p>

			<p>
			<h3 class="clickable" id="edware_header">Edware.ie <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></h3>
			<div class="expandSection" id="edware_content">
				<p>
					<a href="http://www.edware.ie/">Edware.ie</a> - produces some fine-quality titles. ...Luke's advice is to buy from rainboweducation.ie 
					...he also suggested Edtech.ie but I could not see a listing there (however, I am sure you could contact this - another fine - company). 
					There is also a Download option on each of the relevant edware pages.

					<ul>
						<li>
							<a href="http://www.edware.ie/default.asp?content=article&section=3&cid=9">Know Your Ireland, €99.00 (site)</a>
							Know Your Ireland helps students of all ages to expand their knowledge of Irish geography. Know Your Ireland presents users with 
							detailed maps of Ireland which they interact with to complete quizzes, games and puzzles. Our software is developed in Ireland, 
							with Irish teachers to support the Primary School Curriculum. Currently Know Your Ireland is used in over 1,400 schools across Ireland 
							and is ideal to use in the classroom with your interactive whiteboard. ...Luke's advice is to buy from <a href="http://www.rainboweducation.ie">rainboweducation.ie</a>
							(he also suggested Edtech.ie but I could not see a listing there)
						</li>
						<li>
							<a href="http://www.edware.ie/default.asp?content=article&section=3&cid=52">Know Your Europe, €99.00 (site)</a>
							This introduces students to Europe. All the countries, capital cities, mountains, rivers, lakes and islands of Europe are covered, 
							including the fifteen new member states. All learning is backed up by printable worksheets and country fact files.   
							...from <a href="http://www.rainboweducation.ie">rainboweducation.ie</a>
						</li>
						<li>
							<a href="http://www.edware.ie/default.asp?content=article&section=3&cid=57">Know Your USA</a>
							This is our award winning software designed to help users expand their knowledge of the USA. Each geographic feature of the USA 
							is covered in detail including regions, states, state capitals, major cities, rivers, mountains, lakes and national parks.
						</li>
						<li>
							<a href="http://www.edware.ie/default.asp?content=article&section=3&cid=58">Know Your World, €99.00 (site)</a>
							The all-new Know Your World 2.0 was released in May 2012. We have added some amazing new games, quizzes, and puzzles to introduce 
							you to a whole new level of knowledge about the world. Know Your World is a continuation of our award winning software for teaching 
							geography. ...from <a href="http://www.rainboweducation.ie">rainboweducation.ie</a>   
						</li>
						<li>
							<a href="http://www.edware.ie/default.asp?content=article&section=3&cid=77">Know Your Money</a>
							Level 1 is designed to introduce young children to the concept of money. Developed with teachers to support the money strand of the 
							primary curriculum, it is perfect for using with children aged 3-7 and for Learning Support and Special Needs. This software features 
							an easy to use drag and drop coin system with random money questions and topics. Both a Euro and P=und version are available.    
						</li>
					</ul>
				</p>
				<span class="clickable hideSection" onclick="HideSelection('edware');">[Hide]</span> <a href="#top">[Back to Top]</a>
			</div>
			</p>

			<hr>
			<p>
				<h3>Freeware and Shareware</h3>
				<p>
					This list is provided to indicate a range of software that can be installed at no cost (usually this is limited to non‐commercial use).
					All downloads should be scanned with an up‐to‐date security virus checker prior to installation. I cannot take responsibility for issues that may arise nor for technical support. Note that you may need to be logged in as 'administrator' in order to do the installations.
					(F) indicates that the title is Freeware – which usually means that, for non‐commercial use, the file is free to use and share. Otherwise, the software may be free to download and use. You should check each title to see what its license conditions are. A variation on Freeware is Open Source – in this document the terms are used synonymously.
					I list titles for Primary (towards the top of each list) and for Post‐Primary schools.
					I have used most of the Titles myself. “Descriptions” are usually taken from the relevant website.
				</p>
			</p>

			<p>
			<a class="anchor" name="art"></a>
			<h3 class="clickable" id="art_header">Art/Graphics <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></h3>
			<div class="expandSection" id="art_content">

			<ul>
				<li>
					<a href="http://www.bluecowgames.com/farm-coloring-book.html">Leah’s Farm Paint and Play</a> a Colouring Book (also with Jigsaw).
					Leah's Farm Paint and Play gives your child free reign to color 23 farm pictures. Each farm animal/object such as cow, donkey, horse is 
					read aloud. Your child also will hear the name of each color whenever it's chosen. Coloring pages are saved to My Pictures, creating a 
					gallery of your child's masterpieces. There are also 10 farm jigsaw puzzles to solve. There are 6 piece and 12 piece puzzles. When a puzzle 
					is complete the farm animal/object is read aloud, and your child will hear the noise it makes too! Windows.
				</li>
				<li>
					<a href="http://gcompris.net/index-en.html">GCompris (F)</a> 
					is a high-quality educational software suite comprising of numerous activities for children aged 2 to 10. Some of the activities 
					are game orientated, but nonetheless still educational. Categories include: computer discovery: keyboard, mouse, different mouse gesture, 
					...arithmetic: table memory, enumeration, double-entry table, mirror image, ...science: the canal lock, the water cycle, the submarine, 
					electric simulation ...geography: place the country on the map; games: chess, memory, connect 4, oware, sudoku ...; reading: reading practice; 
					other: learn to tell time, puzzle of famous paintings, vector drawing, cartoon making. Currently GCompris offers in excess of 100 activities 
					and more are being developed. GCompris is free software that means that you can adapt it to your own needs, improve it and, most importantly, 
					share it with children everywhere. Windows, MacOS X and Linux
				</li>
				<li>
					<a href="http://tuxpaint.org/">TuxPaint</a>
					Open Source Drawing Software for Children. Tux Paint is a free, award-winning drawing program for children ages 3 to 12 (for example, 
					preschool and K-6). Tux Paint is used in schools around the world as a computer literacy drawing activity. It combines an easy-to-use interface, 
					fun sound effects, and an encouraging cartoon mascot who guides children as they use the program. Kids are presented with a blank canvas and a 
					variety of drawing tools to help them be creative. I like the Calligraphy Pen! Windows, MacOS X and Linux.
				</li>
				<li>
					<a href="http://www.getpaint.net/">Paint.Net (F?)</a>
					is free image and photo editing software for PCs that run Windows. It features an intuitive and innovative user interface with 
					support for layers, unlimited undo, special effects, and a wide variety of useful and powerful tools. An active and growing online community 
					provides friendly help, tutorials, and plugins. It started development as an undergraduate college senior design project mentored by Microsoft, 
					and is currently being maintained by some of the alumni that originally worked on it. Originally intended as a free replacement for the Microsoft 
					Paint software that comes with Windows, it has grown into a powerful yet simple image and photo editor tool. It has been compared to other digital 
					photo editing software packages such as Adobe® Photoshop®, Corel® Paint Shop Pro®, Microsoft Photo Editor, and The GIMP. Windows.
				</li>
				<li>
					<a href="http://www.artweaver.de/index.php?en_version">Artweaver (F)</a>
					Artweaver is a painting program with many tools and features like layers and effect filters. Artweaver is available in two versions: The 
					Free version as freeware and the Plus version with costs which has more features than the free version. Includes digital brushes e.g. chalk, 
					charcoal as well as Layers etc. In addition, ‘Artweaver Team’ allows you to work together on an image with your friends at the same time. 
					Simply connect with Artweaver Plus or Artweaver Free to the team over the internet and work together on an image simultaneously. Windows.
				</li>
				<li>
					<a href="http://picasa.google.com/">Picasa</a> – image editing from Google. 
					Picasa is software that helps you instantly find, edit and share all the pictures on your PC. Every time you open Picasa, it automatically 
					locates all your pictures (even ones you forgot you had) and sorts them into visual albums organized by date with folder names you will 
					recognize. You can drag and drop to arrange your albums and make labels to create new groups. Picasa makes sure your pictures are always 
					organized. Picasa also makes advanced editing simple by putting one-click fixes and powerful effects at your fingertips. And Picasa makes 
					it a snap to share your pictures, you can email, print photos home, make gift CDs, instantly share your images and albums, and even post 
					pictures on your own blog. Windows, MacOS X (and Linux sort of).
				</li>
				<li>
					<a href="http://imageresizer.codeplex.com/">Image Resizer (Microsoft Public License (Ms-PL))</a>
					Image Resizer for Windows is a utility that lets you resize one or more selected image files directly from Windows Explorer by right-clicking. 
					I created it so that modern Windows users could regain the joy they left behind with Microsoft's Image Resizer Powertoy for Windows XP. Windows.
				</li>
				<li>
					<a href="http://www.sketchup.com/">Google’s Sketchup</a> - Create, modify and share 3D models for free.
					For the Download, you have to specify that it’s for ‘Educational Use’ … Recommended for primary and secondary education; Free to use 
					for any educational purpose; Build and share 3D models; Find and download models from Sketchup's 3D Warehouse; Work offline when there's 
					no internet connection. Windows and MacOS X.
				</li>
				<li>
					<a href="http://www.inkscape.org/">Inkscape</a>
					is a professional vector graphics editor for Windows, Mac OS X and Linux. It's free and open source. I use it as a free 
					alternative to Interactive Whiteboard software because the features are similar. Windows, MacOS X and Linux.
				<li>
					<a href="https://wiki.gnome.org/Apps/Dia">Dia</a>
					is roughly inspired by the commercial Windows program 'Visio,' though more geared towards informal diagrams for casual use. 
					It can be used to draw many different kinds of diagrams. It currently has special objects to help draw entity relationship diagrams, 
					UML diagrams, flowcharts, network diagrams, and many other diagrams. It is also possible to add support for new shapes by writing simple 
					XML files, using a subset of SVG to draw the shape. Linux, MacOS X, and Windows.
				</li>
				<li>
					<a href="http://www.blender.org/">Blender</a>
					Blender is a free and open source 3D animation suite. It supports the entirety of the 3D pipeline—modeling, rigging, animation, simulation, 
					rendering, compositing and motion tracking, even video editing and game creation. Linux, MacOS X, and Windows.
				</li>
			</ul>
			</p>
			<span class="clickable hideSection" onclick="HideSelection('art');">[Hide]</span> <a href="#top">[Back to Top]</a>
			<hr>
			</div>

			<p>
			<a class="anchor" name="business"></a>
			<h3 class="clickable" id="business_header">Business <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></h3>
			<div class="expandSection" id="business_content">
				<p>
				Use spreadsheet and data analysis in OpenOffice, LibreOffice or Kingsoft Office (see below in Tools)
				</p>
				<span class="clickable hideSection" onclick="HideSelection('business');">[Hide]</span> <a href="#top">[Back to Top]</a>
				<hr>
			</div>
			</p>

			<p>
			<a class="anchor" name="english"></a>
			<h3 class="clickable" id="english_header">English <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></h3>
			<div class="expandSection" id="english_content">
			<ul>
				<li>
					<a href="http://www.priorywoods.middlesbrough.sch.uk/resources/programmes.htm">Make CVC words</a>
					This and other resources were created by their former ICT Teacher. Windows (‘other resources’ may be also available for Mac)
				</li>
				<li>
					<a href="http://gcompris.net/index-en.html">GCompris (F)</a>
					is a high-quality educational software suite comprising of numerous activities for children aged 2 to 10. Some of the activities 
					are game orientated, but nonetheless still educational. Categories include: …reading: reading practice;…Currently GCompris offers in 
					excess of 100 activities and more are being developed. GCompris is free software that means that you can adapt it to your own needs, 
					improve it and, most importantly, share it with children everywhere. Windows, MacOS X and Linux.		
				</li>
				<li>
					<a href="http://www.schoolhousetech.com/Vocabulary/">Vocabulary Worksheet Factory</a>
					Free - Get the Limited edition with 8 free vocabulary activities including Word Search. Students love word searches. Now, with this 
					FREE word search maker included in the Limited Edition of Vocabulary Worksheet Factory, you can add a little word search fun and 
					motivation to their regular lessons in any subject area. Quickly and easily create unlimited professional looking word search puzzles 
					to provide your students with the extra vocabulary and spelling practice they need in a format that they find enjoyable. Select from 
					a wide variety of configuration options for your word search puzzle that will make it suitable for students of any age. Then simply 
					print as many copies of the puzzle as you require, along with the automatic answer key, and watch your students dig in! Windows
				</li>
				<li>
					<a href="http://www.csfsoftware.co.uk/Letters_info.htm">The Letters Game (F)</a>
					This program was designed to be used in a classroom via a projector and hence works well in full screen mode but can be resized 
					(Suitable for resolutions of 800x600 upwards) . The game emulates the UK Chanel 4 Countdown (TV show) letters game whereby you can 
					choose 9 letters (vowels/consonants) to be used by the contestants to make the longest word within the time limit. The letters are 
					chosen from a pack of cards for vowels and consonants. The frequency distribution of the letters in the packs is given in the settings 
					panel and can be adjusted as required. Windows
				</li>
				<li>
					<a href="http://www.greyolltwit.com/connections2.html">Connections</a>
					Learn definitions with Grey Olltwit’s help. From an idea by Violet Cox. This program helps you to learn the right connections or 
					relationships between things. For example, take an apple. 'It grows on a tree', 'it is a fruit' and 'you can bake it in a pie'.
					These three are true relationships to the apple, whereas, 'it grows in the ground' and 'it is a vegetable', are not true relationships 
					to an apple. Some examples are included with the program and an edit/create facility allows you to make your own. <strong>N.B.</strong> You may wish to 
					‘Decline’ the offerings that lead to the Installation. Windows (Linux and Mac via Crossover)
				</li>
				<li>
					Fonts: Most schools use Comic Sans. A better alternative is Sassoon ...but this is a commercial font. 
					Use child-friendly Fonts, such as those from  <a href="http://desktoppub.about.com/od/freefonts/tp/Free_Handwriting_School_Fonts.htm"> this article</a>
					(I have used both Jarman and Jardotty) ...or try Grey Olltwit’s <a href="http://www.go-freeware.com/primary_school_font.html">free download</a>
				</li>
			</ul>
			<span class="clickable hideSection" onclick="HideSelection('english');">[Hide]</span> <a href="#top">[Back to Top]</a>
			<hr>
			</div>

			<a class="anchor" name="gaeilge"></a>
			<h3 class="clickable" id="gaeilge_header">Gaeilge <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></h3>
			<div class="expandSection" id="gaeilge_content">
			<ul>
				<li>
					<a href="http://www.byki.com/fls">BYKI</a>
					A ‘lite’ version of BYKI language software is available ...with free registration. The Byki Express Edition software is free, 
					along with up to a dozen Byki lists. Currently you can choose from any of 64 languages, and we're working on many more. If you wish, 
					you may download Byki lists in more than one language, or even all our languages. The Gaeilge sample set has ‘flashcards’ for Animals 
					and Greetings. <a href="http://www.byki.com/category/irish">Additional Lists</a> are created and shared (by the TL people themselves and by Users)
					...these can be run via the web or downloaded and run via the BYKI Express program. Windows and Mac
				</li>
				<li>
					From Microsoft: <a href="http://www.microsoft.com/ga-ie/download/details.aspx?id=20385">Cuireann "Pacáiste Comhéadan Gaeilge Office" -
					Microsoft Office Language Interface Pack 2007</a> - Gaeilge comhéadan úsáideora Gaeilge ar fáil d'iliomad ríomhchláir Microsoft Office 2007.
				</li>
				<li>
					From Microsoft:<a href="http://www.microsoft.com/ga-ie/download/details.aspx?id=17036"> Cuireann Pacáiste Comhéadan Teanga</a> (LIP) 
					Window 7 Comhéadan úsáideora atá logánaithe i bpáirt ar fáil de na limistéir is mó a mbaintear úsáid astu i Windows 7.
				</li>
				<li>
					<a href="http://www.gaeilge.ie/Usaid/Teicneolaiocht_na_Gaeilge.asp">Foras na Gaeilge</a>
					maintains a list of Irish Software Downloads ‘Teicneolaíocht na Gaeilge’ (with reference to Firefox, Linux, Gaelspell, AbiWord, Ceart, OpenOffice, 
					Eudora)
				</li>
				<li>
					Joomla is available <a href="http://www.ultansharkey.com/en/blog/46-joomla-irish-gaeilge-translation">‘as Gaeilge’</a> (GRMA Ultan)
				</li>
				<li>
					<a href="http://www.nascanna.com/nascannacom/Feidhmchlar.aspx?id=61">Irish Language Support for Ubuntu</a>, the Open Source Operating System.
				</li>
				<li>
					Fonts such as Seanchló Dubh available from, among others, <a href="http://www.gaelchlo.com/seangc.html">Gaelchlo</a>
				</li>
			</ul>
			<span class="clickable hideSection" onclick="HideSelection('gaeilge');">[Hide]</span> <a href="#top">[Back to Top]</a>
			<hr>
			</div>

			<a class="anchor" name="geography"></a>
			<h3 class="clickable" id="geography_header">Geography <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></h3>
			<div class="expandSection" id="geography_content">
			<ul>
				<li>
					<a href="http://gcompris.net/index-en.html">GCompris (F)</a>
					GCompris is a high-quality educational software suite comprising of numerous activities for children aged 2 to 10. Some of the activities 
					are game orientated, but nonetheless still educational. Categories include:...geography: place the country on the map. Currently GCompris 
					offers in excess of 100 activities and more are being developed. GCompris is free software that means that you can adapt it to your own needs, 
					improve it and, most importantly, share it with children everywhere. Windows, MacOS X and Linux
				</li>
				<li>
					<a href="http://www.google.com/intl/en_uk/earth/download/ge/agree.html">Google Earth for Desktop</a>.
					View satellite imagery, maps, terrain, 3D buildings, galaxies far away in space and the deepest depths of the ocean.
					Windows and Mac
				</li>
			</ul>
			<span class="clickable hideSection" onclick="HideSelection('geography');">Hide]</span> <a href="#top">[Back to Top]</a>
			<hr>
			</div>

			<a class="anchor" name="history"></a>
			<h3 class="clickable" id="history_header">History <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></h3>
			<div class="expandSection" id="history_content">
			<ul>
				<li>
					Historical Atlas <a href="http://www.historicalatlas.com/download.html">[download]</a>.
					The downloadable edition of the Centennia Historical Atlas is available at no charge. It covers the French Revolutionary and Napoleonic 
					Era from 1789 to 1819. The map data and text for the full period from 1000AD to the present are already present in the download file and may
					be opened at any time with an access code. Windows and Mac
				</li>
			</ul>
			<span class="clickable hideSection" onclick="HideSelection('history');">[Hide]</span> <a href="#top">[Back to Top]</a>
			<hr>
			</div>

			<a class="anchor" name="homeec"></a>
			<h3 class="clickable" id="homeec_header">Home Economics <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></h3>
			<div class="expandSection" id="homeec_content">
				<ul>	
					<li>
						<a href="http://www.smartdraw.com/downloads/">SmartDraw</a> can be used for many applications (Mind Mapping, Organisation Charts, 
						Flowcharts, Venn Diagrams etc.) and it can also be used for Floor Plans. See examples
						<a href="http://www.smartdraw.com/product/features/#/product/features/Adding-Doors-and-Windows">here</a>
						There is a ‘Free Download’ …I think this may be a Trial (with Watermarking of the output)
					</li>
					<li>
						<a href="http://www.ikea.com/ms/en_IE/rooms_ideas/splashplanners.html">Ikea</a> has planners but be careful with the ‘commercial’ 
						aspect. IKEA works via your Browser but asks to install a ‘Player’ from. Windows and Mac
					</li>
					<li>
						Cash and Carry Kitchens provide a 
						<a href="http://www.cashandcarrykitchens.ie/survey/userfiles/files/CCK%20Kitchen%20Planner%20FINAL%202012.pdf">PDF planning guide</a>
					</li>
					<li>
						There are some online solutions also, such as
						<a href="http://www.easyplanner3d.com/interior_design_software/3D_design.php">Easy Planner 3D</a>
					</li>
				</ul>
			<span class="clickable hideSection" onclick="HideSelection('homeec');">[Hide]</span> <a href="#top">[Back to Top]</a>
			<hr>
			</div>

			<a class="anchor" name="lang"></a>
			<h3 class="clickable" id="lang_header">Languages <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></h3>
			<div class="expandSection" id="lang_content">
				<ul>
					<li>
						<a href="http://www.wartoft.nu/software/selingua/">Selingua (F)</a>
						English, French, German, Swedish, Spanish activities by Marianne Wartoft (you can even use the in-built Dictionary Editor for Gaeilge; 
						also great for reinforcing specific vocabularies). Windows
					</li>
					<li>
						French, German, Italian, Spanish etc. …see entry for BYKI in the Gaeilge Section above. You need only install the Program once, 
						and then Import .b4u files for any of the Language sets
					</li>
				</ul>
			<span class="clickable hideSection" onclick="HideSelection('lang');">[Hide]</span> <a href="#top">[Back to Top]</a>
			<hr>
			</div>

			<a class="anchor" name="maths"></a>
			<h3 class="clickable" id="maths_header">Maths <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></h3>
			<div class="expandSection" id="maths_content">
			<ul>
				<li>
					<a href="http://www.csfsoftware.co.uk/Count_info.htm">The Numbers Game (F)</a>
					This program was designed to be used in a maths classroom via a projector and hence works in full screen mode. The game emulates the 
					UK Chanel 4 Countdown (TV show) numbers game whereby you can choose 6 numbers to be used by the contestants to make the number that is 
					randomly generated by the program. The 6 numbers to be chosen can be any six from 2 lots of 1 to 10 numbers and the 4 numbers 25, 50, 75 & 100. 
					Each number can only be used once in your answer. The default setting for the timer is 30 seconds as in the TV show however you can adjust 
					this according to your contestant’s ability. Installs to CThe Program will even show you all of the correct ways the problem can be solved. Windows
				</li>
				<li>
					<a href="http://www.csfsoftware.co.uk/Matchstick_info.htm">Matchstick Mania (F)</a>
					Matchstick Mania is a piece of software to play and design your own Matchstick Puzzles. The software runs full screen at all resolutions 
					although larger matchstick puzzles will be difficult to see on screen resolutions of 600 x 800. There are currently 24 puzzles to choose 
					from however you can add your own and even delete any of the 24 current ones if you don't like them! The idea is to select a puzzle and then 
					move the matches around as described to try and solve the puzzle. Windows.
				</li>
				<li>
					<a href="http://www.csfsoftware.co.uk/Sudoku/Sudoku.htm">Sudoku (F)</a>
					Numbers can be entered directly or by right clicking on any cell and selecting from the available popup menu numbers. Numbers entered are 
					in a different colour to the main puzzle text. Right-clicking presents the ‘only available options’. Start the activity via menu Sudoku 
					…Create New …Level Windows
				</li>
				<li>
					<a href="http://www.softronix.com/logo.html">MSWLogo</a>
					From 2002 but still runs under Windows 7 ...great for mathematical logic and properties Sums! Worksheets (and more). Windows
				</li>
				<li>
					<a href="http://www.schoolhousetech.com/math/">Math Resource Studio 5</a>
					Fast and easy math [printed] worksheets. Provide students with the precise skills development and math practice they need as part of 
					a differentiated numeracy program. Create individual or class sets of professional worksheets, workbooks, or tests quickly and effortlessly 
					saving valuable preparation time and resources. The Free Version has 20 activities …certainly suitable for Primary School while some topics 
					(e.g. Simple Interest) would be challenging at Junior Cycle. Windows
				</li>
				<li>
					<a href="http://lgfl.skoool.co.uk/common.aspx?id=657">Mathematical Toolkit</a>
					In collaboration with Intel and The Mathematical Association, the Mathematical Toolkit has been designed specifically to support the 
					teaching and learning of mathematics for pupils at Key Stage 3… co‐ordinates, 2D geometry, charts, statistics etc. Windows (running Flash)
				</li>
				<li>
					<a href="http://www.geogebra.org/cms/en/download/">GeoGebra (F)</a>
					Dynamic Geometry ...an essential in the ‘Project Maths’ classrooms! Windows, Mac and Linux (and even as ‘apps’)
				</li>
				<li>
					<a href="http://www.microsoft.com/en-us/download/details.aspx?displaylang=en&id=17786">Microsoft Mathematics</a>
					Add-in for Microsoft Word and Microsoft OneNote makes it easy to plot graphs in 2D and 3D, solve equations or inequalities, and simplify 
					algebraic expressions in your Word documents and OneNote notebooks. Windows
				</li>
				<li>
					<a href="http://gorupec.awardspace.com/mathomir.html">Math-O-Mir (F?)</a>
					MathOMir is a useful ‘mathematical notepad’. On the surface it looks like an ‘Equation Editor’ but I like the ways in which (a) it shows 
					a Substitution (a value carried with the mouse) and (b) it does a Calculation. Windows
				</li>
				<li>
					<a href="http://www.taw.org.uk/lic/itp/">Interactive Teaching Programs</a>
					In the UK, the Department for Children, Schools and Families has ‘Interactive Teaching Programs’ (available in a number of formats, these stand-alone 
					applications won’t require installation). Since the ending of their programme, the files are still available at a number of locations.
					Windows (some .exe files, some Flash) (other archives elsewhere)
				</li>
				<li>
					<a href="http://www.xm1math.net/texmaker/">LaTex</a>
					For a LaTex compatible editor, try Texmaker (F-GNU) Windows, Mac and Linux
				</li>
				<li>
					Equation Editor comes as part of Microsoft Office (or similar such as OpenOffice - below). Consider also 
					<a href="http://www.dragmath.bham.ac.uk/">DragMath (F)</a> which is a simple "drag and drop" equation editor for mathematics. Accepting 
					certain traditional mathematical conventions, the user can build a mathematical expression. This expression can be exported in a number of 
					different formats. DragMath is a simple Java applet, and could be incorporated into web-based applications or other Java applications. Windows
				</li>
			</ul>
			<span class="clickable hideSection" onclick="HideSelection('maths');">[Hide]</span> <a href="#top">[Back to Top]</a>
			<hr>
			</div>

			<a class="anchor" name="music"></a>
			<h3 class="clickable" id="music_header">Music <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></h3>
			<div class="expandSection" id="music_content">
			<ul>
				<li>
					<a href="http://audacity.sourceforge.net/">Audacity (F)</a>
					...the essential tool for the Music Classroom! …or even for the Language Classroom!! Windows, Mac and Linux
				</li>
				<li>
					<a href="http://ketil.svendsen.googlepages.com/theremin">Theremin</a>
					Download links and info. for a ‘Virtual Theremin’ …look for the Download links down the right-hand side of the page (You will also need 
					Shockwave Player from Adobe). I have got this program to run nicely in the past but, when I try to run it under 'XP Compatability', it 
					tries to find Shockwave Player Version 8. Windows and Mac
				</li>
				<li>
					<a href="http://www.vanbasco.com/">Karaoke Player (F)</a>
					VanBasco Karaoke/Midi player …plays Karaoke (.kar) and standard MIDI (.mid, .midi, .rmi) files. Features include: fully customizable 
					Karaoke window: change font, colors, number of lines (up to four), background image; lyrics can be displayed in a resizable window or 
					full-screen; control window: ability to change tempo, volume, key of song; real-time MIDI output window: shows notes, volumes, and 
					instruments, can mute or play solo individual instruments; piano view: displays notes on a big piano keyboard. Windows
				</li>
				<li>
					Music Notation:
					Since ‘Finale Notepad’ is now a commercial product (if only $9.95) you may wish to consider <a href="http://musescore.org/en">MuseScore (F?)</a> 
					(donations requested via PayPal) …Create, play and print beautiful sheet music. Whether you are an experienced user of other notation 
					programs like Finale or Sibelius, or a newcomer to the world of music notation programs, MuseScore has the tools you need to make your 
					music look as good as it sounds. Windows, Mac and Linux
				</li>
				<li>
					Music Education with <a href="http://www.solfege.org/">Solfege</a> (F-GNU) ...learn your intervals, chords, scales and rhythms
					Windows, Mac (somewhat) and Linux
				</li>
			</ul>
			<span class="clickable hideSection" onclick="HideSelection('music');">[Hide]</span> <a href="#top">[Back to Top]</a>
			<hr>
			</div>

			<a class="anchor" name="science"></a>
			<h3 class="clickable" id="science_header">Science <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></h3>
			<div class="expandSection" id="science_content">
			<ul>
				<li>
					<a href="http://gcompris.net/index-en.html">GCompris (F)</a>
					GCompris is a high-quality educational software suite comprising of numerous activities for children aged 2 to 10. Some of the activities 
					are game orientated, but nonetheless still educational. Categories include: ...science: the canal lock, the water cycle, the submarine,
					electric simulation .... Currently GCompris offers in excess of 100 activities and more are being developed. GCompris is free software that 
					means that you can adapt it to your own needs, improve it and, most importantly, share it with children everywhere. Windows, MacOS X and Linux
				</li>
				<li>
					<a href="http://www.senteacher.org/files.php?details=5">Label a Skeleton</a>
					From the very useful ‘senteacher.org’ website, Windows, MacOS X
				</li>
				<li>
					<a href="http://www.periodictableexplorer.com/index.htm">The Periodic Table Explorer</a> is a simple to use resource that covers all 
					of the elements of the periodic table, their compounds, properties, isotopes, reactions, English pronunciations and much more! Search 
					through the 1400 pages easily, find compounds by name or component part (e.g. Mg or CH2), look for scientific constants and calculate 
					molecular mass for any compound. Windows, MacOS X
				</li>
			</ul>
			<span class="clickable hideSection" onclick="HideSelection('cience');">[Hide]</span> <a href="#top">[Back to Top]</a>
			<hr>
			</div>

			<a class="anchor" name="specneeds"></a>
			<h3 class="clickable" id="specneeds_list">Special Education Needs (and see English/Maths above) <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></h3>
			<div class="expandSection" id="specneeds_content"> 
			<ul>
				<li>
					<a href="http://www.wartoft.nu/software/sebran/">Sebran</a>
					The six simpler exercises display four possible answers.  Choose the right one and it becomes a smile; an error gets a frown and a 
					chance to try again. The How Many? counting game introduces the numbers from 1 to 9. These are used in the Add, Subtract, and Multiply 
					matching games, which each function at two levels of difficulty. In Pick A Picture, one of four pictures matches a word; First Letter 
					offers four possible letters completing a word. Your child can employ the skills gained in these exercises to play Memory, Word Memory, 
					or Hangman. Finally, the ABC Rain, Letter Rain, and 1+2 Rain games help train little fingers in using the keyboard.
				</li>
			</ul>
			<span class="clickable hideSection" onclick="HideSelection('specneeds');">[Hide]</span> <a href="#top">[Back to Top]</a>
			<hr>
			</div>

			<a class="anchor" name="tools"></a>
			<h3 class="clickable" id="tools_header">Teacher or Student Authoring Tools <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></h3>
			<div class="expandSection" id="tools_content">
			<ul>
				<li>
					<a href="http://ldd.lego.com/">Virtual Lego</a> Windows and MacOS X
				</li>
				<li>
					<a href="http://hotpot.uvic.ca/">Hot Potatoes (F)</a>
					suite includes six applications, enabling you to create interactive multiple-choice, short-answer, jumbled-sentence, 
					crossword, matching/ordering and gap-fill exercises for the World Wide Web. Hot Potatoes is freeware, and you may use it for any purpose 
					or project you like. It is not open-source. The Java version provides all the features found in the windows version, except: you can't 
					upload to hotpotatoes.net and you can't export a SCORM object from Java Hot Potatoes. Windows
				</li>
				<li>
					<a href="http://freemind.sourceforge.net/wiki/index.php/Main_Page">FreeMind (F)</a>
					is a premier free mind-mapping software written in Java. The recent development has hopefully turned it into high productivity tool.
					Windows, MacOS X and Linux
				</li>
				<li>
					The <a href="http://cmap.ihmc.us/conceptmap.html">IHMC CmapTools program (F)</a> empowers users to construct, navigate, share and criticize 
					knowledge models represented as concept maps. It allows users to, among many other features, construct their Cmaps in their personal computer, 
					share them on servers (CmapServers) anywhere on the Internet, link their Cmaps to other Cmaps on servers, automatically create web pages of 
					their concept maps on servers, edit their maps synchronously (at the same time) with other users on the Internet, and search the web for 
					information relevant to a concept map. Windows, MacOS X and Linux (use the Download icon)
				</li>
				<li>
					<a href="http://www.eclipsecrossword.com/index.html">Crossword Maker: Eclipse</a>, Windows
				</li>
				<li>
					<span class="sectionEntry">Film Editing:</span>
					<ul>
						<li>
							<a href="http://windows.microsoft.com/en-us/windows/get-movie-maker-download">Windows Movie Maker (F)</a>
						</li>
					</ul>
				</li>
				<li>
					<span class="sectionEntry">Photo Montage (and other activities):</span>
					<ul>
						<li>
							<a href="http://www.microsoft.com/en-us/download/details.aspx?id=11132">MS PhotoStory</a> (will run on Win 7)
						</li>
					</ul>
				</li>
				<li>
					<span class="sectionEntry">Making Webpages/sites:</span>
					<ul>
						<li>
							<a href="http://net2.com/nvu/">NVU</a> …described as the “#1 Free Web Authoring System”. Because you can quickly toggle between the 
							WYSIWYG editing mode and the HTML code mode, just by changing tabs, Nvu is also ideal for those wishing to learn HTML programming, as 
							they can easily observe the interaction between the HTML code and what a user will see in their web browser. Windows, MacOS X and Linux
						</li>
					</ul>
				</li>
				<li>
					<span class="sectionEntry">Desktop Publishing:</span>
					<ul>
						<li>
							<a href="http://www.scribus.net/">Scribus (F)</a>
							is an Open Source program that brings professional page layout to desktops with a combination of press-ready output and new approaches 
							to page design. Underneath a modern and user-friendly interface, Scribus supports professional publishing features, such as colour separations, 
							CMYK and spot colours, ICC colour management, and versatile PDF creation. Windows, MacOS X and Linux
						</li>
					</ul>
				</li>
				<li>
					<span class="sectionEntry">Office Alternative:</span>
					<ul>
						<li>
							<a href="http://www.openoffice.org">OpenOffice (F)</a>
							Compatible with other major office suites, Apache OpenOffice is free to download, use, and distribute. You get: Writer a word processor you 
							can use for anything from writing a quick letter to producing an entire book. Calc a powerful spreadsheet with all the tools you need to calculate, 
							analyze, and present your data in numerical reports or sizzling graphics. Impress the fastest, most powerful way to create effective multimedia 
							presentations. Draw lets you produce everything from simple diagrams to dynamic 3D illustrations. Base lets you manipulate databases seamlessly. 
							Create and modify tables, forms, queries, and reports, all from within Apache OpenOffice. Math lets you create mathematical equations with a 
							graphic user interface or by directly typing your formulas into the equation editor. Windows, MacOS X and Linux
						</li>
						<li>
							<a href="http://www.kingsoftstore.com">Kingsoft Office Suite Free 2013</a>
							Described as perhaps the most versatile free office suite, which includes free word processor, spreadsheet program and presentation maker. 
							These three programs help you deal with office tasks with ease: Writer - Efficient word processor; Presentation - Multimedia presentations 
							creator; Spreadsheets - Powerful tool for data processing and data analysis. Although it is a free suite, Kingsoft Office comes with many 
							innovative features, including a paragraph adjustment tool, and multiple tabbed feature. It also has Office to PDF converter, automatic 
							spell checking and word count features. Windows and Linux (and also on Android)
						</li>
						<li>
							<a href="http://www.libreoffice.org/">LibreOffice (F)</a>
							Libre Office (like Apache Open Office above) has grown out of the original Sun product, Open Office. Libre Office offers similar 
							funtionality to Apache Open Office. Windows, MacOS X and Linux
						</li>
					</ul>
				</li>

				<li>
					<span class="sectionEntry">IWB Consideration:</span>
					<ul>
						<li>
							<a href="http://www.inkscape.org/">Inkscape</a>
							is a professional vector graphics editor for Windows, Mac OS X and Linux. It's free and open source. I use it as a free alternative to 
							Interactive Whiteboard software because the features are similar. Windows, MacOS X and Linux
						</li>
						<li>
							<a href="http://open-sankore.org/">SANKORé 3.1</a>
							The open-source software suite for digital teachers. Three integrated functions in one outstanding tool. Since its creation in 2003, 
							Uniboard has been designed for and with its users. A team composed of professors from the University of Lausanne, communication specialists, 
							neuropsychologists and computer program developers collaborated to produce the Uniboard tool with the aim of making it as easy to use as a 
							traditional blackboard. Uniboard is an application that combines the simplicity of traditional teaching tools (blackboard, overhead projector) 
							with the advantages of a computer. It works on both interactive screens (graphics tablet, tablet PC) and Interactive Digital Boards (IDB), 
							as well as on a personal computer, where the mouse is used to prepare a presentation. Windows, Mac and Linux
						</li>
					</ul>	
				</li>

				<li>
					<span class="sectionEntry">Create computer- based tutorials/recordings:</span>
					<ul>
						<li>
							<a href="http://camstudio.org/">CamStudio (F)</a>
							CamStudio is able to record all screen and audio activity on your computer and create industry-standard AVI video files and using its 
							built-in SWF Producer can turn those AVIs into lean, mean, bandwidth-friendly Streaming Flash videos (SWFs). CamStudio can also add 
							high-quality, anti-aliased (no jagged edges) screen captions to your recordings in seconds and with the unique Video Annotation feature 
							you can even personalise your videos by including a webcam movie of yourself "picture-in-picture" over your desktop. Windows
						</li>
						<li>
							<a href="http://www.techsmith.com/jing.html">Jing</a>
							Capture What You See: Capture an image of what you see on your computer screen with Jing. Simply select any window or region that 
							you want to capture, mark up your screenshot with a text box, arrow, highlight or picture caption, and decide how you want to share it. 
							Record What You Do: Select any window or region that you would like to record, and Jing will capture everything that happens in that area. 
							From simple mouse movements to a fully narrated tutorial, Jing records everything you see and do. Jing videos are limited to five 
							minutes for instant, focused communication. Quick & Easy Sharing: Send your screenshots and videos all over the web. As soon as you're 
							done with your screen capture or screen recording, it's ready to upload to Screencast.com and share through IM, email, social media, 
							and more. Windows and MacOS X
						</li>
					</ul>
				</li>
				<li>
					<span class="sectionEntry">Programming/Coding</span>
					<ul>	
						<li>
							<a href="http://scratch.mit.edu/scratch_1.4/">Scratch</a>
							While the latest version of Scratch runs in a Browser, Version 1.4 is still available to download. However, projects created in 
							Scratch 2.0 cannot be opened in 1.4. Windows, Mac and Linux.
						</li>
						<li>
							<a href="http://www.alice.org/">Alice</a>
							Using an innovative programming environment to support the creation of 3D animations, the Alice Project provides tools and materials 
							for teaching and learning computational thinking, problem solving, and computer programming across a spectrum of ages and grade levels.
							Windows, Mac and Linux.
						</li>
					</ul>
				</li>
				<li>
					<span class="sectionEntry">Classroom Admin:</span>
					<ul>
						<li>
							The <a href="http://www.gradeway.com/gwts.aspx">Gradeway Teacher's Suite</a> combines a teacher's Gradebook, 
							Lesson Planner, Ability to Generate Reports, Attendance Tracker, and more! The software is free of charge. Windows
						</li>
						<li>
							While I am a fan of the commercial <a href="http://www.abtutor.com/">ABTutorControl</a> as a Computer Room Management tool (and great 
							for sharing Student Screens as well as for Controlling Access), some schools use (the open‐source GPL) 
							<a href="http://italc.sourceforge.net/">iTALC</a> from (the author asks for an ‘appropriate donation’). Windows and Linux
						</li>
					</ul>
				</li>
			</ul>
			<span class="clickable hideSection" onclick="HideSelection('tools');">[Hide]</span> <a href="#top">[Back to Top]</a>
			<hr>
			</div>

			<a class="anchor" name="utilities"></a>
			<h3 class="clickable" id="utilities_header">Utilities <span class="glyphicon glyphicon-plus-sign glyphicon-h3"></h3>
			<div class="expandSection" id="utilities_content">
				<ul>
					<li>
						<a href="http://www.avg.com">AVG</a>: Anti-Virus for Home/Personal use. Windows, Mac (and mobile)
					</li>
					<li>
						<a href="http://www.safer-networking.org/en/index.html">Spybot +AV</a>: Anti-Spyware for Home/Personal use. 
						The all-in-one antispyware and antivirus software solution. Windows
					</li>
					<li>
						<a href="http://www.microsoft.com/security/pc-security/microsoft-security-essentials.aspx">Microsoft Security Essentials</a>
						is a free product you can download to help defend computers running Windows Vista and Windows 7 against viruses, spyware, and 
						other malicious software. Microsoft Security Essentials helps guard your PC against viruses, spyware, and other malicious software 
						(Note: Windows Defender is supplied as part of Windows 8)
					</li>
					<li>
						<span class="sectionEntry">Android Emulator:</span>
						<ul>
							<li>
								<a href="http://www.bluestacks.com/app-player.html">BlueStacks App Player</a> lets you run your favourite mobile apps on your desktop. 
								Windows and Mac
							</li>
						</ul>
					</li>
					<li>
						<span class="sectionEntry">Anti-Phishing:</span>
						<ul>
							<li>
								<a href="http://www.siteadvisor.com/">MCAfee SiteAdvisor</a> software is an award-winning, free browser plug-in that provides 
								safety advice about Websites when you need it - before you click on a risky site. Windows (use the ‘Free Download’ on the homescreen) 
								and Mac (and Android)	
							</li>
						</ul>
					</li>
					<li>
						<span class="sectionEntry">Encryption:</span>
						<ul>
							<li>
								Make your files secure with <a href="http://www.truecrypt.org/">TruCrypt (F)</a> Free open-source disk encryption software
								Windows, Mac and Linux
							</li>
						</ul>
					</li>
					<li>
						<span class="sectionEntry">PDFs:</span>
						<ul>
							<li>
								<a href="http://www.cutepdf.com/">CutePDF</a>
								Make PDFs with CutePDF Writer (F) FREE software for personal, commercial, gov or edu use. Convert to professional quality PDF files 
								easily from almost any printable document. Windows
							</li>
							<li>
								<a href="http://www.foxitsoftware.com/pdf/reader/">Foxit</a>
								Whether you're a consumer, business, government agency, or educational organization, you need to read, create, sign, and 
								annotate (comment on) PDF documents and fill out PDF forms. Foxit Reader is a small, lightning fast, and feature rich PDF 
								viewer which allows you to create (free PDF creation), open, view, sign, and print any PDF file. Windows and Linux.
							</li>
							<li>
								<a href="http://get.adobe.com/reader/otherversions/">Adobe</a>
								Adobe is the original/mainstream provider of a PDF Reader. Adobe® Reader® software is the free global standard for reliably 
								viewing, printing, and commenting on PDF documents. It's the only PDF file viewer that can open and interact with all types 
								of PDF content, including forms and multimedia. Windows, Mac and Linux.
							</li>
						</ul>
					</li>
					<li>
						<span class="sectionEntry">File Upload:</span>
						<ul>
							<li>
								Uploading Files to the Internet: FTP with <a href="https://filezilla-project.org/index.php">FileZilla Client (F)</a>
								Windows, Mac and Linux.
							</li>
						</ul>
					</li>
					<li>
						<span class="sectionEntry">File Archiving:</span>
						<ul>
							<li>
								<a href="http://www.7-zip.org/">7zip (F)</a>: Compressing and decompressing files, 7zip is a file archiver with a high 
								compression ratio. Windows			
							</li>
						</ul>
					</li>
					<li>
						<span class="sectionEntry">Media Player:</span>
						<ul>
							<li>
								<a href="http://www.videolan.org/">VLC (F)</a>VLC is a free and open source cross-platform multimedia player and framework 
								that plays most multimedia files as well as DVD, Audio CD, VCD, and various streaming protocols. Windows and MacOS X (and Android)
							</li>
						</ul>
					</li>
					<li>
						<span class="sectionEntry">CD or DVD Emulation:</span>
						<ul>
							<li>
								<a href="http://www.daemon-tools.cc/downloads">Daemon</a>: An advanced application for Microsoft Windows which provides 
								one of the best optical media emulation in the industry. DAEMON Tools enables you to convert your physical CD/DVD discs into 
								"virtual discs" so called "images". It also emulated up to 4 virtual CD/DVD drives, so you can mount (insert) and unmount (eject) 
								images. Are you going to use DAEMON Tools Lite at home personally and not for commercial purposes? If “Yes” then press on “Download” 
								and get it for Free! Windows.
								<strong>NB</strong>: Do not use these tools to circumvent software licensing!
							</li>
						</ul>
					</li>
					<li>
						<span class="sectionEntry">Library Administration (personal use)</span>
						<ul>
							<li>
								<a href="http://technoenigma.blogspot.com/2008/04/libra.html">Libra</a>
								is a new and innovative library management software for Microsoft Windows. Though it’s still in beta mode but the software 
								is pretty much powerful and user-friendly to manage your media library. It has the ability to download media information and 
								album arts from Amazon.com database and you can add media using search from Amazon.com database or by manual input, you can also 
								import your previous library database directly into Libra (Delicious Library, Library Thing, Generic Excel (v2003 and above)/Text 
								files, DVD Profiler v3) . It features a webcam barcode scanner, which allows you to use your webcam as a barcode scanner, by using 
								this feature you can add media to Libra automatically by pointing your webcam to the barcode of your media. It also supports using 
								of regular barcode scanners. Using Libra you can track who borrowed your media and what's the check out date, due date etc. You 
								can export your Libra database to Web Export, Excel Export or in text CSV format. The most interesting thing about Libra is that 
								it is a freeware for non-commercial use. Windows
							</li>
							<li>
								<a href="http://evergreen-ils.org/">Evergreen</a> Open Source Library Software. 
								The Evergreen Project develops an open source ILS (integrated library system) used by over 1000 libraries around the world. 
								The software, also called Evergreen, is used by libraries to provide their public catalog interface as well as to manage 
								back-of-house operations such as circulation (checkouts and checkins), acquisition of library materials, and (particularly 
								in the case of Evergreen) sharing resources among groups of libraries. The Evergreen Project was initiated by the Georgia Public 
								Library System in 2006 to serve their need for a scalable catalog shared by (as of now) more than 275 public libraries in the 
								state of Georgia. After Evergreen was released, it has since been adopted by a number of library consortia in the US and Canada 
								as well as various individual libraries, and has started being adopted by libraries outside of North America. (comes with a 
								Server and a Client module). Windows, Mac and Linux
							</li>
							<li>
								<a href="http://koha-community.org/">LibLime Koha</a> (Not sure about this one!)
								LibLime Koha is the most advanced open-source Integrated Library System in use today by hundreds of libraries worldwide. 
								LibLime Koha is web based, so there is no software to install on desktop computers, and LibLime hosting services means that no 
								servers are required in the libraries. LibLime's IT experts manage all upgrades, backups and general system maintenance, and the 
								Library's local IT staff can focus on the Library's many other projects.
							</li>
						</ul>
					</li>
					</ul>
			<span class="clickable hideSection" onclick="HideSelection('utilities');">[Hide]</span> <a href="#top">[Back to Top]</a>
			<hr>
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