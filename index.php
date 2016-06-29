<?php
/**
 * Sniffing Dog Sports - Index page
 * June 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("classes/SDS.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Harley Puthuff">
    <meta name="description" content="Sniffing Dog Sports - Members">
    <meta name='copyright' content='Copyright 2016. All Rights Reserved.'>
    <title><?="{$SDS->brand} {$SDS->version}"?></title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    <link href="/yourshowcase/ClassLibrary/bootstrap/css/bootstrap.lumen.min.css" rel="stylesheet">
    <link href="/sds.members.css" rel="stylesheet">
</head>
<body style="text-align:center">
	
<nav class="navbar navbar-default plaque">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Sniffing Dog Sports</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
      </ul>
    </div>
  </div>
</nav>

	<div><?="{$SDS->brand} {$SDS->version}"?></div>
	<div>Coming soon !</div>

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
