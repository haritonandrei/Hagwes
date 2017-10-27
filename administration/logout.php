<?php

/**
 * Logout page for the administration area.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

require("../system/core/configuration.php");

setcookie($website_name."-username",			"",	time()-$cookie_expire_seconds,	"/");
setcookie($website_name."-password",			"",	time()-$cookie_expire_seconds,	"/");
setcookie($website_name."-user-type",			"",	time()-$cookie_expire_seconds,	"/");
setcookie($website_name."-user-displayname",	"",	time()-$cookie_expire_seconds,	"/");

header('location: ../index.php');

?>
