<?php
/**
 * Sniffing Dog Sports - Public Splash page
 * July 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("classes/SDS.php");
?>

<!--public splash page/section-->

<div class="plaque"><div class="content" style="font-size:large;color:black;">
	<img src="/media/banner.jpg" width="100%" style="margin-bottom:1em">
	<h1 class="hiliteFG">Sniffing Dog Sports Nosework Titling Program</h1>
	<p>Welcome!</p>
	<p>Sniffing Dog Sports (SDS) is a sanctioning organization for the sport of Nosework.
	   SDS is dedicated to meeting the growing demand for opportunities to compete in
	   sport detection.</p>
	<p>Sniffing Dog Sports (SDS) was developed with two clear goals in mind:</p>
	<ol>
		<li>To provide searches that mirror professional work and innovative sniffing games</li>
		<li>To create a friendly and inclusive organization with a reputation for being
			approachable and having a sense of humor</li>
	</ol>
	<p>SDS offers many benefits:</p>
	<ul>
		<li>The odors are the traditional birch, anise, and clove.</li>
		<li>There are four challenging levels of competition.</li>
		<li>Handlers may &ldquo;bank&rdquo; every qualifying scoring toward a title.</li>
		<li>Handlers may enter trials at any level they choose regardless of titles
			earned in other organizations.</li>
		<li>No ORT is required to leap in.</li>
		<li>The trial chair and key volunteers may compete in their own trials.</li>
		<li>We believe in our motto &#8211; We are serious about sniffing but we are not serious.
	</ul>
	<p>Join SDS right away and join the fun. For a lifetime registration for your dog
		and an annual registration for yourself, click on any Register link.</p>
	<p style="text-align:center;">
		<button class="btn btn-lg btn-primary"
			onclick="dispatcher('contentSection','memberEdit')"
			title="Click to Register as a Member"><span
			class="glyphicon glyphicon-edit"></span> Register</button>
		&nbsp;&nbsp;
		<button class="btn btn-lg btn-success"
			onclick="dispatcher('contentSection','login')"
			title="Click to Login as a Member"><span
			class="glyphicon glyphicon-log-in"></span> Login</button>
	</p>
	<p>&nbsp;</p>
</div></div>
