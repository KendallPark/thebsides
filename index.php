<?php
/**
 * The main template file.
 * @package WordPress
 * @subpackage padawan
 */

get_header(); ?>

		<?php if(is_search()) { ?>
		<h2><?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $count = $allsearch->post_count; echo $count . ' '; wp_reset_query(); ?><?php _e('Search results for','padawan'); ?> "<?php the_search_query() ?>"</h2><?php } else if(is_tag()) { ?>
		
		<h2><?php _e('Tag','padawan'); ?>: <?php single_tag_title(); ?></h2><?php } else if(is_day()) { ?>

		<h2><?php _e('Archive','padawan'); ?>: <?php echo get_the_date(); ?></h2><?php } else if(is_month()) { ?>

		<h2><?php _e('Archive','padawan'); ?>: <?php echo get_the_date('F Y'); ?></h2><?php } else if(is_year()) { ?>
		
		<h2><?php _e('Archive','padawan'); ?>: <?php echo get_the_date('Y'); ?></h2><?php } else if(is_404()) { ?>
		
		<h2><?php _e('404 - Page Note Found','padawan'); ?></h2><?php } else if(is_category()) { ?>
		
		<h2><?php _e('Category','padawan'); ?>: <?php single_cat_title(); ?></h2><?php } else if(is_author()) { ?>
		
		<h2><?php _e('Posts by Author','padawan'); ?>: <?php the_author_posts(); ?> <?php _e('posts by','padawan'); ?> 
			<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); 
					echo $curauth->nickname; ?></h2><?php } ?>
					
		<section>
			<?php if(is_404()) { ?>

            	<h4><?php _e('Sorry, but the page you are looking for is no longer here. Please use the navigations or the search to find what what you are looking for.','padawan'); ?></h4>
            	            	
            <?php } else if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php if ( has_post_thumbnail() ) { ?><a class="blog-image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'blog-image' ); ?></a> <?php } ?>
                
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>


                <?php if(is_search() || is_archive()) { ?><?php the_excerpt(); ?><?php } else { ?><?php the_excerpt(); ?><?php } ?><?php if(is_single()) { ?>
                	<?php wp_link_pages(); ?>
                <?php } ?>

                <?php endwhile; ?>

            <?php next_posts_link( __('&larr; Older Entries','padawan') ); ?>

            <?php previous_posts_link( __('Newer Entries &rarr;','padawan') ); ?>
            <?php endif; ?>
            	
        </section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>	