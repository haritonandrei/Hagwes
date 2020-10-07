<?php

/**
 * Tool to add a page.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

require("../../../../core/configuration.php");
require("../../../../core/functions.php");
require("../../../../core/modules/authentication/check.php");
require("../functions.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../../../index.php");
}
else
{
	// Create connection
	$conn = new mysqli($server_name, $username, $password, $database_name);
	
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "INSERT INTO ".$tables_prefix."pages (
			title,
			author,
			content
		)
		VALUES
		(
			'".add_slashes($_POST['title'])."',
			'".$_POST['author']."',
			'".add_slashes($_POST['content'])."'
	)";

	if ( $conn->query($sql) )
	{
		header("location: ../../index.php");
	}
	else
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

?>