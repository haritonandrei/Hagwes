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
	
	<title>File Editor | <?php echo($website_name); ?></title>

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

			<!-- FILE URL FORM -->
			<form method="get" action="index.php">
				<h5>Open another file</h5>
				<select name="file" autofocus required>
					<option value="<?php echo($actual_file_url); ?>" selected>Select a file</option>
					<!-- "ALLOWED" FILES -->
					<optgroup label="System">
						<option value="../../../system/core/configuration.php">Configuration file</option>
					</optgroup>
					<optgroup label="Administration">
						<option value="../../../interface/template-parts/administration/login-header.php">Login header</option>
						<option value="../../../interface/template-parts/administration/login-footer.php">Login footer</option>
						<option value="../../../interface/template-parts/administration/panel-header.php">Panel header</option>
						<option value="../../../interface/template-parts/administration/panel-footer.php">Panel footer</option>
					</optgroup>
					<optgroup label="Web">
						<option value="../../../interface/template-parts/web/index-header.php">Index header</option>
						<option value="../../../interface/template-parts/web/index-footer.php">Index footer</option>
						<option value="../../../interface/template-parts/web/page-header.php">Page header</option>
						<option value="../../../interface/template-parts/web/page-footer.php">Page footer</option>
						<option value="../../../interface/template-parts/web/article-header.php">Article header</option>
						<option value="../../../interface/template-parts/web/article-footer.php">Article footer</option>
						<option value="../../../interface/template-parts/web/category-header.php">Category header</option>
						<option value="../../../interface/template-parts/web/category-footer.php">Category footer</option>
						<option value="../../../interface/template-parts/web/search-header.php">Search header</option>
						<option value="../../../interface/template-parts/web/search-footer.php">Search footer</option>
						<option value="../../../interface/template-parts/web/sidebar.php">Sidebar</option>
					</optgroup>
				</select>
				<input type="submit" value="Open">
			</form>
		
			<!-- CONFIGURATION FORM -->
			<form method="post" action="system/tools/save.php">
				<h5>File editor</h5>
				<small><?php echo($actual_file_url); ?></small>
				<hr>
				<input type="hidden" name="file-url" value="<?php echo($actual_file_url); ?>">
				<textarea name="file-content" rows="30" cols="50"><?php echo($file_content); ?></textarea>
				<input type="submit" value="Save">
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
