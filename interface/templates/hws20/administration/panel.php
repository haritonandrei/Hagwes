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
	
	<title>Administration Panel | <?php echo($website_name); ?></title>

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
				<li><a href="logout.php" class="menu-icon"><img src="../interface/templates/<?php echo($template_administration); ?>/images/icons/logout.png" title="Logout" /></a></li>
			</ul>
		</section>
	</nav>

	<section>
		<article>
		  
			<div>
				<?php
				
				// PANEL HEADER
				require("../interface/template-parts/administration/panel-header.php");
				
				?>
			</div>
		  
			<!-- APPLICATIONS LIST -->
			<aside>
				<h5>
				<?php
				
				echo(
				
					"Logged in as <strong>".
					$_COOKIE[ $website_name.'-user-displayname' ]
					."</strong>"
					
				);
				
				?>
				</h5>
			</aside>
			
			<table>
				<tr>
					<th>Application</th>
					<th>Type</th>
					<th class="hidden-on-mobile">Version</th>
					<th>-</th>
				</tr>
				<?php

				foreach($applications as $application)
				{
					// APPLICATION INFORMATIONS
					require("../system/applications/".$application."/about.php");
					
					if(is_visible($app_visibility, $website_name))
					{
						echo('
						<tr>
							<td>'.$app_name.'</td>
							<td>'.$app_type.'</td>
							<td class="hidden-on-mobile">'.$app_version.'</td>
							<td><a class="link" href="../system/applications/'.$application.'/">Open</a></td>
						</tr>
						');
					}
				}

				?>
			</table>
			
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
				
				// PANEL FOOTER
				require("../interface/template-parts/administration/panel-footer.php");
				
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
