<?php
use CF\RuleChains\Chain;

error_reporting(-1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', '-1');
date_default_timezone_set('UTC');
try {
    // Initialize Composer autoloader
    if (!file_exists($autoload = __DIR__ . '/vendor/autoload.php')) {
        throw new \Exception('Composer dependencies not installed. Run `make install --directory app/api`');
    }
    require_once $autoload;
    $chain = new \CF\RuleChains\Chain([
        'SQL' => [
            'localhost' => [
                'database_type' => 'mysql',
                'database_name' => 'gpfl',
                'server' => 'localhost',
                'username' => 'root',
                'password' => '',
                'port' => 3306
            ]
        ]
    ],[
        [
            "type" => "SQL",
            "name" => "localhost",
            "executeType" => "ROW",
            "rule" => "SELECT 1 FROM DUAL"
        ]
    ]);
    
} catch (Exception $ex) {

}
