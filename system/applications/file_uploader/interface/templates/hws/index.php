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
	
	<title>File uploader | <?php echo($website_name); ?></title>

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

			<form action="system/tools/uploader.php" method="post" enctype="multipart/form-data">
				<h5>Upload file</h5>
				<input type="file" name="file">
				<input type="text" name="directory" placeholder="uploads/ [ leave empty or add an existing subdirectory: example_dir/ ]">
				<input type="reset" value="Reset">
				<input type="submit" value="Upload">
			</form>

			<aside>
				<h5>Tips</h5>
				<ul>
					<li>If you want to upload huge files you may have some problems to upload them because of the configuration file "php.ini" or because of the web server that you are using.</li>
					<li>Maybe you have to set, into "php.ini" (to upload big files):<br>
						<ul>
						<li>post_max_size = 128M</li>
						<li>upload_max_filesize = 128M</li>
						<li>memory_limit = 256M</li>
						<li>max_execution_time = 300</li>
						</ul>
					</li>
					<li>The root directory of the uploaded files is "uploads/", you can only add one or more existing subdirectories (example: "2016/images/") into which to upload the file.</li>
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