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
			<li class="active"><a href="#" title="Return to the Home page"
				><span class="glyphicon glyphicon-home"></span> Home<span
				  class="sr-only">(current)</span></a></li>
			<li><a href="#" title="Who we are and why we do this"><span
					class="glyphicon glyphicon-globe"></span> Our Mission</a></li>
			<li><a href="#" title="Events we sponsor and score"><span
					class="glyphicon glyphicon-time"></span> Our Trials</a></li>
			<li><a href="#" title="Register with Sniffing Dog Sports"><span
					class="glyphicon glyphicon-edit"></span> Register</a></li>
			<li><a href="#" title="Contact us via Email, Phone and Mail"><span
					class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
				   title="Map of our site resources"
				   accesskey="" aria-expanded="false"><span
					class="glyphicon glyphicon-list"></span> Site Map <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="#">Home page</a></li>
					<li><a href="#">Our Mission</a></li>
					<li><a href="#">Our Trials</a></li>
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
			<button type="submit" class="btn btn-default"><span
				class="glyphicon glyphicon-search"></span> Search</button>
		</form>
		<ul class="nav navbar-nav navbar-right">
			<li><button class="btn btn-success" style="margin-top:8px"
					title="Click to Login"><span
					class="glyphicon glyphicon-lock"></span> Login</button></li>
		</ul>
    </div>
	</div>
</nav>

<script type='text/javascript'>
mode = 'p';
</script>

<? } ?>