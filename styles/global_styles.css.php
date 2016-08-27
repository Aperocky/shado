<?php
	$color_theme_dark_blue = '#467FC9';
	$color_theme_light_blue = '#75D3FE';
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

#topNav ul {
	list-style-type: none;
	margin: 0;
	padding: 0px;
	overflow: hidden;
	/*border: 1px solid red;*/
	background-color: #555;
	border-top: 1px solid black;
	border-bottom: 1px solid black;
}

#topNav li {
	/*display: inline-block;*/
	float: left;
	margin: 0;
	padding: 0px;
	font-size: 18px;
	/*border-right: 1px solid black;*/
}

#topNav li a {
	display: inline-block;
	color: white;
	text-align: center;
	padding: 12px 17px;
	text-decoration: none;
	/*border: 1px solid red;*/
}

#topNav li a:hover:not(.active) {
	/*background-color: #ddd;*/
	color: white;
	background-color: black;
}

#topNav li a.active {
	background-color: <?php echo $color_theme_light_blue; ?>;
}

#sideNav ul {
    list-style-type: none;
    margin-top: 0px;
		padding: 20px 0px;
		height: 100%;
    /*padding: 0;*/
    width: 180px;
    background-color: #f1f1f1;
    position: fixed;
    /*height: 90%;*/
    overflow: auto;
		border-right: 1px solid black;
}

#sideNav li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
		border-bottom:
}

#sideNav li a.active {
		color: white;
		background-color: <?php echo $color_theme_light_blue; ?>;
}

#sideNav li a:hover:not(.active) {
    background-color: #ddd;
}

#fixedFooter {
	position: fixed;
	bottom: 0;
	background-color: rgba(255,255,255, 0.8);
	width: 100%;
	height: 70px;
	padding-top: 10px;
	padding-left: 10px;
	border-top: 1px solid black;
}

#fixedFooter #footerLogo {
	position: absolute;
	top: 10px;
	right: 20px;
}

#fixedFooter .noteLabel {
	display: inline-block;
	vertical-align: top;
	margin-top: 20px;
	font-weight: bold;
}

#fixedFooter .note {
	display: inline-block;
	/*width: */
}

#fixedFooter .note p {
	margin-top: 20px;
	margin-bottom: 5px;
}

#main {
	margin-top: 168px;
	margin-bottom: 120px;
	/*border: 1px solid red;*/
	/*height: 100%;*/
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
	margin-top: 10px;
	margin-left: 10px;
	position:fixed;
  right:10px;
}

.page {
	margin-left: 200px;
	margin-right: 30px;
	margin-top: 10px;
	padding-top: 20px;
}

#homePage, #contactPage, #versionPage {
	margin-left: 30px;
}

.pageTitle {
	text-align: center;
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
	/*font-family: Verdana, Geneva, sans-serif;*/
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif
	font-size: 32px;
}

#title {
	background: <?php echo $color_theme_dark_blue; ?>;
	height:120px;
}

#title h1 {
	color: white;
}

/*#title h1::first-letter {
	color: <?php echo $color_theme_light_blue; ?>;
}*/

/*h2.sectionHead {
	text-align: center;
	color: #19334d;
}*/

#note {
	position:relative;
	left: 0%;
}

p {
	font-size: 20px;
}

#contactFormInner {
	/*text-align: center;*/
	/*align-content: left;*/
}

.whiteFont {
	color: white;
}

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
}

tr:nth-child(even){
	background-color: #f1f1f1;
}

th {
    background-color: <?php echo $color_theme_dark_blue; ?>;
    color: white;
}

#howTab{
 	padding:5px 15px;
 	width:fit-content;
 	width:-webkit-fit-content;
 	width:-moz-fit-content;
 	border: 3px solid #5D7B85;
 	cursor:pointer;
 	-webkit-border-radius: 5px;
 	border-radius: 25px;
 	display: inline-block;
 	
 	/*width: 1200px;*/
 	/*margin: 0 auto;*/
 	margin: 20px;
 	text-align: left;
 	background-color: rgba(255, 255, 255, 0.6);
 }
 

