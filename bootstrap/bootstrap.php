<?php

// define constants containing folder paths
define('SYSTEM_DIR', __DIR__ . '/..'); // the root of the application
define('PUBLIC_DIR', SYSTEM_DIR . '/public'); // the publicly accessible folder
define('VENDOR_DIR', SYSTEM_DIR . '/vendor'); // the folder for vendor modules

// require all necessary libraries
require_once VENDOR_DIR . '/codingbootcamp/tinymvc/request.php'; // the request class