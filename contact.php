<?php 


require_once 'config.php';
require_once PROJECT_HOME . '/check_db.php';

stopIfDBNotPresent();

require_once PROJECT_HOME . '/lib/session_manager.php';

if (isset($_POST['submit'])) {
    
    require_once PROJECT_HOME . '/lib/message_model.php';

    $sender_name = $_POST['name'];
    $sender_email = $_POST['email'];
    $title = $_POST['title'];
    $body = $_POST['body'];

    $message = new Message($title, $body, $sender_name, $sender_email);
    try {
        $message->save();
        view('message-recieved');
    } catch (Exception $e) {
        view('error');
    }
    
} else {
    view('contact');
}



