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

$MCB_INTRANET_HOMEPAGE_ID = 55;
function get_subpage_and_sibling_links(){
    global $post;   //  access the post variable
    global $MCB_INTRANET_HOMEPAGE_ID;

    $debug_str = '';
    $page_id = $post->ID;
    $debug_str .= '<br />page_id: ' . $page_id . '<br />post: ' . $post->ID;

    $subpage_content_html = '';
    $sibling_content_html = '';

    //-----------------
    // Sibling Pages
    //-----------------
    if ($post->post_parent){
        $debug_str .= '<br />post_parent: ' . $post->post_parent; 

        $sibling_page_args = array("exclude"=>"'".$MCB_INTRANET_HOMEPAGE_ID . "'",
                         "depth"=> 1,
                         "echo"=> 0,
                         "child_of"=> $post->post_parent,
                         "title_li"=> ""
                         );
        $sibling_content = wp_list_pages($sibling_page_args);
        if ($sibling_content){
            $sibling_content_html = '<div id="pg-siblings"><h3 class="widget-title"><a href="?page_id='. $post->post_parent . '" style="text-decoration:underline; color:#636363;">' . get_the_title($post->post_parent) . '</a> <!--i>Menu</i--></h3><ul style="padding:0 10px;">' . $sibling_content . "</ul></div>";            //str_replace('<li class="','<li class="lastlink ',$lastpage);
        }else{
            $sibling_content_html = '';
        }
    }
    
    //-----------------
    // Sub/Child Pages
    //-----------------

    $subpage_args = array( "exclude"=>"'".$MCB_INTRANET_HOMEPAGE_ID . "," . $page_id . "'",
                         "depth"=> 1,
                         "echo"=> 0,
                         "child_of"=> $page_id,
                         "title_li"=> ""
                         );
     $subpage_content = wp_list_pages($subpage_args);
     if ($subpage_content){
         $subpage_content_html = '<div id="pg-subs"><h3 class="widget-title">'. get_the_title($page_id) . ' <i>Topics</i></h3><ul style="padding:0 10px;">' . $subpage_content . "</ul></div>";
         
     }else{
         $subpage_content_html = '';
     }
         $debug_str .= '<br />2hullo';//<br >opt:' . $sibling_page_args['depth'];      
   return $subpage_content_html . $sibling_content_html;
}

?>

<!-- Regular sidebar -->

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
            <?php echo get_subpage_and_sibling_links(); ?>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>