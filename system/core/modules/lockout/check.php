<?php

/**
 * Checks if the client is locked out.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

$isLocked = false;
 
if((isset($_COOKIE["".$website_name."-lockout-level"])) && ($_COOKIE["".$website_name."-lockout-level"]=="3"))
{
	$isLocked = true;
}

?>