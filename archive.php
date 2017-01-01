<?php get_header(); ?>
		<main>
			<?php if ( have_posts() ) : ?>
			<ul>
				<?php while ( have_posts() ) : the_post(); ?>
				<li class="archive" <?php post_class(); ?>>
					<div class="image">
						<?php if ( has_post_format( 'image' )) : ?>
							<?php $imageUrl = get_my_url(); ?>
							<a href="<?php echo the_permalink(); ?>">
								<img src="<?php echo $imageUrl; ?>" alt="<?php the_excerpt(); ?>" />
							</a>
						<?php else : ?>
							<a href="<?php echo the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'archive' ); else : ?>
									<img src="<?php echo get_template_directory_uri(); ?>/img/featured.jpeg" />
								<?php endif; ?>
							</a>
						<?php endif; ?>
					</div>
					<div class="body-of-post">
						<?php if ( !has_post_format( 'image' )) : ?>
					<header>
						<h2>
							<a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a>
						</h2>
					</header>
						<?php endif; ?>
						<?php the_excerpt(); ?>
					<footer>
						<p><?php the_time('M d, Y'); ?></p>
					</footer>
					</div>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php else : ?>
				<h2>Unfortunately, no posts</h2>
			<?php endif; ?>
		</main>
<?php get_footer(); ?>