<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<?php

function get_mcb_child_pages(){

    global $id;
    
    $output = '';// wp_list_pages('echo=1&depth=1&title_li=<h2>Top Level Pages </h2>' );
    if (is_page( )) {
      $page = $post->ID;
      
      if ($post->post_parent) {
        $page = $post->post_parent;
      }
      $page = $id;
      $children= wp_list_pages( 'echo=1&child_of=' . $page . '&title_li=<h2>Sub Pages x1 ' . get_the_title($id) . '</h2>'  );
      //$children = '<ul class="xoxo blogroll">' . $children . '</ul>';
     
     // $children=wp_list_pages( 'echo=1&child_of=' . $page . '&title_li=<h2>Sub Pages x ' . get_the_title($id) . '</h2>'  );
      if ($children) {
       // $output = wp_list_pages ('echo=1&child_of=' . $page . '&title_li=<h2>Sub Pages y' . get_the_title($id) . '</h2>' );
     //   return 'page id: '. $page . '<ul class="xoxo blogroll">rp sub3' .  $output . '</ul>';
      }
    } 
    return $output;
} // end get_mcb_child_pages
?>

<!-- Regular sidebar -->

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
            <?php echo get_mcb_child_pages(); ?>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>