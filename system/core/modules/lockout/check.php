<?php

/**
 * Checks if the client is locked out.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

$isLocked = false;
 
if((isset($_COOKIE["".$website_name."-lockout-level"])) && ($_COOKIE["".$website_name."-lockout-level"]=="3"))
{
	$isLocked = true;
}

?>