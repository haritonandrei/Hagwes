<?php

/**
 * Installs the database content.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

// MAKING DATABASE -----------------------------------------------------------

$conn = new mysqli($server_name, $username, $password);
$sql = "CREATE DATABASE ".$database_name."  CHARACTER SET utf8 COLLATE utf8_general_ci";
$conn->query($sql);
$conn->close();

// CONNECTION -----------------------------------------------------------

$conn = new mysqli($server_name, $username, $password, $database_name);

// USERS TABLE -----------------------------------------------------------

$sql =
"CREATE TABLE ".$tables_prefix."users (

	ID			BIGINT(20)		UNSIGNED AUTO_INCREMENT,
	deleted		TINYINT(1)		NOT NULL DEFAULT '0',
	username	VARCHAR(16)		NOT NULL,
	password	VARCHAR(255)	NOT NULL,
	type		VARCHAR(16)		NOT NULL,
	displayname	VARCHAR(16)		NOT NULL,
	surname		VARCHAR(16),
	name		VARCHAR(24),
	birthdate	DATE,
	email		VARCHAR(48),
	url			VARCHAR(48),
	date		TIMESTAMP		DEFAULT CURRENT_TIMESTAMP,
	last_modify	TIMESTAMP		DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	
	PRIMARY KEY	(ID)
	
) CHARACTER SET=utf8";

$conn->query($sql);

// ARTICLES TABLE -----------------------------------------------------------

$sql =
"CREATE TABLE ".$tables_prefix."articles (

	ID			BIGINT(20)	UNSIGNED AUTO_INCREMENT,
	author		BIGINT(20)	UNSIGNED NOT NULL,
	deleted		TINYINT(1)	NOT NULL DEFAULT '0',
	title		VARCHAR(64)	NOT NULL,
	category	VARCHAR(24),
	description	TEXT		NOT NULL,
	content		LONGTEXT	NOT NULL,
	date		TIMESTAMP	DEFAULT CURRENT_TIMESTAMP,
	last_modify	TIMESTAMP	DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	
	PRIMARY KEY	(ID),
	FOREIGN KEY	(author) REFERENCES ".$tables_prefix."users(ID) ON DELETE NO ACTION ON UPDATE CASCADE
	
) CHARACTER SET=utf8";

$conn->query($sql);

// PAGES TABLE -----------------------------------------------------------

$sql =
"CREATE TABLE ".$tables_prefix."pages (

	ID			BIGINT(20)	UNSIGNED AUTO_INCREMENT,
	author		BIGINT(20)	UNSIGNED NOT NULL,
	deleted		TINYINT(1)	NOT NULL DEFAULT '0',
	title		VARCHAR(64)	NOT NULL,
	content		LONGTEXT	NOT NULL,
	date		TIMESTAMP	DEFAULT CURRENT_TIMESTAMP,
	last_modify	TIMESTAMP	DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	
	PRIMARY KEY	(ID),
	FOREIGN KEY	(author) REFERENCES ".$tables_prefix."users(ID) ON DELETE NO ACTION ON UPDATE CASCADE
	
) CHARACTER SET=utf8";

$conn->query($sql);

// FIRST USER -----------------------------------------------------------

$sql =
"INSERT INTO ".$tables_prefix."users (
	username,
	password,
	type,
	displayname
) VALUES (
	'administrator',
	'a1d38a4b08a7b9e4124d3547d38342c545f3f35f1cf7cea228a765c6fa9616ee9384429163656b0b68dbaa9c7f90b6d0c5522b89be5424422d3af59906098f70',
	'super-user',
	'Administrator'
)";

$conn->query($sql);

// EXAMPLE ARTICLE -----------------------------------------------------------

$sql = "INSERT INTO ".$tables_prefix."articles (
	title,
	category,
	author,
	description,
	content
) VALUES (
	'Article',
	'Category',
	'1',
	'Description',
	'Content'
)";

$conn->query($sql);

// FIRST PAGES -----------------------------------------------------------

$sql = "INSERT INTO ".$tables_prefix."pages (
	title,
	author,
	content
) VALUES (
	'About',
	'1',
	'Content'
)";

$conn->query($sql);

$sql = "INSERT INTO ".$tables_prefix."pages (
	title,
	author,
	content
) VALUES (
	'Categories',
	'1',
	'Content'
)";

$conn->query($sql);

// DISCONNECTION -----------------------------------------------------------

$conn->close();

?>
