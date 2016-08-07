<?php
/**
 * Sniffing Dog Sports - Member Payment(s) page
 * August 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("classes/SDS.php");

// payment reasons

$reasons = array(
	"Initial Membership"	=> 'I',
	"Membership Renewal"	=> 'R'
	);


$formSubmitted = false;
$fullname = $member->fullname();
$amount = sprintf("$%.2f",$SDS->membership);

// check for submission

if ($_REQUEST['something']) {
	}

?>

<? if ($formSubmitted) { ?>

<center>
<div class="plaque" style="margin-top:2em;width:70%;">
	<div class="headline">Payment Status</div>
	<div class="content">
		<h3 class='hiliteFG'>Your Payment is Complete</h3>
		<center>
		<table style="color:maroon;width:90%;font-size:18pt;">
			<caption><u>Information Submitted</u></caption>
			<tbody>
				<tr><td>Member ID:</td><td><?=$member->member?></td></tr>
				<tr><td>Member Full Name:</td><td><?=$member->fullname()?></td></tr>
				<tr><td>Member Status:</td><td><?=$member->status?></td></tr>
			</tbody>
		</table><br>

		<h3 class='hiliteFG'>Click below to proceed with payment</h3>
		<button id="payment_id" name="payment"
			onclick="alert('Coming soon ...')"
			class="btn btn-primary">Pay Membership Fees</button>
		&nbsp;&nbsp;
		<button id="notnow_id" name="notnow"
			onclick="returnHome()"
			class="btn btn-default">Skip for now</button>
			<br><br>
		</center>
	</div>
</div>
</center>

<? } else { ?>

<!--member payment form-->

<div class="plaque">
	<div class="headline">
		<?="$fullname &bull; Member Payments"?>
	</div>
	<div class="content" style="font-size:large;color:black;">
		<h3 class="hiliteFG">Your Payment Options</h3>

		<div class="panel panel-default">
			<div class="panel-body">
			    Here is where you make payments for membership dues,
				membership renewals and certain other fees and charges.
				Please choose your payment options below:
			</div>
		</div>

		<form class="form-horizontal"
			  onsubmit="paymentFormSubmission(this);return false;">
		<fieldset>

		<div class="form-group">
			<label class="col-md-4 control-label"
				   for="reason_id">Payment for</label>
			<div class="col-md-4">
				<?=Html::select("reason",$reasons,'I',false,"form-control input-lg")?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label"
				   for="amount_id">Amount</label>  
			<div class="col-md-5">
				<input id="amount_id" name="amount" type="text"
					class="form-control input-lg" value="<?=$amount?>" readonly>
			</div>
		</div>

		<div class="form-group" style="text-align:center;">
				<button id="payonline_id" name="payonline"
					onclick="return false"
					class="btn btn-lg btn-primary">Pay with Debit/Credit Card</button>
				&nbsp;&nbsp;
			    <button id="paybycheck_id" name="paybycheck"
					onclick="$('#paybycheckinfo_id').toggle();return false;"
					class="btn btn-lg btn-primary">Pay with a Paper Check</button>
		</div>

		</fieldset>
		</form>

		<!--payment by paper check-->
		<div id="paybycheckinfo_id" class="panel panel-info" style="display:none;">
			<div class="panel-heading">
				<h3 class="panel-title">Payment by Paper Check</h3>
			</div>
			<div class="panel-body">
				<h3>Please remit your payment to: <b><?=$SDS->brand?></b>
					by mailing a check to the following address:</h3>
				<h3><b>
					<? foreach ($SDS->address as $line) {
						echo $line,"<br>\n";
						}
					?>
					</b></h3>
			</div>
		</div>

		<p>&nbsp;</p>
	</div>
</div>

<script type='text/javascript'>

// process form submission

function paymentFormSubmission(aform) {
	var f = $(aform);
	dispatcher('contentSection','memberPayment',f.serializeArray());
	}

$('#reason_id').focus();

</script>

<? } ?>