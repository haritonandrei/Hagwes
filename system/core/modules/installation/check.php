<?php

/**
 * Checks if is installed the database content.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

$isInstalled = true;

// CHECK INSTALL 1
$accounts = array();
$conn = new mysqli($server_name, $username, $password);
$db_selection = $conn->select_db($database_name);

if ($conn->connect_errno || !$db_selection)
{
	$isInstalled = false;
} else {
	// CHECK INSTALL 2
	$sql = "SELECT username, password FROM ".$tables_prefix."users";
	$result = $conn->query($sql);

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
}

?>
