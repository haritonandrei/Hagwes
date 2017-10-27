<?php

/**
 * Tool to create a full link to a specified file.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

require("../../../../core/configuration.php");
require("../../../../core/functions.php");
require("../../../../core/modules/authentication/check.php");
require("../configuration.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../../../index.php");
}
else
{
	if (isset($_GET["file"]))
	{
		$root = $_GET["file"];
		$file = "../../".$root;
	}

	if (file_exists($file))
	{
		// FULL LINK OF THE FILE
		$server = $_SERVER['SERVER_NAME'];
		$cms_folder = str_replace("/system/applications/directories_explorer/system/tools/linker.php", "", $_SERVER['SCRIPT_NAME']);
		$file_link = str_replace("../", "", $root);
		$the_whole_link = "//".str_replace(" ","%20",$server.$cms_folder.$file_link);
		
		// RETURNING WITH LINK
		header("location: ../../index.php?dir=".$root."&link=".$the_whole_link);
		echo( $the_whole_link );
	}
}

?>