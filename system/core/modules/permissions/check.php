<?php

/**
 * Checks if the client has a specific permission.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

function has_permission($permission_type, $website_name, $permissions)
{
	$user_type = $_COOKIE[$website_name."-user-type"];
	
	return $permissions[$user_type][$permission_type];
}

?>