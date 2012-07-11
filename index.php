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
		$allsearch = &new WP_Query("s=$s&showposts=-1"); $count = $allsearch->post_count; echo $count . ' '; 			
		wp_reset_query(); 			
		_e('Search results for','padawan');?> "<?php the_search_query() ?>" <?php
			
	} else if(is_tag()) { 
		_e('Tag','padawan'); ?>: <?php single_tag_title(); 

	} else if(is_day()) { 
		_e('Archive','padawan'); ?>: <?php echo get_the_date();
			 
	} else if(is_month()) { 
		_e('Archive','padawan'); ?>: <?php echo get_the_date('F Y'); 
	
	} else if(is_year()) { 
		_e('Archive','padawan'); ?>: <?php echo get_the_date('Y'); 
		
	} else if(is_404()) { 
		_e('404 - Page Note Found','padawan'); 
			
	} else if(is_category()) { 
		_e('Category','padawan'); ?>: <?php single_cat_title(); 
	
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
	if(is_404()) { 
?>
		<h4><?php _e('Sorry, but the page you are looking for is no longer here. Please use the navigations or the search to find what what you are looking for.','padawan'); ?></h4>          
<?php 

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