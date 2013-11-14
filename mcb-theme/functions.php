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