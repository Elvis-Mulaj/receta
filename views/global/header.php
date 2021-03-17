<!DOCTYPE html>
<html>
<head>
	<title>Receta</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH . 'public/css/style.css?v=1.1';?>"/>
	<script src="https://kit.fontawesome.com/254db4c323.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
</head>
<body>
<header id="header">
	<div class="mid-grid">
		<a href="<?php echo WEB_PATH;?>" class="logo"><h3>RECETA IME<span>.</span></h3></a>
		<a role="button" class="bars">
			<span class="bar1"></span>
			<span class="bar2"></span>
			<span class="bar3"></span>
		</a>
		<nav>
			<ul>
				<li><a href="<?php echo WEB_PATH;?>">Ballina</a></li>
				<li><a href="<?php echo WEB_PATH;?>?template=recetat">Recetat</a></li>
				<li><a href="<?php echo WEB_PATH;?>?template=blog">Blog</a></li>
				<li><a href="<?php echo WEB_PATH;?>?template=rreth-nesh">Rreth Nesh</a></li>
				<li><a href="<?php echo WEB_PATH;?>?template=kontakti">Kontakti</a></li>
				<?php if(!empty($_SESSION['user_id'])):?>
					<li><a href="<?php echo WEB_PATH;?>shto-recete.php">Shto recete</a></li>
					<li><a href="<?php echo WEB_PATH;?>logout.php">Dil <?php echo $_SESSION['fullname']; ?></a></li>
				<?php else: ?>
					<li><a href="<?php echo WEB_PATH;?>login.php">Kyçu</a></li>
					<li><a href="<?php echo WEB_PATH;?>register.php">Regjistrohu</a></li>
				<?php endif; ?>
			</ul>
		</nav>
	</div>
</header>