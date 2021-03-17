<?php
	session_start();
	require __dir__ . '/classes/controller.php';
	require __dir__ . '/classes/logincontroller.php';

	$login = new login();

	if($login->loginCheck()){
		header("Location: http://localhost/receta");
		exit();
	}
?>
<?php
	require(__dir__ . '/views/global/header.php');
?>
<style type="text/css">
	header{
		background-color:#000;
	}
	body{
		padding-top:40px;
	}
</style>
<div class="white-box">
	<div class="mid-grid">
		<h2 class="home-title">Regjistrohu</h2>
		<div class="w-60">
			<form action="" method="POST" class="receta-form">
				<?php
					if(isset($_POST['email'])){
						$login->register();
					}
				?>
				<input type="text" name="emri" placeholder="Emri">
				<input type="text" name="mbiemri" placeholder="Mbiemri">
				<textarea name="biografia" placeholder="Shkruaj nje biografi te vogel"></textarea>
				<input type="email" name="email" placeholder="Email">
				<input type="password" name="password" placeholder="Password">
				<input type="submit" name="save" value="Kyçu">
			</form>
		</div>
		</div>
	</div>
</div>
<?php
	require(__dir__ . '/views/global/footer.php');
?>