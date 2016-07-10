<?php
/**
 * Sniffing Dog Sports - Login form
 * July 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("classes/SDS.php");

// login flags:

$validSubmission = array_key_exists('email',$_REQUEST);
$validMember = false;
$validLogin = false;
$loginMessage = "Login to {$SDS->brand}";

// if we have form data, verify the login:

while ($validSubmission) {
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	$handler = Handlers::fetchByEmail($email);
	if (! $handler) {
		$loginMessage = "** No Such Member on file !!";
		break;
		}
	if ($handler->status != 'Active') {
		$loginMessage = "** This Member is NOT Active !!";
		break;
		}
	$validMember = true;
	if (!password_verify($password,$handler->password)) {
		$loginMessage = "** Invalid Member Password !!";
		break;
		}
	$validLogin = true;
	$loginMessage = "Welcome ! ".$handler->fullname();
	$_SESSION['mode'] =
		($handler->type=='Administrator' || $handler->type=='Developer') ? 'a' : 'm';
	$_SESSION['handler'] = $handler->handler;
	$_SESSION['dog'] = null;
	$_SESSION['trial'] = null;
	break;
	}

?>

<center>

<? if ($validLogin) { ?>

<div class="plaque" style="margin-top:2em;width:70%;">
	<div class="headline"><?=$loginMessage?></div>
	<div class="content">
		<h3 class='hiliteFG'>Successful Login to <?=$SDS->brand?></h3>
	</div>
</div>

<script type="text/javascript">
// setup for member or administrator
mode = "<?=$_SESSION['mode']?>";		// set the mode
handler = "<?=$_SESSION['handler']?>";	// set the handler ID
dog = "<?=$_SESSION['dog']?>";			// set the dog ID
trial = "<?=$_SESSION['trial']?>";		// set the trial ID
// pause and then load all the things
setTimeout(function () {
	if (mode == 'm') {
		dispatcher("navigationSection","navigator");
		dispatcher("sidebarSection","memberSidebar");
		dispatcher("contentSection","memberSummary");
		}
	else {
		dispatcher("navigationSection","navigator");
		dispatcher("sidebarSection","adminSidebar");
		dispatcher("contentSection","adminSummary");
		}
    },1000);
</script>

<? } else { ?>

<div class="plaque" style="margin-top:2em;width:70%;">
	<div class="headline"><?=$loginMessage?></div>
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
	dispatcher("contentSection","login",formData);
	}

// position the cursor to begin:
$("#loginEmail").focus();

</script>

<? } ?>

</center>
