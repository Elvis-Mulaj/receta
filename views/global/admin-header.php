<!DOCTYPE html>
<html>
<head>
	<title>Receta</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha256-etrwgFLGpqD4oNAFW08ZH9Bzif5ByXK2lXNHKy7LQGo=" crossorigin="anonymous" />
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH . 'public/css/style.css?v=1.1';?>"/>
	<script src="https://kit.fontawesome.com/254db4c323.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
</head>
<body>
<header id="header">
	<div class="mid-grid">
		<a href="<?php echo WEB_PATH;?>" class="logo"><h3>RECETA IME</h3></a>
		<nav>
			<ul>
				<li><a href="<?php echo WEB_PATH;?>admin.php">Recetat</a></li>
				<li><a href="<?php echo WEB_PATH;?>admin.php?template=kategorite">Kategorite</a></li>
				<li><a href="<?php echo WEB_PATH;?>admin.php?template=shtetet">Shtetet</a></li>
				<li><a href="<?php echo WEB_PATH;?>shto-blog.php">BLOG</a></li>
				<li><a href="<?php echo WEB_PATH;?>admin.php?template=mesazhet">Mesazhet</a></li>
				<?php if(!empty($_SESSION['user_id'])):?>
					<li><a href="<?php echo WEB_PATH;?>logout.php">Dil <?php echo $_SESSION['fullname']; ?></a></li>
				<?php endif; ?>
			</ul>
		</nav>
	</div>
</header>
<style type="text/css">
	body{
		padding-top: 82px;
	}
	#header{
		background-color: #000;
	}
</style>