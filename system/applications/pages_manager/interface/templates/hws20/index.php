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
			
			<aside>
				<h5 class="row-element">Pages</h5>
				<p class="chip"><a href="new.php">New</a></p>
			</aside>
			
			<!-- PAGES TABLE / START -->
			<table>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th class="hidden-on-mobile">Last modify</th>
					<th>-</th>
					<th>-</th>
				</tr>
				<?php
				
				foreach($pages as $page)
				{
					echo(
						'<tr>
							<td>'.$page -> getIdentifier().'</td>
							<td><a href="../../../web/page.php?id='.$page -> getIdentifier().'">'.$page -> getTitle().'</a></td>
							<td class="hidden-on-mobile">'.$page -> getLastModify().'</td>
							<td><a href="edit.php?id='.$page -> getIdentifier().'" class="link">Edit</a></td>
							<td><a href="remove.php?id='.$page -> getIdentifier().'" class="link">Remove</a></td>
						</tr>'
					);
				}
				
				?>
			</table>
			<!-- PAGES TABLE / END -->
			
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