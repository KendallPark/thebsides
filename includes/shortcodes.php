<?php

//Google Maps Shortcode
function do_googleMaps($atts, $content = null) {
   extract(shortcode_atts(array(
      "width" => '640',
      "height" => '480',
      "src" => ''
   ), $atts));
   return '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed" ></iframe>';
}
add_shortcode("googlemap", "do_googleMaps");

// Twitter feed shortcode
function mtf_create_shortcode( $atts, $content=null ) {
	shortcode_atts(array('id'=>null,'username'=>null, 'list'=>null, 'query' => null, 'limit' => null, 'linkcolor'=> null), $atts);
	$options = (($atts['username'])?'username:"'.$atts['username'].'",':'username:"webdevdesigner",');
	$options .= (($atts['limit'])?'limit:'.$atts['limit'].',':'');
	$options .= (($atts['query'])?'query:'.$atts['query'].',':'');
	$options .= (($atts['list'])?'list:'.$atts['list'].',':'');
	$options .= (($atts['linkcolor'])?'linkColor:'.$atts['linkcolor'].',':'');
	
	return '<div class="tweets"> 
				<div class="tweets_header">Mini <a href="http://minitwitter.webdevdesigner.com">Tweets</a></div> 
				<div class="content_tweets'.$atts['id'].'"> </div> 
				<div class="tweets_footer">
					<span id="bird"></span>
				</div> 
			</div>
			<script type="text/javascript">
				$(".content_tweets'.$atts['id'].'").miniTwitter({
					'.$options.'
					retweet:true
				});
			</script>';
}

add_shortcode('minitwitter', mtf_create_shortcode);



?>