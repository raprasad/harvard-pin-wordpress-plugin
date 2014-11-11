harvard-pin-wordpress-plugin
============================

Login to Wordpress using a Harvard Pin with the AuthZProxy service

####Requirements (in addition to Wordpress):
   
* Sign up for the AuthZ Proxy service http://isites.harvard.edu/icb/icb.do?keyword=k236&pageid=icb.page14773

* For "Additional Attributes to be Returned in Encrypted Token", include these LDAP Attributes: 

  * (a) mail - The user's email address

  * (b) sn - The user's last name
  
  * (c) givenName - The user's  first name    
  
* Install the PHP GnuPG module

  * http://php.net/manual/en/book.gnupg.php
  
#### Installation

* Copy the directory "hu-authz-plugin" to your plugins directory 
* Within this file "hu-authz-plugin/hu-authz-plugin.php", set the following attributes: 
    * 'GPG_DIR' => "/home/p/r/some-name/.gnupg",
    * 'PIN_APP_NAME' => "FAS_FCOR_MCB_INTRANET",
    * 'CHECK_PIN_IP_VALUE' => 'false',
    * 'PRINT_DEBUG_STATMENTS' => 'false'
* Activate the plugin through the Wordpress admin


- fyi: This was a *get-it-done-fast* project -- e.g., there's no form to change plugin options, etc 
