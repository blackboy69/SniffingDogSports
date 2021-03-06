<?php
/**
 * Sniffing Dog Sports - Global Include
 * June 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("/yourshowcase/ClassLibrary/Medusa.php");
// *probably not needed* include_once("passwordLib.php");

// our database connector:

$db = new Databoss("localhost","sds");

// Nomenclature:

$SDS = new Object;
 $SDS->brand		= "Sniffing Dog Sports, LLC";
 $SDS->description	= "Members Site";
 $SDS->version		= "v1.2, August 2016";
 $SDS->copyright	= "Copyright 2016, Sniffing Dog Sports, LLC";
 $SDS->contacts		= array(
	"Harley Puthuff"	=> "harley@yourshowcase.net",
	"Lauren Leach"		=> "laurieleach@comcast.net",
	"Donna Goleman"		=> "donnagk9@gmail.com"
	 );
 $SDS->address		= array(
	"LeBallister's Seed and Fertilizer",
	"Attention:  Kelly Boyer",
	"1250 Sebastopol Rd",
	"Santa Rosa, CA 95407"
	);
 $SDS->membership	= 24.00;	// annual fee
 
// application control:

session_start();

// set up public mode if none present:
if (!isset($_SESSION['mode'])) {
	$_SESSION['mode']		= 'p';
	$_SESSION['boss']		= null;
	$_SESSION['member']		= null;
	$_SESSION['dog']		= null;
	$_SESSION['trial']		= null;
	$_SESSION['prior']		= null;
	}

// check for changes to these saved values:
if (isset($_REQUEST['member']))
	$_SESSION['member'] = $_REQUEST['member'];
if (isset($_REQUEST['dog']))
	$_SESSION['dog'] = $_REQUEST['dog'];
if (isset($_REQUEST['trial']))
	$_SESSION['trial'] = $_REQUEST['trial'];

// if we have a session boss (administrator) load their profile
if ($_SESSION['boss'])
	$boss = new Members($_SESSION['boss']);

// if we have a logged-in member, load their profile
if ($_SESSION['member']) {
	$member = new Members($_SESSION['member']);
	}

// if we have a dog being referenced, load the profile
if ($_SESSION['dog']) {
	$dog = new Dogs($_SESSION['dog']);
	}

// if we have a trial being referenced, load the profile
if ($_SESSION['trial']) {
	$trial = new Trials($_SESSION['trial']);
	}

?>
