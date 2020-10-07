<?php

/**
 * Tool to edit a user.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

require("../../../../core/configuration.php");
require("../../../../core/functions.php");
require("../../../../core/modules/authentication/check.php");

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
	
	// BY ID OR BY USERNAME
	if(isset($_GET['id']))
	{
		$sql = 
		"UPDATE ".$tables_prefix."users SET
		
			password	= '".encrypt_string($_POST['password'])."',
			displayname	= '".$_POST['displayname']."',
			surname		= '".$_POST['surname']."',
			name		= '".$_POST['name']."',
			birthdate	= '".$_POST['birthdate']."',
			email		= '".$_POST['email']."',
			url			= '".$_POST['url']."'
			
		WHERE ID=".$_GET['id']."
		";
	}
	else if(isset($_GET['username']))
	{
		$sql = 
		"UPDATE ".$tables_prefix."users SET
		
			password	= '".encrypt_string($_POST['password'])."',
			displayname	= '".$_POST['displayname']."',
			surname		= '".$_POST['surname']."',
			name		= '".$_POST['name']."',
			birthdate	= '".$_POST['birthdate']."',
			email		= '".$_POST['email']."',
			url			= '".$_POST['url']."'
			
		WHERE username='".$_GET['username']."'
		";
	}

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
