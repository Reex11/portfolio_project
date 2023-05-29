<?php 

# This file is meant to be used in local development only.

if (!isset($_ENV['ENV']) || $_ENV['ENV'] !== 'production') {
    $_ENV['ENV'] = 'development';
    $_ENV['DB_HOST'] = 'localhost';
    $_ENV['DB_NAME'] = 'portfolio';
    $_ENV['DB_USER'] = 'root';
    $_ENV['DB_PASS'] = '123';
}

if (!isset($_ENV['SITE_NAME'])) {
    $_ENV['SITE_NAME'] = 'Abdulmalik Almushaiqah';
}

?>