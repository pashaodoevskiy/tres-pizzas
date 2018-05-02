<?php
define('DB_HOST' , 'localhost');
define('DB_NAME' , 'tres_pizzas');
define('DB_USERNAME' , 'root');
define('DB_PASSWORD' , '');
define('DB_CHARSET', 'utf8');
define('DSN' , 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET);

define ("OPT", "[
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]");