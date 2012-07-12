<?php 
get_header(); 
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
?>
<section>    
	<?php echo apply_filters( 'the_title', $term->name ); 
	 if ( !empty( $term->description ) ): ?>
	<?php echo esc_html($term->description); ?>
    <?php endif; ?>
    <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
    	<h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    		<?php the_time(get_option('date_format')); ?> by <?php the_author_posts_link(); ?>
            <?php the_content( __('Full story&') ); ?>
            <?php endwhile; ?>
     <?php next_posts_link('« Previous Entries') ?>
     <?php previous_posts_link('Next Entries »') ?>
     <?php else: ?>
     	<h2 class="post-title">No Taxonomy <?php echo apply_filters( 'the_title', $term->name ); ?></h2>
        <p>It seems there isn't anything happening in <strong><?php echo apply_filters( 'the_title', $term->name ); ?></strong> right now. Check back later, something is bound to happen soon.</p>
     <?php endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
