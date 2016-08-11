<?php
/**
 * a testing program. Test aspects of the application
 * July 2016 by Harley Puthuff
 * Copyright 2016, Sniffing Dog Sports
 */
include_once("classes/SDS.php");

$member = new Members;
echo Data::breakout($member);
?>