 <?php
define('DEBUG',true);
define("DB_NAME", 'boardingvibes'); // database
define("DB_USER", 'root'); // USER
define("DB_PASSWORD", ''); // database PASSWD
define("DB_HOST", '127.0.0.1'); // database HOST *** use ip address to avoid DNS lookup

define('DEFAULT_CONTROLLER','Home');//default controller if there isn't one defined inthe url.
define('DEFAULT_LAYOUT','defaultlay'); //if no layout is set in the controller use this layout.
define('PROOT', '/CodeBiz/MVC/' );// set this to '/' for a live server. 
define('SITE_TITLE','OOSD MVC'); ////This will be used if no site title in SITE_TITLE is set
define('CURRENT_USER_SESSION_NAME','dilsharadilshara' ); //session name for logged in user
define('REMEMBER_ME_COOKIE_NAME','sasiya1sasiya'); //cookie name for remember me
define('REMEMBER_ME_COOKIE_EXPIRY',2592000); //remember me cookie kive time 30 days
define("ACCESS_RESTRICTED","Restricted");//controller name is restricted redirect

define("MENU_BRAND","Bording Vibes");//Not Used

 ?>