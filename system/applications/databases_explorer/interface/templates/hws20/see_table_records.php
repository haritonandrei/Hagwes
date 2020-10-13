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
	
	<title>Databases Explorer | <?php echo($website_name); ?></title>

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
				<h5>Records in "<?php echo($_GET['database']); ?> &raquo; <?php echo($_GET['table']); ?>"</h5>
				<p class="chip"><a href="see_database_tables.php?database=<?php echo($_GET['database']); ?>">Return to database</a></p>
				<p class="chip"><a href="see_table_structure.php?database=<?php echo($_GET['database']); ?>&&table=<?php echo($_GET['table']); ?>">See structure</a></p>
			</aside>
		
			<table>
				
				<?php
				
				$are_keys_printed		= false;
				
				foreach($records as $record)
				{
					// PRINTING KEY NAMES
					
					if($are_keys_printed == false)
					{
						echo("<tr>");
						
						foreach($record as $key => $value)
						{
							echo(
								"<th>".$key."</th>"
							);
						}
						
						echo("</tr>");
						
						$are_keys_printed = true;
					}
					
					// PRINTING RECORDS
					
					echo("<tr>");
					
					foreach($record as $key => $value)
					{
						echo(
							"<td style=\"max-width:100px;\">".$value."</td>"
						);
					}
					
					echo("</tr>");
					
				}
				
				?>
				
			</table>

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