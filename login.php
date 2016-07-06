<?php
/**
 * Sniffing Dog Sports - Login form
 * July 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("classes/SDS.php");

$validLogin = false;

// if we have form data, verify the login:

if (array_key_exists('email',$_REQUEST)) {
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	}

?>

<? if ($validLogin) { ?>

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
	<div class="headline">Login</div>
	<div class="content">
		<img src="/media/login.png" width="160" style="float:right">
		<h3 class='hiliteFG'>Login here to access:
			<ul>
				<li>your personal information</li>
				<li>your dogs</li>
				<li>your trials</li>
				<li>your titles and standings</li>
			</ul></h3>
		<form id="loginform" class="form-horizontal" style="clear:both">
		<fieldset>
		<legend style="font-style:italic">Please enter your email &amp; password
			and click [Login]</legend><br>
		<div class="form-group">
			<label for="loginEmail" class="col-lg-2 control-label">Your Email:</label>
			<div class="col-lg-10">
			<input class="form-control input-lg" id="loginEmail"
				placeholder="Your email address" type="text">
			</div>
		</div>
		<div class="form-group">
			<label for="loginPassword" class="col-lg-2 control-label">&amp; Password:</label>
			<div class="col-lg-10">
			<input class="form-control input-lg" id="loginPassword"
				placeholder="and password" type="password">
			</div>
		</div>
        <div class="form-group">
			<a href="contact.php"></a>
			<div class="col-lg-10 col-lg-offset-2">
				<button type="submit" class="btn btn-success"
					onclick="postFormData(this.form);return false;"><span
					class="glyphicon glyphicon-lock"></span> Login</button>
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
		email:$('#loginEmail').val(),
		password:$('#loginPassword').val()
		};
	for (property in formData) {
		value = formData[property];
		if (value) continue;
		field = '#login' + property.charAt(0).toUpperCase() + property.slice(1);
		alert("Please enter a value for: " + property + " !");
		$(field).focus();
		return false;
		}
alert("not just yet..."); return false;
	dispatcher("contentSection","login",formData);
	}

// position the cursor to begin:
$("#loginEmail").focus();

</script>

<? } ?>

