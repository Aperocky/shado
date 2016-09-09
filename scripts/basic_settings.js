window.onload = init;

function init() {
	console.log("Window has loaded!");
	// moment().format();
	calculate_time();
}

function calculate_time() {

//	Get times and calculate hour difference

	console.log("Time has changed!");
	var begin_time = get_date('begin');
	var end_time = get_date('end');
	var hours = get_hour_diff(begin_time, end_time);
	console.log("Hours = " + hours);

//	Store new times

	$('#begin_time').val(begin_time.format("h:mm A"));
	$('#end_time').val(end_time.format("h:mm A"));
	$('#num_hours').val(hours);

//	Empty traffic table

	$('#table').empty();
	var table = document.getElementById('table');
	var row = table.insertRow(0);

//	Insert hour columns

	for (i = 0; i < hours; i++) {
		var cell = row.insertCell(i);
		cell.innerHTML = "" +
		"<input type='radio' name=" + i + " value='h' id='load1'>High</input>"+
		"<br><input type='radio' name=" + i + " value='m' id='load1' checked>Med</input>"+
		"<br><input type='radio' name=" + i + " value='l' id='load1'>Low</input>";
	}

//	Change hour labels

	var hour_label = begin_time;
	// hour_label.minutes(0);
	var row = table.insertRow(1);
	for (i = 0; i < hours; i++) {
		var cell = row.insertCell(i);
		cell.innerHTML = hour_label.format("h A");
		hour_label.add(1, 'hour');
	}
}

//	Returns a date created from the specified input divison

function get_date(html_div) {
	var hr = $('#' + html_div + 'Hour').val();
	var min = $('#' + html_div + 'Min').val();
	var md = $('#' + html_div + 'Md').val();
	time = hr + ':' + min + ' ' + md;
	return moment("2016-01-01 " + time, "YYYY-MM-DD HH:mm A");
}

//	Returns the number of hours between two dates

function get_hour_diff(date1, date2) {
	if (date1 >= date2) date2.add(1, 'day');
	var mins = date2.diff(date1, 'minutes');
	return Math.ceil(mins / 60);
}

function check() {
	var id = document.getElementById('other').checked;
	if (id == 1){
		document.getElementById('custom').style.display = 'block';
	} else{
		document.getElementById('custom').style.display = 'none';
	}
}

// function setup_nav() {
// 	var navToStartTime = document.getElementById("navToStartTime");
// 	navToStartTime.onclick =
// 	console.log(navToStartTime);
// }

// function navClick(domElement) {
// 	if (domElement.id == "navToStartTime") {
// 		$('html, body').animate({
// 			scrollTop: $(".startEndTimeStepOuter").offset().top -120
// 		}, 500);
// 	}
// }
