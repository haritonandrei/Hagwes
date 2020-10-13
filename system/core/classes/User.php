<?php

/**
 * Class "User".
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

class User
{
	// Attributes
	private $identifier;
	private $username;
	private $password;
	private $type;
	private $displayname;
	private $surname;
	private $name;
	private $birthdate;
	private $email;
	private $url;
	private $date;
	private $last_modify;
	
	// Constructor
	public function __construct()
	{
		$this->identifier	= "";
		$this->username		= "";
		$this->password		= "";
		$this->type			= "";
		$this->displayname	= "";
		$this->surname		= "";
		$this->name			= "";
		$this->birthdate	= "";
		$this->email		= "";
		$this->url			= "";
		$this->date			= "";
		$this->last_modify	= "";
	}
	
	// Destructor
	public function __destruct()
	{
	}
	
	/**
	 * Getter for the ID.
	 *
	 * @return string The ID of the user 
	**/
	public function getIdentifier()
	{
		return $this->identifier;
	}
	
	/**
	 * Getter for the username.
	 *
	 * @return string The username of the user 
	**/
	public function getUsername()
	{
		return $this->username;
	}
	
	/**
	 * Getter for the password.
	 *
	 * @return string The password of the user 
	**/
	public function getPassword()
	{
		return $this->password;
	}
	
	/**
	 * Getter for the type.
	 *
	 * @return string The type of the user 
	**/
	public function getUserType()
	{
		return $this->type;
	}
	
	/**
	 * Getter for the displayname.
	 *
	 * @return string The displayname of the user 
	**/
	public function getDisplayname()
	{
		return $this->displayname;
	}
	
	/**
	 * Getter for the surname.
	 *
	 * @return string The surname of the user 
	**/
	public function getSurname()
	{
		return $this->surname;
	}
	
	/**
	 * Getter for the name.
	 *
	 * @return string The name of the user 
	**/
	public function getName()
	{
		return $this->name;
	}
	
	/**
	 * Getter for the birthdate.
	 *
	 * @return string The birthdate of the user 
	**/
	public function getBirthdate()
	{
		return $this->birthdate;
	}
	
	/**
	 * Getter for the email.
	 *
	 * @return string The email of the user 
	**/
	public function getEmail()
	{
		return $this->email;
	}
	
	/**
	 * Getter for the url.
	 *
	 * @return string The url of the user 
	**/
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * Getter for the date.
	 *
	 * @return string The date of the user 
	**/
	public function getDate()
	{
		return $this->date;
	}
	
	/**
	 * Getter for the last_modify.
	 *
	 * @return string The last_modify of the user 
	**/
	public function getLastModify()
	{
		return $this->last_modify;
	}
	
	/**
	 * Setter for the ID.
	 *
	 * @param string $identifier The ID of the page 
	**/
	public function setIdentifier($identifier)
	{
		$this->identifier = $identifier;
	}
	
	/**
	 * Setter for the username.
	 *
	 * @param string $username The username of the user 
	**/
	public function setUsername($username)
	{
		$this->username = $username;
	}
	
	/**
	 * Setter for the password.
	 *
	 * @param string $password The password of the user 
	**/
	public function setPassword($password)
	{
		$this->password = $password;
	}
	
	/**
	 * Setter for the type.
	 *
	 * @param string $type The type of the user 
	**/
	public function setUserType($type)
	{
		$this->type = $type;
	}
	
	/**
	 * Setter for the displayname.
	 *
	 * @param string $displayname The displayname of the user 
	**/
	public function setDisplayname($displayname)
	{
		$this->displayname = $displayname;
	}
	
	/**
	 * Setter for the surname.
	 *
	 * @param string $surname The surname of the user 
	**/
	public function setSurname($surname)
	{
		$this->surname = $surname;
	}
	
	/**
	 * Setter for the name.
	 *
	 * @param string $name The name of the user 
	**/
	public function setName($name)
	{
		$this->name = $name;
	}
	
	/**
	 * Setter for the birthdate.
	 *
	 * @param string $birthdate The birthdate of the user 
	**/
	public function setBirthdate($birthdate)
	{
		$this->birthdate = $birthdate;
	}
	
	/**
	 * Setter for the email.
	 *
	 * @param string $email The email of the user 
	**/
	public function setEmail($email)
	{
		$this->email = $email;
	}
	
	/**
	 * Setter for the url.
	 *
	 * @param string $url The url of the user 
	**/
	public function setUrl($url)
	{
		$this->url = $url;
	}

	/**
	 * Setter for the date.
	 *
	 * @param string $date The date of the user 
	**/
	public function setDate($datetime)
	{
		$date = explode(" ", $datetime)[0];
		$this->date = $date;
	}
	
	/**
	 * Setter for the last_modify.
	 *
	 * @param string $last_modify The last_modify of the user 
	**/
	public function setLastModify($last_modify)
	{
		$this->last_modify = $last_modify;
	}
	
	/**
	 * Loads the data of a single user by ID.
	 *
	 * @param int $id The ID
	 * @param string $server_name The IP or domain of the MySQL server 
	 * @param string $username User to login into the MySQL DBMS
	 * @param string $password The user's password to enter into the DBMS
	 * @param string $database_name The name of the database
	 * @param string $tables_prefix The MySQL tables prefix
	**/
	public function loadUserByID($id, $server_name, $username, $password, $database_name, $tables_prefix)
	{
		$conn = new mysqli($server_name, $username, $password, $database_name);

		$sql	= "SELECT * FROM ".$tables_prefix."users WHERE deleted=0";
		$result	= $conn->query($sql);

		if ($result->num_rows > 0) {
			
			while($row = $result->fetch_assoc()) {
				
				if($row['ID'] == $id) {
					
					$this->identifier	= $row['ID'];
					$this->username		= $row['username'];
					$this->password		= $row['password'];
					$this->type			= $row['type'];
					$this->displayname	= $row['displayname'];
					$this->surname		= $row['surname'];
					$this->name			= $row['name'];
					$this->birthdate	= $row['birthdate'];
					$this->email		= $row['email'];
					$this->url			= $row['url'];
					$this->date			= $row['date'];
					$this->last_modify	= $row['last_modify'];
					
				}
				
			}
			
		}
		
		$conn->close();
	}

	/**
	 * Loads the data of a single user by username.
	 *
	 * @param string $username The username
	 * @param string $server_name The IP or domain of the MySQL server 
	 * @param string $sql_username User to login into the MySQL DBMS
	 * @param string $sql_password The user's password to enter into the DBMS
	 * @param string $database_name The name of the database
	 * @param string $tables_prefix The MySQL tables prefix
	**/
	public function loadUserByUsername($username, $server_name, $sql_username, $sql_password, $database_name, $tables_prefix)
	{
		$conn = new mysqli($server_name, $sql_username, $sql_password, $database_name);

		$sql	= "SELECT * FROM ".$tables_prefix."users WHERE deleted=0";
		$result	= $conn->query($sql);

		if ($result->num_rows > 0) {
			
			while($row = $result->fetch_assoc()) {
				
				if($row['username'] == $username) {
					
					$this->identifier	= $row['ID'];
					$this->username		= $row['username'];
					$this->password		= $row['password'];
					$this->type			= $row['type'];
					$this->displayname	= $row['displayname'];
					$this->surname		= $row['surname'];
					$this->name			= $row['name'];
					$this->birthdate	= $row['birthdate'];
					$this->email		= $row['email'];
					$this->url			= $row['url'];
					$this->date			= $row['date'];
					$this->last_modify	= $row['last_modify'];
					
				}
				
			}
			
		}
		
		$conn->close();
	}
}

?>
