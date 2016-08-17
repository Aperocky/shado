<?php


	$file_handle=fopen('sessions/Conductor_stats.csv','r');
	$file=fopen("sessions/mod_type_data_conductor.txt","w");
	$count=array();
	$temp_count=0;
	$skip=1;
	$num=0;
	while (! feof($file_handle) )
	{
		if($temp_count==1)
		{
			$skip=1;
		}
		$line_of_text = fgetcsv($file_handle,1024,',');
		if($line_of_text[1]=="Sum")
		{
			break;
		}
		if($skip==1)
		{
			$num=count($line_of_text);
			$count[$temp_count]=array();
			for($i=1;$i<$num;$i++)
			{
				if($temp_count==0)
				{
					$count[$temp_count][$i-1]=$line_of_text[$i];
				}
				else
				{
					$count[$temp_count][$i-1]=(float)$line_of_text[$i];
				}

			}
			$skip=0;
			$temp_count++;
			continue;
		}
		if($skip==0)
		{
			$skip=1;
			continue;
		}

	}

	fclose($file_handle);
	$count[0][0]='time';
	for($i=0;$i<$temp_counter-1;$i++)
	{
		$count[$i+1][0]='type'.$i;
	}



	for($i=0;$i<$num-1;$i++)
	{
		for($j=0;$j<$temp_count-1;$j++)
		{
			fwrite($file,$count[$j][$i].",");
		}
		fwrite($file,$count[$temp_count-1][$i]."\n");
	}

	fclose($file);

?>


	<div id="page2" class="page2">
		<div id="graph2"></div>
	</div>




<style>

.page2{
	text-align: center;
}

#graph2{
	padding:5px 15px;
	width:fit-content;
	width:-webkit-fit-content;
	width:-moz-fit-content;
	border: 3px solid #5D7B85;
	cursor:pointer;
	-webkit-border-radius: 5px;
	border-radius: 25px;
	display: inline-block;
	width: 1200px;
	/*margin: 0 auto;*/
	margin: 20px;
	text-align: left;
	background-color: rgba(255, 255, 255, 0.6);
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
.tooltip{
	text-anchor: left;
	font-family: sans-serif;
	font-size: 12px;
	font-weight: bold;
	fill:black;
}
.node.active {
  fill: blue;
}
</style>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script>
var legend_width = 120;
var margin = {top: 20, right: 20, bottom: 30, left: 60},
    width = 860 - margin.left - margin.right+legend_width,
    height = 500 - margin.top - margin.bottom;

var x = d3.scale.ordinal()
    .rangeRoundBands([0, width],0.4);



var yAbsolute = d3.scale.linear() // for absolute scale
    .rangeRound([height, 0]);
var yRelative = d3.scale.linear() // for absolute scale
	    .rangeRound([height, 0]);
var color = d3.scale.ordinal()
    .range(["#98abc5", "#8a89a6", "#7b6888", "#6b486b", "#a05d56", "#d0743c", "#ff8c00", "#dd843c", "#ff8ff0"]);
var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom");

var yAxisRelative = d3.svg.axis()
    .scale(yRelative)
    .orient("left");

var yAxisAbsolute = d3.svg.axis()
	    .scale(yAbsolute)
	    .orient("left");

var svg = d3.select("#graph2").append("svg")
    .attr("width", width + margin.left + margin.right+legend_width)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
d3.csv("sessions/mod_type_data_conductor.txt", function(error, data) {
  color.domain(d3.keys(data[0]).filter(function(key) { return key !== "time"; }));


  data.forEach(function(d) {
	var mystate = d.time.slice(0,4);
    var y0 = 0;
	d.ages = color.domain().map(function(name) { return {mystate:mystate, name: name, y0: y0, y1: y0 += +d[name]}; });

    d.total = d.ages[d.ages.length - 1].y1;// the last row
	d.pct = [];

	for (var i=0;i <d.ages.length;i ++ ){

		var y_coordinate = +d.ages[i].y1/d.total;
	    var y_height1 = (d.ages[i].y1)/d.total;
		var y_height0 = (d.ages[i].y0)/d.total;
		var y_pct = y_height1 - y_height0;
		d.pct.push({
			y_coordinate: y_coordinate,
			y_height1: y_height1,
			y_height0: y_height0,
			name: d.ages[i].name,
			mystate: d.time.slice(0,4),
			y_pct: y_pct

		});


	}


  });



  x.domain(data.map(function(d) { return d.time.slice(0,4); }));
  yAbsolute.domain([0,1]);//Absolute View scale
  yRelative.domain([0,1])// Relative View domain

  var absoluteView = true // define a boolean variable, true is absolute view, false is relative view
  						  // Initial view is absolute
  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis);








	var stateAbsolute= svg.selectAll(".absolute")
						.data(data)
		    			.enter().append("g")
		    			.attr("class", "absolute")
		   			 .attr("transform", function(d) { return "translate(" + "0" + ",0)"; });



	stateAbsolute.selectAll("rect")
			    .data(function(d) { return d.ages})
			    .enter().append("rect")
			    .attr("width", x.rangeBand())
			    .attr("y", function(d) {

					  return yAbsolute(d.y1);
				})
			    .attr("x",function(d) {
					  return x(d.mystate)
				})
			    .attr("height", function(d) {
					  return yAbsolute(d.y0) - yAbsolute(d.y1);
					  })
			    .attr("fill", function(d){
					  return color(d.name)
					  })
				.attr("id",function(d) {
					  return d.mystate
				})
				.attr("class","absolute")
				.style("pointer-events","all");
				 // initially it is invisible, i.e. start with Absolute View


	stateAbsolute.selectAll("rect")
		.on("mouseover", function(d){

			var xPos = parseFloat(d3.select(this).attr("x"));
			var yPos = parseFloat(d3.select(this).attr("y"));
			var height = parseFloat(d3.select(this).attr("height"))

			d3.select(this).attr("stroke","blue").attr("stroke-width",0.8);

			svg.append("text")
				.attr("x",xPos)
				.attr("y",yPos +height/2)
				.attr("class","tooltip")
				.text(((d.y1-d.y0)*100).toFixed(2)+"%");


		})
		.on("mouseout",function(){
			svg.select(".tooltip").remove();
			d3.select(this).attr("stroke","pink").attr("stroke-width",0.2);

		})
	//define two different scales, but one of them will always be hidden.
	svg.append("g")
		.attr("class", "y axis absolute")
		.call(yAxisAbsolute)
		.append("text")
		.attr("transform", "rotate(-90)")
		.attr("y", 6)
		.attr("dy", ".71em")
		.style("text-anchor", "end")
		.text("Utilization");


	svg.append("text")
        .attr("x", (width / 2))
        .attr("y", 10 - (margin.top / 2))
        .attr("text-anchor", "middle")
        .style("font-size", "24px")
        .style("text-decoration", "underline")
        .text("Conductor Operation");

			  // end of define absolute


// adding legend
  	    var legend = svg.selectAll(".legend")
      	 	 			.data(color.domain().slice().reverse())
    	 			    .enter().append("g")
    				    	.attr("class", "legend")
    	 			    	.attr("transform", function(d, i) { return "translate(0," + i * 20 + ")"; });
 		 legend.append("rect")
   	   			.attr("x", width - 18+legend_width)
    			.attr("width", 18)
     	    	.attr("height", 18)
     	    	.attr("fill", color);
 		 legend.append("text")
      		.attr("x", width - 24+legend_width)
     	    .attr("y", 9)
      	    .attr("dy", ".35em")
      	    .style("text-anchor", "end")
     	    .text(function(d) { return d; });
});

</script>
