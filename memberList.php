<?php
/**
 * Sniffing Dog Sports - Member Listing page
 * August 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("classes/SDS.php");
$_SESSION['prior'] = "memberList";

?>

<div class="plaque">
	<div class="headline">
		Member Listing
	</div>

	<div class="content">

	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Sniffing Dog Sports members on File:
				<button type="submit" id="add_id" name="add"
					style="float:right;"
					onclick="return editMember()"
					class="btn btn-primary btn-xs">Add Member</button>
			</h3>
		</div>
		<div id="listingContent_id" class="panel-body">
			<table id="members_id" class="table table-striped table-bordered"
				cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Edit</th>
						<th>#</th>
						<th>Type</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>City</th>
						<th>State</th>
						<th>Phone</th>
						<th>Anniversary</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$memberList = Members::summaryList();
					foreach ($memberList as $member) {
						$phone = $member[7] ? $member[7] : $member[6];
						echo	"<tr id='m_{$member[0]}'>",
								"<td align='center'>",
									"<a href='#' title='Change'",
									" onclick='return editMember(this)'>",
									"<span class=\"glyphicon glyphicon-edit\">",
									"</span>",
									"</a></td>",
								"<td>{$member[0]}</td>",
								"<td>{$member[1]}</td>",
								"<td>{$member[2]}</td>",
								"<td>{$member[3]}</td>",
								"<td>{$member[4]}</td>",
								"<td>{$member[5]}</td>",
								"<td>{$phone}</td>",
								"<td>{$member[8]}</td>",
								"</tr>\n";
						}
				?>
				</tbody>
			</table>
		</div>
	</div>

	</div>
</div>

<script type='text/javascript'>

// add/edit the selected member:

function editMember(obj) {
	var id = obj ? $(obj).closest('tr').attr('id').substring(2) : null;
	dispatcher('contentSection','memberEdit',{member:id});
	return false;
	}

// initialize the member table display:

$('#members_id').DataTable();

</script>
