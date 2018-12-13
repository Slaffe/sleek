<?php while (have_posts()) : the_post() ?>
	<section id="post">

		<header>

			<h1><?php the_title() ?></h1>

			<?php if (has_post_thumbnail()) : ?>
				<figure>
					<?php the_post_thumbnail('large') ?>
				</figure>
			<?php endif ?>

			<?php if (get_post_type() == 'post') : ?>
				<p>
					<time datetime="<?php echo get_the_time('Y-m-j') ?>">
						<?php echo get_the_time(get_option('date_format')) ?>
					</time>
					<?php if ($terms = sleek_get_post_terms($post->ID, get_post_type(), true)) : ?>
						<span><?php echo implode(', ', $terms) ?></span>
					<?php endif ?>
					<?php if (get_the_author_meta('ID') != 1) : ?>
						<?php the_author_posts_link() ?>
					<?php endif ?>
				</p>
			<?php endif ?>

		</header>

		<article>

			<?php the_content() ?>
			<?php wp_link_pages() ?>

		</article>

	</section>
<?php endwhile ?>

<nav class="pagination">

	<?php previous_post_link('%link') ?>
	<?php next_post_link('%link') ?>

</nav>
