<?php

/* 
	Plugin Name: MooTools Accessible Tree
	Plugin URI: http://plugins.svn.wordpress.org/mootools-accessible-tree/
	Description: WAI-ARIA Enabled Tree Plugin for Wordpress
	Version: 1.0
	Author: Votis Konstantinos
	Author URI: http://iti.gr/iti/people/Konstantinos_Votis.html
*/

require_once 'php/getRecentPosts.php';
require_once 'php/getRecentComments.php';
require_once 'php/getCategories.php';
require_once 'php/getArchives.php'; 

/**
 * Widget Class
 */
class MootoolsAccessibleTree extends WP_Widget
{    
    function __construct()
    {
		$widget_ops = array('classname' => 'widget_mootools_accessible_tree', 'description' => __( 'Mootools accessible tree' ) );
		parent::__construct('mootools-accessible-tree', __('Mootools Accessible Tree'), $widget_ops);
		$this->alt_option_name = 'widget_mootools_accessible_tree';   
		
		if (is_active_widget(false, false, $this->id_base))
		{
			// styles
			wp_register_style('tree_style', (get_bloginfo('wpurl') . '/wp-content/plugins/mootools-accessible-tree/css/style.css'));
			wp_enqueue_style('tree_style');
			
			// scripts
			wp_deregister_script('jquery');
			wp_register_script('jquery', (get_bloginfo('wpurl') .'/wp-includes/js/jquery/jquery.js'));
			wp_enqueue_script('jquery');

			wp_register_script('mootools-core', (get_bloginfo('wpurl') . '/wp-content/plugins/mootools-accessible-tree/js/libs/mootools-core.js'));
			wp_enqueue_script('mootools-core');

			wp_register_script('mootools-more', (get_bloginfo('wpurl') . '/wp-content/plugins/mootools-accessible-tree/js/libs/mootools-more.js'));
			wp_enqueue_script('mootools-more');
			
			wp_register_script('tree', (get_bloginfo('wpurl') . '/wp-content/plugins/mootools-accessible-tree/js/libs/tree.js'));
			wp_enqueue_script('tree');

			wp_register_script('tree_script', (get_bloginfo('wpurl') . '/wp-content/plugins/mootools-accessible-tree/js/script.js'));
			wp_enqueue_script('tree_script');
		}
	}

    /** @see WP_Widget::widget */
    function widget($args, $instance)
    {	
        extract( $args );
        
        // options
        $title = apply_filters('widget_title', $instance['title']);
        if(!$title)
		{
			$title = 'Mootools Accessible Tree';
		}
		
        $recent_posts_title = $instance['recent_posts_title'];
        if(!$recent_posts_title)
		{
			$recent_posts_title = 'Recent Posts';
		}
        
        $recent_posts_number = $instance['recent_posts_number'];
        if(!$recent_posts_number)
		{
			$recent_posts_number = '5';
		}
		$recent_posts_args = array(
			'numberposts' => $recent_posts_number
		);
		
		$recent_comments_title = $instance['recent_comments_title'];
        if(!$recent_comments_title)
		{
			$recent_comments_title = 'Recent Comments';
		}
		
		$recent_comments_number = $instance['recent_comments_number'];
        if(!$recent_comments_number)
		{
			$recent_comments_number = '5';
		}
		$recent_comments_args = array(
			'number' => $recent_posts_number
		);
		
		$categories_title = $instance['categories_title'];
		if(!$categories_title)
		{
			$categories_title = 'Categories';
		}
		
		$archives_title = $instance['archives_title'];
		if(!$archives_title)
		{
			$archives_title = 'Archives';
		}
		$archives_args = array(
			'echo' => 0
		);
        
        echo $before_widget;
        
        // if the title is set
		if ( $title )
		{
			echo $before_title . $title . $after_title;
		}
		
		// content
		echo 
		'<ul class="tree" id="tree">
			<li>
				<span>'.$recent_posts_title.'</span>
				<ul>'.getRecentPosts($recent_posts_args).'</ul>
			</li>
			<li>
				<span>'.$recent_comments_title.'</span>
				<ul>'.getRecentComments($recent_comments_args).'</ul>
			</li>
			<li>
				<span>'.$categories_title.'</span>
				<ul>'.getCategories().'</ul>
			</li>
			<li>
				<span>'.$archives_title.'</span>
				<ul>'.getArchives($archives_args).'</ul>
			</li>
		</ul>';
		
		echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance)
    {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['recent_posts_title'] = strip_tags($new_instance['recent_posts_title']);
		$instance['recent_posts_number'] = strip_tags($new_instance['recent_posts_number']);
		$instance['recent_comments_title'] = strip_tags($new_instance['recent_comments_title']);
		$instance['recent_comments_number'] = strip_tags($new_instance['recent_comments_number']);
		$instance['categories_title'] = strip_tags($new_instance['categories_title']);
		$instance['archives_title'] = strip_tags($new_instance['archives_title']);
		
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance)
    {	
		$title = esc_attr($instance['title']);		
		$recent_posts_title = esc_attr($instance['recent_posts_title']);
		$recent_posts_number = esc_attr($instance['recent_posts_number']);
		$recent_comments_title = esc_attr($instance['recent_comments_title']);
		$recent_comments_number = esc_attr($instance['recent_comments_number']);
		$categories_title =  esc_attr($instance['categories_title']);
		$archives_title =  esc_attr($instance['archives_title']);
		
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title:'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('recent_posts_title'); ?>"><?php _e('Translation for recent posts:'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('recent_posts_title'); ?>" name="<?php echo $this->get_field_name('recent_posts_title'); ?>" type="text" value="<?php echo $recent_posts_title; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('recent_posts_number'); ?>"><?php _e('Number of posts to show:'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('recent_posts_number'); ?>" name="<?php echo $this->get_field_name('recent_posts_number'); ?>" type="text" value="<?php echo $recent_posts_number; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('recent_comments_title'); ?>"><?php _e('Translation for recent comments:'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('recent_comments_title'); ?>" name="<?php echo $this->get_field_name('recent_comments_title'); ?>" type="text" value="<?php echo $recent_comments_title; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('recent_comments_number'); ?>"><?php _e('Number of comments to show:'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('recent_comments_number'); ?>" name="<?php echo $this->get_field_name('recent_comments_number'); ?>" type="text" value="<?php echo $recent_comments_number; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('categories_title'); ?>"><?php _e('Translation for categories:'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('categories_title'); ?>" name="<?php echo $this->get_field_name('categories_title'); ?>" type="text" value="<?php echo $categories_title; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('archives_title'); ?>"><?php _e('Translation for archives:'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('archives_title'); ?>" name="<?php echo $this->get_field_name('archives_title'); ?>" type="text" value="<?php echo $archives_title; ?>" />
			</p>
		<?php
    }
} // Widget Class

// register widget
add_action('widgets_init', create_function('', 'register_widget("MootoolsAccessibleTree");'));

?>
