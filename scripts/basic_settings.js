/****************************************************************************
*																			*
*	File:		basic_settings.js  											*
*																			*
*	Author:		Branch Vincent												*
*																			*
*	Date:		Sep 9, 2016
*
* 	Editor:		Rocky Li, edited Sep 26, 2017
*
*	Purpose:	This file makes calculations for the basic input settings
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
	// calculate_time();
    init_hour_labels();
    toggle_custom_settings();
}

/****************************************************************************
 *
 *	Function:	calculate_train
 *
 *	Purpose:	Calcuate the amount of trains given input
 *
 ****************************************************************************/

function calculate_train() {

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
		cell.innerHTML = "";
		cell.innerHTML += "<input type='radio' name=traffic_level_" + i + " value='h'>High</input>"
		cell.innerHTML += "<br><input type='radio' name=traffic_level_" + i + " value='m' checked>Med</input>"
		cell.innerHTML += "<br><input type='radio' name=traffic_level_" + i + " value='l'>Low</input>";
	}

//	Change hour labels

	var hour_label = begin_time;
	var row = table.insertRow(1);
	for (i = 0; i < hours; i++) {
		var cell = row.insertCell(i);
		cell.innerHTML = hour_label.format("h A");
		hour_label.add(1, 'hour');
	}

//  Add animation to custom assistant

    // var custom = jQuery('#custom_assistant');
    // custom.onclick = function() {
    //     jQuery('#custom_assistant_settings').toggleClass('hide');
    // }
}

/****************************************************************************
*																			*
*	Function:	init_hour_labels										    *
*																			*
*	Purpose:	To toggle the visibility of the custom operator settings 	*
*																			*
****************************************************************************/

function init_hour_labels() {
    var begin_time = jQuery('#begin_time').val();
    console.log(begin_time);
    var hour_label = moment("2016-01-01 " + begin_time, "YYYY-MM-DD HH:mm A");
    var traffic_table = document.getElementById('traffic_level_labels');
    for (var i = 0; i < jQuery('#num_hours').val(); i++) {
        var cell = traffic_table.insertCell(i);
        cell.innerHTML = hour_label.format("h A");
        hour_label.add(1, 'hour');
    }
    jQuery('#table').removeClass('remove');
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
*	Function:	toggle_custom_settings										*
*																			*
*	Purpose:	To toggle the visibility of the custom operator settings 	*
*																			*
****************************************************************************/

function toggle_custom_settings() {
    var checked = jQuery('#custom_assistant').prop('checked') ;
    if (checked)
        jQuery('#custom_assistant_settings').removeClass('remove');
    else
        jQuery('#custom_assistant_settings').addClass('remove');

    // console.log(test);
    // if (jQuery('#custom_assistant'))
    // jQuery('#custom_assistant_settings').toggleClass('hide');
}
