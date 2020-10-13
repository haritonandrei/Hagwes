<?php

/**
 * Class "Page".
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

class Page
{
	// Attributes
	private $identifier;
	private $author;
	private $title;
	private $content;
	private $date;
	private $last_modify;
	
	// Constructor
	public function __construct()
	{
		$this->identifier	= "";
		$this->author		= "";
		$this->title 		= "";
		$this->content		= "";
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
	 * @return string The ID of the page 
	**/
	public function getIdentifier()
	{
		return $this->identifier;
	}
	
	/**
	 * Getter for the author.
	 *
	 * @return string The author of the page 
	**/
	public function getAuthor()
	{
		return $this->author;
	}
	
	/**
	 * Getter for the title.
	 *
	 * @return string The title of the page 
	**/
	public function getTitle()
	{
		return $this->title;
	}
	
	/**
	 * Getter for the content.
	 *
	 * @return string The content of the page 
	**/
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * Getter for the date.
	 *
	 * @return string The date of the page 
	**/
	public function getDate()
	{
		return $this->date;
	}
	
	/**
	 * Getter for the last modify.
	 *
	 * @return string The last modify of the page 
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
	 * Setter for the author.
	 *
	 * @param string $author The author of the page 
	**/
	public function setAuthor($author)
	{
		$this->author = $author;
	}
	
	/**
	 * Setter for the title.
	 *
	 * @param string $title The title of the page 
	**/
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	/**
	 * Setter for the content.
	 *
	 * @param string $content The content of the page 
	**/
	public function setContent($content)
	{
		$this->content = $content;
	}

	/**
	 * Setter for the date.
	 *
	 * @param string $date The date of the page 
	**/
	public function setDate($date)
	{
		$this->date = $date;
	}
	
	/**
	 * Setter for the last modify.
	 *
	 * @param string $last_modify The last modify of the page 
	**/
	public function setLastModify($last_modify)
	{
		$this->last_modify = $last_modify;
	}
	
	/**
	 * Loads the data of a single page.
	 *
	 * @param int $id The ID
	 * @param string $server_name The IP or domain of the MySQL server 
	 * @param string $username User to login into the MySQL DBMS
	 * @param string $password The user's password to enter into the DBMS
	 * @param string $database_name The name of the database
	 * @param string $tables_prefix The MySQL tables prefix
	**/
	public function loadPage($id, $server_name, $username, $password, $database_name, $tables_prefix)
	{
		$conn = new mysqli($server_name, $username, $password, $database_name);

		$sql	= "SELECT * FROM ".$tables_prefix."pages WHERE deleted=0 ORDER BY ID DESC";
		$result	= $conn->query($sql);

		if ($result->num_rows > 0) {
			
			while($row = $result->fetch_assoc()) {
				
				if($row['ID'] == $id) {
					
					$this->identifier	= $row['ID'];
					$this->author		= $row['author'];
					$this->title		= $row['title'];
					$this->content		= $row['content'];
					$this->date			= $row['date'];
					$this->last_modify	= $row['last_modify'];
					
				}
				
			}
			
		}
		
		$conn->close();
	}
}

?>