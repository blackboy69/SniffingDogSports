<?php
/**
 * Sniffing Dog Sports - Global Include
 * June 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("/yourshowcase/ClassLibrary/Medusa.php");

// our database connector:

$db = new Databoss("localhost","sds");

// Nomenclature:

$SDS = new Object;
 $SDS->brand		= "Sniffing Dog Sports";
 $SDS->description	= "Members Site";
 $SDS->version		= "v1.1, July 2016";
 $SDS->copyright	= "Copyright 2016, Sniffing Dog Sports, LLC";
 
// application control:

session_start();
if (!isset($_SESSION['mode'])) {
	$_SESSION['mode'] = 'p';	// assume public mode
	$_SESSION['handler'] = 0;
	$_SESSION['dog'] = 0;
	$_SESSION['trial'] = 0;
	}


?>