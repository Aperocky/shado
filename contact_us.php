<?php
/****************************************************************************
*																			*
*	File:		contact_us.php  											*
*																			*
*	Author:		Branch Vincent												*
*																			*
*	Date:		Sep 9, 2016													*
*																			*
*	Purpose:	This file sets the contact us page.							*
*																			*
****************************************************************************/

//	Initialize session

	require_once('includes/session_management/init.php');

//	Include page header

	$page_title = 'Contact Us';
	require_once('includes/page_parts/header.php');
?>
			<div id="contactPage" class="page">
				<h1 class="pageTitle">Contact Us</h1>
				<p>
					We highly value any questions or comments. To reach us, leave a message below. Thanks!
				</p>
				<div id="contactForm">
					<form id="contactFormInner" action="mailto:vcn3@duke.edu" method="post">
						<strong>Name:</strong> <br><input type="text" name="name"><br><br>
						<!-- <strong>Employer:</strong> <br><input type="text" name="employer"><br><br> -->
						<strong>Email:</strong> <br><input type="text" name="email"><br><br>
						<strong>Your Message:</strong> <br><textarea rows="4" cols="50" name="message"></textarea><br><br>
						<input class="button" type="submit" value="Send Message" style="color: black;">
					</form>
				</div>
			</div>
<?php require_once('includes/page_parts/footer.php');?>
