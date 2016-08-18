<?php 
	$color_theme_dark_blue = 'rgba(70,127,201,1)';
	$color_theme_light_blue = 'rbga(21,141,184,1)';
?>

body {
	margin: 0;
}

#fixedAll {
}

#fixedHead {
	position: fixed;
	top: 0;
	text-align: center;
	/*height: 200px;*/
	width: 100%;
	z-index: 999;
}

#fixedBody {
	position: fixed;
	top: 0;
	width: 100%;
	height: 100%;
	background-image: url("../images/rail.jpg");
	z-index: -999;
}

#fixedHead h1 {
	margin: 0;
	padding: 40px;
	padding-bottom: 0;
}

<!-- #navBar { -->
<!-- 	border: 1px solid red; -->
<!-- 	height: 40px; -->
<!-- 	background: <?php echo $color_theme_dark_blue; ?> -->
<!-- 	/*padding: 10px; */ -->
<!-- } -->
<!--  -->
<!-- #navBar a { -->
<!-- 	padding: 10px 20px; -->
<!-- 	display: inline-block; -->
<!-- 	color: white; -->
<!-- 	text-decoration: none; -->
<!-- } -->
<!--  -->
<!-- #navBar a:hover:not(.active) { -->
<!-- 	background-color: #000000; -->
<!-- } -->
<!--  -->
<!-- #navBar a.active { -->
<!-- 	background-color: #000000; -->
<!-- } -->
<!--  -->
<!-- #navElement { -->
<!-- border-right:1px solid #bbb; -->
<!-- } -->

#topNav ul {
	list-style-type: none;
	margin: 0;
	padding: 0px;
	overflow: hidden;
	border: 1px solid #e7e7e7;
	background-color: #f3f3f3;
}

#topNav {
<!-- 	border: 1px solid red; -->
}

#topNav li {
	float: left;
<!-- 	display: inline-block; -->
}

#topNav li a {
	display: inline-block;
	color: #666;
	text-align: center;
	padding: 14px 17px;
	text-decoration: none;
}

#topNav a:hover:not(.active) {
	background-color: #ddd;
}

#topNav a.active {
	color: black;
	background-color: 00B1FF; 
<!-- 	<?php echo $color_theme_light_blue; ?> -->
}

#fixedFooter {
	position: fixed;
	bottom: 0;
	background-color: rgba(255,255,255, 0.8);
	width: 100%;
	height: 85px;
	padding-top: 10px;
	padding-left: 10px;
	border-top: 1px solid black;
}

#fixedFooter #footerLogo {
	position: absolute;
	right: 0;
	top: 15px;
	right: 20px;
}

#fixedFooter .noteLabel {
	display: inline-block;
	vertical-align: top;
	margin-top: 5px;
	font-weight: bold;
}

#fixedFooter .note {
	display: inline-block;
	/*width: */
}

#fixedFooter .note p {
	margin-top: 5px;
	margin-bottom: 5px;
}

#main {
	margin-top: 180px;
	/*border: 2px solid white;*/
	margin-bottom: 150px;
}

.navArrow {
	background-image: url("../images/nav-arrow.png");
	height: 50px;
	width: 50px;
	margin-left: auto;
	margin-right: auto;
}

.printPdf {
	background-image: url("../images/print.png");
	height: 50px;
	width: 50px;
	background-size: 50px;
	margin-left: 10px;
	
}

.page {
	margin-left: 250px;
	margin-right: 30px;
}

.centerOuter {
	margin-left: auto;
	margin-right: auto;
	text-align: center;
}

.stepCircle {
	color: <?php echo $color_theme_dark_blue; ?>;
	border: 3px solid <?php echo $color_theme_dark_blue; ?>;
	background-color: #eee;
	width: 30px;
	height: 30px;
	font-size: 24px;
	border-radius: 15px;
	text-align: center;
	font-weight: bold;
	position: absolute;
	top: 5px;
	left: 5px;
}

.stepBox {
	border: 1px dashed #888;
	border-radius: 15px;
	position: relative;
	padding-top: 25px;
	padding-bottom: 20px;
	padding-left:  35px;
	padding-right: 35px;
	background-color: rgba(255, 255, 255, 0.6);
	
}

form#timeEntry {
	text-align: center;
}

.startEndTimeStepOuter {
	text-align: center;
}

.startEndTime {
	width: 200px;
	display: inline-block;
	margin: 20px;
	position: relative;
	padding-top: 25px;
	padding-bottom: 20px;
	padding-left:  35px;
	padding-right: 35px;
	text-align: center;
}

.startEndTime h3, .trafficTableStepOuter h3, .assistantsSelectStepOuter h3 {
	background-color: <?php echo $color_theme_dark_blue; ?>;
	padding: 15px;
	margin: 0 auto;
	margin-bottom: 10px;
}

.startEndTime h3 {
	width: 105px;
}

.trafficTableStepOuter h3 {
	width: 200px;
}

.assistantsSelectStepOuter h3 {
	width: 160px;
}

.trafficTableStepOuter {
	display: inline-block;
	padding-left:  70px;
	padding-right: 70px;
}

.trafficTable {
	border-collapse: collapse;
	margin-left: auto;
	margin-right: auto;

}

.trafficTable .tableTrafficHour {
	text-align: center;
}

.assistantsSelectStepOuter {
	width: 521px;
}

#assistantsTable {
	margin-left: auto;
	margin-right: auto;
}

#assistantsTable td {
	padding: 5px;
}

h1 {
	color: #19334d;
	font-family: verdana;
	font-size: 32px;
}

#title {
	background: <?php echo $color_theme_dark_blue; ?>;
	height:120px;
}

h2.sectionHead {
	text-align: center;
	color: #19334d;
}
#note {
	position:relative;
	left: 0%;
}
