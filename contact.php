<?php
/**
 * Sniffing Dog Sports - Contact Us form
 * July 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("classes/SDS.php");

$haveFormData = array_key_exists('email',$_REQUEST) ? true : false;

// if we have form data, send to the email(s) for SDS:

if ($haveFormData) {
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$message = $_REQUEST['message'];
	$subject = "SDS Inquiry received";
	$content = "
Inquiry from..: $name
Email address.: $email
Message.......: $message
";
	foreach ($SDS->contacts as $sendName=>$sendEmail) {
		Email::send($subject,$content,$sendEmail,$sendName,$email,$name);
		}
	}
?>


<? if ($haveFormData) { ?>

<center>
<div class="plaque" style="margin-top:2em;width:70%;">
	<div class="headline">Thanks for your inquiry !</div>
	<div class="content">
		<h3 class='hiliteFG'>Your information has been sent and you will
			receive a response shortly.</h3>
		<center>
		<table style="color:maroon;width:90%;font-size:12pt;">
			<caption><u>Information Submitted</u></caption>
			<tbody>
				<tr><td>Your name:</td><td><?=$name?></td></tr>
				<tr><td>Email address:&nbsp;</td><td><?=$email?></td></tr>
				<tr><td>Message:</td><td><?=$message?></td></tr>
			</tbody>
		</table><br>
		</center>
	</div>
</div>
</center>

<? } else { ?>

<center>
<div class="plaque" style="margin-top:2em;width:70%;">
	<div class="headline">Contact Us</div>
	<div class="content">
		<h3 class='hiliteFG'>We'd love to hear from you and welcome your comments,
			suggestions &amp; questions. Please fill in each of the values in the
			contact form below and we'll use that information to get your inquiry
			to one of our administrators. Thanks!</h3>
		<form id="contactform" class="form-horizontal">
		<fieldset>
		<legend>Please fill in the spaces below and click [SUBMIT]</legend><br>
		<div class="form-group">
			<label for="inputName" class="col-lg-2 control-label">Name:</label>
			<div class="col-lg-10">
			<input class="form-control" id="inputName" placeholder="Please enter your name" type="text">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="col-lg-2 control-label">Email:</label>
			<div class="col-lg-10">
				<input class="form-control" id="inputEmail" placeholder="Enter your email address" type="text">
			</div>
		</div>
		<div class="form-group">
			<label for="inputMessage" class="col-lg-2 control-label">Message:</label>
			<div class="col-lg-10">
				<textarea class="form-control" rows="5" id="inputMessage"></textarea>
				<span class="help-block">Enter your message in the space above</span>
			</div>
		</div>
        <div class="form-group">
			<a href="contact.php"></a>
			<div class="col-lg-10 col-lg-offset-2">
				<button type="submit" class="btn btn-primary"
					onclick="postFormData(this.form);return false;">Submit</button>
				<button type="reset" class="btn btn-default"
					onclick="returnHome();return false;">Cancel</button>
			</div>
		</div>
		</fieldset>
		</form>
	</div>
</div>
</center>

<script type="text/javascript">

// post the form data:
function postFormData(theform) {
	var property,value,field;
	var formData = {
		name:$('#inputName').val(),
		email:$('#inputEmail').val(),
		message:$('#inputMessage').val()
		};
	for (property in formData) {
		value = formData[property];
		if (value) continue;
		field = '#input' + property.charAt(0).toUpperCase() + property.slice(1);
		alert("Please enter a value for: " + property + " !");
		$(field).focus();
		return false;
		}
	dispatcher("contentSection","contact",formData);
	}

// position the cursor to begin:
$("#inputName").focus();

</script>

<? } ?>

