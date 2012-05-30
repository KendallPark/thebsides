<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage themeName
 */

get_header();

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<section>
<?php
	/* Queue the first post, that way we know who
	 * the author is when we try to get their name,
	 * URL, description, avatar, etc.
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>


				<h1><?php printf( __( 'Author Archives: %s', 'themeName' ), "<a class='url fn n' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a>" ); ?></h1>

<?php
// If a user has filled out their description, show a bio on their entries.
if ( get_the_author_meta( 'description' ) ) : ?>

							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themeName_author_bio_avatar_size', 60 ) ); ?>
							<h2><?php printf( __( 'About %s', 'themeName' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>

<?php endif; ?>

	<?php if(isset($curauth->fb) || isset($curauth->gplus) || isset($curauth->pinterest) || isset($curauth->tweet)) { ?>
		 <h5 class="date">Connect with <?php echo $curauth->nickname; ?>:&nbsp;
		
		<?php if( $curauth->fb == '') { echo '';} 
		else { ?> 
			<?php if($curauth->gplus == '' && $curauth->pinterest =='' && $curauth->tweet =='') { ?>
				<a href="<?php echo $curauth->fb; ?>" target="_blank" >Facebook</a>
			<?php } else { ?>
				<a href="<?php echo $curauth->fb; ?>" target="_blank" >Facebook</a> | 
				<?php }
		} ?>
		
		<?php if( $curauth->gplus == '') { echo '';} 
		else { ?>
			<?php if($curauth->pinterest == '' && $curauth->tweet =='') { ?>
				<a href="<?php echo $curauth->gplus; ?>" target"_blank" >Google+</a> 
			<?php } else { ?>
				<a href="<?php echo $curauth->gplus; ?>" target="_blank" >Google+</a> |
				<?php }
		 } ?>
		
		<?php if( $curauth->pinterest == '') { echo ''; } 
		else { ?>
			<?php if($curauth->tweet =='') { ?>
				<a href="<?php echo $curauth->gplus; ?>" target"_blank" >Pinterest</a> 
			<?php } else { ?>
				<a href="<?php echo $curauth->pinterest; ?>" target="_blank" >Pinterest</a> |
				<?php }
	  	} ?>	
		
		<?php if( $curauth->tweet == '') { echo''; } 
		else { ?>
		<a href="<?php echo $curauth->tweet; ?>" target="_blank" >Twitter</a>
		<?php }  ?>	
		
		
		</h5>
	<?php } ?>

<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();

	/* Run the loop for the author archive page to output the authors posts
	 * If you want to overload this in a child theme then include a file
	 * called loop-author.php and that will be used instead.
	 */
	 get_template_part( 'loop', 'author' );
?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>