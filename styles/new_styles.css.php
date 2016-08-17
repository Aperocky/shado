<?php $color_theme = 'rgba(70,127,201,1)'; ?>

.webHeader {
	position: fixed;
	top: 0;
	text-align: center;
	/*height: 200px;*/
	width: 100%;
	z-index: 999;
}

.page {
	position: fixed;
	top: 0;
	width: 100%;
	height: 100%;
	background-image: url("../images/rail.jpg");
	z-index: -999;
}

.topNav ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
	overflow: hidden;
	background-color: #333;
}

.topNav li {
	float: left;
}

.topNav li a {
	display: block;
	color: white;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
}

.topNav li a:hover:not(.active) {
	background-color: #111;
}

.topNav .active {
	background-color: #4CAF50;
}