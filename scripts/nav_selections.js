/****************************************************************************
*																			*
*	File:		nav_selections.js  											*
*																			*
*	Author:		Branch Vincent												*
*																			*
*	Date:		Sep 9, 2016													*
*																			*
*	Purpose:	This file highlights the current page in the various        *
*               navigation bars									            *
*																			*
****************************************************************************/

jQuery.noConflict()(function ($) {
    $(document).ready(setup_nav());
});

// $(setup_nav());
// function setup_nav() {
//
//     var url = document.location.href;
//     var str = url.substring(url.lastIndexOf('/') + 1);
//     console.log(str);
//     jQuery("#topNav li a").each(function() {
//         if (str.indexOf(this.href.toLowerCase()) > -1) {
//             jQuery("li.active").removeClass("active");
//             jQuery(this).parent().addClass("active");
//         }
//     });
//     jQuery("li.active").parents().each(function(){
//         if (jQuery(this).is("li")){
//             jQuery(this).addClass("active");
//         }
//     });
// }

/****************************************************************************
*																			*
*	Function:	setup_nav													*
*																			*
*	Purpose:	To highlight the current page in all navigation bars        *
*																			*
****************************************************************************/

function setup_nav() {

//  Get filename

    var url = document.location.href;
    var page = url.substring(url.lastIndexOf('/') + 1) || 'index.php';
    // if(!page) page = 'index.php';
    // console.log(page);

//  Select current file

    var top_tabs = jQuery('#topNav li a');
    // test.select(page);

//  Select active top tab

    var found = false;
    for (var i = 0; i < top_tabs.length; i++) {
        var href = jQuery(top_tabs[i]).attr('href');
        if ( (href == page) || (href == '') ) {
            jQuery(top_tabs[i]).addClass('active');
            found = true;
        } else {
            jQuery(top_tabs[i]).removeClass('active');
        }
    }
    if (!found) jQuery('#topNav li a[href="basic_settings.php"]').addClass('active');

//  Select active side tab

    var side_tabs = jQuery('#sideNav li a');
    // var test = jQuery('#sideNav accordion');
    for (var i = 0; i < side_tabs.length; i++) {
        var href = jQuery(side_tabs[i]).attr('href');
        if ( (href == page) || (href == '') ) {
            jQuery(side_tabs[i]).addClass('active');
            jQuery(side_tabs[i]).parent().addClass('show');
            jQuery(side_tabs[i]).parent().prev().addClass('active');
        } else {
            jQuery(side_tabs[i]).removeClass('active');
            jQuery(side_tabs[i]).parent().removeClass('show');
            jQuery(side_tabs[i]).parent().prev().removeClass('active');
        }
    }

//  Add animation to accordion-style side navigation links

    var acc = jQuery('.accordion');

    for (var i = 0; i < acc.length; i++) {
        acc[i].onclick = function() {
            this.classList.toggle('active');
            this.nextElementSibling.classList.toggle("show");
        }
    }

    // jQuery('#topNav li a').each(select(page));
}

/****************************************************************************
*									                                        *   
*	Function:	select														*
*																			*
*	Purpose:	To highlight the page that matches the specified url        *
*																			*
****************************************************************************/

function select(page) {
    var href = jQuery(this).attr('href');
    if ( (href == page) || (href == '') ) {
        jQuery(this).addClass('active');
    } else {
        jQuery(this).removeClass('active');
    }
}
