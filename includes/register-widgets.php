<?php
/**
 * Register individual widgets
 */

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


?>