<?php

if (!function_exists('getRecentComments'))
{
    function getRecentComments($args)
    {
		define('ABSPATH', dirname(__FILE__) . '/../../../');
        require_once(ABSPATH . "wp-config.php");
        require_once(ABSPATH . "wp-includes/comment.php");
        
		$recent_comments = get_comments( $args);
		$output = '';
		
		if($recent_comments)
		{
			foreach( $recent_comments as $recent )
			{
				$post = get_post($recent->comment_post_ID);
				$title = $post->post_title;
				$output.= '<li><span href="'.get_permalink($recent->comment_post_ID).'#comment-'.$recent->comment_ID.'" title="'.esc_attr($title).'" >'.esc_html($recent->comment_author).' on '.$title.'</span></li> ';
			}
        }
        
        return $output;
    }
}

?>
