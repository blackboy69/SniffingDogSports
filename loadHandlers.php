#!/usr/bin/php
<?php
/**
 * Sniffing Dog Sports - Load Handlers from .csv file
 * June 2016 by Harley H. Puthuff
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
$log->footer();
exit;

// process command line arguments

function processArguments() {
	global $argv,$db,$options,$log;
	array_shift($argv); // discard script name
	foreach ($argv as $arg) {
		echo "argument: $arg\n";
		}
	}
	
	
$handle = @fopen("/tmp/inputfile.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        echo $buffer;
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}

?>