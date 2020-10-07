<?php

/**
 * Login page for the administration area.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

require("../system/core/configuration.php");
require("../system/core/functions.php");
require("../system/core/information.php");
require("../system/core/modules/authentication/check.php");
require("../system/core/modules/lockout/check.php");
require("../system/core/classes/User.php");

// system/core/modules
if($isLocked)
{
	header("location: ../index.php");
}

// system/core/modules
if(!$isAuthenticated)
{
	// LOGIN
	if (isset($_POST['username']) && isset($_POST['password']))
	{
		$users 			= get_users($server_name, $username, $password, $database_name, $tables_prefix);
		$logged_in	= false;
		
		// CHECK
		foreach($users as $user)
		{
			if ( $user->getUsername() == $_POST['username']
				&& $user->getPassword() == encrypt_string($_POST['password']) )
			{
				// IF ALL DATA CORRECT
				$logged_in = true;
				require("../system/core/modules/lockout/remove.php");
				setcookie($website_name."-username",		encrypt_string($_POST['username']),	time() + $cookie_expire_seconds, "/");
				setcookie($website_name."-password",		encrypt_string($_POST['password']), time() + $cookie_expire_seconds, "/");
				setcookie($website_name."-user-type",		$user->getUserType(),				time() + $cookie_expire_seconds, "/");
				setcookie($website_name."-user-displayname",$user->getDisplayname(),			time() + $cookie_expire_seconds, "/");
				header("location: panel.php");
			}
		}
		
		if(!$logged_in)
		{
			// IF SOMETHING IS WRONG
			require("../system/core/modules/lockout/increase.php");
			header("location: ../index.php");
		}
	}
}
else
{
	header("location: panel.php");
}

// TEMPLATE
require("../interface/templates/".$template_administration."/administration/login.php");

?>
