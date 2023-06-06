<?php 

# if url is pointing to this file, redirect to root
if (strpos($_SERVER['REQUEST_URI'], 'config.php') !== false) {
    header('Location: /');
    die();
}

if (!isset($_ENV['ENV'])) {
    $_ENV['ENV'] = 'development';
    $_ENV['DB_HOST'] = 'localhost';
    $_ENV['DB_PORT'] = '3306';
    $_ENV['DB_NAME'] = 'portfolio';
    $_ENV['DB_USER'] = 'portfolio';
    $_ENV['DB_PASS'] = 'password';
}

if (!isset($_ENV['SITE_NAME'])) {
    $_ENV['SITE_NAME'] = 'Abdulmalik Almushaiqah';
}

if (isset($_ENV['PROJECT_HOME'])) {
    $projectHome = realpath($_ENV['SITE_NAME']);
    define('PROJECT_HOME', $projectHome);
} else {
    $_ENV['PROJECT_HOME'] = '/';
    $projectHome = realpath(__DIR__);
    define('PROJECT_HOME', $projectHome);
}

# Load database class
require_once PROJECT_HOME . '/lib/database.php';