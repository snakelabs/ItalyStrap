<!-- Footer -->
    <footer itemscope itemtype="http://schema.org/WPFooter">
		<?php if( is_active_sidebar( 'footer-box-1' ) || is_active_sidebar( 'footer-box-2' ) || is_active_sidebar( 'footer-box-3' ) || is_active_sidebar( 'footer-box-4' ) ): ?>
	    	<div class="container">
				<hr>
	        	<div class="row" itemscope itemtype="http://schema.org/WPSideBar">
                	<!-- widget -->
		        	<?php if ( ! dynamic_sidebar( 'footer-box-1' ) ) : ?>
					<?php endif; ?>

                    <!-- widget -->
		        	<?php if ( ! dynamic_sidebar( 'footer-box-2' ) ) : ?>
					<?php endif; ?>

					<!-- widget -->
		        	<?php if ( ! dynamic_sidebar( 'footer-box-3' ) ) : ?>
					<?php endif; ?>

		        	<!-- widget -->
                    <?php if ( ! dynamic_sidebar( 'footer-box-4' ) ) : ?>
					<?php endif; ?>
	            </div>
	        </div>
		<?php endif; ?>
	    	<div class="container"><!-- #copyright -->
				<hr>
	        	<div class="row">
		        	<div class="col-md-12">
						<p class="text-muted">&copy; <span itemprop="copyrightYear"><?php echo date('Y'); ?></span> <?php bloginfo('name'); ?> | Developed by <a href="<?php echo 'http://www.overclokk.net'; ?>" rel="nofollow" itemprop="url">Overclokk.net</a> | Theme name: <a href="<?php echo 'http://www.overclokk.net/italystrap'; ?>" rel="nofollow" itemprop="url">ItalyStrap</a> <?php if ( !is_child_theme() ): ?>| Theme version: <span class="badge" itemprop="version"><?php italystrap_version(); ?></span><?php endif; ?>
						</p>
					</div>
                </div>
			</div><!-- #copyright -->

    </footer><!-- #footer -->
</div><!-- Wrapper -->
	<?php wp_footer(); ?>
</body>
</html>
