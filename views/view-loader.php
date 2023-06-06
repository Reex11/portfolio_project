<?php

function view($viewname, $data=[], $template='main') {
    extract($data);
    $view = PROJECT_HOME . '/views/'.$viewname.'.view.php';
    require_once PROJECT_HOME . '/views/templates/'.$template.'.php';
}