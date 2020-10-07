<?php

/**
 * Tool.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

include("../config.php");

if(isset($_GET["dir"])) { $root = $_GET["dir"]; }

header("Location: ../../index.php?dir=".$root);

?>