<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<div class="content-main">
<div class="container">
<div class="row">
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 left-content-section">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					// Previous/next post navigation.
					twentyfourteen_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;

			?>
	</div>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 content-right">
<?php get_sidebar(); ?>
<?php get_sidebar( 'content' ); ?>
</div>
</div>
    </div>	<!-- #contianer -->
	</div> <!-- #content --> 
	
	</content>
<!-- content ends -->


<?php

get_footer();
