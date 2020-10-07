<?php

/**
 * Index.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

require("system/config.php");
require("system/functions.php");

if(isset($_GET["dir"])&&!empty($_GET["dir"])) { $root = $_GET["dir"]; }

?>

<!DOCTYPE html>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Storage explorer</title>
	<link rel="stylesheet" type="text/css" href="interface/style.css">
</head>
<body>

<div id="container">

<?php

require("../../core/configuration.php");
require("../../core/functions.php");
require("../../core/modules/authentication/check.php");
require("../../core/modules/permissions/settings.php");
require("../../core/modules/permissions/check.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../index.php");
}
else
{
	// system/core/modules
	if( has_permission("see_reserved_data", $website_name, $permissions) )
	{
		show_url($root);
		scan($root);
		require("system/copyright.php");
	}
	else
	{
		header("location: ../../../administration/denied.php");
	}
}

?>

</div>

</body>
</html>