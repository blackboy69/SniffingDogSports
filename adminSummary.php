<?php
/**
 * Sniffing Dog Sports - Administrator Summary page
 * July 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("classes/SDS.php");
?>

<!--member summary page/section-->

<div class="plaque">
	<div class="headline">
		<?=$SDS->brand." &bull; Administrative / Database Summary"?>
	</div>
	<div class="content" style="font-size:large;color:black;">
		<h1 class="hiliteFG">Summary of Our Database</h1>
		<p style="text-align:center;">
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
		</p>
		<p>&nbsp;</p>
	</div>
</div>
