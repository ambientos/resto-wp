<a class="knowledge-video-item col-md-2 col-sm-3 col-6" href="<?php the_permalink() ?>">
	<figure class="knowledge-video-item-thumb">
		<?php the_post_thumbnail( 'video-thumb', array( 'class' => 'img-block img-fluid' ) ); ?>
	</figure>
	<span class="knowledge-video-item-title"><?php the_title() ?></span>
</a>