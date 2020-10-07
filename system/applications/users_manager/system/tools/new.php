<?php

/**
 * Tool to add a user.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

require("../../../../core/configuration.php");
require("../../../../core/functions.php");
require("../functions.php");
require("../../../../core/modules/authentication/check.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../../../index.php");
}
else
{
	if(is_username_usable($_POST['username'], $server_name, $username, $password, $database_name, $tables_prefix))
	{
		// Create connection
		$conn = new mysqli($server_name, $username, $password, $database_name);
		
		// Check connection
		if ($conn->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql =
		"INSERT INTO ".$tables_prefix."users (
			username,
			password,
			type,
			displayname,
			surname,
			name,
			birthdate,
			email,
			url
		) VALUES (
			'".$_POST['username']."',
			'".encrypt_string($_POST['password'])."',
			'".$_POST['type']."',
			'".$_POST['displayname']."',
			'".$_POST['surname']."',
			'".$_POST['name']."',
			'".$_POST['birthdate']."',
			'".$_POST['email']."',
			'".$_POST['url']."'
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
	else
	{
		header("location: ../../new.php?error=username_already_used");
	}
}

?>
