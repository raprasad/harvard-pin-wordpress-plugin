<?php
    header("Status: 301 Moved Permanently");
    header("Location:https://internal.mcb.harvard.edu/wp-login.php?". $_SERVER['QUERY_STRING']);
    
    exit;
?>
