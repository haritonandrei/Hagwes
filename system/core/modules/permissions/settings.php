<?php

/**
 * Array with permissions.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

// PERMISSIONS SETTINGS
$super_user = array
(
	"install"				=> true,
	"disinstall"			=> true,
	"download"				=> true,
	"upload"				=> true,
	"create"				=> true,
	"modify"				=> true,
	"delete"				=> true,
	"create_reserved_data"	=> true,
	"modify_reserved_data"	=> true,
	"see_reserved_data"		=> true,
	"select_any_author"		=> true,
	"explore_directories"	=> true
);

$limited_user = array
(
	"install"				=> false,
	"disinstall"			=> false,
	"download"				=> false,
	"upload"				=> true,
	"create"				=> true,
	"modify"				=> false,
	"delete"				=> false,
	"create_reserved_data"	=> false,
	"modify_reserved_data"	=> false,
	"see_reserved_data"		=> false,
	"select_any_author"		=> false,
	"explore_directories"	=> true
);

$guest_user = array
(
	"install"				=> false,
	"disinstall"			=> false,
	"download"				=> false,
	"upload"				=> false,
	"create"				=> false,
	"modify"				=> false,
	"delete"				=> false,
	"create_reserved_data"	=> false,
	"modify_reserved_data"	=> false,
	"see_reserved_data"		=> false,
	"select_any_author"		=> false,
	"explore_directories"	=> false
);

// PERMISSIONS ARRAY
$permissions = array
(
	"super-user"	=> $super_user,
	"limited-user"	=> $limited_user,
	"guest-user"	=> $guest_user
);

?>
