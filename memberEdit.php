<?php
/**
 * Sniffing Dog Sports - Member Edit page
 * July 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("classes/SDS.php");
$fullname = $member ? $member->fullname() : "";
$referenced = Date::toExternal($member->referenced,LONGDATE);
?>

<!--member summary page/section-->

<div class="plaque">
	<div class="headline">
		<?="$fullname &bull; Member Profile"?>
	</div>
	<div class="content" style="font-size:large;color:black;">
		<h3 class="hiliteFG">Membership Profile</h3>
		<p>&nbsp;</p>
		<form class="form-horizontal">
		<fieldset>
		<div class="form-group">
			<label class="col-md-4 control-label" for="memberID"></label>
			<div class="col-md-4">
				<div class="input-group">
					<span class="input-group-addon">Membership #</span>
					<input id="memberID" name="member" class="form-control"
						value="<?=$member->member?>" type="text" readonly>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="type_id">Type</label>
			<div class="col-md-4">
				<?=Html::select("type",Members::$types,$member->type,true,"form-control")?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="status_id">Status</label>
			<div class="col-md-4">
				<?=Html::select("status",Members::$statuses,$member->status,true,"form-control")?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="referencedID">Changed</label>  
			<div class="col-md-5">
				<input id="referencedID" name="referenced" type="text"
					class="form-control input-md" value="<?=$referenced?>" readonly>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-8" style="text-align:center;">
				<button id="submitID" name="update" class="btn btn-primary">Submit</button>
			    <button id="cancelID" name="cancel" class="btn btn-default">Cancel</button>
			</div>
		</div>
		</fieldset>
		</form>
	</div>
</div>
