
window.onload = init;

function init() {
	console.log("Window has loaded!");
	calculate_time();
	setup_nav();
}	

// function setup_nav() {
// 	var navToStartTime = document.getElementById("navToStartTime");
// 	navToStartTime.onclick = 
// 	console.log(navToStartTime);

// }

function navClick(domElement) {

	if (domElement.id == "navToStartTime") {
		$('html, body').animate({
			scrollTop: $(".startEndTimeStepOuter").offset().top -120
		}, 500);
	}

}

function scrollTo(domElement) {

}

function calculate_time(divName) {			

	console.log("time changed!");

	var starttime=document.getElementById("start_time");	
	var stoptime=document.getElementById("stop_time");	

	var startHour = document.getElementById('startHour');
	var startMin = document.getElementById('startMin');
	var startAmpm = document.getElementById('startAmpm');

	var endHour = document.getElementById('endHour');
	var endMin = document.getElementById('endMin');
	var endAmpm = document.getElementById('endAmpm');

	// if(! starttime)
	// {
	// 	return 0;
	// }

	// if(! stoptime)
	// {
	// 	return -1;
	// }

	// var time=document.getElementById("start_time").value;	
	// ind=time.indexOf(":");
	// len=time.length;

	var start_hours= parseFloat(startHour.value); //parseFloat(time.slice(0,ind));
	var start_minutes= parseFloat(startMin.value); //parseFloat(time.slice(ind+1,len));
	var start_ampm = startAmpm.value;
	var start_time_string = get24TimeString(start_hours, start_minutes, start_ampm);
	starttime.value = start_time_string;

	if (start_ampm == 'AM') {
		if (start_hours == 12) {
			start_hours = 0;
		}
	} else {
		if (start_hours < 12) {
			start_hours += 12;
		}
	}
	console.log("start_hours=", start_hours);

	// var time=document.getElementById("stop_time").value;	
	// ind=time.indexOf(":");
	// len=time.length;
	var stop_hours= parseFloat(endHour.value); //parseFloat(time.slice(0,ind));
	var stop_minutes= parseFloat(endMin.value); //parseFloat(time.slice(ind+1,len));
	var stop_ampm = endAmpm.value;
	var stop_time_string = get24TimeString(stop_hours, stop_minutes, stop_ampm);
	stoptime.value = stop_time_string;
	if (stop_ampm == 'AM') {
		if (stop_hours == 12) {
			stop_hours = 0;
		}
	} else {
		if (stop_hours < 12) {
			stop_hours += 12;
		}
	}
	console.log("stop_hours=", stop_hours);

	total_hours = stop_hours-start_hours;


	if (total_hours <= 0) {
		total_hours+=24;
	}

	total_time=60-start_minutes+stop_minutes+(total_hours-1)*60;
	total_time=Math.ceil(total_time/60);
	
	
	
	var divobj = document.getElementById('totalTime');
	
	divobj.innerHTML="<table id='table' class='trafficTable' border='1'><tr>";
	
	var table=document.getElementById('table');
	var row=table.insertRow(0);
	for(i=0; i<total_time; i++)
	{
		var cell=row.insertCell(i);
		cell.innerHTML = "" +
		"<input type='radio' name="+i+" value='h' id='load1'>High</input>"+
		"<br><input type='radio' name="+i+" value='m' id='load1' checked>Med</input>"+
		"<br><input type='radio' name="+i+" value='l' id='load1'>Low</input>";
		
	}
	
	var row=table.insertRow(1);
	row.className += " tableTrafficHour"
	for(i=0; i<total_time; i++)
	{
		var str="";
		
		if (i==0){str=str+"st ";}
		if (i==1){str=str+"nd ";}
		if (i==2){str=str+"rd ";}
		if (i>2){str=str+"th ";}
		
		var cell=row.insertCell(i);
		cell.innerHTML="Hour "+(i+1);
		
	}

		
	var divobj = document.getElementById('assist');
	divobj.innerHTML="<h3 id='assistants'>Assistants</h3><table id='assistantsTable' cellspacing='0' >"; //cellpadding='100'
	var table=document.getElementById('assistantsTable');
	var row=table.insertRow(0);
	var cell1=row.insertCell(0);
	var cell2=row.insertCell(1);
	var cell3=row.insertCell(2);
	var cell4=row.insertCell(3);
	cell1.innerHTML="<input type='checkbox' name='extra1' value='1' id='conductor' />Conductor";
	cell2.innerHTML="<input type='checkbox' name='extra2' value='2' id='train_c' />Positive Train Control";
	cell3.innerHTML="<input type='checkbox' name='extra3' value='3' id='cruise_control' />Cruise Control";
	cell4.innerHTML="<input type='checkbox' name='extra4' value='4' id='other'>Other";
		

	var divobj = document.getElementById('refresh');
	console.log(divobj);
	//divobj.innerHTML="<button onclick='window.location.href=window.location.href'>Refresh</button>";
	
	//document.getElementById("start_time").readOnly=true;
	//document.getElementById("stop_time").readOnly=true;
}

// Requires hours and minutes to be numbers,
// and ampm to be the string 'AM' 'am' 'PM' or 'pm'.
function get24TimeString(hours, minutes, ampm) {

	if (ampm == 'AM' || ampm == 'am') {
		if (hours == 12) {
			hours = 0;
		}
	} else {
		if (hours < 12) {
			hours += 12;
		}
	}

	return leftZeroPad2(hours) + ':' + leftZeroPad2(minutes); 

}

function leftZeroPad2(num) {
	return ("00" + num).slice(-2);
}