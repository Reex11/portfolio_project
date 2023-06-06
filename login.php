<?php 


require_once 'config.php';
require_once PROJECT_HOME . '/check_db.php';

stopIfDBNotPresent();

require_once PROJECT_HOME . '/lib/session_manager.php';


if (isset($_POST['submit'])) {
    
    require_once PROJECT_HOME . '/lib/user_model.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = SessionManager::login($username, $password);
    if ($login) {
        header('Location: index.php');
    } else {
        view('login', ['error' => 'Invalid username or password.']);
    }
    
} else {
    view('login');
}



