<?php

/**
 * Template for the index page.
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
	
	<title>Users Manager | <?php echo($website_name); ?></title>

	<link href="../../../interface/themes/<?php echo($theme_applications); ?>/css/include.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../../../interface/themes/<?php echo($theme_applications); ?>/css/theme.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../../../interface/themes/<?php echo($theme_applications); ?>/css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>

	<!-- ICONS -->
	<link rel="icon" href="../../../interface/templates/<?php echo($template_applications); ?>/images/logo/logo-32x32.png" sizes="32x32" />
	<link rel="icon" href="../../../interface/templates/<?php echo($template_applications); ?>/images/logo/logo-192x192.png" sizes="192x192" />
	
</head>
<body>

	<nav>
		<section>
			<a id="logo-container" href="index.php"><?php echo($website_name); ?></a>
			<ul class="nav-menu">
				<li><a class="menu-icon" href="../../../administration/panel.php"><img src="../../../interface/templates/<?php echo($template_applications); ?>/images/icons/lock.png" title="Administration" /></a></li>
				<li><a class="menu-icon" href="../../../web/index.php"><img src="../../../interface/templates/<?php echo($template_applications); ?>/images/icons/web.png" title="Web" /></a></li>
			</ul>
		</section>
	</nav>

	<section>
		<article>
			
			<aside>
				<h5 class="row-element">Users</h5>
				<p class="chip"><a href="new.php">New</a></p>
			</aside>
			
			<!-- USERS TABLE / START -->
			<table>
				<tr>
					<th class="hidden-on-mobile">ID</th>
					<th>User</th>
					<th class="hidden-on-mobile">Type</th>
					<th>Email</th>
					<th class="hidden-on-mobile">Date</th>
					<th>-</th>
					<th>-</th>
				</tr>
				<?php
				
				foreach($users as $user)
				{
					echo(
						'<tr>
							<td class="hidden-on-mobile">'.$user->getIdentifier().'</td>
							<td>'.$user->getUsername().'</td>
							<td class="hidden-on-mobile">'.$user->getUserType().'</td>
							<td>'.$user->getEmail().'</td>
							<td class="hidden-on-mobile">'.$user->getDate().'</td>
							<td><a href="edit.php?id='.$user->getIdentifier().'" class="link">Edit</a></td>
							<td><a href="remove.php?id='.$user->getIdentifier().'&username='.$user->getUsername().'" class="link">Remove</a></td>
						</tr>'
					);
				}
				
				?>
			</table>
			<!-- USERS TABLE / END -->
			
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