<?php

if (!function_exists('getArchives'))
{
    function getArchives($args)
    {		
		$archives = wp_get_archives($args);
		$output = '';
		
		if($archives)
		{
			$output .= preg_replace('@\<li([^>]*)>\<a([^>]*)>(.*?)\<\/a>@i', '<li$1><span$2>$3</span></li>', $archives);
        }
        
        return $output;
    }
}

?>
