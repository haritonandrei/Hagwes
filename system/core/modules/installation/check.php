<?php

/**
 * Checks if is installed the database content.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

$isInstalled = true;
	
// CHECK INSTALL 1
$accounts	= array();
$conn		= new mysqli($server_name, $username, $password, $database_name);

if ($conn->connect_error)
{
	$isInstalled = false;
}

// CHECK INSTALL 2
$sql	= "SELECT username, password FROM ".$tables_prefix."users";
$result	= $conn->query($sql);

if ($result && $result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		$accounts[ $row["username"] ] = $row["password"];
	}
}
$conn->close();

if (count($accounts) < 1)
{
	$isInstalled = false;
}

?>
