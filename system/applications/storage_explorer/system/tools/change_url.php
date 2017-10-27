<?php

/**
 * Tool.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

include("../config.php");

if(isset($_GET["dir"])) { $root = $_GET["dir"]; }

header("Location: ../../index.php?dir=".$root);

?>