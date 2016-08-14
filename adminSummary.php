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
		<h2 class="hiliteFG">Summary of Our Database</h2>
		<center>
		<div class="well" style="width:70%">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Name of Table:</th>
					<th># Records:</th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach ($db->statistics() as $name=>$records) {
					$tableName = ucfirst($name);
					echo "<tr><td>$tableName</td><td>$records</td></tr>\n";
					}
			?>
			</tbody>
		</table>
		</div>
		</center>

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

<script type="text/javascript">
	returnto = "adminSummary";
</script>
