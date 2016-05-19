<?php

    $content_source = get_sub_field('content_source');
    $content 		= get_sub_field('content');
    $image 			= get_sub_field('background_image');
	$link_text 		= get_sub_field('link_text');


    $classes    = 'link-list-item';

    $styles      = (get_sub_field('background_color')) ? 'background-color: ' . get_sub_field('background_color') . ';' : '';
    $styles     .= (get_sub_field('background_image')) ? ' background-image: url(' . $image['url'] . ');' : '';

?>
<li class="<?=$classes?>" style="<?=$styles?>">
	<div class="link-list-item-inner">
		<h3><?php the_sub_field('title'); ?></h3>
		<?php
		$post_object = get_sub_field('link');
		if( $post_object ): 
			$post = $post_object;
			setup_postdata( $post ); 
		?>
		<article>
			<div class="link-list-content">
				<?php echo ($content_source == 'excerpt') ? get_the_excerpt() : $content; ?>
			</div>
			<aside>
				<a class="link-list-item-link btn" href="<?php the_permalink(); ?>">
					<?=$link_text?>
				</a>
			</aside>
		    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		</article>
		<?php endif; ?>
	</div>
</li>