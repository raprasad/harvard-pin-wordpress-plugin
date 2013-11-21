<?php

// ------------------------------------------------ 
// login page: remove the lost password link */
// ------------------------------------------------ 
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
        $( "#login" ).append('<a id="lnk_show_login_form">(Show Admin Login Form)</a>');
        
        $("#lnk_show_login_form").click(function() {
            $('#loginform').show();   
            $("#lnk_show_login_form").hide()
        });
    });
    </script>
    
  
<?php }
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

?>