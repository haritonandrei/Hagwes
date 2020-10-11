<?php

/**
 * Template for the web-area's page viewer.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	
	<title><?php echo( $page -> getTitle()." | ".$website_name ); ?></title>

	<link href="../interface/themes/<?php echo($theme_web); ?>/css/include.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../interface/themes/<?php echo($theme_web); ?>/css/theme.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../interface/themes/<?php echo($theme_web); ?>/css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
</head>
<body>	
	
	<nav>
		<section>
			<a id="logo-container" href="index.php"><?php echo($website_name); ?></a>
			<ul class="nav-menu">
				<?php
				
				if($pages_menu_enabled)
				{
					foreach($pages as $actual_page)
					{
						echo('<li><a href="page.php?id='.$actual_page->getIdentifier().'">'.$actual_page->getTitle().'</a></li>');
					}
				}
				
				echo('<li><a href="../administration/index.php">Login</a></li>');
				echo('<li><a href="search.php">Search</a></li>');
				
				?>
			</ul>
		</section>
	</nav>

	<section>

		<article>

			<div>
				<?php
				
				// PAGE HEADER
				require("../interface/template-parts/web/page-header.php");
				
				?>
			</div>
		
			<aside>
				<h5><?php echo( $page -> getTitle() ); ?></h5>
			</aside>

			<?php echo( $page -> getContent() ); ?>
			<hr>
			
			<div>
				<?php
				
				// PAGE FOOTER
				require("../interface/template-parts/web/page-footer.php");
				
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

	<script src="../interface/themes/<?php echo($theme_web); ?>/js/theme.js"></script>
	<script src="../interface/themes/<?php echo($theme_web); ?>/js/custom.js"></script>

</body>
</html>
