<?php

/**
 * Checks if the client is authenticated.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

$isAuthenticated = false;

// CHECK
if(!isset($_COOKIE["".$website_name."-username"]))
{
	$isAuthenticated = false;
}
else
{
	// DATABASE
	$accounts = array();
	$conn = new mysqli($server_name, $username, $password, $database_name);
	
	$sql = "SELECT username, password FROM ".$tables_prefix."users WHERE deleted=0";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$accounts[ encrypt_string($row["username"]) ] = $row["password"];
		}
	}
	$conn->close();
	
	// CHECK AUTHENTICATION
	if(isset($accounts[ $_COOKIE[ $website_name."-username" ] ]))
	{
		if ($accounts[ $_COOKIE[ $website_name."-username" ] ] == $_COOKIE[ $website_name."-password" ])
		{
			$isAuthenticated = true;
		}
	}
}

?>