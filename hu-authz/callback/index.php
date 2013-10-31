<?php
    header("Status: 301 Moved Permanently");
    //header("Location:https://mcbintranet.unix.fas.harvard.edu/wp-login.php?". $_SERVER['QUERY_STRING']);
    header("Location:https://internal.mcb.harvard.edu/wp-login.php?". $_SERVER['QUERY_STRING']);
    
    exit;
?>
