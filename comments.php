<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to padawan_comment which is
 * located in the /includes/theme-setup.php file.
 *
 * @package WordPress
 * @subpackage #padawan
 */

// Check if this post is password protected
if ( post_password_required() ) :
	
	_e( 'This post is password protected. Enter the password to view any comments.', 'padawan' );

return;
endif;

// If comments are allowed on this post, display the comments and coment form
if ( have_comments() ) :

	printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'padawan' ),
	number_format_i18n( get_comments_number() ), '' . get_the_title() . '' );

// 
if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through?
	
	previous_comments_link( __( '&larr; Older Comments', 'padawan' ) );
	
	next_comments_link( __( 'Newer Comments &rarr;', 'padawan' ) );
endif; // check for comment navigation

/*
 * Loop through and list the comments. Tell wp_list_comments()
 * to use padawan_comment() to format the comments.
 * See padawan_comment() in /includes/theme-setup.php for more.
 */
wp_list_comments( array( 'callback' => 'padawan_comment' ) );

if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through?
	
	previous_comments_link( __( '&larr; Older Comments', 'padawan' ) );
	next_comments_link( __( 'Newer Comments &rarr;', 'padawan' ) );

endif; // check for comment navigation

else : // or, if we don't have comments:

	if ( ! comments_open() ) :

		_e( 'Comments are closed.', 'padawan' );
	
	endif; // end ! comments_open()

endif; // end have_comments()

// Display comment form
comment_form();
?>