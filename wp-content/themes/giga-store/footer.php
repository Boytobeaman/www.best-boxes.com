<?php if ( is_active_sidebar( 'giga-store-footer-area' ) ) { ?>
	<div class="footer-widgets"> 
		<div class="container">		
			<div id="content-footer-section" class="row clearfix">
				<?php dynamic_sidebar( 'giga-store-footer-area' ) ?>
			</div>
		</div>
	</div>	
<?php } ?>
<footer id="colophon" class="rsrc-footer" role="contentinfo">
	<div class="container">  
		<div class="row rsrc-author-credits">
			<?php if ( get_theme_mod( 'giga_store_socials', 0 ) == 1 ) : ?>
				<div class="footer-socials text-center">
					<?php
					if ( get_theme_mod( 'giga_store_socials', 0 ) == 1 ) {
						giga_store_social_links();
					}
					?>                 
				</div>
			<?php endif; ?>
			<p class="text-center">
				best-boxes.com @ All rights reserved
			</p> 
		</div>
	</div>       
</footer> 
<p id="back-top">
	<a href="#top"><span></span></a>
</p>
<!-- end main container -->
</div>
<nav id="menu" class="off-canvas-menu">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'main_menu',
		'container'		 => false,
	) );
	?>
</nav>
<?php wp_footer(); ?>
</body>
</html>
