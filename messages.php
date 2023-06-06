<?php 


require_once 'config.php';
require_once PROJECT_HOME . '/check_db.php';

stopIfDBNotPresent();

require_once PROJECT_HOME . '/lib/session_manager.php';

if (!SessionManager::isLoggedIn()) {
    header('Location: login.php');
}

if ($_SESSION['username'] == 'admin') {
    view('messages');
} else {
    header('Location: index.php');
}
