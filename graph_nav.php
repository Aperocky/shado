
<?php echo "<div class='".$user_name."'>"; ?>
<div id="graphTextBox" >
	<nav id="graphNav">
		<ul>
			<li id="when?"><a id="when" onclick="graph_nav_check1()";><span onmouseover="tooltip.pop(this, '')">When?</span></a></li>
			<li id="why?" class="graphNavElement" onclick="graph_nav_check2()"><a id="why"><span  onmouseover="tooltip.pop(this, '')">Why?</span></a></li>
			<li id="how?" class="graphNavElement" onclick="graph_nav_check3()"><a id="how"><span onmouseover="tooltip.pop(this, '')">How?</span></a></li>
		</ul>
	</nav>
	<div id="introduction_text">
		<h3> Please select one of the tabs above for more information </h3>
	</div>
	
