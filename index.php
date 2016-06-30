<?php
/**
 * Sniffing Dog Sports - Index page
 * June 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("classes/SDS.php");
?>
<!DOCTYPE html>
<html class="pageColor">
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
    <link href="/yourshowcase/ClassLibrary/bootstrap/css/bootstrap.lumen.min.css" rel="stylesheet">
    <link href="/sds.members.css" rel="stylesheet">
</head>
<body class="pageColor">

<div id="wrap"><div id="main" clear-top>

<div id="navigationSection"><!--begin navigation section-->
	
<nav class="navbar navbar-default plaqueColor">
	<div class="container-fluid">
		<div class="navbar-header">
		<a class="navbar-brand" href="#"><?=$SDS->brand?></a>
		</div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
			<li><a href="#">Our Mission</a></li>
			<li><a href="#">Our Services</a></li>
			<li><a href="#">Register</a></li>
			<li><a href="#">Contact Us</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
				   accesskey="" aria-expanded="false">Pages <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="#">Home page</a></li>
					<li><a href="#">Our Mission</a></li>
					<li><a href="#">Our Services</a></li>
					<li class="divider"></li>
					<li><a href="#">Register</a></li>
					<li><a href="#">Contact Us</a></li>
					<li class="divider"></li>
					<li><a href="#">Login</a></li>
				</ul>
			</li>
		</ul>
		<form class="navbar-form navbar-left" role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search for ...">
			</div>
			<button type="submit" class="btn btn-default">Search</button>
		</form>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#">Login</a></li>
		</ul>
    </div>
	</div>
</nav>

</div><!--end navigation section-->

<!--begin main content section-->
	<h1><?="{$SDS->brand} {$SDS->version}"?></h1>
	<h2>Coming soon !</h2>
<!--end main content section-->

</div></div>

<footer id="footerSection" class="footer"><!--begin footer section-->
	<?="$SDS->brand &bull; $SDS->description &bull; $SDS->version &bull; $SDS->copyright"?>
</footer><!--end footer section-->

<!--javascript & code goes here-->

<script type="text/javascript" src="/jquery/jquery.js"></script>
<script type="text/javascript" src="/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">

// create a current date string:
var monthNames = new Array(
	"January","February","March","April","May","June","July","August","September","October","November","December"
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

// load dynamic content into the transient area:
function loadTransient(frompage,passdata) {
	var scriptName = frompage + ".php";
	$('#transient').load(scriptName,passdata);
	}

// we have loaded all the things:
$(document).ready(function(){
	showClock();
	loadTransient("homepage");
	});

</script>

</body>
</html>
