<?php
/**
 * Sniffing Dog Sports - Logout of mode
 * July 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("classes/SDS.php");

$_SESSION['mode']		= 'p';	// return to public mode
$_SESSION['boss']		= null;
$_SESSION['member']		= null;
$_SESSION['dog']		= null;
$_SESSION['trial']		= null;

?>

<center>
<div class="plaque" style="margin-top:5em;width:70%;">
	<div class="headline">Logout</div>
	<div class="content">
		<img src="/media/logout.png" width="160" style="float:right">
		<h3 class='hiliteFG'>You have been logged out.</h3>
		<p>Please come back soon!</p>
		<div style="clear:both"></div>
	</div>
</div>
</center>

<script type="text/javascript">
mode = 'p';	// back to public mode
handler = dog = trial = null;
dispatcher("navigationSection","navigator");
dispatcher("sidebarSection","publicSidebar");
setTimeout(function () {
	dispatcher("contentSection","publicSplash");
    },1000);
</script>
