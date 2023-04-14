<?php
// Database Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', ''); // I advice you to add a password for security.
define('DB_NAME', 'mvc_db'); // You may change the database name to any that suits your project, create one with that exact name otherwise an error similar to "database does not exist" will occur.

// App Root
define('APPROOT', dirname(dirname(__FILE__)));

// URL Root
define('URLROOT', 'http://localhost:8080/mvc_framework'); // Adjust the url root to your preference.

// Site Name
define('SITENAME', "Carlos' Framework"); // Please choose a different site name, your client might not want this one.
