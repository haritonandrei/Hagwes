<?php

/**
 * Functions.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

function get_databases_array($servername, $username, $password, $dbname, $tables_prefix)
{
	$databases = array();
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql	= "SHOW DATABASES";
	$result	= $conn->query($sql);

	if ($result->num_rows > 0)
	{
		// Output data of each row
		while($row = $result->fetch_assoc())
		{
			// Informations
            array_push(
				$databases,
				$row['Database']
			);
		}
	}
	
	// Closing connection
	$conn->close();
	
	return $databases;
}

function get_database_tables_array($source_database, $servername, $username, $password, $dbname, $tables_prefix)
{
	$tables = array();
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql	= "SHOW TABLES FROM ".$source_database;
	$result	= $conn->query($sql);

	if ($result->num_rows > 0)
	{
		// Output data of each row
		while($row = $result->fetch_assoc())
		{
			// Informations
            array_push(
				$tables,
				$row['Tables_in_'.$source_database]
			);
		}
	}
	
	// Closing connection
	$conn->close();
	
	return $tables;
}

function get_database_table_records_array($source_table, $servername, $username, $password, $dbname, $tables_prefix)
{
	$records = array();
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql	= "SELECT * FROM ".$source_table;
	$result	= $conn->query($sql);

	if ($result->num_rows > 0)
	{
		// Output data of each row
		while($row = $result->fetch_assoc())
		{
			// Informations
            array_push(
				$records,
				$row
			);
		}
	}
	
	// Closing connection
	$conn->close();
	
	return $records;
}

function get_database_table_structure_array($source_table, $servername, $username, $password, $dbname, $tables_prefix)
{
	$records = array();
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql	= "DESCRIBE ".$source_table;
	$result	= $conn->query($sql);

	if ($result->num_rows > 0)
	{
		// Output data of each row
		while($row = $result->fetch_assoc())
		{
			// Informations
            array_push(
				$records,
				$row
			);
		}
	}
	
	// Closing connection
	$conn->close();
	
	return $records;
}

?>