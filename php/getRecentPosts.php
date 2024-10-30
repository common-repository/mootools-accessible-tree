<?php

if (!function_exists('getRecentPosts'))
{
    function getRecentPosts($args)
    {
		define('ABSPATH', dirname(__FILE__) . '/../../../');
        require_once(ABSPATH . "wp-config.php");
        require_once(ABSPATH . "wp-includes/post.php");
        
		$recent_posts = wp_get_recent_posts( $args );
		$output = '';
		
		if($recent_posts)
		{
			foreach( $recent_posts as $recent )
			{
				$output.= '<li><span href="'.get_permalink($recent["ID"]).'" title="'.esc_attr($recent["post_title"]).'" >'.$recent["post_title"].'</span></li> ';
			}
        }
        
        return $output;
    }
}

?>
