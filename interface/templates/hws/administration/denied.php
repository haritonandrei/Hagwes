<?php

/**
 * Template for the administration's panel.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	
	<title>Denied action | <?php echo($website_name); ?></title>

	<link href="../interface/themes/<?php echo($theme_administration); ?>/css/theme.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../interface/themes/<?php echo($theme_administration); ?>/css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
</head>
<body>	
	
	<nav>
		<section>
			<a id="logo-container" href="index.php"><?php echo($website_name); ?></a>
			<ul class="nav-menu">
				<li><a href="../index.php">Web</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</section>
	</nav>

	<section>
		<article>
		  
			<!-- NOTIFY MESSAGE -->
			<aside>
				<h5>Denied action</h5>
			</aside>
			
			You already tried to make an action that you can't make. The reason can be:
			<ul>
				<li>You have a <b>limited user</b> or a <b>guest user</b> account.</li>
				<li>You tried to delete an essential theme or plugin.</li>
				<li>You tried to remove the homepage (page with ID=1).</li>
				<li>You tried to remove your own <b>super-user</b> account (let another super-user to delete your account).</li>
				<li>There was an error (bug).</li>
			</ul>
			If the reason can be an error (bug), try to make another time the action you were trying to do; else contact me on my website.
			
			<!-- CMS INFORMATIONS -->
			<aside>
				<h5><?php echo($name); ?></h5>
				<ul>
					<li>Version: <?php echo($version); ?>.</li>
					<li>Author: <?php echo($author); ?>.</li>
					<li>License: <?php echo($license); ?>.</li>
				</ul>
			</aside>

		</article>
	</section>

	<footer>
		<div>
			<section>
				<?php echo($copyright); ?>
			</section>
		</div>
	</footer>

	<script src="../interface/themes/<?php echo($theme_administration); ?>/js/theme.js"></script>
	<script src="../interface/themes/<?php echo($theme_administration); ?>/js/custom.js"></script>

</body>
</html>
