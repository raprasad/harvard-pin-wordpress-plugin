<?php


function drupal_is_email_in_mcb_directory($email_address){
    /*
        Checks if a given email address (from Pin Login/LDAP directory) matches the MCB directory
        
        url: https://www.mcb.harvard.edu/mcb/directory/check_user/?e=some_email@harvard.edu
        JSON responses: 
            yes:  {"in_mcb_directory": 1}
             no: {"in_mcb_directory": 0}
    */

    $is_mcb_member_url = "https://www.mcb.harvard.edu/mcb/directory/check_user/?e=" . $email_address;
    
    $response = drupal_http_request($is_mcb_member_url);
    if (!($response->code == 200)) {      // did request fail?
        return false;
    }
    $json_response = json_decode( $response->data);
    if ($json_response === NULL){      // was json decoded?
        return false;   
    }
    if (array_key_exists('in_mcb_directory', $json_response)) {
        if ($json_response['in_mcb_directory'] == 1 ) {     // is person in directory
            return true;            // Success!
        }
    }
    return false;    
} // end is_email_in_mcb_directory




?>