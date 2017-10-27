<?php

/**
 * Index.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

require("../../core/configuration.php");
require("../../core/functions.php");
require("../../core/modules/authentication/check.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../index.php");
}
else
{
	if(isset($_GET['url']))
	{
		$filename		= $_GET['url'];
		$file_hash_sha1	= sha1_file($filename);
		$file_hash_md5	= md5_file($filename);
	}
	else
	{
		$file_hash_sha1	= "Unknown";
		$file_hash_md5	= "Unknown";
	}
	// TEMPLATE
	require("interface/templates/".$template_applications."/index.php");
}

?>
