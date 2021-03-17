<?php
	global $controller;
	$receta = $controller->getRecetaReadmore();
	$controller->increment_klikuar('recetat');
	$recetat_tjera = $controller->recetat_tjera($receta['kategoria_id']);
?>
<div class="top-home category" style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url('<?php echo WEB_PATH;?>public/images/hp2.jpg');">
	<div class="mid-grid">
		<div class="description">
			<!-- <h1>Pite me spanaq</h1> -->
		</div>
	</div>
</div>
<?php if(!empty($receta)):  ?>
	<div class="readmore">
		<div class="mid-grid">
			<div class="readmore-row">
				<div class="readmore-left">
					<h1><?php echo $receta['titulli']; ?></h1>
					<ul class="readmore-list">
						<li><a href="#" class="active" data-id="pershkrimi">Përshkrimi</a></li>
						<?php if(!empty($receta['perberesit'])):?><li><a href="#" data-id="perberesit">Perberesit</a></li><?php endif; ?>
						<?php if(!empty($receta['pergaditja'])):?><li><a href="#" data-id="pergaditja">Pergaditja</a></li><?php endif; ?>
					</ul>

					<div class="tab-content active" id="pershkrimi">
						<?php echo $receta['pershkrimi']; ?>
					</div>
					<?php if(!empty($receta['perberesit'])):?>
						<div class="tab-content" id="perberesit">
							<?php echo $receta['perberesit']; ?>
						</div>
					<?php endif; ?>
					<?php if(!empty($receta['pergaditja'])):?>
						<div class="tab-content" id="pergaditja">
							<?php echo $receta['pergaditja']; ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="readmore-right">
					<img src="<?php echo $receta['fotografia']; ?>">
					<ul>
						<li><p><i class="fas fa-user"></i> Nga Receta <?php echo $receta['user_emri']; ?></p></li>
						<li><p><i class="far fa-clock"></i> <?php echo $receta['data_postimit']; ?></p></li>
						<li><p>
							Kategoria: <?php echo $receta['kategoria_emri']; ?>
						</p></li>
						<li>
							<p>Shperndaje <a href="#"><i class="fab fa-twitter-square"></i></a> <a href="#"><i class="fab fa-facebook-square"></i></a></p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<div class="white-box category">
	<div class="mid-grid">
		<h2 class="home-title">Te ngjashme</h2>
		<div class="box-holder">
			<?php $i = 1; foreach($recetat_tjera as $receta): ?>
				<a href="<?php echo $receta['url']; ?>">
					<div class="box-4 categ-box">
						<figure class="place-box">
							<img src="<?php echo $receta['fotografia']; ?>">
							<span><?php echo $receta['kategoria_emri']; ?></span>
						</figure>
						<h2><?php echo $receta['titulli']; ?></h2>
					</div>
				</a>
				<?php if($i == 4){echo '</div><div class="box-holder">';}?>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.readmore-list a').click(function(){
			var id = $(this).attr('data-id');
			$('.tab-content').hide();
			$('#' + id).show();

			$('.readmore-list a').removeClass('active');
			$(this).addClass('active');
		});
	});
</script>