<?php
	global $controller;
	$blog = $controller->getBlogReadmore();
	$controller->increment_klikuar('blog');
?>
<div class="top-home category" style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url('<?php echo WEB_PATH;?>public/images/hp2.jpg');">
	<div class="mid-grid">
		<div class="description">
			<!-- <h1>Pite me spanaq</h1> -->
		</div>
	</div>
</div>
<div class="readmore">
	<div class="mid-grid">
		<?php if(!empty($blog)): ?>
			<div class="readmore-row">
				<div class="readmore-left">
					<h1><?php echo $blog['titulli']; ?></h1>
					<div class="tab-content active" id="pershkrimi">
						<p><?php echo $blog['pershkrimi']; ?></p>
					</div>
				</div>
				<div class="readmore-right">
					<img src="<?php echo $blog['fotografia']; ?>">
					<ul>
						<li><p><i class="fas fa-user"></i> Nga Receta <?php echo $blog['user_emri']; ?></p></li>
						<li><p><i class="far fa-clock"></i> <?php echo $blog['data_postimit']; ?></p></li>
						<li>
							<p>Shperndaje <a href="#"><i class="fab fa-twitter-square"></i></a> <a href="#"><i class="fab fa-facebook-square"></i></a></p>
						</li>
					</ul>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>