<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="includes/results/graph_create.js" type="text/javascript"></script>
<!DOCTYPE html>
<meta charset="utf-8">

	<div class="page">

		<div class="engineer">
			<div id="graph"></div>
		</div>


<style>

.engineer{
	text-align: center;
}

#graph{
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
</style>


<?php 

	require_once('graph_create_csv.php');
	createGraphCsv('Engineer');

?>