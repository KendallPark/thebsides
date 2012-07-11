<?php
/**
 * The main template file.
 * @package WordPress
 * @subpackage #padawan
 */

get_header(); 
	
		/* If you want to extend any of the page types below simply remove it from the if statement and create a unique page template */
		
		/* this first conditional statement determines what data to print for the title of each results page */
		
		if(is_search()) { ?>
		
			<h2>
			<?php 
				/* Print number of search results */ 
				$allsearch = &new WP_Query("s=$s&showposts=-1"); $count = $allsearch->post_count; echo $count . ' '; 
			
				wp_reset_query(); 
			
				/* Print the search query */
				_e('Search results for','padawan'); "<?php the_search_query() ?>"
		
				/* Was the query for a Tag? */ 
			
				} else if(is_tag()) { 

				/* Print the tag queried */
				_e('Tag','padawan'); ?>: <?php single_tag_title(); 

				/* Was the query for an archive by Day? */ 
				} else if(is_day()) { 
		
				/* Print the date the query retrieved */
				_e('Archive','padawan'); ?>: <?php echo get_the_date();
			
				/* Was the query for an archive by Month? */ 
				} else if(is_month()) { 
	
				/* Print the Date */
				_e('Archive','padawan'); ?>: <?php echo get_the_date('F Y'); 
	
			 	/* Was the query for an archive by Year ? */ 
				} else if(is_year()) { 
		
				/* Print the year */
				_e('Archive','padawan'); : echo get_the_date('Y'); 
		
				/* Was the Result a 404 */
				} else if(is_404()) { 
			
				/* Break the bad news */
				_e('404 - Page Note Found','padawan'); 
			
				/* Was the query for a category ? */
				} else if(is_category()) { 
			
				/* Print the category queried */	
				_e('Category','padawan'); ?>: <?php single_cat_title(); 
			
				/* Was the query for a specific author ? */
				} else if(is_author()) {
			
				/* Print the authors name or nickname */
				_e('Posts by Author','padawan'); ?>: <?php the_author_posts(); 
				_e('posts by','padawan'); 
				$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); 
					echo $curauth->nickname; ?>
			</h2>
		
		<?php } ?>
					
		<section>
			
			<?php 
				/* Print the output for a 404 result */
				if(is_404()) { ?>

            		<h4><?php _e('Sorry, but the page you are looking for is no longer here. Please use the navigations or the search to find what what you are looking for.','padawan'); ?></h4>
            
            <?php 
				/* If its not a 404 lets output the list of results */
				} else if ( have_posts() ) : while ( have_posts() ) : the_post();  
					
					/* Does the post have a thumbnail ? */
					if ( has_post_thumbnail() ) { ?>
					<a class="blog-image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'blog-image' ); ?></a> 
			<?php 
				} 
				
				/* Now Print the title and the excerpt of the posts */
				?>
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