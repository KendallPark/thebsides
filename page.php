<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 * @subpackage padawan
 */

get_header(); ?>
<div id="content-container">
<div class="container">
	<div class="row">
		<div class="span9">
	
			<section>
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
				<?php if ( is_front_page() ) { ?>
					<h2><?php the_title(); ?></h2>
				<?php } else { ?>	
					<h1><?php the_title(); ?></h1>
				<?php } ?>				
			
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'padawan' ), 'after' => '' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'padawan' ), '', '' ); ?>			
				<?php endwhile; ?>
			</section>
		</div> <!-- .span9 -->
		<div class="span3">
			<?php get_sidebar(); ?>
		</div> <!-- .span3 -->
	</div> <!-- .row -->
</div> <!-- .container -->
</div> <!-- #content-container -->
<?php get_footer(); ?>