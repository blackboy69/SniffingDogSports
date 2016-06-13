<?php
/**
 * Sniffing Dog Sports - Index page
 * June 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("SDS.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title><?="{$SDS->name} {$SDS->version}"?></title>
</head>
<body>
	<h1><?="{$SDS->name} {$SDS->version}"?></h1>
	<h2><?="cwd: ".Medusa::$scriptPath?></h2>
	<h2><?="lib: ".Medusa::$libraryPath?></h2>
</body>
</html>
