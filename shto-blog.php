<?php
	session_start();
	require __dir__ . '/classes/controller.php';
	require __dir__ . '/classes/logincontroller.php';

	$login = new login();

	if(!$login->loginCheck()){
		header("Location: http://localhost/receta/login.php");
		exit();
	}

	if($_SESSION['level'] != 1){
		header("Location: http://localhost/receta/");
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
		<h2 class="home-title">Shto blog</h2>
		<div class="w-60">
			<form method="POST" class="receta-form" enctype="multipart/form-data">
				<?php
					if(isset($_POST['save'])){
						$login->shtoBlog();
					}
				?>
				<input type="text" name="titulli" placeholder="Titulli">
				<textarea name="pershkrimi" placeholder="Pershkrimi"></textarea>
				<input type="file" name="fotografia">
				<input type="submit" name="save" value="Ruaj">
			</form>
		</div>
	</div>
</div>
<?php
	require(__dir__ . '/views/global/footer.php');
?>