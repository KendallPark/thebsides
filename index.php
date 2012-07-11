<?php
/**
 * The main template file.
 * @package WordPress
 * @subpackage #padawan
 */

get_header(); 	
?>

	<h2>
		<?php	
			if(is_search()) { 

				/* Print number of search results */   
				$allsearch = &new WP_Query("s=$s&showposts=-1"); $count = $allsearch->post_count; echo $count . ' '; 			
				wp_reset_query(); 
				
				/* Print the search query */			
				_e('Search results for','padawan');?> "<?php the_search_query() ?>" <?php

			/* Was the query for a Tag? */ 
			} else if(is_tag()) { 
				_e('Tag','padawan'); ?>: <?php single_tag_title(); 
			
			/* Was the query for an archive by Day? */
			} else if(is_day()) { 
				_e('Archive','padawan'); ?>: <?php echo get_the_date();

			/* Was the query for an archive by Day? */
			} else if(is_month()) { 
				_e('Archive','padawan'); ?>: <?php echo get_the_date('F Y'); 
			
			/* Was the query for an archive by Year? */
			} else if(is_year()) { 
				_e('Archive','padawan'); ?>: <?php echo get_the_date('Y'); 
			
			/* Was the query a 404 ? */
			} else if(is_404()) { 
				_e('404 - Page Note Found','padawan'); 

			/* Was the query for a specific category? */
			} else if(is_category()) { 
				_e('Category','padawan'); ?>: <?php single_cat_title(); 

			/* Was the query for an author? */
			} else if(is_author()) {
				_e('Posts by Author','padawan'); ?>: <?php the_author_posts(); 
				_e('posts by','padawan'); 
				$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); 
				echo $curauth->nickname; 
			} 
		?>
	</h2>					
		
		<section>
		<?php 

			/* Output a message if its a 404 */
			if(is_404()) { 
		?>
				<h4><?php _e('Sorry, but the page you are looking for is no longer here. Please use the navigations or the search to find what what you are looking for.','padawan'); ?></h4>          
		<?php 
			
			/* List the title and excerpt for the results of all other queries */
			} else if ( have_posts() ) : while ( have_posts() ) : the_post();  
				if ( has_post_thumbnail() ) { 
		?>
					<a class="blog-image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'blog-image' ); ?></a> 
			<?php } ?>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php 
					the_excerpt(); 

					endwhile; 

						next_posts_link( __('&larr; Older Entries','padawan') );
		            	previous_posts_link( __('Newer Entries &rarr;','padawan') ); 

					endif; 
			?>				
		</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>	