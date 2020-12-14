<?php

/**
 * Template for the web-area's category page.
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
	
	<title>
	<?php
	
		echo( "Category \"".$_GET['name']."\""." | ".$website_name );
		
	?>
	</title>

	<link href="../interface/themes/<?php echo($theme_web); ?>/css/include.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../interface/themes/<?php echo($theme_web); ?>/css/theme.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../interface/themes/<?php echo($theme_web); ?>/css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>

	<!-- ICONS -->
	<link rel="icon" href="../interface/templates/<?php echo($template_web); ?>/images/logo/logo-32x32.png" sizes="32x32" />
	<link rel="icon" href="../interface/templates/<?php echo($template_web); ?>/images/logo/logo-192x192.png" sizes="192x192" />
  
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
						echo('<li><a class="menu-text" href="page.php?id='.$actual_page->getIdentifier().'">'.$actual_page->getTitle().'</a></li>');
					}
				}
				
				echo('<li><a class="menu-icon" href="../administration/index.php"><img src="../interface/templates/'.$template_web.'/images/icons/login.png" title="Login" /></a></li>');
				echo('<li><a class="menu-icon" href="search.php"><img src="../interface/templates/'.$template_web.'/images/icons/search.png" title="Search" /></a></li>');
				
				?>
			</ul>
		</section>
	</nav>

	<section>

		<article>

			<div>
				<?php
				
				// INDEX HEADER
				require("../interface/template-parts/web/category-header.php");
				
				?>
			</div>
		
			<aside>
				<h5>
				<?php
				
				echo("Category \"".$_GET['name']."\"");
				
				?>
				</h5>
			</aside>

			<div class="sides">
				<div class="side_left">
					<?php
					
					foreach($category_articles as $article)
					{
						echo(
							"<h3>".$article->getTitle()."</h3>
							<div class=\"info\">
								<span><img class=\"icon\" src=\"../interface/templates/$template_web/images/icons/category.png\" title=\"Category\" /> ".$article->getCategory()."&nbsp;</span>
								<span><img class=\"icon\" src=\"../interface/templates/$template_web/images/icons/edit.png\" title=\"Author\" /> ".$article->getAuthor()."&nbsp;</span>
								<span><img class=\"icon\" src=\"../interface/templates/$template_web/images/icons/sun.png\" title=\"Date\" /> ".date("l jS F Y", strtotime($article -> getDate()))."</span>
							</div>
							<p class=\"description\">".$article->getDescription()."</p>
							<p class=\"chip\"><a class=\"link-icon\" href=\"article.php?id=".$article->getIdentifier()."\">Read more <img class=\"link-icon__button\" src=\"../interface/templates/$template_web/images/icons/arrow2_right.png\" title=\"Read more\" /></a></p>
							<hr>"
						);
					}
					
					if(empty($category_articles))
					{
						echo("<center><h3>No more articles!</h3></center>");
					}
					
					if(!empty($category_articles))
					{
						echo('<center><p class="chip"><a class="link-icon" href="category.php?name='.$_GET['name'].'&list_start_from='.$next_page_starts_from.'">Next page <img class="link-icon__button" src="../interface/templates/'.$template_web.'/images/icons/arrow2_right.png" title="Next page" /></a></p></center>');
					}
					
					?>
				</div>

				<div class="side_right">
					<div class="side_right__content">
					<?php
					
					// SIDEBAR
					require("../interface/template-parts/web/sidebar.php");
					
					?>
					</div>
				</div>
			</div>
			
			<div>
				<?php
				
				// INDEX FOOTER
				require("../interface/template-parts/web/category-footer.php");
				
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
