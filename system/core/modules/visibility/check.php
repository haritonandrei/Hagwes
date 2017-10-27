<?php

/**
 * Checks if the client can see a specific application into the administration panel.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

function is_visible($visibility_rules, $website_name)
{
	$user_type = $_COOKIE[$website_name."-user-type"];
	
	return $visibility_rules[$user_type];
}

?>
