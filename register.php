<?php 


require_once 'config.php';
require_once PROJECT_HOME . '/check_db.php';

stopIfDBNotPresent();

require_once PROJECT_HOME . '/lib/session_manager.php';


if (isset($_POST['submit'])) {
    
    require_once PROJECT_HOME . '/lib/user_model.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $validation = User::validation($username, $password, $email);

    if (count($validation) > 0) {
        view('register', ['errors' => $validation]);
        die();
    }

    $user = User::create($username, $password, $email);

    if ($user) {
        SessionManager::loguser($user);
        header('Location: index.php');
    } else {
        view('register', ['error' => 'Error registering the user.']);
    }
    
} else {
    view('register');
}



