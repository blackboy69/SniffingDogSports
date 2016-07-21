<?php
/**
 * Sniffing Dog Sports - Index page & container
 * July 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("classes/SDS.php");
?>
<!DOCTYPE html>
<html class="pageBG">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Harley Puthuff">
    <meta name="description" content="Sniffing Dog Sports - Members">
    <meta name='copyright' content='Copyright 2016. All Rights Reserved.'>
    <title><?="{$SDS->brand} {$SDS->version}"?></title>
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <link href="/yourshowcase/ClassLibrary/bootstrap/css/bootstrap.lumen.min.css" rel="stylesheet" />
	<link href="/yourshowcase/ClassLibrary/bootstrap/NewsScroller/css/site.css"	rel="stylesheet" type="text/css" />
    <link href="/sds.members.css" rel="stylesheet" />
</head>
<body class="pageBG">

<!--Navigation section (menus)-->

<div id="navigationSection"></div>

<!--begin main content section-->
<div id="containerSection" class="container-fluid">
<div class="row">

	<!--begin sidebar section-->
	<div class="col-md-3">
		<div id="sidebarSection"></div>
		<div id="clock"></div>
	</div>
	<!--end sidebar section-->

	<!--begin content section-->
		<div id="contentSection" class="col-md-9"></div>
	<!--end content section-->
		
</div>
</div>
<!--end main content section-->

<!--begin footer section-->
<div id="footerSection">
	<?="$SDS->brand &bull; $SDS->description &bull; $SDS->version &bull; $SDS->copyright"?>
</div>
<!--end footer section-->

<!--javascript & code goes here-->

<script type="text/javascript" src="/jquery/jquery.js"></script>
<script type="text/javascript" src="/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript"
	src="/yourshowcase/ClassLibrary/bootstrap/NewsScroller/scripts/jquery.bootstrap.newsbox.min.js"
	type="text/javascript"></script>

<script type="text/javascript">

// application-wide variables:

var mode = "<?=$_SESSION['mode']?>";		// current mode: null,p,m or a
var member = "<?=$_SESSION['member']?>";	// current member id
var dog = "<?=$_SESSION['dog']?>";			// current dog id
var trial = "<?=$_SESSION['trial']?>";		// current trial id

// create a current date string:

var monthNames = new Array(
	"January","February","March","April","May","June","July",
	"August","September","October","November","December"
	);
var weekDays = new Array(
	"Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"
	);
function showClock() {
	var now = new Date();
	var hours = now.getHours();
	var meridian = "AM";
	var minutes = now.getMinutes().toString();
	var seconds = now.getSeconds().toString();
	if (minutes.length < 2) minutes = "0" + minutes;
	if (seconds.length < 2) seconds = "0" + seconds;
	if (hours == 0) hours = 12;
		else
			if (hours == 12) meridian = "PM";
				else
					if (hours > 12) {hours -= 12; meridian = "PM";}
	var dateString = '' + weekDays[now.getDay()] + ', ' +
		(hours + ':' + minutes + ' ' + meridian) + '<br>' +
		monthNames[now.getMonth()] + ' ' + now.getDate() + ', ' + now.getFullYear();
	$('#clock').html(dateString);
	setTimeout('showClock()',30000);
	}

// dispatch dynamic content into sections:

function dispatcher(destination,source,passdata) {
	var section = $('#'+destination);
	var scriptName = source+".php";
	section.load(scriptName,passdata);
	}

// return to the home page for the mode in use:

function returnHome() {
	var homePage;
	if (mode == 'p')
		homePage = 'publicSplash';
	else
	if (mode == 'm')
		homePage = 'memberSplash';
	else
	if (mode == 'a')
		homePage = 'adminSplash';
	else
		homePage = 'publicSplash';
	dispatcher('contentSection',homePage);
	}

// load the 'panes' for the mode in use at the time:

function loadAllTheThings() {
	if (mode == 'm') {		// member mode
		dispatcher("navigationSection","navigator");
		dispatcher("sidebarSection","memberSidebar");
		dispatcher("contentSection","memberSummary");
		}
	else
	if (mode == 'a') {		// administrator mode
		dispatcher("navigationSection","navigator");
		dispatcher("sidebarSection","adminSidebar");
		dispatcher("contentSection","adminSummary");
		}
	else {					// public mode
		dispatcher("navigationSection","navigator");
		dispatcher("sidebarSection","publicSidebar");
		dispatcher("contentSection","publicSplash");
		}
	}

// we are loading all the things:

$(document).ready(function(){
	loadAllTheThings();
	showClock();
	});

</script>

</body>
</html>
