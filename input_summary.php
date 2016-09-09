<?php

	session_start();
	$traffic=array();
	$traffic['0.5']=1.0;
	$traffic['1']=2.0;
	$traffic['2']=3.0;
	$time=$_SESSION['traffic_time'];
	$traffic_level=array();
	for($x = 0; $x < $time; $x++) {
		// $traffic_level[]=$_SESSION['traffic_level'.$x];
		$traffic_level[]=$_SESSION['traffic_level'][$x];
	}

	$file = fopen($_SESSION['dir'] . "input_summary.txt", "w");
	fwrite($file,"time,");
	fwrite($file,"t_level\n");
	for($i=0;$i<$time;$i++)
	{
		fwrite($file,"Hour ". ($i+1) .",");
		fwrite($file,$traffic[(string)$traffic_level[$i]]."\n");
	}
	fclose($file);
?>

<!DOCTYPE html>
<meta charset="utf-8">
<style>

#input{
	padding:15px 15px;
 	width:fit-content;
 	width:-webkit-fit-content;
 	width:-moz-fit-content;
 	border: 3px solid #5D7B85;
 	cursor:pointer;
 	-webkit-border-radius: 5px;
 	border-radius: 25px;
 	margin: 20px;
 	text-align: left;
 	background-color: rgba(255, 255, 255, 0.6);
}

.bar:hover {
  fill: brown;
}

.axis {
  font: 10px sans-serif;
}

.y.axis{
	font: 15px sans-serif;
}

.x.axis{
	font: 15px sans-serif;
}

.axis path,
.axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}

.x.axis path {
  display: none;
}

</style>
<div class='page'>
<div id="input">
	<h3 style="text-align: center;"> <u>Input summary</u></h3>
	<ul>
	<li>Duration of the trip: <?php echo $time." hours"; ?></li>
	<br>
	<li> Traffic levels for this particular shift:</li>
	<div id="input_summary" class="no-page-break"></div>
	<br>
	<li>Humans/technologies supporting the locomotive engineer: <ul>
	<?php
		$assistant[1]="Conductor";
		$assistant[2]="Positive Train Control";
		$assistant[3]="Cruise Control";
		$check=0;
		for($i=1;$i<4;$i++){
			if($_SESSION['operator'.$i]==1){
				$check=1;
				echo "<li>".$assistant[$i]."</li>";
			}
		}

		if($check==0){
			echo "<li>None</li>";
		}
	?>
	</ul></li>
	</ul>
</div>
</div>
<script src="//d3js.org/d3.v3.min.js"></script>
<script>

var temp= <?php echo $time; ?>;

var margin = {top: 20, right: 50, bottom: 80, left: 50},
    width = 960,
    height = 500 - margin.top - margin.bottom;

var x_input = d3.scale.ordinal()
    .rangeRoundBands([0, width], .1);

var y = d3.scale.linear()
    .rangeRound([height, 0]);

var xAxis_input = d3.svg.axis()
    .scale(x_input)
    .orient("bottom");

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left")
	.ticks(3);

var ticks_gap1=1;
if(temp>8){
	ticks_gap1=2;
}

xAxis_input.tickFormat(function (d,counter=0) {if(counter%ticks_gap1==0){counter++; return d;} });

var svg_summary = d3.select("#input_summary").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

// d3.csv("sessions/input_summary.txt", type, function(error, data) {
// d3.csv('<?php echo $_SESSION['dir'] . "input_summary.txt"; ?>', type, function(error, data) {
d3.csv("read_file.php?filename=input_summary.txt", type, function(error, data) {

  if (error) throw error;

  x_input.domain(data.map(function(d) { return d.time; }));

  y.domain([0,3.5]);

  svg_summary.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate("+(-width/(2*temp))+"," + height + ")")
      .call(xAxis_input)
	  .append("text")
	  .attr("transform", "translate("+(width / 2)+",40)" )
	  .attr("x", 1)
	  .attr("dx", ".71em")
	  .text("Time (min)");

  svg_summary.append("g")
      .attr("class", "y axis")
      .call(yAxis)
    .append("text")
		.attr("transform", "translate(-50,350) rotate(-90)" )
		.attr("y", 6)
		.attr("dy", ".71em")
		.text("Traffic level (1: Low, 2: Medium, 3: High)");

  svg_summary.selectAll(".bar")
      .data(data)
    .enter().append("rect")
      .attr("class", "bar")
	  .attr("fill",function(d,i){console.log(d.t_level); if(d.t_level==1){return "blue";}  if(d.t_level==2){return "blue";}  if(d.t_level==3){return "blue";} })
      .attr("x", function(d) { return x_input(d.time); })
      .attr("width", x_input.rangeBand())
      .attr("y", function(d) { return y(d.t_level); })
      .attr("height", function(d) { return height - y(d.t_level); });
});

function type(d) {
  d.t_level = +d.t_level;
  return d;
}
</script>
