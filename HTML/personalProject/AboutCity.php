<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>
			Personal Project
		</title>
		<link rel="stylesheet" type="text/css" title="main" href="defaultStyle.css"/>
		<link rel="alternative stylesheet" type="text/css" title="large" href="large.css"/>
		<link rel="alternative stylesheet" type="text/css" title="access" href="access.css"/>
		<script type="text/javascript" src="styleswitcher.js"></script>
	</head>
	
	<body>
		<div id="main">
			<?php
            include('header.php');
            include('navigation.php');
			?>	
			
			<div id="content">
			
				
				<p>
					Viridian City is a small city located in western Kanto.
				</p>
				
				<p>
				Three paths, all major, lead from the city center. To the north is Route 2, as well as Viridian Forest, 
				which lies in the middle of Route 2 south of Pewter City. To the south is Route 1, which leads to Pallet Town. 
				To the west is Route 22, leading to the Indigo Plateau and the Pokémon League. 
				</p>
							

				<img class="center" src="images/Viridian_City.png" alt="Viridian City" usemap="#city" />

			
			
				<map name="city">
				  <area shape="circle" coords="442, 211,15" alt="Gym" href="GymHistory.php" />
				  <area shape="circle" coords="321, 354, 15" alt="Trainer House" href="#M2" />
				  <area shape="circle" coords="409, 356, 15" alt="PokéMart" href="#M3" />
				  <area shape="circle" coords="268, 453, 15" alt="PokéCenter" href="#M4" />
				</map>
			
			<div id="mapList">
				<ol>
					<li>Viridian Gym</li>
						<p>	
							See <a class="aqua" href="GymHistory.php">the History of the Gym</a> page for more information.
						</p>
					<li><a name="M2">Trainer House</a></li>
						<p>
						A unique attraction in Generation II-era Viridian is the Trainer House, a location where trainers from far and 
						wide can battle one trainer, once per day. Trainers will face the last trainer they used Mystery Gift with, 
						along with that trainer's party. If they have yet to unlock or use Mystery Gift, the opposing trainer will 
						have a trio of Level 50 Pokémon, namely Meganium, Typhlosion and Feraligatr. 
						<p>
					<li><a name="M3">PokéMart</a></li>
					<p>Items for sale are: Poké Ball, Potion, Antidote, Parlyz Heal and Burn Heal
					</p>
					<li><a name="M4">PokéCenter</a></li>
						<p>Heal your pokémon here.
						</p>
					
				</ol>
			</div>
			</div>
			
			<?php
            include('footer.php');
			?>	
			
		</div>
	</body>
</html>