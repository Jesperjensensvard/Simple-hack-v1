<script>
	$( document ).ready(function() {	
		if ($(".content-area").length > 0) {
			$(".content-area").each(function() {
				$(this).removeClass('content-area');
			}); 
		}
	});	
</script>
			<footer class="footer">
				<div class="g-container g-colx2 logo">
					<a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/demo/logo.png" alt="Simple Hack"></a>
				</div>
				<div class="g-container g-colx2 address">
					<?php echo get_field('theme_setting_footer_content', 'options'); ?>
				</div>
			</footer>
		<?php wp_footer(); ?>
	</body>
</html>
