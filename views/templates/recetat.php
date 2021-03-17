<?php
	global $controller;
	$last_recetat = $controller->getRecetat(8,'data_postimit DESC');

	$mostviewed_recetat = $controller->getRecetat(4,'klikuar DESC');

	$kategorite = $controller->getKategorite();

	if(isset($_GET['search'])){
		$last_recetat = $controller->receat_search($_GET['search']);
	}
?>
<div class="top-home category" style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(<?php echo WEB_PATH;?>public/images/hp2.jpg);">
	<div class="mid-grid">
		<div class="description">
			<h1>Recetat</h1>
			<p>Recetat tona jane nje perzierje e kuzhines tradicionale shqiptare <br>
			dhe pjatave evropiane</p>
		</div>
	</div>
</div>
<div class="white-box category">
	<div class="mid-grid">
		<h2 class="home-title">Recetat e fundit</h2>
		<form method="get" class="search-form">
			<input type="hidden" name="template" value="recetat">
			<input type="text" name="search" placeholder="Kërko">
			<input type="submit" name="submit" value="Kërko" class="Kerko">
		</form>
		<div class="box-holder">
			<?php $i = 1; foreach($last_recetat as $receta): ?>
				<a href="<?php echo $receta['url']; ?>">
					<div class="box-4 categ-box">
						<figure class="place-box">
							<img src="<?php echo $receta['fotografia']; ?>">
							<span><?php echo $receta['kategoria_emri']; ?></span>
						</figure>
						<h2><?php echo $receta['titulli']; ?></h2>
					</div>
				</a>
				<?php if($i == 4){ echo '</div><div class="box-holder">'; }?>
			<?php $i++; endforeach; ?>
		</div>
	</div>
</div>
<div class="most-view">
	<h2 class="home-title" style="margin-top:20px;">Te pelqyera</h2>
	<div class="mid-grid">
		<div class="most-view-row">
			<?php $i = 1; foreach($mostviewed_recetat as $receta): ?>
				<?php if($i < 3): ?>
					<div class="info-box">
						<h4><?php echo $receta['titulli']; ?></h4>
						<p><?php echo $receta['short_text']; ?></p>
						<a href="<?php echo $receta['url']; ?>" class="more">Shiko Receten</a>
					</div>
					<div class="img-box">
						<figure><img src="<?php echo $receta['fotografia']; ?>" alt="<?php echo $receta['titulli']; ?>"></figure>
					</div>
				<?php elseif($i >= 3): ?>
					<?php if($i == 3){ echo '</div><div class="most-view-row">'; }?>
					<div class="img-box">
						<figure><img src="<?php echo $receta['fotografia']; ?>" alt="<?php echo $receta['titulli']; ?>"></figure>
					</div>
					<div class="info-box">
						<h4><?php echo $receta['titulli']; ?></h4>
						<p><?php echo $receta['short_text']; ?></p>
							<a href="<?php echo $receta['url']; ?>" class="more">Shiko Receten</a>
					</div>
				<?php endif;?>
			<?php $i++; endforeach; ?>
		</div>
	</div>
</div>
<?php foreach($kategorite as $kategoria): ?>
	<div class="sub-categories">
		<div class="mid-grid">
			<div class="box-holder">
				<div class="box-4">
					<h3><?php echo $kategoria['emri']; ?></h3>
					<p><?php echo $kategoria['pershkrimi']; ?></p>
				</div>
				<?php $recetat =  $controller->getRecetat(10,'data_postimit DESC', $kategoria['id']);?>
				<div class="box-9">
					<div class="box-holder">
						<?php $i = 1; foreach($recetat as $receta): ?>
							<?php if($i < 3):?>
								<a href="<?php echo $receta['url']; ?>">
									<div class="box-6 categ-box">
										<figure class="place-box">
											<img src="<?php echo $receta['fotografia']; ?>">
											<span><?php echo $receta['kategoria_emri']; ?></span>
										</figure>
										<h2><?php echo $receta['titulli']; ?></h2>
									</div>
								</a>
							<?php else:?>
								<?php if($i == 3){ echo '</div><div class="box-holder">'; }?>
								<a href="<?php echo $receta['url']; ?>">
									<div class="box-4 categ-box">
										<figure class="place-box">
											<img src="<?php echo $receta['fotografia']; ?>">
											<span><?php echo $receta['kategoria_emri']; ?></span>
										</figure>
										<h2><?php echo $receta['titulli']; ?></h2>
									</div>
								</a>
								<?php if($i == 6){ echo '</div><div class="box-holder">'; }?>
							<?php endif; ?>

						<?php $i++; endforeach; ?>
					</div>
				</div>
			</div>
			<!-- <a href="#" class="more">Me shume nga <?php echo $kategoria['emri']; ?></a> -->
		</div>
	</div>
<?php endforeach;?>
<div class="white-box">
	<div class="mid-grid">
		<h2 class="home-title">Posto receten tuaj</h2>
		<div class="w-60">
			<form method="POST" action="<?php echo WEB_PATH;?>shto-recete.php" class="receta-form" enctype="multipart/form-data">
				<?php
					if(isset($_POST['save'])){
						$login->shtoRecete();
					}
					$kategorite = $controller->getKategorite();
					$shtetet = $controller->getShtetet();
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