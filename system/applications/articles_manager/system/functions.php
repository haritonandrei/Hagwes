<?php

/**
 * Functions file.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

/**
 * Removes a single article by id.
 *
 * @param int $id The ID
 * @param string $servername The IP or domain of the MySQL server 
 * @param string $username User to login into the MySQL DBMS
 * @param string $password The user's password to enter into the DBMS
 * @param string $dbname The name of the database
 * @param string $tables_prefix The MySQL tables prefix
 *
 * @return boolean Returns TRUE if the article has been removed.
**/
 
function remove_article($id, $servername, $username, $password, $dbname, $tables_prefix)
{
	$is_removed = FALSE;
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql	= "UPDATE ".$tables_prefix."articles SET deleted=1 WHERE ".$tables_prefix."articles.ID=".$id;
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
 * Adds slashes to some "special" characters.
 *
 * @param string $string_to_modify The string to modify
 *
 * @return string Returns the modified string.
**/
 
function add_slashes($string_to_modify)
{
	$replace = array(
		"'"	=> "\\'",
		'"'	=> '\\"'
	);
	
	return str_replace(
		array_keys($replace),
		array_values($replace),
		$string_to_modify
	);
}

?>