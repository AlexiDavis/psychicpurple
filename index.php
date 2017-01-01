<?php get_header(); ?>
		<main>
			<?php if ( have_posts() ) : ?>
			<ul>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( is_page() || is_single() ) : ?><li class="single" <?php post_class(); ?>><?php else : ?><li <?php post_class(); ?>><?php endif; ?>
					<?php if ( has_post_format( 'image' )) : ?>
					<header>
						<?php if ( !is_page() && !is_single() ) : ?>
								<?php $imageUrl = get_my_url(); ?>
							<a href="<?php echo the_permalink(); ?>">
								<img src="<?php echo $imageUrl; ?>" alt="<?php the_excerpt(); ?>" />
							</a>
						<?php endif; ?>
					</header>
					<?php else : ?>
					<header>
						<?php if ( !is_page() && !is_single() ) : ?>
							<a href="<?php echo the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'archive' ); else : ?>
									<img src="<?php echo get_template_directory_uri(); ?>/img/featured.jpeg" />
								<?php endif; ?>
							</a>
						<?php endif; ?>
						<h2>
							<?php if ( !is_page() && !is_single() ) : ?>
							<a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a>
							<?php else : echo get_the_title(); endif; ?>
						</h2>
					</header>
					<?php endif; ?>
					<?php if ( !is_page() && !is_single() ) : ?>
						<?php the_excerpt(); ?>
					<?php else : ?>
						<?php the_content(); ?>
					<?php endif; ?>
					<footer>
						<p><?php the_time('M d, Y'); ?></p>
						<?php if ( is_single() ) : ?>
						    <?php the_tags( 'Tagged with: ', ' &amp; ', '<br />' ); ?>
						<?php endif; ?>
					</footer>
					<?php if ( is_single() ) : ?>
						<?php comments_template();
                        wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink=page %'); ?>
					<?php endif; ?>
				</li>
				<?php endwhile; ?>
			</ul>
			<p><?php the_posts_navigation(); ?></p>
			<?php else : ?>
				<h2>Unfortunately, no posts</h2>
			<?php endif; ?>
		</main>
<?php get_footer(); ?>