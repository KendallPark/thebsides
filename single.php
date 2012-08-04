<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage #themeName
 */

get_header(); ?>
<article>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'themeName' ) . ' %title' ); ?>
					<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'themeName' ) . '' ); ?>

					<h1><?php the_title(); ?></h1>

						<?php themeName_posted_on(); ?>

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'themeName' ), 'after' => '' ) ); ?>

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themeName_author_bio_avatar_size', 60 ) ); ?>
							<h2><?php printf( esc_attr__( 'About %s', 'themeName' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
								<?php printf( __( 'View all posts by %s &rarr;', 'themeName' ), get_the_author() ); ?>
							</a>
<?php endif; ?>

							<!--social connection links-->
					<?php if((get_the_author_meta('fb') !='') || (get_the_author_meta('gplus') !='') || (get_the_author_meta('pinterest') !='') || (get_the_author_meta('tweet') !='')) { ?>
						 <h5 class="date">Connect with <?php the_author_meta('nickname')?>:&nbsp; 

					<?php if( get_the_author_meta('fb') =='') { echo '';} 
					else { ?> 
						<?php if(get_the_author_meta('gplus') == '' && get_the_author_meta('pinterest') =='' && get_the_author_meta('tweet') =='') { ?>
							<a href="<?php the_author_meta('fb') ?>" target="_blank" >Facebook</a>
						<?php } else { ?>
							<a href="<?php the_author_meta('fb') ?>" target="_blank" >Facebook</a> | 
						<?php }
					} ?>

					<?php if( get_the_author_meta('gplus') == '') { echo '';} 
					else { ?>
						<?php if(get_the_author_meta('pinterest') == '' && get_the_author_meta('tweet') =='') { ?>
							<a href="<?php the_author_meta('gplus') ?>" target"_blank" rel="author" >Google+</a> 
						<?php } else { ?>
							<a href="<?php the_author_meta('gplus') ?>" target="_blank" rel="author" >Google+</a> |
						<?php }
					 } ?>

					<?php if( get_the_author_meta('pinterest') == '') { echo ''; } 
					else { ?>
						<?php if(get_the_author_meta('tweet') =='') { ?>
							<a href="<?php the_author_meta('pinterest') ?>" target"_blank" >Pinterest</a> 
						<?php } else { ?>
							<a href="<?php get_the_author_meta('pinterest') ?>" target="_blank" >Pinterest</a> |
						<?php }
				  	} ?>	

					<?php if( get_the_author_meta('tweet') == '') { echo''; } 
					else { ?>
						<a href="<?php the_author_meta('tweet') ?>" target="_blank" >Twitter</a>
					<?php }  ?>					
						</h5>
					<?php } ?>

						<?php themeName_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'themeName' ), '', '' ); ?>

				<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'themeName' ) . ' %title' ); ?>
				<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'themeName' ) . '' ); ?>

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>