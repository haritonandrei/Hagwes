<?php

/**
 * Contains functions used for the right working of the CMS.
 *
 * @author     Hariton Andrei Marius <haritonandreimarius@icloud.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

/**
 * Filters a string to avoid sql-injection attacks.
 *
 * @param string $string The string in which to apply the filter.
 *
 * @return string Returns the filtered string.
**/

function filter_string($string)
{
	$to_delete = array("=", ";", "!", ">", "<", "DROP", "DELETE", "INSERT",
    				"SHOW", "SELECT", "FROM", "WHERE", "\"", "'");
                    
	$filtered_string = $string;
    
    foreach($to_delete as $actual_filter)
    {
    	$filtered_string = str_replace($actual_filter, " ", $filtered_string);
    }
	
	return $filtered_string;
}

/**
 * Encrypts a string using a hash function.
 *
 * @param string $string The string to encrypt.
 *
 * @return string Returns the encrypted string.
**/

function encrypt_string($string)
{
	$encryptedString = hash( 'sha512', sha1( md5( $string ) ) );
	
	return $encryptedString;
}

/**
 * Decrypts the username
 *
 * @param string $encrypted_username The encrypted username
 * @param string $servername The IP or domain of the MySQL server 
 * @param string $username User to login into the MySQL DBMS
 * @param string $password The user's password to enter into the DBMS
 * @param string $dbname The name of the database
 * @param string $tables_prefix The MySQL tables prefix
 *
 * @return string Decrypted username.
**/
 
function decrypt_username($encrypted_username, $server_name, $username, $password, $database_name, $tables_prefix)
{
	$decrypted_username	= "";
	
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
			if($encrypted_username == encrypt_string($row['username']))
			{
				$decrypted_username = $row['username'];
			}
		}
	}
	
	// Closing connection
	$conn->close();
	
	return $decrypted_username;
}

/**
 * Getter for an array with the subfolders of a directory.
 *
 * @param string The directory to scan.
 *
 * @return array Returns the subfolders array.
**/

function get_subfolders_array($directory)
{
	$subfolders = array();
	
	if(is_dir($directory)) {
		
		$content = scandir($directory);

		for($i=0; $i<sizeof($content); $i++) {
			
			$subdirectory = $content[$i];
			
			if($directory != "/") { $subdirectory = "/".$content[$i]; }
			
			if(!($content[$i]=="." || $content[$i]=="..")) {
				
				array_push($subfolders, $content[$i]);
				
			}
		}
	}
	return $subfolders;
}

/**
 * Getter for an array with the users of the CMS.
 *
 * @param string $servername The IP or domain of the MySQL server 
 * @param string $username User to login into the MySQL DBMS
 * @param string $password The user's password to enter into the DBMS
 * @param string $dbname The name of the database
 * @param string $tables_prefix The MySQL tables prefix
 *
 * @return array Returns an array with data of all users.
**/

function get_users($server_name, $username, $password, $database_name, $tables_prefix)
{
	$users	= array();
	$user	= new User();
	
	// Create connection
	$conn = new mysqli($server_name, $username, $password, $database_name);
	
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql	= "SELECT * FROM ".$tables_prefix."users WHERE deleted=0 ORDER BY ID DESC";
	$result	= $conn->query($sql);

	if ($result->num_rows > 0)
	{
		// Output data of each row
		while($row = $result->fetch_assoc())
		{
			$user -> setIdentifier($row['ID']);
			$user -> setUsername($row['username']);
			$user -> setPassword($row['password']);
			$user -> setUserType($row['type']);
			$user -> setDisplayname($row['displayname']);
			$user -> setSurname($row['surname']);
			$user -> setName($row['name']);
			$user -> setBirthdate($row['birthdate']);
			$user -> setEmail($row['email']);
			$user -> setUrl($row['url']);
			$user -> setLastModify($row['last_modify']);
			
			// Informations
            array_push($users, $user);
			
			$user = new User();
		}
	}
	
	// Closing connection
	$conn->close();
	
	return $users;
}

/**
 * Getter for an array with the pages.
 *
 * @param string $server_name The IP or domain of the MySQL server 
 * @param string $username User to login into the MySQL DBMS
 * @param string $password The user's password to enter into the DBMS
 * @param string $database_name The name of the database
 * @param string $tables_prefix The MySQL tables prefix
 *
 * @return array Returns an array with pages data.
**/
 
function get_pages($server_name, $username, $password, $database_name, $tables_prefix)
{
	$pages	= array();
	$page	= new Page();
	
	// Create connection
	$conn = new mysqli($server_name, $username, $password, $database_name);
	
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql	=
	"SELECT

	".$tables_prefix."pages.ID,
	".$tables_prefix."users.displayname AS 'author',
	".$tables_prefix."pages.title,
	".$tables_prefix."pages.content,
	".$tables_prefix."pages.last_modify

	FROM ".$tables_prefix."pages LEFT JOIN ".$tables_prefix."users
	ON ".$tables_prefix."pages.author = ".$tables_prefix."users.ID

	WHERE ".$tables_prefix."pages.deleted=0
	ORDER BY ID DESC;";
	
	$result	= $conn->query($sql);

	if ($result->num_rows > 0)
	{
		// Output data of each row
		while($row = $result->fetch_assoc())
		{
			$page -> setIdentifier($row['ID']);
			$page -> setAuthor($row['author']);
			$page -> setTitle($row['title']);
			$page -> setContent($row['content']);
			$page -> setLastModify($row['last_modify']);
			
			// Informations
            array_push($pages, $page);
			
			$page = new Page();
		}
	}
	
	// Closing connection
	$conn->close();
	
	return $pages;
}

/**
 * Getter for an array with the articles.
 *
 * @param string $server_name The IP or domain of the MySQL server 
 * @param string $username User to login into the MySQL DBMS
 * @param string $password The user's password to enter into the DBMS
 * @param string $database_name The name of the database
 * @param string $tables_prefix The MySQL tables prefix
 *
 * @return array Returns an array with articles data.
**/
 
function get_articles($server_name, $username, $password, $database_name, $tables_prefix)
{
	$articles	= array();
	$article	= new Article();
	
	// Create connection
	$conn = new mysqli($server_name, $username, $password, $database_name);
	
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql	=
	"SELECT

	".$tables_prefix."articles.ID,
	".$tables_prefix."articles.title,
	".$tables_prefix."articles.category,
	".$tables_prefix."users.displayname AS 'author',
	".$tables_prefix."articles.description,
	".$tables_prefix."articles.content,
	".$tables_prefix."articles.last_modify

	FROM ".$tables_prefix."articles LEFT JOIN ".$tables_prefix."users
	ON ".$tables_prefix."articles.author = ".$tables_prefix."users.ID

	WHERE ".$tables_prefix."articles.deleted=0
	ORDER BY ID DESC;";
	
	$result	= $conn->query($sql);

	if ($result->num_rows > 0)
	{
		// Output data of each row
		while($row = $result->fetch_assoc())
		{
			$article -> setIdentifier($row['ID']);
			$article -> setTitle($row['title']);
			$article -> setCategory($row['category']);
			$article -> setAuthor($row['author']);
			$article -> setDescription($row['description']);
			$article -> setContent($row['content']);
			$article -> setLastModify($row['last_modify']);
			
			// Informations
            array_push($articles, $article);
			
			$article = new Article();
		}
	}
	
	// Closing connection
	$conn->close();
	
	return $articles;
}

/**
 * Getter for an array with the articles.
 *
 * @param int $articles_list_start_from Index where to start getting articles
 * @param int $articles_list_max_size Max size of the list
 * @param string $server_name The IP or domain of the MySQL server 
 * @param string $username User to login into the MySQL DBMS
 * @param string $password The user's password to enter into the DBMS
 * @param string $database_name The name of the database
 * @param string $tables_prefix The MySQL tables prefix
 *
 * @return array Returns an array with articles data.
**/
 
function get_articles_limited_list( $articles_list_start_from, $articles_list_max_size, $server_name, $username, $password, $database_name, $tables_prefix)
{
	$articles	= array();
	$article	= new Article();
	
	// Create connection
	$conn = new mysqli($server_name, $username, $password, $database_name);
	
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql	=
	"SELECT

	".$tables_prefix."articles.ID,
	".$tables_prefix."articles.title,
	".$tables_prefix."articles.category,
	".$tables_prefix."users.displayname AS 'author',
	".$tables_prefix."articles.description,
	".$tables_prefix."articles.content,
	".$tables_prefix."articles.last_modify

	FROM ".$tables_prefix."articles LEFT JOIN ".$tables_prefix."users
	ON ".$tables_prefix."articles.author = ".$tables_prefix."users.ID

	WHERE ".$tables_prefix."articles.deleted=0
	ORDER BY ID DESC;";
	
	$result	= $conn->query($sql);

	if ($result->num_rows > 0)
	{
		$index = 0;
		$elements_to_add = $articles_list_max_size;
		
		// Output data of each row
		while($row = $result->fetch_assoc())
		{
			if($index >= $articles_list_start_from && $elements_to_add > 0)
			{
				$article -> setIdentifier($row['ID']);
				$article -> setTitle($row['title']);
				$article -> setCategory($row['category']);
				$article -> setAuthor($row['author']);
				$article -> setDescription($row['description']);
				$article -> setContent($row['content']);
				$article -> setLastModify($row['last_modify']);
				
				// Informations
				array_push($articles, $article);
				
				$article = new Article();
				
				$elements_to_add--;
			}
			
			$index++;
		}
	}
	
	// Closing connection
	$conn->close();
	
	return $articles;
}

/**
 * Getter for an array with the articles of a category.
 *
 * @param string $category The name of the category
 * @param int $articles_list_start_from Index where to start getting articles
 * @param int $articles_list_max_size Max size of the list
 * @param string $server_name The IP or domain of the MySQL server 
 * @param string $username User to login into the MySQL DBMS
 * @param string $password The user's password to enter into the DBMS
 * @param string $database_name The name of the database
 * @param string $tables_prefix The MySQL tables prefix
 *
 * @return array Returns an array with articles data.
**/
 
function get_category_articles_limited_list( $category, $articles_list_start_from, $articles_list_max_size, $server_name, $username, $password, $database_name, $tables_prefix)
{
	$articles	= array();
	$article	= new Article();
	
	// Create connection
	$conn = new mysqli($server_name, $username, $password, $database_name);
	
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql	=
	"SELECT

	".$tables_prefix."articles.ID,
	".$tables_prefix."articles.title,
	".$tables_prefix."articles.category,
	".$tables_prefix."users.displayname AS 'author',
	".$tables_prefix."articles.description,
	".$tables_prefix."articles.content,
	".$tables_prefix."articles.last_modify

	FROM ".$tables_prefix."articles LEFT JOIN ".$tables_prefix."users
	ON ".$tables_prefix."articles.author = ".$tables_prefix."users.ID

	WHERE ".$tables_prefix."articles.deleted=0
	AND ".$tables_prefix."articles.category='".$category."'
	ORDER BY ID DESC;";
	
	$result	= $conn->query($sql);

	if ($result->num_rows > 0)
	{
		$index = 0;
		$elements_to_add = $articles_list_max_size;
		
		// Output data of each row
		while($row = $result->fetch_assoc())
		{
			if($index >= $articles_list_start_from && $elements_to_add > 0)
			{
				$article -> setIdentifier($row['ID']);
				$article -> setTitle($row['title']);
				$article -> setCategory($row['category']);
				$article -> setAuthor($row['author']);
				$article -> setDescription($row['description']);
				$article -> setContent($row['content']);
				$article -> setLastModify($row['last_modify']);
				
				// Informations
				array_push($articles, $article);
				
				$article = new Article();
				
				$elements_to_add--;
			}
			
			$index++;
		}
	}
	
	// Closing connection
	$conn->close();
	
	return $articles;
}

/**
 * Getter for an array with the articles of a searched string.
 *
 * @param string $search The searched string
 * @param int $articles_list_start_from Index where to start getting articles
 * @param int $articles_list_max_size Max size of the list
 * @param string $server_name The IP or domain of the MySQL server 
 * @param string $username User to login into the MySQL DBMS
 * @param string $password The user's password to enter into the DBMS
 * @param string $database_name The name of the database
 * @param string $tables_prefix The MySQL tables prefix
 *
 * @return array Returns an array with articles data.
**/
 
function get_search_articles_limited_list( $search, $articles_list_start_from, $articles_list_max_size, $server_name, $username, $password, $database_name, $tables_prefix)
{
	$articles	= array();
	$article	= new Article();
	
	// Create connection
	$conn = new mysqli($server_name, $username, $password, $database_name);
	
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql	=
	"SELECT

	".$tables_prefix."articles.ID,
	".$tables_prefix."articles.title,
	".$tables_prefix."articles.category,
	".$tables_prefix."users.displayname AS 'author',
	".$tables_prefix."articles.description,
	".$tables_prefix."articles.content,
	".$tables_prefix."articles.last_modify

	FROM ".$tables_prefix."articles LEFT JOIN ".$tables_prefix."users
	ON ".$tables_prefix."articles.author = ".$tables_prefix."users.ID

	WHERE ".$tables_prefix."articles.deleted=0
	AND ".$tables_prefix."articles.content LIKE '%".$search."%'
	ORDER BY ID DESC;";
	
	$result	= $conn->query($sql);

	if ($result->num_rows > 0)
	{
		$index = 0;
		$elements_to_add = $articles_list_max_size;
		
		// Output data of each row
		while($row = $result->fetch_assoc())
		{
			if($index >= $articles_list_start_from && $elements_to_add > 0)
			{
				$article -> setIdentifier($row['ID']);
				$article -> setTitle($row['title']);
				$article -> setCategory($row['category']);
				$article -> setAuthor($row['author']);
				$article -> setDescription($row['description']);
				$article -> setContent($row['content']);
				$article -> setLastModify($row['last_modify']);
				
				// Informations
				array_push($articles, $article);
				
				$article = new Article();
				
				$elements_to_add--;
			}
			
			$index++;
		}
	}
	
	// Closing connection
	$conn->close();
	
	return $articles;
}

?>
