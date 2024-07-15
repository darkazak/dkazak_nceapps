<?php
//DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'mm37tx257');
define('DB_NAME', 'NCE_TRADE');
//define('DB_USER', 'nceapps');
//define('DB_PASS', '%gdK43MtJfRP');

//App Root
define('APPROOT', dirname(dirname(__FILE__)));
//App Root
define('WEBROOT', dirname(dirname(dirname(__FILE__))));
//URL Root
define('URLROOT', 'http://localhost/nceapps');
//Site Name
define('SITENAME', 'NCE APPS');
//App Version
define('APPVERSION', '1.0.0');
//Time Zone
date_default_timezone_set("America/Chicago");
//DEBUG Main Switch
define('DEBUG', true);
//SECURITY Main Switch
define('SECURITY', false);

//Initial Session Settings
// $_SESSION['showSessionResetButton'] = false;
// $_SESSION['tradeInProcess'] = true;
// $_SESSION['session_secure'] = false;
// $_SESSION['location_switched'] = false;
// $_SESSION['location_set'] = false;