<footer>
	<div class="mid-grid">
		<p>Copyright © <?php echo date('Y');?> Gr.4</p>
	</div>
</footer>
<script src="<?php echo WEB_PATH . 'public/js/script.js';?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.bars').click(function(){
			$(this).toggleClass('change');
			$('header nav').slideToggle(400);
		});
	});
</script>
</body>
</html>