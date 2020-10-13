<?php

/**
 * Class "Article".
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

class Article
{
	// Attributes
	private $identifier;
	private $title;
	private $author;
	private $category;
	private $description;
	private $content;
	private $date;
	private $last_modify;
	
	// Constructor
	public function __construct()
	{
		$this->identifier	= "";
		$this->author		= "";
		$this->title 		= "";
		$this->category		= "";
		$this->description	= "";
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
	 * @return string The ID of the article 
	**/
	public function getIdentifier()
	{
		return $this->identifier;
	}
	
	/**
	 * Getter for the author.
	 *
	 * @return string The author of the article 
	**/
	public function getAuthor()
	{
		return $this->author;
	}
	
	/**
	 * Getter for the title.
	 *
	 * @return string The title of the article 
	**/
	public function getTitle()
	{
		return $this->title;
	}
	
	/**
	 * Getter for the category.
	 *
	 * @return string The category of the article 
	**/
	public function getCategory()
	{
		return $this->category;
	}
	
	/**
	 * Getter for the description.
	 *
	 * @return string The description of the article 
	**/
	public function getDescription()
	{
		return $this->description;
	}
	
	/**
	 * Getter for the content.
	 *
	 * @return string The content of the article 
	**/
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * Getter for the date.
	 *
	 * @return string The date of the article 
	**/
	public function getDate()
	{
		return $this->date;
	}
	
	/**
	 * Getter for the last modify.
	 *
	 * @return string The last modify of the article 
	**/
	public function getLastModify()
	{
		return $this->last_modify;
	}
	
	/**
	 * Setter for the ID.
	 *
	 * @param string $identifier The ID of the article 
	**/
	public function setIdentifier($identifier)
	{
		$this->identifier = $identifier;
	}
	
	/**
	 * Setter for the author.
	 *
	 * @param string $author The author of the article 
	**/
	public function setAuthor($author)
	{
		$this->author = $author;
	}
	
	/**
	 * Setter for the title.
	 *
	 * @param string $title The title of the article 
	**/
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	/**
	 * Setter for the category.
	 *
	 * @param string $category The category of the article 
	**/
	public function setCategory($category)
	{
		$this->category = $category;
	}
	
	/**
	 * Setter for the description.
	 *
	 * @param string $description The description of the article 
	**/
	public function setDescription($description)
	{
		$this->description = $description;
	}
	
	/**
	 * Setter for the content.
	 *
	 * @param string $content The content of the article 
	**/
	public function setContent($content)
	{
		$this->content = $content;
	}

	/**
	 * Setter for the date.
	 *
	 * @param string $date The date of the article 
	**/
	public function setDate($date)
	{
		$this->date = $date;
	}
	
	/**
	 * Setter for the last modify.
	 *
	 * @param string $last_modify The last modify of the article 
	**/
	public function setLastModify($last_modify)
	{
		$this->last_modify = $last_modify;
	}
	
	/**
	 * Loads the data of a single article.
	 *
	 * @param int $id The ID
	 * @param string $server_name The IP or domain of the MySQL server 
	 * @param string $username User to login into the MySQL DBMS
	 * @param string $password The user's password to enter into the DBMS
	 * @param string $database_name The name of the database
	 * @param string $tables_prefix The MySQL tables prefix
	**/
	public function loadArticle($id, $server_name, $username, $password, $database_name, $tables_prefix)
	{
		$conn = new mysqli($server_name, $username, $password, $database_name);

		$sql	=
		"SELECT

		".$tables_prefix."articles.ID,
		".$tables_prefix."articles.title,
		".$tables_prefix."articles.category,
		".$tables_prefix."users.displayname AS 'author',
		".$tables_prefix."articles.description,
		".$tables_prefix."articles.content,
		".$tables_prefix."articles.date,
		".$tables_prefix."articles.last_modify

		FROM ".$tables_prefix."articles LEFT JOIN ".$tables_prefix."users
		ON ".$tables_prefix."articles.author = ".$tables_prefix."users.ID

		WHERE ".$tables_prefix."articles.deleted=0
		ORDER BY date DESC;";
		
		$result	= $conn->query($sql);

		if ($result->num_rows > 0) {
			
			while($row = $result->fetch_assoc()) {
				
				if($row['ID'] == $id) {
					
					$this->identifier	= $row['ID'];
					$this->title		= $row['title'];
					$this->author		= $row['author'];
					$this->category		= $row['category'];
					$this->description	= $row['description'];
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