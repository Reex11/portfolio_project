<?php

require_once PROJECT_HOME . '/views/view-loader.php';

function checkDB() {
    
    $connection = Database::getConnection();
    $statement = $connection->prepare('SELECT * FROM experiences');
    
    try {
        $statement->execute();
        return true;
    } catch (Exception $e) {
        return false;
    }

}

function stopIfDBNotPresent() {

    if( !checkDB() ) {
        return view('seed_db');
    }

}


