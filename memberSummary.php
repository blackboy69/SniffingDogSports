<?php
/**
 * Sniffing Dog Sports - Member Summary page
 * July 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("classes/SDS.php");
?>

<!--member summary page/section-->

<div class="plaque">
	<div class="headline">
		<?=$handler->fullname()." &bull; Member Summary"?>
	</div>
	<div class="content" style="font-size:large;color:black;">
		<h1 class="hiliteFG">Summary of your Membership</h1>
		<!--p style="text-align:center;">
			<button class="btn btn-lg btn-primary"
				title="Click to Register as a Member"><span
				class="glyphicon glyphicon-edit"></span> Register
			</button>
		&nbsp;&nbsp;
			<button class="btn btn-lg btn-success"
				onclick="dispatcher('contentSection','login')"
				title="Click to Login as a Member"><span
				class="glyphicon glyphicon-lock"></span> Login
			</button>
		</p-->
		<p>&nbsp;</p>
	</div>
</div>
