<?php
	global $controller;
	$last_blog = $controller->getBlog(6,'data_postimit DESC');
	$mostviewed_blog = $controller->getBlog(4,'klikuar DESC');

	if(isset($_GET['search'])){
		$last_blog = $controller->blog_search($_GET['search']);
	}
?>
<div class="top-home category" style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(<?php echo WEB_PATH;?>public/images/hp2.jpg);">
	<div class="mid-grid">
		<div class="description">
			<h1>BLOG</h1>
			<p>Informata dhe lajme mbi ushqimet</p>
		</div>
	</div>
</div>
<div class="white-box category">
	<div class="mid-grid">
		<h2 class="home-title">Lajmet e fundit</h2>
		<form method="get" class="search-form">
			<input type="hidden" name="template" value="blog">
			<input type="text" name="search" placeholder="Kërko">
			<input type="submit" name="submit" value="Kërko" class="Kerko">
		</form>
		<div class="box-holder">
			<?php $i = 1; foreach($last_blog as $blog): ?>
				<a href="<?php echo $blog['url']; ?>">
					<div class="box-3">
						<div class="blog-box">
							<figure>
								<img src="<?php echo $blog['fotografia']; ?>">
							</figure>
							<div class="desc">
								<h2><?php echo $blog['titulli']; ?></h2>
								<p><?php echo $blog['short_text']; ?></p>
							</div>
						</div>
					</div>
				</a>
				<?php if($i == 3){ echo '</div><div class="box-holder">'; $i = 0;}?>
			<?php $i++; endforeach; ?>
		</div>
	</div>
</div>
<div class="most-view">
	<h2 class="home-title" style="margin-top:20px;">Me te lexuarat</h2>
	<div class="mid-grid">
		<div class="most-view-row">
			<?php $i = 1; foreach($mostviewed_blog as $blog): ?>
				<?php if($i < 3): ?>
					<div class="info-box">
						<h4><?php echo $blog['titulli']; ?></h4>
						<p><?php echo $blog['short_text']; ?></p>
						<a href="<?php echo $blog['url']; ?>" class="more">Shiko Receten</a>
					</div>
					<div class="img-box">
						<figure><img src="<?php echo $blog['fotografia']; ?>" alt="<?php echo $blog['titulli']; ?>"></figure>
					</div>
				<?php elseif($i >= 3): ?>
					<?php if($i == 3){ echo '</div><div class="most-view-row">'; }?>
					<div class="img-box">
						<figure><img src="<?php echo $blog['fotografia']; ?>" alt="<?php echo $blog['titulli']; ?>"></figure>
					</div>
					<div class="info-box">
						<h4><?php echo $blog['titulli']; ?></h4>
						<p><?php echo $blog['short_text']; ?></p>
							<a href="<?php echo $blog['url']; ?>" class="more">Shiko Receten</a>
					</div>
				<?php endif;?>
			<?php $i++; endforeach; ?>
		</div>
	</div>
</div>