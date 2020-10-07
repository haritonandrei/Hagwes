<?php

/**
 * Template for the edit page.
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
	
	<title>Users manager | <?php echo($website_name); ?></title>

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
			
			<blockquote>
				Username: <b><?php echo( $user->getUsername() ); ?></b><br>
			</blockquote>
			
			<?php
			
			// FORM
			if(isset($_GET['id']))
			{
				echo( "<form action=\"system/tools/edit.php?id=".$_GET['id']."\" method=\"post\">" );
			}
			else if(isset($_GET['username']))
			{
				echo( "<form action=\"system/tools/edit.php?username=".$_GET['username']."\" method=\"post\">" );
			}
			
			?>
				<h5>Edit user</h5>
				
				<!-- Display Name -->
				<input type="text" value="<?php echo( $user->getDisplayname() ); ?>" name="displayname" placeholder="Display Name *" autofocus required pattern="[A-Za-z0-9]{5,16}" title="5-16 alphanumeric/numeric characters">
				<!-- Surname -->
				<input type="text" value="<?php echo( $user->getSurname() ); ?>" name="surname" placeholder="Surname" pattern="[A-Za-z]{4,16}" title="4-16 alphanumeric characters">
				<!-- Name -->
				<input type="text" value="<?php echo( $user->getName() ); ?>" name="name" placeholder="Name" pattern="[A-Za-z]{4,24}" title="4-24 alphanumeric characters">
				<!-- Birthdate -->
				<input type="date" value="<?php echo( $user->getBirthdate() ); ?>" name="birthdate" placeholder="Birthdate">
				<!-- Email -->
				<input type="email" value="<?php echo( $user->getEmail() ); ?>" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Insert a valid email">
				<!-- URL -->
				<input type="text" value="<?php echo( $user->getUrl() ); ?>" name="url" placeholder="URL" pattern="https?://.+" title="Include http://">
				<!-- Password -->
				<input type="password" name="password" placeholder="Current or new password *" required pattern=".{8,255}" title="8-255 characters">
				<input type="submit" value="Send">
			</form>
			
			<aside>
				<h5>Remove user</h5>
				
				<center>
				<p class="chip">
					<a href="remove.php?id=<?php echo( $user->getIdentifier() ); ?>&username=<?php echo( $user->getUsername() ); ?>">Confirm</a>
				</p>
				</center>
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
