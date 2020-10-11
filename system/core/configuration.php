<?php

/**
 * The basic configuration for the right working of the system.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

// SERVER - DATABASE
	
$database_name	= "my_hws_db";
$tables_prefix	= "it_blog_";

// SERVER - HOST

$server_name	= "127.0.0.1";
$username		= "root";
$password		= "";

// SYSTEM - INTERFACE

$template_web				= "hws20";
$template_administration	= "hws20";
$template_applications		= "hws20";
$theme_web					= "hws20_blue";
$theme_administration		= "hws20_blue";
$theme_applications			= "hws20_blue";
$website_name				= "Hagwes";
$website_description		= "Lightweight, secure, smart.";
$copyright					= "© 2016-".date("Y")." by Hariton Andrei Marius.";

// SYSTEM - SETTINGS

$allow_guests_registration	= FALSE;
$index_page_enabled			= FALSE;
$pages_menu_enabled			= TRUE;
$list_max_size				= 10;		// into a page
$cookie_expire_seconds		= 1800;		// 86400 - 1 day, 3600 - 1 hour.

// SYSTEM - UPGRADES
$upgrades_url = "";

?>
