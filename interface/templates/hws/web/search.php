<?php

/**
 * Template for the web-area's search page.
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
	
	if(isset($_GET['query']))
	{
		echo( "Search \"".$_GET['query']."\""." | ".$website_name );
	}
	else
	{
		echo( "Search | ".$website_name );
	}
		
	?>
	</title>

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
				
				// INDEX HEADER
				require("../interface/template-parts/web/search-header.php");
				
				?>
			</div>
		
			<aside>
				<h5>
				<?php
				
				if(isset($_GET['query']))
				{
					echo( "Search \"".$_GET['query']."\"" );
				}
				else
				{
					echo( "Search" );
				}
				
				?>
				</h5>
			</aside>

			<?php
			
			if(isset($_GET['query']))
			{
				foreach($search_articles as $article)
				{
					echo(
						"<h3>".$article->getTitle()."</h3>
						&#10070; ".$article->getCategory()."&nbsp;
						&#9998; ".$article->getAuthor()."&nbsp;
						&#9728; ".date("l jS F Y", strtotime($article -> getLastModify()))."<br>
						<blockquote>".$article->getDescription()."</blockquote>
						<p class=\"chip\"><a href=\"article.php?id=".$article->getIdentifier()."\">Read more &#10141;</a></p>
						<hr>"
					);
				}
				
				if(empty($search_articles))
				{
					echo("<center><h3>Nothing found!</h3></center>");
				}
				
				if(!empty($search_articles))
				{
					echo('<center><p class="chip"><a href="search.php?list_start_from='.$next_page_starts_from.'&query='.$_GET['query'].'">Next page &#10141;</a></p></center>');
				}
			}
			else
			{
				echo(
					'<form action="search.php" method="get">
						<input type="text" name="query" placeholder="Find articles ..." required>
						<input type="submit" value="Go">
					</form>'
				);
			}
			
			?>
			
			<div>
				<?php
				
				// INDEX FOOTER
				require("../interface/template-parts/web/search-footer.php");
				
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
