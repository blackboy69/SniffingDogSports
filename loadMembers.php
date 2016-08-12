#!/usr/bin/php
<?php
/**
 * Sniffing Dog Sports - Load Members from .csv file
 * August 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("classes/SDS.php");

// global stuff:

$options = array(	// command line arguments
	"quiet"			=> false,
	"testing"		=> false,
	"verbose"		=> false,
	"inputFile"		=> null
	);

$log = new Console;

// main processing loop:

$log->header();
processArguments();
$records = processInputFile($options['inputFile']);
$log->write("Total input lines processed: {$records}");
$log->footer();
exit;

// process command line arguments

function processArguments() {
	global $argv,$db,$options,$log;
	array_shift($argv); // discard script name
	foreach ($argv as $arg) {
		$options['inputFile'] = $arg;
		}
	if (! $options['inputFile']) $options['inputFile'] = "archives/members.csv";
	}

// process the input file

function processInputfile($filename) {
	global $db,$options,$log;
	$records = 0; // input line count
	$handle = @fopen($filename,"r");
	if (! $handle) {
		$log->write("Cannot open input file: {$filename} !!");
		return 0;
		}
	fgets($handle,4096); // skip the heading line
	while (($buffer = fgets($handle,4096)) !== false) {
		$records += processInputLine($buffer);
		}
	fclose($handle);
	return $records;
	}

// process one input line

function processInputLine($buffer) {
	global $db,$options,$log;
	$member = new Members;
	$fields = preg_split("/[,]/",$buffer);
	$columns = count($fields);
	$log->write("Record {$fields[0]} = {$columns} fields");
	$member->member = 0 + $fields[0];
	$member->status = 'Active';
	$member->firstname = ucfirst(prepareString($fields[1]));
	$member->lastname = ucfirst(prepareString($fields[2]));
	$member->address = prepareString($fields[3]);
	$member->city = prepareString($fields[4]);
	$member->state = prepareString($fields[5]);
	$member->zip = prepareString($fields[6]);
	$member->homephone = preparePhone($fields[7]);
	$member->mobilephone = preparePhone($fields[8]);
	$member->email = prepareString($fields[9]);
	$member->password = "nosework";
	$member->anniversary = prepareDate($fields[11]);
	if ($fields[10]) $member->setRenewalNoticeSent();
	if ($fields[12]) $member->setAccountInfoSent();
	if ($fields[13]) $member->setDues_2016_2017();
	if ($member->isDues_2016_2017())
		$member->renewed = $member->anniversary;
	$member->write();
	return 1;
	}

// prepare a string to go onto the database
	
function prepareString($string) {
	if (! $string) return null;
	if ($string[0] == '"') $string = substr($string,1,-1);
	return rtrim($string);
	}

// prepare a phone number to go onto the database

function preparePhone($phone) {
	if (! $phone) return null;
	$phone = preg_replace('/[^0-9]/','',$phone);
	if (strlen($phone) > 10) $phone = substr($phone,-10);
	if (strlen($phone) == 10)
		return substr($phone,0,3).'-'.substr($phone,3,3).'-'.substr($phone,6);
	if (strlen($phone) == 7)
		return substr($phone,0,3).'-'.substr($phone,3);
	return $phone;
	}

// prepare a date (&time) to go onto the database

function prepareDate($date) {
	if (! $date) return null;
	$when = new Date(prepareString($date));
	return $when->internal(SHORTDATE);
	}

?>