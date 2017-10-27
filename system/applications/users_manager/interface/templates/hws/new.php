<?php

/**
 * Template for the new user page.
 *
 * @author		Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright	2016-2017 Hariton Andrei Marius
 * @license	http://opensource.org/licenses/mit-license.php  MIT license
**/

?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	
	<title>Users manager | <?php echo($website_name); ?></title>

	<link href="../../../interface/themes/<?php echo($theme_applications); ?>/css/theme.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../../../interface/themes/<?php echo($theme_applications); ?>/css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	
</head>
<body>

	<nav>
		<section>
			<a id="logo-container" href="index.php"><?php echo($website_name); ?></a>
			<ul class="nav-menu">
				<li><a href="../../../administration/panel.php">Administration</a></li>
				<li><a href="../../../web/index.php">Web</a></li>
			</ul>
		</section>
	</nav>

	<section>
		<article>
			
			<?php
			
			if(isset($_GET['error']))
			{
				switch($_GET['error'])
				{
					case "username_already_used":	echo("<blockquote>Username already used, try with another one!</blockquote>"); break;
					default:						echo("<blockquote>Unknown error</blockquote>");
				}
			}
			
			?>
			
			<form action="system/tools/new.php" method="post">
				<h5>New user</h5>
				<!-- Username -->
				<input type="text" name="username" placeholder="Username *" autofocus required pattern="[A-Za-z0-9]{5,16}" title="5-16 alphanumeric/numeric characters">
				<!-- Password -->
				<input type="password" name="password" placeholder="Password *" required pattern=".{8,255}" title="8-255 characters">
				<!-- Type -->
				<select name="type">
					<option value="super-user">Super user</option>
					<option value="limited-user">Limited user</option>
					<option value="guest-user">Guest user</option>
				</select>
				<!-- Display Name -->
				<input type="text" name="displayname" placeholder="Display Name *" required pattern="[A-Za-z0-9]{5,16}" title="5-16 alphanumeric/numeric characters">
				<!-- Surname -->
				<input type="text" name="surname" placeholder="Surname" pattern="[A-Za-z]{4,16}" title="4-16 alphanumeric characters">
				<!-- Name -->
				<input type="text" name="name" placeholder="Name" pattern="[A-Za-z]{4,24}" title="4-24 alphanumeric characters">
				<!-- Birthdate -->
				<input type="date" name="birthdate" placeholder="Birthdate" value="<?php echo(date("Y-m-d")); ?>">
				<!-- Email -->
				<input type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Insert a valid email">
				<!-- URL -->
				<input type="text" name="url" placeholder="URL" pattern="https?://.+" title="Include http://">
				<input type="submit" value="Create">
			</form>
		
		</article>
	</section>
	
	<footer>
		<div>
			<section>
				<?php echo($copyright); ?>
			</section>
		</div>
	</footer>

	<script src="../../../interface/themes/<?php echo($theme_applications); ?>/js/theme.js"></script>
	<script src="../../../interface/themes/<?php echo($theme_applications); ?>/js/custom.js"></script>

</body>
</html>
