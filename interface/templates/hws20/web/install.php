<?php

/**
 * Template for the web-area's installation notify.
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
	
	<title>Installation needed | <?php echo($website_name); ?></title>

	<link href="../interface/themes/<?php echo($theme_web); ?>/css/include.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../interface/themes/<?php echo($theme_web); ?>/css/theme.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../interface/themes/<?php echo($theme_web); ?>/css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
</head>
<body>	
	
	<nav>
		<section>
			<a id="logo-container" href="index.php"><?php echo($website_name); ?></a>
			<ul class="nav-menu">
				<li><a href="../administration/index.php">Login</a></li>
			</ul>
		</section>
	</nav>

	<section>

		<article>

			<!-- INSTALLATION INSTRUCTIONS -->
			<aside>
				<h5>Installation needed</h5>
			</aside>

			This is a simple CMS, that allows you to make any kind of website, easily and very personalizable.
			In order to get the 100% from this CMS, you have to know a bit of HTML, CSS, and PHP.
			<br><br>

			<h5>Tips</h5>
			<hr>
			<ol>
				<li>Before going into "Login" <b>you have to write</b> (from a text-editor) <b>your server's data into "system/ core/ configuration.php"</b>. Because when you click on "Login" the CMS will auto-install the database and the database's tables.</li>
				<li>The <b>default authentication</b> is "<b>administrator</b>" and "<b>password</b>". You must change them as soon as possible.</li>
				<li>When you insert <b>links, into articles or pages, of files into uploads</b>, I suggest you to <b>insert relative links ( for example "../uploads/folder/file.jpg" )</b>. Because if you move the entire website to another domain, with relative links into articles or pages, you don't have to change all the links.</li>
				<li>When you are <b>deleting</b> a file or a folder <b>from the uploads</b>, the CMS won't ask you any confirm.</li>
				<li><b>Writing the content of a page/article</b>, to insert the <b>link to another page/article</b>, it's enought to write "page.php?id=N" OR "article.php?id=N", where N is an integer representing the ID of the page/article (example: <b>"page.php?id=1"</b> OR <b>"article.php?id=1"</b> if ID=1).</li>
			</ol>

			<!-- CMS INFORMATIONS -->
			<aside>
				<h5><?php echo($name); ?></h5>
				<ul>
					<li>Version: <?php echo($version); ?>.</li>
					<li>Author: <?php echo($author); ?>.</li>
					<li>License: <?php echo($license); ?>.</li>
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

	<script src="../interface/themes/<?php echo($theme_web); ?>/js/theme.js"></script>
	<script src="../interface/themes/<?php echo($theme_web); ?>/js/custom.js"></script>

</body>
</html>