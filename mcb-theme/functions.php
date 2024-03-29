<?php

// ------------------------------------------------ 
// login page: remove the lost password link */
// ------------------------------------------------ 
// commented out b/c plugin "Private Only" uses this function
/*function xremove_lostpassword_text ( $text ) {
         if ($text == 'Lost your password?'){$text = '<a id="lnk_show_login_form">(Show Admin Login Form)</a>';}
                return $text;
         }
*/
//add_filter( 'gettext', 'remove_lostpassword_text' );

// end: remove_lostpassword_text ------------------

function mcb_menu_title_markup( $title, $id ){
//    if ( is_nav_menu_item ( $id ) ){
        if ($id==677){
            //$title = str_ireplace( "#BR#", "<br/>", $title );
            $title = str_ireplace( "Research", "<br/>Research", $title );
        //    return 'pdocs';
        }
  //  }
    ///return "$title - $id";
    return $title;
}
//add_filter( 'the_title', 'mcb_menu_title_markup', 10, 2 );

// ------------------------------------------------ 
//    PDF filter on Media Page
// ------------------------------------------------
function modify_post_mime_types( $post_mime_types ) {  
  
    // select the mime type, here: 'application/pdf'  
    // then we define an array with the label values  
  
    $post_mime_types['application/pdf'] = array( __( 'PDFs' ), __( 'Manage PDFs' ), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' ) );  

//    $post_mime_types['application/pdf'] = array( __( 'PDFs' ), __( 'Manage PDFs' ), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' ) );  
  
    // then we return the $post_mime_types variable  
    return $post_mime_types;  
  
}  
  
// Add Filter Hook  
add_filter( 'post_mime_types', 'modify_post_mime_types' );


// ------------------------------------------------ 
//    Hide the WP login form but give a link "Show Admin Login Form" to reveal it
// ------------------------------------------------ 
function my_login_stylesheet() { ?>
    <link rel="stylesheet" id="custom_wp_admin_css"  href="<?php echo get_bloginfo( 'stylesheet_directory' ) . '/login-style.css'; ?>" type="text/css" media="all" />
    <script type='text/javascript' src='/wp-includes/js/jquery/jquery.js'></script>
     <script>
    jQuery(document).ready(function($){

        // add "Show Admin Login Form" link
        $( "#login" ).append('<p><a href="https://www.pin1.harvard.edu/pin/authenticate?__authen_application=FAS_FCOR_MCB_INTRANET">Harvard PIN Login</a></p><p><br /><a id="lnk_show_login_form" style="color:#cccccc;">(Show Admin Login Form)</a></p>');
        
        $("#lnk_show_login_form").click(function() {
            $('#loginform').show();   
            $("#lnk_show_login_form").hide()
        });
        
        // Hide lost password link, if it exists
        $("a:contains('Lost your password')").hide();


        //$('a').filter(function(index) { return $(this).text() === "Lost your password"; });
    });
    </script>
    
  
<?php }
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

// Javascript to updated the nav menu--adding a <br /> to the Postdocs & Research Associates nav item
function postdoc_linebreak_script() {
	wp_enqueue_script(
		'postdoc_nav_linebreak',
		get_stylesheet_directory_uri()  . '/js/postdoc_nav_linebreak.js',
		array('jquery')
	);
}
//add_action('wp_enqueue_scripts', 'postdoc_linebreak_script');


?>