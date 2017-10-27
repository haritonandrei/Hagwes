<?php

/**
 * Template for the index page.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	
	<title>Templates manager | <?php echo($website_name); ?></title>

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

			<!-- CONFIGURATION FORM -->
			<aside>
				<h5 class="row-element">Templates</h5>
				<p class="chip">
					<a href="install.php">Install</a>
				</p>
			</aside>
			
			<table>
				<tr>
					<th>Name</th>
					<th class="hidden-on-mobile">ID</th>
					<th>Version</th>
					<th class="hidden-on-mobile">License</th>
					<th>Size</th>
					<th class="hidden-on-mobile">Author</th>
					<th>-</th>
				</tr>
				<?php

				foreach($templates as $template)
				{
					require("../../../interface/templates/".$template."/about.php");
					
					$template_size = get_directory_size("../../../interface/templates/".$template);
					
					echo(
						'<tr>
						<td>'.$template_name.'</td>
						<td class="hidden-on-mobile">'.$template.'</td>
						<td>'.$template_version.'</td>
						<td class="hidden-on-mobile">'.$template_license.'</td>
						<td>'.$template_size.' bytes</td>
						<td class="hidden-on-mobile">'.$template_author.'</td>
						<td><a href="disinstall.php?name='.$template.'">Disinstall</a></td>
						</tr>'
					);
				}

				?>
			</table>

			<aside>
				<h5>Informations</h5>
				<ul>
					<li>Pay attention on which templates you disinstall.</li>
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
