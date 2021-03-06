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
		echo "<h1>** Incorrect Code Entered !!</h1>\n";
		exit;
		}
	$formSubmitted = true;
	$member = new Members($_REQUEST['member']);
	$member->merge($_REQUEST);
	$member->flags = 0;
	foreach (Members::$flags as $tag=>$value) {
		$formtag = preg_replace('/\s/','_',$tag);
		if ($_REQUEST[$formtag])
			$member->setFlag($tag);
		}
	$member->store();
	$_SESSION['member'] = $member->member;
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

<center>
<div class="plaque" style="margin-top:2em;width:70%;">
	<div class="headline">Member profile updated</div>
	<div class="content">
		<h3 class='hiliteFG'>Member profile has been updated.</h3>
		<center>
		<table style="color:maroon;width:90%;font-size:18pt;">
			<caption><u>Information Submitted</u></caption>
			<tbody>
				<tr><td>Member ID:</td><td><?=$member->member?></td></tr>
				<tr><td>Member Full Name:</td><td><?=$member->fullname()?></td></tr>
				<tr><td>Member Status:</td><td><?=$member->status?></td></tr>
			</tbody>
		</table><br>

	<? if ($_SESSION['mode']=='p' and $member->status=='Pending') { ?>

		<h3 class='hiliteFG'>Click below to proceed with payment</h3>
		<button id="payment_id" name="payment"
			onclick="return dispatcher('contentSection','memberPayment')"
			class="btn btn-primary">Pay Membership Fees</button>
		&nbsp;&nbsp;
		<button id="notnow_id" name="notnow"
			onclick="returnHome()"
			class="btn btn-default">Skip for now</button>
			<br><br>

	<? } ?>

		</center>
	</div>
</div>
</center>

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
		<form class="form-horizontal"
			  onsubmit="memberFormSubmission(this);return false;">
		<fieldset>

<? if ($_SESSION['mode']=='a') { ?>

		<div class="form-group">
			<label class="col-md-4 control-label"
				   for="member_id"></label>
			<div class="col-md-4">
				<div class="input-group">
					<span class="input-group-addon">Membership #</span>
					<input id="member_id" name="member" class="form-control"
						value="<?=$member->member?>" type="text">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label"
				   for="referenced_id"></label>  
			<div class="col-md-4">
				<div class="input-group">
					<span class="input-group-addon">Updated at</span>
					<input id="referenced_id" name="referenced" type="text"
						class="form-control" value="<?=$referenced?>" readonly>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label"
				   for="type_id">Type</label>
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
			<label class="col-md-4 control-label"
				   for="status_id">Status</label>
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

	<input type="hidden" id="member_id" name="member" value="<?=$member->member?>">
	<input type="hidden" id="referenced_id" name="referenced">
	<input type="hidden" id="type_id" name="type" value="Member">
	<input type="hidden" id="status_id" name="status" value="<?=$member->status?>">

<? } ?>

		<div class="form-group">
			<label class="col-md-4 control-label"
				   for="salutation_id">Salutation</label>
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
			<label class="col-md-4 control-label required"
				   for="firstname_id">First name</label>  
			<div class="col-md-5">
				<input id="firstname_id" name="firstname" type="text"
					class="form-control input-lg" value="<?=$member->firstname?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required"
				   for="lastname_id">Last name</label>  
			<div class="col-md-5">
				<input id="lastname_id" name="lastname" type="text"
					class="form-control input-lg" value="<?=$member->lastname?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required"
				   for="address_id">Address</label>  
			<div class="col-md-5">
				<input id="address_id" name="address" type="text"
					class="form-control input-lg" value="<?=$member->address?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required"
				   for="city_id">City</label>  
			<div class="col-md-5">
				<input id="city_id" name="city" type="text"
					class="form-control input-lg" value="<?=$member->city?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required"
				   for="state_id">State</label>
			<div class="col-md-4">
				<?=Html::selectState(
					"state",
					$member->state,
					"form-control input-lg"
					)?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required"
				   for="zip_id">Zip/Post code</label>  
			<div class="col-md-5">
				<input id="zip_id" name="zip" type="text"
					class="form-control input-lg" value="<?=$member->zip?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required"
				   for="homephone_id">Home phone</label>  
			<div class="col-md-5">
				<input id="homephone_id" name="homephone" type="text"
					class="form-control input-lg" value="<?=$member->homephone?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required"
				   for="mobilephone_id">Mobile phone</label>  
			<div class="col-md-5">
				<input id="mobilephone_id" name="mobilephone" type="text"
					class="form-control input-lg" value="<?=$member->mobilephone?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required"
				   for="email_id">E-mail</label>  
			<div class="col-md-5">
				<input id="email_id" name="email" type="text"
					class="form-control input-lg" value="<?=$member->email?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label required"
				   for="password_id">Password</label>  
			<div class="col-md-5">
				<input id="password_id" name="password" type="password"
					class="form-control input-lg" value="<?=$member->password?>">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label required"
				   for="apassword_id">Password (again)</label>  
			<div class="col-md-5">
				<input id="apassword_id" name="apassword" type="password"
					class="form-control input-lg" value="<?=$member->password?>">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Your dogs:</label>
			<div class="col-md-7">
				<table id="dogsTable" class="table table-striped"
					   style="border:1px solid;background-color:gainsboro;">
					<thead><tr><th>Call name</th><th>Reg. name</th>
						<th>Breed</th><th>Notes</th></tr></thead>
					<tbody>
					<?php
						$dogs = Dogs::getMemberDogs($member->member);
						foreach ($dogs as $dog) {
							echo
								"<tr data-member='{$dog->member}' data-dog='{$dog->dog}'>",
								"<td>{$dog->callname}</td>",
								"<td>{$dog->regname}</td>",
								"<td>{$dog->breed}</td>",
								"<td>{$dog->notes}</td>",
								"</tr>\n";
							}
						echo
							"<tr id='newDog' data-member='{$member->member}' data-dog=''>",
							"<td>- Add -</td><td></td><td></td><td></td>",
							"</tr>\n";
					?>
					</tbody>
				</table>
			</div>
		</div>

 <? if ($_SESSION['mode']=='p') { ?>
 
		<div class="form-group">
			<label class="col-md-4 control-label required"
				   for="captcha_id">Enter the code</label>  
			<div class="col-md-5">
				<img src="/yourshowcase/media/captcha" style="vertical-align:middle">
				Please enter this number below
				<input id="captcha_id" name="captcha" type="text"
					class="form-control input-lg" value="">
			</div>
		</div>

<? } ?>

<? if ($_SESSION['mode']=='a') { ?>
		<div class="form-group">
			<label class="col-md-4 control-label"
				   for="anniversary_id">Anniversary</label>  
			<div class="col-md-5">
				<input id="anniversary_id" name="anniversary" type="text"
					class="form-control input-lg" value="<?=$member->anniversary?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label"
				   for="renewed_id">Renewed</label>  
			<div class="col-md-5">
				<input id="renewed_id" name="renewed" type="text"
					class="form-control input-lg" value="<?=$member->renewed?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label"
				   for="charge_id">Charge</label>  
			<div class="col-md-5">
				<input id="charge_id" name="charge" type="text"
					class="form-control input-lg" value="<?=$member->charge?>">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Flags / Switches</label>
			<div class="col-md-5" style="color:steelblue">
				<?php
				foreach (Members::$flags as $tag=>$value) {
					$checked = ($member->flags & $value) ? " checked" : "";
					echo "<div class='checkbox'>",
						 "<label>",
						 "<input type='checkbox' name='{$tag}' value='1'",
						 " style='width:20px;height:20px;' {$checked}>",
						 "&nbsp;{$tag}",
						 "</label>",
						 "</div>\n";
					}
				?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label"
				   for="notes_id">Notes</label>
			<div class="col-md-4">                     
				<textarea class="form-control input-lg" id="notes_id"
					name="notes"><?=$member->notes?></textarea>
			</div>
		</div>

<? } ?>

		<input type="hidden" id="flags_id" name="flags" value="<?=$member->flags?>">
		
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

$('#dogsTable').editableTableWidget();
$('#newDog td:eq(0)').change(function(){
	// copy the son-of-a-bitch:
	});
$('#salutation_id').focus();

</script>

<? } ?>