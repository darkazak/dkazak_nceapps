<?php
//Load Config
require_once 'config/config.php';

//Load helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/format_helper.php';
// require_once 'helpers/livesearch.php';
//require_once '../vendor/autoload.php';

//Load Libraries
require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';


// spl_autoload_register(function ($className) {
//     require_once 'libraries/' . $className . '.php';
// });