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
	
	<title>File hashing | <?php echo($website_name); ?></title>

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

			<form action="index.php" method="post" enctype="multipart/form-data">
				<h5>String hashing</h5>
				<input type="text" name="string" placeholder="Write your string here">
				<input type="reset" value="Reset">
				<input type="submit" value="Get hash">
			</form>
			
			<aside>
			
				<?php
				
				if(isset($_POST['string']))
				{
					foreach(hash_algos() as $hash_type)
					{
						$hashed_string = hash($hash_type, $_POST['string']);
						
						print(
							"<h5>".$hash_type."</h5>
							<input type=\"text\" value=\"".$hashed_string."\">"
						);
					}
				}
				else
				{
					print("<h5>Write the string of which you want to get the one way hashings!</h5>");
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