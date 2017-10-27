<?php

/**
 * Increases the level of of the lockout.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

if((isset($_COOKIE["".$website_name."-lockout-level"])) && ($_COOKIE["".$website_name."-lockout-level"]=="1"))
{
	setcookie("".$website_name."-lockout-level", "2", time() + $cookie_expire_seconds, "/");
}
else if((isset($_COOKIE["".$website_name."-lockout-level"])) && ($_COOKIE["".$website_name."-lockout-level"]=="2"))
{
	setcookie("".$website_name."-lockout-level", "3", time() + $cookie_expire_seconds, "/");
}
else
{
	setcookie("".$website_name."-lockout-level", "1", time() + $cookie_expire_seconds, "/");
}

?>
