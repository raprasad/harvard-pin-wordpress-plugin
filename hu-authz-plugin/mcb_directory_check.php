<?php
/* 
    Optional check to see if someone is in the MCB directory
    For Wordpress
*/

// echo json_encode(array('result' => '1', 'username' => 'bob', 'first_name' => 'Bob', 'last_name' => 'Jacobsen', 'email' => 'aaben@lobaugh.net'));
function is_email_in_mcb_directory($email_address){

    $mcb_check_url = "https://www.mcb.harvard.edu/mcb/directory/check_user/?e=" . $email_address;
    $response = wp_remote_get($mcb_check_url);
    if(is_wp_error($response)){
        $error_string = $result->get_error_message();
           echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
          // print 'blah1';
           return false;

    }

    $ext_auth = json_decode( $response['body'], true );
    if( $ext_auth['in_mcb_directory'] == 1 ) {
        return true;
    }
    
    return false;
}

//print 'check 2';
//$cval = is_email_in_mcb_directory('some_email@harvard.edu');
//print 'check 3';

?>

