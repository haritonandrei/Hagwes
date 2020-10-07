<?php

/**
 * Functions file.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

/**
 * Removes a single user by id.
 *
 * @param int $id The ID
 * @param string $servername The IP or domain of the MySQL server 
 * @param string $username User to login into the MySQL DBMS
 * @param string $password The user's password to enter into the DBMS
 * @param string $dbname The name of the database
 * @param string $tables_prefix The MySQL tables prefix
 *
 * @return boolean Returns TRUE if the user has been removed.
**/
 
function remove_user($id, $servername, $username, $password, $dbname, $tables_prefix)
{
	$is_removed = FALSE;
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql	= "UPDATE ".$tables_prefix."users SET deleted=1 WHERE ".$tables_prefix."users.ID=".$id;
	$result	= $conn->query($sql);

	if ( $conn->query($sql) )
	{
		$is_removed = TRUE;
	}
	else
	{
		$is_removed = FALSE;
	}
	
	// Closing connection
	$conn->close();
	
	return $is_removed;
}

/**
 * Checks if the username and ID matches
 *
 * @param string $id User ID to check
 * @param string $username Username to check
 * @param string $servername The IP or domain of the MySQL server 
 * @param string $sql_username User to login into the MySQL DBMS
 * @param string $sql_password The user's password to enter into the DBMS
 * @param string $dbname The name of the database
 * @param string $tables_prefix The MySQL tables prefix
 *
 * @return array Returns an array with data of all users.
**/
 
function check_id_matches_username($given_id, $given_username, $server_name, $sql_username, $sql_password, $database_name, $tables_prefix)
{
	$match = FALSE;
	
	// Create connection
	$conn = new mysqli($server_name, $sql_username, $sql_password, $database_name);
	
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql	= "SELECT * FROM ".$tables_prefix."users WHERE deleted=0";
	$result	= $conn->query($sql);

	if ($result->num_rows > 0)
	{
		// Output data of each row
		while($row = $result->fetch_assoc())
		{
			if($row['ID']==$given_id && $row['username']==$given_username)
			{
				$match = TRUE;
			}
		}
	}
	
	// Closing connection
	$conn->close();
	
	return $match;
}

/**
 * Checks that the username doesn't exist.
 *
 * @param string $given_username The username to check
 * @param string $servername The IP or domain of the MySQL server 
 * @param string $username User to login into the MySQL DBMS
 * @param string $password The user's password to enter into the DBMS
 * @param string $dbname The name of the database
 * @param string $tables_prefix The MySQL tables prefix
 *
 * @return array Returns an array with data of all users.
**/
 
function is_username_usable($given_username, $server_name, $username, $password, $database_name, $tables_prefix)
{
	$can_be_used = TRUE;
	
	// Create connection
	$conn = new mysqli($server_name, $username, $password, $database_name);
	
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql	= "SELECT * FROM ".$tables_prefix."users WHERE deleted=0";
	$result	= $conn->query($sql);

	if ($result->num_rows > 0)
	{
		// Output data of each row
		while($row = $result->fetch_assoc())
		{
			if($row['username'] == $given_username)
			{
				$can_be_used = FALSE;
			}
		}
	}
	
	// Closing connection
	$conn->close();
	
	return $can_be_used;
}

?>
