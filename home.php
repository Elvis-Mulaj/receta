<?php
	global $controller;
?>
<div class="top-home" id="slide" style="background:url(<?php echo WEB_PATH;?>public/images/bg.jpg);position: relative;">
	<div style="width: 100%;height: 100%;position: absolute;top:0px; left:0px;background:rgba(0, 0, 0, 0.5);"></div>
	<div class="mid-grid">
		<div class="description">
			<h1>Brezi i ushqimeve<br>tradicionale</h1>
			<a href="#home-recetat">Recetat për sot</a>
		</div>
	</div>
</div>
<div class="white-box">
	<div class="mid-grid">
		<h2 class="home-title">Tradita shqiptare ne pjaten tuaj</h2>
		<p class="w-70">Kuzhina shqiptare është një përzierje e influencave të kuzhinës turke, asaj ballkanike dhe evropiane. Ajo është e njohur për vlerat e larta ushqimore dhe shijen e saj mjaft të mirë. Në recetat tona do te gjeni laramani te bollshme te specialiteteve nga krahinat e ndryshme. </p>
		<div class="box-holder">
			<div class="box-4">
				<a href="#" class="categories-box">
					<i class="fas fa-utensils"></i>
					<h4>Ndarja e ushqimeve</h4>
					<p>
						<ul>
							<a href="#"><li>Mengjes</li></a>
							<a href="#"><li>Drekë</li></a>
							<a href="#"><li>Darkë</li></a>
						</ul>
					</p>
				</a>
			</div>
			<div class="box-4">
				<a href="#" class="categories-box">
					<i class="fas fa-carrot"></i>
					<h4>Shëndetshëm</h4>
					<p>
						<ul>
							<a href="#"><li>Diabetic</li></a>
							<a href="#"><li>Glutten-Free</li></a>
							<a href="#"><li>Low Fat</li></a>
							<a href="#"><li>Shake me proteina</li></a>
						</ul>
					</p>
				</a>
			</div>
			<div class="box-4">
				<a href="#" class="categories-box">
					<i class="fas fa-bread-slice"></i>
					<h4>Pjata te ndryshme</h4>
					<p>
						<ul>
						    <a href="#"><li>Bukë shtëpie/Brumëra</li></a>
							<a href="#"><li>Embëlsira</li></a>
							<a href="#"><li>Ushqime Vegjetariane</li></a>
							<a href="#"><li>Smoothie</li></a>
							<a href="#"><li>Coctail</li></a>
							<a href="#"><li>Snacks</li></a>
							<a href="#"><li>Supa shtëpie</li></a>
							<a href="#"><li>Turshitë</li></a>
						</ul>
					</p>
				</a>
			</div>
			<div class="box-4">
				<a href="#" class="categories-box">
					<i class="fas fa-birthday-cake"></i>
					<h4>Festa te ndryshme</h4>
					<p>
						<ul>
							<a href="#"><li>Ditelindje</li></a>
							<a href="#"><li>Ushqime për festat e FundVitit</li></a>
							<a href="#"><li>Embëlsira për Bajram</li></a>
							<a href="#"><li>Pashkët</li></a>

						</ul>
					</p>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="home-recetat" id="home-recetat">
	<?php
		$recetat = $controller->getBallineRecetat();
	?>
	<?php if(!empty($recetat)): foreach($recetat as $receta): ?>
		<a href="<?php echo $receta['url'] ;?>">
			<div class="home-recetat-box" style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url('<?php echo $receta['fotografia'];?>');">
				<span><?php echo $receta['titulli'];?></span>
			</div>
		</a>
	<?php endforeach; endif; ?>
</div>
<div class="white-box">
	<div class="mid-grid">
		<h2 class="home-title">Kultura ushqimore</h2>
		<div class="box-holder">
			<?php
				$shtetet = $controller->getShtetet();
				foreach($shtetet as $shteti):
			?>
				<div class="box-4">
					<figure class="place-box">
						<img src="<?php echo WEB_PATH . 'uploads/' . $shteti['fotografia'] ;?>">
						<figcaption><?php echo $shteti['emri'] ;?></figcaption>
					</figure>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<div class="reviews">
	<div class="mid-grid">
		<h2 class="home-title">Reviews</h2>
		<div class="box-holder">
			<div class="box-4">
				<div class="reviews-box">
					<p><i class="fas fa-quote-left"></i> Receta ime është faqja që më ka ndihmuar shumë gjatë përgaditjes së ushqimeve, bakllava e bërë nga receta ne faqen tuaj ka marrë lavdata të shumta</p>
					<div class="author-box">
						<figure>
							<img src="<?php echo WEB_PATH;?>public/images/testi2.jpg">
							<figcaption>Filan Fisteku</figcaption>
						</figure>
					</div>
				</div>
			</div>
			<div class="box-4">
				<div class="reviews-box">
					<p><i class="fas fa-quote-left"></i>Receta Buka e shtëpis më kujtoi femijerine,me doli buka ashtu sic e bënte gjyshja.</p>
					<div class="author-box">
						<figure>
							<img src="<?php echo WEB_PATH;?>public/images/testi1.jpg">
							<figcaption>Filan Fisteku</figcaption>
						</figure>
					</div>
				</div>
			</div>
			<div class="box-4">
				<div class="reviews-box">
					<p><i class="fas fa-quote-left"></i>Provoni receten e Specave te Mbushur, do te ndaheni shume të kënaqur sikurse unë</p>
					<div class="author-box">
						<figure>
							<img src="<?php echo WEB_PATH;?>public/images/testi2.jpg">
							<figcaption>Filan Fisteku</figcaption>
						</figure>
					</div>
				</div>
			</div>
			<div class="box-4">
				<div class="reviews-box">
					<p><i class="fas fa-quote-left"></i>Embelsirat e juaja per Bajram po që ja vlejnë!</p>
					<div class="author-box">
						<figure>
							<img src="<?php echo WEB_PATH;?>public/images/testi3.jpg">
							<figcaption>Filan Fisteku</figcaption>
						</figure>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
<script type="text/javascript">
		$(document).ready(function(){
		var images = [], x = -1;
      	images[0] = "<?php echo WEB_PATH;?>public/images/Shqiperi.jpg";
      	images[1] = "<?php echo WEB_PATH;?>public/images/HomePagePhoto.jpg";
      	setInterval(displayNextImage, 5000);
		function displayNextImage() {
      		x = (x === images.length - 1) ? 0 : x + 1;
  			document.getElementById("slide").src = images[x];
  			$("#slide").css("background", "url("+ images[x] +")");
			}
		});
</script>