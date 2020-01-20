<script>
	$( document ).ready(function() {	
		if ($(".content-area").length > 0) {
			$(".content-area").each(function() {
				$(this).removeClass('content-area');
			}); 
		}
		$(window).scroll(function() {
			var x = document.getElementById("menu-menu-2");
			var y = document.getElementById("main-header");
   		 	if(x.style.display === "block"){
				x.style.display = "none";
				y.style.backgroundColor = 'transparent';
			}
		});
	});	
			function myFunction() {
				var x = document.getElementById("menu-menu-2");
				var y = document.getElementById("main-header");
				if (x.style.display === "block") {
				x.style.display = "none";
				y.style.backgroundColor = 'transparent';
				} else {
				x.style.display = "block";
				y.style.backgroundColor = '#333333';
				}
			}
</script>
			<footer class="footer">
				<div class="g-container g-colx2 address">
					<?php echo get_field('theme_setting_footer_content', 'options'); ?>
				</div>
			</footer>
		<?php wp_footer(); ?>
	</body>
</html>
