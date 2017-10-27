<?php

/**
 * Tool to add an article.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
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
	
	$title			= add_slashes($_POST['title']);
	$category		= add_slashes($_POST['category']);
	$author			= add_slashes($_POST['author']);
	$description	= add_slashes($_POST['description']);
	$content		= add_slashes($_POST['content']);

	$sql = "INSERT INTO ".$tables_prefix."articles (title, category, author, description, content)
	VALUES ('".$title."', '".$category."', '".$author."', '".$description."', '".$content."')";

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