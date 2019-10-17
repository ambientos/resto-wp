<a class="knowledge-article-item col-md-4 col-sm-6" href="<?php the_permalink() ?>">
	<figure class="knowledge-article-item-thumb">
		<?php the_post_thumbnail( 'testimonial-thumb', array( 'class' => 'img-block img-fluid' ) ); ?>
	</figure>

	<div class="knowledge-article-item-title"><?php the_title(); ?></div>

	<div class="knowledge-article-item-meta"><?php the_time('j F Y') ?> — <?php the_author(); ?></div>

	<div class="knowledge-article-item-excerpt"><?php echo wp_trim_words( get_the_content(), 25 ); ?></div>
</a>