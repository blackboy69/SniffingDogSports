<?php
/**
 * a testing program. Test aspects of the application
 * July 2016 by Harley Puthuff
 * Copyright 2016, Sniffing Dog Sports
 */
include_once("classes/SDS.php");

$flags = 0x0010;
$value = 0x0008;

echo sprintf("flags is: %x \n",$flags);

$flags &= (-1 ^ $value);

echo sprintf("flags stripped is: %x \n",$flags);

$flags |= $value;

echo sprintf("flags final is: %x \n",$flags);



//$member = new Members;
//echo Data::breakout($member);
?>