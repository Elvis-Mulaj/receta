<?php
	session_start();
	require __dir__ . '/classes/controller.php';
	require __dir__ . '/classes/logincontroller.php';

	$login = new login();

	if(!$login->loginCheck()){
		header("Location: http://localhost/receta/login.php");
		exit();
	}

	$kategorite = $login->getKategorite(); //nuk kemi nevoje me kriju new controller() mundemi me e perdor clasen login sepse e extend controller
	$shtetet = $login->getShtetet();
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
		<h2 class="home-title">Shto recete</h2>
		<div class="w-60">
			<form method="POST" class="receta-form" enctype="multipart/form-data">
				<?php
					if(isset($_POST['save'])){
						$login->shtoRecete();
					}
				?>
				<input type="text" name="titulli" placeholder="Titulli">
				<p>Kategoria</p>
				<select name="kategoria_id">
					<?php if(!empty($kategorite)): foreach($kategorite as $kategoria):?>
						<option value="<?php echo $kategoria['id'];?>"><?php echo $kategoria['emri'];?></option>
					<?php endforeach; endif; ?>
				</select>
				<p>Ju lutem zgjedhni vendin e origjinës së ushqimit</p>
				<select name="shteti_id">
					<?php if(!empty($shtetet)): foreach($shtetet as $shteti):?>
						<option value="<?php echo $shteti['id'];?>"><?php echo $shteti['emri'];?></option>
					<?php endforeach; endif; ?>
				</select>
				<textarea name="pershkrimi" placeholder="Pershkrimi"></textarea>
				<textarea name="perberesit" placeholder="Perberesit"></textarea>
				<textarea name="pergaditja" placeholder="Pergaditja"></textarea>
				<input type="file" name="fotografia">
				<input type="submit" name="save" value="Ruaj">
			</form>
		</div>
	</div>
</div>
<?php
	require(__dir__ . '/views/global/footer.php');
?>