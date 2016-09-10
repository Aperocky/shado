/****************************************************************************
*																			*
*	File:		basic_settings.js  											*
*																			*
*	Author:		Branch Vincent												*
*																			*
*	Date:		Sep 9, 2016													*
*																			*
*	Purpose:	This file makes calculations for the basic input settings 	*
*				page.														*
*																			*
****************************************************************************/

jQuery.noConflict()(function ($) {
    $(document).ready(init());
});

/****************************************************************************
*																			*
*	Function:	init														*
*																			*
*	Purpose:	To initialize the page with the correct traffic table size 	*
*																			*
****************************************************************************/

function init() {
	console.log("Window has loaded!");
	calculate_time();
}

/****************************************************************************
*																			*
*	Function:	calculate_time												*
*																			*
*	Purpose:	To calculate the time difference between the provided 		*
*				inputs														*
*																			*
****************************************************************************/

function calculate_time() {

//	Get times and calculate hour difference

	var begin_time = get_date('begin');
	var end_time = get_date('end');
	var hours = get_hour_diff(begin_time, end_time);
	console.log("Hours = " + hours);

//	Store new times

	jQuery('#begin_time').val(begin_time.format("h:mm A"));
	jQuery('#end_time').val(end_time.format("h:mm A"));
	jQuery('#num_hours').val(hours);

//	Empty traffic table

	jQuery('#table').empty();
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

/****************************************************************************
*																			*
*	Function:	get_date													*
*																			*
*	Purpose:	To create a date from the current input in the specified 	*
*				html division		 										*
*																			*
****************************************************************************/

function get_date(html_div) {
	var hr = jQuery('#' + html_div + 'Hour').val();
	var min = jQuery('#' + html_div + 'Min').val();
	var md = jQuery('#' + html_div + 'Md').val();
	time = hr + ':' + min + ' ' + md;
	return moment("2016-01-01 " + time, "YYYY-MM-DD HH:mm A");
}

/****************************************************************************
*																			*
*	Function:	get_hour_diff												*
*																			*
*	Purpose:	To calculate the number of hours between the two 			*
*				specified dates 											*
*																			*
****************************************************************************/

function get_hour_diff(date1, date2) {
	if (date1 >= date2) date2.add(1, 'day');
	var mins = date2.diff(date1, 'minutes');
	return Math.ceil(mins / 60);
}

/****************************************************************************
*																			*
*	Function:	check														*
*																			*
*	Purpose:	To toggle the visibility of the custom operator settings 	*
*																			*
****************************************************************************/

function check() {
	var id = document.getElementById('other').checked;
	if (id == 1){
		document.getElementById('custom').style.display = 'block';
	} else{
		document.getElementById('custom').style.display = 'none';
	}
}
