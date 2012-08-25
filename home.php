<?php
/*
 * Template Name: Homepage
 */

get_header(); ?>
<div id="content-container">
<div class="container">
	<div class="row">
		<div class="span9">
			<div class="wysiwyg">
			<section>
				
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
				<?php if ( is_front_page() ) { ?>
					<h1><?php the_title(); ?></h1>
				<?php } else { ?>	
					<h1><?php the_title(); ?></h1>
				<?php } ?>				
			
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'padawan' ), 'after' => '' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'padawan' ), '', '' ); ?>
							
				<?php endwhile; ?>
			</section>
			</div> <!--.wysiwyg-->

		</div> <!-- .span9 -->
		<div class="span3">
			<?php get_sidebar(); ?>
		</div> <!-- .span3 -->
	</div> <!-- .row -->
</div> <!-- .container -->
</div> <!-- #content-container -->
<?php get_footer(); ?>