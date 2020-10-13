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
	
	<title>Applications Manager | <?php echo($website_name); ?></title>

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

			<!-- CONFIGURATION FORM -->
			<aside>
				<h5 class="row-element">Applications</h5>
				<p class="chip">
					<a href="install.php">Install</a>
				</p>
			</aside>
			
			<table>
				<tr>
					<th>Name</th>
					<th class="hidden-on-mobile">Version</th>
					<th>Type</th>
					<th class="hidden-on-mobile">License</th>
					<th>Size</th>
					<th class="hidden-on-mobile">Templates</th>
					<th>-</th>
				</tr>
				<?php

				foreach($applications as $application)
				{
					// APPLICATION INFORMATIONS
					require("../".$application."/about.php");
					
					$application_size		= get_directory_size("../".$application);
					$application_templates	= implode(", ", $app_templates);
					
					echo(
						'<tr>
							<td>'.$app_name.'</td>
							<td class="hidden-on-mobile">'.$app_version.'</td>
							<td>'.$app_type.'</td>
							<td class="hidden-on-mobile">'.$app_license.'</td>
							<td>'.$application_size.' bytes</td>
							<td class="hidden-on-mobile">'.$application_templates.'</td>
							<td><a href="disinstall.php?name='.$application.'" class="link">Disinstall</a></td>
						</tr>'
					);
				}

				?>
			</table>

			<aside>
				<h5>Informations</h5>
				<ul>
					<li>Pay attention on which applications you disinstall.</li>
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

	<script src="../../../interface/themes/<?php echo($theme_applications); ?>/js/theme.js"></script>
	<script src="../../../interface/themes/<?php echo($theme_applications); ?>/js/custom.js"></script>

</body>
</html>
