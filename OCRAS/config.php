<?php
define('BASEURL', $_SERVER['DOCUMENT_ROOT'].'/OCRAS/');
define('CART_COOKIE','SBwi72UCklwiqzz2');
define('CART_COOKIE_EXPIRE', time() + (86400 * 30));
define('TAXRATE', 0.05);

define('CURRENCY','GBP');
define('CHECKOUTMODE','TEST'); //change test to live when you are ready to go live

if(CHECKOUTMODE == 'TEST'){
  define('STRIPE_PRIVATE','sk_test_Jy7QqYHEgB09I0WVWjxSboCc00uL69ivGa');
  define('STRIPE_PUBLIC','pk_test_PNSJtNAJmyum3XlVjeZK46vn00nmok0UOc');
}

if(CHECKOUTMODE == 'LIVE'){
  define('STRIPE_PRIVATE','sk_live_CveMJOGiiLOXrDJe9S8cHdLs00nQuDQTGn');
  define('STRIPE_PUBLIC','pk_live_kwq5r34noANpn3GQ9Tclqgg300fg9qDGrB');
}
