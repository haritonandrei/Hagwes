<?php

/**
 * Removes the client's lockout.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

setcookie("".$website_name."-lockout-level", "", time() - $cookie_expire_seconds, "/");

?>
