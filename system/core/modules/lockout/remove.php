<?php

/**
 * Removes the client's lockout.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

setcookie("".$website_name."-lockout-level", "", time() - $cookie_expire_seconds, "/");

?>
