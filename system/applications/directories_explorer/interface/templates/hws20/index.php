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
	
	<title>Uploads Explorer | <?php echo($website_name); ?></title>

	<link href="../../../interface/themes/<?php echo($theme_applications); ?>/css/include.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../../../interface/themes/<?php echo($theme_applications); ?>/css/theme.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../../../interface/themes/<?php echo($theme_applications); ?>/css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	
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

			<!-- DIRECTORY URL FORM -->
			<form method="get" action="index.php">
				<h5>Open another directory</h5>
				<input type="text" name="dir" placeholder="Directory URL" value="<?php echo($root); ?>" autofocus required>
				<input type="submit" value="Open">
			</form>
	
			<!-- FILES AND FOLDERS -->
			<aside>
				<h5><?php echo($root); ?></h5>
				<?php
				
				if(count($content)>0)
				{
					foreach($content as $element)
					{
						if($element['url'] != '')
						{
							echo(
								'<p class="card-item"><a href="'.$element['url'].'">'.$element['name'].'</a></p>'
							);
						}
						else
						{
							echo(
								'<p class="card-item"><u>'.$element['name'].'</u></p>'
							);

						}
					}
					
				}
				else
				{
					echo('<p class="card-item"><u>Empty folder</u></p>');
				}
				
				?>
			</aside>

			<!-- MAKE FOLDER -->
			<?php
			
			if(is_needed_new_folder_form($root))
			{
				echo(
					'<form action="system/tools/folder_maker.php?path='.$root.'" method="post">
						<h5>Make new folder</h5>
						<input type="text" name="folder_name" id="folder_name" placeholder="Folder name">
						<input type="submit" value="Send">
					</form>'
				);
			}
			else
			{
				echo('<aside><h5>Make new folder</h5><p class="card-item"><u>Not available here</u></p></aside>');
			}
			
			?>

			<!-- DELETE DIR -->
			<aside>
				<h5>Delete this directory</h5>
				<?php
				
				if(is_needed_delete_dir_link($root))
				{
					echo(
						'<p class="card-item"><a href="system/tools/deleter.php?path='.$root.'">Delete this folder</a></p>'
					);
				}
				else
				{
					echo('<p class="card-item"><u>Not available here</u></p>');
				}
				
				?>
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