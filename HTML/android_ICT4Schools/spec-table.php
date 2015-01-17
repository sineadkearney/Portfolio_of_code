<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png"  href="images/Android_robot.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Android Devices Specifications Table</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css"> <!-- my own style -->
	
	<script src="../js-libraries/jquery-2.1.1.min.js"></script>	
	
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
	<script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>
	<script src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	<script src="../js-libraries/DataTables-1.10.4/extensions/FixedHeader/js/dataTables.fixedHeader.min.js"></script>
	<link rel="stylesheet" href="../js-libraries/DataTables-1.10.4/extensions/FixedHeader/css/dataTables.fixedHeader.min.css">
	
	<script>
	$(document).ready(function() {

	$('#example').dataTable( {
        "paging":   false,
        "info":     false
    } );
	
    var table = $('#example').DataTable();
 
   var oFH =  new $.fn.dataTable.FixedHeader( table, {
        left: true
    } );

	//make it look like the y-axis position of the bottom "back" button, and the page index buttons are "fixed"
	$(window).scroll(function(){

		$('#example_paginate').css({
			'left': $(this).scrollLeft() - 20 
		});
		$('.bottom_back_button').css({
			'left': $(this).scrollLeft() + 20 
		});	
});
	
	// $( "#example_paginate" ).click(function() {
	// console.log("update")
    // oFH.fnPosition();
// });

} );
//<table id="specsTable" cellspacing="0" class="table table-bordered table-striped" >
</script>
</head>
<body>
		
		
<div class="col-xs-12">

<form class="back_button top_back_button" method="link" action="android-hardware.php">	
		<input type="submit" class="btn btn-default" value="Back to Main Site">
	</form>

    
	<table id="example" class="table table-bordered table-striped" cellspacing="0" width="100%">
<thead>
 <tr class="tableHeader">
  <th>Tablet</th>
  <th>Android</th>
  <th>Screen</th>
  <th>WeightKg</th>
  <th>Screen Res</th>
  <th>Screen Type</th>
  <th>MultiPoint</th>
  <th>Google Play</th>
  <th>Screenshot</th>
  <th>Miracast</th>
  <th>CPU Ram</th>
  <th>MemType</th>
  <th>Storage GB</th>
  <th>Sdcard</th>
  <th>Processor</th>
  <th>GHz</th>
  <th>Graphics</th>
  <th>BatteryHrs (up to)</th>
  <th>Flash Support</th>
  <th>Wifi</th>
  <th>Widi</th>
  <th>Btooth</th>
  <th>NFC</th>
  <th>Mic</th>
  <th>Headphone</th>
  <th>Speakers</th>
  <th>USB</th>
  <th>HDMI</th>
  <th>Front CamMP</th>
  <th>Rear CamMP</th>
  <th>File Access Via USB</th>
  <th>Charge Via USB</th>
  <th>Sensors</th>
  <th>Warranty</th>
  <th>Notes</th>
 </tr>
 </thead>
 <tbody>
 <tr>
  <td>GoTab Appi 6" Kids Tablet</td>
  <td>4.0</td>
  <td>6.0</td>
  <td>0.275</td>
  <td>800x480</td>
  <td>Capacitive</td>
  <td>5</td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td>0.5</td>
  <td>DDR3</td>
  <td>4</td>
  <td>Micro32</td>
  <td></td>
  <td>1</td>
  <td></td>
  <td>LithPoly 2000 mAh</td>
  <td></td>
  <td>b/g/n</td>
  <td></td>
  <td>no</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Micro</td>
  <td></td>
  <td>VGA</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td>G - Rotate; no GPS</td>
  <td>1 yr</td>
  <td>Silicon Case; Crayon Stylus; Parental Control</td>
 </tr>
 <tr>
  <td>Atab Spectrum</td>
  <td>4.1</td>
  <td>7.0</td>
  <td></td>
  <td>800x600</td>
  <td>Capacitive</td>
  <td>5</td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td>0.5</td>
  <td></td>
  <td>4</td>
  <td>Micro16</td>
  <td>Arm Cortex A8</td>
  <td>1</td>
  <td></td>
  <td>2500 mAh</td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>no</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>no</td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>1 yr</td>
  <td>Colours, Silicone,
  Keyboard Case and 16 Gb card</td>
 </tr>
 <tr>
  <td>Nabi 7"
  INTERNET TABLET FOR KIDS</td>
  <td>4.2</td>
  <td>7.0</td>
  <td >0.610</td>
  <td>1024x600</td>
  <td>Capacitive non IPS</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td>1</td>
  <td></td>
  <td>8</td>
  <td>Micro32</td>
  <td>nVidia Tegra 3 Quad
  Core</td>
  <td>1.3</td>
  <td></td>
  <td>8 hrs, 3850 mAh</td>
  <td></td>
  <td>b/g/n</td>
  <td></td>
  <td>v3</td>
  <td></td>
  <td></td>
  <td>yes</td>
  <td>Stereo</td>
  <td>Micro</td>
  <td>Mini</td>
  <td>2</td>
  <td>no</td>
  <td></td>
  <td>no</td>
  <td>GPS, Tilt (Gyro?)</td>
  <td></td>
  <td>Silicon (food grade)
  bumper; free apps; parental mode; US tablet</td>
 </tr>
 <tr>
  <td>GoTab GTD7 7''
  Tablet</td>
  <td></td>
  <td>7.0</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>RTE’s 7"
  Tablet designed for children</td>
  <td>4.2</td>
  <td>7.0</td>
  <td></td>
  <td>800x400</td>
  <td>Capacitive</td>
  <td>5</td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td>1</td>
  <td></td>
  <td>8</td>
  <td>Micro32</td>
  <td>Rockchip RK3066
  Cortex A9 Dual Core</td>
  <td>1.4</td>
  <td></td>
  <td>4 hrs</td>
  <td>yes</td>
  <td>b/g/n</td>
  <td></td>
  <td>no</td>
  <td></td>
  <td></td>
  <td></td>
  <td>Mono</td>
  <td>yes</td>
  <td>yes</td>
  <td>0.3</td>
  <td></td>
  <td></td>
  <td></td>
  <td>G - Rotate</td>
  <td></td>
  <td>Parental Control</td>
 </tr>
 <tr>
  <td>OV-EduTab2+
  Overmax 7"</td>
  <td>4.2</td>
  <td>7.0</td>
  <td ></td>
  <td>800x480</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>1</td>
  <td>DDR3</td>
  <td>8</td>
  <td>Micro32</td>
  <td>Dual Core</td>
  <td>1.2</td>
  <td></td>
  <td>2800 mAh /3.7V</td>
  <td></td>
  <td>b/g/n</td>
  <td></td>
  <td></td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>Micro</td>
  <td>yes</td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td>G- Rotate</td>
  <td></td>
  <td>Case, Stylus and
  Keboard for €29</td>
 </tr>
 <tr>
  <td>Acer Iconia B
  7" Tablet NT.L1NEK.001</td>
  <td>4.1</td>
  <td>7.0</td>
  <td >0.340</td>
  <td>1024x600</td>
  <td>TFT</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td>1</td>
  <td>DDR3</td>
  <td>8</td>
  <td>Micro32</td>
  <td>MediaTek ARM
  Cortex-A9 Dual Core</td>
  <td>1.2</td>
  <td></td>
  <td>4 hrs</td>
  <td></td>
  <td>b/g/n</td>
  <td></td>
  <td>v4</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>Micro</td>
  <td>no</td>
  <td>VGA</td>
  <td>no</td>
  <td></td>
  <td></td>
  <td></td>
  <td>1 yr</td>
  <td></td>
 </tr>
 <tr>
  <td>LEAPFROG
  LeapPad Ultra Educational Tablet - Green</td>
  <td></td>
  <td>7.0</td>
  <td >1.340</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>8</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>Medion Junior
  Tab</td>
  <td>4.2</td>
  <td>7.0</td>
  <td >0.310</td>
  <td>1024x600</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>DDR3</td>
  <td>8</td>
  <td>Micro</td>
  <td>ARM Cortex A9 Quad
  Core</td>
  <td>1.6</td>
  <td></td>
  <td>6 hrs</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td></td>
  <td>0.3</td>
  <td>2</td>
  <td></td>
  <td></td>
  <td></td>
  <td>3 yr</td>
  <td>aluminium back plate;
  silicon bumpers; parental PIN</td>
 </tr>
 <tr>
  <td>Medion LifeTab
  E7318</td>
  <td>4.2</td>
  <td>7.0</td>
  <td >0.310</td>
  <td>1024x600</td>
  <td></td>
  <td>5</td>
  <td>yes</td>
  <td>Power+VolDown</td>
  <td>yes</td>
  <td>1</td>
  <td>DDR3</td>
  <td>16</td>
  <td>Micro64</td>
  <td>ARM v7 A9 Quad Core</td>
  <td>1.6</td>
  <td></td>
  <td>3000 mAh, lith
  polymer, 4 hrs</td>
  <td>side load</td>
  <td>b/g/n</td>
  <td></td>
  <td>v2.1</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>Micro</td>
  <td>no</td>
  <td>0.3</td>
  <td>2</td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>3 yr</td>
  <td></td>
 </tr>
 <tr>
  <td>Asus Memo HD7
  ME172V</td>
  <td>4.1</td>
  <td>7.0</td>
  <td >0.353</td>
  <td>1024x600, 17<span style="display:none">7 ppi</span></td>
  <td>TN</td>
  <td>10</td>
  <td>yes</td>
  <td>Power+VolDown</td>
  <td>no</td>
  <td>1</td>
  <td>?</td>
  <td>16</td>
  <td>Micro32</td>
  <td>Sngle Core VIA WM8850</td>
  <td>1</td>
  <td>dual-core Mali-400 MP
  GPU</td>
  <td>7 hrs; 16Wh
  Li-polymer Battery</td>
  <td>side load</td>
  <td>b/g/n</td>
  <td></td>
  <td>no</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td>Single, Rear</td>
  <td>Micro</td>
  <td>no</td>
  <td>1</td>
  <td>no</td>
  <td>yes OTG</td>
  <td>yes</td>
  <td>Accelerometer</td>
  <td>2 yr</td>
  <td></td>
 </tr>
 <tr>
  <td>Asus Memo HD7
  ME173X</td>
  <td>4.2</td>
  <td>7.0</td>
  <td >0.302</td>
  <td>1280x800</td>
  <td>IPS</td>
  <td>10</td>
  <td>?</td>
  <td></td>
  <td>yes</td>
  <td>1</td>
  <td>?</td>
  <td>8 or 16</td>
  <td>Micro</td>
  <td>Quad Core Mediatec</td>
  <td>1.2</td>
  <td>IMG PowerVR SGX544</td>
  <td>10 hrs (15Wh
  Li-polymer)</td>
  <td>?</td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>Micro</td>
  <td>no</td>
  <td>0.3 or 1.2</td>
  <td>2 or 5</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td>5 Coloured Covers
  available</td>
 </tr>
 <tr>
  <td>Asus Memo HD7
  ME176CX</td>
  <td>4.4</td>
  <td>7.0</td>
  <td >0.295</td>
  <td>1280x800</td>
  <td>IPS, 170º</td>
  <td></td>
  <td></td>
  <td></td>
  <td>yes</td>
  <td>1</td>
  <td></td>
  <td>16</td>
  <td>Micro</td>
  <td>quad-core Intel Atom
  Z3745</td>
  <td>1.3</td>
  <td>Intel HD Graphics</td>
  <td>9 hrs, 3910 mAh</td>
  <td></td>
  <td>2.4</td>
  <td></td>
  <td>v4</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td>Stereo, Rear</td>
  <td>Micro</td>
  <td></td>
  <td>0.3</td>
  <td>2</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>Nexus 7 (1st
  Gen, 2012)</td>
  <td>4.1</td>
  <td>7.0</td>
  <td >0.340</td>
  <td>1280x800</td>
  <td>IPS LCD Capacitive</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td>1</td>
  <td>DDR3</td>
  <td>32</td>
  <td>no</td>
  <td>NVIDIA Tegra3, Arm
  Cortex A9 Quad Core</td>
  <td>1.2</td>
  <td>NvidiaULP
  G'Force 416MHz</td>
  <td>4325 mAh, 10 hrs</td>
  <td>yes</td>
  <td>b/g/n</td>
  <td></td>
  <td>v3</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>Micro</td>
  <td>no</td>
  <td>1.2</td>
  <td>no</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Discontinued</td>
 </tr>
 <tr>
  <td>Advent Vega
  Tegra Note 7</td>
  <td>4.3</td>
  <td>7.0</td>
  <td >0.320</td>
  <td>1280x800</td>
  <td>IPS, wide angle</td>
  <td></td>
  <td>yes</td>
  <td>via Stylus</td>
  <td>yes</td>
  <td>1</td>
  <td></td>
  <td>16</td>
  <td>Micro</td>
  <td>Nvidia Tegra 4 quad
  core</td>
  <td>1.8</td>
  <td>72-core NVIDIA
  GeForce</td>
  <td>11 hrs</td>
  <td>?</td>
  <td>yes</td>
  <td></td>
  <td>v4</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>Stereo, Front</td>
  <td>Micro</td>
  <td>Micro</td>
  <td>0.3</td>
  <td>5</td>
  <td></td>
  <td></td>
  <td></td>
  <td>1</td>
  <td>Stylus - Chisel Tip,
  pressure sensitive; Tab Cover available</td>
 </tr>
 <tr>
  <td>Samsung Tab 4</td>
  <td>4.4</td>
  <td>7.0</td>
  <td >0.276</td>
  <td>1280x800</td>
  <td>TFT</td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td></td>
  <td>1.5</td>
  <td></td>
  <td>8</td>
  <td>Micro32</td>
  <td>Quad Core</td>
  <td>1.2</td>
  <td></td>
  <td>4000 mAh, 10 hrs</td>
  <td></td>
  <td>b/g/n</td>
  <td></td>
  <td>v4</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>Micro</td>
  <td></td>
  <td>1.3</td>
  <td>3</td>
  <td></td>
  <td></td>
  <td>Accerlerometer</td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>Hisense Sero 7
  Pro</td>
  <td>4.2</td>
  <td>7.0</td>
  <td ></td>
  <td>1280x800</td>
  <td></td>
  <td></td>
  <td></td>
  <td>virtual button</td>
  <td></td>
  <td>1</td>
  <td></td>
  <td>8</td>
  <td>Micro</td>
  <td>Quad-Core Nvidia
  Tegra 3</td>
  <td></td>
  <td></td>
  <td>9 hrs</td>
  <td></td>
  <td>2.4 and 5</td>
  <td></td>
  <td>v3</td>
  <td></td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>Micro</td>
  <td>Mini</td>
  <td>2</td>
  <td>5</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>Nexus 7<span style="mso-spacerun:yes"> </span>(2nd Gen, 2013)</td>
  <td>4.3</td>
  <td>7.0</td>
  <td >0.290</td>
  <td>1920x1200</td>
  <td>IPS LCD Capacitive</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>2</td>
  <td>DDR3</td>
  <td>16</td>
  <td>no</td>
  <td>QualcommSnapdragonS4Pro8064Quad</td>
  <td>1.5</td>
  <td>Adreno 320, 400MHz</td>
  <td>3950 mAh, 9 hrs (15Wh
  Li-polymer)</td>
  <td>yes</td>
  <td>2.4 and 5</td>
  <td></td>
  <td>v4</td>
  <td>yes</td>
  <td>yes</td>
  <td>yes</td>
  <td>Stereo</td>
  <td>Micro</td>
  <td>no</td>
  <td>1.2</td>
  <td>5</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>Apple iPad
  Mini</td>
  <td>iOS 7</td>
  <td>7.9</td>
  <td>0.308</td>
  <td>1024x786</td>
  <td>IPS</td>
  <td></td>
  <td>AppStore</td>
  <td></td>
  <td>AirPlay</td>
  <td>0.5</td>
  <td></td>
  <td>16</td>
  <td>no</td>
  <td>Apple A5</td>
  <td></td>
  <td></td>
  <td>10 hrs</td>
  <td>no</td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td>yes</td>
  <td>yes</td>
  <td>no</td>
  <td>1.2</td>
  <td>5</td>
  <td></td>
  <td></td>
  <td></td>
  <td>1 yr</td>
  <td></td>
 </tr>
 <tr>
  <td>Acer Iconia
  NTLISEK.001</td>
  <td>4.2.2</td>
  <td>7.9</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>no</td>
  <td></td>
  <td></td>
  <td>16</td>
  <td></td>
  <td>Quad Core</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>3G Ready</td>
 </tr>
 <tr>
  <td>Acer Iconia
  Tab 8</td>
  <td>4.4</td>
  <td>8.0</td>
  <td >0.360</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>2</td>
  <td></td>
  <td>16or32</td>
  <td></td>
  <td>Quad Core</td>
  <td>1.86</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>Samsung Tab 3
  8 inch (SM-T210)</td>
  <td>4.1 (OTA to 4.<span style="display:none">4)</span></td>
  <td>8.0</td>
  <td >0.300</td>
  <td>1024x600</td>
  <td>TFT</td>
  <td></td>
  <td>yes</td>
  <td>Power+Home</td>
  <td>DLNA</td>
  <td>1</td>
  <td></td>
  <td>8</td>
  <td>Micro32</td>
  <td>Dual Core<span style="mso-spacerun:yes"></span></td>
  <td>1.2</td>
  <td></td>
  <td>4000 mAh</td>
  <td>side load</td>
  <td>2.4 and 5</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td>Stereo, bottom</td>
  <td>Micro</td>
  <td>no</td>
  <td>1.3</td>
  <td>3</td>
  <td>yes</td>
  <td>yes</td>
  <td>Acceler, Geo, Light,
  GPS</td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>Lenovo Yoga
  Tablet 8</td>
  <td>4.2</td>
  <td>8.0</td>
  <td >0.401</td>
  <td>1280x800</td>
  <td>IPS, 178<font class="font5">º</font></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>1</td>
  <td></td>
  <td>16</td>
  <td>Micro</td>
  <td>MediaTek Cortex-A7
  MT8125 ( Quad-Core )</td>
  <td>1.2</td>
  <td></td>
  <td>16 hrs</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>v4</td>
  <td></td>
  <td></td>
  <td></td>
  <td>Stereo, Front</td>
  <td>host</td>
  <td></td>
  <td>1.6</td>
  <td>5</td>
  <td></td>
  <td></td>
  <td></td>
  <td>1 yr</td>
  <td>unique Stand (Tilt)</td>
 </tr>
 <tr>
  <td>Nvidia Shield
  (gaming)</td>
  <td>4.4</td>
  <td>8.0</td>
  <td >0.390</td>
  <td>1920x1200</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>yes</td>
  <td>2</td>
  <td></td>
  <td>16</td>
  <td>Micro128</td>
  <td>ARM Cortex A15 CPU</td>
  <td>2.2</td>
  <td>NVIDIA®Tegra®K1
  192 core Kepler</td>
  <td>19.75 Watt Hours</td>
  <td></td>
  <td>2.4 and 5</td>
  <td></td>
  <td>v4</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td>Stereo, Front</td>
  <td>Micro</td>
  <td>Mini</td>
  <td>5</td>
  <td>5</td>
  <td></td>
  <td></td>
  <td>Gyro, Acceler,
  Compass</td>
  <td></td>
  <td>has Stylus; 32 Gb, 3G
  version also; Controller available</td>
 </tr>
 <tr>
  <td>LG G-PAD
  8.3" Tablet | White (V5000 or V300?)</td>
  <td>4.4</td>
  <td>8.3</td>
  <td >0.338</td>
  <td>1920x1200</td>
  <td>IPS</td>
  <td>yes</td>
  <td>yes</td>
  <td>Power+VolDown</td>
  <td>yes</td>
  <td>2</td>
  <td>DDR3</td>
  <td>16</td>
  <td>Micro64</td>
  <td>Snapdragon Quad Core</td>
  <td>1.7</td>
  <td></td>
  <td>12 hrs, 4600 mAh</td>
  <td></td>
  <td>b/g/n</td>
  <td></td>
  <td>v4</td>
  <td></td>
  <td></td>
  <td></td>
  <td>Stereo, Back</td>
  <td></td>
  <td></td>
  <td>1.3</td>
  <td>5</td>
  <td></td>
  <td></td>
  <td>GPS</td>
  <td></td>
  <td>Exclusive to HN;
  Metal back; A Wreckler "best Android tablet"</td>
 </tr>
 <tr>
  <td>GoTab Appi
  GTA9 9" Kids Tablet</td>
  <td>4.0</td>
  <td>9.0</td>
  <td >0.660</td>
  <td>800x480</td>
  <td></td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>?</td>
  <td></td>
  <td>DDR3</td>
  <td>4</td>
  <td>Micro32</td>
  <td>Dual Core</td>
  <td>1</td>
  <td></td>
  <td>5 hrs, LithPoly
  2,000mAh</td>
  <td>no</td>
  <td>yes</td>
  <td></td>
  <td>no</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td>no</td>
  <td>vga</td>
  <td>no</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Pink &amp; Blue Case,
  Crayon Stylus, Charger</td>
 </tr>
 <tr>
  <td>GoTab Appi
  GTA9 9" Kids Tablet (via my-go.co)</td>
  <td>4.2</td>
  <td>9.0</td>
  <td >0.660</td>
  <td>800x480</td>
  <td>Capacitive</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>?</td>
  <td>1</td>
  <td>DDR3</td>
  <td>8</td>
  <td>Micro32</td>
  <td>Dual Core</td>
  <td>1.2</td>
  <td></td>
  <td>LithPoly 4,000mAh</td>
  <td></td>
  <td>b/g/n</td>
  <td></td>
  <td>no</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td>yes</td>
  <td>yes</td>
  <td>no</td>
  <td>vga</td>
  <td>no</td>
  <td>yes</td>
  <td>yes</td>
  <td>G- Rotate</td>
  <td>1 yr</td>
  <td>Pink &amp; Blue Case,
  Crayon Stylus, Charger</td>
 </tr>
 <tr>
  <td>Atab Plus</td>
  <td>4.4</td>
  <td>9.2</td>
  <td ></td>
  <td>840x600</td>
  <td>Capacitive<span style="mso-spacerun:yes"> </span><span style="display:none"><span style="mso-spacerun:yes"></span>5</span></td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td>1</td>
  <td></td>
  <td>8</td>
  <td>Micro32</td>
  <td>Quad Core A31</td>
  <td>1.5</td>
  <td></td>
  <td>5000 mAh</td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>1 yr</td>
  <td>Keyboard case and
  16GB SD card</td>
 </tr>
 <tr>
  <td>GoTab
  9.7" Retina Display Tablet</td>
  <td></td>
  <td>9.7</td>
  <td ></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>?</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>Yarvik 'Xenta'
  Tablet | 9.7" Screen</td>
  <td></td>
  <td>9.7</td>
  <td >0.640</td>
  <td>1024x768</td>
  <td>IPS</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>1</td>
  <td>DDR3</td>
  <td>16</td>
  <td></td>
  <td>Arm<span style="mso-spacerun:yes"></span></td>
  <td></td>
  <td>Mali 400</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>Atab Ultra
  Advanced</td>
  <td>4.4</td>
  <td>9.7</td>
  <td ></td>
  <td>2048x1536</td>
  <td><span style="mso-spacerun:yes"></span>IPS</td>
  <td>10</td>
  <td>yes</td>
  <td></td>
  <td>no</td>
  <td>2</td>
  <td></td>
  <td>16</td>
  <td>Micro32</td>
  <td>Quad Core</td>
  <td>1.6</td>
  <td>8 Core</td>
  <td>8400 mAh</td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td>yes</td>
  <td>5</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>1 yr</td>
  <td>Keyboard case and
  16GB SD card</td>
 </tr>
 <tr>
  <td>Atab Complete</td>
  <td>4.4</td>
  <td>9.7</td>
  <td ></td>
  <td>2048x1536</td>
  <td>IPS Gorilla Glass</td>
  <td>10</td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>2</td>
  <td></td>
  <td>8</td>
  <td>Micro32</td>
  <td>OctoCore</td>
  <td>1.3</td>
  <td></td>
  <td>4000 mAh<span style="mso-spacerun:yes"></span></td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td>yes</td>
  <td>8</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>1 yr</td>
  <td>Keyboard case and
  16GB SD card; 3G<span style="mso-spacerun:yes"></span></td>
 </tr>
 <tr>
  <td>Yarvik Xenta
  10" …10ic, Tab10-201</td>
  <td>4.1</td>
  <td>10.0</td>
  <td >0.596</td>
  <td>1280x800</td>
  <td>IPS Capacitive, 178º</td>
  <td>5</td>
  <td>yes</td>
  <td>Power+VolDown</td>
  <td>no</td>
  <td>1</td>
  <td>DDR3</td>
  <td>16</td>
  <td>Mcro64</td>
  <td>Dual Core Cortex A9</td>
  <td>1.6</td>
  <td>Quad Core Mali 400</td>
  <td>8 hrs, 6000 mAh</td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>v4</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td>Rear</td>
  <td>Mini</td>
  <td>Mini</td>
  <td>0.3</td>
  <td>2</td>
  <td>yes</td>
  <td>no</td>
  <td>Gravity</td>
  <td>2 yr</td>
  <td></td>
 </tr>
 <tr>
  <td>Medion LifeTab</td>
  <td>4.2</td>
  <td>10.0</td>
  <td ></td>
  <td>1280x800</td>
  <td></td>
  <td></td>
  <td>yes</td>
  <td>Power+VolDown</td>
  <td></td>
  <td>1</td>
  <td>DDR3</td>
  <td>16</td>
  <td></td>
  <td>Quad Core</td>
  <td>1.6</td>
  <td></td>
  <td>3000 mAh, lith
  polymer, 4 hrs</td>
  <td>side load</td>
  <td>b/g/n</td>
  <td></td>
  <td>v2.1</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>Micro</td>
  <td>no</td>
  <td>0.3</td>
  <td>2</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>GoTab 10"
  Android Internet Tablet</td>
  <td>4.2</td>
  <td>10.1</td>
  <td >0.600</td>
  <td>1024x600</td>
  <td>Capacitive</td>
  <td>5</td>
  <td>yes</td>
  <td></td>
  <td>?</td>
  <td></td>
  <td>DDR3</td>
  <td>8</td>
  <td>Micro</td>
  <td>2 x 1.2GHz ARM A20</td>
  <td>1.2</td>
  <td></td>
  <td>7 hrs</td>
  <td>no</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Micro</td>
  <td>Mini</td>
  <td>vga</td>
  <td>2</td>
  <td></td>
  <td></td>
  <td></td>
  <td>1 yr</td>
  <td></td>
 </tr>
 <tr>
  <td>Atab Ultra</td>
  <td>4.4</td>
  <td>10.1</td>
  <td ></td>
  <td>1024x600</td>
  <td>High Def</td>
  <td>10</td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td>1</td>
  <td></td>
  <td>8</td>
  <td>Micro32</td>
  <td>A31</td>
  <td>1.5</td>
  <td></td>
  <td>5000 mAh</td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>1 yr</td>
  <td>Keyboard case and
  16GB SD card</td>
 </tr>
 <tr>
  <td>Hannspree
  SN1AT71B Quad Core 10.1 Tablet</td>
  <td>4.2</td>
  <td>10.1</td>
  <td >0.620</td>
  <td>1280x800</td>
  <td>IPS Capacitive</td>
  <td>10</td>
  <td>yes</td>
  <td>virtual button</td>
  <td>yes</td>
  <td>1</td>
  <td>DDR3</td>
  <td>16</td>
  <td>Micro</td>
  <td>Arm Cor. A9, Quad</td>
  <td>1.2</td>
  <td></td>
  <td>6 hrs (3.7V
  Li-Polymer, 6000mAh)</td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td>Stereo, Rear</td>
  <td>Micro</td>
  <td>Mini</td>
  <td>0.3</td>
  <td>2</td>
  <td></td>
  <td></td>
  <td></td>
  <td>2 yr</td>
  <td></td>
 </tr>
 <tr>
  <td>Fujitsu Stylus
  M532 10.1" Quad Core Tablet</td>
  <td>4.1</td>
  <td>10.1</td>
  <td >0.560</td>
  <td>1280x800</td>
  <td></td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>no</td>
  <td></td>
  <td>DDR2</td>
  <td>32</td>
  <td>Micro</td>
  <td>Arm Cor. A9</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>no</td>
  <td>2</td>
  <td>2</td>
  <td></td>
  <td></td>
  <td></td>
  <td>1 yr</td>
  <td>own' connector for
  charging</td>
 </tr>
 <tr>
  <td>Samsung Note
  (GT-N8010)</td>
  <td>4.4 (via Kies)</td>
  <td>10.1</td>
  <td>0.597</td>
  <td>1280 x 800, 14<span style="display:none">9 ppi</span></td>
  <td >PLS TFT
  capacitive</td>
  <td>10</td>
  <td>yes</td>
  <td>SPen Or Power+Home</td>
  <td>Mirror (after Kies)</td>
  <td>2</td>
  <td></td>
  <td>16</td>
  <td>Micro64</td>
  <td>Quad Core</td>
  <td>1.4</td>
  <td>Arm Mali 400</td>
  <td>7000 mAh</td>
  <td>yes</td>
  <td>b/g/n dual</td>
  <td></td>
  <td>v4</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td>Stereo, Front</td>
  <td>v2</td>
  <td>adaptor</td>
  <td>1.9</td>
  <td>5</td>
  <td>yes</td>
  <td>no</td>
  <td>Acceler, gyro,
  compass</td>
  <td>2 yr</td>
  <td>Stylus; 'own'
  connector for charging</td>
 </tr>
 <tr>
  <td>Samsung Tab 4
  (SM-T535)</td>
  <td>4.4</td>
  <td>10.1</td>
  <td>0.487</td>
  <td>1280 x 800, 14<span style="display:none">9 ppi</span></td>
  <td>TFT</td>
  <td>10</td>
  <td>yes</td>
  <td>Swipe Palm L to R</td>
  <td>Mirror</td>
  <td>1.5</td>
  <td></td>
  <td>16</td>
  <td>Micro64</td>
  <td>Quad Core</td>
  <td>1.2</td>
  <td></td>
  <td>6800 mAh</td>
  <td>via Dolphin</td>
  <td>b/g/n dual</td>
  <td>Direct</td>
  <td>v4</td>
  <td>no</td>
  <td>yes</td>
  <td>yes</td>
  <td>Stereo, sides</td>
  <td>v2</td>
  <td>no</td>
  <td>3</td>
  <td>1.3</td>
  <td>yes</td>
  <td>yes</td>
  <td>Acceler, proximity,
  light, geo-magnetic</td>
  <td>2 yr</td>
  <td>SamsungLink to synch
  all files, apps etc.; SIM card</td>
 </tr>
 <tr>
  <td>HP Slate 10 HD
  3501ea Tablet | F4X21EA</td>
  <td></td>
  <td>10.1</td>
  <td >0.630</td>
  <td>1280x800</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Micro</td>
  <td>Arm</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>2</td>
  <td>5</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>ASUS
  Transformer Pad(TF103C)</td>
  <td>4.4</td>
  <td>10.1</td>
  <td ></td>
  <td>1280x800</td>
  <td></td>
  <td>10</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>Sony Xperia
  Tablet Z SGP311GB/B.CEK 16GB</td>
  <td>4.4</td>
  <td>10.1</td>
  <td >0.495</td>
  <td>1920x1200</td>
  <td>TFT</td>
  <td></td>
  <td>yes</td>
  <td>Power+VolDown</td>
  <td>yes</td>
  <td>2</td>
  <td>DDR3</td>
  <td>16</td>
  <td>Micro64</td>
  <td>Qualcomm® Snapdragon™
  S4 Pro QuadCore</td>
  <td>1.5</td>
  <td>dedicated Adreno 320
  GPU</td>
  <td>6000 mAh</td>
  <td></td>
  <td>b/g/n</td>
  <td></td>
  <td>v4</td>
  <td>yes</td>
  <td>yes</td>
  <td>yes</td>
  <td>Stereo, sides</td>
  <td>Micro</td>
  <td>viaMHL</td>
  <td>2.2</td>
  <td>8.1</td>
  <td></td>
  <td>yes</td>
  <td>GPS, thermometer,
  barometer, proximity, gesture, RGB light</td>
  <td>3 yr</td>
  <td>Waterproof and dust
  resistant; FM Radio; Best Tablet - EISA</td>
 </tr>
 <tr>
  <td>Toshiba
  AT10LE-10D<span style="mso-spacerun:yes"></span></td>
  <td>4.2</td>
  <td>10.1</td>
  <td ></td>
  <td>2560x1600</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>external display'</td>
  <td></td>
  <td></td>
  <td></td>
  <td>Micro</td>
  <td>Quad Core</td>
  <td></td>
  <td>Quad Core</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Micro</td>
  <td>yes</td>
  <td>1.2</td>
  <td>8.3</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>ToshibaExcite
  AT10PE-A-104 'Excite Write'</td>
  <td>4.2</td>
  <td>10.1</td>
  <td >0.630</td>
  <td>2560x1600</td>
  <td>IPS Capacitive</td>
  <td>10</td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td>2</td>
  <td>DDR3</td>
  <td>32</td>
  <td>Micro</td>
  <td>ARM Cortex-A15,
  nvidia Tegra 4, Quad</td>
  <td>1.8</td>
  <td>Nvidia GeForce
  Graphics</td>
  <td>11 hrs</td>
  <td></td>
  <td>b/g/n</td>
  <td></td>
  <td>v4</td>
  <td></td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>Micro</td>
  <td>Micro</td>
  <td>1.2</td>
  <td>8</td>
  <td></td>
  <td></td>
  <td>Acceler, LightSens,
  Gyro, Compass</td>
  <td>1 yr</td>
  <td>includes Stylus for
  'Excite Write' feature; option case/keyboard</td>
 </tr>
 <tr>
  <td>ASUS
  Transformer Pad (TF701T)</td>
  <td>4.3</td>
  <td>10.1</td>
  <td >.585+.570</td>
  <td>2560 x 1600</td>
  <td>LED IPS</td>
  <td>10</td>
  <td>yes</td>
  <td>TapHold 'RecentApps'</td>
  <td>yes</td>
  <td>2</td>
  <td></td>
  <td>32</td>
  <td>Micro128</td>
  <td>NVIDIA® Tegra4™
  Quad-Core</td>
  <td>1.9</td>
  <td>72-core NVIDIA
  GeForce</td>
  <td>13+4 hrs</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td>v3</td>
  <td>yes</td>
  <td>yes</td>
  <td>yes</td>
  <td></td>
  <td>yes</td>
  <td>Micro</td>
  <td>1.2</td>
  <td>5</td>
  <td></td>
  <td>yes</td>
  <td></td>
  <td></td>
  <td>Dock</td>
 <tr>
  <td>SonyXPERIA Z2
  TABLET 16GB WIFI BLACK<br>
    SGP511GB/B.CEK</td>
  <td>4.4</td>
  <td>10.1</td>
  <td ></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Power+VolDown</td>
  <td>via
  XperiaConnectivity</td>
  <td>3</td>
  <td></td>
  <td>16</td>
  <td></td>
  <td>Qualcomm</td>
  <td>2.3</td>
  <td></td>
  <td>10 hrs</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>8</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>SonyXPERIA Z2 TABLET 32GB WIFI BLACK</td>
  <td></td>
  <td>10.1</td>
  <td ></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>LENOVO Yoga
  10.1” Tablet – 16 GB</td>
  <td></td>
  <td>10.1</td>
  <td ></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>Nexus 10</td>
  <td></td>
  <td></td>
  <td ></td>
  <td>2560×1600, 300 ppi</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>
 <tr>
  <td>Samsung Galaxy
  Note® Pro - SM-P900</td>
  <td>4.4</td>
  <td>12.2</td>
  <td>0.748</td>
  <td>2560 x 1600</td>
  <td></td>
  <td></td>
  <td></td>
  <td>via S-Pen (Air
  Command)</td>
  <td>Screen Mirroring</td>
  <td>3</td>
  <td></td>
  <td>32</td>
  <td>Micro64</td>
  <td>Samsung Exynos® 5
  Octa processor</td>
  <td></td>
  <td></td>
  <td>11 hrs, 9500mAh</td>
  <td></td>
  <td>dual band</td>
  <td></td>
  <td>v4</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>v3</td>
  <td>yes</td>
  <td>2</td>
  <td>8</td>
  <td></td>
  <td></td>
  <td>Acceler, Light, Gyro,
  Geo, Hall</td>
  <td></td>
  <td>stylus; four
  different applications side-by-side</td>
  </tr>
</tbody>
</table>

<br><br>

	<form class="back_button bottom_back_button" method="link" action="android-hardware.php">	
		<input type="submit" class="btn btn-default" value="Back to Main Site">
	</form>


	</div>
	
	


</body>
</html>
