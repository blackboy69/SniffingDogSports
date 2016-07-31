<?php
/**
 * Sniffing Dog Sports - Member Edit page
 * July 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("classes/SDS.php");

$formSubmitted = false;

// check for submission

if ($_REQUEST['email']) {
	if ($_SESSION['mode']=='p' && ($_REQUEST['captcha'] != $_SESSION['captcha'])) {
		echo "<h1>** Improper Code Entered !!</h1>\n";
		exit;
		}
	$formSubmitted = true;
	$member = new Members($_REQUEST['member']);
	$member->merge($_REQUEST);
	$member->referenced = null;
	$member->store();
 	}

if ($member) {
	$fullname = $member->fullname();
	$sectionHeading = "Membership Profile";
	}
else {
	$fullname = "";
	$sectionHeading = "Membership Application";
	}
$referenced = Date::toExternal($member->referenced,LONGDATE);

?>

<? if ($formSubmitted) { ?>

<div class='plaque'>
	<div class='headline'>
		Member <?=$member->member?> has been recorded
	</div>
	<div class='content'>
		<p>Member ID: <?=$member->member?></p>
		<p>Member Name: <?=$fullname?></p>
	</div>
</div>

<? } else { ?>

<!--member edit/register form-->

<div class="plaque">
	<div class="headline">
		<?="$fullname &bull; Member Profile"?>
	</div>
	<div class="content" style="font-size:large;color:black;">
		<h3 class="hiliteFG">
			<?=$sectionHeading?>
			<span class='required'> [= required]</span>
		</h3>
		<p>&nbsp;</p>
		<form class="form-horizontal" onsubmit="memberFormSubmission(this);return false;">
		<fieldset>

<? if ($_SESSION['mode']=='a') { ?>

		<div class="form-group">
			<label class="col-md-4 control-label" for="member_id"></label>
			<div class="col-md-4">
				<div class="input-group">
					<span class="input-group-addon">Membership #</span>
					<input id="member_id" name="member" class="form-control"
						value="<?=$member->member?>" type="text" readonly>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="referenced_id"></label>  
			<div class="col-md-4">
				<div class="input-group">
					<span class="input-group-addon">Updated at</span>
					<input id="referenced_id" name="referenced" type="text"
						class="form-control" value="<?=$referenced?>" readonly>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="type_id">Type</label>
			<div class="col-md-4">
				<?=Html::select(
					"type",
					Members::$types,
					$member->type,
					true,
					"form-control input-lg"
					)?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="status_id">Status</label>
			<div class="col-md-4">
				<?=Html::select(
					"status",
					Members::$statuses,
					$member->status,
					true,
					"form-control input-lg"
					)?>
			</div>
		</div>

<? } else { ?>

		<input type="hidden" id="member_id" name="member">
		<input type="hidden" id="referenced_id" name="referenced">
		<input type="hidden" id="type_id" name="type" value="Member">
		<input type="hidden" id="status_id" name="status" value="Pending">

<? } ?>

		<div class="form-group">
			<label class="col-md-4 control-label" for="salutation_id">Salutation</label>
			<div class="col-md-4">
				<?=Html::select(
					"salutation",
					Members::$salutations,
					$member->salutation,
					true,
					"form-control input-lg"
					)?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required" for="firstname_id">First name</label>  
			<div class="col-md-5">
				<input id="firstname_id" name="firstname" type="text"
					class="form-control input-lg" value="<?=$member->firstname?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required" for="lastname_id">Last name</label>  
			<div class="col-md-5">
				<input id="lastname_id" name="lastname" type="text"
					class="form-control input-lg" value="<?=$member->lastname?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required" for="address_id">Address</label>  
			<div class="col-md-5">
				<input id="address_id" name="address" type="text"
					class="form-control input-lg" value="<?=$member->address?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required" for="city_id">City</label>  
			<div class="col-md-5">
				<input id="city_id" name="city" type="text"
					class="form-control input-lg" value="<?=$member->city?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required" for="state_id">State</label>
			<div class="col-md-4">
				<?=Html::selectState(
					"state",
					$member->state,
					"form-control input-lg"
					)?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required" for="zip_id">Zip/Post code</label>  
			<div class="col-md-5">
				<input id="zip_id" name="zip" type="text"
					class="form-control input-lg" value="<?=$member->zip?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required" for="homephone_id">Home phone</label>  
			<div class="col-md-5">
				<input id="homephone_id" name="homephone" type="text"
					class="form-control input-lg" value="<?=$member->homephone?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required" for="mobilephone_id">Mobile phone</label>  
			<div class="col-md-5">
				<input id="mobilephone_id" name="mobilephone" type="text"
					class="form-control input-lg" value="<?=$member->mobilephone?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required" for="email_id">E-mail</label>  
			<div class="col-md-5">
				<input id="email_id" name="email" type="text"
					class="form-control input-lg" value="<?=$member->email?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required" for="password_id">Password</label>  
			<div class="col-md-5">
				<input id="password_id" name="password" type="password"
					class="form-control input-lg" value="<?=$member->password?>">
			</div>
		</div>

<? if ($_SESSION['mode']!='a') { ?>

		<div class="form-group">
			<label class="col-md-4 control-label required" for="apassword_id">Password (again)</label>  
			<div class="col-md-5">
				<input id="apassword_id" name="apassword" type="password"
					class="form-control input-lg" value="<?=$member->password?>">
			</div>
		</div>

 <? if ($_SESSION['mode']=='p') { ?>
		<div class="form-group">
			<label class="col-md-4 control-label required" for="captcha_id">Enter the code</label>  
			<div class="col-md-5">
				<img src="/yourshowcase/media/captcha" style="vertical-align:middle">
				Please enter this number below
				<input id="captcha_id" name="captcha" type="text"
					class="form-control input-lg" value="">
			</div>
		</div>
 <? } ?>

<? } else { ?>

		<input type='hidden' id='apassword_id' name='apassword' value='<?=$member->password?>'>
		<div class="form-group">
			<label class="col-md-4 control-label" for="joined_id">Joined</label>  
			<div class="col-md-5">
				<input id="joined_id" name="joined" type="text"
					class="form-control input-lg" value="<?=$member->joined?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="renewed_id">Renewed</label>  
			<div class="col-md-5">
				<input id="renewed_id" name="renewed" type="text"
					class="form-control input-lg" value="<?=$member->renewed?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="charge_id">Charge</label>  
			<div class="col-md-5">
				<input id="charge_id" name="charge" type="text"
					class="form-control input-lg" value="<?=$member->charge?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="notes_id">Notes</label>
			<div class="col-md-4">                     
				<textarea class="form-control input-lg" id="notes_id"
					name="notes"><?=$member->notes?></textarea>
			</div>
		</div>

<? } ?>

		<div class="form-group">
			<div class="col-md-8" style="text-align:center;">
				<button type="submit" id="submitID" name="update"
					class="btn btn-primary">Submit</button>
			    <button type="reset" id="cancelID" name="cancel"
					onclick="returnHome();return false;"
					class="btn btn-default">Cancel</button>
			</div>
		</div>
		</fieldset>
		</form>
	</div>
</div>

<script type='text/javascript'>

// process form submission

function memberFormSubmission(aform) {
	var f = $(aform);
	if (! $('#firstname_id').val()) {
		$('#firstname_id').focus();
		alert("You must specify a First Name !");
		return;
		}
	if (! $('#lastname_id').val()) {
		$('#lastname_id').focus();
		alert("You must specify a Last Name !");
		return;
		}
	if (! $('#address_id').val()) {
		$('#address_id').focus();
		alert("You must specify a Mailing Address !");
		return;
		}
	if (! $('#city_id').val()) {
		$('#city_id').focus();
		alert("You must specify a City !");
		return;
		}
	if (! $('#state_id').val()) {
		$('#state_id').focus();
		alert("You must choose a State !");
		return;
		}
	if (! $('#zip_id').val()) {
		$('#zip_id').focus();
		alert("You must specify a zip/post code !");
		return;
		}
	if (!$('#homephone_id').val() && !$('#mobilephone_id').val()) {
		$('#homephone_id').focus();
		alert("You must specify a Home or Mobile Phone !");
		return;
		}
	if (! $('#email_id').val()) {
		$('#email_id').focus();
		alert("You must specify an Email Address !");
		return;
		}
	if (! $('#password_id').val()) {
		$('#password_id').focus();
		alert("You must specify a Password !");
		return;
		}
	if ($('#password_id').val() != $('#apassword_id').val()) {
		$('#password_id').focus();
		alert("Password values MUST match !");
		return;
		}
	dispatcher('contentSection','memberEdit',f.serializeArray());
	}

$('#salutation_id').focus();

</script>

<? } ?>