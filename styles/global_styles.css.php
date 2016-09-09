/* Color themes */

<?php
	$color_theme_dark_blue = '#467FC9';
	$color_theme_light_blue = '#75D3FE';
?>

/****************************************************
*													*
*	Section:	Page Parts							*
*													*
****************************************************/

h1, h2, h3, h4 {
   /*font-size: 1em !important;*/
   /*color: #000 !important;*/
   font-family: Arial;
   /*!important;*/
}

body {
	margin: 0;
}

/*#fixedAll {
}*/

#fixedHead {
	position: fixed;
	top: 0;
	text-align: center;
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
}

#topNav li a {
	display: inline-block;
	color: white;
	text-align: center;
	padding: 12px 17px;
	text-decoration: none;
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
    width: 200px;
    background-color: #f1f1f1;
    position: fixed;
    /*height: 90%;*/
    overflow: auto;
	border-right: 1px solid black;
}

#sideNav li a, #sideNav li button {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
	font-size: 14;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}

#sideNav li a.active{
	color: white;
	background-color: <?php echo $color_theme_light_blue; ?>;
}

#sideNav li button #accordion-content.active {
	/*background-color: */
}

#sideNav li a:hover:not(.active), #sideNav li button:hover {
    background-color: #ddd;
}

li button.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    /*padding: 18px;*/
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    /*font-size: 15px;*/
    transition: 0.4s;
}

li button.accordion:after {
    content: '\25B8';
	/*'\276F';*/
	/*'\02795';*/
    /*color: #777;*/
    float: right;
	/*padding-left: 5px;*/
	/*vertical-align: middle;*/
	/*border: 1px solid red;*/
	/*vertical-align: -50%;*/
    /*margin-right: 5px;*/
}

li button.accordion.active:after {
    content: '\25BE';
	/*'\25B8';*/
	/*'\2796';*/
}

div.accordion-content {
    /*padding: 0 18px;*/
	/*margin-left: 18px;*/
    background-color: white;
	color: white;
	text-indent: 20px;
    max-height: 0;
    overflow: hidden;
    transition: 0.3s ease-in-out;
    opacity: 0;
	/*border: 1px solid red;*/
}

div.accordion-content.show {
    opacity: 1;
    max-height: 500px;
}

#bottomNav {
	display: table;
	margin: auto;
	/*border: 1px solid red;*/
}
#bottomNav ul {
	list-style-type: none;
	margin: auto;
	padding: 0;
	/*overflow: hidden;*/
	/*background-color: #555;*/
}

#bottomNav li {
	display: inline-block;
	/*text-align: center;*/
	/*float: right;*/
	margin: auto;
	padding: 20px;
	font-size: 18px;
	/*border: 1px solid red;*/
}

/*#bottomNav li {
	display: inline-block;
	color: white;
	text-align: center;
	padding: 12px 17px;
	text-decoration: none;
}*/

/*#fixedFooter {
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
}

#fixedFooter .note p {
	margin-top: 20px;
	margin-bottom: 5px;
}*/

/****************************************************
*													*
*	Section:	General								*
*													*
****************************************************/

#main {
	margin-top: 168px;
	margin-bottom: 20px;
	/*border: 1px solid red;*/
	/*height: 100%;*/
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

@media print {
	.page {
		margin-left: 0 !important;
		/*background-color: red;*/
	}

	.no-page-break {
		page-break-inside: avoid;
	}
}

.page {
	margin-left: 230px;
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

/****************************************************
*													*
*	Section:	RunSim Settings						*
*													*
****************************************************/

form#timeEntry {
	text-align: center;
}

.startEndTimeStepOuter {
	text-align: center;
}

.startEndTime {
	width: 300px;
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
	width: 150px;
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
	width: 600px;
}

#assistantsTable {
	margin-left: auto;
	margin-right: auto;
}

/*#assistantsTable td {
	padding: 5px;
}*/

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

/****************************************************
*													*
*	Section:	Table formatting					*
*													*
****************************************************/

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

tr:nth-child(odd){
	background-color: white;
}

th {
    background-color: <?php echo $color_theme_dark_blue; ?>;
    color: white;
}

#howTab, #whenTab{
 	padding:5px 15px;
 	width:fit-content;
 	width:-webkit-fit-content;
 	width:-moz-fit-content;
 	/*border: 3px solid #5D7B85;*/
 	cursor:pointer;
 	-webkit-border-radius: 5px;
 	border-radius: 25px;
 	display: inline-block;
 	margin: 20px;
 	text-align: left;
 	background-color: rgba(255, 255, 255, 0.6);
 }

 #conductor_summary{
	position: relative;
	top: 50px;

 }

/****************************************************
*													*
*	Section:	Tool tips							*
*													*
****************************************************/

/* Tooltip container */
.tooltip1 {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
}

/* Tooltip text */
.tooltip1 .tooltiptext1 {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;

    /* Position the tooltip text - see examples below! */
    position: absolute;
    z-index: 1;
}

/* Show the tooltip text when you mouse over the tooltip container */
.tooltip1:hover .tooltiptext1 {
    visibility: visible;
}

.button {
	background-color: #e7e7e7;
	border: 1px solid black;
    /*border: none;*/
    color: white;
    padding: 10px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	border-radius: 8px;
}

/****************************************************
*													*
*	Section:	Operator Summary					*
*													*
****************************************************/

.operatorSummaryOuter {
	text-align: center;
}

#operator2, #operator1{
	padding:5px 15px;
	width:fit-content;
	width:-webkit-fit-content;
	width:-moz-fit-content;
	border: 3px solid #5D7B85;
	cursor:pointer;
	-webkit-border-radius: 5px;
	border-radius: 25px;
	display: inline-block;
	width: 450px;
	margin: 20px;
	text-align: left;
	background-color: rgba(255, 255, 255, 0.6);
}

/*button*/
#summaryButton {
	padding:5px 15px;
    border: 2px solid #5D7B85;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 25px;
}

.roundButton {
    height: 30px;
    width: 30px;
    border-radius: 100px;
	/*padding: 5px 10px;*/
	border: none;
	cursor: pointer;
	color: white;
	font-size: 20;
	text-align: center;
}


/****************************************************
*													*
*	Section:	graph text box					*
*													*
****************************************************/
#graphNav ul {
	list-style-type: none;
	margin: 0;
	padding: 0px;
	overflow: hidden;
	/*border: 1px solid red;*/
	background-color: #555;
	border: 1px solid black;
	border-bottom: 1px solid black;
	display: inline-block;
}

#graphNav li {
	/*display: inline-block;*/
	float: left;
	display: inline-block;
	margin: 0;
	padding: 0px 50px;
	font-size: 18px;
	/*border-right: 1px solid black;*/
}

#graphNav li a {
	color: white;
	text-align: center;
	padding: 12px 20px;
	text-decoration: none;
	display: inline-block;
	/*border: 1px solid red;*/
}

#graphTextBox{
 	width:fit-content;
 	width:-webkit-fit-content;
 	width:-moz-fit-content;
 	border: 3px solid #5D7B85;
 	cursor:pointer;
 	-webkit-border-radius: 5px;
 	border-radius: 25px;
 	min-width: 600px;
 	/*width: 1200px;*/
 	/*margin: 0 auto;*/
 	margin-left: auto ;
	margin-right: auto ;
 	text-align: center;
 	background-color: rgba(255, 255, 255, 0.6);
}

#text_box{
 	padding:5px 15px;
 	width:fit-content;
 	width:-webkit-fit-content;
 	width:-moz-fit-content;
 	/*border: 3px solid #5D7B85;*/
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


/****************************************************
*													*
*	Section:	d3 visualizaiton					*
*													*
****************************************************/

.operator{
	text-align: center;
}

.engineer{
	text-align: center;
}

.conductor{
	text-align: center;
}

#graph_Conductor, #graph_Engineer, #graph{
	padding:30px 30px;
	width:fit-content;
	width:-webkit-fit-content;
	width:-moz-fit-content;
	border: 3px solid #5D7B85;
	cursor:pointer;
	-webkit-border-radius: 5px;
	border-radius: 25px;
	display: inline-block;
	/*margin: 0 auto;*/
	margin: 20px;
	text-align: left;
	background-color: rgba(255, 255, 255, 0.6);
	overflow: auto;
}

.axis path,
.axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}

.bar {
  fill: steelblue;
}

.x.axis path {
  display: none;
}

div.tooltip {
    position: absolute;
    width:fit-content;
	width:-webkit-fit-content;
	width:-moz-fit-content;
    height:fit-content;
	height:-webkit-fit-content;
	height:-moz-fit-content;
    padding: 5px;
    font: 15px sans-serif;
    background: lightsteelblue;
    border: 0px;
    border-radius: 8px;
    pointer-events: none;
}

.node.active {
  fill: blue;
}

#custom{
	display: none;
}

.custom{
	width: 312px;
	margin-left: auto;
	margin-right: auto;
	text-align: center;
	border: 1px dashed #888;
	border-radius: 15px;
	position: relative;
	padding-top: 25px;
	padding-bottom: 20px;
	padding-left:  55px;
	padding-right: 30px;
	background-color: rgba(255, 255, 255, 0.6);
}

#custom_heading{
	background-color: #467FC9;
	padding: 10px;
}

#custom_table{
	padding: 10px;
	margin: 0 auto;
	border-collapse: collapse;
	margin-left: auto;
	margin-right: auto;
}

#custom_table td {
	padding: 5px;
}

.remove {
	display: none;
}
.hide {
	visibility: hidden;
}
