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
		<h2 class="home-title">Kyçu</h2>
		<div class="w-60">
			<form action="" method="POST" class="receta-form">
				<?php
					if(isset($_GET['new_user'])){
						echo '<div class="message">Llogaria u krijua me sukses! Mund te vazhdoni te kyçeni!</div>';
					}
					if(isset($_POST['email'])){
						$login->login();
					}
				?>
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