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

* Move files to your plugins directory and activate

* Set the following attributes: 
