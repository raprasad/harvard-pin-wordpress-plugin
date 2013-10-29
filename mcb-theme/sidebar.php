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

/*
NOTES:

(1) get page id:   global $post; echo "pageid: ".$post->ID;

(2) get parent: $post->post_parent

(3) siblings = wp_list_pages( 'echo=1&child_of=' . $page . '&title_li=<h2>Sub Pages x1 ' . get_the_title($id) . '</h2>'  );

sample:
global $post;

$page_id = $post->ID;
if ($post->post_parent){
    $parent_id = post->post_parent->ID;
    $siblings = wp_list_pages( 'echo=1&child_of=' . $parent_id . '&title_li=<h2>siblings</h2>');
}else{
    $siblings = '';
}
$children= wp_list_pages( 'echo=1&child_of=' . $page_id . '&title_li=<h2>' . get_the_title($page_id) . '</h2>'  );

*/
?>

<?php

$MCB_INTRANET_HOMEPAGE_ID = 55;
function get_mcb_child_pages(){
    global $post;   //  access the post variable
    global $MCB_INTRANET_HOMEPAGE_ID;
 $pg_output = 'nada';
    $page_id = $post->ID;
    $pg_output .= '<br />page_id: ' . $page_id . '<br />post: ' . $post->ID;
    //return $pg_output;
    if ($post->post_parent){
        $pg_output .= '<br />post_parent: ' . $post->post_parent; 

        $sibling_page_args = array("exclude"=>"'".$MCB_INTRANET_HOMEPAGE_ID . "," . $page_id . "'",
                         "depth"=> 1,
                         "echo"=> 0,
                         "child_of"=> $post->post_parent,
                         "title_li"=> ""
                         );
        $sibling_content = wp_list_pages($sibling_page_args);
        if ($sibling_content){
            $pg_output .= "<div style='border:1px solid #ccc;'><ul>$sibling_content</ul></div>";
            //str_replace('<li class="','<li class="lastlink ',$lastpage);
            
        }
    }
    
    $subpage_args = array( "exclude"=>"'".$MCB_INTRANET_HOMEPAGE_ID . "," . $page_id . "'",
                         "depth"=> 1,
                         "echo"=> 0,
                         "child_of"=> $page_id,
                         "title_li"=> "Sub Pages"
                         );
    $subpage_content = wp_list_pages($subpage_args);
     if ($subpage_content){
         $pg_output .= $subpage_content;
     }
         $pg_output .= '<br />2hullo';//<br >opt:' . $sibling_page_args['depth'];      
   return $pg_output;
}

?>

<!-- Regular sidebar -->

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
            <?php echo get_mcb_child_pages(); ?>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>