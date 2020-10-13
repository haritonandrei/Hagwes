<?php

/**
 * Template for the web-area's index.
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
	<meta name="description" content="<?php echo($website_description); ?>">
	
	<title>
	<?php
	
		if($index_page_enabled)
		{
			echo( $page -> getTitle()." | ".$website_name );
		}
		else
		{
			echo( "Homepage | ".$website_name );
		}
		
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
				require("../interface/template-parts/web/index-header.php");
				
				?>
			</div>
		
			<aside>
				<h5>
				<?php
					
					if($index_page_enabled == TRUE)
					{
						echo($page -> getTitle());
					}
					else
					{
						echo($website_description);
					}
				
				?>
				</h5>
			</aside>

			<?php
			
			if($index_page_enabled == TRUE)
			{
				echo($page -> getContent());
			}
			else
			{
				foreach($articles as $article)
				{
					echo(
						"<h3>".$article->getTitle()."</h3>
						&#10070; <a class=\"link\" href=\"category.php?name=".$article->getCategory()."\">".$article->getCategory()."</a>&nbsp;
						&#9998; ".$article->getAuthor()."&nbsp;
						&#9728; ".date("l jS F Y", strtotime($article -> getLastModify()))."<br>
						<blockquote>".$article->getDescription()."</blockquote>
						<p class=\"chip\"><a href=\"article.php?id=".$article->getIdentifier()."\">Read more &#10141;</a></p>
						<hr>"
					);
				}
				
				if(empty($articles))
				{
					echo("<center><h3>No more articles!</h3></center>");
				}
				
				if(!empty($articles))
				{
					echo('<center><p class="chip"><a href="index.php?list_start_from='.$next_page_starts_from.'">Next page &#10141;</a></p></center>');
				}
			}
			
			?>
			
			<div>
				<?php
				
				// INDEX FOOTER
				require("../interface/template-parts/web/index-footer.php");
				
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
