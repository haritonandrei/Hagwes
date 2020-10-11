<?php

/**
 * Template for the new article page.
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
	
	<title>Pages Manager | <?php echo($website_name); ?></title>

	<link href="../../../interface/themes/<?php echo($theme_applications); ?>/css/include.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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
			
			<form action="system/tools/new.php" method="post">
				<h5>New page</h5>
				<!-- Title -->
				<input type="text" name="title" placeholder="Title" autofocus required pattern=".{5,64}" title="5-64 characters">
				<!-- Author -->
				<select name="author" required>
					<option value="">Select an author</option>
					<optgroup label="Authors">
						<?php
						
						foreach($users as $user)
						{
							echo(
								"<option value=\"".$user->getIdentifier()."\">".$user->getDisplayname()."/".$user->getUsername()."</option>"
							);
						}
						
						?>
					</optgroup>
				</select>
				<!-- Content -->
				<textarea name="content" rows="30" cols="50" placeholder="Content" required></textarea>
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
