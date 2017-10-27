<?php

/**
 * Installation notify for the web area.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

require("../system/core/configuration.php");
require("../system/core/information.php");
require("../system/core/modules/installation/check.php");

// INSTALLATION
if($isInstalled)
{
	// REDIRECT
	header("location: index.php");
}

// TEMPLATE
require("../interface/templates/".$template_web."/web/install.php");

?>
