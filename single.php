<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage padawan
 */

get_header();

?>
<article>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'padawan' ) . ' %title' ); ?>
	<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'padawan' ) . '' ); ?>

	<h1><?php the_title(); ?></h1>

	<?php padawan_posted_on(); ?>

	<?php the_content(); ?>
	
	<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'padawan' ), 'after' => '' ) ); ?>

	<?php padawan_posted_in(); ?>
						
	<?php edit_post_link( __( 'Edit', 'padawan' ), '', '' ); ?>

	<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'padawan' ) . ' %title' ); ?>
	<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'padawan' ) . '' ); ?>

	<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>