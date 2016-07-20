<?php
/**
 * Sniffing Dog Sports - Navigation section
 * July 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("classes/SDS.php");

?>

<? if ($_SESSION['mode'] == 'p') { ?>

<!--public navigation menu-->

<nav class="navbar navbar-default plaqueBG">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#"><?=$SDS->brand?></a>
		</div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">

			<li><a href="#" title="Return to the Home page"
				   onclick="dispatcher('contentSection','publicSplash')"><span
				   class="glyphicon glyphicon-home"></span> Home<span
				   class="sr-only">(current)</span></a></li>

			<li><a href="#" title="Who we are and why we do this"><span
					class="glyphicon glyphicon-globe"></span> Our Mission</a></li>
			
			<li><a href="#" title="Events we sponsor and score"><span
					class="glyphicon glyphicon-time"></span> Our Trials</a></li>
			
			<li><a href="#" title="Register with Sniffing Dog Sports"><span
					class="glyphicon glyphicon-edit"></span> Register</a></li>
			
			<li><a href="#" title="Contact us via Email"
				   onclick="dispatcher('contentSection','contact')"><span
				   class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
				   title="Map of our site resources"
				   accesskey="" aria-expanded="false"><span
					class="glyphicon glyphicon-th-list"></span> Site Map <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="#">Home page</a></li>
					<li><a href="#">Our Mission</a></li>
					<li><a href="#">Our Trials</a></li>
					<li class="divider"></li>
					<li><a href="#">Register</a></li>
					<li><a href="#" onclick="dispatcher('contentSection','contact')">Contact Us</a></li>
					<li class="divider"></li>
					<li><a href="#" onclick="dispatcher('contentSection','login')">Login</a></li>
				</ul>
			</li>
		
		</ul>
		
		<ul class="nav navbar-nav navbar-right">

			<li><button class="btn btn-success" style="margin-top:8px"
					onclick="dispatcher('contentSection','login')"
					title="Click to Login"><span
					class="glyphicon glyphicon-log-in"></span> Login</button></li>

		</ul>
    </div>
	</div>
</nav>

<script type='text/javascript'>
	mode = 'p';	// set mode to Public
</script>

<? } ?>

<? if ($_SESSION['mode'] == 'm') { ?>

<!--member navigation menu-->

<nav class="navbar navbar-default plaqueBG">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#"><?=$member->fullname()?></a>
		</div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">

			<li><a href="#" title="Account summary"
					onclick="dispatcher('contentSection','memberSummary')"><span
					class="glyphicon glyphicon-th-list"></span> Summary<span
					class="sr-only">(current)</span></a></li>

			<li><a href="#" title="View / Change your Member Profile"><span
					class="glyphicon glyphicon-user"></span> Your Profile</a></li>

			<li><a href="#" title="View / Change your Dogs"><span
					class="glyphicon glyphicon-heart"></span> Your Dogs</a></li>

			<li><a href="#" title="Trials and Results"><span
					class="glyphicon glyphicon-time"></span> Trials</a></li>

			<li><a href="#" title="Contact us via Email"
				   onclick="dispatcher('contentSection','contact')"><span
				   class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>

		</ul>
		
		<ul class="nav navbar-nav navbar-right">

			<li><button class="btn btn-success" style="margin-top:8px"
					onclick="dispatcher('contentSection','logout')"
					title="Click to Logout">Logout <span
					class="glyphicon glyphicon-log-out"></span></button></li>
		</ul>
    </div>
	</div>
</nav>

<script type='text/javascript'>
	mode = 'm';	// set mode to Members
</script>

<? } ?>

<? if ($_SESSION['mode'] == 'a') { ?>

<!--administrator navigation menu-->

<nav class="navbar navbar-default plaqueBG">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#"><?=$member->fullname()." [admin]"?></a>
		</div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			
			<li><a href="#" title="Database summary"
				   onclick="dispatcher('contentSection','adminSummary')"><span
				   class="glyphicon glyphicon-th-list"></span> Summary<span
				   class="sr-only">(current)</span></a></li>
			
			<li><a href="#" title="Review / Change Members"><span
					class="glyphicon glyphicon-user"></span> Our Members</a></li>
			
			<li><a href="#" title="Schedule / Review Trials"><span
					class="glyphicon glyphicon-time"></span> Our Trials</a></li>
			
			<li><a href="#" title="Review Titles / Standings"><span
					class="glyphicon glyphicon-certificate"></span> Our Titles</a></li>

			<li><a href="#" title="Export Trial Spreadsheet"><span
					class="glyphicon glyphicon-export"></span> Export</a></li>
			
			<li><a href="#" title="Import Trial Spreadsheet"><span
					class="glyphicon glyphicon-import"></span> Import</a></li>
			
			<li><a href="#" title="Queries / Reports"><span
					class="glyphicon glyphicon-duplicate"></span> Reports</a></li>
			
			<li><a href="#" title="Maintain Our News"><span
					class="glyphicon glyphicon-film"></span> News</a></li>
			
		</ul>
		
		<ul class="nav navbar-nav navbar-right">
			
			<li><button class="btn btn-success" style="margin-top:8px"
					onclick="dispatcher('contentSection','logout')"
					title="Click to Logout">Logout <span
					class="glyphicon glyphicon-log-out"></span></button></li>
		</ul>
    </div>
	</div>
</nav>

<script type='text/javascript'>
	mode = 'a';	// set mode to Administrator
</script>

<? } ?>
