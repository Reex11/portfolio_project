<?php 


require_once 'config.php';
require_once PROJECT_HOME . '/check_db.php';

stopIfDBNotPresent();

require_once PROJECT_HOME . '/lib/session_manager.php';

view('experiences');


