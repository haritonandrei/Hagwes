<?php

/**
 * Template for the administration's login.
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
	
	<title>Login | <?php echo($website_name); ?></title>

	<link href="../interface/themes/<?php echo($theme_administration); ?>/css/include.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../interface/themes/<?php echo($theme_administration); ?>/css/theme.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../interface/themes/<?php echo($theme_administration); ?>/css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>

	<!-- ICONS -->
	<link rel="icon" href="../interface/templates/<?php echo($template_administration); ?>/images/logo/logo-32x32.png" sizes="32x32" />
	<link rel="icon" href="../interface/templates/<?php echo($template_administration); ?>/images/logo/logo-192x192.png" sizes="192x192" />
  
</head>
<body>	
	
	<nav>
		<section>
			<a id="logo-container" href="index.php"><?php echo($website_name); ?></a>
			<ul class="nav-menu">
				<li><a href="../index.php" class="menu-icon"><img src="../interface/templates/<?php echo($template_administration); ?>/images/icons/web.png" title="Web" /></a></li>
			</ul>
		</section>
	</nav>

	<section>
		<article>

			<div>
				<?php
				
				// LOGIN HEADER
				require("../interface/template-parts/administration/login-header.php");
				
				?>
			</div>
		
			<form method="post" action="login.php">
				<h5>Authentication</h5>
				<input type="text" name="username" placeholder="Username" autofocus required pattern="[A-Za-z0-9]{5,15}" title="From 5 to 15 alphanumeric and numeric characters">
				<input type="password" name="password" placeholder="Password" required pattern=".{8,}" title="Minimum 8 characters">
				<input type="submit" value="Login">
			</form>

			<!-- GUESTS REGISTRATION -->
			<?php
			
			if($allow_guests_registration)
			{
				echo('
				<blockquote>
					<a href="../system/applications/users_manager/registration.php">Register</a>
				</blockquote>
				');
			}
			
			?>
			
			<!-- CMS INFORMATIONS -->
			<aside>
				<h5><?php echo($name); ?></h5>
				<ul>
					<li>Version: <?php echo($version); ?>.</li>
					<li>Author: <?php echo($author); ?>.</li>
					<li>License: <?php echo($license); ?>.</li>
				</ul>
			</aside>
			
			<div>
				<?php
				
				// LOGIN FOOTER
				require("../interface/template-parts/administration/login-footer.php");
				
				?>
			</div>
			
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
