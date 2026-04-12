<?php
// $file = "../src/config/config.properties";

// if (!file_exists($file)) {
//     echo "config file not found";
//     exit();
// }
namespace MyApp\Config;

use MyApp\Core\DotEnv;
// $properties = parse_ini_file($file);
class Config
{
    public static function load()
    {
        (new DotEnv(__DIR__ . '../../.env'))->load();


        define("BASEURL", getenv('BASEURL'));
    }
}





// define('DB_HOST', $properties['db_host']);
// define('DB_USER', $properties['db_user']);
// define('DB_PASS', $properties['db_pass']);
// define('DB_NAME', $properties['db_name']);
// define('DB_PORT', $properties['db_port']);
