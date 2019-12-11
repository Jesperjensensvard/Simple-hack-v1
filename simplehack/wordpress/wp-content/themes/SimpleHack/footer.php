

		<footer class="footer">
			<div class="g-container g-colx2 logo">
				<a href="<?php echo get_site_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/img/framework/logo-neg.svg" alt="Food Factory"></a>
			</div>
			<div class="g-container g-colx2 address">
				<?php echo get_field('theme_setting_footer_content', 'options'); ?>
			</div>
		</footer>
		<!-- End -->
		<?php
		$theme_setting_scripts_footer = get_field('theme_setting_scripts_footer', 'options');
		if($theme_setting_scripts_footer) {
			echo $theme_setting_scripts_footer;
		}
		?>
		<?php
		/* if (current_user_can('administrator')){
            echo "<pre>";
            print_r('Queries = '.get_num_queries());
            echo "</pre>";
		} */
		?>

		<?php wp_footer(); ?>

	</body>
</html>
