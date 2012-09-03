<?php
/**
 * Register individual widgets
 */

// Add a customizable social media links widget!
class SocialLinks extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'SocialLinks', // Base ID
            'Social Media Links', // Name
            array( 'description' => __( 'Social Media Links', 'text_domain' ), ) // Args
        );
    }
    public function form( $instance ) {

        ?>
    <p>Don't Forget to Add "http"</p>
    <p>
        <label for="<?php echo $this->get_field_id( 'FacebookUrl' ); ?>"><?php _e( 'Facebook URL:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'FacebookUrl' ); ?>" name="<?php echo $this->get_field_name( 'FacebookUrl' ); ?>" type="text" value="<?php echo $instance['FacebookUrl']; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'TwitterUrl' ); ?>"><?php _e( 'Twitter URL:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'TwitterUrl' ); ?>" name="<?php echo $this->get_field_name( 'TwitterUrl' ); ?>" type="text" value="<?php echo $instance['TwitterUrl']; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'LinkedInUrl' ); ?>"><?php _e( 'LinkedIn URL:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'LinkedInUrl' ); ?>" name="<?php echo $this->get_field_name( 'LinkedInUrl' ); ?>" type="text" value="<?php echo $instance['LinkedInUrl']; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'GoogleUrl' ); ?>"><?php _e( 'Google URL:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'GoogleUrl' ); ?>" name="<?php echo $this->get_field_name( 'GoogleUrl' ); ?>" type="text" value="<?php echo $instance['GoogleUrl']; ?>" />
    </p>

    <?php
    }

    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        return $new_instance;

    }

    public function widget( $args, $instance ) {
        extract($args);

        ?>
    <div id="socialWidget" class="bottom-divider-thin top-divider-thick">
        <h2 class="heading">Get Connected</h2>
        <a href="<?php echo $instance['FacebookUrl']; ?>" class="fbWidget left social" target="_blank"></a>
        <a href="<?php echo $instance['TwitterUrl']; ?>" class="twitterWidget left social" target="_blank"></a>
        <a href="<?php echo $instance['LinkedInUrl']; ?>" class="social liWidget left" target="_blank"></a>
        <a href="<?php echo $instance['GoogleUrl']; ?>" class="googleWidget left social" target="_blank"></a>
    </div>
    <?php

    }
}
register_widget( 'SocialLinks' );

// Twitter Feed
class MinitwitterWidget extends WP_Widget {
	
	function MinitwitterWidget() {
		$widget_options = array(
		'classname'		=>		'minitwitter-widget',
		'description' 	=>		'Widget which puts the twitter feed on your website.'
		);
		
		parent::WP_Widget('minitwitter-widget', 'miniTwitter', $widget_options);
	}
	
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		$options = (($instance['username'])?'username:"'.$instance['username'].'",':'username:"webdevdesigner",');
		$options .= (($instance['limit'])?'limit:'.$instance['limit'].',':'');
		$options .= (($instance['query'])?'query:'.$instance['query'].',':'');
		$options .= (($instance['list'])?'list:'.$instance['list'].',':'');
		$options .= (($instance['linkcolor'])?'linkColor:'.$instance['linkcolor'].',':'');
		?>
		<?php echo $before_widget; ?>
		<?php echo '<div class="tweets"> 
				<div class="tweets_header">Mini <a href="http://minitwitter.webdevdesigner.com">Tweets</a></div> 
				<div class="content_tweets_'.$this->get_field_id('id').'"> </div> 
				<div class="tweets_footer">
					<span id="bird"></span>
				</div> 
			</div>
			<script type="text/javascript">
				$(".content_tweets_'.$this->get_field_id('id').'").miniTwitter({
					'.$options.'
					retweet:true
				});
			</script>';?>
		<?php echo $after_widget; ?>
		<?php 
	}

	function update($new, $old) {
		return $new;
	}
	
	function form($instance) {
		?>
		<p><label for="<?php echo $this->get_field_id('username')?>">
		Username
		<input id="<?php echo $this->get_field_id('username')?>" 
		name="<?php echo $this->get_field_name('username')?>"
		value="<?php echo $instance['username'];?>" size=10 />
		</label></p>
		<p><label for="<?php echo $this->get_field_id('limit')?>">
		Limit
		<input id="<?php echo $this->get_field_id('limit')?>" 
		name="<?php echo $this->get_field_name('limit')?>"
		value="<?php echo $instance['limit'];?>" size=10 />
		</label></p>
		<p><label for="<?php echo $this->get_field_id('list')?>">
		List
		<input id="<?php echo $this->get_field_id('list')?>" 
		name="<?php echo $this->get_field_name('list')?>"
		value="<?php echo $instance['list'];?>" size=10 />
		</label></p>
		<p><label for="<?php echo $this->get_field_id('query')?>">
		Query
		<input id="<?php echo $this->get_field_id('query')?>" 
		name="<?php echo $this->get_field_name('query')?>"
		value="<?php echo $instance['query'];?>" size=10 />
		</label></p>
		<?php 
	}
}

function minitwitter_widget_init() {
	register_widget('MinitwitterWidget');
}
add_action('widgets_init', 'minitwitter_widget_init');


?>