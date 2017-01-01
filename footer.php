		<aside>
			<ul id="sidebar">
						<?php if ( is_single() ) : ?>
							<?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'archive' ); ?>
							<?php endif; ?>
						<?php endif; ?>
				<?php dynamic_sidebar( 'sidebar' ); ?>
			</ul>
		</aside>
		<footer>
			<div>
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
			<div>
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</div>
			<div>
				<h3>About <?php bloginfo('title'); ?></h3>
				<p><?php bloginfo('description'); ?></p>
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</div>
				<p>&copy;2016 <a href="http://alexidavis.com">Alexi Davis</a></p>
				<p>Design by Alexi Davis</p>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>